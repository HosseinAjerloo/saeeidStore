@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد برند محصولات</title>
@endsection
@section('content')

    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="absolute -left-16 -top-20 h-52 w-52 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div><span class="chip bg-brand-500/10 text-brand-300">ساختار فروشگاه</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">برند‌بندی محصولات</h2>
                    <p class="mt-2 text-sm text-slate-400">مدیریت برندها و کاتالوگ فروشگاه</p></div>
                <a href="{{route('admin.brand.create')}}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow transition-all hover:shadow-glow-lg">+
                    ایجاد برند جدید</a>
            </div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل برندها</p>
                <p class="mt-2 text-2xl font-extrabold text-white">{{$details->get('totalBrand')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">برندهای فعال</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">{{$details->get('activeBrand')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">دارای وب سایت</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">{{$details->get('totalWebsiteBrand')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">غیرفعال</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">{{$details->get('inActiveBrand')}}</p></div>
        </section>
        <section class="glass-card animate-fade-up stagger-2 overflow-hidden p-0">
            <div class="list-toolbar">
                <form action="{{route('admin.brand.index')}}" method="GET" class="table-search flex items-center">
                    <input
                        name="q" type="text" class="text-white" placeholder="جست‌وجو در نام، موبایل، ایمیل یا کد ملی..."/>
                    <kbd>Ctrl K</kbd>
                </form>

            </div>
            <div class="overflow-x-auto">
                <table class="data-table min-w-[72rem]">
                    <thead>
                    <tr>
                        <th class="text-center">نام</th>
                        <th class="text-center">عکس برند</th>
                        <th class="text-center">نامک</th>
                        <th class="text-center">وب سایت</th>
                        <th class="text-center">محصولات</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productBrands as $brand)
                        <tr data-searchable>
                            <td>
                                <div class="flex justify-center items-center gap-3">
                                    <div>
                                        <b class="block text-sm text-white">{{$brand->name}}</b>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <img class="w-20 h-20 object-contain" src="{{asset($brand->logo)}}" alt="{{$brand->name}}">
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <b class="block text-xs text-slate-300">{{$brand->slug??''}}</b>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{$brand->website}}" target="_blank">
                                        <small dir="ltr" class="mt-1  block text-[10px] text-aqua-400">{{urldecode($brand->website)??''}}</small>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <small class="mt-1 block text-[10px] text-aqua-400">{{optional($brand->products)->count()??'-'}}</small>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center justify-center">
                                    <span class="chip bg-aqua-500/10 text-aqua-300">{{$brand->getActive}}</span>
                                </div>
                            </td>


                            <td>
                                <div class="flex justify-end gap-2">
                                    <a href="{{route('admin.brand.edit',$brand)}}" class="table-action edit"
                                       title="ویرایش">✎</a>
                                    <button data-delete="{{$brand->name}}"
                                            data-route="{{route('admin.brand.destroy',$brand)}}"
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

            @if ($productBrands->hasPages())
                <div class="table-footer">

                    <p class="text-xs text-slate-600">
                        نمایش
                        {{ $productBrands->firstItem() ?? 0 }}
                        تا
                        {{ $productBrands->lastItem() ?? 0 }}
                        از
                        {{ number_format($productBrands->total()) }}
                        کاربر
                    </p>

                    <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">

                        {{-- Previous --}}
                        @if ($productBrands->onFirstPage())
                            <button class="pagination-btn" disabled>
                                ‹
                            </button>
                        @else
                            <a href="{{ $productBrands->previousPageUrl() }}" class="pagination-btn">
                                ‹
                            </a>
                        @endif


                        @php
                            $current = $productBrands->currentPage();
                            $last = $productBrands->lastPage();

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


                            <a href="{{ $productBrands->url($page) }}"
                               class="pagination-btn @if($productBrands->currentPage() == $page) active @endif">
                                {{ $page }}
                            </a>


                            @php
                                $previous = $page;
                            @endphp

                        @endforeach


                        {{-- Next --}}
                        @if ($productBrands->hasMorePages())
                            <a href="{{ $productBrands->nextPageUrl() }}" class="pagination-btn">
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
            <h3 class="mt-5 text-lg font-extrabold text-white">حذف برند</h3>
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
