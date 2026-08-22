<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Http\Requests\Admin\Product\Variant\VariantRequest;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\productBrand;
use App\Models\ProductGroup;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;
use App\service\imageService\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::search()->paginate(15)->withQueryString();
        $totalProduct = Product::count();
        $totalProductActive = Product::where('is_active', '1')->count();
        $totalProductLowStock = Product::withCount(['productVariant' => function ($query) {
            $query->where('is_active', '1')->where('stock', "<", "50");
        }])->value('product_variant_count');
        $totalProductLowStockZero = Product::withCount(['productVariant' => function ($query) {
            $query->where('is_active', '1')->where('stock', "0");
        }])->value('product_variant_count');
        $details = collect([
            'totalProduct' => $totalProduct,
            'totalProductActive' => $totalProductActive,
            'totalProductLowStock' => $totalProductLowStock,
            'totalProductLowStockZero' => $totalProductLowStockZero
        ]);
        return view('admin.product.index', compact('products', 'details'));
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
        $brands = productBrand::where('is_active', '1')->get();
        return view('admin.product.create', compact('groups', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageService $imageService, ProductRequest $request)
    {
        try {
            $image = $request->file('image');
            $input = $request->all();
            $path = $imageService->setFile($image)->basePath(public_path())->setRootPath('product')->generator();
            if ($path) {
                $input['image'] = $path;
                #todo add user id in creator
//               $input['user_id']=$path;

                Product::create($input);
                return redirect()->route('admin.product.index')->with(['success' => 'محصول جدید باموفقیت ساخته شد!']);
            }
            throw new \Exception("con n't save image path");

        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['productGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);
        }
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductGroup::where('is_active', '1')->with('childs')->whereNull('parent_id')->get();
        $groups = $categories->map(function ($group) {
            return $group->buildTree($group);
        });
        $brands = productBrand::where('is_active', '1')->get();
        return view('admin.product.edit', compact('groups', 'brands','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageService $imageService, ProductRequest $request,Product $product)
    {
        try {
            $image = $request->file('image');
            $input = $request->all();
            if ($image)
            {
                $is_removed=$imageService->basePath(public_path())->removeFile($product->image);
                if (!$is_removed)
                    throw new \Exception("Can't remove image ");

                 $path = $imageService->setFile($image)->basePath(public_path())->setRootPath('product')->generator();
                 if (!$path)
                     throw new \Exception("Can't generate image file");
                $input['image']=$path;

            }
                #todo add user id in creator
//               $input['user_id']=$path;
                $product->update($input);
                return redirect()->route('admin.product.index')->with(['success' => 'محصول باموفقیت ویرایش شد!']);


        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['productGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function variant(Product $product)
    {
        $attributes = Attribute::where('is_active', '1')->with(['attributeValues' => function ($query) {
            $query->where('is_active', '1');
        }])->get();
        $attributeWithAttributesValue = $attributes->map(function ($attribute) {

            return [
                'id' => $attribute->id,
                'name' => $attribute->name ?? '',
                'type' => $attribute->type ?? '',
                'values' => $attribute->attributeValues->map(function ($attributeValue) {
                    return [
                        'id' => $attributeValue->id,
                        'label' => $attributeValue->value,
                        'value' => $attributeValue->value,
                        'code' => $attributeValue->id
                    ];
                })->values()
            ];
        })->keyBy('id');

        return view('admin.product.variant.create', compact('product', 'attributes', 'attributeWithAttributesValue'));
    }

    public function variantUpdate(Product $product)
    {

    }

    public function variantStore(Product $product, VariantRequest $request)
    {
        try {
            DB::beginTransaction();
            foreach ($request->input('variants') as $variant) {

                $productVariant=$product->productVariant()->create([
                    'sku' => $variant['sku'],
                    'price' => $variant['price'],
                    'stock' => $variant['stock'],
                    'is_active' => $variant['is_active'] ?? 0,
                ]);


                foreach ($variant['attributes'] as $attribute) {
                    $productVariant->variantAttributes()->create([
                        'attribute_id' => $attribute['attribute_id'],
                        'attribute_value_id' => $attribute['attribute_value_id'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.product.index')->with(['success' => 'ویژگی های محصول اضافه شد']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.product.index')->withErrors([
                'productGenerateErrorAttributes' =>
                    '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»'
            ]);
        }

    }

    public function editVariant(Product $product, ProductVariant $productVariant)
    {
        $attributes = Attribute::where('is_active', '1')->with(['attributeValues' => function ($query) {
            $query->where('is_active', '1');
        }])->get();
        $attributeWithAttributesValue = $attributes->map(function ($attribute) {

            return [
                'id' => $attribute->id,
                'name' => $attribute->name ?? '',
                'type' => $attribute->type ?? '',
                'values' => $attribute->attributeValues->map(function ($attributeValue) {
                    return [
                        'id' => $attributeValue->id,
                        'label' => $attributeValue->value,
                        'value' => $attributeValue->value,
                        'code' => $attributeValue->id
                    ];
                })->values()
            ];
        })->keyBy('id');
        return view('admin.product.variant.edit', compact('product', 'productVariant', 'attributes', 'attributeWithAttributesValue'));
    }

    public function updateVariant(
        VariantRequest $request,
        Product $product,
        ProductVariant $productVariant,
    ) {
        try {
            DB::beginTransaction();

                $productVariant->variantAttributes()->delete();
                $productVariant->delete();
            foreach ($request->input('variants') as $variant) {

                $productVariant=ProductVariant::create([
                    'sku' => $variant['sku'],
                    'price' => $variant['price'],
                    'stock' => $variant['stock'],
                    'is_active' => $variant['is_active'] ?? 0,
                    'product_id'=>$product->id
                ]);


                foreach ($variant['attributes'] as $attribute) {
                    $productVariant->variantAttributes()->create([
                        'attribute_id' => $attribute['attribute_id'],
                        'attribute_value_id' => $attribute['attribute_value_id'],
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.product.index')
                ->with('success', 'ویژگی‌های محصول با موفقیت بروزرسانی شد');

        } catch (\Exception $e) {
        dd($e->getMessage());
            DB::rollBack();

            return redirect()
                ->route('admin.product.index')
                ->withErrors([
                    'productGenerateErrorAttributes' =>
                        'متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.'
                ]);
        }
    }
    public function destroyVariant(ProductVariant $productVariant ){
        try {
            $productVariant->variantAttributes()->delete();
            $productVariant->delete();
            return redirect()->back()->with(['success'=>'ویژگی محصول با موفقیت حذف شد']);
        }catch (\Exception $exception){
            return redirect()->back() ->withErrors([
                'productGenerateErrorAttributes' =>
                    'متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.'
            ]);

        }
    }

    public function show(Product $product)
    {

        return view('admin.product.variant.show', compact('product'));
    }
}
