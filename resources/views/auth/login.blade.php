@extends('panel.Layout.master')
@section('content')
<div class="auth-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="row g-0 bg-white rounded-4 shadow-lg overflow-hidden" style="max-width:900px;margin:0 auto;">
          <!-- بخش تصویر -->
          <div class="col-md-5 d-none d-md-block" style="background:linear-gradient(135deg,#6C5CE7,#00CEC9);">
            <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4 text-white text-center">
              <i class="bi bi-clock-history" style="font-size:80px;"></i>
              <h3 class="fw-bold mt-3">زمانک</h3>
              <p class="mb-0">فروشگاه تخصصی ساعت مچی</p>
              <hr class="w-50 my-4">
              <div class="small">
                <div class="mb-3"><i class="bi bi-shield-check"></i> ضمانت اصالت کالا</div>
                <div class="mb-3"><i class="bi bi-truck"></i> ارسال سریع و رایگان</div>
                <div><i class="bi bi-arrow-repeat"></i> ۷ روز ضمانت بازگشت</div>
              </div>
            </div>
          </div>
          
          <!-- فرم ورود -->
          <div class="col-md-7 p-4 p-md-5">
            <div class="auth-logo">
              <div class="logo-icon"><i class="bi bi-clock-history"></i></div>
              <h3 class="auth-title">ورود به حساب</h3>
              <p class="auth-subtitle">برای ورود شماره موبایل خود را وارد کنید</p>
            </div>
            
            <form id="loginForm" data-validate="">
              <div class="input-group-custom">
                <i class="bi bi-phone input-icon"></i>
                <input type="tel" class="form-control" placeholder="شماره موبایل" maxlength="11" required="" style="padding-right:44px;">
              </div>
              
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember">
                <label class="form-check-label small" for="remember">مرا به خاطر بسپار</label>
              </div>
              
              <a href="auth-verify.html" class="btn btn-primary-custom w-100 btn-lg mb-3">
                <i class="bi bi-send"></i> ارسال کد تایید
              </a>
              
              <div class="auth-divider"><span>یا</span></div>
              
              <a href="{{route('auth.redirectGoogle')}}" class="btn btn-outline-primary-custom w-100 mb-2">
                <i class="bi bi-google"></i> ورود با گوگل
              </a>
            </form>
            
            <hr class="my-4">
            
            <div class="text-center">
              <small class="text-muted-custom">حساب کاربری ندارید؟</small>
              <a href="{{route('auth.viewRegister')}}" class="fw-bold text-primary-custom">ثبت‌نام کنید</a>
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
