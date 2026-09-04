@extends('admin.layout.master')

@section('content')

    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <section
                class="relative mb-6 overflow-hidden rounded-3xl border border-brand-500/20 bg-gradient-to-l from-brand-500/[0.13] via-ink-850/80 to-aqua-500/[0.08] p-6 animate-fade-up sm:p-8">
                <div class="absolute -left-16 -top-20 h-56 w-56 rounded-full bg-aqua-500/10 blur-3xl"></div>
                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div><span class="chip bg-brand-500/10 text-brand-300">مدیریت مستقل</span>
                        <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">تنوع‌های محصول</h2>
                        <p class="mt-2 max-w-2xl text-sm leading-7 text-slate-400">محصول را انتخاب کنید، مدل‌های آن را
                            بسازید و قیمت و موجودی هر مدل را جداگانه ثبت کنید.</p></div>
                    <a href="products-index.html"
                       class="inline-flex w-fit items-center rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300">←
                        فهرست محصولات</a></div>
            </section>

            <form id="variantForm" action="{{route('admin.product.variant.store',$product)}}" method="post" novalidate="" class="space-y-5">
                @csrf
                <section class="form-section glass-card animate-fade-up stagger-1 overflow-hidden p-0">
                    <div class="section-heading">
                        <div class="section-number">
                            ۰۱
                        </div>
                        <div>
                            <h3>انتخاب محصول</h3>
                            <p>تنوع‌ها برای محصول انتخاب‌شده ذخیره می‌شوند</p>
                        </div>
                        <span class="mr-auto chip bg-brand-500/10 text-brand-300">الزامی</span>
                    </div>
                    <div class="grid gap-5 p-5 sm:p-7 ">

                        <div class="flex items-center gap-4 rounded-2xl border border-white/[0.07] bg-ink-800/50 p-4">
                            <span id="productIcon"
                                  class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-brand-500/10 text-2xl">
                                <img class="w-full h-full rounded-2xl p-1 object-cover" src="{{asset($product->image)}}"
                                     alt="{{$product->name}}">
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="text-[10px] text-slate-600">محصول انتخاب‌شده</p>
                                <b id="selectedProductName"
                                   class="mt-1 block truncate text-sm text-white">{{$product->name}}</b>
                            </div>
                            {{--todo insert model product --}}
                            <span id="selectedVariantCount" class="chip bg-aqua-500/10 text-aqua-300">۴ مدل</span>
                        </div>
                    </div>
                </section>

                <section class="form-section glass-card animate-fade-up stagger-2 overflow-hidden p-0">
                    <div class="section-heading">
                        <div class="section-number aqua">۰۲</div>
                        <div>
                            <h3>ویژگی‌های مدل</h3>
                            <p>مقدارهای موردنظر را انتخاب کنید</p>
                        </div>
                        <span class="mr-auto chip bg-aqua-500/10 text-aqua-300">ساخت خودکار</span>
                    </div>
                    <div class="p-5 sm:p-7">
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-[1fr_auto]">
                            <label class="field-group">
                                <span class="field-label">افزودن ویژگی</span>
                                <span class="native-select-shell">
                                    <span class="native-select-icon">◇</span>
                                    <select id="variantAttributeSelect" class="native-select">
                                            @foreach($attributes as $attribute)
                                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="native-select-chevron">⌄</span>
                                </span>
                            </label>
                            <button id="addVariantAttribute" type="button"
                                    class="mt-auto rounded-xl bg-brand-500 px-5 py-3 text-xs font-extrabold text-ink-950 shadow-glow hover:bg-brand-400">
                                + افزودن
                            </button>
                        </div>
                        <div id="attributeConfigs" class="mt-4 grid gap-3 lg:grid-cols-2">
                        </div>
                    </div>
                </section>

                <section class="form-section glass-card animate-fade-up stagger-3 overflow-hidden p-0">
                    <div class="section-heading">
                        <div class="section-number amber">۰۳</div>
                        <div>
                            <h3>قیمت و موجودی مدل‌ها</h3>
                            <p>هر ردیف یک مدل مستقل از محصول است</p>
                        </div>
                        <span id="headerVariantCount" class="mr-auto chip bg-amberx/10 text-amberx">۴ مدل</span>
                    </div>
                    <div id="bulkTools" class="border-b border-white/[0.06] p-4 sm:px-7">
                        <div class="mb-3"><b class="text-xs text-slate-300">ثبت یکسان برای همه</b>
                            <p class="mt-1 text-[10px] text-slate-600">اگر قیمت یا موجودی مدل‌ها یکسان است، از این بخش
                                استفاده کنید.</p>
                        </div>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="bulk-field">
                                <input id="bulkPrice" type="number" min="0" step="0.001" dir="ltr"
                                       placeholder="قیمت همه مدل‌ها">
                                <button type="button" data-bulk="price">اعمال</button>
                            </div>
                            <div class="bulk-field">
                                <input id="bulkStock" type="number" min="0" dir="ltr" placeholder="موجودی همه مدل‌ها">
                                <button type="button" data-bulk="stock">اعمال</button>
                            </div>
                        </div>
                    </div>
                    <div id="variantEmpty" class="px-6 py-12 text-center hidden">
                        <div
                            class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-white/[0.04] text-2xl text-slate-600">
                            ＋
                        </div>
                        <p class="mt-4 text-sm font-bold text-slate-300">حداقل یک مقدار ویژگی انتخاب کنید</p>
                    </div>
                    <div id="variantTableWrap" class="overflow-x-auto">
                        <table class="data-table min-w-[56rem]">
                            <thead>
                            <tr>
                                <th>مدل محصول</th>
                                <th>شناسه SKU</th>
                                <th>قیمت</th>
                                <th>موجودی</th>
                                <th>فعال</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="variantTableBody">


                            </tbody>
                        </table>
                    </div>
                </section>

                <div
                    class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-[11px] text-slate-500">ویژگی‌ها و تنوع‌ها جدا از اطلاعات اصلی محصول ذخیره
                        می‌شوند.</p>
                    <div class="flex gap-3">
                        <button type="submit"
                                class="flex-1 rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow sm:flex-none">
                            ذخیره تنوع‌ها ←
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('script')

    <script>
        const definitions = @json($attributeWithAttributesValue);

        console.log(definitions);

        const configs = document.getElementById('attributeConfigs');
        const body = document.getElementById('variantTableBody');

        const toFa = value =>
            String(value).replace(/\d/g, digit => '۰۱۲۳۴۵۶۷۸۹'[digit]);

        const escapeHtml = value =>
            String(value).replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);


        /*
        |--------------------------------------------------------------------------
        | افزودن ویژگی
        |--------------------------------------------------------------------------
        */

        function addAttribute(id) {

            const item = definitions[id];

            if (!item) return;

            // اگر قبلاً اضافه شده، دوباره اضافه نشود
            if (configs.querySelector(`[data-attribute-id="${id}"]`)) {
                return;
            }

            const values = item.values.map(value => {

                return `
                <label class="attribute-value-choice">

                    <input
                        type="checkbox"
                        value="${value.id}"
                        data-label="${escapeHtml(value.label)}"
                        data-code="${escapeHtml(value.code)}"
                    >

                    <span>
                        ${
                    item.type === 'color'
                        ? `<i
                                    class="attribute-color-dot"
                                    style="background:${value.value}"
                                   ></i>`
                        : ''
                }

                        ${escapeHtml(value.label)}
                    </span>

                </label>
            `;

            }).join('');


            configs.insertAdjacentHTML(
                'beforeend',

                `
            <div
                class="attribute-config"
                data-attribute-id="${item.id}"
                data-attribute-name="${escapeHtml(item.name)}"
            >

                <div class="attribute-config-head">

                    <div>
                        <b class="block text-xs text-white">
                            ${escapeHtml(item.name)}
                        </b>

                        <small class="text-[9px] text-slate-600">
                            مقدارهای قابل فروش را انتخاب کنید
                        </small>
                    </div>

                    <button
                        type="button"
                        class="remove-attribute rounded-lg px-2 py-1 text-xs text-rose hover:bg-rose/10"
                    >
                        حذف
                    </button>

                </div>

                <div class="attribute-values">
                    ${values}
                </div>

            </div>
            `
            );


            // غیرفعال کردن گزینه انتخاب شده
            const option = document.querySelector(
                `#variantAttributeSelect option[value="${id}"]`
            );

            if (option) {

                option.disabled = true;

                const next = Array
                    .from(option.parentElement.options)
                    .find(entry => !entry.disabled);

                if (next) {
                    option.parentElement.value = next.value;
                }
            }


            generateVariants();
        }


        /*
        |--------------------------------------------------------------------------
        | گرفتن ویژگی‌ها و مقدارهای انتخاب شده
        |--------------------------------------------------------------------------
        */

        function groups() {

            return Array
                .from(configs.querySelectorAll('.attribute-config'))
                .map(config => ({

                    id: Number(config.dataset.attributeId),

                    name: config.dataset.attributeName,

                    values: Array
                        .from(config.querySelectorAll('input:checked'))
                        .map(input => ({

                            id: Number(input.value),

                            label: input.dataset.label,

                            code: input.dataset.code

                        }))

                }));
        }


        /*
        |--------------------------------------------------------------------------
        | نگهداری اطلاعات فعلی مدل
        |--------------------------------------------------------------------------
        */

        function currentVariant() {

            const row = body.querySelector('[data-variant-row]');

            if (!row) {
                return {};
            }

            return {

                sku: row.querySelector('.variant-sku')?.value || '',

                price: row.querySelector('.variant-price')?.value || '',

                stock: row.querySelector('.variant-stock')?.value || '0',

                active: row.querySelector('.variant-active')?.checked ?? true

            };
        }


        /*
        |--------------------------------------------------------------------------
        | ساخت مدل
        |
        | مهم:
        | تمام ویژگی‌ها و تمام مقدارهای انتخاب شده
        | داخل یک tr قرار می‌گیرند.
        |--------------------------------------------------------------------------
        */

        function generateVariants() {

            const previous = currentVariant();

            const selected = groups();


            /*
            |--------------------------------------------------------------------------
            | اگر یک ویژگی داشته باشیم که هیچ مقداری انتخاب نشده
            |--------------------------------------------------------------------------
            */

            const hasEmptyGroup =
                selected.some(group => group.values.length === 0);


            /*
            |--------------------------------------------------------------------------
            | تمام مقدارهای انتخاب شده را یکی می‌کنیم
            |--------------------------------------------------------------------------
            */

            const values = selected.flatMap(group =>

                group.values.map(value => ({

                    attributeId: group.id,

                    attributeName: group.name,

                    ...value

                }))

            );


            /*
            |--------------------------------------------------------------------------
            | اگر ویژگی داریم ولی یکی از آنها مقدار ندارد
            |--------------------------------------------------------------------------
            */

            if (hasEmptyGroup) {

                body.innerHTML = '';

                document
                    .getElementById('variantEmpty')
                    .classList.remove('hidden');

                document
                    .getElementById('variantTableWrap')
                    .classList.add('hidden');

                document
                    .getElementById('bulkTools')
                    .classList.add('hidden');

                document
                    .getElementById('matrixNotice')
                    .textContent =
                    'برای هر ویژگی حداقل یک مقدار انتخاب کنید.';

                updateSummary();

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | ساخت کلید مدل
            |--------------------------------------------------------------------------
            */

            const key = values
                .map(item => `${item.attributeId}:${item.id}`)
                .join('|') || 'simple';


            /*
            |--------------------------------------------------------------------------
            | SKU پیش فرض
            |--------------------------------------------------------------------------
            */

            const sku =
                previous.sku ||
                values
                    .map(item => item.code)
                    .filter(Boolean)
                    .join('-');


            /*
            |--------------------------------------------------------------------------
            | نمایش Chip ها
            |--------------------------------------------------------------------------
            */

            const labels = values.length

                ? values
                    .map(item => `
                    <span
                        class="chip ${
                        item.attributeName === 'رنگ'
                            ? 'bg-aqua-500/10 text-aqua-300'
                            : 'bg-brand-500/10 text-brand-300'
                    }"
                    >
                        ${escapeHtml(item.attributeName)}:
                        ${escapeHtml(item.label)}
                    </span>
                `)
                    .join('')

                : `
                <span class="chip bg-white/5 text-slate-400">
                    محصول ساده
                </span>
            `;


            /*
            |--------------------------------------------------------------------------
            | hidden inputs
            |--------------------------------------------------------------------------
            |
            | همه attribute ها داخل همان variants[0]
            |--------------------------------------------------------------------------
            */

            const hidden = values
                .map((item, attrIndex) => `

                <input
                    type="hidden"
                    name="variants[0][attributes][${attrIndex}][attribute_id]"
                    value="${item.attributeId}"
                >

                <input
                    type="hidden"
                    name="variants[0][attributes][${attrIndex}][attribute_value_id]"
                    value="${item.id}"
                >

            `)
                .join('');


            /*
            |--------------------------------------------------------------------------
            | فقط یک TR
            |--------------------------------------------------------------------------
            */

            body.innerHTML = `

            <tr
                data-variant-row
                data-key="${escapeHtml(key)}"
            >

                <!-- ویژگی‌ها -->
                <td>

                    <div class="flex flex-wrap gap-1.5">

                        ${labels}

                    </div>

                    ${hidden}

                </td>


                <!-- SKU -->
                <td>

                    <input
                        name="variants[0][sku]"
                        value="${escapeHtml(sku)}"
                        required
                        dir="ltr"
                        class="variant-table-input variant-sku min-w-36 text-left"
                    >

                </td>


                <!-- قیمت -->
                <td>

                    <input
                        name="variants[0][price]"
                        value="${escapeHtml(previous.price)}"
                        required
                        type="number"
                        min="0"
                        step="0.001"
                        dir="ltr"
                        placeholder="0.000"
                        class="variant-table-input variant-price min-w-32 text-left"
                    >

                </td>


                <!-- موجودی -->
                <td>

                    <input
                        name="variants[0][stock]"
                        value="${escapeHtml(previous.stock ?? '0')}"
                        type="number"
                        min="0"
                        dir="ltr"
                        class="variant-table-input variant-stock min-w-24 text-left"
                    >

                </td>


                <!-- وضعیت -->
                <td>

                    <label class="flex cursor-pointer items-center gap-2">

                        <span class="relative">

                            <input
                                name="variants[0][is_active]"
                                type="checkbox"
                                value="1"
                                ${
                previous.active === false
                    ? ''
                    : 'checked'
            }
                                class="variant-active peer sr-only"
                            >

                            <span
                                class="block h-5 w-9 rounded-full bg-ink-600 peer-checked:bg-brand-500"
                            ></span>

                            <span
                                class="absolute right-1 top-1 h-3 w-3 rounded-full bg-white transition-transform peer-checked:-translate-x-3"
                            ></span>

                        </span>

                    </label>

                </td>


                <!-- حذف -->
                <td>

                    <button
                        type="button"
                        class="remove-variant table-action delete"
                    >
                        ⌫
                    </button>

                </td>

            </tr>
        `;


            /*
            |--------------------------------------------------------------------------
            | نمایش جدول
            |--------------------------------------------------------------------------
            */

            document
                .getElementById('variantEmpty')
                .classList.toggle('hidden', values.length > 0);


            document
                .getElementById('variantTableWrap')
                .classList.toggle('hidden', values.length === 0);


            document
                .getElementById('bulkTools')
                .classList.toggle('hidden', values.length === 0);


            document
                .getElementById('matrixNotice')
                .textContent =
                values.length
                    ? 'مدل آماده شد؛ تمام ویژگی‌های انتخاب شده در همین مدل قرار گرفتند.'
                    : 'برای ایجاد مدل، ویژگی و مقدارهای آن را انتخاب کنید.';


            updateSummary();
        }


        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        function updateSummary() {

            const rows = Array.from(
                body.querySelectorAll('[data-variant-row]')
            );


            const stock = rows.reduce(
                (sum, row) =>
                    sum +
                    (Number(
                        row.querySelector('.variant-stock')?.value
                    ) || 0),
                0
            );


            const prices = rows
                .map(row =>
                    Number(
                        row.querySelector('.variant-price')?.value
                    )
                )
                .filter(
                    value =>
                        Number.isFinite(value) &&
                        value > 0
                );


            const count =
                `${toFa(rows.length)} مدل`;


            document
                .getElementById('variantCount')
                .textContent =
                toFa(rows.length);


            document
                .getElementById('totalStock')
                .textContent =
                `${stock.toLocaleString('fa-IR')} عدد`;


            document
                .getElementById('minimumPrice')
                .textContent =
                prices.length
                    ? `${Math.min(...prices).toLocaleString('fa-IR')} تومان`
                    : '—';


            document
                .getElementById('headerVariantCount')
                .textContent =
                count;


            document
                .getElementById('selectedVariantCount')
                .textContent =
                count;
        }


        /*
        |--------------------------------------------------------------------------
        | افزودن ویژگی
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('addVariantAttribute')
            .addEventListener('click', () => {

                const select =
                    document.getElementById(
                        'variantAttributeSelect'
                    );

                addAttribute(
                    Number(select.value)
                );

            });


        /*
        |--------------------------------------------------------------------------
        | تغییر checkbox های ویژگی
        |--------------------------------------------------------------------------
        */

        configs.addEventListener(
            'change',
            event => {

                if (
                    event.target.matches(
                        '.attribute-value-choice input'
                    )
                ) {

                    generateVariants();

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | حذف ویژگی
        |--------------------------------------------------------------------------
        */

        configs.addEventListener(
            'click',
            event => {

                const button =
                    event.target.closest(
                        '.remove-attribute'
                    );

                if (!button) return;


                const config =
                    button.closest(
                        '.attribute-config'
                    );


                const attributeId =
                    config.dataset.attributeId;


                const option =
                    document.querySelector(
                        `#variantAttributeSelect option[value="${attributeId}"]`
                    );


                if (option) {
                    option.disabled = false;
                }


                config.remove();


                generateVariants();

            }
        );


        /*
        |--------------------------------------------------------------------------
        | تغییر قیمت / موجودی
        |--------------------------------------------------------------------------
        */

        body.addEventListener(
            'input',
            updateSummary
        );


        body.addEventListener(
            'change',
            updateSummary
        );


        /*
        |--------------------------------------------------------------------------
        | حذف مدل
        |--------------------------------------------------------------------------
        */

        body.addEventListener(
            'click',
            event => {

                const button =
                    event.target.closest(
                        '.remove-variant'
                    );

                if (!button) return;


                const row =
                    button.closest(
                        '[data-variant-row]'
                    );


                row.remove();


                updateSummary();

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Bulk Price / Stock
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('[data-bulk]')
            .forEach(button => {

                button.addEventListener(
                    'click',
                    () => {

                        const type =
                            button.dataset.bulk;


                        const input =
                            document.getElementById(
                                type === 'price'
                                    ? 'bulkPrice'
                                    : 'bulkStock'
                            );


                        if (!input.value) return;


                        body
                            .querySelectorAll(
                                type === 'price'
                                    ? '.variant-price'
                                    : '.variant-stock'
                            )
                            .forEach(field => {

                                field.value =
                                    input.value;

                            });


                        updateSummary();

                    }
                );

            });


        /*
        |--------------------------------------------------------------------------
        | حالت اولیه
        |--------------------------------------------------------------------------
        */

        generateVariants();

    </script>
@endsection
