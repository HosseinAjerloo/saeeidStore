<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\productBrand;
use App\Models\ProductGroup;
use App\Models\ProductVariant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesAll = ProductGroup::whereHas('products.productVariant', function ($query) {
            $query->where('is_active', 1)
                ->where('stock', '>', 0);
        })->whereNotNull('parent_id')
            ->limit(6)
            ->get();
        $products=ProductVariant::whereHas('variantAttributes')->where('stock',">",1)->orderBy('created_at','DESC')->limit(6)->get();

        $dateNow = Carbon::now()->toDateString();
        $discount=optional(Discount::whereHas('products',function ($queue){
            $queue->whereNull('discountables.deleted_at');
        })->where('is_active','1')->where('discounts.starts_at',$dateNow)->where('discounts.expires_at',">=",$dateNow)->first());

        $diffHours=0;
       if ($discount){
           $starts = Carbon::parse($discount->starts_at)->startOfDay();
           $expires = Carbon::parse($discount->expires_at)->endOfDay();

           $diffHours = round($starts->diffInHours($expires,true));
       }



        $productsDiscounts=ProductVariant::whereHas('product.discounts',function ($query) use ($discount){
            $query->where('discounts.id',$discount?->id)->whereNull('discountables.deleted_at');
        })->where('stock',">",1)->orderBy('created_at','DESC')->limit(3)->get();

        $productBrands=productBrand::whereHas('products')->where('is_active','1')->cursor();
        return view('panel.index',compact('categoriesAll','productBrands','products','productsDiscounts','discount','diffHours'));
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
    public function show(string $id)
    {
        //
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
}
