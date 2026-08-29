<div class="top-bar">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-none d-md-flex align-items-center gap-3">
                <a href="tel:02112345678"><i class="bi bi-telephone"></i> ۰۲۱-۱۲۳۴۵۶۷۸</a>
                <span class="text-muted-50">|</span>
                <a href="#"><i class="bi bi-envelope"></i> info@zamank.ir</a>
            </div>

        </div>
    </div>
</div>

<!-- === هدر اصلی === -->
<header class="main-header">
    <div class="container py-3">
        <div class="row align-items-center g-3">
            <!-- لوگو -->
            <div class="col-lg-3 col-4">
                <a href="index.html" class="header-logo">
                    <i class="bi bi-clock-history"></i> زمانک
                </a>
            </div>
            <!-- جستجو -->
            <div class="col-lg-6 col-6">
                <div class="search-bar">
                    <input type="text" id="search-input" placeholder="جستجو..." oninput="liveSearch(this)">
                    <button><i class="bi bi-search"></i></button>
                    <div id="search-suggestions" class="dropdown-menu w-100 show d-none" style="position:absolute; top:100%; right:0; border-radius:12px; box-shadow:0 8px 30px rgba(108,92,231,0.12); padding:8px;">

                    </div>
                </div>
            </div>
            <!-- آیکون‌ها -->
            <div class="col-lg-3 col-2">
                <div class="d-flex align-items-center justify-content-end gap-2">
                    <a href="pages/auth-login.html" class="header-icon">
                        <i class="bi bi-person"></i>
                    </a>
                    <a href="pages/profile-favorites.html" class="header-icon d-none d-sm-flex">
                        <i class="bi bi-heart"></i>
                        <span class="badge-count" id="fav-count" style="display:none">0</span>
                    </a>
                    <a href="pages/cart.html" class="header-icon d-none d-sm-flex">
                        <i class="bi bi-bag"></i>
                        <span class="badge-count" id="cart-count" style="display:none">0</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- نوار دسته‌بندی با مگا منو -->
    <nav class="category-nav d-none d-lg-block">
        <div class="container">
            <ul>
                <li><a href="{{route('panel.index')}}"><i class="bi bi-house"></i> خانه</a></li>

                <!-- مگا منو 4 ستونه -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-smartwatch"></i> ساعت مردانه
                    </a>
                    <div class="dropdown-menu mega-menu mega-menu-4col">
                        <div class="row g-3">
                            <div class="col-3">
                                <h6>برندهای محبوب</h6>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> کاسیو</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> سیتیزن</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> سیکو</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> اورینت</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> تیسوت</a>
                            </div>
                            <div class="col-3">
                                <h6>بر اساس نوع</h6>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> دیجیتال</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> آنالوگ</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> کرونوگراف</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> عقربه‌ای</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> اسپرت</a>
                            </div>
                            <div class="col-3">
                                <h6>بر اساس قیمت</h6>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> زیر ۵۰۰ هزار</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> ۵۰۰ تا ۲ میلیون</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> ۲ تا ۵ میلیون</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> ۵ تا ۱۰ میلیون</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> بالای ۱۰ میلیون</a>
                            </div>
                            <div class="col-3">
                                <a href="pages/search.html" class="mega-menu-img">
                                    <div>
                                        <i class="bi bi-tags" style="font-size:48px;"></i>
                                        <h5 class="mt-3">تخفیف‌های ویژه</h5>
                                        <p class="text-white-50">تا ۵۰٪ تخفیف</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- مگا منو 3 ستونه -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-heart"></i> ساعت زنانه
                    </a>
                    <div class="dropdown-menu mega-menu mega-menu-3col">
                        <div class="row g-3">
                            <div class="col-4">
                                <h6>برندهای زنانه</h6>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> مایکل کورس</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> فسیل</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> اسکاگن</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> دنیل ولینگتون</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> انیکس</a>
                            </div>
                            <div class="col-4">
                                <h6>استایل</h6>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> لوکس و شیک</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> روزمره</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> ورزشی</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> کلاسیک</a>
                                <a href="pages/search.html" class="mega-item d-block"><i class="bi bi-arrow-left-short"></i> مجلسی</a>
                            </div>
                            <div class="col-4">
                                <a href="pages/search.html" class="mega-menu-img" style="background:linear-gradient(135deg,#FF6B6B,#6C5CE7);">
                                    <div>
                                        <i class="bi bi-gem" style="font-size:48px;"></i>
                                        <h5 class="mt-3">کالکشن لوکس زنانه</h5>
                                        <p class="text-white-50">بهترین برندهای جهانی</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>


                <li><a href="pages/amazing.html"><i class="bi bi-fire"></i> شگفت‌انگیزها</a></li>

            </ul>
        </div>
    </nav>
</header>

<!-- === منوی موبایل === -->
<div id="mobile-menu" class="mobile-menu d-lg-none" aria-hidden="true">
    <div class="mobile-menu-overlay" onclick="toggleMobileMenu()"></div>
    <div class="mobile-menu-panel" role="dialog" aria-label="منوی اصلی">
        <div class="mobile-menu-header">
            <a href="index.html" class="header-logo">
                <i class="bi bi-clock-history"></i> زمانک
            </a>
            <button type="button" class="mobile-menu-close" onclick="toggleMobileMenu()" aria-label="بستن منو">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <nav class="mobile-menu-nav">
            <a href="index.html" class="mobile-menu-link"><i class="bi bi-house"></i> خانه</a>

            <div class="mobile-menu-group">
                <button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)">
                    <span><i class="bi bi-smartwatch"></i> ساعت مردانه</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="mobile-submenu">
                    <a href="pages/search.html">کاسیو</a>
                    <a href="pages/search.html">سیتیزن</a>
                    <a href="pages/search.html">سیکو</a>
                    <a href="pages/search.html">اورینت</a>
                    <a href="pages/search.html">تیسوت</a>
                    <a href="pages/search.html">دیجیتال</a>
                    <a href="pages/search.html">آنالوگ</a>
                    <a href="pages/search.html">کرونوگراف</a>
                </div>
            </div>

            <div class="mobile-menu-group">
                <button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)">
                    <span><i class="bi bi-heart"></i> ساعت زنانه</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="mobile-submenu">
                    <a href="pages/search.html">مایکل کورس</a>
                    <a href="pages/search.html">فسیل</a>
                    <a href="pages/search.html">اسکاگن</a>
                    <a href="pages/search.html">دنیل ولینگتون</a>
                    <a href="pages/search.html">لوکس و شیک</a>
                    <a href="pages/search.html">روزمره</a>
                    <a href="pages/search.html">مجلسی</a>
                </div>
            </div>

            <div class="mobile-menu-group">
                <button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)">
                    <span><i class="bi bi-grid"></i> همه برندها</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="mobile-submenu">
                    <a href="pages/search.html">Apple</a>
                    <a href="pages/search.html">Casio</a>
                    <a href="pages/search.html">Citizen</a>
                    <a href="pages/search.html">Seiko</a>
                    <a href="pages/search.html">Rolex</a>
                    <a href="pages/search.html">Tissot</a>
                    <a href="pages/search.html">Fossil</a>
                    <a href="pages/search.html">G-Shock</a>
                </div>
            </div>

            <div class="mobile-menu-group">
                <button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)">
                    <span><i class="bi bi-smartwatch"></i> ساعت هوشمند</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="mobile-submenu">
                    <a href="pages/search.html">اپل واچ</a>
                    <a href="pages/search.html">سامسونگ گالکسی واچ</a>
                    <a href="pages/search.html">هواوی واچ</a>
                    <a href="pages/search.html">شیائومی</a>
                    <a href="pages/search.html">آمیزفیت</a>
                </div>
            </div>

            <a href="pages/amazing.html" class="mobile-menu-link"><i class="bi bi-fire"></i> شگفت‌انگیزها</a>
            <a href="pages/compare.html" class="mobile-menu-link"><i class="bi bi-bar-chart"></i> مقایسه</a>
            <a href="pages/blog.html" class="mobile-menu-link"><i class="bi bi-journal"></i> مجله زمانک</a>
            <a href="pages/faq.html" class="mobile-menu-link"><i class="bi bi-question-circle"></i> پرسش‌های متداول</a>
            <a href="pages/auth-login.html" class="mobile-menu-link"><i class="bi bi-person"></i> ورود / ثبت‌نام</a>
        </nav>
    </div>
</div>
