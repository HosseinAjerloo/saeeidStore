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
            'variant_attribute_ids' => [$inputs['variant_attribute_ids']] ?? null,
            'quantity' => 1,
            'discount_id' => $productVariant->product->inValidDiscount()?->id,
            'discount_amount' => $productVariant->product->inValidDiscount()->value ?? 0,
            'discount_type' => $productVariant->product->inValidDiscount()?->type,
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
        $this->clientCart = $this->resolveCart();
        $totalPrice = 0;
        if ($this->clientCart) {
            foreach ($this->clientCart->cartItems as $item) {
                $totalPrice += ($item->final_unit_price * $item->quantity);
            }
            $this->clientCart->final_price = $totalPrice;
            $this->clientCart->save();
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
        $code = request()->input('quantity');
        $user = Auth::user();
        $cart=$this->resolveCart();
        $copen = $user->getUserDiscountCode()->where('code',$code)->first();
        if ($copen and $user) {

            if ($copen->min_order_amount) {
                dd('s');
            }
        }
    }
}
