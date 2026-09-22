@extends('panel.Layout.master')
@section('content')

<section class="py-4">
  <div class="container">
    <!-- استپر -->
    <div class="checkout-steps">
      <div class="step-item active">
        <div class="step-circle">1</div>
        <div class="step-label">سبد خرید</div>
      </div>
      <div class="step-connector completed"></div>
      <div class="step-item active">
        <div class="step-circle">2</div>
        <div class="step-label">آدرس و ارسال</div>
      </div>
      <div class="step-connector"></div>
      <div class="step-item">
        <div class="step-circle">3</div>
        <div class="step-label">پرداخت</div>
      </div>
      <div class="step-connector"></div>
      <div class="step-item">
        <div class="step-circle">4</div>
        <div class="step-label">تکمیل سفارش</div>
      </div>
    </div>
    
    <div class="row g-4">
      <div class="col-lg-8">
        <!-- انتخاب آدرس -->
        <div class="content-box">
          <h5><i class="bi bi-geo-alt text-primary-custom"></i> آدرس تحویل</h5>
          
          <!-- آدرس پیش‌فرض -->
          <div class="address-card default mb-3" onclick="selectAddress(this)" style="cursor:pointer;">
            <span class="badge-default">پیش‌فرض</span>
            <div class="d-flex gap-3">
              <i class="bi bi-house-fill text-primary-custom fs-4"></i>
              <div class="flex-fill">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-1">محمد محمدی</h6>
                  <small class="text-muted-custom">۰۹۱۲۳۴۵۶۷۸۹</small>
                </div>
                <p class="small text-muted-custom mb-2">تهران، خیابان ولیعصر، کوچه شهید رجایی، پلاک ۱۲۳، واحد ۴</p>
                <div class="d-flex gap-2">
                  <span class="badge bg-soft text-primary-custom">منزل</span>
                  <button class="btn btn-sm btn-link text-primary-custom p-0">ویرایش</button>
                </div>
              </div>
              <i class="bi bi-check-circle-fill text-primary-custom"></i>
            </div>
          </div>
          
          <!-- آدرس دیگر -->
          <div class="address-card mb-3" onclick="selectAddress(this)" style="cursor:pointer;">
            <div class="d-flex gap-3">
              <i class="bi bi-briefcase-fill text-muted-custom fs-4"></i>
              <div class="flex-fill">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-1">محمد محمدی - محل کار</h6>
                  <small class="text-muted-custom">۰۹۱۲۳۴۵۶۷۸۹</small>
                </div>
                <p class="small text-muted-custom mb-2">تهران، خیابان شریعتی، بالاتر از میرداماد، برج پایتخت، طبقه ۵</p>
                <div class="d-flex gap-2">
                  <span class="badge bg-soft text-primary-custom">محل کار</span>
                  <button class="btn btn-sm btn-link text-primary-custom p-0">ویرایش</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- افزودن آدرس جدید -->
          <a href="#" class="d-block text-center p-3 border border-2 border-dashed rounded text-primary-custom" style="text-decoration:none;">
            <i class="bi bi-plus-circle fs-4"></i>
            <span class="fw-bold">افزودن آدرس جدید</span>
          </a>
        </div>
        
        <!-- روش ارسال -->
        <div class="content-box">
          <h5><i class="bi bi-truck text-primary-custom"></i> روش ارسال</h5>
          
          <div class="d-flex align-items-center gap-3 p-3 border rounded mb-2" style="border-color:var(--color-primary)!important;background-color:rgba(108,92,231,0.05);">
            <input type="radio" name="shipping" id="ship1" checked="">
            <label for="ship1" class="flex-fill cursor-pointer">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">ارسال پیک موتوری</h6>
                  <small class="text-muted-custom">تحویل در کمتر از ۲ ساعت در تهران</small>
                </div>
                <span class="fw-bold text-success">رایگان</span>
              </div>
            </label>
          </div>
          
          <div class="d-flex align-items-center gap-3 p-3 border rounded mb-2">
            <input type="radio" name="shipping" id="ship2">
            <label for="ship2" class="flex-fill cursor-pointer">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">ارسال سریع</h6>
                  <small class="text-muted-custom">تحویل فردا صبح</small>
                </div>
                <span class="fw-bold">۳۵,۰۰۰ ت</span>
              </div>
            </label>
          </div>
          
          <div class="d-flex align-items-center gap-3 p-3 border rounded">
            <input type="radio" name="shipping" id="ship3">
            <label for="ship3" class="flex-fill cursor-pointer">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="mb-0">پست پیشتاز</h6>
                  <small class="text-muted-custom">تحویل ۲ تا ۳ روز کاری</small>
                </div>
                <span class="fw-bold">۵۵,۰۰۰ ت</span>
              </div>
            </label>
          </div>
        </div>
        
        <!-- زمان تحویل -->
        <div class="content-box">
          <h5><i class="bi bi-clock text-primary-custom"></i> زمان تحویل</h5>
          <div class="row g-2">
            <div class="col-md-4">
              <div class="border rounded p-3 text-center cursor-pointer" style="border-color:var(--color-primary)!important;background-color:rgba(108,92,231,0.05);">
                <small class="text-muted-custom d-block">فردا</small>
                <strong>۱۸ تیر</strong>
                <small class="d-block text-primary-custom">سریع‌ترین</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="border rounded p-3 text-center cursor-pointer">
                <small class="text-muted-custom d-block">پس‌فردا</small>
                <strong>۱۹ تیر</strong>
              </div>
            </div>
            <div class="col-md-4">
              <div class="border rounded p-3 text-center cursor-pointer">
                <small class="text-muted-custom d-block">۲۰ تیر</small>
                <strong>شنبه</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- خلاصه سفارش -->
      <div class="col-lg-4">
        <div class="content-box sticky-top" style="top:90px;">
          <h5 class="fw-bold mb-3"><i class="bi bi-receipt text-primary-custom"></i> خلاصه سفارش</h5>
          
          <!-- محصولات -->
          <div class="d-flex gap-2 mb-2 pb-2 border-bottom">
            <i class="bi bi-clock text-primary-custom fs-5"></i>
            <div class="flex-fill small">
              <div>ساعت کاسیو G-Shock GA-1000</div>
              <small class="text-muted-custom">1 عدد</small>
            </div>
            <small class="fw-bold">۲,۱۰۰,۰۰۰</small>
          </div>
          <div class="d-flex gap-2 mb-3 pb-3 border-bottom">
            <i class="bi bi-smartwatch text-primary-custom fs-5"></i>
            <div class="flex-fill small">
              <div>اپل واچ سری ۹ - ۴۵mm</div>
              <small class="text-muted-custom">1 عدد</small>
            </div>
            <small class="fw-bold">۱۰,۸۰۰,۰۰۰</small>
          </div>
          
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted-custom small">جمع کالاها:</span>
            <span class="small">۱۲,۹۰۰,۰۰۰ ت</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted-custom small">تخفیف:</span>
            <span class="text-success small">۷,۹۰۰,۰۰۰ ت</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted-custom small">هزینه ارسال:</span>
            <span class="text-success small">رایگان</span>
          </div>
          
          <hr>
          
          <div class="d-flex justify-content-between mb-3">
            <span class="fw-bold">مبلغ قابل پرداخت:</span>
            <span class="fw-bold text-primary-custom fs-5">۱۲,۹۰۰,۰۰۰ ت</span>
          </div>
          
          <a href="checkout-payment.html" class="btn btn-cta w-100 btn-lg mb-2">
            ادامه به پرداخت <i class="bi bi-arrow-left"></i>
          </a>
          <a href="cart.html" class="btn btn-outline-primary-custom w-100">
            <i class="bi bi-arrow-right"></i> بازگست به سبد
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection