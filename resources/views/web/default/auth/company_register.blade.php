@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush
<style>
.hero-img {
    background-image: url('store/new/reg-hero-bg.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    min-height: 84%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 100px;
}

.margin-top {
    margin-top: -140px;
}

.img-companies {
    width: 100%;
}

@media(max-width:992px) {
    .hero-img {
        min-height: 50%
    }

    .margin-top {
        margin-top: -130px;
    }

    .img-companies {
        width: 80%;
    }
}

@media(max-width:600px) {
    .hero-img {
        min-height: 30%
    }

    .margin-top {
        margin-top: -120px;
    }
}
</style>
@section('content')

<section class="hero-img">
</section>

<div class="container margin-top">
    <div class="start-50 p-2 p-md-25 d-flex bg-secondary rounded-3 shadow-lg justify-content-around"
        style=" z-index: 10; border-radius: 22px;">

        <div
            class="text-center border-end d-flex flex-column-reverse flex-md-row align-items-center justify-content-between gap-1">
            <small class="text-dark">Reduction in training costs</small>

            <h3 class="fw-bold mb-0">24%</h3>
        </div>

        <div
            class="text-center border-end d-flex flex-column-reverse flex-md-row align-items-center justify-content-between gap-1">
            <small class="text-dark">Higher retention rates</small>

            <h3 class="fw-bold mb-0">38%</h3>
        </div>

        <div
            class="text-center border-end d-flex flex-column-reverse flex-md-row align-items-center justify-content-between gap-1">
            <small class="text-dark">More employee productivity</small>

            <h3 class="fw-bold mb-0">25%</h3>
        </div>

    </div>
</div>

<section class="py-50 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text on Right -->
            <div class=" col-12 col-md-6 mt-4 mt-md-0">
                <h1 class="text-dark font-weight-bold">
                    انضم إلى أكثر من 4300 شركة<br> تستخدم clerax لتطوير المواهب
                </h1>
            </div>

            <!-- Logos Grid -->
            <div class="col-12 col-md-6 mt-20">
                <div class="row g-0">
                    <!-- removed 'border' here -->

                    <!-- Each logo item -->
                    <div class="col-4 col-md-4 border p-3 text-center">
                        <img src="{{ asset('store/uni/uni1.png') }}" alt="HubSpot" class="img-fluid"
                            style="max-height: 40px;">
                    </div>
                    <div class="col-4 col-md-4 border p-3 text-center">
                        <img src="{{ asset('store/uni/uni2.png') }}" alt="SAP" class="img-fluid"
                            style="max-height: 40px;">
                    </div>
                    <div class="col-4 col-md-4 border p-3 text-center">
                        <img src="{{ asset('store/uni/uni3.png') }}" alt="IBM" class="img-fluid"
                            style="max-height: 40px;">
                    </div>
                    <div class="col-4 col-md-4 border p-3 text-center">
                        <img src="{{ asset('store/uni/uni4.png') }}" alt="NVIDIA" class="img-fluid"
                            style="max-height: 40px;">
                    </div>
                    <div class="col-4 col-md-4 border p-3 text-center">
                        <img src="{{ asset('store/uni/uni5.png') }}" alt="Cisco" class="img-fluid"
                            style="max-height: 40px;">
                    </div>
                    <div class="col-4 col-md-4 border p-3 text-center">
                        <img src="{{ asset('store/uni/uni6.png') }}" alt="Toshiba" class="img-fluid"
                            style="max-height: 40px;">
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<div class="slider-container2 bg-gray100 " dir="rtl">
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-start container gap-3">
        <div class="mt-4 w-100 col-12 col-md-5">
            <!-- Heading -->
            <h2 class="text-dark font-weight-bold font-30 gradient-title">
                حوّل فرق العمل في مؤسستك من خلال المهارات المطلوبة
            </h2>

            <!-- Subheading -->
            <p class="slide-hint text-dark mt-20 ">
                قدم حلول تعلم تُسرّع من عملية التحول في الأعمال
            </p>
        </div>

        <!-- Features Grid -->
        <div class="col-12 col-md-7 row justify-content-start align-items-start">
            <!-- In-Demand Skills -->
            <div class="col-md-6 d-flex mb-4 flex-column align-items-start justify-content-start gap-1">
                <img src="{{asset('store/uni/1.svg')}}" class="h-auto" width="18%" alt="site logo">
                <h5 class="text-dark font-weight-bold">مهارات مطلوبة</h5>
                <p class="slide-hint text-dark">
                    درّب فرقك على المهارات التي تهم أكثر في الاقتصاد الرقمي اليوم
                </p>
            </div>

            <!-- World-Class Content -->
            <div class="col-md-6 d-flex mb-4 flex-column align-items-start justify-content-start gap-1">
                <img src="{{asset('store/uni/2.svg')}}" class="h-auto" width="20%" alt="site logo">
                <h5 class="text-dark font-weight-bold">محتوى عالمي المستوى</h5>
                <p class="slide-hint text-dark">
                    وفر وصولًا إلى محتوى من أكثر من 350 جامعة وشريك صناعي رائد
                </p>
            </div>

            <!-- Hands-on Learning -->
            <div class="col-md-6 d-flex mb-4 flex-column align-items-start justify-content-start gap-1">
                <img src="{{asset('store/uni/3.svg')}}" class="h-auto" width="18%" alt="site logo">
                <h5 class="text-dark font-weight-bold">تعلم عملي</h5>
                <p class="slide-hint text-dark">
                    اكتسب خبرة حقيقية من خلال تعلم المهارات، والأدوات، والتقنيات المبتكرة
                </p>
            </div>

            <!-- Measurement & Benchmarking -->
            <div class="col-md-6 d-flex mb-4 flex-column align-items-start justify-content-start gap-1">
                <img src="{{asset('store/uni/4.svg')}}" class="h-auto" width="20%" alt="site logo">

                <h5 class="text-dark font-weight-bold">القياس والمقارنة المرجعية</h5>
                <p class="slide-hint text-dark">
                    تابع التقدم، وبيّن قيمة التعلم للأعمال، وركّز استراتيجيتك التعليمية
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container py-50" dir="rtl">
    <div class="row align-items-center justify-content-between">
        <!-- Text Section (Right in RTL) -->
        <div class="col-lg-5 mb-4 mb-lg-0 text-end">
            <h1 class="section-title">تعلم من الأفضل</h1>
            <p class="slide-hint text-dark mb-4">
                وفّر في تكاليف التدريب من خلال محتوى مخصص وشهادات معترف بها من أكثر من 350 شركة وجامعة رائدة حول العالم.
            </p>
            <ul class="list-unstyled text-muted fw-light">
                <li class="mb-2 text-dark"><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%"
                        alt="site logo"> تعلم مباشرة من أكثر من 20 من كبرى كليات الأعمال</li>
                <li class="mb-2 text-dark"><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%"
                        alt="site logo"> استخدم أكاديميات مخصصة للوظائف أو لتطوير المهارات</li>
                <li class="mb-2 text-dark"><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%"
                        alt="site logo"> موازنة المهارات المهنية مع التدريب على المهارات التقنية</li>
                <li class="mb-2 text-dark"><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%"
                        alt="site logo"> تقديم التعلم بأشكال متعددة: من مقاطع الفيديو إلى المشاريع الإرشادية والشهادات
                    الاحترافية</li>
            </ul>
            <a href="#" class="text-orange fw-bold">
                استكشف المحتوى العالمي <span>&larr;</span>
            </a>
        </div>

        <!-- Logos Grid (Left in RTL) -->
        <div class="col-lg-6 text-center">
            <img src="{{asset('store/uni/allcompanies.png')}}" class="img-companies" alt="site logo">
        </div>
    </div>
</div>


<div class="mt-50">
    <div class="container">
        <div class="row align-items-center align-items-lg-start flex-column flex-lg-row">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-center align-items-lg-start mt-sm-20" dir="rtl">
                <!-- Headline -->
                <h2 class="text-dark font-weight-bold w-100 font-30 gradient-title">
                    هل أنت مستعد لقيادة شركتك <br> خلال التغيير؟
                </h2>

                <!-- Subheading -->
                <p class="slide-hint text-dark mt-20 w-100">
                    دعنا نتواصل لمناقشة كيف يمكن لـ <strong>Clerax</strong> أن تساعدك في:
                </p>

                <!-- Checklist -->
                <ul class="checklist w-100 mt-1">
                    <li><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%" alt="site logo">تسريع
                        التحول الرقمي</li>
                    <li><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%" alt="site logo">تحسين
                        مرونة شركتك</li>
                    <li><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%" alt="site logo">تعزيز
                        إنتاجية الموظفين وابتكاراتهم</li>
                    <li><img src="{{asset('store/new/check.svg')}}" class="h-auto" width="3%" alt="site logo">تمكين
                        الموظفين من دفع عجلة النمو</li>
                </ul>

                <!-- Company Heading -->
                <p class="mt-50 font-weight-bold w-100 text-dark font-20">أهم الشركات تطور مهاراتها مع Clerax</p>

                <!-- Logos Grid -->
                <div class="row row-cols-3 row-cols-md-3  w-100 align-items-center text-center mt-3">
                    <div class="p-2"><img src="{{asset('store/uni/uni1.png')}}" class="h-auto" width="45%"
                            alt="site logo"></div>
                    <div class="p-2"><img src="{{asset('store/uni/uni2.png')}}" class="h-auto" width="45%"
                            alt="site logo"></div>
                    <div class="p-2"><img src="{{asset('store/uni/uni3.png')}}" class="h-auto" width="45%"
                            alt="site logo"></div>
                    <div class="p-2"><img src="{{asset('store/uni/uni4.png')}}" class="h-auto" width="45%"
                            alt="site logo"></div>
                    <div class="p-2"><img src="{{asset('store/uni/uni5.png')}}" class="h-auto" width="45%"
                            alt="site logo"></div>
                    <div class="p-2"><img src="{{asset('store/uni/uni6.png')}}" class="h-auto" width="45%"
                            alt="site logo"> </div>
                </div>
            </div>


            <div class="col-12 col-md-8 col-lg-6 mt-50 mt-lg-0">
                <form class="p-4 border rounded-sm bg-white shadow-sm">
                    <div class="row g-3">
                        <!-- First & Last Name -->
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" placeholder="الاسم الاول" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" placeholder="الاسم الاخير" required>
                        </div>

                        <!-- Email & Phone -->
                        <div class="col-md-6 py-2">
                            <input type="email" class="form-control" placeholder="البريد الالكترونى" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="mobile" class="form-control" placeholder="رقم الهاتف" required>
                        </div>

                        <!-- Organization Type -->
                        <div class="col-12 py-2">
                            <input type="text" class="form-control" placeholder="نوع الشركة" required>
                        </div>

                        <!-- Company Name & Size -->
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" placeholder="اسم الشركة" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" placeholder="عدد العاملين بالشركة" required>
                        </div>

                        <!-- Country -->
                        <div class="col-12 py-2">
                            <input type="text" class="form-control" placeholder="البلد" required>
                        </div>
                    </div>

                    <!-- Disclaimer -->
                    <p class="mt-3 small text-muted">
                        من خلال إرسال معلوماتك في النموذج أعلاه، فإنك توافق على
                        <a href="#" class="text-primary">شروط الاستخدام </a> و
                        <a href="#" class="text-primary">سياسة الخصوصية </a>الخاصة بنا.
                        قد نستخدم هذه المعلومات للتواصل معك و/أو استخدام بيانات من أطراف ثالثة لتخصيص تجربتك.
                    </p>

                    <!-- Submit Button -->
                    <button type="submit" class="btn new-btn w-100 p-10 mt-3">Submit</button>
                </form>
            </div>


        </div>
    </div>
</div>

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/select2/select2.min.js"></script>
<script src="/assets/default/js/parts/forgot_password.min.js"></script>
@endpush