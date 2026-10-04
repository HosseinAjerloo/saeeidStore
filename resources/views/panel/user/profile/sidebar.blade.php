<div class="col-lg-3">
    <div class="profile-sidebar">
        <div class="profile-user-info">
            <div class="profile-avatar">{{substr(Auth::user()->fullName,0,1)??''}}</div>
            <h6 class="mb-0">{{Auth::user()->fullName??''}}</h6>
            <small class="text-muted-custom">{{Auth::user()->mobile??''}}</small>
        </div>
        <ul class="profile-menu">
            <li><a href="{{ route('panel.profile.index') }}" class="@if(str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'index')) active @endif "><i class="bi bi-grid"></i> داشبورد</a></li>
            <li><a href="profile-orders.html"><i class="bi bi-bag-check"></i> سفارش‌های من</a></li>
            <li><a href="profile-favorites.html"><i class="bi bi-heart"></i> علاقه‌مندی‌ها</a></li>
            <li><a href="profile-recent.html"><i class="bi bi-clock-history"></i> بازدیدهای اخیر</a></li>
            <li><a href="{{ route('panel.profile.address') }}" class="@if(str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'address')) active @endif"><i class="bi bi-geo-alt"></i> آدرس‌های من</a></li>
            <li><a href="profile-financial.html" class=""><i class="bi bi-credit-card"></i> اطلاعات مالی</a></li>
            <li><a href="{{ route('panel.profile.account')}}" class="@if(str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'account')) active @endif"><i class="bi bi-gear"></i> تنظیمات حساب</a></li>
            <li><a href="profile-notifications.html"><i class="bi bi-bell"></i> اعلان‌ها</a></li>
            <li><a href="profile-security.html"><i class="bi bi-shield-lock"></i> امنیت</a></li>
            <li><a href="{{ route('logout') }} " class="text-danger"><i class="bi bi-box-arrow-right"></i> خروج</a>
            </li>
        </ul>
    </div>
</div>
