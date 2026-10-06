
@extends('panel.Layout.master')
@section('content')
<div class="container">
  <nav class="breadcrumb-custom">
    <a href="{{route('panel.index')}}">خانه</a>
    <span class="separator">/</span>
    <span class="active">جستجو: ساعت مچی مردانه</span>
  </nav>
</div>



<section class="pb-5">
  <div class="container">
    <!-- عنوان و تعداد نتایج -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h4 class="fw-bold mb-0">نتایج جستجو: «ساعت مچی مردانه»</h4>
        <small class="text-muted-custom">حدود ۱۲۸ محصول یافت شد</small>
      </div>
      <button class="btn btn-outline-primary-custom d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#filterSidebar">
        <i class="bi bi-funnel"></i> فیلترها
      </button>
    </div>
    
    <!-- تب‌بندی موبایل -->
    <div class="mobile-tabs mb-3">
      <button type="button" class="nav-link active" data-search-tab="grid" onclick="showSearchMobileTab('grid', this)">محصولات</button>
      <button type="button" class="nav-link" data-search-tab="list" onclick="showSearchMobileTab('list', this)">لیست</button>
      <button type="button" class="nav-link" data-search-tab="brands" onclick="showSearchMobileTab('brands', this)">برندها</button>
      <button type="button" class="nav-link" data-search-tab="filter" onclick="showSearchMobileTab('filter', this)">فیلتر</button>
    </div>
    
    <div class="row g-4">
      <!-- سایدبار فیلتر (دسکتاپ) -->
      <div class="col-lg-3 d-none d-lg-block">
        <div class="content-box sticky-top" style="top:90px;">
          <h5><i class="bi bi-funnel text-primary-custom"></i> فیلترها</h5>
          
          <!-- دسته‌بندی -->
          <div class="mb-4">
            <h6 class="fw-bold mb-2">دسته‌بندی</h6>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="cat1" checked="">
              <label class="form-check-label" for="cat1">ساعت مردانه</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="cat2">
              <label class="form-check-label" for="cat2">ساعت زنانه</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="cat3">
              <label class="form-check-label" for="cat3">ساعت هوشمند</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="cat4">
              <label class="form-check-label" for="cat4">ساعت لوکس</label>
            </div>
          </div>
          
          <hr>
          
          <!-- برند -->
          <div class="mb-4">
            <h6 class="fw-bold mb-2">برند</h6>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="b1" checked=""><label class="form-check-label" for="b1">کاسیو (۲۸)</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="b2"><label class="form-check-label" for="b2">سیکو (۲۲)</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="b3"><label class="form-check-label" for="b3">تیسوت (۱۸)</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="b4"><label class="form-check-label" for="b4">اورینت (۱۵)</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="b5"><label class="form-check-label" for="b5">سیتیزن (۱۲)</label></div>
            <a href="#" class="small text-primary-custom">+ مشاهده بیشتر</a>
          </div>
          
          <hr>
          
          <!-- محدوده قیمت -->
          <div class="mb-4">
            <h6 class="fw-bold mb-2">محدوده قیمت</h6>
            <div class="d-flex gap-2 mb-2">
              <input type="number" class="form-control form-control-sm" placeholder="از">
              <input type="number" class="form-control form-control-sm" placeholder="تا">
            </div>
            <button class="btn btn-primary-custom btn-sm w-100">اعمال فیلتر قیمت</button>
            <div class="mt-3">
              <div class="form-check"><input class="form-check-input" type="radio" name="price" id="p1"><label class="form-check-label" for="p1">زیر ۵۰۰ هزار</label></div>
              <div class="form-check"><input class="form-check-input" type="radio" name="price" id="p2"><label class="form-check-label" for="p2">۵۰۰ تا ۲ میلیون</label></div>
              <div class="form-check"><input class="form-check-input" type="radio" name="price" id="p3" checked=""><label class="form-check-label" for="p3">۲ تا ۵ میلیون</label></div>
              <div class="form-check"><input class="form-check-input" type="radio" name="price" id="p4"><label class="form-check-label" for="p4">بالای ۵ میلیون</label></div>
            </div>
          </div>
          
          <hr>
          
          <!-- رنگ -->
          <div class="mb-4">
            <h6 class="fw-bold mb-2">رنگ</h6>
            <div class="d-flex flex-wrap gap-2">
              <span class="color-swatch" style="background:#2D3436;" onclick="selectColor(this)"></span>
              <span class="color-swatch selected" style="background:#6C5CE7;" onclick="selectColor(this)"></span>
              <span class="color-swatch" style="background:#FF6B6B;" onclick="selectColor(this)"></span>
              <span class="color-swatch" style="background:#00CEC9;" onclick="selectColor(this)"></span>
              <span class="color-swatch" style="background:#fdcb6e;" onclick="selectColor(this)"></span>
              <span class="color-swatch" style="background:#dfe6e9;" onclick="selectColor(this)"></span>
            </div>
          </div>
          
          <hr>
          
          <!-- ویژگی‌ها -->
          <div class="mb-3">
            <h6 class="fw-bold mb-2">ویژگی‌ها</h6>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="f1"><label class="form-check-label" for="f1">ضد آب</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="f2"><label class="form-check-label" for="f2">کرونوگراف</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="f3"><label class="form-check-label" for="f3">تاریخ‌نما</label></div>
            <div class="form-check"><input class="form-check-input" type="checkbox" id="f4"><label class="form-check-label" for="f4">اطماتیک</label></div>
          </div>
          
          <button class="btn btn-outline-primary-custom w-100">حذف فیلترها</button>
        </div>
      </div>
      
      <!-- نتایج جستجو -->
      <div class="col-lg-9 mobile-tab-content" id="search-grid">
        <!-- مرتب‌سازی -->
        <div class="content-box d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-sort-down text-primary-custom"></i>
            <span class="small text-muted-custom">مرتب‌سازی:</span>
            <select class="form-select form-select-sm" style="width:auto;">
              <option>محبوب‌ترین</option>
              <option>جدیدترین</option>
              <option>ارزان‌ترین</option>
              <option>گران‌ترین</option>
              <option>پرفروش‌ترین</option>
              <option>بیشترین تخفیف</option>
            </select>
          </div>
          <div class="btn-group view-toggle">
            <button type="button" class="btn btn-sm btn-primary-custom active view-toggle-btn" data-view="grid" onclick="setProductsView('grid')" aria-label="نمایش شبکه‌ای">
              <i class="bi bi-grid"></i>
            </button>
            <button type="button" class="btn btn-sm btn-outline-primary-custom view-toggle-btn" data-view="list" onclick="setProductsView('list')" aria-label="نمایش لیستی">
              <i class="bi bi-list"></i>
            </button>
          </div>
        </div>
        
        <!-- محصولات -->
        <div class="row g-3" id="products-container">
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <span class="product-badge discount">۲۵٪</span>
              <div class="product-actions">
                <button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button>
                <button><i class="bi bi-arrow-left-right"></i></button>
              </div>
              <div class="product-img"><img src="../images/products/watch-mens-gshock-black.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">کاسیو</div>
                <h6 class="product-title"><a href="product.html">ساعت کاسیو G-Shock GA-1000</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۴۲)</span></div>
                <div class="product-price-row">
                  <div><div class="product-old-price">۲,۸۰۰,۰۰۰</div><div class="product-price">۲,۱۰۰,۰۰۰ <small>ت</small></div></div>
                  <button class="btn-add-to-cart" onclick="addToCart(1,'کاسیو')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-mens-seiko-silver.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">سیکو</div>
                <h6 class="product-title"><a href="product.html">ساعت سیکو Presage Automatic</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۶۴)</span></div>
                <div class="product-price-row">
                  <div class="product-price">۷,۸۵۰,۰۰۰ <small>ت</small></div>
                  <button class="btn-add-to-cart" onclick="addToCart(4,'سیکو')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <span class="product-badge discount">۲۰٪</span>
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-mens-orient-blue.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">اورینت</div>
                <h6 class="product-title"><a href="product.html">ساعت اورینت Mako II</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۵۱)</span></div>
                <div class="product-price-row">
                  <div><div class="product-old-price">۴,۲۰۰,۰۰۰</div><div class="product-price">۳,۳۶۰,۰۰۰ <small>ت</small></div></div>
                  <button class="btn-add-to-cart" onclick="addToCart(5,'اورینت')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <span class="product-badge discount">۳۰٪</span>
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-womens-rose-gold.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">سیتیزن</div>
                <h6 class="product-title"><a href="product.html">ساعت سیتیزن Eco-Drive</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۴۳)</span></div>
                <div class="product-price-row">
                  <div><div class="product-old-price">۶,۸۰۰,۰۰۰</div><div class="product-price">۴,۷۶۰,۰۰۰ <small>ت</small></div></div>
                  <button class="btn-add-to-cart" onclick="addToCart(7,'سیتیزن')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <span class="product-badge discount">۱۵٪</span>
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-mens-tissot-silver.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">تیسوت</div>
                <h6 class="product-title"><a href="product.html">ساعت تیسوت PRX 40mm</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۲۸)</span></div>
                <div class="product-price-row">
                  <div><div class="product-old-price">۵,۵۰۰,۰۰۰</div><div class="product-price">۴,۶۷۵,۰۰۰ <small>ت</small></div></div>
                  <button class="btn-add-to-cart" onclick="addToCart(3,'تیسوت')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <span class="product-badge new">جدید</span>
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-womens-michael-kors.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">گس</div>
                <h6 class="product-title"><a href="product.html">ساعت گس Rigor مردانه</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۱۸)</span></div>
                <div class="product-price-row">
                  <div class="product-price">۳,۴۵۰,۰۰۰ <small>ت</small></div>
                  <button class="btn-add-to-cart" onclick="addToCart(9,'گس')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-mens-diver-black.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">تامی هیلفیگر</div>
                <h6 class="product-title"><a href="product.html">ساعت تامی هیلفیگر 1791285</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۲۶)</span></div>
                <div class="product-price-row">
                  <div class="product-price">۴,۹۰۰,۰۰۰ <small>ت</small></div>
                  <button class="btn-add-to-cart" onclick="addToCart(11,'تامی')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="product-card">
              <span class="product-badge discount">۱۰٪</span>
              <div class="product-actions"><button onclick="toggleFavorite(this)"><i class="bi bi-heart"></i></button></div>
              <div class="product-img"><img src="../images/products/watch-mens-chronograph.jpg" alt="" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Crect fill=%22%23f1f2f6%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%22100%22 y=%22110%22 font-size=%2260%22 text-anchor=%22middle%22 fill=%22%236C5CE7%22%3E⌚%3C/text%3E%3C/svg%3E'"></div>
              <div class="product-info">
                <div class="product-brand">دیزل</div>
                <h6 class="product-title"><a href="product.html">ساعت دیزل Mr. Daddy 2.0</a></h6>
                <div class="product-rating"><span class="stars">★★★★★</span> <span>(۲۱)</span></div>
                <div class="product-price-row">
                  <div><div class="product-old-price">۵,۲۰۰,۰۰۰</div><div class="product-price">۴,۶۸۰,۰۰۰ <small>ت</small></div></div>
                  <button class="btn-add-to-cart" onclick="addToCart(15,'دیزل')"><i class="bi bi-bag-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- صفحه‌بندی -->
        <nav class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">۱</a></li>
            <li class="page-item"><a class="page-link" href="#">۲</a></li>
            <li class="page-item"><a class="page-link" href="#">۳</a></li>
            <li class="page-item"><a class="page-link" href="#">۴</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
          </ul>
        </nav>
      </div>

      <!-- پنل برندها (موبایل) -->
      <div class="col-12 mobile-tab-content d-none" id="search-brands">
        <div class="content-box">
          <h5 class="fw-bold mb-3"><i class="bi bi-tags text-primary-custom"></i> برندها</h5>
          <div class="row g-2">
            <div class="col-6"><a href="search.html" class="brand-chip">کاسیو <span>(۲۸)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">سیکو <span>(۲۲)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">تیسوت <span>(۱۸)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">اورینت <span>(۱۵)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">سیتیزن <span>(۱۲)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">اپل <span>(۹)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">فسیل <span>(۸)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">گس <span>(۷)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">دیزل <span>(۶)</span></a></div>
            <div class="col-6"><a href="search.html" class="brand-chip">مایکل کورس <span>(۵)</span></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection