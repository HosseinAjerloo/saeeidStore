@extends('panel.Layout.master')

@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{route('panel.index')}}">خانه</a>
            <span class="separator">/</span>
            <span class="active">سبد خرید</span>
        </nav>
    </div>
    <div class="container">
        <h3 class="fw-bold mb-4"><i class="bi bi-bag-check text-primary-custom"></i> سبد خرید شما</h3>

        <div class="row g-4">
            <!-- لیست محصولات -->
            <div class="col-lg-8">
                <!-- آیتم 1 -->
                <div class="cart-item">
                    <div class="cart-item-img">
                        <img src="../images/products/watch-mens-gshock-black.jpg" alt="ساعت کاسیو G-Shock">
                    </div>
                    <div class="cart-item-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>ساعت مچی کاسیو مدل G-Shock GA-1000 مردانه</h6>
                                <div class="brand">برند: کاسیو | رنگ: مشکی</div>
                                <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle"></i> موجود</span>
                            </div>
                            <button class="btn btn-sm btn-link text-danger" onclick="removeCartItem(this)"><i class="bi bi-trash"></i></button>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-3">
                            <div class="cart-quantity">
                                <button onclick="changeQuantity(this.nextElementSibling, 1)"><i class="bi bi-plus"></i></button>
                                <input type="text" value="1" readonly="">
                                <button onclick="changeQuantity(this.previousElementSibling, -1)"><i class="bi bi-dash"></i></button>
                            </div>
                            <div class="text-end">
                                <div class="text-muted-custom text-decoration-line-through small">۲,۸۰۰,۰۰۰</div>
                                <div class="price fw-bold text-primary-custom" data-price="2100000"><span class="item-price" data-price="2100000">۲,۱۰۰,۰۰۰</span> تومان</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- آیتم 2 -->
                <div class="cart-item">
                    <div class="cart-item-img">
                        <img src="../images/products/watch-smartwatch-series.jpg" alt="اپل واچ سری ۹">
                    </div>
                    <div class="cart-item-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>ساعت هوشمند اپل واچ سری ۹ - ۴۵ میلی‌متری</h6>
                                <div class="brand">برند: اپل | رنگ: خاکستری</div>
                                <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle"></i> موجود</span>
                            </div>
                            <button class="btn btn-sm btn-link text-danger" onclick="removeCartItem(this)"><i class="bi bi-trash"></i></button>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-3">
                            <div class="cart-quantity">
                                <button onclick="changeQuantity(this.nextElementSibling, 1)"><i class="bi bi-plus"></i></button>
                                <input type="text" value="1" readonly="">
                                <button onclick="changeQuantity(this.previousElementSibling, -1)"><i class="bi bi-dash"></i></button>
                            </div>
                            <div class="text-end">
                                <div class="text-muted-custom text-decoration-line-through small">۱۸,۰۰۰,۰۰۰</div>
                                <div class="price fw-bold text-primary-custom" data-price="10800000"><span class="item-price" data-price="10800000">۱۰,۸۰۰,۰۰۰</span> تومان</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- کد تخفیف -->
                <div class="content-box mt-3">
                    <h6 class="fw-bold mb-3"><i class="bi bi-ticket-perforated text-primary-custom"></i> کد تخفیف</h6>
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="کد تخفیف خود را وارد کنید">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom w-100" onclick="showToast('کد تخفیف اعمال شد','success')">اعمال کد</button>
                        </div>
                    </div>
                </div>

                <!-- ادامه خرید -->
                <div class="mt-3">
                    <a href="../index.html" class="text-primary-custom"><i class="bi bi-arrow-right"></i> ادامه خرید</a>
                </div>
            </div>

            <!-- خلاصه سفارش -->
            <div class="col-lg-4">
                <div class="content-box sticky-top" style="top:90px;">
                    <h5 class="fw-bold mb-3"><i class="bi bi-receipt text-primary-custom"></i> خلاصه سفارش</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">تعداد محصولات:</span>
                        <span class="fw-bold" id="cart-items-count">۲</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">جمع کل:</span>
                        <span class="fw-bold">۱۲,۹۰۰,۰۰۰ ت</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">تخفیف:</span>
                        <span class="text-success fw-bold">۷,۹۰۰,۰۰۰ ت</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">هزینه ارسال:</span>
                        <span class="text-success fw-bold">رایگان</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">مبلغ قابل پرداخت:</span>
                        <span class="fw-bold text-primary-custom fs-5" id="cart-total">۱۲,۹۰۰,۰۰۰ تومان</span>
                    </div>

                    <!-- تخفیف سبد -->
                    <div class="bg-success-subtle text-success rounded p-2 mb-3 small text-center">
                        <i class="bi bi-tags"></i> ۳۸٪ تخفیف برای این سفارش!
                    </div>

                    <a href="checkout-shipping.html" class="btn btn-cta w-100 btn-lg mb-2">
                        ادامه فرآیند خرید <i class="bi bi-arrow-left"></i>
                    </a>

                    <div class="small text-muted-custom text-center mt-2">
                        <i class="bi bi-shield-check text-success"></i> پرداخت امن و رمزنگاری شده
                    </div>

                    <hr>

                    <div class="small">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-truck text-success"></i>
                            <span>ارسال رایگان برای این سفارش</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-arrow-repeat text-success"></i>
                            <span>۷ روز ضمانت بازگشت</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-success"></i>
                            <span>ضمانت اصالت کالا</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
