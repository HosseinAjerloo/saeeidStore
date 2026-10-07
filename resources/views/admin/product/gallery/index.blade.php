@extends('admin.layout.master')

@section('content')
    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <section
                class="relative mb-6 overflow-hidden rounded-3xl border border-brand-500/20 bg-gradient-to-l from-brand-500/[0.13] via-ink-850/80 to-aqua-500/[0.08] p-6 animate-fade-up sm:p-8">
                <div class="absolute -left-16 -top-20 h-56 w-56 rounded-full bg-aqua-500/10 blur-3xl"></div>
                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div><span class="chip bg-brand-500/10 text-brand-300">مدیریت مستقل</span>
                        <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">تنوع‌های محصول</h2>
                        <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-400">محصول را انتخاب کنید، مدل‌های آن را
                            بسازید و قیمت و موجودی هر مدل را جداگانه ثبت کنید.</p>
                    </div>
                    <a href="products-index.html"
                        class="inline-flex w-fit items-center rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300">←
                        فهرست محصولات</a>
                </div>
            </section>

            <form id="variantForm" action="{{ route('admin.product.gallery.store', $product) }}" method="post"
                novalidate="" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <section class="form-section glass-card animate-fade-up stagger-1 overflow-hidden p-0">
                    <div class="section-heading">
                        <div class="section-number">
                            ۰۱
                        </div>
                        <div>
                            <h3>انتخاب محصول</h3>
                            <p>تنوع‌ها برای محصول انتخاب‌شده ذخیره می‌شوند</p>
                        </div>
                        <span class="mr-auto chip bg-brand-500/10 text-brand-300">الزامی</span>
                    </div>
                    <div class="grid gap-5 p-5 sm:p-7 ">

                        <div class="flex items-center gap-4 rounded-2xl border border-white/[0.07] bg-ink-800/50 p-4">
                            <span id="productIcon"
                                class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-brand-500/10 text-2xl">
                                <img class="w-full h-full rounded-2xl p-1 object-cover" src="{{ asset($product->image) }}"
                                    alt="{{ $product->name }}">
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="text-[10px] text-slate-600">محصول انتخاب‌شده</p>
                                <b id="selectedProductName"
                                    class="mt-1 block truncate text-sm text-white">{{ $product->name }}</b>
                            </div>
                            {{-- todo insert model product --}}
                            <span id="selectedVariantCount" class="chip bg-aqua-500/10 text-aqua-300">۴ مدل</span>
                        </div>
                    </div>
                </section>

                <section class="form-section glass-card animate-fade-up stagger-2 overflow-hidden p-0">
                    <div class="section-heading">
                        <div class="section-number aqua">۰۲</div>
                        <div>
                            <h3>آلبوم تصاویر محصول</h3>
                            <p>چند تصویر برای محصول انتخاب کنید</p>
                        </div>
                        <span class="mr-auto chip bg-aqua-500/10 text-aqua-300">چندتایی</span>
                    </div>

                    <div class="p-5 sm:p-7">
                        <label for="productImages"
                            class="flex min-h-36 cursor-pointer flex-col items-center justify-center rounded-2xl border border-dashed border-white/10 bg-ink-800/40 p-6 text-center transition hover:border-aqua-500/40 hover:bg-aqua-500/[0.04]">
                            <span
                                class="mb-3 grid h-12 w-12 place-items-center rounded-2xl bg-aqua-500/10 text-2xl text-aqua-300">
                                +
                            </span>
                            <span class="text-sm font-bold text-white">انتخاب تصاویر</span>
                            <span class="mt-1 text-[10px] text-slate-500">
                                می‌توانید چند تصویر را همزمان انتخاب کنید
                            </span>
                            <input id="productImages" name="images[]" type="file" accept="image/*" multiple
                                class="hidden">
                        </label>

                        <div id="imagePreview" class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5">
                            @foreach ($product->images as $image)
                                <div
                                    class="group relative overflow-hidden rounded-2xl border border-white/[0.08] bg-ink-800/50">
                                    <img src="{{asset($image->path)}}" alt="${escapeHtml(file.name)}"
                                        class="aspect-square w-full object-cover">

                                    <div
                                        class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent p-2 pt-8">
                                        <p class="truncate text-[9px] text-white">
                                           {{$product->name??''}}
                                        </p>
                                    </div>

                                  
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>




                <div
                    class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-[11px] text-slate-500">ویژگی‌ها و تنوع‌ها جدا از اطلاعات اصلی محصول ذخیره
                        می‌شوند.</p>
                    <div class="flex gap-3">
                        <button type="submit"
                            class="flex-1 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow sm:flex-none">
                            ذخیره تنوع‌ها ←
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('script')
    <script>
        const imageInput = document.getElementById('productImages');
        const imagePreview = document.getElementById('imagePreview');

        let selectedImages = [];

        imageInput.addEventListener('change', event => {
            selectedImages = [
                ...selectedImages,
                ...Array.from(event.target.files)
            ];

            selectedImages = selectedImages.filter((file, index, files) =>
                index === files.findIndex(item =>
                    item.name === file.name &&
                    item.size === file.size &&
                    item.lastModified === file.lastModified
                )
            );

            syncImageInput();
            renderImagePreview();
        });

        function syncImageInput() {
            const dataTransfer = new DataTransfer();

            selectedImages.forEach(file => {
                dataTransfer.items.add(file);
            });

            imageInput.files = dataTransfer.files;
        }

        function renderImagePreview() {
            imagePreview.innerHTML = '';

            selectedImages.forEach((file, index) => {
                const url = URL.createObjectURL(file);

                imagePreview.insertAdjacentHTML('beforeend', `
                    <div class="group relative overflow-hidden rounded-2xl border border-white/[0.08] bg-ink-800/50">
                        <img
                            src="${url}"
                            alt="${escapeHtml(file.name)}"
                            class="aspect-square w-full object-cover"
                          
                        >

                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent p-2 pt-8">
                            <p class="truncate text-[9px] text-white">
                                ${escapeHtml(file.name)}
                            </p>
                        </div>

                        <button
                            type="button"
                            data-image-index="${index}"
                            class="remove-product-image absolute right-2 top-2 grid h-7 w-7 place-items-center rounded-lg bg-rose-500/90 text-sm text-white opacity-0 transition group-hover:opacity-100"
                        >
                            ×
                        </button>
                    </div>
                `);
            });
        }

        imagePreview.addEventListener('click', event => {
            const button = event.target.closest('.remove-product-image');

            if (!button) return;

            const index = Number(button.dataset.imageIndex);

            selectedImages.splice(index, 1);

            syncImageInput();
            renderImagePreview();
        });



        const body = document.getElementById('variantTableBody');

        const toFa = value =>
            String(value).replace(/\d/g, digit => '۰۱۲۳۴۵۶۷۸۹' [digit]);

        const escapeHtml = value =>
            String(value).replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);
    </script>
@endsection
