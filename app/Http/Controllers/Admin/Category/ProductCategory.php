<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Models\ProductGroup;
use App\service\imageService\ImageService;
use Illuminate\Http\Request;

class ProductCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.productCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=ProductGroup::where('is_active','1')->get();
        return view('admin.productCategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request,ImageService $imageService)
    {
        try {
            $image=$request->file('image');
//            $path=$imageService->setFile($image)->setFilePath('hesam')->setExtension('png')->setName('hossein')->setRootPath(public_path())->generator();
           dd($imageService->removeFile('E:\SaeeidStore\public\2026\08\15\hossein.png'));
        }catch (\Exception $exception){
            return redirect()->route('admin.category.create');
        }
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
