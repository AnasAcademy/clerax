@extends(getTemplate() . '.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
@endpush

@php
    $chunks = $categories->chunk(5);

@endphp
@section('content')
    <div class="bg-light-gray p-20">
        <div class="container my-4" style="min-height: 48vh;">
            <h2 class="mb-4 text-end">استعرض المهارات والتخصصات</h2>
            <div id="category-slider" class="overflow-hidden position-relative" style="width: 100%;">
                <div id="category-track" class="d-flex transition-transform" style="transition: transform 0.5s ease;">
                    @foreach ($chunks as $group)
                        <div class="category-slide d-flex flex-nowrap" style="min-width: 100%;">
                            {{-- Column 1 (Tall Card) --}}
                            <div class="col-12 col-md-6 col-lg-4 mt-20">
                                @if (isset($group[0]))
                                    <div class="card border-0 overflow-hidden rounded-3"
                                        style="min-height: 100%; aspect-ratio: 4/5;">
                                        <a href="{{ url('/categories/' . $group[0]->slug) }}" class="d-block">
                                            <img src="{{ $group[0]->icon ?? asset('store/new/cat-bg.jpg') }}"
                                                class="object-fit-cover" alt="">
                                            <div class="card-img-overlay d-flex align-items-end p-2">
                                                <h5 class="text-white text-end w-100">{{ $group[0]->title }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            {{-- Column 2 (Cards 2 & 3) --}}
                            <div class="col-12 col-md-6 col-lg-4 d-flex flex-row flex-md-column gap-3 mt-20">
                                @foreach ([$group[1] ?? null, $group[2] ?? null] as $item)
                                    <div class="card flex-grow-1 border-0 overflow-hidden rounded-3"
                                        style="aspect-ratio: 4/2;">
                                        @if ($item)
                                            <a href="{{ url('/categories/' . $item->slug) }}" class="d-block">
                                                <img src="{{ $item->icon ?? asset('store/new/cat-bg.jpg') }}"
                                                    class="w-100 h-100 object-fit-cover" alt="">
                                                <div class="card-img-overlay d-flex align-items-end p-2">
                                                    <h5 class="text-white text-end w-100">{{ $item->title }}</h5>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            {{-- Column 3 (Cards 4 & 5) --}}
                            <div class="col-12 col-md-6 col-lg-4 d-flex flex-row flex-md-column gap-3 mt-20">
                                @foreach ([$group[3] ?? null, $group[4] ?? null] as $item)
                                    <div class="card flex-grow-1 border-0 overflow-hidden rounded-3"
                                        style="aspect-ratio: 4/2;">
                                        @if ($item)
                                            <a href="{{ url('/categories/' . $item->slug) }}" class="d-block">
                                                <img src="{{ $item->icon ?? asset('store/new/cat-bg.jpg') }}"
                                                    class="w-100 h-100 object-fit-cover" alt="">
                                                <div class="card-img-overlay d-flex align-items-end p-2">
                                                    <h5 class="text-white text-end w-100">{{ $item->title }}</h5>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="text-center mt-3">
                <button onclick="slideCategory(-1)" class="btn btn-transparent text-orange mx-2 font-24">‹</button>
                <button onclick="slideCategory(1)" class="btn  btn-transparent text-orange mx-2 font-24">›</button>
            </div>
        </div>
    </div>
    </div>
    </div>

    <section class="home-sections home-sections-swiper container">
        <h2 class="section-title">{{ trans('home.latest-courses-title') }}</h2>

        <!-- Category Tabs -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <div class="d-flex flex-wrap gap-2 mt-4">
                @php $firstRendered = false; @endphp
                @foreach ($latestsubCategories as $subcategory)
                    @if ($subcategory->webinars->count())
                        <button class="btn px-md-4 px-2 py-2 latest-parent-tab {{ !$firstRendered ? 'active' : '' }}"
                            data-id="latest-cat-{{ $subcategory->id }}">
                            {{ $subcategory->title }}
                        </button>
                        @php $firstRendered = true; @endphp
                    @endif
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="/classes" class="text-orange fw-bold">{{ trans('home.show-all') }}</a>
            </div>
        </div>

        <!-- Webinars per Category -->
        @php $firstVisible = false; @endphp
        @foreach ($latestsubCategories as $subcategory)
            @if ($subcategory->webinars->count())
                <div class="p-20 latest-category-content {{ !$firstVisible ? '' : 'd-none' }}"
                    id="latest-cat-{{ $subcategory->id }}">
                    @php $firstVisible = true; @endphp

                    <div class="row p-4">
                        @foreach ($subcategory->webinars->take(3) as $product)
                            <div class="col-12 col-sm-6 col-lg-3 mb-4">
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
                                            @php
                                                $creator = $product->creator ?? null;
                                                $isOrganization = $creator && $creator->role_name === 'organization';
                                                $organization = $isOrganization
                                                    ? $creator
                                                    : $creator->organization ?? null;
                                            @endphp
                                            <div class="align-items-center d-flex flex-row justify-content-start ">
                                                <img src="{{ $organization->avatar ?? asset('store/new//default-avatar.svg') }}"
                                                    alt="organization avatar" width="10%" height="100%"
                                                    style="flex-shrink: 0;">
                                                <span
                                                    class="text-gray text-right font-12">{{ $organization->full_name ?? 'none' }}</span>

                                            </div>
                                            <div>
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <a href="{{ $product->getUrl() }}">
                                                        <h3 class="product-title font-weight-bold font-16 text-dark-blue ">
                                                            {{ $product->title ?? $product->slug }}
                                                        </h3>
                                                    </a>
                                                </div>
                                                {{-- <p class="slide-hint text-dark mb-0 mt-2"
                                    style="white-space: normal; word-wrap: break-word;">
                                    {{ strip_tags($product->description) ?? 'لا يوجد وصف متاح حالياً.' }}
                                </p> --}}
                                            </div>

                                            <div>
                                                {{-- <div class="product-price-box mt-10 text-dark">
                                    @if (!empty($isRewardProducts) && !empty($product->point))
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
                                </div> --}}

                                                <div
                                                    class="mt-20 d-flex flex-row justify-content-start gap-1 align-items-center">
                                                    {{-- <a class="btn new-btn  w-50 p-1 font-12" href="/login">
                                        {{ trans('home.Enrol') }}
                                    </a> --}}
                                                    <img src="{{ asset('store/new/cert.svg') }}" alt="cert"
                                                        width="8%" />
                                                    <p class="section-hint text-dark">
                                                        {{ trans('home.have-certificate') }}</p>

                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($subcategory->webinars->count() > 4)
                        <div class="text-center mt-3">
                            <a href="/products?category_id={{ $subcategory->id }}"
                                class="btn btn-outline-primary  px-4 py-2">
                                {{ trans('home.show-more-in-product') }} {{ $subcategory->title }}
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </section>

    <section class="home-sections home-sections-swiper container">
        <h2 class="section-title">{{ trans('home.popular-courses-title') }}</h2>
        <!-- Category Tabs -->
        <div class="d-flex justify-content-between flex-column flex-md-row align-items-start align-items-md-center">
            <div class="d-flex flex-wrap gap-2 mt-4">
                @php $firstRendered = false; @endphp
                @foreach ($featureWebinars->groupBy(fn($item) => $item->webinar->category->id ?? null) as $catId => $features)
                    @php
                        $category = optional($features->first()->webinar->category);
                        if (!$category || $features->filter(fn($f) => $f->webinar)->isEmpty()) {
                            continue;
                        }
                    @endphp
                    <button class="btn px-4 py-2 popular-category-tab {{ !$firstRendered ? 'active' : '' }}"
                        data-id="popular-cat-{{ $catId }}">
                        {{ $category->title }}
                    </button>
                    @php $firstRendered = true; @endphp
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="/classes" class="text-orange fw-bold">{{ trans('home.show-all') }}</a>
            </div>
        </div>

        <!-- Webinars per Category -->
        @php $firstVisible = false; @endphp
        @foreach ($featureWebinars->groupBy(fn($item) => $item->webinar->category->id ?? null) as $catId => $features)
            @php
                $category = optional($features->first()->webinar->category);
                if (!$category || $features->filter(fn($f) => $f->webinar)->isEmpty()) {
                    continue;
                }
            @endphp
            <div class="bg-light-gray p-20 popular-category-content {{ !$firstVisible ? '' : 'd-none' }}"
                style="background-image: url('{{ asset('store/new/newdarkbg.png') }}'); background-size: cover;"
                id="popular-cat-{{ $catId }}">
                @php $firstVisible = true; @endphp

                <div class="row p-4 align-items-center justify-content-start">
                    <div class="col-12 col-lg-3 text-light">
                        <h2> {{ trans('home.popular-courses-desc1') }}</h2>
                        <p> {{ trans('home.popular-courses-desc2') }}</p>
                        <p><a href="/classes" class="text-orange">{{ trans('home.show-all-programs') }}</a></p>
                    </div>
                    @foreach ($features->filter(fn($f) => $f->webinar) as $feature)
                        @php $webinar = $feature->webinar; @endphp
                        <a href="{{ url('/webinar/' . $webinar->slug) }}">

                            <div class="col-12 col-sm-6 col-lg-3 mt-20">

                                <div class="product-card h-100 d-flex flex-column">
                                    <figure class="d-flex flex-column h-100">
                                        <div class="image-box">
                                            <a href="{{ url('/webinar/' . $webinar->slug) }}" class="image-box__a">
                                                <img src="{{ url($webinar->thumbnail ?? '/store/1/default_images/no-image.jpg') }}"
                                                    class="img-cover h-100" alt="{{ $webinar->title }}">
                                            </a>
                                        </div>

                                        <figcaption
                                            class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                                            <div>
                                                @php
                                                    $creator = $product->creator ?? null;
                                                    $isOrganization =
                                                        $creator && $creator->role_name === 'organization';
                                                    $organization = $isOrganization
                                                        ? $creator
                                                        : $creator->organization ?? null;
                                                @endphp
                                                <div class="align-items-center d-flex flex-row justify-content-start">
                                                    <img src="{{ $organization->avatar ?? asset('store/new//default-avatar.svg') }}"
                                                        alt="organization avatar" width="10%" height="10%"
                                                        style="flex-shrink: 0;">

                                                    <span
                                                        class="text-gray text-right font-12">{{ $organization->full_name ?? 'none' }}</span>

                                                </div>
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <a href="{{ url('/webinar/' . $webinar->slug) }}">
                                                        <h3 class="product-title font-weight-bold font-16 text-dark-blue ">
                                                            {{ $webinar->title ?? $webinar->slug }}
                                                        </h3>
                                                    </a>
                                                </div>
                                                {{-- <p class="slide-hint text-dark mb-0 mt-2"
                                    style="white-space: normal; word-wrap: break-word;">
                                    {{ strip_tags($webinar->description) ?? 'لا يوجد وصف متاح حالياً.' }}
                                </p> --}}
                                            </div>

                                            <div>
                                                {{-- <div class="product-price-box mt-10 text-dark">
                                    @if ($webinar->price > 0)
                                    <span class="real">
                                        {{ handlePrice($webinar->price, true, true, false, null, true, 'store') }}
                                    </span>
                                    @else
                                    <span class="real">{{ trans('public.free') }}</span>
                                    @endif
                                </div> --}}

                                                <div
                                                    class="mt-20 d-flex flex-row justify-content-start gap-1 align-items-center">
                                                    {{-- <a class="btn new-btn  w-50 p-1 font-12" href="/login">
                                        {{ trans('home.Enrol') }}
                                    </a> --}}
                                                    <img src="{{ asset('store/new/cert.svg') }}" alt="cert"
                                                        width="8%" />
                                                    <p class="section-hint text-dark">
                                                        {{ trans('home.have-certificate') }}</p>

                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>

                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>

                @if ($features->count() > 4)
                    <div class="text-center mt-3">
                        <a href="/classes" class="btn btn-outline-primary  px-4 py-2">
                            عرض جميع الباقات التعليمية
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const track = document.getElementById('category-track');
        const slides = document.querySelectorAll('.category-slide');
        const totalSlides = slides.length;

        function updateSlider() {
            const sliderWidth = document.getElementById('category-slider').offsetWidth;
            track.style.transform = `translateX(-${currentIndex * sliderWidth}px)`;
        }

        window.slideCategory = function(direction) {
            currentIndex += direction;

            if (currentIndex < 0) currentIndex = 0;
            if (currentIndex > totalSlides - 1) currentIndex = totalSlides - 1;

            updateSlider();
        };

        window.addEventListener('resize', updateSlider);
        updateSlider();

        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }, 3000);
    });
</script>


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
