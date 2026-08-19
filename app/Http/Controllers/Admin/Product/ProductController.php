<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Product;
use App\Models\productBrand;
use App\Models\ProductGroup;
use App\service\imageService\ImageService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductGroup::where('is_active', '1')->with('childs')->whereNull('parent_id')->get();

        $groups = $categories->map(function ($group) {
            return $group->buildTree($group);
        });
        $brands=productBrand::where('is_active','1')->get();
        return view('admin.product.create',compact('groups','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageService $imageService,ProductRequest $request)
    {
        try {
            $image = $request->file('image');
            $input = $request->all();
            $path = $imageService->setFile($image)->basePath(public_path())->setRootPath('product')->generator();
            if ($path) {
                $input['image']=$path;
                #todo add user id in creator
//               $input['user_id']=$path;

                Product::create($input);
                return redirect()->route('admin.product.index')->with(['success' => 'گروه بندی جدید باموفقیت ساخته شد!']);
            }
            throw new \Exception("con n't save image path");

        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['productGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);
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
