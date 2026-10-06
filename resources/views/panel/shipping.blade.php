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

                        @foreach (Auth::user()->addresses as $address)
                            <div class="address-card default mb-3" onclick="selectAddress(this)" style="cursor:pointer;">
                                @if ($address->default_address)
                                    <span class="badge-default">پیش‌فرض</span>
                                @endif
                                <div class="d-flex gap-3">
                                    <i class="bi bi-house-fill text-primary-custom fs-4"></i>
                                    <div class="flex-fill">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">{{ $address->name ?? '' }}{{ $address->family ?? '' }}</h6>
                                            <small class="text-muted-custom">{{ $address->phone_number ?? '' }}</small>
                                        </div>
                                        <p class="small text-muted-custom mb-2">
                                            {{ $address->full_address }}
                                        </p>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('panel.profile.address') }}">
                                                <button class="btn btn-sm btn-link text-primary-custom p-0">ویرایش</button>
                                            </a>
                                        </div>
                                    </div>
                                    <i class="bi bi-check-circle-fill text-primary-custom"></i>
                                </div>
                            </div>
                        @endforeach

                        <a href="{{ route('panel.profile.address') }}"
                            class="d-block text-center p-3 border border-2 border-dashed rounded text-primary-custom"
                            style="text-decoration:none;">
                            <i class="bi bi-plus-circle fs-4"></i>
                            <span class="fw-bold">افزودن آدرس جدید</span>
                        </a>
                    </div>

                    <!-- روش ارسال -->
                    <div class="content-box">
                        <h5><i class="bi bi-truck text-primary-custom"></i> روش ارسال</h5>



                        @foreach ($couriers as $key => $courier)
                            <div class="d-flex align-items-center gap-3 p-3 border rounded mb-2"
                                style="border-color:var(--color-primary)!important;background-color:rgba(108,92,231,0.05);">
                                <input type="radio" onchange="provider(event)" data-price={{ $courier->price }}
                                    name="shipping" id="{{ $key + 10 }}" @checked($key == 0)>
                                <label for="{{ $key + 10 }}" class="flex-fill cursor-pointer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="mb-0">{{ $courier->name ?? '' }}</h6>
                                            <small
                                                class="text-muted-custom">{{ $courier->delivery_business_days ?? '' }}</small>
                                        </div>
                                        <span
                                            class="fw-bold @if ($courier->price == 0) text-success @endif">{{ $courier->priceText }}</span>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>


                </div>

                @isset($cart)
                    <div class="col-lg-4">
                        <div class="content-box sticky-top" style="top:90px;">
                            <h5 class="fw-bold mb-3"><i class="bi bi-receipt text-primary-custom"></i> خلاصه سفارش</h5>

                            <!-- محصولات -->
                            @foreach ($cart->cartItems as $item)
                                <div class="d-flex gap-2 mb-2 pb-2 border-bottom">
                                    <img style="height: 50px; width: 50px;object-fit:contain"
                                        src="{{ $item->productVariant?->product?->image }}"
                                        alt="{{ $item->productVariant?->product?->name ?? '' }}">
                                    <div class="flex-fill small">
                                        <div>{{ $item->productVariant?->product?->name ?? '' }}</div>
                                        <small class="text-muted-custom">{{ $item->productVariant?->product?->name ?? '' }}
                                            عدد</small>
                                    </div>
                                    <small class="fw-bold item-price "
                                        data-price={{ $item->final_unit_price }}>{{ numberFormatAble($item->final_unit_price / 10) ?? 0 }}ت</small>
                                </div>
                            @endforeach


                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted-custom small">جمع کالاها:</span>
                                <span class="small total"
                                    data-price="{{ $cart->total_price }}">{{ numberFormatAble($cart->total_price / 10 ?? 0) }}
                                    ت</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted-custom small">تخفیف:</span>
                                <span class="text-success small totalDiscount"
                                    data-price="{{ $cart->calculateTotalDiscount() }}"="">{{ numberFormatAble($cart->calculateTotalDiscount() / 10) ?? 0 }}
                                    ت</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted-custom small">هزینه ارسال:</span>
                                <span class="text-success small delivery">رایگان</span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-bold">مبلغ قابل پرداخت:</span>
                                <span
                                    class="fw-bold text-primary-custom fs-5 final-price" data-price="{{$cart->final_price}}">{{ numberFormatAble($cart->final_price / 10) ?? 0 }}
                                    ت</span>
                            </div>

                            <a href="checkout-payment.html" class="btn btn-cta w-100 btn-lg mb-2">
                                ادامه به پرداخت <i class="bi bi-arrow-left"></i>
                            </a>
                            <a href="cart.html" class="btn btn-outline-primary-custom w-100">
                                <i class="bi bi-arrow-right"></i> بازگست به سبد
                            </a>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const numberFormat = new Intl.NumberFormat('fa-IR');

        const finalPriceElement =  document.querySelector('.final-price');

        

        const total = document.querySelector('.total');
        const delivery = document.querySelector('.delivery');
        const totalPriceElement = Number(total.dataset.price / 10);


        const totalDiscount = document.querySelector('.totalDiscount');
        const DiscountPrice = Number(totalDiscount.dataset.price / 10);
        totalDiscount.innerText = numberFormat.format(DiscountPrice) + ' ت'


        document.querySelectorAll('.item-price').forEach(elem => {
            const price = Number(elem.dataset.price / 10);
            const textFormat = numberFormat.format(price);
            elem.innerText = textFormat + ' ت'
        })

        const provider = () => {
            const radioes = document.querySelectorAll('input[type=radio]');
            radioes.forEach(elem => {
                if (elem.checked) {
                    const deliveryPrice = Number(elem.dataset.price / 10);
                    if (deliveryPrice <= 0) {
                        delivery.innerText = 'رایگان';
                    } else {
                        delivery.innerText = numberFormat.format(deliveryPrice) + ' ت';
                        
                    }
                    let finalPrice=Number(finalPriceElement.dataset.price / 10);
                    finalPrice+=deliveryPrice;


              
                    finalPriceElement.innerText=numberFormat.format(finalPrice)+' ت'




                }
            })

        }
        provider()
    </script>
@endsection
