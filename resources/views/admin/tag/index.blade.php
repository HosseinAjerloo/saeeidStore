@extends('admin.layout.master')


@section('content')
    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="chip bg-brand-500/10 text-brand-300">برچسب‌های محصول</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">تگ‌های فروشگاه</h2>
                    <p class="mt-2 text-sm text-slate-400">مدیریت تگ‌ها و مشاهده تعداد محصول متصل به هر تگ</p>
                </div>
                <div class="flex flex-col gap-2 sm:flex-row">

                    <a href="{{route('admin.tag.create')}}"
                                          class="rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-center text-sm font-extrabold text-ink-950 shadow-glow">+
                        ایجاد تگ جدید</a>
                </div>
            </div>
        </section>
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="glass-card p-5"><p class="text-xs text-slate-500">کل تگ‌ها</p>
                <p class="mt-2 text-2xl font-extrabold text-white">{{$details->get('totalTags')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">تگ فعال</p>
                <p class="mt-2 text-2xl font-extrabold text-brand-300">{{$details->get('totalTagsActive')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">متصل به محصول</p>
                <p class="mt-2 text-2xl font-extrabold text-aqua-300">{{$details->get('totalSyncProduct')}}</p></div>
            <div class="glass-card p-5"><p class="text-xs text-slate-500">بدون استفاده</p>
                <p class="mt-2 text-2xl font-extrabold text-rose">{{$details->get('tagNotSync')}}</p></div>
        </section>
        <section class="glass-card overflow-hidden p-0">
            <div class="list-toolbar">
                <form action="{{route('admin.tag.index')}}" method="GET" class="table-search flex items-center">
                    <input
                        name="q" type="text" class="text-white" placeholder="جست‌وجو در نام، موبایل، ایمیل یا کد ملی..."/>
                    <kbd>Ctrl K</kbd>
                </form>
                <div class="text-xs text-slate-500"><span data-result-count="">۶</span> تگ نمایش داده می‌شود</div>
            </div>
            <div class="overflow-x-auto">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>تگ</th>
                        <th>محصولات</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr data-searchable="">
                                <td>
                                    <span class="chip bg-brand-500/10 px-3 py-2 text-brand-300">
                                        {{$tag->name}}
                                    </span>
                                </td>
                                <td>
                                    {{$tag->products->count()}}
                                </td>
                                <td><span class="chip bg-brand-500/10 text-brand-300"><span class="status-dot bg-brand-400">

                                        </span>{{$tag->getActive}}</span>
                                </td>
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <a href="{{route('admin.tag.syncProductEdit',$tag)}}" class="table-action text-aqua-300" title="تنوع‌ها">
                                            ▣
                                        </a>
                                        <a href="{{route('admin.tag.edit',$tag)}}" class="table-action edit">✎</a>
                                        <button data-delete="{{$tag->name}}" data-route="{{route('admin.tag.destroy',$tag)}}"  class="table-action delete">⌫</button>
                                    </div>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center"><p class="text-sm font-bold text-slate-300">
                        تگی پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">عبارت دیگری را جست‌وجو کنید.</p></div>
            </div>
            @if ($tags->hasPages())
                <div class="table-footer">

                    <p class="text-xs text-slate-600">
                        نمایش
                        {{ $tags->firstItem() ?? 0 }}
                        تا
                        {{ $tags->lastItem() ?? 0 }}
                        از
                        {{ number_format($tags->total()) }}
                        کاربر
                    </p>

                    <nav class="flex gap-1" aria-label="صفحه‌بندی کاربران">

                        {{-- Previous --}}
                        @if ($tags->onFirstPage())
                            <button class="pagination-btn" disabled>
                                ‹
                            </button>
                        @else
                            <a href="{{ $tags->previousPageUrl() }}" class="pagination-btn">
                                ‹
                            </a>
                        @endif


                        @php
                            $current = $tags->currentPage();
                            $last = $tags->lastPage();

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


                            <a href="{{ $tags->url($page) }}"
                               class="pagination-btn @if($tags->currentPage() == $page) active @endif">
                                {{ $page }}
                            </a>


                            @php
                                $previous = $page;
                            @endphp

                        @endforeach


                        {{-- Next --}}
                        @if ($tags->hasMorePages())
                            <a href="{{ $tags->nextPageUrl() }}" class="pagination-btn">
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
            <h3 class="mt-5 text-lg font-extrabold text-white">حذف گروه</h3>
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
