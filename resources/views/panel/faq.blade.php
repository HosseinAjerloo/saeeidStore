@extends('panel.Layout.master')
@section('content')
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{route('panel.index')}}">خانه</a>
            <span class="separator">/</span>
            <span class="active">پرسش‌های متداول</span>
        </nav>
    </div>

    <section class="pb-4">
        <div class="container">
            <div class="banner-box banner-1 text-center d-block" style="min-height:auto;padding:40px 30px;">
                <i class="bi bi-question-circle banner-icon" style="font-size:50px;"></i>
                <h4 class="mb-2">پرسش‌های متداول</h4>
                <p class="mb-4">پاسخ سوالات خود را در اینجا بیابید</p>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="search-bar">
                            <input type="text" placeholder="جستجو در پرسش‌ها...">
                            <button><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="breadcrumb-custom">
                <a href="../index.html">خانه</a><span class="separator">/</span><span
                    class="active">پرسش‌های متداول</span>
            </nav>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row g-4">
                <!-- دسته‌بندی -->
                <div class="col-lg-3">
                    <div class="content-box sticky-top" style="top:90px;">
                        <h5><i class="bi bi-list text-primary-custom"></i> دسته‌بندی</h5>
                        <div class="list-group list-group-flush">
                            <a href="#cat1" class="list-group-item list-group-item-action border-0 px-0 active">سفارش و
                                تحویل</a>
                            <a href="#cat2" class="list-group-item list-group-item-action border-0 px-0">پرداخت و
                                گارانتی</a>
                            <a href="#cat3" class="list-group-item list-group-item-action border-0 px-0">بازگشت کالا</a>
                            <a href="#cat4" class="list-group-item list-group-item-action border-0 px-0">حساب کاربری</a>
                            <a href="#cat5" class="list-group-item list-group-item-action border-0 px-0">محصولات</a>
                        </div>

                        <hr>

                        <div class="text-center">
                            <i class="bi bi-headset text-primary-custom" style="font-size:32px;"></i>
                            <h6 class="mt-2">پاسخ سوال خود را نیافتید؟</h6>
                            <p class="small text-muted-custom">با کارشناسان ما تماس بگیرید</p>
                            <a href="tel:02112345678" class="btn btn-primary-custom btn-sm w-100">۰۲۱-۱۲۳۴۵۶۷۸</a>
                            <a href="#" class="btn btn-outline-primary-custom btn-sm w-100 mt-2"><i
                                    class="bi bi-chat-dots"></i> چت آنلاین</a>
                        </div>
                    </div>
                </div>

                <!-- پرسش‌ها -->
                <div class="col-lg-9">
                    <!-- سفارش و تحویل -->
                    <div id="cat1" class="mb-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-box text-primary-custom"></i> سفارش و تحویل</h4>

                        <div class="faq-item open">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>زمان ارسال سفارش چقدر است؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    زمان ارسال سفارش‌ها بسته به روش ارسال انتخابی متفاوت است:
                                    <ul>
                                        <li>پیک موتوری (تهران): کمتر از ۲ ساعت</li>
                                        <li>ارسال سریع: فردا صبح</li>
                                        <li>پست پیشتاز: ۲ تا ۳ روز کاری</li>
                                    </ul>
                                    برای سفارش‌های ثبت شده قبل از ساعت ۱۲ ظهر، ارسال در همان روز انجام می‌شود.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>چگونه می‌توانم وضعیت سفارش خود را پیگیری کنم؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    برای پیگیری وضعیت سفارش:
                                    <ol>
                                        <li>وارد حساب کاربری خود شوید</li>
                                        <li>به بخش «سفارش‌های من» مراجعه کنید</li>
                                        <li>روی شماره سفارش مورد نظر کلیک کنید</li>
                                    </ol>
                                    همچنین با شماره سفارش می‌توانید از طریق پشتیبانی نیز وضعیت را استعلام کنید.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>آیا ارسال به شهرستان انجام می‌شود؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    بله، ما به تمامی شهرهای ایران ارسال انجام می‌دهیم. برای شهرستان‌ها از پست پیشتاز و
                                    تیپاکس استفاده می‌شود. هزینه ارسال بسته به وزن بسته و مقصد محاسبه می‌شود. برای
                                    سفارش‌های بالای ۵۰۰ هزار تومان، ارسال رایگان است.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>آیا می‌توانم زمان تحویل را تعیین کنم؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    بله، در هنگام ثبت سفارش می‌توانید تاریخ و بازه زمانی تحویل را انتخاب کنید. برای پیک
                                    موتوری تهران، بازه‌های زمانی صبح (۹-۱۲)، ظهر (۱۲-۱۵)، عصر (۱۵-۱۸) و شب (۱۸-۲۱) قابل
                                    انتخاب است.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- پرداخت و گارانتی -->
                    <div id="cat2" class="mb-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-credit-card text-primary-custom"></i> پرداخت و گارانتی
                        </h4>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>چه روش‌های پرداختی در زمانک موجود است؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    روش‌های پرداخت در زمانک:
                                    <ul>
                                        <li>پرداخت آنلاین (تمام کارت‌های شتاب)</li>
                                        <li>کیف پول زمانک</li>
                                        <li>پرداخت در محل (فقط پیک تهران)</li>
                                        <li>پرداخت اقساطی (تا ۱۲ ماه بدون بهره)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>گارانتی محصولات چقدر است؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    تمامی محصولات زمانک دارای گارانتی هستند. مدت گارانتی بسته به برند و مدل متفاوت است و
                                    بین ۱۲ تا ۲۴ ماه متغیر است. گارانتی شامل خدمات تعویض باطری، تنظیم بند، و تعمیرات
                                    اصولی می‌شود. اطلاعات دقیق گارانتی هر محصول در صفحه همان محصول درج شده است.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>آیا محصولات اورجینال هستند؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    بله، تمامی محصولات زمانک اورجینال و با ضمانت اصالت کالا عرضه می‌شوند. ما مستقیماً از
                                    نمایندگی‌های رسمی برندها خرید می‌کنیم. در صورت اثبات غیر اورجینال بودن محصول، مبلغ
                                    پرداختی به همراه ۲۰٪ جریمه به مشتری بازگردانده می‌شود.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- بازگشت کالا -->
                    <div id="cat3" class="mb-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-arrow-repeat text-primary-custom"></i> بازگشت کالا</h4>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>چگونه می‌توانم کالا را برگردانم؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    برای بازگشت کالا:
                                    <ol>
                                        <li>وارد حساب کاربری شوید</li>
                                        <li>به بخش «سفارش‌های من» مراجعه کنید</li>
                                        <li>روی سفارش مورد نظر کلیک کرده و «درخواست بازگشت» را بزنید</li>
                                        <li>دلیل بازگشت را انتخاب کرده و توضیحات را وارد کنید</li>
                                        <li>کالا را در بسته‌بندی اصلی به آدرس указ شده ارسال کنید</li>
                                    </ol>
                                    درخواست بازگشت باید ظرف ۷ روز از تاریخ تحویل ثبت شود.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>هزینه بازگشت کالا چقدر است؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    در صورتی که دلیل بازگشت مربوط به نقص کالا یا اشتباه ارسالی باشد، هزینه بازگشت بر
                                    عهده زمانک است. در سایر موارد، هزینه بازگشت بر عهده مشتری است. مبلغ سفارش پس از
                                    دریافت و بررسی کالا، حداکثر ظرف ۷۲ ساعت به حساب شما بازگردانده می‌شود.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- حساب کاربری -->
                    <div id="cat4" class="mb-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-person text-primary-custom"></i> حساب کاربری</h4>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>چگونه رمز عبور خود را تغییر دهم؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    برای تغییر رمز عبور:
                                    <ol>
                                        <li>وارد حساب کاربری شوید</li>
                                        <li>به بخش «تنظیمات حساب» &gt; «امنیت» مراجعه کنید</li>
                                        <li>گزینه «تغییر رمز عبور» را انتخاب کنید</li>
                                        <li>رمز فعلی و رمز جدید را وارد کنید</li>
                                    </ol>
                                    در صورت فراموشی رمز عبور، از گزینه «فراموشی رمز» در صفحه ورود استفاده کنید.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>چگونه می‌توانم شماره موبایل خود را تغییر دهم؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    برای تغییر شماره موبایل، به بخش «تنظیمات حساب» مراجعه کرده و گزینه «تغییر شماره
                                    موبایل» را انتخاب کنید. شما باید مالکیت شماره جدید را از طریق کد تایید پیامکی تایید
                                    کنید. در صورت نیاز به راهنمایی بیشتر با پشتیبانی تماس بگیرید.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- محصولات -->
                    <div id="cat5" class="mb-4">
                        <h4 class="fw-bold mb-3"><i class="bi bi-box-seam text-primary-custom"></i> محصولات</h4>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>آیا بند ساعت قابل تعویض است؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    بله، بند اکثر ساعت‌ها قابل تعویض است. شما می‌توانید بندهای متنوعی را از بخش «لوازم
                                    جانبی» خریداری کنید. تعویض بند در تمام شعب زمانک به صورت رایگان انجام می‌شود. برای
                                    ساعت‌های هوشمند نیز بندهای مختلفی با رنگ‌ها و جنس‌های متنوع موجود است.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>آیا تعویض باطری ساعت رایگان است؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    بله، تعویض باطری ساعت‌های کوارتز در طول دوره گارانتی رایگان است. بعد از اتمام
                                    گارانتی نیز با هزینه بسیار کم انجام می‌شود. برای تعویض باطری می‌توانید به یکی از شعب
                                    زمانک مراجعه کنید یا ساعت را پستی ارسال کنید.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <span>آیا ساعت‌های هوشمند با تمام گوشی‌ها کار می‌کنند؟</span>
                                <i class="bi bi-plus-circle icon"></i>
                            </div>
                            <div class="faq-body">
                                <div class="faq-body-inner">
                                    ساعت‌های هوشمند اپل واچ فقط با آیفون کار می‌کنند. سایر برندها مانند سامسونگ، هواوی،
                                    شیائومی و آمیزفیت با هر دو سیستم عامل اندروید و iOS کار می‌کنند، اما برخی قابلیت‌ها
                                    ممکن است در iOS محدود باشند. اطلاعات سازگاری هر ساعت در صفحه محصول درج شده است.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- تماس با ما -->
                    <div class="content-box text-center">
                        <i class="bi bi-headset text-primary-custom" style="font-size:48px;"></i>
                        <h4 class="mt-2">پاسخ خود را پیدا نکردید؟</h4>
                        <p class="text-muted-custom mb-3">تیم پشتیبانی ما ۲۴ ساعته آماده پاسخگویی به شماست</p>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="tel:02112345678" class="btn btn-primary-custom"><i class="bi bi-telephone"></i>
                                ۰۲۱-۱۲۳۴۵۶۷۸</a>
                            <a href="#" class="btn btn-outline-primary-custom"><i class="bi bi-chat-dots"></i> چت آنلاین</a>
                            <a href="#" class="btn btn-outline-primary-custom"><i class="bi bi-envelope"></i> ایمیل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

