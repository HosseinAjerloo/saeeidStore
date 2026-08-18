<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attribute\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $attributes=Attribute::
        $totalAttribute=Attribute::count();
        $totalAttributeNormal=Attribute::where('type','normal')->count();
        $totalAttributeColor=Attribute::where('type','color')->count();
        $totalAttributeValues=Attribute::withCount('attributeValues as totalValues')->value('totalValues');

        $details = collect([
            $totalAttribute,
            $totalAttributeNormal,
            $totalAttributeColor,
            $totalAttributeValues
        ]);
        return view('admin.attribute.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeRequest $request)
    {
        try {
            $inputs=$request->all();
            $attribute=Attribute::create($inputs);
            $attribute->attributeValues()->create($inputs['values']);
            return redirect()->route('admin.attribute.index')->with(['success'=>'ویژگی جدید با موفیقت ساخته شد']);
        }catch (\Exception $exception)
        {
            return redirect()->back()->withInput()->withErrors(['attributeGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

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
