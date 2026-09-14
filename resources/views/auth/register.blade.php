@extends('panel.Layout.master')
@section('content')
<div class="auth-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="row g-0 bg-white rounded-4 shadow-lg overflow-hidden" style="max-width:900px;margin:0 auto;">
          <!-- بخش تصویر -->
          <div class="col-md-5 d-none d-md-block" style="background:linear-gradient(135deg,#FF6B6B,#6C5CE7);">
            <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4 text-white text-center">
              <i class="bi bi-person-plus" style="font-size:80px;"></i>
              <h3 class="fw-bold mt-3">به زمانک بپیوندید</h3>
              <p class="mb-0">عضویت رایگان در کمتر از ۱ دقیقه</p>
              <hr class="w-50 my-4">
              <div class="small">
                <div class="mb-3"><i class="bi bi-gift"></i> کد تخفیف اولین خرید</div>
                <div class="mb-3"><i class="bi bi-bell"></i> اطلاع‌رسانی تخفیف‌ها</div>
                <div><i class="bi bi-star"></i> سفارش‌های سریع‌تر</div>
              </div>
            </div>
          </div>
          
          <!-- فرم ثبت‌نام -->
          <div class="col-md-7 p-4 p-md-5">
            <div class="auth-logo">
              <div class="logo-icon"><i class="bi bi-person-plus"></i></div>
              <h3 class="auth-title">ثبت‌نام</h3>
              <p class="auth-subtitle">حساب کاربری زمانک را ایجاد کنید</p>
            </div>
            
            <form id="registerForm" data-validate="">
              <div class="row g-2">
                <div class="col-6">
                  <div class="input-group-custom">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" class="form-control" placeholder="نام" required="" style="padding-right:44px;">
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group-custom">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" class="form-control" placeholder="نام خانوادگی" required="" style="padding-right:44px;">
                  </div>
                </div>
              </div>
              
              <div class="input-group-custom">
                <i class="bi bi-phone input-icon"></i>
                <input type="tel" class="form-control" placeholder="شماره موبایل" maxlength="11" required="" style="padding-right:44px;">
              </div>
              
              <div class="input-group-custom">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" class="form-control" placeholder="ایمیل (اختیاری)" style="padding-right:44px;">
              </div>
              
              <div class="input-group-custom">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" class="form-control" placeholder="رمز عبور" required="" style="padding-right:44px;">
              </div>
              
              <div class="input-group-custom">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" class="form-control" placeholder="تکرار رمز عبور" required="" style="padding-right:44px;">
              </div>
              
              <!-- قدرت رمز -->
              <div class="mb-3">
                <div class="d-flex gap-1">
                  <div style="height:4px;flex:1;background:var(--color-success);border-radius:2px;"></div>
                  <div style="height:4px;flex:1;background:var(--color-success);border-radius:2px;"></div>
                  <div style="height:4px;flex:1;background:var(--color-bg-soft);border-radius:2px;"></div>
                  <div style="height:4px;flex:1;background:var(--color-bg-soft);border-radius:2px;"></div>
                </div>
                <small class="text-muted-custom">قدرت رمز: متوسط</small>
              </div>
              
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms" required="">
                <label class="form-check-label small" for="terms">
                  <a href="#" class="text-primary-custom">قوانین و مقررات</a> را می‌پذیرم
                </label>
              </div>
              
              <a href="auth-verify.html" class="btn btn-primary-custom w-100 btn-lg mb-3">
                <i class="bi bi-person-check"></i> ثبت‌نام
              </a>
            </form>
            
            <hr class="my-4">
            
            <div class="text-center">
              <small class="text-muted-custom">قبلاً ثبت‌نام کرده‌اید؟</small>
              <a href="{{route('auth.viewLogin')}}" class="fw-bold text-primary-custom">ورود کنید</a>
            </div>
            
            <div class="text-center mt-3">
              <a href="../index.html" class="small text-muted-custom"><i class="bi bi-arrow-right"></i> بازگشت به خانه</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection