@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد گروه محصولات</title>
@endsection
@section('content')

    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="absolute -left-16 -top-20 h-52 w-52 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div><span class="chip bg-brand-500/10 text-brand-300">ساختار فروشگاه</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">گروه‌بندی محصولات</h2>
                    <p class="mt-2 text-sm text-slate-400">مدیریت گروه‌ها و زیرگروه‌های کاتالوگ فروشگاه</p></div>
                <a href="{{route('admin.category.create')}}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow transition-all hover:shadow-glow-lg">+
                    ایجاد گروه جدید</a>
            </div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل گروه‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-white">۲۴</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">گروه‌های اصلی</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">۸</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">زیرگروه‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">۱۶</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">غیرفعال</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">۳</p></div>
        </section>
        <section class="glass-card animate-fade-up stagger-2 overflow-hidden p-0">
            <div class="list-toolbar">
                <div class="table-search">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-5.2-5.2m0 0A7.5 7.5 0 105.2 5.2a7.5 7.5 0 0010.6 10.6z"></path>
                    </svg>
                    <input data-table-search="" type="search" placeholder="جستجو در نام، نامک یا گروه والد..."><kbd>Ctrl
                        K</kbd></div>
                <div class="flex items-center gap-2 text-xs text-slate-500"><span
                        class="h-2 w-2 rounded-full bg-brand-400"></span><span data-result-count="">۶</span> گروه نمایش
                    داده می‌شود
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>گروه</th>
                        <th>نامک</th>
                        <th>گروه والد</th>
                        <th>محصولات</th>
                        <th>ترتیب</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">💻</span>
                                <div><b class="block text-sm text-white">کالای دیجیتال</b><small
                                        class="mt-1 block text-[10px] text-slate-600">گروه اصلی</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left font-medium text-slate-500">digital-products</td>
                        <td>—</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">۱۲۸ محصول</span></td>
                        <td>۱</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="groups-create.html" class="table-action edit"
                                                                   aria-label="ویرایش کالای دیجیتال">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M15 5l4 4L8 20H4v-4L15 5z"></path>
                                    </svg>
                                </a>
                                <button data-delete="کالای دیجیتال" class="table-action delete"
                                        aria-label="حذف کالای دیجیتال">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M4 7h16M9 7V4h6v3m-9 0l1 14h10l1-14M10 11v6m4-6v6"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">📱</span>
                                <div><b class="block text-sm text-white">موبایل و تبلت</b><small
                                        class="mt-1 block text-[10px] text-slate-600">زیرگروه</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">mobile-tablet</td>
                        <td>کالای دیجیتال</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">۴۶ محصول</span></td>
                        <td>۲</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="groups-create.html" class="table-action edit"
                                                                   aria-label="ویرایش موبایل">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M15 5l4 4L8 20H4v-4L15 5z"></path>
                                    </svg>
                                </a>
                                <button data-delete="موبایل و تبلت" class="table-action delete">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M4 7h16M9 7V4h6v3m-9 0l1 14h10l1-14"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">⌂</span>
                                <div><b class="block text-sm text-white">خانه و آشپزخانه</b><small
                                        class="mt-1 block text-[10px] text-slate-600">گروه اصلی</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">home-kitchen</td>
                        <td>—</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">۲۴۶ محصول</span></td>
                        <td>۳</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="groups-create.html" class="table-action edit">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M15 5l4 4L8 20H4v-4L15 5z"></path>
                                    </svg>
                                </a>
                                <button data-delete="خانه و آشپزخانه" class="table-action delete">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M4 7h16M9 7V4h6v3m-9 0l1 14h10l1-14"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">✦</span>
                                <div><b class="block text-sm text-white">مد و پوشاک</b><small
                                        class="mt-1 block text-[10px] text-slate-600">گروه اصلی</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">fashion</td>
                        <td>—</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">۹۴ محصول</span></td>
                        <td>۴</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="groups-create.html" class="table-action edit">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M15 5l4 4L8 20H4v-4L15 5z"></path>
                                    </svg>
                                </a>
                                <button data-delete="مد و پوشاک" class="table-action delete">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M4 7h16M9 7V4h6v3m-9 0l1 14h10l1-14"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">●</span>
                                <div><b class="block text-sm text-white">ورزش و سفر</b><small
                                        class="mt-1 block text-[10px] text-slate-600">گروه اصلی</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">sport-travel</td>
                        <td>—</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">۷۱ محصول</span></td>
                        <td>۵</td>
                        <td><span class="chip bg-white/5 text-slate-400"><span class="status-dot bg-slate-500"></span>غیرفعال</span>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="groups-create.html" class="table-action edit">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M15 5l4 4L8 20H4v-4L15 5z"></path>
                                    </svg>
                                </a>
                                <button data-delete="ورزش و سفر" class="table-action delete">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M4 7h16M9 7V4h6v3m-9 0l1 14h10l1-14"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">🎧</span>
                                <div><b class="block text-sm text-white">لوازم جانبی صوتی</b><small
                                        class="mt-1 block text-[10px] text-slate-600">زیرگروه</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">audio-accessories</td>
                        <td>کالای دیجیتال</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">۳۲ محصول</span></td>
                        <td>۶</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="groups-create.html" class="table-action edit">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M15 5l4 4L8 20H4v-4L15 5z"></path>
                                    </svg>
                                </a>
                                <button data-delete="لوازم جانبی صوتی" class="table-action delete">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path d="M4 7h16M9 7V4h6v3m-9 0l1 14h10l1-14"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center">
                    <div class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-white/[0.04] text-slate-600">
                        ⌕
                    </div>
                    <p class="mt-4 text-sm font-bold text-slate-300">نتیجه‌ای پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">عبارت دیگری را جستجو کنید.</p></div>
            </div>
            <div class="table-footer"><p class="text-xs text-slate-600">نمایش ۱ تا ۶ از ۲۴ گروه</p>
                <nav class="flex items-center gap-1" aria-label="صفحه‌بندی">
                    <button class="pagination-btn" disabled="">‹</button>
                    <button class="pagination-btn active">۱</button>
                    <button class="pagination-btn">۲</button>
                    <button class="pagination-btn">۳</button>
                    <button class="pagination-btn">۴</button>
                    <button class="pagination-btn">›</button>
                </nav>
            </div>
        </section>
    </main>
@endsection
