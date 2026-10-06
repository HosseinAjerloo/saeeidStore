<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Discount;
use App\Models\Product;
use App\Models\productBrand;
use App\Models\ProductGroup;
use App\Models\ProductVariant;
use App\Service\Cart\CartService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dateNow = Carbon::now()->toDateString();
        $categoriesAll = ProductGroup::whereHas('products.productVariant', function ($query) {
            $query->where('is_active', 1)
                ->where('stock', '>', 0);
        })->whereNotNull('parent_id')
            ->limit(6)
            ->get();

        $products = ProductVariant::whereHas('variantAttributes')->where('stock', ">", 1)->orderBy('created_at', 'DESC')->limit(6)->get();
        $products = $products->map(function ($product) use ($dateNow) {
            if ($product->created_at->toDateString() == $dateNow) {
                $product->new = true;
            } else {
                $product->new = false;
            }
            return $product;
        });

        $discount = optional(Discount::whereHas('products', function ($queue) {
            $queue->whereNull('discountables.deleted_at');
        })->where('is_active', '1')->where('discounts.starts_at', "<=", $dateNow)->where('discounts.expires_at', ">=", $dateNow)->first());

        $diffHours = 0;
        if ($discount) {
            $starts = Carbon::parse($discount->starts_at)->startOfDay();
            $expires = Carbon::parse($discount->expires_at)->endOfDay();

            $diffHours = round($starts->diffInHours($expires, true));
        }


        $productsDiscounts = ProductVariant::whereHas('product.discounts', function ($query) use ($discount) {
            $query->where('discounts.id', $discount?->id)->whereNull('discountables.deleted_at');
        })->where('stock', ">", 1)->orderBy('created_at', 'DESC')->limit(3)->get();

        $productBrands = productBrand::whereHas('products')->where('is_active', '1')->cursor();
        return view('panel.index', compact('categoriesAll', 'productBrands', 'products', 'productsDiscounts', 'discount', 'diffHours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, ProductVariant $productVariant)
    {
        $parentChainGroups = getParentChain($product->group);
        $ProductVariants = ProductVariant::where('stock', ">=", 1)->where('is_active', '1')->whereHas('product', function ($query) use ($product) {
            $query->where('is_active', '1')->whereIn('group_id', [$product->group_id]);
        })->get();
        return view('panel.product', compact('product', 'parentChainGroups', 'productVariant', 'ProductVariants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function faq()
    {
        return view('panel.faq');
    }

    public function shoping(CartService $cartService)
    {
        $cart = null;

        $userId = Auth::id();
        $cartToken = session('cart_item');

        if ($userId || $cartToken) {
            $cart = Cart::query()
                ->where('status', 'active')
                ->where(function ($query) use ($userId, $cartToken) {

                    $query->when($userId, function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    });

                    $query->when($cartToken, function ($query) use ($cartToken) {
                        $query->orWhere('cart_token', $cartToken);
                    });
                })->latest()
                ->first();
            $cartService->calculateCartTotal();
        }

        if (!isset($cart))
            return redirect()->route('panel.index')->with(['error' => 'سبد خرید شما خالی میباشد']);

        $couriers=Courier::where('is_active','active')->latest()->cursor();
        return view('panel.shipping', compact('cart','couriers'));
    }

    public function search(){
            return view('panel.search');

    }
}
