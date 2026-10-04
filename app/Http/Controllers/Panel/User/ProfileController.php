<?php

namespace App\Http\Controllers\Panel\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\Profile\AddressRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();
        return view('panel.user.profile.index', compact('user'));
    }
    public function account()
    {
        return view('panel.user.profile.account');
    }

    public function address()
    {
        $provinces = Province::cursor();
        $cities = City::cursor();
        $user=Auth::user();
        return view('panel.user.profile.address', compact('provinces', 'user','cities'));
    }
    public function address_register(AddressRequest $request)
    {
        try {
            $inputs = $request->all();
            $user = Auth::user();
            $inputs['user_id'] = $user->id;
            if (isset($inputs['default_address'])) {
                Address::where('user_id', $user->id)->update(['default_address' => 0]);
                $inputs['default_address'] = 1;
            }
            Address::create($inputs);
            return redirect()->route('panel.profile.address')->with(['success' => 'ادرس شما با موفقیت اضافه شد']);
        } catch (Exception $e) {
            return redirect()->route('panel.profile.address')->with(['error' => 'اوه خطایی رخ داد لطفا با پشتیبانی هماهنگ شوید']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
