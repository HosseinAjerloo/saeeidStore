<?php

namespace App\Http\Controllers\Admin\Discount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts=Discount::paginate(15);
        return view('admin.discount.index',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        try {
            $inputs = $request->all();
            $inputs['starts_at']=date('Y-m-d',$inputs['starts_at']);
            $inputs['expires_at']=date('Y-m-d',$inputs['expires_at']);
            if ($inputs['scope']=='product')
            {
                $inputs['min_order_amount']=null;
                $inputs['max_order_amount']=null;
            }
            Discount::create([
                ...$inputs,
                'code' => $inputs['scope'] == 'user' ? Discount::generateDiscountCode() : null
            ]);
            return redirect()->route('admin.discount.index')->with(['success' => 'تخفیف با موفقیت ساخته شد']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['discountGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

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
    public function edit(Discount $discount)
    {
       return view('admin.discount.edit',compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        try {
            $inputs = $request->all();
            $inputs['starts_at']=date('Y-m-d',$inputs['starts_at']);
            $inputs['expires_at']=date('Y-m-d',$inputs['expires_at']);
            $discount->update([
                ...$inputs,
                'code' => $inputs['scope'] == 'user' ? $discount->code : null
            ]);
            return redirect()->route('admin.discount.index')->with(['success' => 'تخفیف با موفقیت ویرایش شد']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['discountGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

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
