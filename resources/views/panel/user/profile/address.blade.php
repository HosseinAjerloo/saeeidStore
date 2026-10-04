@extends('panel.Layout.master')

@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('panel.index') }}">خانه</a><span class="separator">/</span>
            <a href="{{ route('panel.profile.index') }}">پروفایل</a><span class="separator">/</span>
            <span class="active">آدرس‌های من</span>
        </nav>
    </div>

    <div class="container">
        <div class="row g-4">
            <!-- سایدبار -->
                            @include('panel.user.profile.sidebar')


            <!-- محتوا -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0"><i class="bi bi-geo-alt text-primary-custom"></i> آدرس‌های من</h4>
                    <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addressModal"><i
                            class="bi bi-plus-circle"></i> آدرس جدید</button>
                </div>

                <div class="row g-3">
                    @foreach ($user->addresses as $address)
                        <div class="col-md-6">
                            <div class="address-card default">
                                @if ($address->default_address)
                                    <span class="badge-default">پیش‌فرض</span>
                                @endif
                                <div class="d-flex gap-3">
                                    <i class="bi bi-house-fill text-primary-custom fs-4"></i>
                                    <div class="flex-fill">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">{{ $address->name ?? '' }} {{ $address->family ?? '' }}</h6>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-link p-0 text-muted-custom"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i>
                                                            ویرایش</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-star"></i>
                                                            پیش‌فرض</a></li>
                                                    <li><a class="dropdown-item text-danger" href="#"><i
                                                                class="bi bi-trash"></i> حذف</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="text-muted-custom d-block mb-1">
                                            شماره تماس:
                                            {{ $address->phone_number }}
                                        </p>
                                        <p class="text-muted-custom d-block mb-1">
                                            تلفن ثابت:
                                            {{ $address->number }}
                                        </p>
                                        <p class="small mb-2">
                                            آدرس:{{ $address->full_address }}
                                        </p>
                                        <p class="small mb-2">
                                            کدپستی:{{ $address->postal_code }}
                                        </p>
                                        <p class="small mb-2">
                                            پلاک:{{ $address->house_number }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach






                    <!-- افزودن آدرس -->
                    <div class="col-md-6">
                        <a href="#"
                            class="d-block h-100 p-4 border border-2 border-dashed rounded text-center text-primary-custom"
                            style="text-decoration:none;min-height:160px;display:flex!important;align-items:center;justify-content:center;"
                            data-bs-toggle="modal" data-bs-target="#addressModal">
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
        <form method="POST" action="{{ route('panel.profile.address.register') }}" class="modal-dialog modal-lg">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-geo-alt text-primary-custom"></i> آدرس جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">نام تحویل گیرنده <span class="text-danger">*</span></label>
                            <input type="text" class="form-control   @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            <label class="form-label">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">نام خانوادگی تحویل گیرنده <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('family') is-invalid @enderror" name="family"
                                value="{{ old('family') }}">
                            <label class="form-label">
                                @error('family')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">شماره <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                name="phone_number" value="{{ old('phone_number') }}">
                            <label class="form-label">
                                @error('phone_number')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">تلفن ثابت



                            </label>
                            <input type="tel" class="form-control @error('number') is-invalid @enderror"
                                name="number" value="{{ old('number') }}">

                            <label class="form-label">
                                @error('number')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">استان <span class="text-danger">*</span></label>
                            <select name="province_id" class="form-select @error('province_id') is-invalid @enderror"
                                id="province" onchange="selectCityPovince()">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name ?? '' }}</option>
                                @endforeach

                            </select>
                            <label class="form-label">
                                @error('province_id')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">شهر <span class="text-danger">*</span>
                            </label>
                            <select class="form-select  @error('city_id') is-invalid @enderror" id="city"
                                name="city_id">
                                <option>انتخاب شهر</option>

                                @foreach ($cities as $city)
                                    <option class="d-none" data-province="{{ $city->province->id }}"
                                        value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach

                            </select>
                            <label class="form-label">
                                @error('city_id')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">کد پستی</label>
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                name="postal_code" value="{{ old('postal_code') }}">
                            <label class="form-full_address">
                                @error('city_id')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">پلاک</label>
                            <input type="text" class="form-control @error('house_number') is-invalid @enderror"
                                name="house_number" value="{{ old('house_number') }}">
                            <label class="form-full_address">
                                @error('house_number')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="col-12">
                            <label class="form-label">آدرس کامل <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('full_address') is-invalid @enderror" rows="3" name="full_address">{{ old('full_address') }}</textarea>
                            <label class="form-full_address">
                                @error('full_address')
                                    {{ $message }}
                                @enderror
                            </label>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultAddr" name="default_address">
                                <label class="form-check-label" for="defaultAddr">تنظیم به عنوان آدرس پیش‌فرض</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="bi bi-check-circle"></i> ذخیره آدرس
                    </button>
                    <button type="button" class="btn btn-outline-primary-custom" data-bs-dismiss="modal">انصراف</button>

                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        const province = document.getElementById('province');

        const city = document.getElementById('city');

        const selectCityPovince = () => {
            const value = province.options[province.selectedIndex].value;
            for (const elem of city.querySelectorAll('option[data-province]')) {
                if (elem.dataset.province !== value) {

                    elem.classList.add('d-none')
                } else {
                    elem.classList.remove('d-none')
                }
            }
        }
        selectCityPovince()
    </script>
@endsection
