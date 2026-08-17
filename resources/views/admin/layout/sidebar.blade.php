<aside id="sidebar"
       class="fixed right-0 top-0 z-40 flex h-screen w-72 translate-x-full flex-col border-l border-white/[0.06] bg-ink-900/85 backdrop-blur-2xl transition-transform duration-500 ease-spring lg:translate-x-0">
    <div class="flex items-center gap-3 px-6 pb-6 pt-7">
        <div
            class="relative grid h-11 w-11 place-items-center rounded-2xl bg-gradient-to-br from-brand-400 to-aqua-500 text-xl font-black text-ink-950 shadow-glow">
            M
        </div>
        <div><h1 class="text-lg font-extrabold text-white">فروشگاه بزرگ محمدی</h1>
            <p class="text-[11px] text-slate-500">پنل مدیریت هوشمند</p></div>
        <button id="closeSidebarBtn" class="icon-btn mr-auto lg:hidden">×</button>
    </div>
    <nav class="flex-1 space-y-6 overflow-y-auto px-4">
        <div><p class="mb-2 px-4 text-[11px] font-semibold text-slate-600">منوی اصلی</p>
            <ul class="space-y-1">
                <li><a href="index.html" class="nav-item"><span>⌂</span>داشبورد</a></li>
                <li><a href="orders.html" class="nav-item"><span>□</span>سفارش‌ها</a></li>
                <li><a href="products-index.html" class="nav-item"><span>▣</span>محصولات</a></li>
                <li><a href="{{route('admin.user.index')}}" class="nav-item {{str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'admin.user')?'active':''}}"><span>○</span>کاربران</a></li>
            </ul>
        </div>
        <div><p class="mb-2 px-4 text-[11px] font-semibold text-slate-600">کاتالوگ</p>
            <ul class="space-y-1">
                <li>
                    <a href="{{route('admin.category.index')}}" class="nav-item {{str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'admin.category')?'active':''}}">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path d="M3 6h7l2 2h9v11H3z"></path>
                        </svg>
                        گروه‌بندی محصولات
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.brand.index')}}" class="nav-item {{str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'admin.brand')?'active':''}}">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M10 3H5v7l8 10 7-7L10 3z"></path>
                        </svg>
                        برندها
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</aside>
