@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد پیک جدید</title>
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
                        <h2 class="text-2xl font-extrabold text-white sm:text-3xl">ایجاد پیک</h2>
                        <p class="mt-2 max-w-xl text-sm leading-7 text-slate-400">برای پیک، مشخصات پیک و جایگاه آن در ساختار ارسال سفارشات فروشگاه را تعریف کنید.</p></div>
                    <a href="groups-index.html"
                       class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300 backdrop-blur-sm transition-all hover:border-brand-500/30 hover:text-brand-300">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                        </svg>
                        بازگشت پیک ها</a>
                    </div>
                <div class="relative mt-7 grid grid-cols-3 gap-2 sm:max-w-2xl sm:gap-3">
                    <div class="step-pill active">
                        <span>۱</span>
                        <div>
                            <b>ساختار</b>
                            <small>نام </small>
                        </div>
                    </div>
                    <div class="step-pill"><span>۲</span>
                        <div><b>محتوا</b><small>توضیحات</small></div>
                    </div>
                    <div class="step-pill"><span>۳</span>
                        <div><b>انتشار</b><small>وضعیت </small></div>
                    </div>
                </div>
            </section>

            <form id="createGroupForm" action="{{route('admin.courier.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                    <div class="space-y-5 xl:col-span-12">
                        <section class="form-section glass-card animate-fade-up stagger-1 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number">۰۱</div>
                                <div><h3>ساختار پیک</h3>
                                    <p>عنوان،قیمت،وضعیت،توضیحات</p></div>
                                <span class="mr-auto chip bg-brand-500/10 text-brand-300">اصلی</span>
                            </div>
                            <div class="grid  p-5 gap-2  sm:p-7 sm:grid-cols-2">
                                <label class="field-group">
                                    <span class="field-label">نام پیک <span
                                            class="text-rose">*</span></span>
                                    <span class="field-shell">
                                        <svg viewBox="0 0 24 24"><path d="M3 6h7l2 2h9v11H3z"></path></svg>
                                        <input id="groupName" value="{{old('name')}}" name="name" type="text"
                                               required="" maxlength="255"
                                               placeholder="پیشتاز">
                                    </span>
                                    <span id="nameError" class="mt-2 hidden text-[11px] text-rose">
                                        نام پیک را وارد کنید.
                                    </span>
                                </label>

                                  <label class="field-group">
                                    <span class="field-label">  مبلغ پیک ریال <span
                                            class="text-rose">*</span></span>
                                    <span class="field-shell">
                                        <svg viewBox="0 0 24 24"><path d="M3 6h7l2 2h9v11H3z"></path></svg>
                                        <input id="groupName" value="{{old('price')}}" name="price" type="text"
                                               required="" maxlength="255"
                                               placeholder="1000000">
                                    </span>
                                    <span id="nameError" class="mt-2 hidden text-[11px] text-rose">
                                       قیمت پیک را به ریال وارد کنید
                                    </span>
                                </label>

                                             </label>

                                  <label class="field-group">
                                    <span class="field-label"> زمان تحویل سفارش توسط پیک <span
                                            class="text-rose">*</span></span>
                                    <span class="field-shell">
                                        <svg viewBox="0 0 24 24"><path d="M3 6h7l2 2h9v11H3z"></path></svg>
                                        <input id="groupName" value="{{old('delivery_business_days')}}" name="delivery_business_days" type="text"
                                               required="" maxlength="255"
                                               placeholder="3 روز">
                                    </span>
                                    <span id="nameError" class="mt-2 hidden text-[11px] text-rose">
                                           مدت زمان تحویل سفارش 
                                    </span>
                                </label>
                                
                              

                            </div>


                        </section>

                        <section class="form-section glass-card animate-fade-up stagger-2 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number aqua">۰۲</div>
                                <div><h3>محتوا </h3>
                                    <p>توضیح کوتاه پیک</p></div>
                                <span class="mr-auto chip bg-aqua-500/10 text-aqua-300">نمایش فروشگاه</span>
                            </div>
                            <div class="space-y-5 p-5 sm:p-7">
                                <label class="field-group">
                                    <span class="field-label">توضیحات پیک</span>
                                    <span
                                        class="field-shell items-start">
                                        <svg class="mt-3" viewBox="0 0 24 24">
                                            <path
                                                d="M4 5h16M4 10h16M4 15h10M4 19h7">

                                            </path>
                                        </svg>
                                        <textarea id="description" name="description" rows="5" maxlength="1000"
                                                  placeholder="توضیحی کوتاه درباره این پیک بنویسید...">{{old('description')}}</textarea>
                                    </span>
                                    <span
                                        class="mt-2 flex justify-between text-[10px] text-slate-600">
                                        <span>این متن در صفحه پیک نمایش داده می‌شود.</span>
                                        <span id="descriptionCount">۰ / ۱۰۰۰</span>
                                    </span>
                                </label>
                      
                            </div>
                        </section>

                        <section class="form-section glass-card animate-fade-up stagger-3 overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number amber">۰۳</div>
                                <div><h3>تنظیمات انتشار</h3>
                                    <p>وضعیت نمایش و اولویت پیک</p></div>
                                <span class="mr-auto chip bg-amberx/10 text-amberx">کنترل نمایش</span></div>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <div class="field-group">
                                    <span class="field-label">وضعیت پیک</span>
                                    <label
                                        class="account-status">
                                        <span
                                            class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                                </path>
                                            </svg>
                                        </span>
                                        <span
                                            class="flex-1">
                                            <b>پیک فعال باشد</b>
                                            <small>در فروشگاه قابل مشاهده خواهد بود</small>
                                        </span>
                                        <span class="relative">
                                            <input id="activeInput" @if(old('is_active')=='1') checked="checked"
                                                   @endif name="is_active" type="checkbox" value="1" checked="checked"
                                                   class="peer sr-only"><span
                                                class="block h-6 w-11 rounded-full bg-ink-600 transition-colors peer-checked:bg-brand-500"></span>
                                            <span
                                                class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white shadow transition-transform peer-checked:-translate-x-3"></span>
                                        </span>
                                    </label>
                                </div>
                                

                            </div>
                        </section>

                        <div
                            class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex gap-3">

                                <button type="submit"
                                        class="group flex flex-1 items-center justify-center gap-2 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow transition-all hover:shadow-glow-lg hover:brightness-110 active:scale-95 sm:flex-none">
                                    ثبت پیک
                                    <svg class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none"
                                         viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </form>
        </div>
    </main>

@endsection


