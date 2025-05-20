@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
@endpush

@php
$steps = [
[
'id' => 'step1',
'title' => 'أنشئ حسابك في ثوانٍ',
'description' => 'كل ما تحتاجه هو بريد إلكتروني، وابدأ رحلتك بخطوة بسيطة <span class="text-orange fw-bold">ابدأ
    الآن</span>.',
'image' => '/store/new/step1.png',
'icon' => '/store/new/card1.png',
],
[
'id' => 'step2',
'title' => 'اختر الدورة التي تناسبك',
'description' => 'استعرض مكتبة متنوعة من الدورات، واختر ما يلائمك ويتناسب معك.',
'image' => '/store/new/middle-section.png',
'icon' => '/store/new/card2.png',
],
[
'id' => 'step3',
'title' => 'تعلّم وتقدّم بسرعتك الخاصة',
'description' => 'ابدأ التعلم في أي وقت، واصل دراستك بدون ضغط أو مواعيد.',
'image' => '/store/new/last-section.png',
'icon' => '/store/new/card3.png',
],
];

$faqs = [
[
'question' => 'ما اللغة المستخدمة في تقديم الدورات؟',
'answer' => 'تُقدَّم معظم الدورات باللغة العربية مع وجود بعض المحتوى باللغة الإنجليزية حسب التخصص.'
],
[
'question' => 'هل تؤهلني هذه الدورات لسوق العمل؟',
'answer' => 'نعم، تم تصميم هذه الدورات لتزويدك بالمهارات العملية المطلوبة في سوق العمل.'
],
[
'question' => 'هل هناك متطلبات للقبول؟',
'answer' => 'معظم الدورات لا تتطلب متطلبات سابقة، ويمكن لأي شخص التسجيل والبدء بالتعلم.'
],
[
'question' => 'هل يمكنني التعلم إلى جانب عملي أو دراستي؟',
'answer' => 'بالتأكيد! يمكنك التعلم بأي وقت يناسبك من خلال النظام المرن للدورات.'
],
[
'question' => 'هل أحصل على شهادة عند إنهاء الدورة؟',
'answer' => 'نعم، تحصل على شهادة إتمام معتمدة بعد إتمامك لكل متطلبات الدورة بنجاح.'
],
[
'question' => 'هل هناك دعم فني؟',
'answer' => 'نعم، يوجد فريق دعم متاح لمساعدتك في حال واجهت أي مشاكل تقنية.'
]
];
@endphp


@section('content')

@if(!empty($heroSectionData))

@if(!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == "1")
@push('scripts_bottom')
<script src="/assets/default/vendors/lottie/lottie-player.js"></script>
@endpush
@endif

<!-- <section class="slider-container  {{ ($heroSection == "2") ? 'slider-hero-section2' : '' }}" @if(empty($heroSectionData['is_video_background'])) style="background-image: url('{{ $heroSectionData['hero_background'] }}')" @endif> -->
<section
    class="slider-container bg-info mx-20 mx-lg-80 mb-50 position-relative home-hero-section {{ ($heroSection == "2") ? 'slider-hero-section2' : '' }}"
    @if(empty($heroSectionData['is_video_background'])) @endif>

    @if($heroSection == "1")
    <!-- @if(!empty($heroSectionData['is_video_background']))
    <video playsinline autoplay muted loop id="homeHeroVideoBackground" class="img-cover">
        <source src="{{ $heroSectionData['hero_background'] }}" type="video/mp4">
    </video>
    @endif -->

    <div class="mask"></div>
    @endif

    <div class="container user-select-none">

        @if($heroSection == "2")
        <div class="row slider-content align-items-center hero-section2 flex-column-reverse flex-md-row">

            <div class="col-12 col-md-7 col-lg-6">
                <h1 class="text-dark font-weight-bold">
                    <!-- {{ $heroSectionData['title'] }} -->
                    المعرفة هي قوتك الحقيقية.
                </h1>
                <h1 class="text-orange font-weight-bold gradient-title">
                    <!-- {{ $heroSectionData['title'] }} -->
                    تعلم بذكاء .. تطور بثقة
                </h1>
                <p class="slide-hint text-dark mt-20">
                    <!-- {!! nl2br($heroSectionData['description']) !!} -->
                    كل مهارة تكتسبها اليوم، تبني بها خطوة في طريق طموحك.
                    و أنسكو ، تقدم لك تجربة تعليمية متكاملة تجمع بين الجودة، الدعم المستمر، والمحتوى العملي.
                </p>

                <!-- <form action="/search" method="get" class="d-inline-flex mt-30 mt-lg-30 w-100">
                                <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100">
                                    <input type="text" name="search" class="form-control border-0 mr-lg-50" placeholder="{{ trans('home.slider_search_placeholder') }}"/>
                                    <button type="submit" class="btn btn-primary rounded-pill">{{ trans('home.find') }}</button>
                                </div>
                            </form> -->
            </div>

            <div class="col-12 col-md-5 col-lg-6 ">
                <!-- @if(!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == "1")
                                <lottie-player src="{{ $heroSectionData['hero_vector'] }}" background="transparent" speed="1" class="w-100" loop autoplay></lottie-player>
                            @else
                                <img src="{{ $heroSectionData['hero_vector'] }}" alt="{{ $heroSectionData['title'] }}" class="img-cover">
                            @endif -->
                <div class="position-relative img-fluid text-center" style="width: 100%; height: auto;">
                    <img src="{{ asset('store/new/ellipse.png') }}" alt="background shape"
                        class="position-absolute rotate-animation"
                        style="z-index: 1000; width: 20%; max-width: 250px; top: 5%;" />


                    <img src="{{ asset('store/new/hero.png') }}" alt="{{ $heroSectionData['title'] ?? 'hero' }}"
                        width="70%" />
                </div>

            </div>

        </div>
        @else
        <div class="text-center slider-content">
            <h1>{{ $heroSectionData['title'] }}</h1>
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <p class="mt-30 slide-hint">{!! nl2br($heroSectionData['description']) !!}</p>

                    <form action="/search" method="get" class="d-inline-flex mt-30 mt-lg-50 w-100">
                        <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100">
                            <input type="text" name="search" class="form-control border-0 mr-lg-50"
                                placeholder="{{ trans('home.slider_search_placeholder') }}" />
                            <button type="submit" class="btn btn-primary rounded-pill">{{ trans('home.find') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endif


{{-- Statistics --}}
@include('web.default.pages.includes.home_statistics')
<section class="home-sections home-sections-swiper container">
    <div>
        <h2 class="section-title">
            {{ trans('home.all-products-title') }}
        </h2>
        <p class="section-hint text-dark"> {{ trans('home.all-products-desc') }}</p>
    </div>

    <div class="d-flex justify-content-between flex-column flex-md-row align-items-start align-items-md-center">
        <div class="d-flex flex-wrap gap-2 mt-4">
            @foreach($structuredCategories as $cat)
            <button class="btn px-4 py-2 structured-parent-tab {{ $loop->first ? 'active' : '' }}"
                data-id="structured-cat-{{ $cat->id }}">
                {{ $cat->title }}
            </button>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="/products" class="text-orange fw-bold">{{ trans('home.show-all') }}</a>
        </div>
    </div>
    @foreach($structuredCategories as $cat)
    <div class="bg-gray100 p-20 structured-category-content {{ !$loop->first ? 'd-none' : '' }}"
        id="structured-cat-{{ $cat->id }}">

        @if($cat->subCategories->count())
        <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2">
            @foreach($cat->subCategories->take(4) as $sub)
            <button class="structured-sub-tab p-2 m-1 font-12 rounded-pill {{ $loop->first ? 'active' : '' }}"
                data-parent="structured-cat-{{ $cat->id }}" data-id="sub-{{ $sub->id }}">
                {{ $sub->title }}
            </button>
            @endforeach
        </div>
        @endif

        @foreach($cat->subCategories as $sub)
        <div class="subcategory-content {{ !$loop->parent->first || !$loop->first ? 'd-none' : '' }}"
            id="sub-{{ $sub->id }}">
            <div class="row p-4">
                @foreach($sub->webinars->take(3) as $product)
                <div class="col-12 col-sm-6 col-lg-4 mb-4 ">
                    <div class="product-card h-100 d-flex flex-column">
                        <figure class="d-flex flex-column h-100">
                            <div class="image-box">
                                <a href="{{ $product->getUrl() }}" class="image-box__a">
                                    <img src="{{ url($product->thumbnail) }}" class="img-cover h-100"
                                        alt="{{ $product->title }}">
                                </a>
                            </div>

                            <figcaption
                                class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <a href="{{ $product->getUrl() }}">
                                            <h3 class="product-title font-weight-bold font-16 text-dark-blue">
                                                {{ $product->title ?? $product->slug }}
                                            </h3>
                                        </a>
                                        <img src="{{ asset('store/new/cert.svg') }}" alt="cert" width="8%" />
                                    </div>

                                    <p class="slide-hint text-dark mb-0 mt-2"
                                        style="white-space: normal; word-wrap: break-word;">
                                        {{ strip_tags($product->description) ?? 'لا يوجد وصف متاح حالياً.' }}
                                    </p>
                                </div>

                                <div>
                                    <div class="product-price-box mt-10 text-dark">
                                        @if(!empty($isRewardProducts) && !empty($product->point))
                                        <span class="text-warning real font-14">
                                            {{ $product->point }} {{ trans('update.points') }}
                                        </span>
                                        @elseif($product->price > 0)
                                        <span class="real">
                                            {{ handlePrice($product->price, true, true, false, null, true, 'store') }}
                                        </span>
                                        @else
                                        <span class="real">{{ trans('public.free') }}</span>
                                        @endif
                                    </div>

                                    <div class="mt-20 d-flex flex-row justify-content-between align-items-center">
                                        <a type="submit" class="btn new-btn rounded-pill w-50 p-1 font-12"
                                            href="/login">
                                            {{ trans('home.Enrol') }}
                                        </a>
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                                            <span class="text-gray">Google</span>
                                            <img src="/assets/default/img/google.png" alt="google" width="20px"
                                                height="20px">
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>

                </div>
                @endforeach
            </div>
            @if($sub->webinars->count() > 4)
            <div class="text-center mt-3">
                <a href="/products?category_id={{ $sub->id }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    {{ trans('home.show-more-in-product') }} {{ $sub->title }}
                </a>
            </div>
            @endif
        </div>
        @endforeach

        <div class="text-center text-md-right">
            <a href="/products?category_id={{ $cat->id }}" class="btn new-btn rounded-pill px-4 py-10">
                {{ trans('home.show-more-in-product') }} {{ $cat->title }}
            </a>
        </div>
    </div>
    @endforeach
</section>

<div class="slider-container2 bg-gray100 mt-80 ">
    <div class="d-flex flex-column justify-content-center align-items-center container w-75 gap-3">
        <h2 class="text-dark font-weight-bold font-30 w-lg-75 text-center">{{ trans('home.partners-section-text') }}
        </h2>
        <div class="d-flex flex-row justify-content-center align-items-center gap-3 flex-wrap">
            <img src="{{asset('store/uni/uni1.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni2.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni3.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni4.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni5.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni6.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni7.png')}}" alt="uni" class="">
            <img src="{{asset('store/uni/uni8.png')}}" alt="uni" class="">
        </div>
    </div>
</div>

<section class="home-sections home-sections-swiper container">
    <h2 class="section-title">{{ trans('home.popular-courses-title') }}</h2>

    <!-- Category Tabs -->
    <div class="d-flex justify-content-between flex-column flex-md-row align-items-start align-items-md-center">
        <div class="d-flex flex-wrap gap-2 mt-4">
            @php $firstRendered = false; @endphp
            @foreach($featureWebinars->groupBy(fn($item) => $item->webinar->category->id ?? null) as $catId =>
            $features)
            @php
            $category = optional($features->first()->webinar->category);
            if (!$category || $features->filter(fn($f) => $f->webinar)->isEmpty()) continue;
            @endphp
            <button class="btn px-4 py-2 popular-category-tab {{ !$firstRendered ? 'active' : '' }}"
                data-id="popular-cat-{{ $catId }}">
                {{ $category->title }}
            </button>
            @php $firstRendered = true; @endphp
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="/bundles" class="text-orange fw-bold">{{ trans('home.show-all') }}</a>
        </div>
    </div>

    <!-- Webinars per Category -->
    @php $firstVisible = false; @endphp
    @foreach($featureWebinars->groupBy(fn($item) => $item->webinar->category->id ?? null) as $catId => $features)
    @php
    $category = optional($features->first()->webinar->category);
    if (!$category || $features->filter(fn($f) => $f->webinar)->isEmpty()) continue;
    @endphp
    <div class="bg-gray100 p-20 popular-category-content {{ !$firstVisible ? '' : 'd-none' }}"
        id="popular-cat-{{ $catId }}">
        @php $firstVisible = true; @endphp

        <div class="row p-4">
            @foreach($features->filter(fn($f) => $f->webinar) as $feature)
            @php $webinar = $feature->webinar; @endphp
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="product-card h-100 d-flex flex-column">
                    <figure class="d-flex flex-column h-100">
                        <div class="image-box">
                            <a href="{{ url('/webinar/'.$webinar->slug) }}" class="image-box__a">
                                <img src="{{ url($webinar->thumbnail ?? '/store/1/default_images/no-image.jpg') }}"
                                    class="img-cover h-100" alt="{{ $webinar->title }}">
                            </a>
                        </div>

                        <figcaption class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <a href="{{ url('/webinar/'.$webinar->slug) }}">
                                        <h3 class="product-title font-weight-bold font-16 text-dark-blue">
                                            {{ $webinar->title ?? $webinar->slug }}
                                        </h3>
                                    </a>
                                    <img src="{{ asset('store/new/cert.svg') }}" alt="cert" width="8%" />
                                </div>
                                <p class="slide-hint text-dark mb-0 mt-2"
                                    style="white-space: normal; word-wrap: break-word;">
                                    {{ strip_tags($webinar->description) ?? 'لا يوجد وصف متاح حالياً.' }}
                                </p>
                            </div>

                            <div>
                                <div class="product-price-box mt-10 text-dark">
                                    @if($webinar->price > 0)
                                    <span class="real">
                                        {{ handlePrice($webinar->price, true, true, false, null, true, 'store') }}
                                    </span>
                                    @else
                                    <span class="real">{{ trans('public.free') }}</span>
                                    @endif
                                </div>

                                <div class="mt-20 d-flex flex-row justify-content-between align-items-center">
                                    <a class="btn new-btn rounded-pill w-50 p-1 font-12" href="/login">
                                        {{ trans('home.Enrol') }}
                                    </a>
                                    <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                                        <span class="text-gray">Google</span>
                                        <img src="/assets/default/img/google.png" alt="google" width="20" height="20">
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>

        @if($features->count() > 4)
        <div class="text-center mt-3">
            <a href="/bundles" class="btn btn-outline-primary rounded-pill px-4 py-2">
                عرض جميع الباقات التعليمية
            </a>
        </div>
        @endif
    </div>
    @endforeach
</section>

<section class="home-sections home-sections-swiper container">
    <div class="row align-items-center p-5 rounded-3 mt-5">

        <!-- Right: Section Text -->
        <div class="col-12 col-md-6 my-20 my-md-0">
            <h1 class="text-dark font-weight-bold font-36">
                {{ trans('home.student-stories-title-line1') }}
                <br>
                <span class="text-orange">{{ trans('home.student-stories-title-line2') }}</span>
            </h1>
            <p class="text-muted my-4">
                {{ trans('home.student-stories-desc-line1') }}
                <br>
                <span class="text-orange">
                    {{ trans('home.student-stories-desc-line1') }}
                </span>
            </p>
            <div>
                <button id="prevTestimonial" class="btn border me-2 rounded-circle px-2 py-25 py-md-2 fs-4 shadow">
                    <img src="{{ asset('store/new/right-arrow.png') }}" alt="previous" class="w-100">
                </button>
                <button id="nextTestimonial" class="btn border rounded-circle px-2 py-25 py-md-2 fs-4 shadow">
                    <img src="{{ asset('store/new/left-arrow.png') }}" alt="next" class="w-100">
                </button>
            </div>
        </div>

        <!-- Left: Testimonial Card -->
        <div class="col-12 col-md-6 mb-4 mb-md-0 p-50 bg-gray100 rounded">
            <img id="testimonialImage" src="{{ asset('store/new/testimonial.png') }}" alt="testimonial" class="w-100">
        </div>
    </div>
</section>


<section class="home-sections home-sections-swiper container">
    <h2 class="section-title">{{ trans('home.latest-courses-title') }}</h2>

    <!-- Category Tabs -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="d-flex flex-wrap gap-2 mt-4">
            @php $firstRendered = false; @endphp
            @foreach($latestsubCategories as $subcategory)
            @if($subcategory->webinars->count())
            <button class="btn px-md-4 px-2 py-2 latest-parent-tab {{ !$firstRendered ? 'active' : '' }}"
                data-id="latest-cat-{{ $subcategory->id }}">
                {{ $subcategory->title }}
            </button>
            @php $firstRendered = true; @endphp
            @endif
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="/products" class="text-orange fw-bold">{{ trans('home.show-all') }}</a>
        </div>
    </div>

    <!-- Webinars per Category -->
    @php $firstVisible = false; @endphp
    @foreach($latestsubCategories as $subcategory)
    @if($subcategory->webinars->count())
    <div class="bg-gray100 p-20 latest-category-content {{ !$firstVisible ? '' : 'd-none' }}"
        id="latest-cat-{{ $subcategory->id }}">
        @php $firstVisible = true; @endphp

        <div class="row p-4">
            @foreach($subcategory->webinars->take(3) as $product)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="product-card h-100 d-flex flex-column">
                    <figure class="d-flex flex-column h-100">
                        <div class="image-box">
                            <a href="{{ $product->getUrl() }}" class="image-box__a">
                                <img src="{{ url($product->thumbnail) }}" class="img-cover h-100"
                                    alt="{{ $product->title }}">
                            </a>
                        </div>
                        <figcaption class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <a href="{{ $product->getUrl() }}">
                                        <h3 class="product-title font-weight-bold font-16 text-dark-blue">
                                            {{ $product->title ?? $product->slug }}
                                        </h3>
                                    </a>
                                    <img src="{{ asset('store/new/cert.svg') }}" alt="cert" width="8%" />
                                </div>
                                <p class="slide-hint text-dark mb-0 mt-2"
                                    style="white-space: normal; word-wrap: break-word;">
                                    {{ strip_tags($product->description) ?? 'لا يوجد وصف متاح حالياً.' }}
                                </p>
                            </div>

                            <div>
                                <div class="product-price-box mt-10 text-dark">
                                    @if(!empty($isRewardProducts) && !empty($product->point))
                                    <span class="text-warning real font-14">
                                        {{ $product->point }} {{ trans('update.points') }}
                                    </span>
                                    @elseif($product->price > 0)
                                    <span class="real">
                                        {{ handlePrice($product->price, true, true, false, null, true, 'store') }}
                                    </span>
                                    @else
                                    <span class="real">{{ trans('public.free') }}</span>
                                    @endif
                                </div>

                                <div class="mt-20 d-flex flex-row justify-content-between align-items-center">
                                    <a class="btn new-btn rounded-pill w-50 p-1 font-12" href="/login">
                                        {{ trans('home.Enrol') }}
                                    </a>
                                    <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                                        <span class="text-gray">Google</span>
                                        <img src="/assets/default/img/google.png" alt="google" width="20px"
                                            height="20px">
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>

        @if($subcategory->webinars->count() > 4)
        <div class="text-center mt-3">
            <a href="/products?category_id={{ $subcategory->id }}"
                class="btn btn-outline-primary rounded-pill px-4 py-2">
                {{ trans('home.show-more-in-product') }} {{ $subcategory->title }}
            </a>
        </div>
        @endif
    </div>
    @endif
    @endforeach
</section>

@foreach($homeSections as $homeSection)

@if($homeSection->name == \App\Models\HomeSection::$store_products and !empty($newProducts) and
!$newProducts->isEmpty())
<!-- <section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="section-title">{{ trans('update.store_products') }}</h2>
            <p class="section-hint">{{ trans('update.store_products_hint') }}</p>
        </div>

        <a href="/products" class="btn btn-border-white">{{ trans('update.all_products') }}</a>
    </div>

    <div class="mt-10 position-relative">
        <div class="swiper-container new-products-swiper px-12">
            <div class="swiper-wrapper py-20">

                @foreach($newProducts as $newProduct)
                <div class="swiper-slide">
                    @include('web.default.products.includes.card',['product' => $newProduct])
                </div>
                @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination new-products-swiper-pagination"></div>
        </div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$testimonials and !empty($testimonials) and
!$testimonials->isEmpty())
<!-- <div class="position-relative home-sections testimonials-container">

    <div id="parallax1" class="ltr">
        <div data-depth="0.2" class="gradient-box left-gradient-box"></div>
    </div>

    <section class="container home-sections home-sections-swiper">
        <div class="text-center">
            <h2 class="section-title">{{ trans('home.testimonials') }}</h2>
            <p class="section-hint">{{ trans('home.testimonials_hint') }}</p>
        </div>

        <div class="position-relative">
            <div class="swiper-container testimonials-swiper px-12">
                <div class="swiper-wrapper">

                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div
                            class="testimonials-card position-relative py-15 py-lg-30 px-10 px-lg-20 rounded-sm shadow bg-white text-center">
                            <div class="d-flex flex-column align-items-center">
                                <div class="testimonials-user-avatar">
                                    <img src="{{ $testimonial->user_avatar }}" alt="{{ $testimonial->user_name }}"
                                        class="img-cover rounded-circle">
                                </div>
                                <h4 class="font-16 font-weight-bold text-orange mt-30">{{ $testimonial->user_name }}
                                </h4>
                                <span class="d-block font-14 text-gray">{{ $testimonial->user_bio }}</span>
                                @include('web.default.includes.webinar.rate',['rate' => $testimonial->rate,
                                'dontShowRate' => true])
                            </div>

                            <p class="mt-25 text-gray font-14">{!! nl2br($testimonial->comment) !!}</p>

                            <div class="bottom-gradient"></div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            <div class="d-flex justify-content-center">
                <div class="swiper-pagination testimonials-swiper-pagination"></div>
            </div>
        </div>
    </section>

    <div id="parallax2" class="ltr">
        <div data-depth="0.4" class="gradient-box right-gradient-box"></div>
    </div>

    <div id="parallax3" class="ltr">
        <div data-depth="0.8" class="gradient-box bottom-gradient-box"></div>
    </div>
</div> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$subscribes and !empty($subscribes) and !$subscribes->isEmpty())
<!-- <div class="home-sections position-relative subscribes-container pe-none user-select-none">
    <div id="parallax4" class="ltr d-none d-md-block">
        <div data-depth="0.2" class="gradient-box left-gradient-box"></div>
    </div>

    <section class="container home-sections home-sections-swiper">
        <div class="text-center">
            <h2 class="section-title">{{ trans('home.subscribe_now') }}</h2>
            <p class="section-hint">{{ trans('home.subscribe_now_hint') }}</p>
        </div>

        <div class="position-relative mt-30">
            <div class="swiper-container subscribes-swiper px-12">
                <div class="swiper-wrapper py-20">

                    @foreach($subscribes as $subscribe)
                    @php
                    $subscribeSpecialOffer = $subscribe->activeSpecialOffer();
                    @endphp

                    <div class="swiper-slide">
                        <div
                            class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-50 pb-20 px-20">
                            @if($subscribe->is_popular)
                            <span
                                class="badge badge-primary badge-popular px-15 py-5">{{ trans('panel.popular') }}</span>
                            @elseif(!empty($subscribeSpecialOffer))
                            <span
                                class="badge badge-danger badge-popular px-15 py-5">{{ trans('update.percent_off', ['percent' => $subscribeSpecialOffer->percent]) }}</span>
                            @endif

                            <div class="plan-icon">
                                <img src="{{ $subscribe->icon }}" class="img-cover" alt="">
                            </div>

                            <h3 class="mt-20 font-30 text-orange">{{ $subscribe->title }}</h3>
                            <p class="font-weight-500 text-gray mt-10">{{ $subscribe->description }}</p>

                            <div class="d-flex align-items-start mt-30">
                                @if(!empty($subscribe->price) and $subscribe->price > 0)
                                @if(!empty($subscribeSpecialOffer))
                                <div class="d-flex align-items-end line-height-1">
                                    <span
                                        class="font-36 text-primary">{{ handlePrice($subscribe->getPrice(), true, true, false, null, true) }}</span>
                                    <span
                                        class="font-14 text-gray ml-5 text-decoration-line-through">{{ handlePrice($subscribe->price, true, true, false, null, true) }}</span>
                                </div>
                                @else
                                <span
                                    class="font-36 text-primary line-height-1">{{ handlePrice($subscribe->price, true, true, false, null, true) }}</span>
                                @endif
                                @else
                                <span class="font-36 text-primary line-height-1">{{ trans('public.free') }}</span>
                                @endif
                            </div>

                            <ul class="mt-20 plan-feature">
                                <li class="mt-10">{{ $subscribe->days }} {{ trans('financial.days_of_subscription') }}
                                </li>
                                <li class="mt-10">
                                    @if($subscribe->infinite_use)
                                    {{ trans('update.unlimited') }}
                                    @else
                                    {{ $subscribe->usable_count }}
                                    @endif
                                    <span class="ml-5">{{ trans('update.subscribes') }}</span>
                                </li>
                            </ul>

                            @if(auth()->check())
                            <form action="/panel/financial/pay-subscribes" method="post" class="w-100">
                                {{ csrf_field() }}
                                <input name="amount" value="{{ $subscribe->price }}" type="hidden">
                                <input name="id" value="{{ $subscribe->id }}" type="hidden">

                                <div class="d-flex align-items-center mt-50 w-100">
                                    <button type="submit"
                                        class="btn btn-primary {{ !empty($subscribe->has_installment) ? '' : 'btn-block' }}">{{ trans('update.purchase') }}</button>

                                    @if(!empty($subscribe->has_installment))
                                    <a href="/panel/financial/subscribes/{{ $subscribe->id }}/installments"
                                        class="btn btn-outline-primary flex-grow-1 ml-10">{{ trans('update.installments') }}</a>
                                    @endif
                                </div>
                            </form>
                            @else
                            <a href="/login" class="btn btn-primary btn-block mt-50">{{ trans('update.purchase') }}</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="d-flex justify-content-center">
                <div class="swiper-pagination subscribes-swiper-pagination"></div>
            </div>

        </div>
    </section>

    <div id="parallax5" class="ltr d-none d-md-block">
        <div data-depth="0.4" class="gradient-box right-gradient-box"></div>
    </div>

    <div id="parallax6" class="ltr d-none d-md-block">
        <div data-depth="0.6" class="gradient-box bottom-gradient-box"></div>
    </div>
</div> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$featured_classes and !empty($featureWebinars) and
!$featureWebinars->isEmpty())
<!-- <section class="home-sections home-sections-swiper container">
    <div class="px-20 px-md-0">
        <h2 class="section-title">{{ trans('home.featured_classes') }}</h2>
        <p class="section-hint">{{ trans('home.featured_classes_hint') }}</p>
    </div>

    <div class="feature-slider-container position-relative d-flex justify-content-center mt-10">
        <div class="swiper-container features-swiper-container pb-25">
            <div class="swiper-wrapper py-10">
                @foreach($featureWebinars as $feature)
                <div class="swiper-slide">

                    <a href="{{ $feature->webinar->getUrl() }}">
                        <div class="feature-slider d-flex h-100"
                            style="background-image: url('{{ $feature->webinar->getImage() }}')">
                            <div class="mask"></div>
                            <div class="p-5 p-md-25 feature-slider-card">
                                <div class="d-flex flex-column feature-slider-body position-relative h-100">
                                    @if($feature->webinar->bestTicket() < $feature->webinar->price)
                                        <span
                                            class="badge badge-danger mb-2 ">{{ trans('public.offer',['off' => $feature->webinar->bestTicket(true)['percent']]) }}</span>
                                        @endif
                                        <a href="{{ $feature->webinar->getUrl() }}">
                                            <h3 class="card-title mt-1">{{ $feature->webinar->title }}</h3>
                                        </a>

                                        <div class="user-inline-avatar mt-15 d-flex align-items-center">
                                            <div class="avatar bg-gray200">
                                                <img src="{{ $feature->webinar->teacher->getAvatar() }}"
                                                    class="img-cover" alt="{{ $feature->webinar->teacher->full_naem }}">
                                            </div>
                                            <a href="{{ $feature->webinar->teacher->getProfileUrl() }}" target="_blank"
                                                class="user-name font-14 ml-5">{{ $feature->webinar->teacher->full_name }}</a>
                                        </div>

                                        <p class="mt-25 feature-desc text-gray">{{ $feature->description }}</p>

                                        @include('web.default.includes.webinar.rate',['rate' =>
                                        $feature->webinar->getRate()])

                                        <div
                                            class="feature-footer mt-auto d-flex align-items-center justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="clock" width="20" height="20"
                                                        class="webinar-icon"></i>
                                                    <span
                                                        class="duration ml-5 text-dark-blue font-14">{{ convertMinutesToHourAndMinute($feature->webinar->duration) }}
                                                        {{ trans('home.hours') }}</span>
                                                </div>

                                                <div class="vertical-line mx-10"></div>

                                                <div class="d-flex align-items-center">
                                                    <i data-feather="calendar" width="20" height="20"
                                                        class="webinar-icon"></i>
                                                    <span
                                                        class="date-published ml-5 text-dark-blue font-14">{{ dateTimeFormat(!empty($feature->webinar->start_date) ? $feature->webinar->start_date : $feature->webinar->created_at,'j M Y') }}</span>
                                                </div>
                                            </div>

                                            <div class="feature-price-box">
                                                @if(!empty($feature->webinar->price ) and $feature->webinar->price > 0)
                                                @if($feature->webinar->bestTicket() < $feature->webinar->price)
                                                    <span
                                                        class="real">{{ handlePrice($feature->webinar->bestTicket(), true, true, false, null, true) }}</span>
                                                    @else
                                                    {{ handlePrice($feature->webinar->price, true, true, false, null, true) }}
                                                    @endif
                                                    @else
                                                    {{ trans('public.free') }}
                                                    @endif


                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="swiper-pagination features-swiper-pagination"></div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$subscribes and !empty($subscribes) and !$subscribes->isEmpty())
@endif

@if($homeSection->name == \App\Models\HomeSection::$latest_classes and !empty($latestWebinars) and
!$latestWebinars->isEmpty())

@endif


@if($homeSection->name == \App\Models\HomeSection::$find_instructors and !empty($findInstructorSection))
<!-- <section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $findInstructorSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">{{ $findInstructorSection['description'] ?? '' }}
                </p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($findInstructorSection['button1']) and !empty($findInstructorSection['button1']['title'])
                    and !empty($findInstructorSection['button1']['link']))
                    <a href="{{ $findInstructorSection['button1']['link'] }}"
                        class="btn btn-primary mr-15">{{ $findInstructorSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($findInstructorSection['button2']) and !empty($findInstructorSection['button2']['title'])
                    and !empty($findInstructorSection['button2']['link']))
                    <a href="{{ $findInstructorSection['button2']['link'] }}"
                        class="btn btn-outline-primary">{{ $findInstructorSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <img src="{{ $findInstructorSection['image'] }}" class="find-instructor-section-hero"
                    alt="{{ $findInstructorSection['title'] }}">
                <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle">
                <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots">

                <div
                    class="example-instructor-card bg-white rounded-sm shadow-lg  p-5 p-md-15 d-flex align-items-center">
                    <div class="example-instructor-card-avatar">
                        <img src="/assets/default/img/home/toutor_finder.svg" class="img-cover rounded-circle"
                            alt="user name">
                    </div>

                    <div class="flex-grow-1 ml-15">
                        <span
                            class="font-14 font-weight-bold text-orange d-block">{{ trans('update.looking_for_an_instructor') }}</span>
                        <span
                            class="text-gray font-12 font-weight-500">{{ trans('update.find_the_best_instructor_now') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$reward_program and !empty($rewardProgramSection))
<!-- <section class="home-sections home-sections-swiper container reward-program-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="position-relative reward-program-section-hero-card">
                <img src="{{ $rewardProgramSection['image'] }}" class="reward-program-section-hero"
                    alt="{{ $rewardProgramSection['title'] }}">

                <div class="example-reward-card bg-white rounded-sm shadow-lg p-5 p-md-15 d-flex align-items-center">
                    <div class="example-reward-card-medal">
                        <img src="/assets/default/img/rewards/medal.png" class="img-cover rounded-circle" alt="medal">
                    </div>

                    <div class="flex-grow-1 ml-15">
                        <span
                            class="font-14 font-weight-bold text-orange d-block">{{ trans('update.you_got_50_points') }}</span>
                        <span
                            class="text-gray font-12 font-weight-500">{{ trans('update.for_completing_the_course') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $rewardProgramSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">{{ $rewardProgramSection['description'] ?? '' }}
                </p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($rewardProgramSection['button1']) and !empty($rewardProgramSection['button1']['title'])
                    and !empty($rewardProgramSection['button1']['link']))
                    <a href="{{ $rewardProgramSection['button1']['link'] }}"
                        class="btn btn-primary mr-15">{{ $rewardProgramSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($rewardProgramSection['button2']) and !empty($rewardProgramSection['button2']['title'])
                    and !empty($rewardProgramSection['button2']['link']))
                    <a href="{{ $rewardProgramSection['button2']['link'] }}"
                        class="btn btn-outline-primary">{{ $rewardProgramSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$become_instructor and !empty($becomeInstructorSection))
<!-- <section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $becomeInstructorSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">
                    {{ $becomeInstructorSection['description'] ?? '' }}</p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($becomeInstructorSection['button1']) and
                    !empty($becomeInstructorSection['button1']['title']) and
                    !empty($becomeInstructorSection['button1']['link']))
                    <a href="{{ empty($authUser) ? '/login' : (($authUser->isUser()) ? $becomeInstructorSection['button1']['link'] : '/panel/financial/registration-packages') }}"
                        class="btn btn-primary mr-15">{{ $becomeInstructorSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($becomeInstructorSection['button2']) and
                    !empty($becomeInstructorSection['button2']['title']) and
                    !empty($becomeInstructorSection['button2']['link']))
                    <a href="{{ empty($authUser) ? '/login' : (($authUser->isUser()) ? $becomeInstructorSection['button2']['link'] : '/panel/financial/registration-packages') }}"
                        class="btn btn-outline-primary">{{ $becomeInstructorSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <img src="{{ $becomeInstructorSection['image'] }}" class="find-instructor-section-hero"
                    alt="{{ $becomeInstructorSection['title'] }}">
                <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle">
                <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots">

                <div
                    class="example-instructor-card bg-white rounded-sm shadow-lg border p-5 p-md-15 d-flex align-items-center">
                    <div class="example-instructor-card-avatar">
                        <img src="/assets/default/img/home/become_instructor.svg" class="img-cover rounded-circle"
                            alt="user name">
                    </div>

                    <div class="flex-grow-1 ml-15">
                        <span
                            class="font-14 font-weight-bold text-orange d-block">{{ trans('update.become_an_instructor') }}</span>
                        <span
                            class="text-gray font-12 font-weight-500">{{ trans('update.become_instructor_tagline') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="home-sections container">
    <div class="container">

        <div
            class="row slider-content align-items-center hero-section2 flex-column flex-md-row justify-content-between gap-1">
            <div class="col-12 col-md-5">
                <img src="{{asset('store/new/middle-section.png')}}" alt="img" class="last-section-img">
            </div>

            <div class="col-12 col-md-6 d-flex flex-column align-items-start ">
                <h2 class="section-title">{{ trans('home.self-invest-title') }}</h2>
                <p class="section-hint text-dark">
                    <span class="text-orange">{{ trans('home.with-anasco') }}</span>
                    {{ trans('home.self-invest-desc-line1') }}
                <p>
                    <span class="text-orange">{{ trans('home.self-invest-desc-line2') }}</span>
            </div>

        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$forum_section and !empty($forumSection))
<!-- <section class="home-sections home-sections-swiper container find-instructor-section position-relative">
    <div class="row align-items-center">
        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">
                <img src="{{ $forumSection['image'] }}" class="find-instructor-section-hero"
                    alt="{{ $forumSection['title'] }}">
                <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle">
                <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots">
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-dark">{{ $forumSection['title'] ?? '' }}</h2>
                <p class="font-16 font-weight-normal text-gray mt-10">{{ $forumSection['description'] ?? '' }}</p>

                <div class="mt-35 d-flex align-items-center">
                    @if(!empty($forumSection['button1']) and !empty($forumSection['button1']['title']) and
                    !empty($forumSection['button1']['link']))
                    <a href="{{ $forumSection['button1']['link'] }}"
                        class="btn btn-primary mr-15">{{ $forumSection['button1']['title'] }}</a>
                    @endif

                    @if(!empty($forumSection['button2']) and !empty($forumSection['button2']['title']) and
                    !empty($forumSection['button2']['link']))
                    <a href="{{ $forumSection['button2']['link'] }}"
                        class="btn btn-outline-primary">{{ $forumSection['button2']['title'] }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$video_or_image_section and !empty($boxVideoOrImage))
<!-- <section class="home-sections home-sections-swiper position-relative">
    <div class="home-video-mask"></div>
    <div class="container home-video-container d-flex flex-column align-items-center justify-content-center position-relative"
        style="background-image: url('{{ $boxVideoOrImage['background'] ?? '' }}')">
        <a href="{{ $boxVideoOrImage['link'] ?? '' }}"
            class="home-video-play-button d-flex align-items-center justify-content-center position-relative">
            <i data-feather="play" width="36" height="36" class=""></i>
        </a>

        <div class="mt-50 pt-10 text-center">
            <h2 class="home-video-title">{{ $boxVideoOrImage['title'] ?? '' }}</h2>
            <p class="home-video-hint mt-10">{{ $boxVideoOrImage['description'] ?? '' }}</p>
        </div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$instructors and !empty($instructors) and !$instructors->isEmpty())
<!-- <section class="home-sections container">
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="section-title">{{ trans('home.instructors') }}</h2>
            <p class="section-hint">{{ trans('home.instructors_hint') }}</p>
        </div>

        <a href="/instructors" class="btn btn-border-white">{{ trans('home.all_instructors') }}</a>
    </div>

    <div class="position-relative mt-20 ltr">
        <div class="owl-carousel customers-testimonials instructors-swiper-container">

            @foreach($instructors as $instructor)
            <div class="item">
                <div class="shadow-effect">
                    <div class="instructors-card d-flex flex-column align-items-center justify-content-center">
                        <div class="instructors-card-avatar">
                            <img src="{{ $instructor->getAvatar(108) }}" alt="{{ $instructor->full_name }}"
                                class="rounded-circle img-cover">
                        </div>
                        <div class="instructors-card-info mt-10 text-center">
                            <a href="{{ $instructor->getProfileUrl() }}" target="_blank">
                                <h3 class="font-16 font-weight-bold text-dark-blue">{{ $instructor->full_name }}</h3>
                            </a>

                            <p class="font-14 text-gray mt-5">{{ $instructor->bio }}</p>
                            <div class="stars-card d-flex align-items-center justify-content-center mt-10">
                                @php
                                $i = 5;
                                @endphp
                                @while(--$i >= 5 - $instructor->rates())
                                <i data-feather="star" width="20" height="20" class="active"></i>
                                @endwhile
                                @while($i-- >= 0)
                                <i data-feather="star" width="20" height="20" class=""></i>
                                @endwhile
                            </div>

                            @if(!empty($instructor->hasMeeting()))
                            <a href="{{ $instructor->getProfileUrl() }}?tab=appointments"
                                class="btn btn-primary btn-sm rounded-pill mt-15">{{ trans('home.reserve_a_live_class') }}</a>
                            @else
                            <a href="{{ $instructor->getProfileUrl() }}"
                                class="btn btn-primary btn-sm rounded-pill mt-15">{{ trans('public.profile') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section> -->
@endif

{{-- Ads Bannaer --}}
@if($homeSection->name == \App\Models\HomeSection::$half_advertising_banner and !empty($advertisingBanners2) and
count($advertisingBanners2))
<!-- <div class="home-sections container">
    <div class="row">
        @foreach($advertisingBanners2 as $banner2)
        <div class="col-{{ $banner2->size }}">
            <a href="{{ $banner2->link }}">
                <img src="{{ $banner2->image }}" class="img-cover rounded-sm" alt="{{ $banner2->title }}">
            </a>
        </div>
        @endforeach
    </div>
</div> -->
@endif
{{-- ./ Ads Bannaer --}}

@if($homeSection->name == \App\Models\HomeSection::$organizations and !empty($organizations) and
!$organizations->isEmpty())
<!-- <section class="home-sections home-sections-swiper container">
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="section-title">{{ trans('home.organizations') }}</h2>
            <p class="section-hint">{{ trans('home.organizations_hint') }}</p>
        </div>

        <a href="/organizations" class="btn btn-border-white">{{ trans('home.all_organizations') }}</a>
    </div>

    <div class="position-relative mt-20">
        <div class="swiper-container organization-swiper-container px-12">
            <div class="swiper-wrapper py-20">

                @foreach($organizations as $organization)
                <div class="swiper-slide">
                    <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                        <div class="home-organizations-avatar">
                            <img src="{{ $organization->getAvatar(120) }}" class="img-cover rounded-circle"
                                alt="{{ $organization->full_name }}">
                        </div>
                        <a href="{{ $organization->getProfileUrl() }}"
                            class="mt-25 d-flex flex-column align-items-center justify-content-center">
                            <h3 class="home-organizations-title">{{ $organization->full_name }}</h3>
                            <p class="home-organizations-desc mt-10">{{ $organization->bio }}</p>
                            <span class="home-organizations-badge badge mt-15">{{ $organization->webinars_count }}
                                {{ trans('panel.classes') }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="swiper-pagination organization-swiper-pagination"></div>
        </div>
    </div>
</section> -->
@endif

@if($homeSection->name == \App\Models\HomeSection::$blog and !empty($blog) and !$blog->isEmpty())
<section class="home-sections container">
    <div class="row align-items-center flex-column flex-md-row justify-content-between gap-3">
        <!-- Cards (Right on desktop) -->
        <div class="col-md-6 col-lg-5">
            <h5 class="text-orange font-weight-bold mb-2 font-30">ثلاث خطوات</h5>
            <h2 class="text-dark font-weight-bold font-30 mb-4">وتكون في طريقك للتعلم!</h2>

            <div class="d-flex flex-column gap-3">
                @foreach($steps as $index => $step)
                <div class="step-card p-3 rounded cursor-pointer {{ $loop->first ? 'active' : '' }}"
                    data-id="{{ $step['id'] }}">
                    <div class="d-flex justify-content-start mb-2 gap-3">
                        <img src="{{ $step['icon'] }}" alt="icon" class="ms-2" width="30" height="30">
                        <div class="d-flex flex-column justify-content-start">
                            <h5 class="fw-bold mb-0">{{ $step['title'] }}</h5>
                            <p class="text-muted mb-0">{!! $step['description'] !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        <!-- Image (Left on desktop) -->
        <div class="col-md-6  mb-4 mb-md-0">
            @foreach($steps as $index => $step)
            <img src="{{ $step['image'] }}" alt="Step {{ $index + 1 }}"
                class="step-image img-fluid {{ $loop->first ? '' : 'd-none' }}" data-image="{{ $step['id'] }}">
            @endforeach
        </div>
    </div>
</section>
@endif

@if($homeSection->name == \App\Models\HomeSection::$blog and !empty($blog) and !$blog->isEmpty())
<section class="home-sections container">
    <div class="mb-4">
        <h3 class="section-title">الأسئلة الشائعة</h3>
        <p class="text-dark">كل ما تحتاج معرفته لتبدأ بثقة</p>
    </div>

    <div id="faq-list" class="w-lg-50">
        @foreach($faqs as $index => $faq)
        <div class="faq-item py-3 border-bottom {{ $index > 3 ? 'd-none extra-faq' : '' }}">
            <div class="d-flex justify-content-start gap-1 align-items-center cursor-pointer toggle-faq"
                data-index="{{ $index }}">
                <span class="text-primary">
                    <img src="{{ asset('store/new/faqarrow.png') }}" alt="arrow"
                        class="faq-toggle-arrow transition-rotate" />
                </span>
                <span class="font-weight-bold">{{ $faq['question'] }}</span>
            </div>
            <div class="faq-answer mt-2 text-muted d-none" id="answer-{{ $index }}">
                {{ $faq['answer'] }}
            </div>
        </div>
        @endforeach
    </div>

    @if(count($faqs) > 4)
    <div class="mt-4">
        <button class="btn btn-link text-orange p-0 d-flex align-items-center" id="toggleMoreFaqs">
            <span>عرض جميع الأسئلة الشائعة</span>
            <span class="faq-arrow transition-rotate">
                <img src="{{asset('store/new/downarrow.png')}}" alt="arrow" width="18" />
            </span>
        </button>
    </div>

    @endif
</section>

@endif

@if($homeSection->name == \App\Models\HomeSection::$blog and !empty($blog) and !$blog->isEmpty())
<section class="home-sections container">
    <div class="container">

        <div
            class="row slider-content align-items-center hero-section2 flex-column flex-md-row justify-content-between gap-1">
            <div class="col-12 col-md-5 col-lg-4">
                <img src="{{asset('store/new/last-section.png')}}" alt="img" class="last-section-img">
            </div>

            <div class="col-12 col-md-6  d-flex flex-column align-items-start ">
                <h2 class="text-dark font-weight-bold font-30">
                    {{ trans('home.more-than-courses1') }}
                    <br>
                    {{ trans('home.more-than-courses2') }}
                </h2>
                <a type="submit" class="btn new-btn rounded-pill mt-20 w-lg-25 py-10" href="/login">
                    {{ trans('home.login-now') }}
                </a>
            </div>

        </div>
    </div>
</section>
@endif

</div>

@endforeach
@endsection

@push('scripts_bottom')
<!-- // all courses -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle structured parent tab switching
    document.querySelectorAll('.structured-parent-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            const id = tab.dataset.id;

            // Toggle parent tab
            document.querySelectorAll('.structured-parent-tab').forEach(t => t.classList.remove(
                'active'));
            tab.classList.add('active');

            // Show the selected category section
            document.querySelectorAll('.structured-category-content').forEach(content => {
                content.classList.add('d-none');
            });
            const categoryContent = document.getElementById(id);
            categoryContent.classList.remove('d-none');

            // Auto activate first subcategory
            const firstSubTab = categoryContent.querySelector('.structured-sub-tab');
            if (firstSubTab) firstSubTab.click();
        });
    });

    // Handle structured subcategory switching
    document.querySelectorAll('.structured-sub-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            const subId = tab.dataset.id;
            const parentId = tab.dataset.parent;

            // Toggle subcategory tabs
            document.querySelectorAll(`.structured-sub-tab[data-parent="${parentId}"]`).forEach(
                t => t.classList.remove('active'));
            tab.classList.add('active');

            // Toggle subcategory content
            document.querySelectorAll(`#${parentId} .subcategory-content`).forEach(sub => {
                sub.classList.add('d-none');
            });
            document.getElementById(subId).classList.remove('d-none');
        });
    });
});
</script>


<!-- // steps section -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.step-card');
    const images = document.querySelectorAll('.step-image');

    let currentIndex = 0;
    let autoSlideInterval;

    function activateCard(index) {
        const card = cards[index];
        const imageId = card.dataset.id;

        // Remove all active states
        cards.forEach(c => c.classList.remove('active'));
        images.forEach(img => img.classList.add('d-none'));

        // Activate the selected one
        card.classList.add('active');
        const image = document.querySelector(`.step-image[data-image="${imageId}"]`);
        if (image) image.classList.remove('d-none');
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % cards.length;
            activateCard(currentIndex);
        }, 3000); // Change duration as needed
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    // Start automatic sliding
    startAutoSlide();

    // Allow manual click and reset auto slide
    cards.forEach((card, index) => {
        card.addEventListener('click', () => {
            stopAutoSlide();
            currentIndex = index;
            activateCard(index);
            startAutoSlide(); // Optional: resume auto sliding after manual click
        });
    });
});
</script>

<!-- // faq -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle answer visibility and rotate arrow
    document.querySelectorAll('.toggle-faq').forEach(item => {
        item.addEventListener('click', function() {
            const index = this.dataset.index;
            const answer = document.getElementById('answer-' + index);
            const arrow = this.querySelector('.faq-toggle-arrow');

            answer.classList.toggle('d-none');
            arrow.classList.toggle('rotate-90');
        });
    });

    // Optional: handle show more/less FAQs
    const toggleBtn = document.getElementById('toggleMoreFaqs');
    const arrow = toggleBtn?.querySelector('.faq-arrow');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            const isExpanded = arrow?.classList.toggle('rotate-180');

            document.querySelectorAll('.extra-faq').forEach(el => el.classList.toggle('d-none'));
            this.querySelector('span').textContent = isExpanded ?
                'إخفاء الأسئلة الإضافية' :
                'عرض جميع الأسئلة الشائعة';
        });
    }
});
</script>

<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.bundle-category-tab');
        const panels = document.querySelectorAll('.bundle-category-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(t => t.classList.remove('active'));
                panels.forEach(p => p.classList.add('d-none'));

                this.classList.add('active');
                const target = document.getElementById(this.dataset.id);
                if (target) target.classList.remove('d-none');
            });
        });
    });
</script> -->

<!-- // latest -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.latest-parent-tab');
    const contents = document.querySelectorAll('.latest-category-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.add('d-none'));

            this.classList.add('active');
            const target = document.getElementById(this.dataset.id);
            if (target) {
                target.classList.remove('d-none');
            }
        });
    });
});
</script>


<!-- // feature -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const popularTabs = document.querySelectorAll('.popular-category-tab');
    const popularContents = document.querySelectorAll('.popular-category-content');

    popularTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active state from all
            popularTabs.forEach(t => t.classList.remove('active'));
            popularContents.forEach(c => c.classList.add('d-none'));

            // Activate clicked
            this.classList.add('active');
            const target = document.getElementById(this.dataset.id);
            if (target) target.classList.remove('d-none');
        });
    });
});
</script>


<!-- // testimonials -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const images = [
        "{{ asset('store/new/testimonial.png') }}",
        "{{ asset('store/new/hero.png') }}",
        "{{ asset('store/new/ellipse.png') }}"
    ];

    let currentIndex = 0;
    const testimonialImg = document.getElementById('testimonialImage');
    const nextBtn = document.getElementById('nextTestimonial');
    const prevBtn = document.getElementById('prevTestimonial');

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        testimonialImg.src = images[currentIndex];
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        testimonialImg.src = images[currentIndex];
    });
});
</script>


<script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
<script src="/assets/default/vendors/owl-carousel2/owl.carousel.min.js"></script>
<script src="/assets/default/vendors/parallax/parallax.min.js"></script>
<script src="/assets/default/js/parts/home.min.js"></script>
@endpush