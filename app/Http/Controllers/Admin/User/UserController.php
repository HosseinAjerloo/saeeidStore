<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userActiveCount = User::where('is_active', 1)->count();
        $userDeActiveCount = User::where('is_active', 0)->count();
        $totalUser = User::count();
        $registerInMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $registerLastMonth = User::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        $registerGrowth = $registerLastMonth > 0
            ? round((($registerInMonth - $registerLastMonth) / $registerLastMonth) * 100)
            : ($registerInMonth > 0 ? 100 : 0);

        $details = collect([
            'userActiveCount' => $userActiveCount,
            'userDeActiveCount' => $userDeActiveCount,
            'totalUser' => $totalUser,

            'registerInMonth' => $registerInMonth,

            'registerLastMonth' => $registerLastMonth,

            'registerGrowth' => $registerGrowth,

            'deActivePercent' => $totalUser > 0
                ? round(($userDeActiveCount / $totalUser) * 100)
                : 0,

            'activePercent' => $totalUser > 0
                ? round(($userActiveCount / $totalUser) * 100)
                : 0,
        ]);
        $users = User::search()->paginate(15)->withQueryString();
        return view('admin.user.index', compact('users', 'details'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $inputs = $request->safe()->all();
            $inputs['date_of_birth'] = normalizeDate($inputs['date_of_birth']);
            $user = User::create($inputs);
            return redirect()->route('admin.user.index')->with(['success' => 'کاربرجدید باموفقیت ساخته شد!']);
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->withErrors(['userGenerateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);
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
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $inputs = $request->safe()->all();

            if (isset($inputs['date_of_birth'])) {
                $inputs['date_of_birth'] = normalizeDate($inputs['date_of_birth']);
            }
            $user->update($inputs);
            return redirect()
                ->route('admin.user.index')
                ->with([
                    'success' => 'اطلاعات کاربر با موفقیت بروزرسانی شد!'
                ]);

        } catch (\Exception $exception) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'userUpdateError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.'
                ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.user.index')->with(['success'=>'کاربر باموفقیت حذف شد!']);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['userDeleteError' => '«متأسفانه خطایی رخ داده است. لطفاً مجدداً تلاش کنید؛ در صورت تداوم مشکل، با واحد پشتیبانی تماس بگیرید.»']);

        }
    }
}
