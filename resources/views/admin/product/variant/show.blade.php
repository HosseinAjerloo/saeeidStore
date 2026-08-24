@extends('admin.layout.master')
@section('title')
    <title>پنل | نمایش محصول و ویژگی آن</title>
@endsection
@section('content')

    <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
        <section class="list-hero animate-fade-up">
            <div class="absolute -left-16 -top-20 h-52 w-52 rounded-full bg-aqua-500/10 blur-3xl"></div>
            <div class="relative flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="chip bg-brand-500/10 text-brand-300">مشخصات قابل انتخاب</span>
                    <h2 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">نمایش ویژگی‌های محصولات</h2>
                    <p class="mt-2 text-sm text-slate-400">نمایش ویژگی‌های محصول معمولی، رنگی و مقادیر وابسته</p>
                </div>
                <div>
                    <a href="{{route('admin.product.variant.create',$product)}}"
                       class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-white shadow-glow">
                        ایجاد ویژگی جدید +
                    </a>
                    <br>
                    <br>
                    <a href="{{route('admin.product.index')}}"
                       class="inline-flex items-center justify-center rounded-xl bg-gradient-to-l from-brand-500 to-aqua-500 px-5 py-3 text-sm font-extrabold text-ink-950 shadow-glow">
                        بازگشت به صفحه محصولات
                    </a>

                </div>

            </div>
        </section>

        <section class="glass-card overflow-hidden p-0">

            <div class="overflow-x-auto">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>نام محصول</th>
                        <th>قیمت محصول</th>
                        <th>نوع ویژگی</th>
                        <th>مقادیر</th>
                        <th>موجودی انبار</th>
                        <th>وضعیت</th>
                        <th class="text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->productVariant()->has('variantAttributes')->get() as $productVariant)
                        <tr data-searchable="">
                            <td>
                                <div class="flex items-center gap-3">

                                    <div>
                                        <b class="block text-sm text-white">{{$product->name??''}}
                                        </b>

                                    </div>
                                </div>
                            </td>
                            <td class=" text-slate-500">
                                {{numberFormatAble($productVariant->price /10 ??0 )}}
                                تومان
                            </td>
                            <td>
                                    <span class="">
                                            @foreach($productVariant->variantAttributes->pluck('attribute') as $value)
                                                <div>
                                                    <div class="mt-2">{{$value?->name}}</div>
                                                </div>

                                        @endforeach

                                    </span>
                            </td>
                            <td>
                                    <span class="">
                                            @foreach($productVariant->variantAttributes->pluck('attributeValue') as $value)
                                            @if($value?->attribute->type=='color')
                                                <div class="h-4 w-4 rounded-full border-2 border-ink-850 "
                                                     style="background-color:{{$value->value}}" title="رنگ">
                                                </div>

                                            @else
                                                <div class=" mt-2 rounded-md   text-aqua-300">{{$value?->value}}</div>
                                            @endif

                                        @endforeach

                                    </span>
                            </td>
                            <td>
                                    <span class="chip  text-rose-300">
                                            {{$productVariant->stock??0}}
                                    </span>
                            </td>


                            <td>
                                            <span class="chip bg-aqua-500/10 text-aqua-300">
                                                {{$productVariant->getActive}}
                                            </span>
                            </td>
                            <td>
                                <div class="flex justify-end gap-2">
                                    <a href="{{route('admin.product.variant.editVariant',[$product,$productVariant])}}"
                                       class="table-action edit" title="ویرایش">✎</a>
                                    <button data-delete="انتخابی"
                                            data-route="{{route('admin.product.variant.destroyVariant',$productVariant)}}"
                                            class="table-action delete" title="حذف">⌫
                                    </button>
                                </div>
                            </td>

                        </tr>


                    @endforeach
                    </tbody>
                </table>
                <div data-empty-state="" class="hidden px-6 py-16 text-center"><p
                        class="text-sm font-bold text-slate-300">ویژگی‌ای پیدا نشد</p>
                    <p class="mt-1 text-xs text-slate-600">نام یا مقدار دیگری را جستجو کنید.</p></div>
            </div>


        </section>
    </main>
@endsection
@section('other_content')
    <form id="deleteDialog" class="delete-dialog" method="POST">
        @method('DELETE')
        @csrf
        <div class="delete-dialog-card">
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-rose/10 text-rose">!</div>
            <h3 class="mt-5 text-lg font-extrabold text-white">حذف ویژگی</h3>
            <p class="mt-2 text-sm leading-7 text-slate-400">آیا از ویژگی «<b id="deleteItemName"
                                                                              class="text-white"></b>»
                مطمئن هستید؟ این عملیات قابل بازگشت نیست.</p>
            <div class="mt-6 flex gap-3">
                <button type="button" data-close-dialog
                        class="flex-1 rounded-xl border border-white/10 py-2.5 text-slate-400">انصراف
                </button>
                <button id="confirmDelete" class="flex-1 rounded-xl bg-rose py-2.5 font-bold text-ink-950">حذف شود
                </button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        const search = document.querySelector('input[type="text"]');


        window.addEventListener('keydown', function (e) {
            if (e.ctrlKey && e.key.toLowerCase() === 'k') {
                search.focus()
            }
        })
    </script>
@endsection
