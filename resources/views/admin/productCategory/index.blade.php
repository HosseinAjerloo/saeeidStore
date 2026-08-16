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
                <p class="mt-2 text-2xl font-extrabold text-white">{{$details->get('totalCategory')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">گروه‌های اصلی</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">{{$details->get('totalCategoryParent')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">زیرگروه‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">{{$details->get('totalCategoryChild')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">غیرفعال</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">{{$details->get('totalCategoryInactive')}}</p></div>
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
                <table class="data-table min-w-[72rem]">
                    <thead>
                    <tr>
                        <th class="text-center">نام</th>
                        <th class="text-center">عکس گروه</th>
                        <th class="text-center">نامک</th>
                        <th class="text-center">گروه والد</th>
                        <th class="text-center">محصولات</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productCategories as $productCategory)
                        <tr data-searchable>
                            <td>
                                <div class="flex justify-center items-center gap-3">
                                    <div>
                                        <b class="block text-sm text-white">{{$productCategory->name}}</b>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <img class="w-20" src="{{asset($productCategory->image)}}" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <b class="block text-xs text-slate-300">{{$productCategory->slug??''}}</b>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <small class="mt-1 block text-[10px] text-aqua-400">{{optional($productCategory->parent)->name??'-'}}</small>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <small class="mt-1 block text-[10px] text-aqua-400">{{optional($productCategory->product)->count()??'-'}}</small>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    <span class="chip bg-aqua-500/10 text-aqua-300">{{$productCategory->getActive}}</span>
                                </div>
                            </td>


                            <td>
                                <div class="flex justify-end gap-2">
                                    <a href="{{route('admin.category.edit',$productCategory)}}" class="table-action edit"
                                       title="ویرایش">✎</a>
                                    <button data-delete="{{$productCategory->name}}"
                                            data-route="{{route('admin.category.destroy',$productCategory)}}"
                                            class="table-action delete" title="حذف">⌫
                                    </button>
                                </div>
                            </td>

                        </tr>

                    @endforeach

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

            @if ($productCategories->hasPages())
                <div class="table-footer">

                    <p class="text-xs text-slate-600">
                        نمایش
                        {{ $productCategories->firstItem() ?? 0 }}
                        تا
                        {{ $productCategories->lastItem() ?? 0 }}
                        از
                        {{ number_format($users->total()) }}
                        کاربر
                    </p>

                    <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">

                        {{-- Previous --}}
                        @if ($productCategories->onFirstPage())
                            <button class="pagination-btn" disabled>
                                ‹
                            </button>
                        @else
                            <a href="{{ $productCategories->previousPageUrl() }}" class="pagination-btn">
                                ‹
                            </a>
                        @endif


                        @php
                            $current = $productCategories->currentPage();
                            $last = $productCategories->lastPage();

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


                            <a href="{{ $productCategories->url($page) }}"
                               class="pagination-btn @if($productCategories->currentPage() == $page) active @endif">
                                {{ $page }}
                            </a>


                            @php
                                $previous = $page;
                            @endphp

                        @endforeach


                        {{-- Next --}}
                        @if ($productCategories->hasMorePages())
                            <a href="{{ $productCategories->nextPageUrl() }}" class="pagination-btn">
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
