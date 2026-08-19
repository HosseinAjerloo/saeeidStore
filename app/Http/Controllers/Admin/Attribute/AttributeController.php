<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attribute\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attribute::search()->paginate(15)->withQueryString();
        $totalAttribute = Attribute::count();
        $totalAttributeNormal = Attribute::where('type', 'normal')->count();
        $totalAttributeColor = Attribute::where('type', 'color')->count();
        $totalAttributeValues = AttributeValue::count();

        $details = collect([
            'totalAttribute'=> $totalAttribute,
            'totalAttributeNormal'=>$totalAttributeNormal,
            'totalAttributeColor'=> $totalAttributeColor,
            'totalAttributeValues'=>$totalAttributeValues
        ]);
        return view('admin.attribute.index', compact('details','attributes'));
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
            $inputs = $request->all();
            $attribute = Attribute::create($inputs);
            $attribute->attributeValues()->createMany($inputs['values']);
            return redirect()->route('admin.attribute.index')->with(['success' => 'ویژگی جدید با موفیقت ساخته شد']);
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['attributeGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attribute.edit',compact('attribute'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {
            $inputs = $request->all();
             $attribute->update($inputs);
             $attributeRemoved=[];
            foreach ($inputs['values'] as $key => $value){
                $attributeValueID=$attribute->attributeValues()->updateOrCreate([
                    'id'=>$key
                ],$value);
                array_push($attributeRemoved,$attributeValueID->id);

            }
            $attribute->attributeValues()
                    ->whereNotIn('id', $attributeRemoved)
                    ->delete();
            return redirect()->route('admin.attribute.index')->with(['success' => 'ویژگی  با موفیقت ویرایش شد']);
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['attributeGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        dd($attribute);
        //todo remove attribute for relation variant_attribute
    }
}
