<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\TagRequest;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::search()->paginate(15)->withQueryString();

        $totalTags = Tag::count();
        $totalTagsActive = Tag::where('is_active', '1')->count();
        $totalSyncProduct = DB::table('product_tag')->count();
        $tagNotSync = Tag::doesntHave('products')->count();
        $details = collect([
            'totalTags' => $totalTags,
            'totalTagsActive' => $totalTagsActive,
            'totalSyncProduct' => $totalSyncProduct,
            'tagNotSync' => $tagNotSync
        ]);
        return view('admin.tag.index', compact('details', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        try {
            $input = $request->all();
            Tag::create($input);
            return redirect()->route('admin.tag.index')->with(['success' => 'تگ جدید باموفقیت ساخته شد']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['tagGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

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
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        try {
            $input = $request->all();
            $tag->update($input);
            return redirect()->route('admin.tag.index')->with(['success' => 'تگ جدید باموفقیت ویرایش شد']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['tagUpdateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            return redirect()->route('admin.tag.index')->with(['success' => 'تگ  باموفقیت حذف شد']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['tagDeleteError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }


    public function syncProduct(Product $product)
    {
        $tags = Tag::where('is_active', '1')->orderBy('created_at', 'desc')->cursor();
        return view('admin.tag.sync', compact('product', 'tags'));
    }

    public function syncProductStore(Request $request, Product $product)
    {
        try {
            $inputs = $request->all();
            if (!isset($inputs['tag_ids']))
                $product->tags()->detach();
            else
                $product->tags()->syncOrFail($inputs['tag_ids']);
            return redirect()->route('admin.product.index')->with(['success' => 'تگ با موفقیت به محصول متصل شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['tagGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }

    public function syncProductEdit(Tag $tag)
    {
        $products = Product::withCount('tags as totalTag')->where('is_active', '1')->orderBy('created_at', 'desc')->cursor();
        return view('admin.tag.syncEdit', compact('products', 'tag'));
    }

    public function syncProductUpdate(Tag $tag, Request $request)
    {
        try {
            $inputs = $request->all();
            if (!isset($inputs['product_ids']))
                $tag->products()->detach();
            else
                $tag->products()->syncOrFail($inputs['product_ids']);
            return redirect()->route('admin.tag.index')->with(['success' => 'تگ با موفقیت به محصول متصل شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['tagGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }
}
