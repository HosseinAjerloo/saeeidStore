<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\TagRequest;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            $input=$request->all();
            Tag::create($input);
            return redirect()->route('admin.tag.index')->with(['success'=>'تگ جدید باموفقیت ساخته شد']);
        }catch (\Exception $e){
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
    public function syncProduct(){
        $products=Product::where('is_active','1')->orderBy('created_at','desc')->cursor();
        $tags=Tag::where('is_active','1')->orderBy('created_at','desc')->cursor();
        return view('admin.tag.sync',compact('products','tags'));
    }
}
