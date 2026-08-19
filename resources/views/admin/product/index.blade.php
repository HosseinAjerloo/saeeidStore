@extends('admin.layout.master')

@section('title')
    <title>پنل | محصولات</title>
@endsection
@section('content')
    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="absolute -left-16 -top-20 h-52 w-52 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div><span class="chip bg-brand-500/10 text-brand-300">کاتالوگ فروشگاه</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">فهرست محصولات</h2>
                    <p class="mt-2 text-sm text-slate-400">مدیریت اطلاعات، قیمت، موجودی و وضعیت محصولات</p></div>
                <a href="products-create.html"
                   class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow">+
                    ایجاد محصول جدید</a></div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل محصولات</p>
                <p class="mt-2 text-2xl font-extrabold text-white">۱۶۸</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">محصول فعال</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">۱۴۲</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">موجودی کم</p>
                <p class="mt-2 text-2xl font-extrabold text-amberx">۱۸</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ناموجود</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">۸</p></div>
        </section>
        <section class="glass-card overflow-hidden p-0">
            <div class="list-toolbar">
                <div class="table-search">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M21 21l-5-5m0 0A7 7 0 105 5a7 7 0 0011 11z"></path>
                    </svg>
                    <input data-table-search="" type="search" placeholder="جستجو در نام، کد، گروه یا برند..."><kbd>Ctrl
                        K</kbd></div>
                <div class="flex items-center gap-2 text-xs text-slate-500"><span
                        class="h-2 w-2 rounded-full bg-brand-400"></span><span data-result-count="">۶</span> محصول نمایش
                    داده می‌شود
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="data-table min-w-[64rem]">
                    <thead>
                    <tr>
                        <th>محصول</th>
                        <th>کد محصول</th>
                        <th>گروه</th>
                        <th>برند</th>
                        <th>قیمت</th>
                        <th>موجودی</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">🎧</span>
                                <div><b class="block max-w-52 truncate text-sm text-white">هدفون بی‌سیم سونی</b><small
                                        class="text-[10px] text-slate-600">WH-1000XM5</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">PRD-1001</td>
                        <td>لوازم صوتی</td>
                        <td>سونی</td>
                        <td><b class="text-brand-300">۲,۴۵۰,۰۰۰</b> تومان</td>
                        <td><span class="chip bg-amberx/10 text-amberx">۵ عدد</span></td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="product-variants.html"
                                                                   class="table-action text-aqua-300"
                                                                   title="تنوع‌ها">≡</a><a href="products-create.html"
                                                                                           class="table-action edit">✎</a>
                                <button data-delete="هدفون بی‌سیم سونی" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">⌚</span>
                                <div><b class="block max-w-52 truncate text-sm text-white">ساعت هوشمند اپل</b><small
                                        class="text-[10px] text-slate-600">Series 9</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">PRD-1002</td>
                        <td>گجت پوشیدنی</td>
                        <td>اپل</td>
                        <td><b class="text-brand-300">۱۸,۹۰۰,۰۰۰</b> تومان</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">۲۴ عدد</span></td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="product-variants.html"
                                                                   class="table-action text-aqua-300"
                                                                   title="تنوع‌ها">≡</a><a href="products-create.html"
                                                                                           class="table-action edit">✎</a>
                                <button data-delete="ساعت هوشمند اپل" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">🖥</span>
                                <div><b class="block max-w-52 truncate text-sm text-white">مانیتور گیمینگ
                                        ال‌جی</b><small class="text-[10px] text-slate-600">UltraGear 27</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">PRD-1003</td>
                        <td>کامپیوتر</td>
                        <td>ال‌جی</td>
                        <td><b class="text-brand-300">۱۲,۷۵۰,۰۰۰</b> تومان</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">۱۸ عدد</span></td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="product-variants.html"
                                                                   class="table-action text-aqua-300"
                                                                   title="تنوع‌ها">≡</a><a href="products-create.html"
                                                                                           class="table-action edit">✎</a>
                                <button data-delete="مانیتور گیمینگ ال‌جی" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">📷</span>
                                <div><b class="block max-w-52 truncate text-sm text-white">دوربین کانن EOS</b><small
                                        class="text-[10px] text-slate-600">EOS R10</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">PRD-1004</td>
                        <td>دوربین</td>
                        <td>کانن</td>
                        <td><b class="text-brand-300">۲۸,۵۰۰,۰۰۰</b> تومان</td>
                        <td><span class="chip bg-amberx/10 text-amberx">۳ عدد</span></td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="product-variants.html"
                                                                   class="table-action text-aqua-300"
                                                                   title="تنوع‌ها">≡</a><a href="products-create.html"
                                                                                           class="table-action edit">✎</a>
                                <button data-delete="دوربین کانن EOS" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">💻</span>
                                <div><b class="block max-w-52 truncate text-sm text-white">لپ‌تاپ ایسوس ROG</b><small
                                        class="text-[10px] text-slate-600">Strix G16</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">PRD-1005</td>
                        <td>لپ‌تاپ</td>
                        <td>ایسوس</td>
                        <td><b class="text-brand-300">۴۵,۲۰۰,۰۰۰</b> تومان</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">۷ عدد</span></td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="product-variants.html"
                                                                   class="table-action text-aqua-300"
                                                                   title="تنوع‌ها">≡</a><a href="products-create.html"
                                                                                           class="table-action edit">✎</a>
                                <button data-delete="لپ‌تاپ ایسوس ROG" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar opacity-50">📱</span>
                                <div><b class="block max-w-52 truncate text-sm text-white">گوشی سامسونگ S24</b><small
                                        class="text-[10px] text-slate-600">Galaxy S24</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">PRD-1006</td>
                        <td>موبایل</td>
                        <td>سامسونگ</td>
                        <td><b class="text-brand-300">۳۲,۰۰۰,۰۰۰</b> تومان</td>
                        <td><span class="chip bg-rose/10 text-rose">ناموجود</span></td>
                        <td><span class="chip bg-white/5 text-slate-400"><span class="status-dot bg-slate-500"></span>غیرفعال</span>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="product-variants.html"
                                                                   class="table-action text-aqua-300"
                                                                   title="تنوع‌ها">≡</a><a href="products-create.html"
                                                                                           class="table-action edit">✎</a>
                                <button data-delete="گوشی سامسونگ S24" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center"><p
                        class="text-sm font-bold text-slate-300">محصولی پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">نام، کد، گروه یا برند دیگری را جستجو کنید.</p></div>
            </div>
            <div class="table-footer"><p class="text-xs text-slate-600">نمایش ۱ تا ۶ از ۱۶۸ محصول</p>
                <nav class="flex gap-1">
                    <button class="pagination-btn" disabled="">‹</button>
                    <button class="pagination-btn active">۱</button>
                    <button class="pagination-btn">۲</button>
                    <button class="pagination-btn">۳</button>
                    <span class="pagination-btn">…</span>
                    <button class="pagination-btn">۲۸</button>
                    <button class="pagination-btn">›</button>
                </nav>
            </div>
        </section>
    </main>
@endsection
