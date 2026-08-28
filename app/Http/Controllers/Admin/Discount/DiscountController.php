<?php

namespace App\Http\Controllers\Admin\Discount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::search()->paginate(15)->withQueryString();
        $totalDiscount = Discount::count();
        $activeAndReputable = Discount::whereHas('products', function ($query) {
            $query->where('discountables.used', 0);
        })->orWhereHas('users', function ($query) {
            $query->where('discountables.used', 0);
        })->count();

        $inactive = Discount::where('expires_at', '<', Carbon::now()->toDateString())->count();

        $details = collect([
            'totalDiscount' => $totalDiscount,
            'activeAndReputable' => $activeAndReputable,
            'inactive' => $inactive
        ]);

        return view('admin.discount.index', compact('discounts', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::where('is_active','1')->cursor();
        $products=Product::where('is_active','1')->cursor();
        return view('admin.discount.create',compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        try {
            $inputs = $request->all();

            $inputs['starts_at'] = date('Y-m-d', $inputs['starts_at']);
            $inputs['expires_at'] = date('Y-m-d', $inputs['expires_at']);
            if ($inputs['scope'] == 'product') {
                $inputs['min_order_amount'] = null;
                $inputs['max_order_amount'] = null;
            }
            $discount=Discount::create([
                ...$inputs,
                'code' => $inputs['scope'] == 'user' ? Discount::generateDiscountCode() : null
            ]);
            $type=($inputs['scope']=='user'?'users':'products');
            $discount->$type()->attach($inputs['connection']);
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
        $users=User::where('is_active','1')->cursor();
        $products=Product::where('is_active','1')->cursor();
        return view('admin.discount.edit', compact('discount','users','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        try {
            $inputs = $request->all();
            $inputs['starts_at'] = date('Y-m-d', $inputs['starts_at']);
            $inputs['expires_at'] = date('Y-m-d', $inputs['expires_at']);

            if ($inputs['scope'] == 'product') {
                $inputs['min_order_amount'] = null;
                $inputs['max_order_amount'] = null;
            }

            $discount->update([
                ...$inputs,
                'code' => $inputs['scope'] == 'user' ? Discount::generateDiscountCode() : null
            ]);
            $type=($inputs['scope']=='user'?'users':'products');
            $discount->$type()->detach();
            $discount->$type()->attach($inputs['connection']);
            return redirect()->route('admin.discount.index')->with(['success' => 'تخفیف با موفقیت ویرایش شد']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['discountGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        try {
            $discount->products()->detach();
            $discount->users()->detach();
            $discount->delete();
            return redirect()->back()->with(['success' => 'کدتخفیف شما با موفقیت حذف شد']);
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['discountDestroyError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }
}
