<?php

namespace App\Service\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\json;

class CartService
{
    protected ?Cart $clientCart = null;

    protected $message = '';

    protected $statusCode = 200;

    protected $status = true;

    protected $data = [];

    public function addToCart()
    {
        $this->clientCart = $this->resolveCart();
        $inputs = request()->all();

        if (!$this->canAddToCart($inputs['productVariant'])) {
            $this->message = 'موجودی این محصول برای تعداد درخواستی کافی نیست.';
            $this->status = false;
            $this->statusCode = 422;
            return;
        }
        if ($this->hasProductInCart()) {
            $this->message = 'این محصول قبلاً به سبد خرید شما اضافه شده است.';
            $this->status = false;
            $this->statusCode = 422;
            return;
        }
        $this->addItemToCart();
    }

    public function addItemToCart()
    {

        if (!$this->clientCart) {
            $this->message = 'سبد خرید شما پیدا نشد. لطفاً ابتدا محصولی را به سبد خرید اضافه کنید.';
            $this->status = false;
            $this->statusCode = 422;
            return;
        }
        $inputs = \request()->all();
        $productVariant = ProductVariant::find($inputs['productVariant']);
        $this->clientCart->cartItems()->create([
            'variant_id' => $productVariant->id,
            'variant_attribute_ids' => isset($inputs['variant_attribute_ids']) ? [$inputs['variant_attribute_ids']] : null,
            'quantity' => 1,
            'discount_id' => $productVariant->validDiscount()?->id,
            'discount_amount' => $productVariant->validDiscount()->value ?? 0,
            'discount_type' => $productVariant->validDiscount()?->type,
            'unit_price' => $productVariant->price,
            'final_unit_price' => $productVariant->countable(),
        ]);
        $this->calculateCartTotal();
        $this->message = '✨ محصول با موفقیت به سبد خرید شما اضافه شد.';
        $this->status = true;
        $this->statusCode = 200;
    }

    public function canAddToCart($variant_id, $quantity = 1)
    {
        return CartItem::isAddToCartAllowed($variant_id, $quantity);
    }

    public function resolveCart()
    {
        $this->setSessionCart();
        if ($user = $this->isLogin()) {
            $cart = Cart::firstOrCreate(['user_id' => $user->id, 'status' => 'active'], ['cart_token' => $this->getSessionCart(), 'status' => 'active']);
        } else {
            $cart = Cart::firstOrCreate(['cart_token' => $this->getSessionCart(), 'status' => 'active'], ['status' => 'active']);
        }
        $this->clientCart = $cart;
        return $cart;
    }

    public function isLogin()
    {
        return Auth::user();
    }

    protected function generateToken()
    {

        if (session('cart_item'))
            return session('cart_item');

        $token = Cart::generateToken();
        return $token;
    }

    public function setSessionCart()
    {
        if ($this->isLogin() and $cart_token = $this->isLogin()->carts()->latest()->first()?->cart_token)
            session(['cart_item' => $cart_token]);

        session(['cart_item' => $this->generateToken()]);
    }

    public function hasProductInCart(): bool
    {
        $inputs = request()->all();
        return CartItem::isForProduct($this->clientCart, $inputs['productVariant'], $inputs['variant_attribute_ids']);
    }

    public function getSessionCart()
    {
        return session('cart_item');
    }

    public function responseHttpClient()
    {
        return response()->json(['status' => $this->status, 'message' => $this->message, 'data' => $this->data], $this->statusCode);
    }

    public function calculateCartTotal()
    {
        $this->resolveCart();
        $totalPrice = 0;
        if ($this->clientCart) {
            foreach ($this->clientCart->cartItems as $item) {

                $item->final_unit_price = isset($this->clientCart?->discount_id) == true ? $item->productVariant->price : $item->productVariant->countable();
                $item->unit_price = $item->productVariant->price;
                $item->discount_id = isset($this->clientCart?->discount_id) == true ? null : $item->productVariant->validDiscount()?->id;
                $item->discount_amount = isset($this->clientCart?->discount_id) == true ? 0 : $item->productVariant->validDiscount()->value ?? 0;
                $item->discount_type = isset($this->clientCart?->discount_id) == true ? null : $item->productVariant->validDiscount()?->type;
                $item->save();

                $totalPrice += ((isset($this->clientCart?->discount_id) == true ?   $item->productVariant->price  : $item->productVariant->countable()) * $item->quantity);
            }
            $this->clientCart->final_price = $totalPrice;
            $this->clientCart->total_price = $totalPrice;
            $this->clientCart->save();
            if (isset($this->clientCart?->discount_id)) {
                $this->clientCart->final_price = $this->clientCart->calculateCartTotal();
                $this->clientCart->save();
            }
        }
    }
    public function updateCartItemQuantity(CartItem $cartItem, $quantity)
    {
        if ($this->canAddToCart($cartItem->variant_id, $quantity)) {
            $cartItem->update([
                'quantity' => $quantity
            ]);
            $this->calculateCartTotal();
            $this->status = true;
            return;
        }

        $this->message = 'موجودی این محصول برای تعداد درخواستی کافی نیست.';
        $this->statusCode = 422;
        $this->status = false;
        return;
    }

    public function removeItem(CartItem $cartItem)
    {
        try {
            DB::beginTransaction();
            $cartItem->delete();
            $this->message = 'محصول از سبد خرید شما پاک شد.';
            $this->status = true;
            $this->statusCode = 200;
            $this->calculateCartTotal();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            $this->message = 'متأسفانه خطایی رخ داد. لطفاً موضوع را به پشتیبانی اطلاع دهید.';
            $this->status = false;
            $this->statusCode = 500;
        }
    }

    public function applyDiscountCode()
    {
        $this->resolveCart();
        $code = request()->input('quantity');
        $user = Auth::user();
        $copen = $user->getUserDiscountCode()->where('code', $code)->first();
        $userHasCartItem = $user->carts()->latest()->first()?->cartItems()->exists();
        $price = $this->clientCart->total_price;
        if ($copen and $user and $userHasCartItem) {


            if (isset($copen->min_order_amount) && $this->clientCart?->total_price  < $copen->min_order_amount) {
                $this->statusCode = 422;
                $this->message = " حداقل مبلغ سبد خرید باید " . numberFormatAble(($copen->min_order_amount / 10) ?? 0) . " تومان باشد";
                $this->status = false;
                return;
            }



            if ($copen->type == 'fixed' and $copen->value > $price) {
                $this->statusCode = 422;
                $this->message = " مبلغ سبد خرید برای اعمال این تخفیف کافی نیست.";
                $this->status = false;
                return;
            }
            if ($copen->type == 'percentage' and $copen->value > 0) {
                $diffrencePrice = ceil(($price * $copen->value) / 100);
                if ($price < $diffrencePrice) {
                    $this->statusCode = 422;
                    $this->message = " مبلغ سبد خرید برای اعمال این تخفیف کافی نیست.";
                    $this->status = false;
                    return;
                }
            }


            if (isset($copen->min_order_amount) && $this->clientCart?->total_price  < $copen->min_order_amount) {
                $this->statusCode = 422;
                $this->message = " حداقل مبلغ سبد خرید باید " . numberFormatAble(($copen->min_order_amount / 10) ?? 0) . " تومان باشد";
                $this->status = false;
                return;
            }



            $this->clientCart->update([
                'discount_id' => $copen->id,
                'discount_type' => $copen->type,
                'discount_amount' => $copen->value,
            ]);
            $this->calculateCartTotal();


            $this->statusCode = 200;
            $this->message = "تخفیف شما اعمال شد.";
            $this->status = true;
            $this->data['value'] = $this->clientCart->calculateDiscountAmount();
            
            return;
        }
        $this->statusCode = 422;
        $this->message = "کدتخفیف وارد شده صحیح نمیباشد.";
        $this->status = false;
        return;
    }

    public function deleteDiscountCode()
    {
        $code = request()->input('quantity');
        $user = Auth::user();
        $copen = $user->getUserDiscountCode()->where('code', $code)->first();
        $userHasCartItem = $user->carts()->latest()->first()?->cartItems()->exists();
        if ($copen and $user and $userHasCartItem) {
            $this->resolveCart();

            $this->clientCart->update([
                'discount_id' => null,
                'discount_type' => null,
                'discount_amount' => 0,
            ]);

            $this->calculateCartTotal();


            $this->statusCode = 200;
            $this->message = "تخفیف شما حذف شد.";
            $this->status = true;
            return;
        }
        $this->statusCode = 422;
        $this->message = "کدتخفیف وارد شده صحیح نمیباشد.";
        $this->status = false;
        return;
    }
}
