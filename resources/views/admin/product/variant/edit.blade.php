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

            <form id="variantForm" action="{{route('admin.product.variant.updateVariant',[$product,$productVariant])}}" method="post"
                  novalidate="" class="space-y-5">
                @csrf
                @method('PUT')
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
                            <span id="selectedVariantCount"
                                  class="chip bg-aqua-500/10 text-aqua-300">{{$productVariant->variantAttributes->count()}}</span>
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

        const configs = document.getElementById('attributeConfigs');
        const body = document.getElementById('variantTableBody');

        const select = document.getElementById('variantAttributeSelect');
        const addButton = document.getElementById('addVariantAttribute');

        const variantEmpty = document.getElementById('variantEmpty');
        const variantTableWrap = document.getElementById('variantTableWrap');
        const bulkTools = document.getElementById('bulkTools');

        /*
        |--------------------------------------------------------------------------
        | Helpers
        |--------------------------------------------------------------------------
        */

        const toFa = value =>
            String(value).replace(
                /\d/g,
                digit => '۰۱۲۳۴۵۶۷۸۹'[digit]
            );


        const escapeHtml = value =>
            String(value ?? '').replace(
                /[&<>"']/g,
                char => ({
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                })[char]
            );


        /*
        |--------------------------------------------------------------------------
        | Add Attribute
        |--------------------------------------------------------------------------
        */

        function addAttribute(id, checkedCount = 0) {

            const item = definitions[id];

            if (!item) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | جلوگیری از اضافه شدن Attribute تکراری
            |--------------------------------------------------------------------------
            */

            const alreadyExists = configs.querySelector(
                `[data-attribute-id="${id}"]`
            );

            if (alreadyExists) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | ساخت Value های Attribute
            |--------------------------------------------------------------------------
            */

            const values = item.values.map((value, index) => {

                const checked =
                    index < checkedCount
                        ? 'checked'
                        : '';


                const colorDot =
                    item.type === 'color'
                        ? `
                        <i
                            class="attribute-color-dot"
                            style="background:${escapeHtml(value.value)}"
                        ></i>
                    `
                        : '';


                return `
                <label class="attribute-value-choice">

                    <input
                        type="checkbox"
                        value="${value.id}"
                        data-label="${escapeHtml(value.label)}"
                        data-code="${escapeHtml(value.code ?? '')}"
                        ${checked}
                    >

                    <span>
                        ${colorDot}
                        ${escapeHtml(value.label)}
                    </span>

                </label>
            `;

            }).join('');


            /*
            |--------------------------------------------------------------------------
            | ساخت Attribute
            |--------------------------------------------------------------------------
            */

            const html = `
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
        `;


            configs.insertAdjacentHTML(
                'beforeend',
                html
            );


            /*
            |--------------------------------------------------------------------------
            | Disable کردن Attribute انتخاب شده
            |--------------------------------------------------------------------------
            */

            const option = select.querySelector(
                `option[value="${id}"]`
            );

            if (option) {
                option.disabled = true;
            }


            /*
            |--------------------------------------------------------------------------
            | انتخاب اولین Attribute آزاد
            |--------------------------------------------------------------------------
            */

            const next = Array.from(
                select.options
            ).find(option => !option.disabled);

            if (next) {
                select.value = next.value;
            }


            generateVariants();
        }


        /*
        |--------------------------------------------------------------------------
        | گرفتن Attribute های انتخاب شده
        |--------------------------------------------------------------------------
        */

        function groups() {

            return Array.from(
                configs.querySelectorAll('.attribute-config')
            ).map(config => {

                const values = Array.from(
                    config.querySelectorAll(
                        'input[type="checkbox"]:checked'
                    )
                ).map(input => {

                    return {
                        id: Number(input.value),
                        label: input.dataset.label,
                        code: input.dataset.code
                    };

                });


                return {

                    id: Number(
                        config.dataset.attributeId
                    ),

                    name:
                    config.dataset.attributeName,

                    values

                };

            });
        }


        /*
        |--------------------------------------------------------------------------
        | گرفتن اطلاعات Variant فعلی
        |--------------------------------------------------------------------------
        */

        function currentVariant() {

            const row =
                body.querySelector(
                    '[data-variant-row]'
                );


            if (!row) {
                return {};
            }


            return {

                sku:
                    row.querySelector(
                        '.variant-sku'
                    )?.value ?? '',


                price:
                    row.querySelector(
                        '.variant-price'
                    )?.value ?? '',


                stock:
                    row.querySelector(
                        '.variant-stock'
                    )?.value ?? '0',


                active:
                    row.querySelector(
                        '.variant-active'
                    )?.checked ?? true

            };
        }


        /*
        |--------------------------------------------------------------------------
        | نمایش جدول
        |--------------------------------------------------------------------------
        */

        function showVariantTable() {

            variantEmpty.classList.add(
                'hidden'
            );

            variantTableWrap.classList.remove(
                'hidden'
            );

            bulkTools.classList.remove(
                'hidden'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | مخفی کردن جدول
        |--------------------------------------------------------------------------
        */

        function showEmptyVariantTable() {

            variantEmpty.classList.remove(
                'hidden'
            );

            variantTableWrap.classList.add(
                'hidden'
            );

            bulkTools.classList.add(
                'hidden'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | ساخت Variant
        |--------------------------------------------------------------------------
        |
        | نکته مهم:
        |
        | اینجا دیگر combinations نداریم.
        |
        | تمام Attribute Value های انتخاب شده
        | متعلق به یک Variant هستند.
        |
        */

        function generateVariants() {

            /*
            |--------------------------------------------------------------------------
            | اطلاعات قبلی Variant
            |--------------------------------------------------------------------------
            */

            const previous =
                currentVariant();


            /*
            |--------------------------------------------------------------------------
            | Attribute ها
            |--------------------------------------------------------------------------
            */

            const selected =
                groups();


            /*
            |--------------------------------------------------------------------------
            | اگر هیچ Attribute نداریم
            |--------------------------------------------------------------------------
            */

            if (selected.length === 0) {

                body.innerHTML = `

                <tr
                    data-variant-row
                    data-key="simple"
                >

                    <td>

                        <div class="flex flex-wrap gap-1.5">

                            <span class="chip bg-white/5 text-slate-400">
                                محصول ساده
                            </span>

                        </div>

                    </td>


                    <td>

                        <input
                            name="variants[0][sku]"
                            value="${escapeHtml(previous.sku ?? '')}"
                            required
                            dir="ltr"
                            class="variant-table-input variant-sku min-w-36 text-left"
                        >

                    </td>


                    <td>

                        <input
                            name="variants[0][price]"
                            value="${escapeHtml(previous.price ?? '')}"
                            required
                            type="number"
                            min="0"
                            step="0.001"
                            dir="ltr"
                            placeholder="0.000"
                            class="variant-table-input variant-price min-w-32 text-left"
                        >

                    </td>


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


                    <td>

                        <label
                            class="flex cursor-pointer items-center gap-2"
                        >

                            <span class="relative">

                                <input
                                    name="variants[0][is_active]"
                                    type="checkbox"
                                    value="1"
                                    ${previous.active === false ? '' : 'checked'}
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


                showVariantTable();

                updateSummary();

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | بررسی اینکه آیا Attribute ای Value ندارد
            |--------------------------------------------------------------------------
            */

            const hasEmptyGroup =
                selected.some(
                    group =>
                        group.values.length === 0
                );


            if (hasEmptyGroup) {

                body.innerHTML = '';

                showEmptyVariantTable();

                updateSummary();

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | تمام Value های انتخاب شده
            |--------------------------------------------------------------------------
            */

            const allValues =
                selected.flatMap(
                    group =>
                        group.values.map(
                            value => ({

                                attributeId:
                                group.id,

                                attributeName:
                                group.name,

                                id:
                                value.id,

                                label:
                                value.label,

                                code:
                                value.code

                            })
                        )
                );


            /*
            |--------------------------------------------------------------------------
            | ساخت Key
            |--------------------------------------------------------------------------
            */

            const key =
                allValues
                    .map(
                        item =>
                            `${item.attributeId}:${item.id}`
                    )
                    .join('|');


            /*
            |--------------------------------------------------------------------------
            | SKU
            |--------------------------------------------------------------------------
            */

            const generatedSku =
                allValues
                    .map(
                        item => item.code
                    )
                    .filter(Boolean)
                    .join('-');


            const sku =
                previous.sku ||
                generatedSku;


            /*
            |--------------------------------------------------------------------------
            | نمایش Value ها
            |--------------------------------------------------------------------------
            */

            const labels =
                allValues
                    .map(item => {

                        const className =
                            item.attributeName === 'رنگ'
                                ? 'bg-aqua-500/10 text-aqua-300'
                                : 'bg-brand-500/10 text-brand-300';


                        return `

                        <span
                            class="chip ${className}"
                        >
                            ${escapeHtml(item.label)}
                        </span>

                    `;

                    })
                    .join('');


            /*
            |--------------------------------------------------------------------------
            | Hidden Inputs
            |--------------------------------------------------------------------------
            */

            const hiddenAttributes =
                allValues
                    .map(
                        (item, index) => {

                            return `

                            <input
                                type="hidden"
                                name="variants[0][attributes][${index}][attribute_id]"
                                value="${item.attributeId}"
                            >

                            <input
                                type="hidden"
                                name="variants[0][attributes][${index}][attribute_value_id]"
                                value="${item.id}"
                            >

                        `;

                        }
                    )
                    .join('');


            /*
            |--------------------------------------------------------------------------
            | ساخت فقط یک TR
            |--------------------------------------------------------------------------
            */

            body.innerHTML = `

            <tr
                data-variant-row
                data-key="${escapeHtml(key)}"
            >

                <td>

                    <div class="flex flex-wrap gap-1.5">

                        ${labels}

                    </div>

                    ${hiddenAttributes}

                </td>


                <td>

                    <input
                        name="variants[0][sku]"
                        value="${escapeHtml(sku)}"
                        required
                        dir="ltr"
                        class="variant-table-input variant-sku min-w-36 text-left"
                    >

                </td>


                <td>

                    <input
                        name="variants[0][price]"
                        value="${escapeHtml(previous.price ?? '')}"
                        required
                        type="number"
                        min="0"
                        step="0.001"
                        dir="ltr"
                        placeholder="0.000"
                        class="variant-table-input variant-price min-w-32 text-left"
                    >

                </td>


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


                <td>

                    <label
                        class="flex cursor-pointer items-center gap-2"
                    >

                        <span class="relative">

                            <input
                                name="variants[0][is_active]"
                                type="checkbox"
                                value="1"
                                ${previous.active === false ? '' : 'checked'}
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


            showVariantTable();

            updateSummary();
        }


        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        function updateSummary() {

            const rows =
                Array.from(
                    body.querySelectorAll(
                        '[data-variant-row]'
                    )
                );


            /*
            |--------------------------------------------------------------------------
            | تعداد Variant
            |--------------------------------------------------------------------------
            */

            const headerCount =
                document.getElementById(
                    'headerVariantCount'
                );


            if (headerCount) {

                headerCount.textContent =
                    `${toFa(rows.length)} مدل`;

            }


            /*
            |--------------------------------------------------------------------------
            | تعداد Attribute
            |--------------------------------------------------------------------------
            */

            const selectedVariantCount =
                document.getElementById(
                    'selectedVariantCount'
                );


            if (selectedVariantCount) {

                selectedVariantCount.textContent =
                    toFa(
                        configs.querySelectorAll(
                            '.attribute-config'
                        ).length
                    );

            }


            /*
            |--------------------------------------------------------------------------
            | مجموع موجودی
            |--------------------------------------------------------------------------
            */

            const stock =
                rows.reduce(
                    (sum, row) => {

                        const value =
                            Number(
                                row.querySelector(
                                    '.variant-stock'
                                )?.value
                            );


                        return sum + (
                            Number.isFinite(value)
                                ? value
                                : 0
                        );

                    },
                    0
                );


            return {
                count: rows.length,
                stock: stock
            };
        }


        /*
        |--------------------------------------------------------------------------
        | Add Attribute
        |--------------------------------------------------------------------------
        */

        addButton.addEventListener(
            'click',
            () => {

                const id =
                    Number(select.value);


                if (!id) {
                    return;
                }


                addAttribute(id);

            }
        );


        /*
        |--------------------------------------------------------------------------
        | تغییر Value ها
        |--------------------------------------------------------------------------
        */

        configs.addEventListener(
            'change',
            event => {

                if (
                    event.target.matches(
                        'input[type="checkbox"]'
                    )
                ) {

                    generateVariants();

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | حذف Attribute
        |--------------------------------------------------------------------------
        */

        configs.addEventListener(
            'click',
            event => {

                const button =
                    event.target.closest(
                        '.remove-attribute'
                    );


                if (!button) {
                    return;
                }


                const config =
                    button.closest(
                        '.attribute-config'
                    );


                if (!config) {
                    return;
                }


                const attributeId =
                    config.dataset.attributeId;


                /*
                |--------------------------------------------------------------------------
                | دوباره فعال کردن Option
                |--------------------------------------------------------------------------
                */

                const option =
                    select.querySelector(
                        `option[value="${attributeId}"]`
                    );


                if (option) {
                    option.disabled = false;
                }


                /*
                |--------------------------------------------------------------------------
                | حذف Attribute
                |--------------------------------------------------------------------------
                */

                config.remove();


                generateVariants();

            }
        );


        /*
        |--------------------------------------------------------------------------
        | تغییر Input های Variant
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
        | حذف Variant
        |--------------------------------------------------------------------------
        */

        body.addEventListener(
            'click',
            event => {

                const button =
                    event.target.closest(
                        '.remove-variant'
                    );


                if (!button) {
                    return;
                }


                const row =
                    button.closest(
                        '[data-variant-row]'
                    );


                if (!row) {
                    return;
                }


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


                        if (!input.value) {
                            return;
                        }


                        const selector =
                            type === 'price'
                                ? '.variant-price'
                                : '.variant-stock';


                        body
                            .querySelectorAll(selector)
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
        | Load Existing Attributes
        |--------------------------------------------------------------------------
        */

        @foreach($productVariant->variantAttributes->groupBy('attribute_id') as $attributeId => $variantValues)

        addAttribute(
            Number("{{ $attributeId }}"),
            {{ $variantValues->count() }}
        );

        @endforeach


        /*
        |--------------------------------------------------------------------------
        | Initial Generate
        |--------------------------------------------------------------------------
        */

        generateVariants();

    </script>

@endsection
