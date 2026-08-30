<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\productBrand;
use App\Models\ProductGroup;
use App\Models\ProductVariant;
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
        $productBrands=productBrand::whereHas('products')->where('is_active','1')->cursor();
        return view('panel.index',compact('categoriesAll','productBrands','products'));
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
