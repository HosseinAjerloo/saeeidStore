@extends('admin.layout.master')

@section('content')
    <main class="flex-1 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-5xl">
            <section class="list-hero animate-fade-up mb-6">
                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <span class="chip bg-brand-500/10 text-brand-300">تگ جدید</span>
                        <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">ایجاد تگ محصول</h2>
                        <p class="mt-2 text-sm text-slate-400">یک عنوان کوتاه و خوانا برای گروه‌بندی محتوایی محصولات
                            تعریف کنید.</p>
                    </div>
                    <a href="tags-index.html"
                       class="rounded-xl border border-white/10 bg-ink-950/30 px-4 py-2.5 text-sm text-slate-300">←
                        بازگشت به تگ‌ها</a>
                </div>
            </section>
            <form id="tagForm" action="#" method="post" novalidate="">
                <div class="grid gap-6 lg:grid-cols-[1fr_20rem]">
                    <section class="form-section glass-card overflow-hidden p-0">
                        <div class="section-heading">
                            <div class="section-number">۰۱</div>
                            <div><h3>مشخصات تگ</h3>
                                <p>عنوان، نامک و وضعیت انتشار</p></div>
                        </div>
                        <div class="space-y-5 p-5 sm:p-7">
                            <label class="field-group"><span
                                    class="field-label">نام تگ</span>
                                <span class="field-shell">
                                    <span class="mr-4 text-brand-400">#</span>
                                    <input id="tagName" name="name" type="text" maxlength="255" placeholder="مثلاً پرفروش">
                                </span>
                                <small
                                    class="field-hint">این فیلد طبق Migration اختیاری است.</small>
                            </label>
                            <label
                                class="field-group">
                                <span class="field-label">نامک (Slug)</span>
                                <span class="field-shell">
                                    <span class="mr-4 text-slate-600">/</span>
                                    <input id="tagSlug" name="slug" type="text" maxlength="255" dir="ltr" class="text-left" placeholder="best-seller">
                                </span>
                                <small
                                    class="field-hint">
                                    اختیاری و یکتا؛ از نام تگ به‌صورت خودکار ساخته می‌شود.
                                </small>
                            </label>
                            <div class="field-group">
                                <span class="field-label">وضعیت تگ</span>
                                <label
                                    class="account-status">
                                    <span
                                        class="grid h-9 w-9 place-items-center rounded-xl bg-brand-500/10 text-brand-400">✓</span>
                                    <span class="flex-1">
                                        <b>تگ فعال باشد</b>
                                        <small>در بخش انتخاب تگ محصولات نمایش داده می‌شود</small>
                                    </span>
                                    <span
                                        class="relative">
                                        <input id="tagActive" name="is_active" type="checkbox" value="1" checked="" class="peer sr-only">
                                        <span class="block h-6 w-11 rounded-full bg-ink-600 peer-checked:bg-brand-500"></span>
                                        <span class="absolute right-1 top-1 h-4 w-4 rounded-full bg-white transition-transform peer-checked:-translate-x-5">
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </section>
                    <aside class="glass-card h-fit overflow-hidden p-0">
                        <div class="section-heading">
                            <div>
                                <h3>پیش‌نمایش</h3>
                                <p>نمایش تگ در محصولات</p>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="rounded-2xl border border-white/[0.07] bg-ink-800/50 p-5">
                                <span id="tagPreview" class="chip bg-brand-500/10 px-4 py-2 text-sm text-brand-300"># نام تگ</span>
                                <p id="slugPreview" dir="ltr" class="mt-4 text-left text-[11px] text-slate-600">
                                    /tags/new-tag
                                </p>
                                <div class="mt-5 flex items-center gap-2 text-[10px] text-slate-500">
                                    <span id="statusDot" class="h-2 w-2 rounded-full bg-brand-400"></span>
                                    <span id="statusText">فعال و قابل انتخاب</span>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="mt-5 flex justify-end gap-3 rounded-2xl border border-white/[0.08] bg-ink-900/90 p-3">
                    <button type="reset" class="rounded-xl border border-white/10 px-5 py-3 text-sm text-slate-400">پاک
                        کردن
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-8 py-3 text-sm font-extrabold text-ink-950 shadow-glow">
                        ثبت تگ ←
                    </button>
                </div>
            </form>
        </div>
    </main>

@endsection

@section('script')
    <script>
        const form = document.getElementById('tagForm'), nameInput = document.getElementById('tagName'),
            slugInput = document.getElementById('tagSlug'), activeInput = document.getElementById('tagActive');
        let slugEdited = false;
        const slugify = v => v.trim().toLowerCase().replace(/[\s_]+/g, '-').replace(/[^a-z0-9\u0600-\u06ff-]/g, '').replace(/-+/g, '-').replace(/^-|-$/g, '');

        function update() {
            document.getElementById('tagPreview').textContent = '# ' + (nameInput.value || 'نام تگ');
            document.getElementById('slugPreview').textContent = '/tags/' + (slugInput.value || 'new-tag');
            document.getElementById('statusText').textContent = activeInput.checked ? 'فعال و قابل انتخاب' : 'غیرفعال';
            document.getElementById('statusDot').className = 'h-2 w-2 rounded-full ' + (activeInput.checked ? 'bg-brand-400' : 'bg-slate-500');
        }

        nameInput.addEventListener('input', () => {
            if (!slugEdited) slugInput.value = slugify(nameInput.value);
            update()
        });
        slugInput.addEventListener('input', () => {
            slugEdited = true;
            slugInput.value = slugify(slugInput.value);
            update()
        });
        activeInput.addEventListener('change', update);
        form.addEventListener('reset', () => setTimeout(() => {
            slugEdited = false;
            update()
        }, 0));
        form.addEventListener('submit', e => {
            e.preventDefault();
            const b = form.querySelector('[type=submit]');
            b.textContent = '✓ اطلاعات تگ آماده ثبت است';
            setTimeout(() => b.textContent = 'ثبت تگ ←', 2000)
        });
        update();
    </script>
@endsection
