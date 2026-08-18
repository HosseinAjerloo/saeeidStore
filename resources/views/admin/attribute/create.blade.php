@extends('admin.layout.master')
@section('title')
    <title>پنل | ایجاد ویژگی جدید</title>
@endsection
@section('content')

    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <section
                class="relative mb-6 overflow-hidden rounded-3xl border border-brand-500/20 bg-gradient-to-l from-brand-500/[0.13] via-ink-850/80 to-aqua-500/[0.08] p-6 animate-fade-up sm:p-8">
                <div class="absolute -left-16 -top-20 h-56 w-56 rounded-full bg-aqua-500/10 blur-3xl"></div>
                <div class="relative flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <div
                            class="mb-3 inline-flex items-center gap-2 rounded-full border border-brand-500/20 bg-brand-500/10 px-3 py-1.5 text-[11px] font-bold text-brand-300">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-400 animate-pulse"></span>مشخصات قابل انتخاب
                        </div>
                        <h2 class="text-2xl font-extrabold text-white sm:text-3xl">ایجاد ویژگی محصول</h2>
                        <p class="mt-2 max-w-xl text-sm leading-7 text-slate-400">نوع ویژگی را مشخص و مقادیر قابل
                            استفاده آن را در همان صفحه تعریف کنید.</p></div>
                    <a href="attributes-index.html"
                       class="inline-flex w-fit rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm font-semibold text-slate-300 hover:text-brand-300">←
                        بازگشت به محصولات</a></div>
                <div class="relative mt-7 grid max-w-xl grid-cols-2 gap-3">
                    <div class="step-pill active"><span>۱</span>
                        <div><b>مشخصات ویژگی</b><small>نام، نوع و وضعیت</small></div>
                    </div>
                    <div class="step-pill"><span>۲</span>
                        <div><b>مقادیر ویژگی</b><small>تعریف گزینه‌های قابل انتخاب</small></div>
                    </div>
                </div>
            </section>

            <form id="attributeForm" action="{{route('admin.attribute.store')}}" method="post" novalidate="">
                @csrf
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                    <div class="space-y-5 xl:col-span-8">
                        <section class="form-section glass-card overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number">۰۱</div>
                                <div><h3>مشخصات ویژگی</h3>
                                    <p>عنوان، نامک و نحوه نمایش مقادیر</p></div>
                                <span class="mr-auto chip bg-brand-500/10 text-brand-300">اصلی</span></div>
                            <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <label class="field-group"><span class="field-label">نام ویژگی</span><span
                                        class="field-shell"><svg viewBox="0 0 24 24"><path
                                                d="M4 6h16M7 12h10M10 18h4"></path></svg><input id="attributeName"
                                                                                                name="name" type="text"
                                                                                                maxlength="255"
                                                                                                placeholder="مثلاً رنگ یا حافظه"></span></label>

                                <label class="field-group"><span class="field-label">نوع ویژگی</span><span
                                        class="native-select-shell"><span class="native-select-icon"><svg fill="none"
                                                                                                          viewBox="0 0 24 24"
                                                                                                          stroke="currentColor"><path
                                                    d="M5 5h14v14H5zM9 9h6v6H9z"></path></svg></span><select
                                            id="typeInput" name="type" class="native-select"><option value="normal">معمولی — متن و عدد</option><option
                                                value="color">رنگی — انتخاب رنگ</option></select><svg
                                            class="native-select-chevron" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor"><path d="M19 9l-7 7-7-7"></path></svg></span></label>
                                <div class="field-group">
                                    <span class="field-label">وضعیت ویژگی</span>
                                    <label
                                        class="account-status"><span
                                            class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400">✓</span><span
                                            class="flex-1"><b>ویژگی فعال باشد</b><small>هنگام تعریف محصول قابل استفاده است</small></span><span
                                            class="relative"><input id="activeInput" name="is_active" type="checkbox"
                                                                    value="1" checked="" class="peer sr-only"><span
                                                class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-brand-500"></span><span
                                                class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-3"></span></span></label>
                                </div>
                            </div>
                        </section>

                        <section class="form-section glass-card overflow-hidden p-0">
                            <div class="section-heading">
                                <div class="section-number aqua">۰۲</div>
                                <div><h3>مقادیر ویژگی</h3>
                                    <p id="valuesHelp">مقادیر متنی یا عددی ویژگی را اضافه کنید.</p></div>
                                <div class="value-stepper mr-auto" aria-label="تعداد مقادیر">
                                    <button id="decreaseValue" type="button" aria-label="کم کردن مقدار" disabled="">−
                                    </button>
                                    <span id="valueStepperCount">۱</span>
                                    <button id="addValue" type="button" aria-label="افزودن مقدار">+</button>
                                </div>
                            </div>
                            <div id="valueRows" class="space-y-4 p-5 sm:p-7">
                                <div class="price-row" data-value-row="" data-index="0">
                                    <div class="price-row-heading">
                                        <div><span class="price-row-number">۱</span><span class="price-row-title">مقدار ۱</span>
                                        </div>
                                        <button type="button" class="remove-value invisible remove-price-row"
                                                disabled="">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M4 7h16M7 7l1 14h8l1-14"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-[1fr_auto]"><label
                                            class="field-group"><span class="field-label value-label">مقدار</span><span
                                                class="field-shell"><span class="color-picker-wrap hidden mr-3"><input
                                                        type="color" value="#10b981" class="color-picker"></span><svg
                                                    class="normal-value-icon" viewBox="0 0 24 24"><path
                                                        d="M5 8h14M5 12h10M5 16h7"></path></svg><input
                                                    name="values[0][value]" type="text" maxlength="255"
                                                    placeholder="مثلاً ۲۵۶ گیگابایت"
                                                    class="attribute-value"></span></label>
                                        <div class="field-group sm:w-52"><span
                                                class="field-label">وضعیت مقدار</span><label
                                                class="account-status"><span class="flex-1"><b>فعال</b><small>قابل انتخاب باشد</small></span><span
                                                    class="relative"><input name="values[0][is_active]" type="checkbox"
                                                                            value="1" checked=""
                                                                            class="peer sr-only value-active"><span
                                                        class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-brand-500"></span><span
                                                        class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-3"></span></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between border-t border-white/[0.06] px-5 py-4 sm:px-7">
                                <p class="text-[10px] text-slate-600">برای هر ویژگی می‌توانید چند مقدار تعریف کنید.</p>
                                <span class="chip bg-aqua-500/10 text-aqua-300"><span
                                        id="valueCount">۱</span> مقدار</span></div>
                        </section>
                        <div
                            class="sticky bottom-4 z-10 flex flex-col-reverse gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3 shadow-lift backdrop-blur-xl sm:flex-row sm:items-center sm:justify-between">
                            <p class="hidden text-xs text-slate-500 sm:block">مقادیر خالی هنگام ذخیره نادیده گرفته
                                شوند.</p>
                            <div class="flex gap-3">

                                <button type="submit"
                                        class="flex flex-1 justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow sm:flex-none">
                                    ثبت ویژگی ←
                                </button>
                            </div>
                        </div>
                    </div>

                    <aside class="xl:col-span-4">
                        <section class="profile-preview glass-card overflow-hidden p-0 xl:sticky xl:top-24">
                            <div class="relative h-28 bg-gradient-to-l from-brand-500/25 via-aqua-500/10 to-ink-800">
                                <span id="statusPreview"
                                      class="absolute left-4 top-4 chip bg-brand-500/15 text-brand-300"><span
                                        class="status-dot bg-brand-400"></span>فعال</span></div>
                            <div class="px-6 pb-6">
                                <div
                                    class="-mt-10 grid h-20 w-20 place-items-center rounded-3xl border-4 border-ink-850 bg-gradient-to-br from-brand-400 to-aqua-500 text-2xl font-extrabold text-ink-950">
                                    ≡
                                </div>
                                <p class="mt-5 text-[10px] font-bold text-brand-400">ویژگی محصول</p>
                                <h3 id="namePreview" class="mt-2 text-lg font-extrabold text-white">ویژگی جدید</h3>
                                <p id="slugPreview" dir="ltr" class="mt-1 text-left text-[11px] text-slate-600">
                                    attribute-slug</p>
                                <div class="my-5 h-px bg-white/[0.06]"></div>
                                <div class="flex items-center justify-between"><span class="text-xs text-slate-500">نوع نمایش</span><span
                                        id="typePreview" class="chip bg-aqua-500/10 text-aqua-300">معمولی</span></div>
                                <p class="mt-6 text-[11px] font-bold text-slate-400">پیش‌نمایش مقادیر</p>
                                <div id="valuesPreview" class="mt-3 flex min-h-[3rem] flex-wrap gap-2"><span
                                        class="text-xs text-slate-600">هنوز مقداری وارد نشده است.</span></div>
                                <div
                                    class="mt-6 rounded-2xl border border-aqua-500/10 bg-aqua-500/[0.06] p-4 text-[11px] leading-5 text-slate-400">
                                    با تغییر نوع ویژگی، ورودی مقادیر بین حالت معمولی و انتخاب رنگ تغییر می‌کند.
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('script')

    <script>
        const form = document.getElementById('attributeForm');
        const nameInput = document.getElementById('attributeName');
        const typeInput = document.getElementById('typeInput');
        const valueRows = document.getElementById('valueRows');
        const toFa = value => String(value).replace(/\d/g, digit => '۰۱۲۳۴۵۶۷۸۹'[digit]);
        let slugEdited = false, valueIndex = 1;
        const makeSlug = value => value.trim().toLowerCase().replace(/[\s_]+/g, '-').replace(/[^a-z0-9\u0600-\u06ff-]/g, '').replace(/-+/g, '-').replace(/^-|-$/g, '');
        const escapeHtml = value => value.replace(/[&<>"]/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;'
        })[char]);
        const rowTemplate = index => `<div class="price-row animate-fade-up" data-value-row data-index="${index}"><div class="price-row-heading"><div><span class="price-row-number"></span><span class="price-row-title"></span></div><button type="button" class="remove-value remove-price-row"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 7h16M7 7l1 14h8l1-14"/></svg></button></div><div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-[1fr_auto]"><label class="field-group"><span class="field-label value-label">مقدار</span><span class="field-shell"><span class="color-picker-wrap hidden mr-3"><input type="color" value="#10b981" class="color-picker" /></span><svg class="normal-value-icon" viewBox="0 0 24 24"><path d="M5 8h14M5 12h10M5 16h7"/></svg><input name="values[${index}][value]" type="text" maxlength="255" placeholder="مثلاً ۲۵۶ گیگابایت" class="attribute-value" /></span></label><div class="field-group sm:w-52"><span class="field-label">وضعیت مقدار</span><label class="account-status"><span class="flex-1"><b>فعال</b><small>قابل انتخاب باشد</small></span><span class="relative"><input name="values[${index}][is_active]" type="checkbox" value="1" checked class="peer sr-only value-active" /><span class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-brand-500"></span><span class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-3"></span></span></label></div></div></div>`;

        function applyType() {
            const colorMode = typeInput.value === 'color';
            document.getElementById('valuesHelp').textContent = colorMode ? 'رنگ‌ها را با Color Picker یا کد HEX تعریف کنید.' : 'مقادیر متنی یا عددی ویژگی را اضافه کنید.';
            document.getElementById('typePreview').textContent = colorMode ? 'رنگی' : 'معمولی';
            valueRows.querySelectorAll('[data-value-row]').forEach(row => {
                row.querySelector('.color-picker-wrap').classList.toggle('hidden', !colorMode);
                row.querySelector('.normal-value-icon').classList.toggle('hidden', colorMode);
                row.querySelector('.value-label').textContent = colorMode ? 'کد رنگ' : 'مقدار';
                row.querySelector('.attribute-value').placeholder = colorMode ? '#10b981' : 'مثلاً ۲۵۶ گیگابایت';
                if (colorMode && !/^#[0-9a-f]{6}$/i.test(row.querySelector('.attribute-value').value)) row.querySelector('.attribute-value').value = row.querySelector('.color-picker').value;
            });
            updatePreview();
        }

        function refreshRows() {
            const rows = Array.from(valueRows.querySelectorAll('[data-value-row]'));
            rows.forEach((row, index) => {
                row.querySelector('.price-row-number').textContent = toFa(index + 1);
                row.querySelector('.price-row-title').textContent = `مقدار ${toFa(index + 1)}`;
                const remove = row.querySelector('.remove-value');
                remove.classList.toggle('invisible', rows.length === 1);
                remove.disabled = rows.length === 1;
            });
            document.getElementById('valueCount').textContent = toFa(rows.length);
            document.getElementById('valueStepperCount').textContent = toFa(rows.length);
            document.getElementById('decreaseValue').disabled = rows.length === 1;
        }

        function updatePreview() {
            document.getElementById('namePreview').textContent = nameInput.value || 'ویژگی جدید';
            const active = document.getElementById('activeInput').checked;
            document.getElementById('statusPreview').innerHTML = `<span class="status-dot ${active ? 'bg-brand-400' : 'bg-slate-500'}"></span>${active ? 'فعال' : 'غیرفعال'}`;
            const values = Array.from(valueRows.querySelectorAll('.attribute-value')).map(input => input.value.trim()).filter(Boolean);
            const target = document.getElementById('valuesPreview');
            target.innerHTML = values.length ? values.map(value => {
                const safe = escapeHtml(value);
                const color = /^#[0-9a-f]{6}$/i.test(value) ? value : '#64748b';
                return typeInput.value === 'color' ? `<span class="group relative h-8 w-8 rounded-full border-2 border-ink-850 shadow" style="background:${color}" title="${safe}"></span>` : `<span class="chip bg-brand-500/10 text-brand-300">${safe}</span>`;
            }).join('') : '<span class="text-xs text-slate-600">هنوز مقداری وارد نشده است.</span>';
        }

        nameInput.addEventListener('input', () => {
            updatePreview();
        });

        typeInput.addEventListener('change', applyType);
        document.getElementById('addValue').addEventListener('click', () => {
            valueRows.insertAdjacentHTML('beforeend', rowTemplate(valueIndex++));
            refreshRows();
            applyType();
            valueRows.lastElementChild.querySelector('.attribute-value').focus();
        });
        document.getElementById('decreaseValue').addEventListener('click', () => {
            const rows = valueRows.querySelectorAll('[data-value-row]');
            if (rows.length === 1) return;
            rows[rows.length - 1].remove();
            refreshRows();
            updatePreview();
        });
        valueRows.addEventListener('click', event => {
            const button = event.target.closest('.remove-value');
            if (!button || button.disabled) return;
            button.closest('[data-value-row]').remove();
            refreshRows();
            updatePreview();
        });
        valueRows.addEventListener('input', event => {
            if (event.target.matches('.color-picker')) event.target.closest('[data-value-row]').querySelector('.attribute-value').value = event.target.value;
            if (event.target.matches('.attribute-value') && typeInput.value === 'color' && /^#[0-9a-f]{6}$/i.test(event.target.value)) event.target.closest('[data-value-row]').querySelector('.color-picker').value = event.target.value;
            updatePreview();
        });
        form.addEventListener('change', updatePreview);
        form.addEventListener('reset', () => setTimeout(() => {
            slugEdited = false;
            Array.from(valueRows.querySelectorAll('[data-value-row]')).slice(1).forEach(row => row.remove());
            valueIndex = 1;
            refreshRows();
            applyType();
        }, 0));

        refreshRows();
        applyType();
    </script>
@endsection
