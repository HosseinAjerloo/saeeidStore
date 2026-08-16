@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد گروه بندی جدید</title>
@endsection

@section('content')
    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <section
                class="relative mb-6 overflow-hidden rounded-3xl border border-brand-500/20 bg-gradient-to-l from-brand-500/[0.13] via-ink-850/80 to-aqua-500/[0.08] p-6 animate-fade-up sm:p-8">
                <div class="absolute -left-16 -top-20 h-56 w-56 rounded-full bg-aqua-500/10 blur-3xl"></div>
                <div class="absolute -bottom-24 right-1/3 h-48 w-48 rounded-full bg-brand-500/10 blur-3xl"></div>
                <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <div
                            class="mb-3 inline-flex items-center gap-2 rounded-full border border-brand-500/20 bg-brand-500/10 px-3 py-1.5 text-[11px] font-bold text-brand-300">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-400 animate-pulse"></span>ساختار کاتالوگ
                        </div>
                        <h2 class="text-2xl font-extrabold text-white sm:text-3xl">ایجاد گروه محصول</h2>
                        <p class="mt-2 max-w-xl text-sm leading-7 text-slate-400">برای دسته‌بندی بهتر محصولات، مشخصات
                            گروه و جایگاه آن در ساختار فروشگاه را تعریف کنید.</p></div>
                    <a href="groups-index.html"
                       class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300 backdrop-blur-sm transition-all hover:border-brand-500/30 hover:text-brand-300">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                        </svg>
                        بازگشت به گروه‌ها</a></div>
                <div class="relative mt-7 grid grid-cols-3 gap-2 sm:max-w-2xl sm:gap-3">
                    <div class="step-pill active"><span>۱</span>
                        <div><b>ساختار</b><small>نام و گروه والد</small></div>
                    </div>
                    <div class="step-pill"><span>۲</span>
                        <div><b>محتوا</b><small>توضیحات و تصویر</small></div>
                    </div>
                    <div class="step-pill"><span>۳</span>
                        <div><b>انتشار</b><small>وضعیت و ترتیب</small></div>
                    </div>
                </div>
            </section>

            <form id="createGroupForm" action="{{route('admin.category.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                    <div class="space-y-5 xl:col-span-8">
                        <section class="form-section glass-card animate-fade-up stagger-1 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number">۰۱</div>
                                <div><h3>ساختار گروه</h3>
                                    <p>عنوان، آدرس و جایگاه گروه در کاتالوگ</p></div>
                                <span class="mr-auto chip bg-brand-500/10 text-brand-300">اصلی</span></div>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <label class="field-group">
                                    <span class="field-label">نام گروه <span
                                            class="text-rose">*</span></span>
                                    <span class="field-shell">
                                        <svg viewBox="0 0 24 24"><path d="M3 6h7l2 2h9v11H3z"></path></svg>
                                        <input id="groupName" value="{{old('name')}}" name="name" type="text" required="" maxlength="255"
                                               placeholder="مثلاً کالای پلاستیکی">
                                    </span>
                                    <span id="nameError" class="mt-2 hidden text-[11px] text-rose">
                                        نام گروه را وارد کنید.
                                    </span>
                                </label>

                                <label class="field-group">
                                    <span class="field-label">گروه والد</span>
                                    <span class="native-select-shell">
                                        <span class="native-select-icon">
                                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M3.75 6.75A2.25 2.25 0 016 4.5h5.25l2.25 2.25H18A2.25 2.25 0 0120.25 9v8.25A2.25 2.25 0 0118 19.5H6a2.25 2.25 0 01-2.25-2.25V6.75z">

                                                </path>
                                            </svg>
                                        </span>
                                      <select id="parentGroup" name="parent_id" class="native-select">
                                        <option value="">بدون گروه والد — ایجاد گروه اصلی</option>
                                        <optgroup label="گروه‌های موجود">
                                          <option value="1">کالای دیجیتال — ۸ زیرگروه</option>
                                          <option value="2">خانه و آشپزخانه — ۱۲ زیرگروه</option>
                                          <option value="3">مد و پوشاک — ۶ زیرگروه</option>
                                          <option value="4">ورزش و سفر — ۵ زیرگروه</option>
                                        </optgroup>
                                      </select>
                                      <svg class="native-select-chevron" fill="none" viewBox="0 0 24 24"
                                           stroke-width="2"
                                           stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 9l-7.5 7.5L4.5 9"></path>
                                      </svg>
                                    </span>
                                    <small class="field-hint">برای ساخت زیرگروه، یک گروه والد انتخاب کنید.</small>
                                </label>
                            </div>
                        </section>

                        <section class="form-section glass-card animate-fade-up stagger-2 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number aqua">۰۲</div>
                                <div><h3>محتوا و تصویر</h3>
                                    <p>توضیح کوتاه و هویت بصری گروه</p></div>
                                <span class="mr-auto chip bg-aqua-500/10 text-aqua-300">نمایش فروشگاه</span>
                            </div>
                            <div class="space-y-5 p-5 sm:p-7">
                                <label class="field-group">
                                    <span class="field-label">توضیحات گروه</span>
                                    <span
                                        class="field-shell items-start">
                                        <svg class="mt-3" viewBox="0 0 24 24">
                                            <path
                                                d="M4 5h16M4 10h16M4 15h10M4 19h7">

                                            </path>
                                        </svg>
                                        <textarea id="description" name="description" rows="5" maxlength="1000"
                                                  placeholder="توضیحی کوتاه درباره محصولات این گروه بنویسید..."></textarea>
                                    </span>
                                    <span
                                        class="mt-2 flex justify-between text-[10px] text-slate-600">
                                        <span>این متن در صفحه گروه نمایش داده می‌شود.</span>
                                        <span id="descriptionCount">۰ / ۱۰۰۰</span>
                                    </span>
                                </label>
                                <div class="field-group">
                                    <span class="field-label">تصویر گروه</span>
                                    <label
                                        id="uploadZone" class="upload-zone">
                                        <input id="imageInput" name="image" type="file"
                                               accept="image/png,image/jpeg,image/webp" class="sr-only">
                                        <span
                                            class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-500/10 text-brand-400">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                                 stroke="currentColor"><path stroke-linecap="round"
                                                                             stroke-linejoin="round"
                                                                             d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"></path></svg></span><span><b
                                                id="uploadTitle">تصویر را انتخاب کنید</b>
                                            <small id="uploadHint">PNG، JPG یا WebP تا حجم ۲ مگابایت</small>
                                        </span>
                                        <span class="upload-action">انتخاب فایل</span>
                                    </label>
                                </div>
                            </div>
                        </section>

                        <section class="form-section glass-card animate-fade-up stagger-3 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number amber">۰۳</div>
                                <div><h3>تنظیمات انتشار</h3>
                                    <p>وضعیت نمایش و اولویت گروه</p></div>
                                <span class="mr-auto chip bg-amberx/10 text-amberx">کنترل نمایش</span></div>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <div class="field-group">
                                    <span class="field-label">وضعیت گروه</span><label
                                        class="account-status">
                                        <span class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                                </path>
                                            </svg>
                                        </span>
                                        <span
                                            class="flex-1">
                                            <b>گروه فعال باشد</b>
                                            <small>در فروشگاه قابل مشاهده خواهد بود</small>
                                        </span>
                                        <span class="relative">
                                            <input id="activeInput" @if(old('is_active')=='1') checked="checked" @endif name="is_active" type="checkbox" value="1" checked="checked" class="peer sr-only"><span
                                                class="block h-6 w-11 rounded-full bg-ink-600 transition-colors peer-checked:bg-brand-500"></span>
                                            <span class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white shadow transition-transform peer-checked:-translate-x-3"></span>
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </section>

                        <div
                            class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                            <p class="hidden items-center gap-2 text-xs text-slate-500 sm:flex"><span
                                    class="h-2 w-2 rounded-full bg-amberx"></span>نام و نامک برای ثبت گروه الزامی هستند.
                            </p>
                            <div class="flex gap-3">
                                <button type="reset"
                                        class="flex-1 rounded-xl border border-white/10 px-5 py-3 text-sm font-semibold text-slate-400 transition-all hover:bg-white/5 hover:text-white sm:flex-none">
                                    پاک کردن
                                </button>
                                <button type="submit"
                                        class="group flex flex-1 items-center justify-center gap-2 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow transition-all hover:shadow-glow-lg hover:brightness-110 active:scale-95 sm:flex-none">
                                    ثبت گروه
                                    <svg class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none"
                                         viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <aside class="space-y-5 xl:col-span-4">
                        <section
                            class="profile-preview glass-card animate-fade-up stagger-2 overflow-hidden p-0 xl:sticky xl:top-24">
                            <div id="imagePreview"
                                 class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-brand-500/15 via-ink-800 to-aqua-500/10">
                                <svg id="imagePlaceholder" class="h-14 w-14 text-brand-400/60" fill="none"
                                     viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3.75 6.75A2.25 2.25 0 016 4.5h5.25l2.25 2.25H18a2.25 2.25 0 012.25 2.25v8.25A2.25 2.25 0 0118 19.5H6a2.25 2.25 0 01-2.25-2.25V6.75z"></path>
                                </svg>
                                <img id="previewImg" alt="پیش‌نمایش تصویر گروه"
                                     class="absolute inset-0 hidden h-full w-full object-cover"><span id="statusPreview"
                                                                                                      class="absolute left-4 top-4 chip backdrop-blur-md bg-brand-500/15 text-brand-300"><span
                                        class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>فعال</span></div>
                            <div class="p-6"><p class="text-[10px] font-bold tracking-wider text-brand-400">گروه
                                    محصولات</p>
                                <h3 id="namePreview" class="mt-2 text-lg font-extrabold text-white">نام گروه جدید</h3>
                                <p id="slugPreview" dir="ltr"
                                   class="mt-1 truncate text-left text-[11px] text-slate-600">/groups/new-group</p>
                                <p id="descriptionPreview" class="mt-4 min-h-[3rem] text-xs leading-6 text-slate-400">
                                    توضیحات گروه پس از وارد کردن در این قسمت نمایش داده می‌شود.</p>
                                <div class="my-5 h-px bg-white/[0.06]"></div>
                                <div class="space-y-3 text-xs">
                                    <div class="preview-row"><span>گروه والد</span><b id="parentPreview">کالای
                                            دیجیتال</b></div>
                                    <div class="preview-row"><span>ترتیب نمایش</span><b id="sortPreview">۰</b></div>
                                </div>
                                <div class="mt-6 flex items-end justify-between">
                                    <div><p class="text-[11px] text-slate-500">تکمیل اطلاعات</p>
                                        <p id="completionText" class="mt-1 text-xl font-extrabold text-white">۴۳٪</p>
                                    </div>
                                    <div
                                        class="relative grid h-14 w-14 place-items-center rounded-full bg-ink-800 text-xs font-bold text-brand-300">
                                        <svg class="absolute inset-0 h-full w-full -rotate-90" viewBox="0 0 36 36">
                                            <circle cx="18" cy="18" r="15.5" fill="none" stroke="rgba(255,255,255,.06)"
                                                    stroke-width="2"></circle>
                                            <circle id="progressCircle" cx="18" cy="18" r="15.5" fill="none"
                                                    stroke="#34d399" stroke-width="2" stroke-linecap="round"
                                                    stroke-dasharray="97.4" stroke-dashoffset="69.6"
                                                    style="stroke-dashoffset: 55.518;"></circle>
                                        </svg>
                                        <span id="completionMini">۴۳٪</span></div>
                                </div>
                                <div class="mt-4 h-1.5 overflow-hidden rounded-full bg-white/[0.06]">
                                    <div id="completionBar"
                                         class="h-full w-[29%] rounded-full bg-gradient-to-l from-brand-400 to-aqua-400 transition-all duration-500"
                                         style="width: 43%;"></div>
                                </div>
                                <div class="mt-6 rounded-2xl border border-aqua-500/10 bg-aqua-500/[0.06] p-4">
                                    <div class="flex gap-3">
                                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-aqua-400" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-[11px] leading-5 text-slate-400">کارت گروه هم‌زمان با تکمیل فرم
                                            به‌روزرسانی می‌شود.</p></div>
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </form>
        </div>
    </main>

@endsection
