@extends('admin.layout.master')

@section('content')
    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-6xl">


            <section class="list-hero animate-fade-up mb-6">
                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <span class="chip bg-brand-500/10 text-brand-300">
                            پیشنهاد فروش جدید
                        </span>

                        <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                            ایجاد کد تخفیف
                        </h2>

                        <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-400">
                            نوع تخفیف، محدودیت مبلغ سفارش و بازه زمانی اجرای کمپین را مشخص کنید.
                        </p>
                    </div>

                    <a
                        href="discounts-index.html"
                        class="rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-center text-sm text-slate-300"
                    >
                        ← بازگشت به تخفیف‌ها
                    </a>
                </div>
            </section>

            {{-- Form --}}
            <form id="discountForm" action="{{route('admin.discount.store')}}" method="POST" novalidate>
                @csrf
                <div class="grid gap-6 xl:grid-cols-[1fr_22rem]">

                    <div class="space-y-6">


                        <section class="form-section glass-card overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number">۰۱</div>

                                <div>
                                    <h3>مشخصات تخفیف</h3>
                                    <p>عنوان، نوع، مقدار و دامنه استفاده</p>
                                </div>
                            </div>

                            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">


                                <label class="field-group sm:col-span-2">
                                    <span class="field-label">
                                        عنوان تخفیف
                                        <span class="text-rose">*</span>
                                    </span>

                                    <span class="field-shell">
                                        <span class="mr-4 text-brand-400">٪</span>

                                        <input
                                            id="discountName"
                                            name="name"
                                            type="text"
                                            required
                                            maxlength="255"
                                            placeholder="مثلاً جشنواره خرید تابستانه"
                                        >
                                    </span>

                                    <small class="field-hint">
                                        این عنوان به‌عنوان شناسه نمایشی تخفیف استفاده می‌شود.
                                    </small>
                                </label>


                                <label class="field-group">
                                    <span class="field-label">
                                        نوع تخفیف
                                        <span class="text-rose">*</span>
                                    </span>

                                    <span class="native-select-shell">
                                        <span class="native-select-icon">◫</span>

                                        <select
                                            id="discountType"
                                            name="type"
                                            class="native-select"
                                            required
                                        >
                                            <option value="percentage">
                                                درصدی
                                            </option>

                                            <option value="fixed">
                                                مبلغ ثابت
                                            </option>
                                        </select>

                                        <span class="native-select-chevron">⌄</span>
                                    </span>
                                </label>


                                <label class="field-group">
                                    <span class="field-label">
                                        مقدار تخفیف
                                        <span class="text-rose">*</span>
                                    </span>

                                    <span class="field-shell">
                                        <input
                                            id="discountValue"
                                            name="value"
                                            type="number"
                                            min="0"
                                            max="100"
                                            step="0.001"
                                            required
                                            placeholder="0"
                                        >

                                        <span
                                            id="valueUnit"
                                            class="ml-4 whitespace-nowrap text-xs font-bold text-brand-300"
                                        >
                                            درصد
                                        </span>
                                    </span>

                                    <small id="valueHint" class="field-hint">
                                        عددی بین صفر تا صد وارد کنید.
                                    </small>
                                </label>

                                <label class="field-group">
                                    <span class="field-label">
                                        دامنه تخفیف
                                    </span>

                                    <span class="native-select-shell">
                                        <span class="native-select-icon">◎</span>

                                        <select
                                            id="discountScope"
                                            name="scope"
                                            class="native-select"
                                        >
                                            <option value="product">
                                                محصول
                                            </option>

                                            <option value="user">
                                                کاربر
                                            </option>
                                        </select>

                                        <span class="native-select-chevron">⌄</span>
                                    </span>

                                    <small class="field-hint">
                                        اتصال دقیق محصول یا کاربر در بک‌اند انجام می‌شود.
                                    </small>
                                </label>

                                <div class="field-group">
                                    <span class="field-label">
                                        وضعیت تخفیف
                                    </span>

                                    <label class="account-status">
                                        <span
                                            class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400"
                                        >

                                        </span>

                                        <span class="flex-1">
                                            <b>تخفیف فعال باشد</b>

                                            <small>
                                                در صورت معتبر بودن تاریخ‌ها قابل استفاده است
                                            </small>
                                        </span>

                                        <span class="relative">
                                            <input
                                                id="discountActive"
                                                name="is_active"
                                                type="checkbox"
                                                value="1"
                                                checked
                                                class="peer sr-only"
                                            >

                                            <span
                                                class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-brand-500"
                                            ></span>

                                            <span
                                                class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-3"
                                            ></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </section>

                        {{-- Order Amount --}}
                        <section class="form-section glass-card overflow-hidden p-0  hide under-discount">
                            <div class="section-heading">
                                <div class="section-number aqua">۰۲</div>

                                <div>
                                    <h3>محدودیت مبلغ سفارش</h3>
                                    <p>حداقل و حداکثر مبلغ مجاز برای اعمال تخفیف</p>
                                </div>
                            </div>

                            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">


                                <label class="field-group">
                                    <span class="field-label">
                                        حداقل مبلغ سفارش
                                    </span>

                                    <span class="field-shell">
                                        <input
                                            id="minOrder"
                                            name="min_order_amount"
                                            type="number"
                                            min="0"
                                            step="0.001"
                                            placeholder="مثلاً 1000000"
                                        >

                                        <span class="ml-4 text-xs text-slate-500">
                                            تومان
                                        </span>
                                    </span>

                                    <small class="field-hint">
                                        خالی بماند یعنی بدون حداقل خرید.
                                    </small>
                                </label>

                                {{-- Maximum --}}
                                <label class="field-group">
                                    <span class="field-label">
                                        حداکثر مبلغ سفارش
                                    </span>

                                    <span class="field-shell">
                                        <input
                                            id="maxOrder"
                                            name="max_order_amount"
                                            type="number"
                                            min="0"
                                            step="0.001"
                                            placeholder="مثلاً 20000000"
                                        >

                                        <span class="ml-4 text-xs text-slate-500">
                                            تومان
                                        </span>
                                    </span>

                                    <small class="field-hint">
                                        خالی بماند یعنی بدون سقف مبلغ سفارش.
                                    </small>
                                </label>

                                <p
                                    id="amountError"
                                    class="hidden text-xs font-semibold text-rose sm:col-span-2"
                                >
                                    حداکثر مبلغ سفارش باید از حداقل مبلغ بیشتر باشد.
                                </p>
                            </div>
                        </section>

                        <section class="form-section glass-card overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number amber">۰۳</div>

                                <div>
                                    <h3>زمان‌بندی کمپین</h3>
                                    <p>شروع و پایان استفاده از تخفیف</p>
                                </div>
                            </div>

                            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">

                                {{-- Start --}}
                                <label class="field-group">
                                    <span class="field-label">
                                        زمان شروع
                                    </span>

                                    <span class="field-shell">
                                        <input
                                            id="startsAt"
                                            type="text"
                                        >
                                             <input
                                                 id="start-discount"
                                                 name="starts_at"
                                                 type="hidden"
                                                 class="text-left"
                                             >
                                    </span>

                                    <small class="field-hint">
                                        خالی بماند یعنی شروع بلافاصله.
                                    </small>
                                </label>

                                {{-- Expiration --}}
                                <label class="field-group">
                                    <span class="field-label">
                                        زمان پایان
                                    </span>

                                    <span class="field-shell">
                                        <input
                                            id="expiresAt"
                                            type="text"
                                        >
                                        <input
                                            id="end-discount"
                                            name="expires_at"
                                            type="hidden"
                                        >
                                    </span>

                                    <small class="field-hint">
                                        خالی بماند یعنی بدون تاریخ انقضا.
                                    </small>
                                </label>

                                <p
                                    id="dateError"
                                    class="hidden text-xs font-semibold text-rose sm:col-span-2"
                                >
                                    زمان پایان باید بعد از زمان شروع باشد.
                                </p>
                            </div>
                        </section>
                    </div>

                    <aside
                        class="glass-card h-fit overflow-hidden p-0 xl:sticky xl:top-24"
                    >
                        <div class="section-heading">
                            <div>
                                <h3>پیش‌نمایش تخفیف</h3>
                                <p>خلاصه تنظیمات قبل از ثبت</p>
                            </div>
                        </div>

                        <div class="p-6">
                            <div
                                class="rounded-2xl border border-brand-500/20 bg-gradient-to-br from-brand-500/15 to-aqua-500/[0.06] p-5"
                            >
                                <div class="flex items-start justify-between gap-3">
                                    <span
                                        id="previewScope"
                                        class="chip bg-aqua-500/10 text-aqua-300"
                                    >
                                        برای محصولات
                                    </span>

                                    <span
                                        id="previewStatus"
                                        class="chip bg-brand-500/10 text-brand-300"
                                    >
                                        <span class="status-dot bg-brand-400"></span>
                                        فعال
                                    </span>
                                </div>

                                <h3
                                    id="previewName"
                                    class="mt-6 text-lg font-extrabold text-white"
                                >
                                    عنوان تخفیف
                                </h3>

                                <div class="mt-3 flex items-end gap-2">
                                    <strong
                                        id="previewValue"
                                        class="text-4xl font-black text-gradient"
                                    >
                                        ۰٪
                                    </strong>

                                    <span class="pb-1 text-xs text-slate-500">
                                        تخفیف
                                    </span>
                                </div>

                                <div
                                    class="mt-6 space-y-3 border-t border-white/[0.07] pt-5 text-xs"
                                >
                                    <div class="preview-row">
                                        <span>حداقل سفارش</span>
                                        <b id="previewMin">بدون محدودیت</b>
                                    </div>

                                    <div class="preview-row">
                                        <span>حداکثر سفارش</span>
                                        <b id="previewMax">بدون محدودیت</b>
                                    </div>


                                </div>
                            </div>

                            <div
                                class="mt-4 rounded-xl border border-amberx/20 bg-amberx/10 p-3 text-[10px] leading-5 text-amberx"
                            >
                                Migration فعلی فیلد مستقلی با نام code ندارد؛
                                در این طرح فیلد name نقش عنوان/شناسه تخفیف را دارد.
                            </div>
                        </div>
                    </aside>
                </div>

                <div
                    class="mt-6 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 sm:flex-row sm:justify-end"
                >


                    <button
                        type="submit"
                        class="rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow"
                    >
                        ثبت تخفیف ←
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('script')

    <script>
        $('#startsAt').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#start-discount'
        });
        $('#expiresAt').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#end-discount'
        });
    </script>
    <script>
        const form = document.getElementById('discountForm');

        const fields = {
            name: document.getElementById('discountName'),
            type: document.getElementById('discountType'),
            value: document.getElementById('discountValue'),
            scope: document.getElementById('discountScope'),
            active: document.getElementById('discountActive'),
            min: document.getElementById('minOrder'),
            max: document.getElementById('maxOrder'),
            starts: document.getElementById('startsAt'),
            expires: document.getElementById('expiresAt'),
        };

        const preview = {
            name: document.getElementById('previewName'),
            value: document.getElementById('previewValue'),
            scope: document.getElementById('previewScope'),
            status: document.getElementById('previewStatus'),
            min: document.getElementById('previewMin'),
            max: document.getElementById('previewMax'),
            date: document.getElementById('previewDate'),
        };

        const amountError = document.getElementById('amountError');
        const dateError = document.getElementById('dateError');
        const valueUnit = document.getElementById('valueUnit');
        const valueHint = document.getElementById('valueHint');

        const faNumber = (value) => {
            return Number(value).toLocaleString('fa-IR', {
                maximumFractionDigits: 3,
            });
        };


        function validateRanges() {
            const invalidAmount =
                fields.min.value &&
                fields.max.value &&
                Number(fields.max.value) < Number(fields.min.value);

            const invalidDate =
                fields.starts.value &&
                fields.expires.value &&
                new Date(fields.expires.value) <= new Date(fields.starts.value);

            amountError.classList.toggle('hidden', !invalidAmount);
            dateError.classList.toggle('hidden', !invalidDate);

            fields.max.setCustomValidity(
                invalidAmount
                    ? 'حداکثر مبلغ باید از حداقل بیشتر باشد.'
                    : ''
            );

            fields.expires.setCustomValidity(
                invalidDate
                    ? 'زمان پایان باید بعد از زمان شروع باشد.'
                    : ''
            );

            return !invalidAmount && !invalidDate;
        }

        function updateDiscountType() {
            const isPercentage = fields.type.value === 'percentage';

            valueUnit.textContent = isPercentage ? 'درصد' : 'تومان';

            valueHint.textContent = isPercentage
                ? 'عددی بین صفر تا صد وارد کنید.'
                : 'مبلغ ثابت تخفیف را به تومان وارد کنید.';

            if (isPercentage) {
                fields.value.setAttribute('max', '100');
            } else {
                fields.value.removeAttribute('max');
            }
        }

        function updatePreview() {
            const isPercentage = fields.type.value === 'percentage';

            updateDiscountType();

            preview.name.textContent =
                fields.name.value || 'عنوان تخفیف';

            preview.value.textContent = isPercentage
                ? `${faNumber(fields.value.value || 0)}٪`
                : `${faNumber(fields.value.value || 0)} تومان`;

            preview.scope.textContent =
                fields.scope.value === 'product'
                    ? 'برای محصولات'
                    : 'برای کاربران';

            preview.min.textContent = fields.min.value
                ? `${faNumber(fields.min.value)} تومان`
                : 'بدون محدودیت';

            preview.max.textContent = fields.max.value
                ? `${faNumber(fields.max.value)} تومان`
                : 'بدون محدودیت';



            updateStatus();

            validateRanges();
        }

        function updateStatus() {
            const isActive = fields.active.checked;

            preview.status.innerHTML = isActive
                ? '<span class="status-dot bg-brand-400"></span>فعال'
                : '<span class="status-dot bg-slate-500"></span>غیرفعال';

            preview.status.className = `
                chip
                ${isActive
                ? 'bg-brand-500/10 text-brand-300'
                : 'bg-white/5 text-slate-400'}
            `;
        }

        Object.values(fields).forEach((field) => {
            field.addEventListener('input', updatePreview);
            field.addEventListener('change', updatePreview);
        });

        form.addEventListener('reset', () => {
            setTimeout(updatePreview, 0);
        });



        updatePreview();
    </script>
@endsection
