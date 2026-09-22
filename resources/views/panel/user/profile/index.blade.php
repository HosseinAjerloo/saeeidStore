@extends('panel.Layout.master')

@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('panel.index') }}">خانه</a>
            <span class="separator">/</span>
            <span class="active">پروفایل من</span>
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
                            <div class="mt-2">
                                <span class="badge bg-warning-subtle text-warning"><i class="bi bi-star-fill"></i> عضو
                                    طلایی</span>
                            </div>
                                         @include('panel.user.profile.sidebar')
                        </div>
                    </div>
                </div>
                        <!-- سایدبار پروفایل -->
           

                        <!-- محتوای اصلی -->
                        <div class="col-lg-9">
                            <!-- خوش‌آمد -->
                            <div class="content-box bg-gradient-primary text-white"
                                style="background:linear-gradient(135deg,#6C5CE7,#00CEC9)!important;">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div>
                                        <h4 class="text-white mb-1">سلام {{ $user->fullName }}! 👋</h4>
                                        <p class="mb-0 text-white-50">از اینجا می‌توانید سفارش‌ها و فعالیت‌های خود را مدیریت
                                            کنید
                                        </p>
                                    </div>
                                    <a href="search.html" class="btn btn-light"><i class="bi bi-bag"></i> خرید جدید</a>
                                </div>
                            </div>

                            <!-- آمار -->
                            <div class="row g-3 mb-3">
                                <div class="col-6 col-lg-3">
                                    <div class="content-box text-center mb-0">
                                        <i class="bi bi-bag-check text-primary-custom" style="font-size:32px;"></i>
                                        <h3 class="fw-bold mt-2 mb-0">۱۲</h3>
                                        <small class="text-muted-custom">سفارش‌ها</small>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="content-box text-center mb-0">
                                        <i class="bi bi-heart-fill text-cta" style="font-size:32px;"></i>
                                        <h3 class="fw-bold mt-2 mb-0">۸</h3>
                                        <small class="text-muted-custom">علاقه‌مندی‌ها</small>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="content-box text-center mb-0">
                                        <i class="bi bi-eye text-accent" style="font-size:32px;"></i>
                                        <h3 class="fw-bold mt-2 mb-0">۲۴</h3>
                                        <small class="text-muted-custom">بازدیدهای اخیر</small>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="content-box text-center mb-0">
                                        <i class="bi bi-wallet2 text-success" style="font-size:32px;"></i>
                                        <h3 class="fw-bold mt-2 mb-0">0ت</h3>
                                        <small class="text-muted-custom">کیف پول (ت)</small>
                                    </div>
                                </div>
                            </div>

                            <!-- سفارش‌های اخیر -->
                            <div class="content-box">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="border-0 pb-0 mb-0"><i class="bi bi-clock-history text-primary-custom"></i>
                                        سفارش‌های
                                        اخیر</h5>
                                    <a href="profile-orders.html" class="small text-primary-custom">مشاهده همه</a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead class="bg-soft">
                                            <tr>
                                                <th>شماره سفارش</th>
                                                <th>تاریخ</th>
                                                <th>مبلغ</th>
                                                <th>وضعیت</th>
                                                <th>عمل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>ZM-۱۴۰۳-۱۲۳۴</strong></td>
                                                <td>۱۴۰۳/۰۴/۱۸</td>
                                                <td>۱۲,۹۳۲,۰۰۰ ت</td>
                                                <td><span class="badge bg-primary-subtle text-primary-custom">در حال
                                                        پردازش</span>
                                                </td>
                                                <td><a href="profile-order-detail.html"
                                                        class="btn btn-sm btn-outline-primary-custom">جزئیات</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>ZM-۱۴۰۳-۱۱۸۹</strong></td>
                                                <td>۱۴۰۳/۰۳/۲۵</td>
                                                <td>۳,۴۵۰,۰۰۰ ت</td>
                                                <td><span class="badge bg-success-subtle text-success">تحویل شده</span></td>
                                                <td><a href="profile-order-detail.html"
                                                        class="btn btn-sm btn-outline-primary-custom">جزئیات</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>ZM-۱۴۰۳-۱۰۶۷</strong></td>
                                                <td>۱۴۰۳/۰۳/۱۰</td>
                                                <td>۷,۸۵۰,۰۰۰ ت</td>
                                                <td><span class="badge bg-success-subtle text-success">تحویل شده</span></td>
                                                <td><a href="profile-order-detail.html"
                                                        class="btn btn-sm btn-outline-primary-custom">جزئیات</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- پیشنهادهای ویژه -->
                            <div class="content-box">
                                <h5><i class="bi bi-stars text-primary-custom"></i> پیشنهادهای ویژه برای شما</h5>
                                <div class="row g-3">
                                    <div class="col-md-4 col-6">
                                        <div class="product-card">
                                            <span class="product-badge discount">۲۰٪</span>
                                            <div class="product-img"><i class="bi bi-clock text-primary-custom"
                                                    style="font-size:60px;"></i></div>
                                            <div class="product-info">
                                                <div class="product-brand">کاسیو</div>
                                                <h6 class="product-title"><a href="product.html">ساعت کاسیو G-Shock
                                                        GA-2000</a>
                                                </h6>
                                                <div class="product-price-row">
                                                    <div class="product-price">۲,۴۰۰,۰۰۰ <small>ت</small></div>
                                                    <button class="btn-add-to-cart" onclick="addToCart(14,'کاسیو')"><i
                                                            class="bi bi-bag-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="product-card">
                                            <div class="product-img"><i class="bi bi-smartwatch text-primary-custom"
                                                    style="font-size:60px;"></i></div>
                                            <div class="product-info">
                                                <div class="product-brand">هواوی</div>
                                                <h6 class="product-title"><a href="product.html">ساعت هواوی واچ GT 4</a>
                                                </h6>
                                                <div class="product-price-row">
                                                    <div class="product-price">۶,۵۰۰,۰۰۰ <small>ت</small></div>
                                                    <button class="btn-add-to-cart" onclick="addToCart(12,'هواوی')"><i
                                                            class="bi bi-bag-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="product-card">
                                            <span class="product-badge discount">۱۵٪</span>
                                            <div class="product-img"><i class="bi bi-gem text-primary-custom"
                                                    style="font-size:60px;"></i></div>
                                            <div class="product-info">
                                                <div class="product-brand">فسیل</div>
                                                <h6 class="product-title"><a href="product.html">ساعت فسیل Gen 6.E
                                                        زنانه</a></h6>
                                                <div class="product-price-row">
                                                    <div>
                                                        <div class="product-old-price">۵,۹۰۰,۰۰۰</div>
                                                        <div class="product-price">۵,۰۱۵,۰۰۰ <small>ت</small></div>
                                                    </div>
                                                    <button class="btn-add-to-cart" onclick="addToCart(6,'فسیل')"><i
                                                            class="bi bi-bag-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection
