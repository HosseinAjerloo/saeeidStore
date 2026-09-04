<style>

    /* =========================================================
       CATEGORY DROPDOWN
    ========================================================= */

    .category-dropdown {
        position: relative !important;
        list-style: none;
    }


    /* =========================================================
       MAIN TOGGLE
    ========================================================= */

    .category-menu-toggle {
        display: flex;
        align-items: center;
        gap: 9px;

        padding: 10px 14px;

        border-radius: 10px;

        color: #292929 !important;
        text-decoration: none !important;

        font-size: 14px;
        font-weight: 600;

        transition: all .2s ease;
    }

    .category-menu-toggle:hover {
        background: #f7f7f7;
        color: #e63946 !important;
    }


    /* =========================================================
       MAIN ICON
    ========================================================= */

    .category-menu-icon {
        width: 31px;
        height: 31px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 8px;

        background: #fff1f2;
        color: #e63946;

        transition: all .2s ease;
    }

    .category-menu-toggle:hover .category-menu-icon {
        background: #e63946;
        color: #fff;
    }


    /* =========================================================
       MAIN ARROW
    ========================================================= */

    .category-main-arrow {
        font-size: 9px;
        color: #999;

        transition: all .2s ease;
    }

    .category-menu-toggle:hover .category-main-arrow {
        color: #e63946;
    }


    /* =========================================================
       MAIN MEGA MENU
    ========================================================= */

    .category-mega-menu {

        position: absolute !important;

        top: calc(100% + 8px) !important;

        right: 0 !important;
        left: auto !important;

        /*
         * عرض واقعی پنل اصلی
         */
        width: 850px !important;

        max-width: calc(100vw - 30px) !important;

        min-width: 0 !important;

        padding: 0 !important;

        margin: 0 !important;

        overflow: visible !important;

        border: 1px solid #eeeeee !important;

        border-radius: 16px !important;

        background: #fff !important;

        box-shadow:
            0 18px 50px rgba(0, 0, 0, .12),
            0 4px 12px rgba(0, 0, 0, .04);

        z-index: 99990 !important;
    }


    /* =========================================================
       MAIN HEADER
    ========================================================= */

    .category-mega-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 17px 22px;

        border-bottom: 1px solid #f1f1f1;

        background:
            linear-gradient(
                135deg,
                #ffffff 0%,
                #fff8f8 100%
            );

        border-radius: 16px 16px 0 0;
    }


    .category-mega-label {

        display: block;

        margin-bottom: 3px;

        color: #e63946;

        font-size: 10px;

        font-weight: 600;
    }


    .category-mega-header h5 {

        margin: 0;

        color: #222;

        font-size: 15px;

        font-weight: 700;
    }


    .category-mega-header > i {

        width: 38px;
        height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background: #fff;

        color: #e63946;

        box-shadow:
            0 4px 12px rgba(0, 0, 0, .06);
    }


    /* =========================================================
       MAIN CONTENT
    ========================================================= */

    .category-mega-content {

        width: 100% !important;

        box-sizing: border-box;

        display: grid;

        /*
         * Parentهای اصلی مرتب و مساوی
         */
        grid-template-columns:
        repeat(4, minmax(0, 1fr));

        gap: 22px 28px;

        padding: 22px 30px 25px;

        overflow: visible !important;
    }


    /* =========================================================
       MAIN CATEGORY COLUMN
    ========================================================= */

    .category-column {

        position: relative !important;

        width: 100%;

        min-width: 0;

        max-width: none;

        box-sizing: border-box;
    }


    /* =========================================================
       MAIN CATEGORY TITLE
    ========================================================= */

    .category-title {

        position: relative;

        display: flex;

        align-items: center;

        gap: 8px;

        width: 100%;

        margin: 0 0 7px;

        padding: 2px 2px 9px;

        box-sizing: border-box;

        border-bottom: 1px solid #eeeeee;
    }


    .category-title::after {

        content: "";

        position: absolute;

        right: 0;

        bottom: -1px;

        width: 28px;

        height: 2px;

        border-radius: 5px;

        background: #e63946;
    }


    .category-title-icon {

        width: 27px;
        height: 27px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 7px;

        background: #fff1f2;

        color: #e63946;

        font-size: 12px;
    }


    .category-title a {

        min-width: 0;

        color: #222;

        text-decoration: none;

        font-size: 13px;

        font-weight: 700;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;

        transition: color .18s ease;
    }

    .category-title a:hover {
        color: #e63946;
    }


    /* =========================================================
       CATEGORY LEVEL
    ========================================================= */

    .category-level {

        width: 100%;

        margin: 0;

        padding: 0;

        list-style: none;
    }


    .category-level-item {

        position: relative !important;

        width: 100%;

        height: auto !important;
    }


    /* =========================================================
       CATEGORY LINK
    ========================================================= */

    .category-level-link {

        display: flex;

        align-items: center;

        justify-content: space-between;

        width: 100%;

        min-height: 29px;

        padding: 5px 7px;

        box-sizing: border-box;

        border-radius: 7px;

        color: #666;

        text-decoration: none;

        font-size: 12px;

        transition:
            background .18s ease,
            color .18s ease,
            padding .18s ease;
    }


    .category-level-link:hover {

        background: #fff5f5;

        color: #e63946;

        padding-right: 11px;
    }


    .category-level-link span {

        min-width: 0;

        overflow: hidden;

        white-space: nowrap;

        text-overflow: ellipsis;
    }


    /* =========================================================
       ARROW
    ========================================================= */

    .category-level-arrow {

        width: 17px;
        height: 17px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        margin-right: 4px;

        border-radius: 5px;

        color: #aaa;

        font-size: 8px;

        transition: all .18s ease;
    }


    .category-level-link:hover .category-level-arrow {

        background: #ffe7e9;

        color: #e63946;

        transform: translateX(-2px);
    }


    /* =========================================================
       SUB MENU
    ========================================================= */

    @media (min-width: 769px) {

        .category-submenu {

            position: absolute !important;

            top: -10px !important;

            right: calc(100% + 10px) !important;

            left: auto !important;

            width: 420px !important;

            min-width: 420px !important;

            max-width: 420px !important;

            box-sizing: border-box;

            padding: 13px;

            background: #fff;

            border: 1px solid #eeeeee;

            border-radius: 13px;

            box-shadow:
                0 18px 45px rgba(0, 0, 0, .12),
                0 4px 12px rgba(0, 0, 0, .04);

            opacity: 0;

            visibility: hidden;

            pointer-events: none;

            z-index: 100000;

            transform: translateX(8px);

            transition:
                opacity .16s ease,
                visibility .16s ease,
                transform .16s ease;
        }


        /* =====================================================
           SHOW SUBMENU
        ===================================================== */

        .category-level-item:hover > .category-submenu {

            opacity: 1;

            visibility: visible;

            pointer-events: auto;

            transform: translateX(0);
        }


        /* =====================================================
           SUBMENU TITLE
        ===================================================== */

        .category-submenu-title {

            display: flex;

            align-items: center;

            min-height: 31px;

            padding: 6px 8px;

            margin-bottom: 8px;

            border-radius: 7px;

            background: #fff8f8;

            color: #222;

            font-size: 12px;

            font-weight: 700;
        }


        .category-submenu-title::before {

            content: "";

            width: 3px;

            height: 15px;

            margin-left: 7px;

            border-radius: 5px;

            background: #e63946;
        }


        /* =====================================================
           SUBMENU CHILDREN
        ===================================================== */

        .category-submenu > .category-level {

            display: grid;

            grid-auto-flow: column;

            grid-template-rows:
            repeat(8, minmax(0, auto));

            grid-template-columns:
            repeat(2, minmax(0, 1fr));

            column-gap: 12px;

            row-gap: 2px;

            width: 100%;
        }


        /* =====================================================
           17+ ITEMS
        ===================================================== */

        .category-submenu > .category-level:has(
        > .category-level-item:nth-child(17)
    ) {

            grid-template-columns:
            repeat(3, minmax(0, 1fr));
        }


        /* =====================================================
           25+ ITEMS
        ===================================================== */

        .category-submenu > .category-level:has(
        > .category-level-item:nth-child(25)
    ) {

            grid-template-columns:
            repeat(4, minmax(0, 1fr));
        }


        /* =====================================================
           SUBMENU ITEMS
        ===================================================== */

        .category-submenu .category-level-item {

            width: auto;

            min-width: 0;
        }


        .category-submenu .category-level-link {

            width: 100%;

            min-height: 28px;

            padding: 4px 6px;

            font-size: 11.5px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        /* =====================================================
           LEVEL 3+
        ===================================================== */

        .category-submenu .category-submenu {

            top: -10px !important;

            right: calc(100% + 10px) !important;

            transform: translateX(8px);
        }


        .category-submenu
        .category-level-item:hover
        > .category-submenu {

            opacity: 1;

            visibility: visible;

            pointer-events: auto;

            transform: translateX(0);
        }


        /* =====================================================
           HOVER BRIDGE
        ===================================================== */

        .category-level-item > .category-submenu::before {

            content: "";

            position: absolute;

            top: 0;

            right: -11px;

            width: 11px;

            height: 100%;

            background: transparent;
        }

    }


    /* =========================================================
       LARGE DESKTOP
    ========================================================= */

    @media (min-width: 1200px) {

        .category-mega-menu {

            width: 900px !important;
        }


        .category-mega-content {

            grid-template-columns:
            repeat(4, minmax(0, 1fr));

            gap: 22px 30px;

            padding-left: 32px;

            padding-right: 32px;
        }


        .category-submenu {

            width: 430px !important;

            min-width: 430px !important;

            max-width: 430px !important;
        }
    }


    /* =========================================================
       EXTRA LARGE
    ========================================================= */

    @media (min-width: 1450px) {

        .category-mega-menu {

            width: 980px !important;
        }


        .category-mega-content {

            grid-template-columns:
            repeat(5, minmax(0, 1fr));

            gap: 22px 28px;
        }
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (min-width: 769px) and (max-width: 1100px) {

        .category-mega-menu {

            width: 680px !important;
        }


        .category-mega-content {

            grid-template-columns:
            repeat(3, minmax(0, 1fr));

            gap: 18px 18px;

            padding: 18px 22px;
        }


        .category-submenu {

            width: 370px !important;

            min-width: 370px !important;

            max-width: 370px !important;
        }
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 768px) {

        .category-mega-menu {

            position: absolute !important;

            top: calc(100% + 5px) !important;

            right: 10px !important;

            left: 10px !important;

            width: calc(100vw - 20px) !important;

            min-width: 0 !important;

            max-width: calc(100vw - 20px) !important;

            max-height: calc(100vh - 100px) !important;

            overflow-y: auto !important;

            overflow-x: hidden !important;

            border-radius: 15px !important;
        }


        .category-mega-header {

            padding: 14px 15px;
        }


        .category-mega-content {

            width: 100% !important;

            padding: 15px;

            grid-template-columns:
            repeat(2, minmax(0, 1fr));

            gap: 15px 10px;

            box-sizing: border-box;
        }


        .category-column {

            width: 100%;

            min-width: 0;

            max-width: none;
        }


        /* =====================================================
           MOBILE SUBMENU
        ===================================================== */

        .category-submenu {

            position: static !important;

            width: 100% !important;

            min-width: 0 !important;

            max-width: none !important;

            margin-top: 3px !important;

            padding: 6px 8px !important;

            border: 0 !important;

            border-right: 2px solid #f1f1f1 !important;

            border-radius: 0 !important;

            background: transparent !important;

            box-shadow: none !important;

            display: none;

            opacity: 1 !important;

            visibility: visible !important;

            pointer-events: auto !important;

            transform: none !important;
        }


        .category-level-item:hover > .category-submenu {

            display: block;
        }


        .category-submenu > .category-level {

            display: block !important;
        }


        /* =====================================================
           MOBILE LEVEL 3+
        ===================================================== */

        .category-submenu .category-submenu {

            position: static !important;

            width: 100% !important;

            min-width: 0 !important;

            max-width: none !important;

            margin-right: 7px !important;

            padding: 4px 7px !important;

            border: 0 !important;

            border-right: 2px solid #f3f3f3 !important;

            background: transparent !important;

            box-shadow: none !important;

            display: none;
        }


        .category-submenu
        .category-level-item:hover
        > .category-submenu {

            display: block;
        }


        .category-level-item > .category-submenu::before {

            display: none !important;
        }
    }


    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 450px) {

        .category-mega-content {

            grid-template-columns: 1fr;

            gap: 11px;
        }
    }

</style>
<header class="main-header">
    <div class="container py-3">
        <div class="row align-items-center g-3">
            <!-- لوگو -->
            <div class="col-lg-3 col-4">
                <a href="index.html" class="header-logo">
                    <i class="bi bi-clock-history"></i> فروشگاه محمدی
                </a>
            </div>
            <!-- جستجو -->
            <div class="col-lg-6 col-6">
                <div class="search-bar">
                    <input type="text" id="search-input" placeholder="جستجو..." oninput="liveSearch(this)">
                    <button><i class="bi bi-search"></i></button>
                    <div id="search-suggestions" class="dropdown-menu w-100 show d-none"
                         style="position:absolute; top:100%; right:0; border-radius:12px; box-shadow:0 8px 30px rgba(108,92,231,0.12); padding:8px;"></div>
                </div>
            </div>
            <!-- آیکون‌ها -->
            <div class="col-lg-3 col-2">
                <div class="d-flex align-items-center justify-content-end gap-2">
                    <a href="pages/auth-login.html" class="header-icon">
                        <i class="bi bi-person"></i>
                    </a>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="pages/profile-favorites.html" class="header-icon d-none d-sm-flex">
                            <i class="bi bi-heart"></i>
                            <span class="badge-count" id="fav-count" style="display:none">0</span>
                        </a>
                    @endif
                    <a href="{{route('panel.cart.index')}}" class="header-icon d-none d-sm-flex">
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
                <li>
                    <a href="{{route('panel.index')}}"><i class="bi bi-house">
                        </i>
                        خانه</a>
                </li>
                <li class="dropdown category-dropdown">

                    <a href="#"
                       class="dropdown-toggle category-menu-toggle"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

        <span class="category-menu-icon">
            <i class="bi bi-grid-fill"></i>
        </span>

                        <span>
            دسته بندی ها
        </span>

                        <i class="bi bi-chevron-down category-main-arrow"></i>

                    </a>


                    <div class="dropdown-menu category-mega-menu">

                        <div class="category-mega-header">

                            <div>
                <span class="category-mega-label">
                    دسته‌بندی محصولات
                </span>

                                <h5>
                                    چه چیزی نیاز دارید؟
                                </h5>
                            </div>

                            <i class="bi bi-grid-3x3-gap"></i>

                        </div>


                        <div class="category-mega-content">

                            @foreach($categories as $category)

                                <div class="category-column">

                                    <div class="category-title">

                        <span class="category-title-icon">
                            <i class="bi bi-folder2-open"></i>
                        </span>

                                        <a href="#">
                                            {{ $category->name }}
                                        </a>

                                    </div>


                                    <x-category-menu
                                        :categories="$category->childs"
                                    />

                                </div>

                            @endforeach

                        </div>

                    </div>

                </li>

                <li><a href="pages/amazing.html"><i class="bi bi-fire"></i> شگفت‌انگیزها</a></li>
                <li><a href="{{route('panel.faq')}}"><i class="bi bi-bar-chart"></i> سوال های متداول</a></li>

            </ul>
        </div>
    </nav>
</header>
