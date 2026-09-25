@extends('panel.Layout.master')

@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('panel.index') }}">خانه</a>
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
                @isset($cart)
                    @foreach ($cart->cartItems as $item)
                        <div class="cart-item">
                            <div class="cart-item-img">
                                <img src="{{ $item->productVariant?->product?->image }}" alt="ساعت کاسیو G-Shock">
                            </div>
                            <div class="cart-item-info">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6>{{ $item->productVariant?->product?->name ?? '' }}</h6>
                                        <div class="brand">
                                            برند:{{ $item->productVariant?->product?->brand?->name ?? '' }}</div>
                                        <span class="badge bg-success-subtle text-success">
                                            <i class="bi bi-check-circle"></i>
                                            موجود
                                        </span>
                                    </div>
                                    <button class="btn btn-sm btn-link text-danger" data-value="{{ $item->id }}"
                                        onclick="removeCartItem(this)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-3">
                                    <div class="cart-quantity">
                                        <button onclick="changeQuantity(this.nextElementSibling, 1)">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                        <input type="number" min="0"
                                            max="{{ $item->calculateRemainingStock($item->productVariant->id) }}"
                                            class="text-center" style="appearance: none" value="{{ $item->quantity ?? 1 }}"
                                            readonly=""
                                            data-unitPrice="{{ $item->productVariant->validDiscount() ? $item->productVariant->countable() : $item->productVariant->price }}"
                                            data-unitDiscountPrice="{{ $item->productVariant->validDiscount() ? $item->calculateDiscount() : 0 }}"
                                            data-unitPriceWithoutDiscount="{{ $item->productVariant->price }}"
                                            data-value="{{ $item->id }}" />
                                        <button onclick="changeQuantity(this.previousElementSibling, -1)">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                    </div>
                                    @if ($item->productVariant->validDiscount())
                                        <div class="text-end">
                                            <div
                                                class="through-price text-muted-custom product-reserve-count text-decoration-line-through small">
                                                {{ numberFormatAble(($item->productVariant?->price ?? 0) / 10) }}
                                            </div>
                                            <div class="price fw-bold text-primary-custom"
                                                data-price="{{ $item->productVariant->countable() }}">
                                                <span class="item-price" data-price="{{ $item->productVariant->countable() }}"
                                                    data-unitPriceWithoutDiscount="{{ $item->productVariant->price }}">
                                                    {{ numberFormatAble($item->productVariant->countable() / 10) }}
                                                </span>
                                                تومان
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-end">
                                            <div class="price fw-bold text-primary-custom"
                                                data-price="{{ $item->productVariant->price }}">
                                                <span class="item-price"
                                                    data-unitPriceWithoutDiscount="{{ $item->productVariant->price }}"
                                                    data-price="{{ $item->productVariant->price }}">
                                                    {{ numberFormatAble(($item->productVariant?->price ?? 0) / 10) }}
                                                </span>
                                                تومان
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset



                <!-- کد تخفیف -->
                @if (Auth::user() and isset($cart))
                    <div class="content-box mt-3">
                        <h6 class="fw-bold mb-3"><i class="bi bi-ticket-perforated text-primary-custom"></i> کد تخفیف</h6>
                        <div class="row g-2">
                            <div class="col-md-8">
                                <input type="text" id="discountUser" class="form-control"
                                    placeholder="کد تخفیف خود را وارد کنید" value="{{ $cart->discount?->code }}">
                            </div>
                            <div class="col-md-4">
                                <button data-type="{{ $cart->discount_id ? 'remove' : 'add' }}"
                                    class="btn btn-primary-custom w-100" onclick="calculateUserDiscount(event)">
                                    {{ $cart->discount ? 'حذف کد تخفیف' : 'اعمال کد' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- ادامه خرید -->
                <div class="mt-3">
                    <a href="../index.html" class="text-primary-custom"><i class="bi bi-arrow-right"></i> ادامه خرید</a>
                </div>
            </div>

            <!-- خلاصه سفارش -->
            <div class="col-lg-4">
                <div class="content-box sticky-top" style="top:90px;">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-receipt text-primary-custom"></i>
                        خلاصه سفارش
                    </h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">تعداد محصولات:</span>
                        <span class="fw-bold">{{ $cart->cartItems()->count() }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">جمع کل:</span>
                        <span class="fw-bold" id="totalShow">{{ numberFormatAble($cart->final_price / 10 ?? 0) }}
                            تومان</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">تخفیف:</span>
                        <span class="text-success fw-bold"
                            id="calculateShow">{{ numberFormatAble($cart->calculateTotalDiscount() / 10) ?? 0 }}تومان</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted-custom">هزینه ارسال:</span>
                        <span class="text-success fw-bold">محاسبه در مرحله ثبت سفارش</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">مبلغ قابل پرداخت:</span>
                        <span class="fw-bold text-primary-custom fs-5"
                            id="cart-total">{{ numberFormatAble($cart->final_price / 10) ?? 0 }} تومان</span>
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

                    {{-- <div class="small">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const numberFormat = new Intl.NumberFormat('fa-IR');
        let calculateDiscount = 0;
        let totalPrice = 0;
        let totalPriceWidouthDiscount = 0;
        let isUserSpecificDiscount = Boolean({{ $cart->discount_id ? 1 : 0 }});
        let = value = {{ $cart?->calculateDiscountAmount() }};

        const userDiscount = document.querySelector('#discountUser');

        function changeQuantity(input, delta) {

            let value = parseInt(input.value) || 1;
            value += delta;

            if (value < 1)
                value = 1;

            if (value > input.max) {
                showToast(' موجودی این محصول برای تعداد درخواستی کافی نیست', 'error');
                value = input.max;
            }
            input.value = value;

            const route = '{{ route('panel.cart.updateQuantity', '__ID__') }}'.replace('__ID__', input.dataset.value);
            sendAddToCartRequest({
                cartItem: input.dataset.value,
                quantity: value,
                route,
                method: 'PATCH'
            }).then(result => {
                if (result.status) {

                    updateCartTotal();
                    calculateDiscountFunc()
                    toggleDiscountAmount()


                }


            }).catch(result => {
                showToast(result?.message, 'error');
            })

        }


        function calculateUserDiscount(event) {
            let bun = event.currentTarget;

            const inputDiscountUser = event.currentTarget.parentElement.previousElementSibling.querySelector('input');
            if (inputDiscountUser.value.trim()) {
                if (bun.dataset.type == 'add') {
                    sendAddToCartRequest({
                        quantity: inputDiscountUser.value.trim(),
                        route: "{{ route('panel.cart.applyDiscount') }}",
                        method: 'POST'
                    }).then(result => {
                        if (result && result?.data?.value) {
                            value = result?.data?.value;
                            bun.setAttribute('data-type', 'remove')
                            bun.innerText = 'حذف  کد تخفیف'
                            isUserSpecificDiscount = true

                        }
                        calculateDiscountFunc()
                    }).catch(result => {
                        showToast(result?.message, 'error')
                    })
                } else {


                    sendAddToCartRequest({
                        quantity: inputDiscountUser.value.trim(),
                        route: "{{ route('panel.cart.deleteDiscount') }}",
                        method: 'POST'
                    }).then(result => {
                        if (result) {
                            bun.setAttribute('data-type', 'add')
                            bun.innerText = 'اعمال کدتخفیف'
                            showToast(result?.message, 'success')
                            inputDiscountUser.value = ''
                            isUserSpecificDiscount = false
                            showToast(result?.message, 'success')


                        }
                           calculateDiscountFunc()
                    }).catch(result => {
                        showToast(result?.message, 'error')
                    })
                }
            }
        }
        async function sendAddToCartRequest({
            cartItem = null,
            quantity = null,
            route = null,
            method = null
        }) {

            const promise = new Promise(function(resolve, reject) {
                const request = new XMLHttpRequest();
                request.open(method, route, true)
                request.setRequestHeader('Content-Type', 'application/json');
                request.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                request.setRequestHeader('Accept', 'application/json');
                request.withCredentials = true;
                const body = JSON.stringify({
                    quantity,
                })
                request.onload = function() {
                    const response = JSON.parse(request.response);
                    if (request.status === 200) {
                        resolve(response)
                    } else {
                        reject(response)
                    }
                }
                request.send(body);
            })
            return promise;
        }

       function calculateDiscountFunc() {
    calculateDiscount = 0;
    totalPrice = 0;
    totalPriceWidouthDiscount = 0;

    const formatPrice = (price) => {
        return numberFormat.format(price).replaceAll('٬', '.');
    };

    const showPrices = (discount, totalWithoutDiscount, finalTotal) => {
        document.getElementById('calculateShow').innerText =
            formatPrice(discount) + ' تومان';

        document.getElementById('totalShow').innerText =
            formatPrice(totalWithoutDiscount) + ' تومان';

        document.getElementById('cart-total').innerText =
            formatPrice(finalTotal) + ' تومان';
    };

    // تخفیف معمولی
    if (!isUserSpecificDiscount) {
        toggleDiscountAmount(true);

        document.querySelectorAll('input[data-unitDiscountPrice]').forEach(element => {
            const quantity = Number(element.value);

            calculateDiscount +=
                Number(element.dataset.unitdiscountprice) * quantity;

            totalPriceWidouthDiscount +=
                Number(element.dataset.unitpricewithoutdiscount) * quantity;

            totalPrice +=
                Number(element.dataset.unitprice) * quantity;
        });

        calculateDiscount /= 10;
        totalPrice /= 10;
        totalPriceWidouthDiscount /= 10;

        showPrices(
            calculateDiscount,
            totalPriceWidouthDiscount,
            totalPrice
        );

        return;
    }

    // تخفیف مخصوص کاربر
    let totalPriceWithoutDiscount = 0;

    document
        .querySelectorAll('input[data-unitpricewithoutdiscount]')
        .forEach(input => {
            totalPriceWithoutDiscount +=
                Number(input.dataset.unitpricewithoutdiscount) *
                Number(input.value);
        });

    const finalPrice = (totalPriceWithoutDiscount - value) / 10;

    if (finalPrice > 0) {
        toggleDiscountAmount(false);

        const discountAmount = value / 10;
        totalPriceWithoutDiscount /= 10;

        showPrices(
            discountAmount,
            totalPriceWithoutDiscount,
            finalPrice
        );
    }
}

        calculateDiscountFunc();



        function removeCartItem(btn) {

            const route = '{{ route('panel.cart.destroy', '__ID__') }}'.replace('__ID__', btn.dataset.value);
            const item = btn.closest('.cart-item');


            if (item) {
                sendAddToCartRequest({
                    cartItem: btn.dataset.value,
                    route,
                    method: "DELETE"
                }).then(result => {

                    const cartBadge = document.querySelector('#cart-count');




                    if (result.status) {


                        item.style.opacity = '0';
                        item.style.transform = 'translateX(-100%)';
                        setTimeout(() => {
                            item.remove();
                            updateCartTotal();
                            showToast('محصول از سبد حذف شد', 'info');
                            if (cartBadge) {
                                let count = parseInt(cartBadge.textContent) || 0;
                                count--
                                cartBadge.textContent = count;
                                cartBadge.style.display = 'flex';
                                document.querySelector('.text-muted-custom').innerText = count;
                            }
                            syncBottomCartBadge();
                            showToast(result?.message, 'success');
                            updateCartTotal();
                            calculateDiscountFunc()
                        }, 300);


                    }
                }).catch(result => {
                    showToast(result?.message, 'error');

                })

            }
        }

        function toggleDiscountAmount(bool = true) {
            if (bool) {
                document.querySelectorAll('.through-price').forEach(elem => {
                    elem.style.display = 'block'
                })


                document.querySelectorAll('span[data-unitpricewithoutdiscount]').forEach(elem => {
                    const price = elem.dataset.price / 10;
                    const priceString = numberFormat.format(price).replaceAll('٬', '.');
                    elem.innerText = priceString;
                })

            } else {
                document.querySelectorAll('.through-price').forEach(elem => {
                    elem.style.display = 'none'
                })
                document.querySelectorAll('span[data-unitpricewithoutdiscount]').forEach(elem => {
                    const price = elem.dataset.unitpricewithoutdiscount / 10;
                    const priceString = numberFormat.format(price).replaceAll('٬', '.');
                    elem.innerText = priceString;
                })
            }
        }
    </script>
@endsection
