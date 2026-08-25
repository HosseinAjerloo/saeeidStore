@extends('admin.layout.master')

@section('content')
    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">

        <section class="list-hero animate-fade-up">
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="chip bg-brand-500/10 text-brand-300">
                        پیشنهادهای فروش
                    </span>

                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                        کدهای تخفیف فروشگاه
                    </h2>

                    <p class="mt-2 text-sm text-slate-400">
                        مشاهده، جست‌وجو و مدیریت تخفیف‌های درصدی و مبلغ ثابت
                    </p>
                </div>

                <a
                    href="discounts-create.html"
                    class="rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-center text-sm font-extrabold text-ink-950 shadow-glow"
                >
                    + ایجاد تخفیف جدید
                </a>
            </div>
        </section>

        {{-- Statistics --}}
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">

            <div class="glass-card p-5">
                <p class="text-xs text-slate-500">کل تخفیف‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-white">۲۴</p>
                <p class="mt-2 text-[10px] text-slate-600">
                    تمام کمپین‌ها
                </p>
            </div>

            <div class="glass-card p-5">
                <p class="text-xs text-slate-500">فعال و معتبر</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">۱۲</p>
                <p class="mt-2 text-[10px] text-slate-600">
                    قابل استفاده در فروشگاه
                </p>
            </div>

            <div class="glass-card p-5">
                <p class="text-xs text-slate-500">درصدی</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">۱۵</p>
                <p class="mt-2 text-[10px] text-slate-600">
                    از کل تخفیف‌ها
                </p>
            </div>

            <div class="glass-card p-5">
                <p class="text-xs text-slate-500">منقضی‌شده</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">۵</p>
                <p class="mt-2 text-[10px] text-slate-600">
                    نیازمند بررسی
                </p>
            </div>

        </section>


        <section class="glass-card overflow-hidden p-0">


            <div class="list-toolbar">
                <div class="table-search">
                    <span
                        class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-600"
                    >
                        ⌕
                    </span>

                    <input
                        data-table-search=""
                        type="search"
                        placeholder="جست‌وجو در عنوان، نوع، دامنه یا وضعیت..."
                    >

                    <kbd>Ctrl K</kbd>
                </div>

                <div class="text-xs text-slate-500">
                    <span data-result-count="">۶</span>
                    تخفیف نمایش داده می‌شود
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="data-table min-w-[72rem]">

                    <thead>
                    <tr>
                        <th>عنوان تخفیف</th>
                        <th>نوع و مقدار</th>
                        <th>محدوده سفارش</th>
                        <th>دامنه</th>
                        <th>بازه اعتبار</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($discounts as $discount)
                        <tr data-searchable="">
                            <td>
                                <div>
                                    <b class="text-sm text-white">
                                        {{$discount->name??''}}
                                    </b>

                                </div>
                            </td>

                            <td>
                                <span class="chip bg-brand-500/10 text-brand-300">
                                    {{numberFormatAble($discount->value)}}
                                    @if($discount->type=='percentage') %  @endif
                                </span>
                            </td>

                            <td>
                                <div>
                                    <b class="text-slate-300">
                                        ۱ تا ۲۰ میلیون
                                    </b>

                                    <p class="mt-1 text-[10px] text-slate-600">
                                        تومان
                                    </p>
                                </div>
                            </td>

                            <td>
                                <span class="chip bg-aqua-500/10 text-aqua-300">
                                    @if($discount->scope=='product')
                                        محصول
                                    @else
                                        کاربر
                                    @endif
                                </span>
                            </td>

                            <td>
                                <div>
                                    <b class="text-slate-300">
                                        {{ \Morilog\Jalali\Jalalian::forge($discount->starts_at)->format('%d %B %Y') }} تا {{ \Morilog\Jalali\Jalalian::forge($discount->expires_at)->format('%d %B %Y') }}
                                    </b>

                                    <p class="mt-1 text-[10px] text-slate-600">
                                        ۲۲ روز باقی‌مانده
                                    </p>
                                </div>
                            </td>

                            <td>
                                <span class="chip bg-brand-500/10 text-brand-300">
                                    <span class="status-dot bg-brand-400"></span>
                                    {{$discount->getActive}}
                                </span>
                            </td>

                            <td>
                                <div class="flex justify-end gap-2">
                                    <a
                                        href="discounts-create.html"
                                        class="table-action edit"
                                        aria-label="ویرایش"
                                    >
                                        ✎
                                    </a>

                                    <button
                                        data-delete="جشنواره تابستانه"
                                        class="table-action delete"
                                        aria-label="حذف"
                                    >
                                        ⌫
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>

                <div
                    data-empty-state=""
                    class="hidden px-6 py-16 text-center"
                >
                    <p class="text-sm font-bold text-slate-300">
                        تخفیفی پیدا نشد
                    </p>

                    <p class="mt-1 text-xs text-slate-600">
                        عبارت دیگری را جست‌وجو کنید.
                    </p>
                </div>
            </div>


            <div class="table-footer">
                <p class="text-xs text-slate-600">
                    نمایش ۱ تا ۶ از ۲۴ تخفیف
                </p>

                <nav
                    class="flex gap-1"
                    aria-label="صفحه‌بندی"
                >
                    <button
                        class="pagination-btn"
                        disabled
                    >
                        ‹
                    </button>

                    <button class="pagination-btn active">
                        ۱
                    </button>

                    <button class="pagination-btn">
                        ۲
                    </button>

                    <button class="pagination-btn">
                        ۳
                    </button>

                    <button class="pagination-btn">
                        ۴
                    </button>

                    <button class="pagination-btn">
                        ›
                    </button>
                </nav>
            </div>

        </section>
    </main>
@endsection

@section('other_content')
    <div id="deleteDialog" class="delete-dialog">

        <div class="delete-dialog-card">

            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-rose/10 text-rose">
                !
            </div>

            <h3 class="mt-5 text-lg font-extrabold text-white">
                حذف تخفیف
            </h3>

            <p class="mt-2 text-sm leading-7 text-slate-400">
                آیا از حذف
                «<b id="deleteItemName" class="text-white"></b>»
                مطمئن هستید؟
            </p>

            <div class="mt-6 flex gap-3">

                <button
                    data-close-dialog=""
                    class="flex-1 rounded-xl border border-white/10 py-2.5 text-slate-400"
                >
                    انصراف
                </button>

                <button
                    id="confirmDelete"
                    class="flex-1 rounded-xl bg-rose py-2.5 font-bold text-ink-950"
                >
                    حذف شود
                </button>

            </div>

        </div>
    </div>
@endsection
