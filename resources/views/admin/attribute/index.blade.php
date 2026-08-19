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
                <a href="{{route('admin.attribute.create')}}"
                   class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow">+
                    ایجاد ویژگی جدید</a>
            </div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل ویژگی‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-white">{{$details->get('totalAttribute')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ویژگی معمولی</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">{{$details->get('totalAttributeNormal')}}</p>
            </div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">ویژگی رنگی</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">{{$details->get('totalAttributeColor')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل مقادیر</p>
                <p class="mt-2 text-2xl font-extrabold text-amberx">{{$details->get('totalAttributeValues')}}</p></div>
        </section>
        <section class="glass-card overflow-hidden p-0">
            <div class="list-toolbar">
                <form action="{{route('admin.attribute.index')}}" method="GET" class="table-search flex items-center">
                    <input
                        name="q" type="text" class="text-white" placeholder="جست‌وجو در نام، موبایل، ایمیل یا کد ملی..."/>
                    <kbd>Ctrl K</kbd>
                </form>
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
                    @foreach($attributes as $attribute)
                        @if($attribute->type=='color')
                            <tr data-searchable="">
                                <td>
                                    <div class="flex items-center gap-3"><span class="row-avatar">🎨</span>
                                        <div><b class="block text-sm text-white">رنگ</b><small
                                                class="text-[10px] text-slate-600">انتخاب رنگ محصول</small></div>
                                    </div>
                                </td>
                                <td  class=" text-slate-500">{{$attribute->slug??''}}</td>
                                <td>
                                    <span class="chip bg-aqua-500/10 text-aqua-300">رنگی</span>
                                </td>
                                <td>
                                    <div class="flex gap-1.5">
                                        @foreach($attribute->attributeValues as $value)
                                            <span
                                                class="h-6 w-6 rounded-full border-2 border-ink-850 " style="background-color: {{$value->value}}"
                                                title="{{$attribute->name}}">

                                            </span>
                                        @endforeach

                                    </div>
                                </td>
                                <td>{{$attribute->attributeValues()->count()}}</td>
                                <td>
                                    <span class="chip bg-brand-500/10 text-brand-300">
                                        <span class="status-dot bg-brand-400"></span>
                                        {{$attribute->getActive}}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex justify-end gap-2"><a href="{{route('admin.attribute.edit',$attribute)}}"
                                                                           class="table-action edit">✎</a>
                                        <button data-delete="رنگ" class="table-action delete">⌫</button>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr data-searchable="">
                                <td>
                                    <div class="flex items-center gap-3"><span class="row-avatar">↔</span>
                                        <div>
                                            <b class="block text-sm text-white">{{$attribute->name}}</b>

                                        </div>
                                    </div>
                                </td>
                                <td  class=" text-slate-500">{{$attribute->slug??''}}</td>
                                <td><span class="chip bg-brand-500/10 text-brand-300">معمولی</span></td>
                                <td>
                                    <div class="flex gap-1">
                                      @foreach($attribute->attributeValues as $value)
                                            <span class="chip bg-white/5 text-slate-400">{{$value->value??''}}</span>
                                      @endforeach

                                </td>
                                <td>{{$attribute->attributeValues()->count()}}</td>
                                <td>
                                    <span class="chip bg-brand-500/10 text-brand-300">
                                        <span class="status-dot bg-brand-400"></span>
                                         {{$attribute->getActive}}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <a  href="{{route('admin.attribute.edit',$attribute)}}"
                                                                           class="table-action edit">✎</a>
                                        <button data-route="{{route('admin.attribute.destroy',$attribute)}}" data-delete="{{$attribute->name}}" class="table-action delete">⌫</button>
                                    </div>
                                </td>
                            </tr>

                        @endif

                    @endforeach
                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center"><p
                        class="text-sm font-bold text-slate-300">ویژگی‌ای پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">نام یا مقدار دیگری را جستجو کنید.</p></div>
            </div>
            @if ($attributes->hasPages())
                <div class="table-footer">

                    <p class="text-xs text-slate-600">
                        نمایش
                        {{ $attributes->firstItem() ?? 0 }}
                        تا
                        {{ $attributes->lastItem() ?? 0 }}
                        از
                        {{ number_format($attributes->total()) }}
                        کاربر
                    </p>

                    <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">

                        {{-- Previous --}}
                        @if ($attributes->onFirstPage())
                            <button class="pagination-btn" disabled>
                                ‹
                            </button>
                        @else
                            <a href="{{ $attributes->previousPageUrl() }}" class="pagination-btn">
                                ‹
                            </a>
                        @endif


                        @php
                            $current = $attributes->currentPage();
                            $last = $attributes->lastPage();

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


                            <a href="{{ $attributes->url($page) }}"
                               class="pagination-btn @if($attributes->currentPage() == $page) active @endif">
                                {{ $page }}
                            </a>


                            @php
                                $previous = $page;
                            @endphp

                        @endforeach


                        {{-- Next --}}
                        @if ($attributes->hasMorePages())
                            <a href="{{ $attributes->nextPageUrl() }}" class="pagination-btn">
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
            <h3 class="mt-5 text-lg font-extrabold text-white">حذف کاربر</h3>
            <p class="mt-2 text-sm leading-7 text-slate-400">آیا از ویژگی «<b id="deleteItemName" class="text-white"></b>»
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
