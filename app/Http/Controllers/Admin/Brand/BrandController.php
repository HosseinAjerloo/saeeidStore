<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\BrandRequest;
use App\Models\productBrand;
use App\Models\ProductGroup;
use App\service\imageService\ImageService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBrand=productBrand::count();
        $activeBrand=productBrand::where('is_active','1')->count();
        $inActiveBrand=productBrand::where('is_active','0')->count();
        $totalWebsiteBrand=productBrand::whereNotNull('website')->count();
        $details = collect([
            'totalBrand'=>$totalBrand,
            'activeBrand'=>$activeBrand,
            'inActiveBrand'=>$inActiveBrand,
            'totalWebsiteBrand'=>$totalWebsiteBrand
        ]);
        $productBrands = productBrand::search()->paginate(15)->withQueryString();
        return view('admin.productBrand.index',compact('details','productBrands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productBrand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request, ImageService $imageService)
    {
        try {
            $image = $request->file('logo');
            $input = $request->all();
            $path = $imageService->setFile($image)->basePath(public_path())->setRootPath('brand')->generator();
            if ($path) {
                $input['logo'] = $path;
                #todo add user id in creator
//               $input['user_id']=$path;

                productBrand::create($input);
                return redirect()->route('admin.brand.index')->with(['success' => 'برند جدید باموفقیت ساخته شد!']);
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
    public function edit(productBrand $productBrand)
    {
        return view('admin.productBrand.edit',compact('productBrand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, ImageService $imageService,productBrand $productBrand)
    {
        try {
            $input = $request->all();

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');

                $path = $imageService
                    ->setFile($image)
                    ->basePath(public_path())
                    ->setRootPath('brand')
                    ->generator();

                if (!$path) {
                    throw new \Exception("Can't save image path");
                }

                if (!$imageService->removeFile($productBrand->logo))
                    throw new \Exception("Can't remove image ");

                $input['logo'] = $path;
            }

            $productBrand->update($input);

            return redirect()
                ->route('admin.brand.index')
                ->with([
                    'success' => 'گروه‌بندی با موفقیت ویرایش شد!'
                ]);

        } catch (\Exception $exception) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'brandGenerateError' =>
                        '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
