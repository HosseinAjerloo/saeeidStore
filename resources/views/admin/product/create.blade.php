@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد محصول جدید</title>
@endsection
@section('content')
<main class="flex-1 p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-7xl">
        <section
            class="relative mb-6 overflow-hidden rounded-3xl border border-brand-500/20 bg-gradient-to-l from-brand-500/[0.13] via-ink-850/80 to-aqua-500/[0.08] p-6 animate-fade-up sm:p-8">
            <div class="absolute -left-16 -top-20 h-56 w-56 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <div
                        class="mb-3 inline-flex items-center gap-2 rounded-full border border-brand-500/20 bg-brand-500/10 px-3 py-1.5 text-[11px] font-bold text-brand-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400 animate-pulse"></span>محصول جدید
                    </div>
                    <h2 class="text-2xl font-extrabold text-white sm:text-3xl">ایجاد محصول</h2>
                    <p class="mt-2 max-w-xl text-sm leading-7 text-slate-400">مشخصات اصلی، محتوای معرفی و تنظیمات انتشار
                        محصول را تکمیل کنید.</p></div>
                <a href="{{route('admin.product.index')}}"
                   class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300 hover:border-brand-500/30 hover:text-brand-300">←
                    بازگشت به محصولات</a></div>
            <div class="relative mt-7 grid grid-cols-3 gap-2 sm:max-w-2xl sm:gap-3">
                <div class="step-pill active"><span>۱</span>
                    <div><b>مشخصات</b><small>نام و جایگاه</small></div>
                </div>
                <div class="step-pill"><span>۲</span>
                    <div><b>محتوا</b><small>توضیحات</small></div>
                </div>
                <div class="step-pill"><span>۳</span>
                    <div><b>انتشار</b><small>تصویر و وضعیت</small></div>
                </div>
            </div>
        </section>

        <form id="createProductForm" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                <div class="space-y-5 xl:col-span-8">
                    <section class="form-section glass-card animate-fade-up stagger-1 overflow-hidden p-0">
                        <div class="section-heading">
                            <div class="section-number">۰۱</div>
                            <div><h3>مشخصات اصلی</h3>
                                <p>نام، آدرس و جایگاه محصول در کاتالوگ</p></div>
                            <span class="mr-auto chip bg-brand-500/10 text-brand-300">اصلی</span></div>
                        <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                            <label class="field-group"><span class="field-label">نام محصول <span
                                        class="text-rose">*</span></span><span class="field-shell"><svg
                                        viewBox="0 0 24 24"><path d="M5 5h14v14H5zM9 9h6v6H9z"></path></svg><input
                                        id="productName" name="name" type="text" required="" maxlength="255"
                                        placeholder="مثلاً هدفون بی‌سیم سونی"></span><span id="nameError"
                                                                                           class="mt-2 hidden text-[11px] text-rose">نام محصول را وارد کنید.</span></label>


                            <label class="field-group">
                                <span class="field-label">برند محصول</span>
                                <span class="native-select-shell">
                                    <span class="native-select-icon">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M10 3H5v7l8 10 7-7L10 3z"></path>
                                        </svg>
                                    </span>
                                    <select id="brandInput" name="brand_id" class="native-select">
                                       @foreach($brands as $brand)
                                            <option @selected(old('brand_id')==$brand->id) value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <svg class="native-select-chevron" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </span>
                            </label>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <label class="field-group">
                                    <span class="field-label">
                                        انتخاب دسته والد
                                    </span>
                                    <input type="hidden" name="group_id" id="parent">
                                    <div id="category-tree">

                                    </div>
                                </label>

                            </div>
                        </div>
                    </section>

                    <section class="form-section glass-card animate-fade-up stagger-2 overflow-hidden p-0">
                        <div class="section-heading">
                            <div class="section-number aqua">۰۲</div>
                            <div><h3>محتوای محصول</h3>
                                <p>متن کوتاه و معرفی کامل محصول</p></div>
                            <span class="mr-auto chip bg-aqua-500/10 text-aqua-300">معرفی محصول</span></div>
                        <div class="space-y-5 p-5 sm:p-7">
                            <label class="field-group"><span class="field-label">توضیح کوتاه</span><span
                                    class="field-shell items-start"><svg class="mt-3" viewBox="0 0 24 24"><path
                                            d="M4 6h16M4 11h12M4 16h8"></path></svg><textarea id="shortDescription"
                                                                                              name="short_description"
                                                                                              rows="3" maxlength="250"
                                                                                              placeholder="خلاصه‌ای جذاب از مهم‌ترین ویژگی‌های محصول..."></textarea></span><span
                                    class="mt-2 flex justify-between text-[10px] text-slate-600"><span>در کارت و ابتدای صفحه محصول نمایش داده می‌شود.</span><span
                                        id="shortCount">۰ / ۲۵۰</span></span></label>
                            <label class="field-group"><span class="field-label">توضیحات کامل</span><span
                                    class="field-shell items-start"><svg class="mt-3" viewBox="0 0 24 24"><path
                                            d="M4 5h16M4 10h16M4 15h10M4 19h7"></path></svg><textarea id="description"
                                                                                                      name="description"
                                                                                                      rows="7"
                                                                                                      maxlength="5000"
                                                                                                      placeholder="مشخصات، کاربردها و جزئیات کامل محصول را وارد کنید..."></textarea></span><span
                                    class="mt-2 flex justify-between text-[10px] text-slate-600"><span>برای معرفی کامل محصول در صفحه جزئیات</span><span
                                        id="descriptionCount">۰ / ۵۰۰۰</span></span></label>
                        </div>
                    </section>

                    <section class="form-section glass-card animate-fade-up stagger-3 overflow-hidden p-0">
                        <div class="section-heading">
                            <div class="section-number amber">۰۳</div>
                            <div><h3>تصویر و انتشار</h3>
                                <p>تصویر شاخص و تنظیمات نمایش محصول</p></div>
                            <span class="mr-auto chip bg-amberx/10 text-amberx">انتشار</span></div>
                        <div class="space-y-5 p-5 sm:p-7">
                            <div class="field-group"><span class="field-label">تصویر محصول</span><label
                                    class="upload-zone"><input id="imageInput" name="image" type="file"
                                                               accept="image/png,image/jpeg,image/webp" class="sr-only"><span
                                        class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-500/10 text-brand-400"><svg
                                            class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path
                                                d="M4 16v4h16v-4M8 8l4-4 4 4M12 4v12"></path></svg></span><span><b
                                            id="uploadTitle">تصویر محصول را انتخاب کنید</b><small id="uploadHint">PNG، JPG یا WebP تا حجم ۲ مگابایت</small></span><span
                                        class="upload-action">انتخاب فایل</span></label></div>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="field-group"><span class="field-label">وضعیت محصول</span><label
                                        class="account-status"><span
                                            class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400">✓</span><span
                                            class="flex-1"><b>محصول فعال باشد</b><small>در فروشگاه قابل مشاهده است</small></span><span
                                            class="relative"><input id="activeInput" name="is_active" type="checkbox"
                                                                    value="1" checked="" class="peer sr-only"><span
                                                class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-brand-500"></span><span
                                                class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-5"></span></span></label>
                                </div>
                                <div class="field-group"><span class="field-label">محصول ویژه</span><label
                                        class="account-status"><span
                                            class="grid h-9 w-9 place-items-center rounded-xl bg-amberx/10 text-amberx">★</span><span
                                            class="flex-1"><b>در محصولات ویژه</b><small>در بخش‌های شاخص نمایش داده شود</small></span><span
                                            class="relative"><input id="featuredInput" name="is_featured"
                                                                    type="checkbox" value="1" class="peer sr-only"><span
                                                class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-amberx"></span><span
                                                class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-3"></span></span></label>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div
                        class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                        <p class="hidden text-xs text-slate-500 sm:block">نام محصول تنها فیلد الزامی این Migration
                            است.</p>
                        <div class="flex gap-3">
                            <button type="reset"
                                    class="flex-1 rounded-xl border border-white/10 px-5 py-3 text-sm text-slate-400 sm:flex-none">
                                پاک کردن
                            </button>
                            <button type="submit"
                                    class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow sm:flex-none">
                                ثبت محصول ←
                            </button>
                        </div>
                    </div>
                </div>

                <aside class="xl:col-span-4">
                    <section class="profile-preview glass-card overflow-hidden p-0 xl:sticky xl:top-24">
                        <div id="imagePreview"
                             class="relative flex h-64 items-center justify-center overflow-hidden bg-gradient-to-br from-brand-500/15 via-ink-800 to-aqua-500/10">
                            <svg id="imagePlaceholder" class="h-16 w-16 text-brand-400/50" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 5h16v14H4zM4 16l5-5 4 4 2-2 5 5M15 9h.01"></path>
                            </svg>
                            <img id="previewImg" class="absolute inset-0 hidden h-full w-full object-cover"
                                 alt="پیش‌نمایش محصول">
                            <div class="absolute right-4 top-4 flex gap-2"><span id="statusPreview"
                                                                                 class="chip bg-brand-500/15 text-brand-300 backdrop-blur-md"><span
                                        class="status-dot bg-brand-400"></span>فعال</span><span id="featuredPreview"
                                                                                                class="chip hidden bg-amberx/15 text-amberx backdrop-blur-md">★ ویژه</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap gap-2"><span id="groupPreview"
                                                                    class="chip bg-brand-500/10 text-brand-300">بدون گروه</span><span
                                    id="brandPreview" class="chip bg-aqua-500/10 text-aqua-300">بدون برند</span></div>
                            <h3 id="namePreview" class="mt-4 text-lg font-extrabold text-white">نام محصول جدید</h3>
                            <p id="slugPreview" dir="ltr" class="mt-1 truncate text-left text-[11px] text-slate-600">
                                /products/new-product</p>
                            <p id="shortPreview" class="mt-4 min-h-[3rem] text-xs leading-6 text-slate-400">توضیح کوتاه
                                محصول در این قسمت نمایش داده می‌شود.</p>
                            <div class="my-5 h-px bg-white/[0.06]"></div>
                            <div class="flex items-end justify-between">
                                <div><p class="text-[11px] text-slate-500">تکمیل اطلاعات</p>
                                    <p id="completionText" class="mt-1 text-xl font-extrabold text-white">۱۱٪</p></div>
                                <div
                                    class="relative grid h-14 w-14 place-items-center rounded-full bg-ink-800 text-xs font-bold text-brand-300">
                                    <svg class="absolute inset-0 h-full w-full -rotate-90" viewBox="0 0 36 36">
                                        <circle cx="18" cy="18" r="15.5" fill="none" stroke="rgba(255,255,255,.06)"
                                                stroke-width="2"></circle>
                                        <circle id="progressCircle" cx="18" cy="18" r="15.5" fill="none"
                                                stroke="#34d399" stroke-width="2" stroke-dasharray="97.4"
                                                stroke-dashoffset="76" style="stroke-dashoffset: 86.686;"></circle>
                                    </svg>
                                    <span id="completionMini">۱۱٪</span></div>
                            </div>
                            <div class="mt-4 h-1.5 overflow-hidden rounded-full bg-white/[0.06]">
                                <div id="completionBar"
                                     class="h-full w-[22%] rounded-full bg-gradient-to-l from-brand-400 to-aqua-400 transition-all"
                                     style="width: 11%;"></div>
                            </div>
                            <div
                                class="mt-6 rounded-2xl border border-aqua-500/10 bg-aqua-500/[0.06] p-4 text-[11px] leading-5 text-slate-400">
                                پیش‌نمایش محصول هم‌زمان با تغییر فرم به‌روزرسانی می‌شود.
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </form>
    </div>
</main>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            let tree = {{ \Illuminate\Support\Js::from($groups) }};

            $('#category-tree').jstree({
                core: {
                    data: tree
                }
            });
            $('#category-tree').on('loaded.jstree', function () {

                if (oldParent) {
                    $('#category-tree')
                        .jstree(true)
                        .select_node({{old('group_id')}});
                }

            });
            $('#category-tree').on('select_node.jstree', function (e, data) {
                $('#parent').val(data.node.id);
            });
        });
    </script>
@endsection
