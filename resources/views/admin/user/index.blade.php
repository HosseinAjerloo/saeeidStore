@section('title')
    <title>پنل | کاربران</title>
@endsection
@extends('admin.layout.master')
@section('content')
    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="absolute -left-16 -top-20 h-52 w-52 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div><span class="chip bg-brand-500/10 text-brand-300">مدیریت حساب‌ها</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">کاربران سامانه</h2>
                    <p class="mt-2 text-sm text-slate-400">مشاهده و مدیریت اطلاعات هویتی، تماس و وضعیت فعالیت
                        کاربران</p></div>
                <a href="{{route('admin.user.create')}}"
                   class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow">+
                    ایجاد کاربر جدید</a></div>
        </section>

        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل کاربران</p>
                <p class="mt-2 text-2xl font-extrabold text-white">۱,۲۸۴</p>
                <p class="mt-2 text-[10px] text-slate-600">همه حساب‌های ثبت‌شده</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کاربران فعال</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">۱,۱۹۶</p>
                <p class="mt-2 text-[10px] text-slate-600">۹۳٪ از کل کاربران</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ثبت‌نام این ماه</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">۷۶</p>
                <p class="mt-2 text-[10px] text-slate-600">۱۲٪ رشد نسبت به قبل</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">غیرفعال</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">۸۸</p>
                <p class="mt-2 text-[10px] text-slate-600">نیازمند بررسی وضعیت</p></div>
        </section>

        <section class="glass-card overflow-hidden p-0">
            <div class="list-toolbar">
                <div class="table-search"><span
                        class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-600">⌕</span><input
                        data-table-search type="search" placeholder="جست‌وجو در نام، موبایل، ایمیل یا کد ملی..."/><kbd>Ctrl
                        K</kbd></div>
                <div class="flex items-center gap-2 text-xs text-slate-500"><span
                        class="h-2 w-2 rounded-full bg-brand-400"></span><span data-result-count>۶</span> کاربر نمایش
                    داده می‌شود
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="data-table min-w-[72rem]">
                    <thead>
                    <tr>
                        <th>کاربر</th>
                        <th>اطلاعات تماس</th>
                        <th>کد ملی</th>
                        <th>جنسیت</th>
                        <th>تاریخ تولد</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-searchable>
                        <td>
                            <div class="flex items-center gap-3"><span
                                    class="row-avatar bg-brand-500/10 text-brand-300">ع‌ا</span>
                                <div><b class="block text-sm text-white">علی احمدی</b><small
                                        class="text-[10px] text-slate-600">کاربر شماره ۱۰۰۱</small></div>
                            </div>
                        </td>
                        <td>
                            <div dir="ltr" class="text-left"><b
                                    class="block text-xs text-slate-300">09121234567</b><small
                                    class="mt-1 block text-[10px] text-aqua-400">ali.ahmadi@example.com</small></div>
                        </td>
                        <td dir="ltr" class="text-left">0012345678</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">مرد</span></td>
                        <td>۱۳۷۲/۰۵/۱۸</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="users-create.html" class="table-action edit"
                                                                   title="ویرایش">✎</a>
                                <button data-delete="علی احمدی" class="table-action delete" title="حذف">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable>
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar bg-aqua-500/10 text-aqua-300">م‌ر</span>
                                <div><b class="block text-sm text-white">مریم رضایی</b><small
                                        class="text-[10px] text-slate-600">کاربر شماره ۱۰۰۲</small></div>
                            </div>
                        </td>
                        <td>
                            <div dir="ltr" class="text-left"><b
                                    class="block text-xs text-slate-300">09351234567</b><small
                                    class="mt-1 block text-[10px] text-aqua-400">maryam.rezaei@example.com</small></div>
                        </td>
                        <td dir="ltr" class="text-left">0023456789</td>
                        <td><span class="chip bg-rose/10 text-rose">زن</span></td>
                        <td>۱۳۷۵/۰۹/۰۲</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="users-create.html" class="table-action edit"
                                                                   title="ویرایش">✎</a>
                                <button data-delete="مریم رضایی" class="table-action delete" title="حذف">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable>
                        <td>
                            <div class="flex items-center gap-3"><span
                                    class="row-avatar bg-amberx/10 text-amberx">ر‌ک</span>
                                <div><b class="block text-sm text-white">رضا کریمی</b><small
                                        class="text-[10px] text-slate-600">کاربر شماره ۱۰۰۳</small></div>
                            </div>
                        </td>
                        <td>
                            <div dir="ltr" class="text-left"><b
                                    class="block text-xs text-slate-300">09193456789</b><small
                                    class="mt-1 block text-[10px] text-aqua-400">reza.karimi@example.com</small></div>
                        </td>
                        <td dir="ltr" class="text-left">0034567890</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">مرد</span></td>
                        <td>۱۳۶۸/۱۲/۲۵</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="users-create.html" class="table-action edit"
                                                                   title="ویرایش">✎</a>
                                <button data-delete="رضا کریمی" class="table-action delete" title="حذف">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable>
                        <td>
                            <div class="flex items-center gap-3"><span
                                    class="row-avatar bg-rose/10 text-rose">س‌م</span>
                                <div><b class="block text-sm text-white">سارا محمدی</b><small
                                        class="text-[10px] text-slate-600">کاربر شماره ۱۰۰۴</small></div>
                            </div>
                        </td>
                        <td>
                            <div dir="ltr" class="text-left"><b
                                    class="block text-xs text-slate-300">09021239876</b><small
                                    class="mt-1 block text-[10px] text-aqua-400">sara.mohammadi@example.com</small>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">0045678901</td>
                        <td><span class="chip bg-rose/10 text-rose">زن</span></td>
                        <td>۱۳۷۸/۰۳/۱۰</td>
                        <td><span class="chip bg-white/5 text-slate-400"><span class="status-dot bg-slate-500"></span>غیرفعال</span>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="users-create.html" class="table-action edit"
                                                                   title="ویرایش">✎</a>
                                <button data-delete="سارا محمدی" class="table-action delete" title="حذف">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable>
                        <td>
                            <div class="flex items-center gap-3"><span
                                    class="row-avatar bg-brand-500/10 text-brand-300">ح‌م</span>
                                <div><b class="block text-sm text-white">حسین مرادی</b><small
                                        class="text-[10px] text-slate-600">کاربر شماره ۱۰۰۵</small></div>
                            </div>
                        </td>
                        <td>
                            <div dir="ltr" class="text-left"><b
                                    class="block text-xs text-slate-300">09105678912</b><small
                                    class="mt-1 block text-[10px] text-aqua-400">hossein.moradi@example.com</small>
                            </div>
                        </td>
                        <td dir="ltr" class="text-left">0056789012</td>
                        <td><span class="chip bg-aqua-500/10 text-aqua-300">مرد</span></td>
                        <td>۱۳۷۰/۰۷/۰۸</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="users-create.html" class="table-action edit"
                                                                   title="ویرایش">✎</a>
                                <button data-delete="حسین مرادی" class="table-action delete" title="حذف">⌫</button>
                            </div>
                        </td>
                    </tr>
                    <tr data-searchable>
                        <td>
                            <div class="flex items-center gap-3"><span class="row-avatar bg-aqua-500/10 text-aqua-300">ن‌ج</span>
                                <div><b class="block text-sm text-white">نگار جعفری</b><small
                                        class="text-[10px] text-slate-600">کاربر شماره ۱۰۰۶</small></div>
                            </div>
                        </td>
                        <td>
                            <div dir="ltr" class="text-left"><b
                                    class="block text-xs text-slate-300">09213459876</b><small
                                    class="mt-1 block text-[10px] text-aqua-400">negar.jafari@example.com</small></div>
                        </td>
                        <td dir="ltr" class="text-left">0067890123</td>
                        <td><span class="chip bg-rose/10 text-rose">زن</span></td>
                        <td>۱۳۷۶/۱۱/۱۴</td>
                        <td><span class="chip bg-brand-500/10 text-brand-300"><span
                                    class="status-dot bg-brand-400"></span>فعال</span></td>
                        <td>
                            <div class="flex justify-end gap-2"><a href="users-create.html" class="table-action edit"
                                                                   title="ویرایش">✎</a>
                                <button data-delete="نگار جعفری" class="table-action delete" title="حذف">⌫</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div data-empty-state class="hidden px-6 py-16 text-center">
                    <div
                        class="mx-auto grid h-12 w-12 place-items-center rounded-2xl bg-white/5 text-xl text-slate-600">
                        ⌕
                    </div>
                    <p class="mt-4 text-sm font-bold text-slate-300">کاربری پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">نام، موبایل، ایمیل یا کد ملی دیگری را جست‌وجو کنید.</p></div>
            </div>
            <div class="table-footer"><p class="text-xs text-slate-600">نمایش ۱ تا ۶ از ۱,۲۸۴ کاربر</p>
                <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">
                    <button class="pagination-btn" disabled>‹</button>
                    <button class="pagination-btn active">۱</button>
                    <button class="pagination-btn">۲</button>
                    <button class="pagination-btn">۳</button>
                    <span class="pagination-btn">…</span>
                    <button class="pagination-btn">۲۱۵</button>
                    <button class="pagination-btn">›</button>
                </nav>
            </div>
        </section>
    </main>
@endsection

@section('other_content')
<div id="deleteDialog" class="delete-dialog">
    <div class="delete-dialog-card">
        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-rose/10 text-rose">!</div>
        <h3 class="mt-5 text-lg font-extrabold text-white">حذف کاربر</h3>
        <p class="mt-2 text-sm leading-7 text-slate-400">آیا از حذف «<b id="deleteItemName" class="text-white"></b>»
            مطمئن هستید؟ این عملیات قابل بازگشت نیست.</p>
        <div class="mt-6 flex gap-3">
            <button data-close-dialog class="flex-1 rounded-xl border border-white/10 py-2.5 text-slate-400">انصراف
            </button>
            <button id="confirmDelete" class="flex-1 rounded-xl bg-rose py-2.5 font-bold text-ink-950">حذف شود</button>
        </div>
    </div>
</div>
@endsection
