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
                    href="{{route('admin.discount.create')}}"
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
                <p class="mt-2 text-2xl font-extrabold text-white">{{$details->get('totalDiscount')}}</p>
                <p class="mt-2 text-[10px] text-slate-600">
                    تمام کمپین‌ها
                </p>
            </div>

            <div class="glass-card p-5">
                <p class="text-xs text-slate-500">فعال و معتبر</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">
                    {{$details->get('activeAndReputable')}}
                </p>
                <p class="mt-2 text-[10px] text-slate-600">
                    قابل استفاده در فروشگاه
                </p>
            </div>



            <div class="glass-card p-5">
                <p class="text-xs text-slate-500">منقضی‌شده</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">{{$details->get('inactive')}}</p>
                <p class="mt-2 text-[10px] text-slate-600">
                    نیازمند بررسی
                </p>
            </div>

        </section>


        <section class="glass-card overflow-hidden p-0">


            <div class="list-toolbar">
                <form action="{{route('admin.discount.index')}}" method="GET" class="table-search flex items-center">
                    <input
                        name="q" type="text" class="text-white" placeholder="جست‌وجو در نام،دامنه"/>
                    <kbd>Ctrl K</kbd>
                </form>

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
                        <th>کد تخفیف</th>
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
                                        {{numberFormatAble($discount->min_order_amount)}} تا {{numberFormatAble($discount->max_order_amount)}}
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
                                <span class="chip bg-aqua-500/10 text-aqua-300">
                                  {{$discount->code??'-'}}
                                </span>
                            </td>

                            <td>
                                <div>
                                    <b class="text-slate-300">
                                        {{ \Morilog\Jalali\Jalalian::forge($discount->starts_at)->format('%d %B %Y') }} تا {{ \Morilog\Jalali\Jalalian::forge($discount->expires_at)->format('%d %B %Y') }}
                                    </b>

                                    <p class="mt-1 text-[10px] text-slate-600">
                                        {{\Carbon\Carbon::make($discount->starts_at)->diff($discount->expires_at)->days}}
                                            روز باقی مانده
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
                                        href="{{route('admin.discount.edit',$discount)}}"
                                        class="table-action edit"
                                        aria-label="ویرایش"
                                    >
                                        ✎
                                    </a>

                                    <button
                                        data-route="{{route('admin.discount.destroy',$discount)}}"
                                        data-delete="{{$discount->name??''}}"
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


            @if ($discounts->hasPages())
                <div class="table-footer">

                    <p class="text-xs text-slate-600">
                        نمایش
                        {{ $discounts->firstItem() ?? 0 }}
                        تا
                        {{ $discounts->lastItem() ?? 0 }}
                        از
                        {{ number_format($discounts->total()) }}
                        کاربر
                    </p>

                    <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">

                        {{-- Previous --}}
                        @if ($discounts->onFirstPage())
                            <button class="pagination-btn" disabled>
                                ‹
                            </button>
                        @else
                            <a href="{{ $discounts->previousPageUrl() }}" class="pagination-btn">
                                ‹
                            </a>
                        @endif


                        @php
                            $current = $discounts->currentPage();
                            $last = $discounts->lastPage();

                            $pages = [];

                            // صفحات اول
                            for ($i = 1; $i <= min(3, $last); $i++) {
                                $pages[] = $i;
                            }

                            // صفحات اطراف صفحه جاری
                            for ($i = max(1, $current - 1); $i <= min($last, $current + 1); $i++) {
                                $pages[] = $i;
                            }

                            // صفحات آخر
                            for ($i = max(1, $last - 2); $i <= $last; $i++) {
                                $pages[] = $i;
                            }

                            $pages = array_unique($pages);
                            sort($pages);
                        @endphp


                        @php
                            $previous = null;
                        @endphp

                        @foreach($pages as $page)

                            @if($previous && $page > $previous + 1)
                                <span class="pagination-btn">
                    …
                </span>
                            @endif


                            <a href="{{ $discounts->url($page) }}"
                               class="pagination-btn @if($discounts->currentPage() == $page) active @endif">
                                {{ $page }}
                            </a>


                            @php
                                $previous = $page;
                            @endphp

                        @endforeach


                        {{-- Next --}}
                        @if ($discounts->hasMorePages())
                            <a href="{{ $discounts->nextPageUrl() }}" class="pagination-btn">
                                ›
                            </a>
                        @else
                            <button class="pagination-btn" disabled>
                                ›
                            </button>
                        @endif

                    </nav>

                </div>
            @endif

        </section>
    </main>
@endsection

@section('other_content')
    <form id="deleteDialog" class="delete-dialog" method="POST">
        @method('DELETE')
        @csrf
        <div class="delete-dialog-card">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-rose/10 text-rose">!</div>
            <h3 class="mt-5 text-lg font-extrabold text-white">حذف کدتخفیف</h3>
            <p class="mt-2 text-sm leading-7 text-slate-400">آیا از حذف «<b id="deleteItemName" class="text-white"></b>»
                مطمئن هستید؟ این عملیات قابل بازگشت نیست.</p>
            <div class="mt-6 flex gap-3">
                <button type="button" data-close-dialog
                        class="flex-1 rounded-xl border border-white/10 py-2.5 text-slate-400">انصراف
                </button>
                <button id="confirmDelete" class="flex-1 rounded-xl bg-rose py-2.5 font-bold text-ink-950">حذف شود
                </button>
            </div>
        </div>
    </form>
@endsection
