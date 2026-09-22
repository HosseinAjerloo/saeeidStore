<ul class="profile-menu">
    <li><a href="{{route('panel.profile.index')}}" class="active"><i class="bi bi-grid"></i> داشبورد</a></li>
    <li><a href="profile-orders.html"><i class="bi bi-bag-check"></i> سفارش‌های من</a></li>
    <li><a href="profile-favorites.html"><i class="bi bi-heart"></i> علاقه‌مندی‌ها</a></li>
    <li><a href="profile-recent.html"><i class="bi bi-clock-history"></i> بازدیدهای اخیر</a></li>
    <li><a href="profile-addresses.html"><i class="bi bi-geo-alt"></i> آدرس‌های من</a></li>
    <li><a href="profile-financial.html"><i class="bi bi-credit-card"></i> اطلاعات مالی</a></li>
    <li><a href="{{ route('panel.profile.account') }}"><i class="bi bi-gear"></i> تنظیمات حساب</a></li>
    <li><a href="profile-notifications.html"><i class="bi bi-bell"></i> اعلان‌ها</a></li>
    <li><a href="profile-security.html"><i class="bi bi-shield-lock"></i> امنیت</a></li>
    <li><a href="{{ route('logout') }}" class="text-danger"><i class="bi bi-box-arrow-right"></i> خروج</a>
    </li>
</ul>
