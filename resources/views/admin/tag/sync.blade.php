@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('global/css/select2.min.css')}}">
   <style>
       .products + .select2 {
           width: 100% !important;
       }

       .products + .select2 .select2-selection {
           position: relative !important;

           min-height: 42px !important;

           display: flex !important;
           align-items: center !important;

           background: transparent !important;

           border: none !important;
           outline: none !important;
           box-shadow: none !important;

           border-radius: 10px !important;
       }

       .products + .select2 .select2-selection__rendered {
           padding-right: 4px !important;

           color: rgb(52 211 153) !important;

           font-size: 13px !important;
           font-weight: 500 !important;

           line-height: 42px !important;
       }


       .products + .select2 .select2-selection__arrow {
           position: absolute !important;

           left: 10px !important;
           right: auto !important;

           top: 50% !important;

           width: 20px !important;
           height: 20px !important;

           display: flex !important;
           align-items: center !important;
           justify-content: center !important;

           transform: translateY(-50%) !important;

           pointer-events: none !important;
       }

       .products + .select2 .select2-selection__arrow b {
           position: static !important;

           display: block !important;

           width: 0 !important;
           height: 0 !important;

           margin: 0 !important;

           border-style: solid !important;

           border-width: 5px 4px 0 4px !important;

           border-color:
               rgb(52 211 153)
               transparent
               transparent
               transparent !important;

           transform: translateY(1px) !important;
       }


       .select2-container--default .select2-dropdown {
           margin-top: 6px !important;

           background: #0b0f0e !important;

           border: 1px solid rgba(255, 255, 255, 0.07) !important;

           border-radius: 12px !important;

           overflow: hidden !important;

           box-shadow:
               0 18px 45px rgba(0, 0, 0, 0.45) !important;
       }

       .select2-container--default .select2-results {
           padding: 6px !important;

           background: transparent !important;
       }

       .select2-container--default .select2-results__options {
           background: transparent !important;
       }

       .select2-container--default .select2-results__option {
           margin: 2px 0 !important;

           padding: 10px 12px !important;

           border-radius: 8px !important;

           background: transparent !important;

           color: rgba(255, 255, 255, 0.72) !important;

           font-size: 13px !important;
           font-weight: 400 !important;

           cursor: pointer;

           transition:
               background-color 0.15s ease,
               color 0.15s ease !important;
       }



       .select2-container--default
       .select2-results__option--highlighted[aria-selected] {
           background: rgba(52, 211, 153, 0.09) !important;

           color: rgb(52 211 153) !important;
       }



       .select2-container--default
       .select2-results__option[aria-selected="true"] {
           background: rgba(52, 211, 153, 0.06) !important;

           color: rgb(52 211 153) !important;

           font-weight: 500 !important;
       }


       .select2-container--default
       .select2-results__option--highlighted[aria-selected="true"] {
           background: rgba(52, 211, 153, 0.13) !important;

           color: rgb(52 211 153) !important;
       }



       .select2-container--default .select2-search--dropdown {
           padding: 9px !important;

           background: #0b0f0e !important;
       }

       .select2-container--default
       .select2-search--dropdown
       .select2-search__field {
           width: 100% !important;

           box-sizing: border-box !important;

           padding: 9px 11px !important;

           background: #111716 !important;

           border: 1px solid rgba(255, 255, 255, 0.07) !important;

           border-radius: 8px !important;

           color: #fff !important;

           font-size: 12px !important;

           outline: none !important;

           box-shadow: none !important;

           transition: border-color 0.15s ease !important;
       }



       .select2-container--default
       .select2-search--dropdown
       .select2-search__field:focus {
           border-color: rgba(52, 211, 153, 0.35) !important;

           box-shadow:
               0 0 0 2px rgba(52, 211, 153, 0.05)
           !important;
       }


       .select2-container--default
       .select2-search--dropdown
       .select2-search__field::placeholder {
           color: rgba(255, 255, 255, 0.3) !important;
       }



       .select2-container--default
       .select2-results__options::-webkit-scrollbar {
           width: 4px;
       }

       .select2-container--default
       .select2-results__options::-webkit-scrollbar-track {
           background: transparent;
       }

       .select2-container--default
       .select2-results__options::-webkit-scrollbar-thumb {
           background: rgba(255, 255, 255, 0.12);

           border-radius: 10px;
       }

       .select2-container--default
       .select2-results__options::-webkit-scrollbar-thumb:hover {
           background: rgba(52, 211, 153, 0.35);
       }



       .products + .select2.select2-container--focus
       .select2-selection,

       .products + .select2.select2-container--open
       .select2-selection {
           border: none !important;

           outline: none !important;

           box-shadow: none !important;
       }



       .products + .select2 .select2-selection__clear {
           color: rgb(52 211 153) !important;

           font-size: 18px !important;

           margin-left: 8px !important;
       }
   </style>
@endsection

@section('content')

    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-6xl">

            <section class="list-hero animate-fade-up mb-6">
                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                    <span class="chip bg-brand-500/10 text-brand-300">
                        برچسب‌گذاری محصول
                    </span>

                        <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                            اتصال تگ به محصول
                        </h2>

                        <p class="mt-2 text-sm text-slate-400">
                            محصول را انتخاب کنید و تگ‌های مرتبط با آن را مشخص کنید.
                        </p>
                    </div>

                    <a
                        href="tags-index.html"
                        class="rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm text-slate-300"
                    >
                        ← مدیریت تگ‌ها
                    </a>
                </div>
            </section>

            <form
                id="productTagForm"
                action="#"
                method="post"
                class="space-y-5"
            >

                {{-- انتخاب محصول --}}
                <section class="form-section glass-card overflow-hidden p-0">
                    <div class="section-heading">
                        <div class="section-number">۰۱</div>

                        <div>
                            <h3>انتخاب محصول</h3>
                            <p>تگ‌ها به محصول انتخاب‌شده متصل می‌شوند</p>
                        </div>

                        <span class="mr-auto chip bg-brand-500/10 text-brand-300">
                        الزامی
                    </span>
                    </div>

                    <div class="grid gap-5 p-5 sm:p-7 lg:grid-cols-[1fr_1.1fr]">

                        <label class="field-group">
                            <span class="field-label">محصول</span>

                            <span class="native-select-shell">
                            <span class="native-select-icon">▣</span>

                            <select
                                id="productSelect"
                                name="product_id"
                                required
                                class="native-select products"
                            >
                            @foreach($products as $product)
                                    <option value="{{$product->id}}" data-code="{{$product->name}}"  data-icon="{{asset($product->image)}}" >
                                    {{$product->name}}
                                </option>
                                @endforeach


                            </select>

                            <span class="native-select-chevron">⌄</span>
                        </span>
                        </label>

                        <div class="flex items-center gap-4 rounded-2xl border border-white/[0.07] bg-ink-800/50 p-4">
                        <img
                            id="productIcon"
                            class="grid h-14 w-14 place-items-center rounded-2xl bg-brand-500/10 text-2xl"
                        >



                            <div class="min-w-0 flex-1">
                                <p class="text-[10px] text-slate-600">
                                    محصول انتخاب‌شده
                                </p>

                                <b
                                    id="productName"
                                    class="mt-1 block truncate text-sm text-white"
                                >
                                </b>


                            </div>


                        </div>

                    </div>
                </section>


                {{-- انتخاب تگ‌ها --}}
                <section class="form-section glass-card overflow-hidden p-0">

                    <div class="section-heading">
                        <div class="section-number aqua">۰۲</div>

                        <div>
                            <h3>انتخاب تگ‌ها</h3>
                            <p>یک یا چند تگ را برای این محصول انتخاب کنید</p>
                        </div>

                        <span
                            id="selectedCount"
                            class="mr-auto chip bg-aqua-500/10 text-aqua-300"
                        >
                        ۴ انتخاب
                    </span>
                    </div>

                    <div class="border-b border-white/[0.06] p-5 sm:p-7">
                        <div class="flex flex-col gap-3 sm:flex-row">

                            <div class="table-search flex-1 sm:max-w-none">
                            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-600">
                                ⌕
                            </span>

                                <input
                                    id="tagSearch"
                                    type="search"
                                    placeholder="جست‌وجوی تگ..."
                                >
                            </div>

                            <button
                                id="clearTags"
                                type="button"
                                class="rounded-xl border border-white/10 px-4 py-2.5 text-xs text-slate-400"
                            >
                                پاک کردن انتخاب‌ها
                            </button>

                        </div>
                    </div>

                    <div
                        id="tagChoices"
                        class="grid gap-3 p-5 sm:grid-cols-2 sm:p-7 lg:grid-cols-3"
                    >

                    @foreach($tags as $tag)
                            <label
                                class="attribute-value-choice block"
                                data-tag-card
                                data-search="پرفروش best-seller"
                            >
                                <input
                                    name="tag_ids[]"
                                    type="checkbox"
                                    value="{{$tag->id}}"

                                >

                                <span class="flex w-full justify-between px-4 py-3">
                            <b>{{$tag->name}}</b>
                            <small class="text-[9px] text-slate-600">
                                ۴۸ محصول
                            </small>
                        </span>
                            </label>
                        @endforeach



                    </div>

                    <div
                        id="tagEmpty"
                        class="hidden px-6 py-12 text-center text-sm text-slate-500"
                    >
                        تگی با این عبارت پیدا نشد.
                    </div>

                </section>


                {{-- تگ‌های انتخاب شده --}}
                <section class="glass-card overflow-hidden p-0">

                    <div class="section-heading">
                        <div class="section-number amber">۰۳</div>

                        <div>
                            <h3>تگ‌های انتخاب‌شده</h3>
                            <p>خلاصه تگ‌هایی که برای محصول ذخیره می‌شوند</p>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">

                        <div
                            id="selectedTags"
                            class="flex min-h-[3.5rem] flex-wrap gap-2"
                        >
                            <button
                                type="button"
                                data-remove-tag="1"
                                class="chip bg-brand-500/10 px-3 py-2 text-brand-300"
                            >
                                # پرفروش
                                <span class="mr-1 text-rose">×</span>
                            </button>

                            <button
                                type="button"
                                data-remove-tag="2"
                                class="chip bg-brand-500/10 px-3 py-2 text-brand-300"
                            >
                                # پیشنهاد ویژه
                                <span class="mr-1 text-rose">×</span>
                            </button>

                            <button
                                type="button"
                                data-remove-tag="3"
                                class="chip bg-brand-500/10 px-3 py-2 text-brand-300"
                            >
                                # جدید
                                <span class="mr-1 text-rose">×</span>
                            </button>

                            <button
                                type="button"
                                data-remove-tag="5"
                                class="chip bg-brand-500/10 px-3 py-2 text-brand-300"
                            >
                                # محبوب
                                <span class="mr-1 text-rose">×</span>
                            </button>
                        </div>

                        <p
                            id="noSelected"
                            class="hidden text-xs text-slate-600"
                        >
                            هنوز تگی انتخاب نشده است.
                        </p>

                    </div>

                </section>


                <div
                    class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">



                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="flex-1 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow sm:flex-none"
                        >
                            ذخیره تگ‌های محصول ←
                        </button>

                    </div>
                </div>

            </form>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{asset('global/js/select2.min.js')}}"></script>

    <script>
        $(".products").select2({
            width: 'resolve' // need to override the changed default
        });
        $('#productSelect').on('change',updateProduct)
        function updateProduct() {
            const option = $(this).find('option:selected');
            const icon = option.data('icon');
            document.getElementById('productName').textContent = option.text();
            document.getElementById('productIcon').src =icon

        }
    </script>
    <script>
        const form = document.getElementById('productTagForm'),
            cards = [...document.querySelectorAll('[data-tag-card]')], search = document.getElementById('tagSearch');
        const fa = n => Number(n).toLocaleString('fa-IR');



        function updateTags() {
            const checked = cards.filter(c => c.querySelector('input').checked),
                box = document.getElementById('selectedTags');
            box.innerHTML = checked.map(c => `<button type="button" data-remove-tag="${c.querySelector('input').value}" class="chip bg-brand-500/10 px-3 py-2 text-brand-300">${c.querySelector('b').textContent} <span class="mr-1 text-rose">×</span></button>`).join('');
            document.getElementById('noSelected').classList.toggle('hidden', checked.length > 0);
            document.getElementById('selectedCount').textContent = `${fa(checked.length)} انتخاب`;
        }

        cards.forEach(c => c.querySelector('input').addEventListener('change', updateTags));
        search.addEventListener('input', () => {
            const q = search.value.trim().toLocaleLowerCase('fa');
            let visible = 0;
            cards.forEach(c => {
                const show = c.dataset.search.toLocaleLowerCase('fa').includes(q);
                c.classList.toggle('hidden', !show);
                if (show) visible++
            });
            document.getElementById('tagEmpty').classList.toggle('hidden', visible > 0)
        });
        document.getElementById('clearTags').addEventListener('click', () => {
            cards.forEach(c => c.querySelector('input').checked = false);
            updateTags()
        });
        document.getElementById('selectedTags').addEventListener('click', e => {
            const b = e.target.closest('[data-remove-tag]');
            if (!b) return;
            document.querySelector(`input[name="tag_ids[]"][value="${b.dataset.removeTag}"]`).checked = false;
            updateTags()
        });
        form.addEventListener('submit', e => {
            e.preventDefault();
            const b = form.querySelector('[type=submit]');
            b.textContent = '✓ تگ‌های محصول آماده ذخیره هستند';
            setTimeout(() => b.textContent = 'ذخیره تگ‌های محصول ←', 2200)
        });
        updateTags();
    </script>
@endsection
