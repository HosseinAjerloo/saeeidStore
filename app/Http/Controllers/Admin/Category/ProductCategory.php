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
        $totalCategory=ProductGroup::count();
        $totalCategoryParent=ProductGroup::whereNull('parent_id')->count();
        $totalCategoryChild=ProductGroup::whereNotNull('parent_id')->count();
        $totalCategoryInactive=ProductGroup::where('is_active','0')->count();
        $details = collect([
            'totalCategory'=>$totalCategory,
            'totalCategoryParent'=>$totalCategoryParent,
            'totalCategoryChild'=>$totalCategoryChild,
            'totalCategoryInactive'=>$totalCategoryInactive
        ]);
        $productCategories = ProductGroup::search()->paginate(15)->withQueryString();
        return view('admin.productCategory.index',compact('details','productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductGroup::where('is_active', '1')->with('childs')->whereNull('parent_id')->get();

        $tree = $categories->map(function ($group) {
            return $group->buildTree($group);
        });
        return view('admin.productCategory.create', compact('tree'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, ImageService $imageService)
    {
        try {
            $image = $request->file('image');
            $input = $request->all();

            $path = $imageService->setFile($image)->basePath(public_path())->setRootPath('category')->generator();
            if ($path) {
               $input['image']=$path;
               #todo add user id in creator
//               $input['user_id']=$path;

               ProductGroup::create($input);
               return redirect()->route('admin.category.index')->with(['success' => 'گروه بندی جدید باموفقیت ساخته شد!']);
            }
            throw new \Exception("con n't save image path");

        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['categoryGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);
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
    public function edit(ProductGroup $productGroup)
    {
        $categories = ProductGroup::where('is_active', '1')->where('id','!=',$productGroup->id)->with('childs')->whereNull('parent_id')->get();
        $tree = $categories->map(function ($group) {
            return $group->buildTree($group);
        });
        return view('admin.productCategory.edit',compact('productGroup','tree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, ImageService $imageService, ProductGroup $productGroup) {
        try {
            $input = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                $path = $imageService
                    ->setFile($image)
                    ->basePath(public_path())
                    ->setRootPath('category')
                    ->generator();

                if (!$path) {
                    throw new \Exception("Can't save image path");
                }

               if (!$imageService->removeFile($productGroup->image))
                   throw new \Exception("Can't remove image ");

                $input['image'] = $path;
            }

            $productGroup->update($input);

            return redirect()
                ->route('admin.category.index')
                ->with([
                    'success' => 'گروه‌بندی با موفقیت ویرایش شد!'
                ]);

        } catch (\Exception $exception) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'categoryGenerateError' =>
                        '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGroup $productGroup)
    {
        $hasProducts = $productGroup->products()->exists();

        $hasChildren = $productGroup->childs()->exists();
        if ($hasProducts && $hasChildren) {
            return back()->withErrors(['این دسته دارای محصول و زیرمجموعه است و قابل حذف نیست.']
            );
        }

        if ($hasProducts) {
            return back()->withErrors(['این دسته دارای محصول است. ابتدا محصولات را به دسته دیگری منتقل کنید.']
            );
        }

        if ($hasChildren) {
            return back()->withErrors(['این دسته دارای زیرمجموعه است. ابتدا زیرمجموعه‌ها را منتقل یا حذف کنید.']);
        }

        $productGroup->delete();
        return back()->with(['success'=>'حذف گروه با موفقیت انجام شد']);

    }
}
