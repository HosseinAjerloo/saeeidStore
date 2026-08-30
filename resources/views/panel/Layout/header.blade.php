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
                    <div id="search-suggestions" class="dropdown-menu w-100 show d-none"
                         style="position:absolute; top:100%; right:0; border-radius:12px; box-shadow:0 8px 30px rgba(108,92,231,0.12); padding:8px;">

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

                @foreach($categories as $category)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img style="width: 1rem" src="{{asset($category->image)}}" alt="">
                            {{$category->name??''}}
                        </a>
                        <div class="dropdown-menu mega-menu mega-menu-4col">
                            <div class="row g-3">
                                @foreach($category->childs as $child)
                                    <div class="col-3">
                                        <a href="pages/search.html" class="mega-item d-block">
                                            <i class="bi bi-arrow-left-short"></i>
                                            <img style="width: 3rem" src="{{asset($child->image)}}" alt="">

                                            {{$child->name}}
                                        </a>

                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </li>
                @endforeach


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
