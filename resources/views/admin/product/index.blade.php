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
                <a href="{{route('admin.product.create')}}"
                   class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow">+
                    ایجاد محصول جدید</a></div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل محصولات</p>
                <p class="mt-2 text-2xl font-extrabold text-white">{{$details->get('totalProduct')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">محصول فعال</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">{{$details->get('totalProductActive')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">موجودی کم</p>
                <p class="mt-2 text-2xl font-extrabold text-amberx">{{$details->get('totalProductLowStock')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ناموجود</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">{{$details->get('totalProductLowStockZero')}}</p></div>
        </section>
        <section class="glass-card overflow-hidden p-0">
            <div class="list-toolbar">
                <form action="{{route('admin.product.index')}}" method="GET" class="table-search flex items-center">
                    <input
                        name="q" type="text" class="text-white" placeholder="جست‌وجو در نام، برند، گروه محصول..."/>
                    <kbd>Ctrl K</kbd>
                </form>
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
                        <th>عکس محصول</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr data-searchable="">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <b class="block max-w-52 truncate text-sm text-white">
                                                {{$product->name??''}}
                                            </b>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$product->id}}
                                </td>
                                <td>{{$product->group->name??''}}</td>
                                <td>{{$product->brand->name??''}}</td>
                                <td>
                                    <div class="w-24 h-24 p-2 flex items-center justify-center">
                                        <img class="rounded-lg" src="{{asset($product->image)}}" alt="">
                                    </div>
                                </td>
                                <td><span class="chip bg-brand-500/10 text-brand-300">
                                        <span class="status-dot bg-brand-400"></span>
                                        {{$product->getActive}}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <a href="{{route('admin.product.variant.show',$product)}}" class="table-action text-aqua-300" title="تنوع‌ها">
                                            ≡
                                        </a>
                                        <a href="{{route('admin.product.edit',$product)}}" class="table-action edit">✎</a>
                                        <button data-delete="هدفون بی‌سیم سونی" class="table-action delete">⌫</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center"><p
                        class="text-sm font-bold text-slate-300">محصولی پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">نام، کد، گروه یا برند دیگری را جستجو کنید.</p></div>
            </div>
            @if ($products->hasPages())
                <div class="table-footer">

                    <p class="text-xs text-slate-600">
                        نمایش
                        {{ $products->firstItem() ?? 0 }}
                        تا
                        {{ $products->lastItem() ?? 0 }}
                        از
                        {{ number_format($products->total()) }}
                        کاربر
                    </p>

                    <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">

                        {{-- Previous --}}
                        @if ($products->onFirstPage())
                            <button class="pagination-btn" disabled>
                                ‹
                            </button>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="pagination-btn">
                                ‹
                            </a>
                        @endif


                        @php
                            $current = $products->currentPage();
                            $last = $products->lastPage();

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


                            <a href="{{ $products->url($page) }}"
                               class="pagination-btn @if($products->currentPage() == $page) active @endif">
                                {{ $page }}
                            </a>


                            @php
                                $previous = $page;
                            @endphp

                        @endforeach


                        {{-- Next --}}
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="pagination-btn">
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

@section('script')
    <script>
        const search = document.querySelector('input[type="text"]');


        window.addEventListener('keydown', function (e) {
            if (e.ctrlKey && e.key.toLowerCase()==='k') {
                search.focus()
            }
        })
    </script>
@endsection
