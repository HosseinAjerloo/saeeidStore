@section('title')
    <title>پنل | ایجاد کاربر جدید</title>
@endsection
@extends('admin.layout.master')
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
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-400 animate-pulse"></span>عضو جدید تیم
                        </div>
                        <h2 class="text-2xl font-extrabold text-white sm:text-3xl">ایجاد حساب کاربری</h2>
                        <p class="mt-2 max-w-xl text-sm leading-7 text-slate-400">اطلاعات کاربر را تکمیل کنید؛ می‌توانید
                            موارد اختیاری را بعداً از پروفایل او ویرایش کنید.</p>
                    </div>
                    <a href="users-index.html"
                       class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300 backdrop-blur-sm transition-all hover:border-brand-500/30 hover:text-brand-300">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                        </svg>
                        بازگشت به کاربران</a>
                </div>
                <div class="relative mt-7 grid grid-cols-3 gap-2 sm:max-w-2xl sm:gap-3">
                    <div class="step-pill active"><span>۱</span>
                        <div><b>مشخصات</b><small>اطلاعات پایه</small></div>
                    </div>
                    <div class="step-pill"><span>۲</span>
                        <div><b>ارتباط</b><small>راه‌های تماس</small></div>
                    </div>
                    <div class="step-pill"><span>۳</span>
                        <div><b>امنیت</b><small>دسترسی حساب</small></div>
                    </div>
                </div>
            </section>

            <form id="createUserForm" action="{{route('admin.user.store')}}" method="post" novalidate="">
                @csrf
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                    <div class="space-y-5 xl:col-span-8">
                        <section class="form-section glass-card animate-fade-up stagger-1 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number">۰۱</div>
                                <div><h3>اطلاعات فردی</h3>
                                    <p>مشخصات شناسایی و عمومی کاربر</p></div>
                                <span class="mr-auto chip bg-brand-500/10 text-brand-300">اختیاری</span>
                            </div>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <label class="field-group">
                                    <span class="field-label">نام</span>
                                    <span class="field-shell">
                                        <svg viewBox="0 0 24 24">
                                            <path
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.1a7.5 7.5 0 0115 0"></path></svg><input
                                            name="name" type="text" maxlength="255" autocomplete="given-name"
                                            placeholder="مثلاً علی"></span></label>
                                <label class="field-group"><span class="field-label">نام خانوادگی</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M18 18.7a6 6 0 00-12 0M12 12a3.5 3.5 0 100-7 3.5 3.5 0 000 7z"></path></svg><input
                                            name="family" type="text" maxlength="255" autocomplete="family-name"
                                            placeholder="مثلاً رضایی"></span></label>
                                <label class="field-group"><span class="field-label">کد ملی</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M4 6.5h16v11H4zM8 10h3M8 14h6"></path></svg><input
                                            name="national_id_number" type="text" inputmode="numeric" maxlength="10"
                                            dir="ltr" placeholder="0012345678" class="text-left"></span><small
                                        class="field-hint">کد ملی ۱۰ رقمی بدون خط تیره</small></label>
                                <label class="field-group"><span class="field-label">تاریخ تولد</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M6 3v3m12-3v3M4 9h16M5 5h14a1 1 0 011 1v14H4V6a1 1 0 011-1z"></path></svg><input
                                            name="date_ofـbirth" type="date" dir="ltr" class="text-left"></span></label>
                                <label class="field-group"><span class="field-label">جنسیت</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M12 21a8 8 0 100-16 8 8 0 000 16zM9 11h6M12 8v6"></path></svg><select
                                            name="gender"><option value="">انتخاب کنید</option><option
                                                value="male">مرد</option><option value="female">زن</option><option
                                                value="other">سایر</option></select></span></label>
                                <div class="field-group"><span class="field-label">وضعیت حساب</span><label
                                        class="account-status"><span
                                            class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400"><svg
                                                class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                                stroke="currentColor"><path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span><span
                                            class="flex-1"><b>حساب فعال</b><small>کاربر بلافاصله امکان ورود دارد</small></span><span
                                            class="relative"><input name="is_active" type="checkbox" value="1"
                                                                    checked="" class="peer sr-only"><span
                                                class="block h-6 w-11 rounded-full bg-ink-600 transition-colors peer-checked:bg-brand-500"></span><span
                                                class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white shadow transition-transform peer-checked:-translate-x-5"></span></span></label>
                                </div>
                            </div>
                        </section>

                        <section class="form-section glass-card animate-fade-up stagger-2 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number aqua">۰۲</div>
                                <div><h3>اطلاعات تماس</h3>
                                    <p>راه‌های ارتباطی قابل استفاده</p></div>
                                <span class="mr-auto chip bg-aqua-500/10 text-aqua-300">ارتباط</span></div>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <label class="field-group"><span class="field-label">شماره موبایل</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M8 3h8a1 1 0 011 1v16a1 1 0 01-1 1H8a1 1 0 01-1-1V4a1 1 0 011-1zM10 18h4"></path></svg><input
                                            name="mobile" type="tel" inputmode="tel" maxlength="11" autocomplete="tel"
                                            dir="ltr" placeholder="09123456789" class="text-left"></span></label>
                                <label class="field-group"><span class="field-label">تلفن ثابت</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M7 4l3 4-2 2a14 14 0 006 6l2-2 4 3-2 3C10 20 4 14 4 6l3-2z"></path></svg><input
                                            name="phone" type="tel" inputmode="tel" maxlength="20" dir="ltr"
                                            placeholder="02112345678" class="text-left"></span></label>
                                <label class="field-group sm:col-span-2"><span
                                        class="field-label">نشانی ایمیل</span><span class="field-shell"><svg
                                            viewBox="0 0 24 24"><path d="M3 6h18v12H3zM3 7l9 6 9-6"></path></svg><input
                                            name="email" type="email" maxlength="255" autocomplete="email" dir="ltr"
                                            placeholder="user@example.com" class="text-left"></span><small
                                        class="field-hint">برای بازیابی حساب و دریافت اعلان‌ها استفاده
                                        می‌شود.</small></label>
                            </div>
                        </section>

                        <section class="form-section glass-card animate-fade-up stagger-3 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number amber">۰۳</div>
                                <div><h3>امنیت حساب</h3>
                                    <p>تنظیم اطلاعات ورود به پنل</p></div>
                                <span class="mr-auto chip bg-rose/10 text-rose">الزامی</span></div>
                            <div class="p-5 sm:p-7">
                                <label class="field-group"><span class="field-label">رمز عبور <span
                                            class="text-rose">*</span></span><span class="field-shell"><svg
                                            viewBox="0 0 24 24"><path
                                                d="M7 10V7a5 5 0 0110 0v3M5 10h14v11H5z"></path></svg><input
                                            id="password" name="password" type="password" required="" minlength="8"
                                            autocomplete="new-password" dir="ltr" placeholder="حداقل ۸ کاراکتر"
                                            class="pl-12 text-left"><button id="togglePassword" type="button"
                                                                            class="password-toggle"
                                                                            aria-label="نمایش رمز عبور"><svg
                                                viewBox="0 0 24 24"><path
                                                    d="M3 12s3-5 9-5 9 5 9 5-3 5-9 5-9-5-9-5zM12 14.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"></path></svg></button></span><span
                                        id="passwordError" class="mt-2 hidden text-[11px] text-rose">رمز عبور باید حداقل ۸ کاراکتر باشد.</span></label>
                                <div class="mt-4">
                                    <div class="mb-2 flex justify-between text-[10px]"><span class="text-slate-500">قدرت رمز عبور</span><span
                                            id="strengthLabel" class="font-bold text-slate-500">وارد نشده</span></div>
                                    <div class="grid grid-cols-4 gap-1.5"><span class="strength-bar"></span><span
                                            class="strength-bar"></span><span class="strength-bar"></span><span
                                            class="strength-bar"></span></div>
                                </div>
                                <div class="mt-5 flex flex-wrap gap-2 text-[10px] text-slate-500"><span
                                        class="password-rule" data-rule="length">۸ کاراکتر</span><span
                                        class="password-rule" data-rule="number">شامل عدد</span><span
                                        class="password-rule" data-rule="letter">شامل حروف</span></div>
                            </div>
                        </section>

                        <div
                            class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                            <p class="hidden items-center gap-2 text-xs text-slate-500 sm:flex"><span
                                    class="h-2 w-2 rounded-full bg-amberx"></span>پیش از ثبت، اطلاعات را بررسی کنید.</p>
                            <div class="flex gap-3">
                                <button type="reset"
                                        class="flex-1 rounded-xl border border-white/10 px-5 py-3 text-sm font-semibold text-slate-400 transition-all hover:bg-white/5 hover:text-white sm:flex-none">
                                    پاک کردن
                                </button>
                                <button type="submit"
                                        class="group flex flex-1 items-center justify-center gap-2 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow transition-all hover:shadow-glow-lg hover:brightness-110 active:scale-95 sm:flex-none">
                                    ثبت کاربر
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
                            <div class="h-24 bg-gradient-to-l from-brand-500/25 via-aqua-500/15 to-ink-800"></div>
                            <div class="px-6 pb-6">
                                <div id="avatarPreview"
                                     class="-mt-10 grid h-20 w-20 place-items-center rounded-3xl border-4 border-ink-850 bg-gradient-to-br from-brand-400 to-aqua-500 text-2xl font-extrabold text-ink-950 shadow-glow">
                                    ک
                                </div>
                                <div class="mt-4 flex items-start justify-between gap-3">
                                    <div><h3 id="namePreview" class="font-extrabold text-white">کاربر جدید</h3>
                                        <p id="emailPreview" class="mt-1 text-xs text-slate-500">ایمیل ثبت نشده</p>
                                    </div>
                                    <span id="statusPreview" class="chip bg-brand-500/10 text-brand-300"><span
                                            class="h-1.5 w-1.5 rounded-full bg-brand-400"></span>فعال</span></div>
                                <div class="my-5 h-px bg-white/[0.06]"></div>
                                <div class="flex items-end justify-between">
                                    <div><p class="text-[11px] text-slate-500">تکمیل پروفایل</p>
                                        <p id="completionText" class="mt-1 text-xl font-extrabold text-white">۰٪</p>
                                    </div>
                                    <div
                                        class="relative grid h-14 w-14 place-items-center rounded-full bg-ink-800 text-xs font-bold text-brand-300">
                                        <svg class="absolute inset-0 h-full w-full -rotate-90" viewBox="0 0 36 36">
                                            <circle cx="18" cy="18" r="15.5" fill="none" stroke="rgba(255,255,255,.06)"
                                                    stroke-width="2"></circle>
                                            <circle id="progressCircle" cx="18" cy="18" r="15.5" fill="none"
                                                    stroke="#34d399" stroke-width="2" stroke-linecap="round"
                                                    stroke-dasharray="97.4" stroke-dashoffset="97.4"
                                                    style="stroke-dashoffset: 97.4;"></circle>
                                        </svg>
                                        <span id="completionMini">۰٪</span></div>
                                </div>
                                <div class="mt-4 h-1.5 overflow-hidden rounded-full bg-white/[0.06]">
                                    <div id="completionBar"
                                         class="h-full w-0 rounded-full bg-gradient-to-l from-brand-400 to-aqua-400 transition-all duration-500"
                                         style="width: 0%;"></div>
                                </div>
                                <div class="mt-6 space-y-3 text-xs">
                                    <div class="preview-row"><span>شماره موبایل</span><b id="mobilePreview"
                                                                                         dir="ltr">—</b></div>
                                    <div class="preview-row"><span>جنسیت</span><b id="genderPreview">—</b></div>
                                    <div class="preview-row"><span>نوع حساب</span><b>کاربر عادی</b></div>
                                </div>
                                <div class="mt-6 rounded-2xl border border-aqua-500/10 bg-aqua-500/[0.06] p-4">
                                    <div class="flex gap-3">
                                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-aqua-400" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
                                        </svg>
                                        <p class="text-[11px] leading-5 text-slate-400">پیش‌نمایش کارت کاربر هم‌زمان با
                                            تکمیل فرم به‌روزرسانی می‌شود.</p></div>
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </form>
        </div>
    </main>
@endsection

