@extends('panel.Layout.master')
@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{route('panel.index')}}">خانه</a>
            @foreach($parentChainGroups as $group)
                <span class="separator">/</span>
                <a href="search.html">{{$group}}</a>
            @endforeach
            <span class="separator">/</span>
            <span class="active">{{$product->name}}</span>
        </nav>
    </div>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center  g-4">
                <!-- گالری -->
                <div class="col-lg-5">
                    <div class="product-gallery">
                        <div class="product-gallery-main">
                            <img id="main-product-image" src="{{asset($product->image)}}" alt="{{$product->name??''}}"
                                 style="transition:opacity .3s;"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 300 300%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22300%22 height=%22300%22/%3E%3Ctext x=%22150%22 y=%22170%22 font-size=%22100%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                        </div>
                        <div class="product-gallery-thumbs">
                            <div class="thumb active"
                                 onclick="changeMainImage('../images/products/watch-mens-gshock-black.jpg', this)">
                                <img src="../images/products/watch-mens-gshock-black.jpg" alt=""
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23e9ecef%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%22 y=%2260%22 font-size=%2240%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                            </div>
                            <div class="thumb"
                                 onclick="changeMainImage('../images/products/watch-mens-seiko-silver.jpg', this)">
                                <img src="../images/products/watch-mens-seiko-silver.jpg" alt=""
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23e9ecef%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%22 y=%2260%22 font-size=%2240%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                            </div>
                            <div class="thumb"
                                 onclick="changeMainImage('../images/products/watch-mens-gshock-side.jpg', this)">
                                <img src="../images/products/watch-mens-gshock-side.jpg" alt=""
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23e9ecef%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%22 y=%2260%22 font-size=%2240%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                            </div>
                            <div class="thumb"
                                 onclick="changeMainImage('../images/products/watch-womens-rose-gold.jpg', this)">
                                <img src="../images/products/watch-womens-rose-gold.jpg" alt=""
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23e9ecef%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%22 y=%2260%22 font-size=%2240%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                            </div>
                        </div>
                    </div>

                    <!-- ویژگی‌های کلیدی -->
                    @if($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'normal'))->exists())

                        <div class="content-box mt-3">
                            <h5><i class="bi bi-stars text-primary-custom"></i> ویژگی‌های کلیدی</h5>

                            <div class="d-flex flex-wrap gap-2">
                                @foreach($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'normal')) ->get() as $variantAttributes)
                                    <span class="feature-pill">
                                    <i class="bi bi-shield"></i>
                                 {{ $variantAttributes?->attribute->name ?? '' }}:
                                     {{ $variantAttributes?->attributeValue->value ?? '' }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <!-- اطلاعات محصول -->
                <div class="col-lg-4">
                    <div class="content-box">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-soft text-primary-custom">{{$product->brand->name??''}}</span>
                            <span
                                class="badge bg-success-subtle  {{$productVariant->stock>0?'text-success':'text-danger'}}">{{$productVariant->stock>0?'موجود':'ناموجود'}}</span>

                        </div>
                        <h1 class="fs-4 fw-bold mb-2">{{$product->name??''}}</h1>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="text-warning">★★★★★</span>
                            <a href="#comments" class="small text-primary-custom">(۴۲ نظر)</a>
                            <span class="text-muted-custom small">|</span>
                            <a href="review.html" class="small text-primary-custom"><i class="bi bi-pencil"></i> ثبت نظر</a>
                            <span class="text-muted-custom small">|</span>
                            <span class="small text-muted-custom"><i class="bi bi-eye"></i> ۱,۲۳۴ بازدید</span>
                        </div>

                        <hr>

                        @if($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'color'))->exists())
                            <div class="mb-3">
                                <label class="fw-bold small mb-2">رنگ:</label>
                                <div class="d-flex gap-2">
                                    @foreach($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'color')) ->get() as $key=> $variantAttributes)
                                        <span class="color-swatch @if($key==0) selected  @endif"
                                              style="background: {{ $variantAttributes?->attributeValue->value ?? '' }};"
                                              onclick="selectColor(this)"></span>

                                    @endforeach


                                </div>
                            </div>
                        @endif

                    <!-- گارانتی -->
                        <div class="mb-3 row">
                            @foreach($productVariant->variantAttributes()
                                ->with('attribute')
                                ->whereHas('attribute', fn($query) => $query->where('type', 'normal'))
                                ->limit(3)
                                ->get() as $variantAttributes)

                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                    <label class="fw-bold small mb-2">
                                        {{ $variantAttributes?->attribute->name ?? '' }}:
                                    </label>

                                    <div class="d-flex flex-wrap">
                                        <span class="feature-pill">
                                            <i class="bi bi-shield-check"></i>
                                            {{ $variantAttributes?->attributeValue->value ?? '' }}
                                        </span>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                        <hr>

                        @if($product->inValidDiscount())
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <div class="text-muted-custom text-decoration-line-through small">
                                        {{numberFormatAble(($productVariant->price /10))??0}} تومان
                                    </div>
                                    <div
                                        class="fs-3 fw-bold text-primary-custom">{{numberFormatAble(($productVariant->countable()/10))??0}}
                                        <small
                                            class="fs-6">تومان</small></div>
                                </div>
                                <span class="product-discount-badge fs-6">
                                         @if($product->inValidDiscount()->type=='percentage')
                                        {{numberFormatAble($product->inValidDiscount()->value??0)}}%
                                    @else
                                        {{numberFormatAble(($product->inValidDiscount()->value /10)??0)}} ت
                                    @endif
                                    تخفیف
                                </span>
                            </div>
                        @else
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>

                                    <div class="fs-3 fw-bold text-primary-custom">
                                        {{numberFormatAble(($productVariant->price /10))??0}}
                                        <small class="fs-6">تومان</small>
                                    </div>
                                </div>
                            </div>
                    @endif


                    <!-- دکمه‌ها -->
                        <div class="d-grid gap-2">
                            @if($productVariant->stock>0)
                                <button class="btn btn-cta btn-lg" onclick="addToCart(1, 'ساعت کاسیو G-Shock')">
                                    <i class="bi bi-bag-plus"></i> افزودن به سبد خرید
                                </button>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-primary-custom flex-fill"
                                            onclick="toggleFavorite(this)">
                                        <i class="bi bi-heart"></i> علاقه‌مندی
                                    </button>

                                </div>
                            @endif
                        </div>

                        <hr>


                    </div>
                </div>
            </div>

            <!-- تب‌بندی موبایل و دسکتاپ -->
            <div class="row mt-4">
                <div class="col-12">
                    <!-- تب‌های موبایل -->

                    <div class="mobile-tabs mb-3">
                        <button class="nav-link active" onclick="showMobileTab('tab-desc', this)">توضیحات</button>
                        <button class="nav-link" onclick="showMobileTab('tab-specs', this)">مشخصات</button>
                        <button class="nav-link" onclick="showMobileTab('tab-comments', this)">نظرات</button>
                        <button class="nav-link" onclick="showMobileTab('tab-questions', this)">پرسش‌ها</button>
                    </div>

                    <!-- تب‌های دسکتاپ -->
                    <ul class="nav custom-tabs desktop-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-desc" type="button"
                                    aria-selected="false" role="tab" tabindex="-1">توضیحات محصول
                            </button>
                        </li>
                        @if($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'normal'))->exists())

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-specs" type="button"
                                        aria-selected="false" tabindex="-1" role="tab">مشخصات فنی
                                </button>
                            </li>
                        @endif
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-comments" type="button"
                                    aria-selected="false" tabindex="-1" role="tab">نظرات کاربران (۴۲)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-questions"
                                    type="button" aria-selected="true" role="tab">پرسش و پاسخ
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- توضیحات -->
                        <div class="tab-pane fade mobile-tab-content" id="tab-desc" role="tabpanel">
                            <div class="content-box">
                                <h5>توضیحات محصول</h5>
                                <p>
                                    {{$product->description??''}}
                                </p>


                            </div>
                        </div>

                        @if($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'normal'))->exists())

                            <div class="tab-pane fade mobile-tab-content" id="tab-specs" role="tabpanel">
                                <div class="content-box product-specs-box">
                                    <div class="section-head-row">
                                        <h5 class="mb-0 border-0 pb-0">مشخصات فنی</h5>
                                        <span class="badge bg-soft text-primary-custom">۱۴ ویژگی</span>
                                    </div>
                                    <p class="text-muted-custom small mb-3">
                                        برای مقایسه بهتر، مشخصات نمایش داده شده است.
                                    </p>


                                    <div class="spec-group">
                                        <h6><i class="bi bi-info-circle text-primary-custom"></i> اطلاعات کلی</h6>
                                        @foreach($productVariant->variantAttributes()->with('attribute')->whereHas('attribute', fn($query) => $query->where('type', 'normal'))->get() as $variantAttribute)
                                            <div class="spec-list mt-2">
                                                <div class="spec-row">
                                                    <span>{{$variantAttribute->attribute->name??''}}</span>
                                                    <strong>{{$variantAttribute->attributeValue->value??''}}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </div>

                    @endif

                    <!-- نظرات -->
                        <div class="tab-pane fade mobile-tab-content" id="tab-comments" role="tabpanel">
                            <div class="content-box">
                                <div class="section-head-row">
                                    <h5 class="mb-0 border-0 pb-0">نظرات کاربران</h5>
                                    <span class="badge bg-soft text-primary-custom">۴۲ نظر ثبت شده</span>
                                </div>

                                <div class="row g-3 mb-4 p-3 bg-soft rounded">
                                    <div class="col-md-3 text-center">
                                        <div class="display-5 fw-bold text-primary-custom">۴.۸</div>
                                        <div class="text-warning mb-1">★★★★★</div>
                                        <small class="text-muted-custom">میانگین رضایت کاربران</small>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <small class="text-muted-custom" style="width:30px;">۵</small>
                                            <span class="text-warning">★</span>
                                            <div class="progress flex-fill" style="height:8px;">
                                                <div class="progress-bar bg-success" style="width:85%"></div>
                                            </div>
                                            <small class="text-muted-custom" style="width:30px;">۳۶</small>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <small class="text-muted-custom" style="width:30px;">۴</small>
                                            <span class="text-warning">★</span>
                                            <div class="progress flex-fill" style="height:8px;">
                                                <div class="progress-bar bg-primary" style="width:10%"></div>
                                            </div>
                                            <small class="text-muted-custom" style="width:30px;">۴</small>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <small class="text-muted-custom" style="width:30px;">۳</small>
                                            <span class="text-warning">★</span>
                                            <div class="progress flex-fill" style="height:8px;">
                                                <div class="progress-bar bg-warning" style="width:3%"></div>
                                            </div>
                                            <small class="text-muted-custom" style="width:30px;">۲</small>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <small class="text-muted-custom" style="width:30px;">۱-۲</small>
                                            <span class="text-warning">★</span>
                                            <div class="progress flex-fill" style="height:8px;">
                                                <div class="progress-bar bg-danger" style="width:2%"></div>
                                            </div>
                                            <small class="text-muted-custom" style="width:30px;">۰</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="interaction-grid">
                                    <div class="interaction-form-box">
                                        <h6><i class="bi bi-pencil-square text-primary-custom"></i> ثبت نظر جدید</h6>
                                        <form
                                            onsubmit="event.preventDefault();showToast('نظر شما با موفقیت ثبت شد','success');this.reset();">
                                            <div class="mb-2">
                                                <label class="form-label">امتیاز شما</label>
                                                <div class="star-rating d-inline-flex">
                                                    <input type="radio" id="product-star-5" name="product-rating"
                                                           value="5"><label for="product-star-5">★</label>
                                                    <input type="radio" id="product-star-4" name="product-rating"
                                                           value="4"><label for="product-star-4">★</label>
                                                    <input type="radio" id="product-star-3" name="product-rating"
                                                           value="3"><label for="product-star-3">★</label>
                                                    <input type="radio" id="product-star-2" name="product-rating"
                                                           value="2"><label for="product-star-2">★</label>
                                                    <input type="radio" id="product-star-1" name="product-rating"
                                                           value="1"><label for="product-star-1">★</label>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">عنوان نظر</label>
                                                <input type="text" class="form-control"
                                                       placeholder="مثلاً کیفیت ساخت عالی" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">متن نظر</label>
                                                <textarea class="form-control" rows="4"
                                                          placeholder="تجربه خرید و استفاده خود را بنویسید..."
                                                          required=""></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary-custom w-100"><i
                                                    class="bi bi-send"></i> ثبت نظر
                                            </button>
                                        </form>
                                    </div>

                                    <div class="interaction-list-box">
                                        <div class="comment-card">
                                            <div class="comment-header">
                                                <div class="comment-avatar">ع</div>
                                                <div class="comment-meta">
                                                    <h6>علی محمدی</h6>
                                                    <div class="date">۱۴۰۳/۰۴/۱۵</div>
                                                </div>
                                                <div class="comment-rating">★★★★★</div>
                                            </div>
                                            <p>کیفیت ساخت فوق‌العاده‌ای داره. واقعاً ضدضربه و ضدآبه. حدود ۳ ماهه استفاده
                                                می‌کنم و هیچ مشکلی نداشته. قطب‌نما هم خیلی دقیق کار می‌کنه. حتماً
                                                پیشنهاد می‌کنم.</p>
                                            <div class="d-flex gap-2 mt-2">
                                                <span class="badge bg-success-subtle text-success">خرید تایید شده</span>
                                                <button class="btn btn-sm btn-outline-secondary"><i
                                                        class="bi bi-hand-thumbs-up"></i> مفید (۱۲)
                                                </button>
                                            </div>
                                        </div>

                                        <div class="comment-card">
                                            <div class="comment-header">
                                                <div class="comment-avatar">م</div>
                                                <div class="comment-meta">
                                                    <h6>مریم رضایی</h6>
                                                    <div class="date">۱۴۰۳/۰۴/۱۰</div>
                                                </div>
                                                <div class="comment-rating">★★★★★</div>
                                            </div>
                                            <p>ساعت خیلی خوبیه ولی بندش کمی سنگینه. برای استایل روزمره عالیه. ارسال هم
                                                سریع بود. ممنون از فروشگاه زمانک.</p>
                                            <div class="d-flex gap-2 mt-2">
                                                <span class="badge bg-success-subtle text-success">خرید تایید شده</span>
                                                <button class="btn btn-sm btn-outline-secondary"><i
                                                        class="bi bi-hand-thumbs-up"></i> مفید (۸)
                                                </button>
                                            </div>
                                        </div>

                                        <div class="comment-card">
                                            <div class="comment-header">
                                                <div class="comment-avatar">ح</div>
                                                <div class="comment-meta">
                                                    <h6>حسین کریمی</h6>
                                                    <div class="date">۱۴۰۳/۰۴/۰۵</div>
                                                </div>
                                                <div class="comment-rating">★★★★☆</div>
                                            </div>
                                            <p>طراحی زیبایی داره و کیفیتش خوبه. فقط نورپردازی LED می‌تستنگتر باشه. در کل
                                                راضی‌ام.</p>
                                            <div class="d-flex gap-2 mt-2">
                                                <button class="btn btn-sm btn-outline-secondary"><i
                                                        class="bi bi-hand-thumbs-up"></i> مفید (۳)
                                                </button>
                                            </div>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button class="btn btn-outline-primary-custom">نمایش نظرات بیشتر</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- پرسش و پاسخ -->
                        <div class="tab-pane fade mobile-tab-content active show" id="tab-questions" role="tabpanel">
                            <div class="content-box">
                                <div class="section-head-row">
                                    <h5 class="mb-0 border-0 pb-0">پرسش و پاسخ</h5>
                                    <span class="badge bg-soft text-primary-custom">۳ پرسش پاسخ داده شده</span>
                                </div>

                                <div class="interaction-grid">
                                    <div class="interaction-form-box">
                                        <h6><i class="bi bi-question-circle text-primary-custom"></i> ثبت پرسش جدید</h6>
                                        <form
                                            onsubmit="event.preventDefault();showToast('پرسش شما ثبت شد و پس از بررسی نمایش داده می‌شود','success');this.reset();">
                                            <div class="mb-2">
                                                <label class="form-label">عنوان پرسش</label>
                                                <input type="text" class="form-control"
                                                       placeholder="مثلاً درباره گارانتی یا ارسال سوال بپرسید"
                                                       required="">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">متن پرسش</label>
                                                <textarea class="form-control" rows="4"
                                                          placeholder="پرسش خود را کامل بنویسید..."
                                                          required=""></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">شماره تماس (اختیاری)</label>
                                                <input type="tel" class="form-control" placeholder="۰۹۱۲۳۴۵۶۷۸۹">
                                            </div>
                                            <button type="submit" class="btn btn-primary-custom w-100"><i
                                                    class="bi bi-send"></i> ثبت پرسش
                                            </button>
                                        </form>
                                    </div>

                                    <div class="interaction-list-box">
                                        <div class="qa-item">
                                            <div class="qa-question">
                                                <i class="bi bi-question-circle-fill text-primary-custom fs-5"></i>
                                                <div>
                                                    <h6 class="mb-1">آیا این ساعت برای شنا مناسب است؟</h6>
                                                    <small class="text-muted-custom">پرسش توسط: سارا احمدی -
                                                        ۱۴۰۳/۰۴/۱۲</small>
                                                </div>
                                            </div>
                                            <div class="qa-answer">
                                                <i class="bi bi-patch-check-fill text-success fs-5"></i>
                                                <div>
                                                    <p class="mb-1">بله، این ساعت تا عمق ۲۰۰ متر مقاوم در برابر آب است و
                                                        برای شنا و غواصی مناسب است.</p>
                                                    <small class="text-muted-custom">پاسخ فروشنده - ۱۴۰۳/۰۴/۱۳</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="qa-item">
                                            <div class="qa-question">
                                                <i class="bi bi-question-circle-fill text-primary-custom fs-5"></i>
                                                <div>
                                                    <h6 class="mb-1">باطری ساعت چقدر دوام دارد؟</h6>
                                                    <small class="text-muted-custom">پرسش توسط: محمدی -
                                                        ۱۴۰۳/۰۴/۱۰</small>
                                                </div>
                                            </div>
                                            <div class="qa-answer">
                                                <i class="bi bi-patch-check-fill text-success fs-5"></i>
                                                <div>
                                                    <p class="mb-1">عمر باطری این مدل حداقل ۲ سال است. بسته به میزان
                                                        استفاده از آلارم و نورپردازی ممکن است متفاوت باشد.</p>
                                                    <small class="text-muted-custom">پاسخ فروشنده - ۱۴۰۳/۰۴/۱۰</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="qa-item">
                                            <div class="qa-question">
                                                <i class="bi bi-question-circle-fill text-primary-custom fs-5"></i>
                                                <div>
                                                    <h6 class="mb-1">آیا گارانتی بین‌المللی دارد؟</h6>
                                                    <small class="text-muted-custom">پرسش توسط: رضا - ۱۴۰۳/۰۴/۰۸</small>
                                                </div>
                                            </div>
                                            <div class="qa-answer">
                                                <i class="bi bi-patch-check-fill text-success fs-5"></i>
                                                <div>
                                                    <p class="mb-1">گارانتی این محصول ۱۸ ماهه و توسط زمانک ارائه می‌شود.
                                                        خدمات گارانتی در تمام شعب زمانک قابل استفاده است.</p>
                                                    <small class="text-muted-custom">پاسخ فروشنده - ۱۴۰۳/۰۴/۰۹</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- محصولات مشابه -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="section-title">
                        <h3>محصولات مشابه</h3>
                        <a href="search.html" class="view-all">مشاهده همه <i class="bi bi-chevron-left"></i></a>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card">
                                <div class="product-actions">
                                    <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                    <button><i class="bi bi-arrow-left-right"></i></button>
                                </div>
                                <div class="product-img">
                                    <img src="../images/products/watch-mens-seiko-silver.jpg" alt=""
                                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">کاسیو</div>
                                    <h6 class="product-title"><a href="product.html">ساعت مچی کاسیو G-Shock GA-2000
                                            مردانه</a></h6>
                                    <div class="product-rating"><span class="stars">★★★★★</span> <span>(۳۵)</span></div>
                                    <div class="product-price-row">
                                        <div class="product-price">۲,۴۰۰,۰۰۰ <small>ت</small></div>
                                        <button class="btn-add-to-cart" onclick="addToCart(14, 'کاسیو GA-2000')"><i
                                                class="bi bi-bag-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card">
                                <div class="product-actions">
                                    <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                    <button><i class="bi bi-arrow-left-right"></i></button>
                                </div>
                                <div class="product-img">
                                    <img src="../images/products/watch-mens-orient-blue.jpg" alt=""
                                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">اورینت</div>
                                    <h6 class="product-title"><a href="product.html">ساعت مچی اورینت Mako II مردانه</a>
                                    </h6>
                                    <div class="product-rating"><span class="stars">★★★★★</span> <span>(۵۱)</span></div>
                                    <div class="product-price-row">
                                        <div class="product-price">۳,۳۶۰,۰۰۰ <small>ت</small></div>
                                        <button class="btn-add-to-cart" onclick="addToCart(5, 'اورینت Mako')"><i
                                                class="bi bi-bag-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card">
                                <div class="product-actions">
                                    <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                    <button><i class="bi bi-arrow-left-right"></i></button>
                                </div>
                                <div class="product-img">
                                    <img src="../images/products/watch-mens-tissot-silver.jpg" alt=""
                                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">تیسوت</div>
                                    <h6 class="product-title"><a href="product.html">ساعت مچی تیسوت PRX 40mm مردانه</a>
                                    </h6>
                                    <div class="product-rating"><span class="stars">★★★★★</span> <span>(۲۸)</span></div>
                                    <div class="product-price-row">
                                        <div class="product-price">۴,۶۷۵,۰۰۰ <small>ت</small></div>
                                        <button class="btn-add-to-cart" onclick="addToCart(3, 'تیسوت PRX')"><i
                                                class="bi bi-bag-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card">
                                <div class="product-actions">
                                    <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                    <button><i class="bi bi-arrow-left-right"></i></button>
                                </div>
                                <div class="product-img">
                                    <img src="../images/products/watch-womens-rose-gold.jpg" alt=""
                                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">سیتیزن</div>
                                    <h6 class="product-title"><a href="product.html">ساعت مچی سیتیزن Eco-Drive
                                            مردانه</a></h6>
                                    <div class="product-rating"><span class="stars">★★★★★</span> <span>(۴۳)</span></div>
                                    <div class="product-price-row">
                                        <div class="product-price">۴,۷۶۰,۰۰۰ <small>ت</small></div>
                                        <button class="btn-add-to-cart" onclick="addToCart(7, 'سیتیزن Eco-Drive')"><i
                                                class="bi bi-bag-plus"></i></button>
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

