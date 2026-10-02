@extends('panel.Layout.master')

@section('content')

<div class="container">
  <nav class="breadcrumb-custom">
    <a href="{{route('panel.index')}}">خانه</a><span class="separator">/</span>
    <a href="{{route('panel.profile.index')}}">پروفایل</a><span class="separator">/</span>
    <span class="active">آدرس‌های من</span>
  </nav>
</div>

<div class="container">
    <div class="row g-4">
      <!-- سایدبار -->
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
      
      <!-- محتوا -->
      <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="fw-bold mb-0"><i class="bi bi-geo-alt text-primary-custom"></i> آدرس‌های من</h4>
          <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addressModal"><i class="bi bi-plus-circle"></i> آدرس جدید</button>
        </div>
        
        <div class="row g-3">
          <div class="col-md-6">
            <div class="address-card default">
              <span class="badge-default">پیش‌فرض</span>
              <div class="d-flex gap-3">
                <i class="bi bi-house-fill text-primary-custom fs-4"></i>
                <div class="flex-fill">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-1">محمد محمدی</h6>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-link p-0 text-muted-custom" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> ویرایش</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-star"></i> پیش‌فرض</a></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> حذف</a></li>
                      </ul>
                    </div>
                  </div>
                  <small class="text-muted-custom d-block mb-1">۰۹۱۲۳۴۵۶۷۸۹</small>
                  <p class="small mb-2">تهران، خیابان ولیعصر، کوچه شهید رجایی، پلاک ۱۲۳، واحد ۴</p>
                  <span class="badge bg-soft text-primary-custom">منزل</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="address-card">
              <div class="d-flex gap-3">
                <i class="bi bi-briefcase-fill text-primary-custom fs-4"></i>
                <div class="flex-fill">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-1">محمد محمدی - محل کار</h6>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-link p-0 text-muted-custom" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> ویرایش</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-star"></i> پیش‌فرض</a></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> حذف</a></li>
                      </ul>
                    </div>
                  </div>
                  <small class="text-muted-custom d-block mb-1">۰۹۱۲۳۴۵۶۷۸۹</small>
                  <p class="small mb-2">تهران، خیابان شریعتی، بالاتر از میرداماد، برج پایتخت، طبقه ۵</p>
                  <span class="badge bg-soft text-primary-custom">محل کار</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="address-card">
              <div class="d-flex gap-3">
                <i class="bi bi-house-door text-primary-custom fs-4"></i>
                <div class="flex-fill">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-1">منزل والدین</h6>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-link p-0 text-muted-custom" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> ویرایش</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-star"></i> پیش‌فرض</a></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash"></i> حذف</a></li>
                      </ul>
                    </div>
                  </div>
                  <small class="text-muted-custom d-block mb-1">۰۹۱۲۳۴۵۶۷۸۹</small>
                  <p class="small mb-2">اصفهان، خیابان چهارباغ بالا، کوچه گلستان، پلاک ۴۵</p>
                  <span class="badge bg-soft text-primary-custom">منزل والدین</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- افزودن آدرس -->
          <div class="col-md-6">
            <a href="#" class="d-block h-100 p-4 border border-2 border-dashed rounded text-center text-primary-custom" style="text-decoration:none;min-height:160px;display:flex!important;align-items:center;justify-content:center;" data-bs-toggle="modal" data-bs-target="#addressModal">
              <div>
                <i class="bi bi-plus-circle" style="font-size:40px;"></i>
                <h6 class="mt-2 mb-0">افزودن آدرس جدید</h6>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="addressModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-geo-alt text-primary-custom"></i> آدرس جدید</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">نام <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required="">
          </div>
          <div class="col-md-6">
            <label class="form-label">نام خانوادگی <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required="">
          </div>
          <div class="col-md-6">
            <label class="form-label">شماره موبایل <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" required="">
          </div>
          <div class="col-md-6">
            <label class="form-label">تلفن ثابت</label>
            <input type="tel" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">استان <span class="text-danger">*</span></label>
            <select class="form-select"><option>تهران</option><option>اصفهان</option><option>فارس</option></select>
          </div>
          <div class="col-md-6">
            <label class="form-label">شهر <span class="text-danger">*</span></label>
            <select class="form-select"><option>تهران</option><option>کرج</option></select>
          </div>
          <div class="col-12">
            <label class="form-label">آدرس کامل <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="3" required=""></textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label">کد پستی</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">نوع آدرس</label>
            <select class="form-select"><option>منزل</option><option>محل کار</option><option>سایر</option></select>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="defaultAddr">
              <label class="form-check-label" for="defaultAddr">تنظیم به عنوان آدرس پیش‌فرض</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary-custom" data-bs-dismiss="modal">انصراف</button>
        <button type="button" class="btn btn-primary-custom" onclick="showToast('آدرس با موفقیت ذخیره شد','success')" data-bs-dismiss="modal"><i class="bi bi-check-circle"></i> ذخیره آدرس</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection