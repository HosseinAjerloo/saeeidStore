<?php

namespace App\Http\Controllers\Admin\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Courier\CourierRequest;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couriers = Courier::search()->paginate(15)->withQueryString();
        $query = Courier::class;
        $details = collect();
        $details->put('totalCount', $query::count());
        $details->put('totalActive', $query::where('is_active', 'active')->count());
        $details->put('totalInactive', $query::where('is_active', 'inactive')->count());

        return view('admin.courier.index', compact('couriers', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.courier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourierRequest $request)
    {
        $inputs = $request->all();
        $inputs['is_active'] = $inputs['is_active'] == '1' ? 'active' : 'inactive';
        Courier::create($inputs);
        return redirect()->route('admin.courier.index')->with(['success' => 'پیک جدید باموفقیت ساخته شد']);
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
    public function edit(Courier $courier)
    {
        return view('admin.courier.edit', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourierRequest $request, Courier $courier)
    {
        $inputs = $request->all();
        $inputs['is_active'] = $inputs['is_active'] == '1' ? 'active' : 'inactive';
        $courier->update($inputs);
        return redirect()->route('admin.courier.index')->with(['success' => 'پیک جدید باموفقیت ویرایش شد']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect()->route('admin.courier.index')->with(['success' => 'پیک جدید باموفقیت حذف  شد']);
    }
}
