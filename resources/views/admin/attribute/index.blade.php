@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد ویژگی جدید</title>
@endsection
@section('content')

    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="absolute -left-16 -top-20 h-52 w-52 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div><span class="chip bg-brand-500/10 text-brand-300">مشخصات قابل انتخاب</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">ویژگی‌های محصولات</h2>
                    <p class="mt-2 text-sm text-slate-400">مدیریت ویژگی‌های معمولی، رنگی و مقادیر وابسته</p></div>
                <a href="attributes-create.html"
                   class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow">+
                    ایجاد ویژگی جدید</a></div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل ویژگی‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-white">۱۸</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ویژگی معمولی</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">۱۴</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ویژگی رنگی</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">۴</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل مقادیر</p>
                <p class="mt-2 text-2xl font-extrabold text-amberx">۹۶</p></div>
        </section>
        <section class="glass-card overflow-hidden p-0">
            <div class="list-toolbar">
                <div class="table-search">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M21 21l-5-5m0 0A7 7 0 105 5a7 7 0 0011 11z"></path>
                    </svg>
                    <input data-table-search="" type="search" placeholder="جستجو در نام، نامک یا مقادیر..."><kbd>Ctrl
                        K</kbd></div>
                <div class="flex items-center gap-2 text-xs text-slate-500"><span
                        class="h-2 w-2 rounded-full bg-brand-400"></span><span data-result-count="">۶</span> ویژگی نمایش
                    داده می‌شود
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>ویژگی</th>
                        <th>نامک</th>
                        <th>نوع</th>
                        <th>مقادیر</th>
                        <th>تعداد مقادیر</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">🎨</span>
                                <div><b class="block text-sm text-white">رنگ</b><small
                                        class="text-[10px] text-slate-600">انتخاب رنگ محصول</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">color</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">رنگی</span></td>
                        <td>
                            <div class="flex gap-1.5"><span
                                    class="h-6 w-6 rounded-full border-2 border-ink-850 bg-slate-950"
                                    title="مشکی"></span><span
                                    class="h-6 w-6 rounded-full border-2 border-ink-850 bg-white"
                                    title="سفید"></span><span
                                    class="h-6 w-6 rounded-full border-2 border-ink-850 bg-rose"
                                    title="قرمز"></span><span
                                    class="h-6 w-6 rounded-full border-2 border-ink-850 bg-blue-500" title="آبی"></span>
                            </div>
                        </td>
                        <td>۸ مقدار</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="attributes-create.html"
                                                                   class="table-action edit">✎</a>
                                <button data-delete="رنگ" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">▣</span>
                                <div><b class="block text-sm text-white">حافظه داخلی</b><small
                                        class="text-[10px] text-slate-600">ظرفیت ذخیره‌سازی</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">storage</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">معمولی</span></td>
                        <td>
                            <div class="flex gap-1"><span class="chip bg-white/5 text-slate-400">۱۲۸GB</span><span
                                    class="chip bg-white/5 text-slate-400">۲۵۶GB</span><span
                                    class="chip bg-white/5 text-slate-400">۵۱۲GB</span></div>
                        </td>
                        <td>۴ مقدار</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="attributes-create.html"
                                                                   class="table-action edit">✎</a>
                                <button data-delete="حافظه داخلی" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">↔</span>
                                <div><b class="block text-sm text-white">اندازه</b><small
                                        class="text-[10px] text-slate-600">سایزبندی محصول</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">size</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">معمولی</span></td>
                        <td>
                            <div class="flex gap-1"><span class="chip bg-white/5 text-slate-400">S</span><span
                                    class="chip bg-white/5 text-slate-400">M</span><span
                                    class="chip bg-white/5 text-slate-400">L</span><span
                                    class="chip bg-white/5 text-slate-400">XL</span></div>
                        </td>
                        <td>۶ مقدار</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="attributes-create.html"
                                                                   class="table-action edit">✎</a>
                                <button data-delete="اندازه" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">◇</span>
                                <div><b class="block text-sm text-white">جنس</b><small
                                        class="text-[10px] text-slate-600">متریال و جنس بدنه</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">material</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">معمولی</span></td>
                        <td>
                            <div class="flex gap-1"><span class="chip bg-white/5 text-slate-400">فلز</span><span
                                    class="chip bg-white/5 text-slate-400">پلاستیک</span><span
                                    class="chip bg-white/5 text-slate-400">شیشه</span></div>
                        </td>
                        <td>۵ مقدار</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="attributes-create.html"
                                                                   class="table-action edit">✎</a>
                                <button data-delete="جنس" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar">⌁</span>
                                <div><b class="block text-sm text-white">نوع اتصال</b><small
                                        class="text-[10px] text-slate-600">روش اتصال دستگاه</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">connection-type</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">معمولی</span></td>
                        <td>
                            <div class="flex gap-1"><span class="chip bg-white/5 text-slate-400">بی‌سیم</span><span
                                    class="chip bg-white/5 text-slate-400">باسیم</span></div>
                        </td>
                        <td>۲ مقدار</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="attributes-create.html"
                                                                   class="table-action edit">✎</a>
                                <button data-delete="نوع اتصال" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable="">
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar opacity-50">♢</span>
                                <div><b class="block text-sm text-white">گارانتی</b><small
                                        class="text-[10px] text-slate-600">مدت خدمات پس از فروش</small></div>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left text-slate-500">warranty</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300">معمولی</span></td>
                        <td>
                            <div class="flex gap-1"><span class="chip bg-white/5 text-slate-400">۱۲ ماه</span><span
                                    class="chip bg-white/5 text-slate-400">۱۸ ماه</span></div>
                        </td>
                        <td>۳ مقدار</td>
                        <td><span class="chip bg-white/5 text-slate-400"><span class="status-dot bg-slate-500"></span>غیرفعال</span>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="attributes-create.html"
                                                                   class="table-action edit">✎</a>
                                <button data-delete="گارانتی" class="table-action delete">⌫</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center"><p
                        class="text-sm font-bold text-slate-300">ویژگی‌ای پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">نام یا مقدار دیگری را جستجو کنید.</p></div>
            </div>
            <div class="table-footer"><p class="text-xs text-slate-600">نمایش ۱ تا ۶ از ۱۸ ویژگی</p>
                <nav class="flex gap-1">
                    <button class="pagination-btn" disabled="">‹</button>
                    <button class="pagination-btn active">۱</button>
                    <button class="pagination-btn">۲</button>
                    <button class="pagination-btn">۳</button>
                    <button class="pagination-btn">›</button>
                </nav>
            </div>
        </section>
    </main>
@endsection
