@extends('panel.Layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('global/css/swiper-bundle.min.css')}}">
@endsection
@section('content')

    <!-- === اسلایدر اصلی === -->
    <section class="py-4">
        <div class="container">
            <div id="mainCarousel" class="carousel slide main-slider" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slide-1">
                            <div class="row">
                                <div class="col-md-7">
                                    <span class="badge bg-light text-primary-custom mb-2 px-3 py-2">کالکشن جدید</span>
                                    <h2>ساعت‌های لوکس مردانه<br>با تخفیف ویژه تابستان</h2>
                                    <p>مجموعه‌ای از بهترین برندهای جهانی با ضمانت اصالت کالا</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="slide-img">
                                        <img src="{{asset('panelFolder/images/hero/hero-mens-luxury.jpg')}}"
                                             alt="ساعت مردانه لوکس">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-2">
                            <div class="row">
                                <div class="col-md-7">
                                    <span class="badge bg-light text-dark mb-2 px-3 py-2">ساعت هوشمند</span>
                                    <h2>تکنولوژی آینده<br>روی مچ شما</h2>
                                    <p>جدیدترین ساعت‌های هوشمند با امکانات پیشرفته</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="slide-img">
                                        <img src="{{asset('panelFolder/images/hero/hero-smartwatch.jpg')}}"
                                             alt="ساعت هوشمند">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <span class="badge bg-light text-cta mb-2 px-3 py-2">پیشنهاد ویژه</span>
                                    <h2>ساعت‌های زنانه<br>با طراحی منحصر به فرد</h2>
                                    <p>شیک‌ترین ساعت‌های زنانه برای استایل خاص شما</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="slide-img">
                                        <img src="{{asset('panelFolder/images/hero/hero-womens-elegant.jpg')}}"
                                             alt="ساعت زنانه"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- === بنرهای تبلیغاتی === -->
    <section class="pb-4">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-4">
                    <a href="pages/search.html" class="banner-box banner-1 d-block">
                        <i class="bi bi-magic-line banner-icon"></i>
                        <div style="position:relative;z-index:2;">
                            <h4>تخفیف اعضای ویژه</h4>
                            <p>تا ۳۰٪ تخفیف اضافی برای کاربران عضو</p>
                            <button class="btn">عضویت</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="pages/search.html" class="banner-box banner-2 d-block">
                        <i class="bi bi-truck banner-icon"></i>
                        <div style="position:relative;z-index:2;">
                            <h4>ارسال رایگان</h4>
                            <p>برای سفارش‌های بالای ۵۰۰ هزار تومان</p>
                            <button class="btn">مشاهده</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="pages/search.html" class="banner-box banner-3 d-block">
                        <i class="bi bi-shield-check banner-icon"></i>
                        <div style="position:relative;z-index:2;">
                            <h4>ضمانت اصالت</h4>
                            <p>تمام محصولات اورجینال و گارانتی‌دار</p>
                            <button class="btn">اطلاعات بیشتر</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- === شگفت‌انگیزها === -->
    @if($discount->exists())
    <section class="pb-4">
        <div class="container">
            <div class="row g-3">
                <!-- باکس شگفت‌انگیز -->
                <div class="col-lg-3 col-md-4">
                    <div class="amazing-box">
                        <i class="bi bi-lightning-charge amazing-icon"></i>
                        <h4>شگفت‌انگیزهای روز</h4>
                        <p>فرصت محدود!</p>
                        <div class="countdown-timer" id="amazing-timer" data-hours="{{$diffHours}}" data-minutes="0"
                             data-seconds="0">
                            <div class="timer-box"><span id="timer-hours">{{$diffHours}}</span><small
                                    class="d-block fs-6">ساعت</small></div>
                            <div class="timer-box"><span id="timer-minutes">00</span><small
                                    class="d-block fs-6">دقیقه</small></div>
                            <div class="timer-box"><span id="timer-seconds">00</span><small
                                    class="d-block fs-6">ثانیه</small></div>
                        </div>
                        <a href="pages/amazing.html" class="btn btn-light mt-3 btn-sm">مشاهده همه</a>
                    </div>
                </div>

                <!-- محصولات شگفت‌انگیز -->
                <div class="col-lg-9 col-md-8">
                    <div class="row g-3">
                        @foreach($productsDiscounts as $item)
                            <div class="col-lg-4 col-6">
                                <div class="product-card">
                                     <span class="product-badge discount">
                                    @if($item->product->inValidDiscount()->type=='percentage')
                                             {{numberFormatAble($item->product->inValidDiscount()->value??0)}} %
                                         @else
                                             {{numberFormatAble(($item->product->inValidDiscount()->value /10)??0)}} ت
                                         @endif
                                </span>
                                    <div class="product-actions">
                                        <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                        <button><i class="bi bi-arrow-left-right"></i></button>
                                    </div>
                                    <div class="product-img">
                                        <img src="{{asset($item->product->image)}}"
                                             alt="{{$item->product->name??''}}"
                                             onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-brand">{{$item->product?->brand->name??''}}</div>
                                        <h6 class="product-title"><a href="pages/product.html">
                                              {{$item->product->name??''}}
                                            </a>
                                        </h6>
                                        <div class="product-rating">
                                            <span class="stars">★★★★★</span>
                                            <span>(۴۲ نظر)</span>
                                        </div>
                                        <div class="product-old-price">{{numberFormatAble(($item->price /10))??0}}</div>
                                        <div class="product-price-row">
                                            <div class="product-price">{{numberFormatAble(($item->countable()/10))??0}}
                                                <small>ت</small></div>
                                            <button class="btn-add-to-cart"
                                                    onclick="addToCart({{$item->id}},{{$item->product?->name??''}})"><i
                                                    class="bi bi-bag-plus">

                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    @endif

    <!-- === دسته‌بندی محبوب === -->
    <section class="py-4">
        <div class="container">
            <div class="section-title">
                <h3>دسته‌بندی محبوب</h3>
                <a href="pages/search.html" class="view-all">مشاهده همه <i class="bi bi-chevron-left"></i></a>
            </div>
            <div class="row g-3">
                @foreach($categoriesAll as $category)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="pages/search.html" class="d-block text-center p-4 bg-white rounded-3 shadow-sm"
                           style="transition:all .3s;">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                 style="width:80px;height:80px;background:linear-gradient(135deg,#6C5CE7,#a29bfe);">
                                <img width="50px" src="{{asset($category->image)}}" alt="">
                            </div>
                            <h6 class="mb-0">{{$category->name}}</h6>
                            <small class="text-muted-custom">۱۲۰+ محصول</small>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

    <!-- === محصولات پرفروش === -->
    <section class="py-4">
        <div class="container">
            <div class="section-title">
                <h3>پرفروش‌ترین ساعت‌ها</h3>
                <a href="pages/search.html" class="view-all">مشاهده همه <i class="bi bi-chevron-left"></i></a>
            </div>
            <div class="row g-3">
                <!-- محصول 1 -->
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-card">
                        <span class="product-badge new">جدید</span>
                        <div class="product-actions">
                            <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                            <button><i class="bi bi-arrow-left-right"></i></button>
                        </div>
                        <div class="product-img">
                            <img src="{{asset('panelFolder/images/products/watch-mens-seiko-silver.jpg')}}" alt="ساعت"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                        </div>
                        <div class="product-info">
                            <div class="product-brand">سیکو</div>
                            <h6 class="product-title"><a href="pages/product.html">ساعت مچی سیکو مدل Presage Automatic
                                    مردانه</a></h6>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span>(۶۴ نظر)</span>
                            </div>
                            <div class="product-price-row">
                                <div>
                                    <div class="product-price">۷,۸۵۰,۰۰۰ <small>تومان</small></div>
                                </div>
                                <button class="btn-add-to-cart" onclick="addToCart(4, 'ساعت سیکو Presage')">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محصول 2 -->
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-card">
                        <span class="product-badge discount">۲۰٪</span>
                        <div class="product-actions">
                            <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                            <button><i class="bi bi-arrow-left-right"></i></button>
                        </div>
                        <div class="product-img">
                            <img src="{{asset('panelFolder/images/products/watch-mens-orient-blue.jpg')}}" alt="ساعت"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                        </div>
                        <div class="product-info">
                            <div class="product-brand">اورینت</div>
                            <h6 class="product-title"><a href="pages/product.html">ساعت مچی اورینت مدل Mako II Automatic
                                    مردانه</a></h6>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span>(۵۱ نظر)</span>
                            </div>
                            <div class="product-price-row">
                                <div>
                                    <div class="product-old-price">۴,۲۰۰,۰۰۰</div>
                                    <div class="product-price">۳,۳۶۰,۰۰۰ <small>تومان</small></div>
                                </div>
                                <button class="btn-add-to-cart" onclick="addToCart(5, 'ساعت اورینت Mako')">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محصول 3 -->
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-card">
                        <div class="product-actions">
                            <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                            <button><i class="bi bi-arrow-left-right"></i></button>
                        </div>
                        <div class="product-img">
                            <img src="{{asset('panelFolder/images/products/watch-mens-gshock-side.jpg')}}" alt="ساعت"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                        </div>
                        <div class="product-info">
                            <div class="product-brand">فسیل</div>
                            <h6 class="product-title"><a href="pages/product.html">ساعت مچی فسیل مدل Gen 6.E مدل
                                    زنانه</a></h6>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span>(۳۷ نظر)</span>
                            </div>
                            <div class="product-price-row">
                                <div>
                                    <div class="product-price">۵,۹۰۰,۰۰۰ <small>تومان</small></div>
                                </div>
                                <button class="btn-add-to-cart" onclick="addToCart(6, 'ساعت فسیل Gen 6')">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محصول 4 -->
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-card">
                        <span class="product-badge discount">۳۰٪</span>
                        <div class="product-actions">
                            <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                            <button><i class="bi bi-arrow-left-right"></i></button>
                        </div>
                        <div class="product-img">
                            <img src="{{asset('panelFolder/images/products/watch-womens-rose-gold.jpg')}}" alt="ساعت"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                        </div>
                        <div class="product-info">
                            <div class="product-brand">سیتیزن</div>
                            <h6 class="product-title"><a href="pages/product.html">ساعت مچی سیتیزن مدل Eco-Drive
                                    مردانه</a></h6>
                            <div class="product-rating">
                                <span class="stars">★★★★★</span>
                                <span>(۴۳ نظر)</span>
                            </div>
                            <div class="product-price-row">
                                <div>
                                    <div class="product-old-price">۶,۸۰۰,۰۰۰</div>
                                    <div class="product-price">۴,۷۶۰,۰۰۰ <small>تومان</small></div>
                                </div>
                                <button class="btn-add-to-cart" onclick="addToCart(7, 'ساعت سیتیزن Eco-Drive')">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- === بنر بزرگ وسط صفحه === -->
    <section class="py-4">
        <div class="container">
            <div class="banner-box banner-1 position-relative" style="min-height:220px;">
                <i class="bi bi-magic-line banner-icon"></i>
                <div class="row w-100 align-items-center position-relative" style="z-index:2;">
                    <div class="col-md-8">
                        <h4 class="mb-2">جشنواره فروش پاییزه</h4>
                        <p class="mb-3">با خرید بالای ۲ میلیون تومان، یک ساعت مچی هدیه بگیرید!</p>
                        <a href="pages/amazing.html" class="btn btn-light">مشاهده جشنواره <i
                                class="bi bi-arrow-left"></i></a>
                    </div>
                    <div class="col-md-4 text-center d-none d-md-block">
                        <i class="bi bi-gift" style="font-size:100px;opacity:0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- === محصولات جدید === -->
    <section class="py-4">
        <div class="container">
            <div class="section-title">
                <h3>جدیدترین محصولات</h3>
                <a href="pages/search.html" class="view-all">مشاهده همه <i class="bi bi-chevron-left"></i></a>
            </div>
            <div class="row g-3">


                @foreach($products as $item)

                    @if($item->product->inValidDiscount())
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="product-card">
                                <span class="product-badge discount">
                                    @if($item->product->inValidDiscount()->type=='percentage')
                                        {{numberFormatAble($item->product->inValidDiscount()->value??0)}} %
                                    @else
                                        {{numberFormatAble(($item->product->inValidDiscount()->value /10)??0)}} ت
                                    @endif
                                </span>
                                {{--                                <span class="product-badge new">جدید</span>--}}
                                <div class="product-actions">
                                    <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                    <button><i class="bi bi-arrow-left-right"></i></button>
                                </div>
                                <div class="product-img">
                                    <img src="{{asset($item->product->image)}}" alt=""
                                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">{{$item->product?->brand->name??''}}</div>
                                    <h6 class="product-title">
                                        <a href="{{route('panel.show',['product'=>$item->product->slug,'productVariant'=>$item->id])}}">
                                            {{$item->product?->name??''}}
                                        </a>
                                    </h6>
                                    <div class="product-rating">
                                        <span class="stars">★★★★★</span>
                                        <span>(۲۲ نظر)</span>
                                    </div>
                                    <div class="product-old-price">{{numberFormatAble(($item->price /10))??0}}</div>
                                    <div class="product-price-row">
                                        <div class="product-price">{{numberFormatAble(($item->countable()/10))??0}}
                                            <small>ت</small></div>
                                        <button class="btn-add-to-cart"
                                                onclick="addToCart({{$item->id}},{{$item->product?->name??''}})"><i
                                                class="bi bi-bag-plus">

                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="product-card">
                               @if($item->new)
                                    <span class="product-badge new">جدید</span>
                                @endif
                                <div class="product-actions">
                                    <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                                    <button><i class="bi bi-arrow-left-right"></i></button>
                                </div>
                                <div class="product-img">
                                    <img src="{{asset($item->product->image)}}" alt=""
                                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'">
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">{{$item->product?->brand->name??''}}</div>
                                    <h6 class="product-title">
                                        <a href="{{route('panel.show',['product'=>$item->product->slug,'productVariant'=>$item->id])}}">
                                            {{$item->product?->name??''}}
                                        </a>
                                    </h6>
                                    <div class="product-rating">
                                        <span class="stars">★★★★★</span>
                                        <span>(۲۲ نظر)</span>
                                    </div>
                                    <div class="product-price-row">
                                        <div class="product-price">{{numberFormatAble(($item->price /10))??0}}
                                            <small>ت</small></div>
                                        <button class="btn-add-to-cart"
                                                onclick="addToCart({{$item->id}},{{$item->product?->name??''}})"><i
                                                class="bi bi-bag-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif

                @endforeach


            </div>
        </div>
    </section>

    <!-- === برندهای محبوب === -->
    <section class="py-4">
        <div class="container">

            <div class="section-title">
                <h3>برندهای محبوب</h3>
            </div>

            <div class="swiper brandsSwiper">
                <div class="swiper-wrapper">
                    @foreach($productBrands as $productBrand)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-3 p-4 text-center shadow-sm"
                                 style="height:90px;display:flex;align-items:center;justify-content:center;">
                                <span class="fw-bold fs-5 text-primary-custom">{{$productBrand->name??''}}</span>
                            </div>
                        </div>

                    @endforeach


                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>

        </div>
    </section>



    <!-- === خبرنامه === -->
    <section class="py-4">
        <div class="container">
            <div class="banner-box banner-2 text-center d-block" style="min-height:auto;padding:40px 30px;">
                <i class="bi bi-envelope-paper banner-icon" style="font-size:60px;"></i>
                <h4 class="mb-2">عضویت در خبرنامه زمانک</h4>
                <p class="mb-4">از جدیدترین تخفیف‌ها و محصولات باخبر شوید</p>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <button class="btn btn-light px-4"
                                    style="border-radius:0 50px 50px 0;color:var(--color-primary);font-weight:700;">
                                عضویت
                            </button>
                            <input type="email" class="form-control" placeholder="ایمیل خود را وارد کنید"
                                   style="border-radius:50px 0 0 50px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script src="{{asset('global/js/swiper-bundle.min.js')}}"></script>
    <script>
        const brandsSwiper = new Swiper('.brandsSwiper', {

            loop: true,

            slidesPerView: 2,
            spaceBetween: 10,

            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },

            breakpoints: {
                576: {
                    slidesPerView: 3,
                },

                768: {
                    slidesPerView: 4,
                },

                1200: {
                    slidesPerView: 6,
                },
            },

        });


    </script>
    <script>
        function randomHexColor() {
            return '#' + Math.floor(Math.random() * 16777215)
                .toString(16)
                .padStart(6, '0');
        }


        document.querySelectorAll('.rounded-circle').forEach(function (elem) {
            const color1 = randomHexColor();
            const color2 = randomHexColor();
            elem.style.background =
                `linear-gradient(135deg, ${color1}, ${color2})`
        });
    </script>
@endsection
