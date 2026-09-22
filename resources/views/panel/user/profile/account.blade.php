@extends('panel.Layout.master')

@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="../index.html">خانه</a><span class="separator">/</span>
            <a href="profile.html">پروفایل</a><span class="separator">/</span>
            <span class="active">تنظیمات حساب</span>
        </nav>
    </div>

    <section class="pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="profile-sidebar">
                        <div class="profile-user-info">
                            <div class="profile-avatar">م</div>
                            <h6 class="mb-0">محمد محمدی</h6>
                            <small class="text-muted-custom">۰۹۱۲۳۴۵۶۷۸۹</small>
                        </div>
                            @include('panel.user.profile.sidebar')
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0"><i class="bi bi-gear text-primary-custom"></i> تنظیمات حساب</h4>
                    </div>

                    <div class="content-box">
                        <h5><i class="bi bi-person text-primary-custom"></i> اطلاعات شخصی</h5>
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="profile-avatar" style="width:80px;height:80px;font-size:32px;">م</div>
                            <div>
                                <button type="button" class="btn btn-outline-primary-custom btn-sm mb-1"><i
                                        class="bi bi-camera"></i> تغییر تصویر</button>
                                <div class="small text-muted-custom">فرمت JPG یا PNG، حداکثر ۲ مگابایت</div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">نام</label>
                                <input type="text" class="form-control" value="محمد">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">نام خانوادگی</label>
                                <input type="text" class="form-control" value="محمدی">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">شماره موبایل</label>
                                <input type="tel" class="form-control" value="۰۹۱۲۳۴۵۶۷۸۹" readonly="">
                                <small class="text-muted-custom">برای تغییر شماره از بخش امنیت اقدام کنید</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ایمیل</label>
                                <input type="email" class="form-control" value="mohammad@example.com"
                                    placeholder="example@email.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">تاریخ تولد</label>
                                <input type="text" class="form-control" value="۱۳۷۰/۰۵/۱۵" placeholder="۱۳۷۰/۰۱/۰۱">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">جنسیت</label>
                                <select class="form-select">
                                    <option selected="">مرد</option>
                                    <option>زن</option>
                                    <option>ترجیح می‌دهم نگویم</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">کد ملی</label>
                                <input type="text" class="form-control" value="۰۰۱۲۳۴۵۶۷۸" maxlength="10">
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <h5><i class="bi bi-sliders text-primary-custom"></i> ترجیحات حساب</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">زبان</label>
                                <select class="form-select">
                                    <option selected="">فارسی</option>
                                    <option>English</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">واحد پول</label>
                                <select class="form-select">
                                    <option selected="">تومان</option>
                                    <option>ریال</option>
                                </select>
                            </div>
                        </div>
                        <div class="setting-row mt-3">
                            <div>
                                <h6 class="mb-1">نمایش موجودی انبار</h6>
                                <small class="text-muted-custom">تعداد موجودی محصولات در صفحه جزئیات نمایش داده شود</small>
                            </div>
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" id="stockView" checked="">
                            </div>
                        </div>
                        <div class="setting-row">
                            <div>
                                <h6 class="mb-1">پیشنهاد محصولات مشابه</h6>
                                <small class="text-muted-custom">بر اساس بازدیدها و علاقه‌مندی‌های شما</small>
                            </div>
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" id="suggestProd" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="content-box border border-danger-subtle">
                        <h5 class="text-danger"><i class="bi bi-exclamation-triangle"></i> منطقه خطر</h5>
                        <div class="setting-row mb-0">
                            <div>
                                <h6 class="mb-1">حذف حساب کاربری</h6>
                                <small class="text-muted-custom">با حذف حساب، تمام اطلاعات و سفارش‌های شما پاک
                                    می‌شود</small>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm"
                                onclick="showToast('درخواست حذف حساب ثبت شد','error')">حذف حساب</button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-primary-custom">انصراف</button>
                        <button type="button" class="btn btn-primary-custom"
                            onclick="showToast('تنظیمات حساب ذخیره شد','success')"><i class="bi bi-check-circle"></i>
                            ذخیره تغییرات</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
