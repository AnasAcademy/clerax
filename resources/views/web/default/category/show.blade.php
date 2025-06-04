@extends(getTemplate() . '.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
@endpush

<style>
    .swiper-button-prev,
    .swiper-button-next {
        color: #ff6600;
        top: 40%;
        z-index: 10;
    }
</style>

@section('content')
    <section class="site-top-banner search-top-banner  position-relative">
        <img src="{{ asset('store/new/hero-placeholder.png') }}" width="" alt="" />

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center ">
                <div class="col-12">
                    <div class="top-search-categories-form">
                        <div class="d-flex align-items-center mb-3 gap-1 flex-row justify-content-start">
                            <a href="/" class="text-dark fw-bold">الرئيسية</a>
                            <span class="mx-1 font-24">›</span>
                            <a href="#" class="text-dark fw-bold">التصنيفات</a>
                            <span class="mx-1 font-24">›</span>
                            <span class="text-orange fw-bold">{{ $category->title }}</span>
                        </div>
                        <h1 class="text-orange font-30 mb-15">
                            {{ preg_replace('/[^\p{L}\s]+/u', ' ', $category->slug) }}
                        </h1>

                        <h3 class="my-20 mt-50">أهم المجالات فى {{ preg_replace('/[^\p{L}\s]+/u', ' ', $category->slug) }}
                        </h3>

                        <div class="d-flex flex-wrap gap-1 p-0 ">
                            @foreach ($category->subCategories as $sub)
                                <a href="{{ $sub->getUrl() }}" class="btn p-2" style="background-color:#E7E7E7;"
                                    target="_blank">
                                    {{ preg_replace('/[^\p{L}\s]+/u', ' ', $sub->slug) }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- <h2 class="mb-4 text-end section-title">{{ preg_replace('/[^\p{L}\s]+/u', ' ', $category->slug) }}</h2> --}}

    <section class="home-sections home-sections-swiper container">
        <h2 class="section-title mb-20">برامج تؤهل للشهادات احترافية</h2>

        @php
            $latestWebinars = collect();
            foreach ($category->subCategories as $sub) {
                $latestWebinars = $latestWebinars->merge($sub->webinars);
            }
            $latestWebinars = $latestWebinars->sortByDesc('created_at')->take(12); // You can adjust this
        @endphp

        <div class="swiper-container latestSwiper position-relative px-1">
            <div class="swiper-wrapper">
                @foreach ($latestWebinars as $product)
                    <div class="swiper-slide">
                        <a href="{{ $product->getUrl() }}" class="d-block">
                            <div class="product-card d-flex flex-column">
                                <figure class="d-flex flex-column ">
                                    <div class="image-box">
                                        <div class="image-box__a">
                                            <img src="{{ url($product->thumbnail) }}" class="img-cover h-100"
                                                alt="{{ $product->title }}">
                                        </div>
                                    </div>
                                    <figcaption
                                        class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                                        @php
                                            $creator = $product->creator ?? null;
                                            $isOrganization = $creator && $creator->role_name === 'organization';
                                            $organization = $isOrganization ? $creator : $creator->organization ?? null;
                                        @endphp
                                        <div class="align-items-center d-flex flex-row justify-content-start">
                                            <img src="{{ $organization->avatar ?? asset('store/new/default-avatar.svg') }}"
                                                alt="organization avatar" width="10%" height="100%"
                                                style="flex-shrink: 0;">
                                            <span
                                                class="text-gray text-right font-12">{{ $organization->full_name ?? 'none' }}</span>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <h3 class="product-title font-weight-bold font-16 text-dark-blue">
                                                    {{ $product->title ?? $product->slug }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="mt-20 d-flex flex-row justify-content-start gap-1 align-items-center">
                                            <img src="{{ asset('store/new/cert.svg') }}" alt="cert" width="8%" />
                                            <p class="text-dark">{{ trans('home.have-certificate') }}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                        </a>
                    </div>
            </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev text-orange"></div>
        <div class="swiper-button-next text-orange"></div>

    </section>


    {{-- <form action="{{ url()->current() }}" method="get" id="filtersForm">
            @include('web.default.pages.includes.top_filters')

            <div class="row mt-20">
                <div class="col-12">
                    @if (empty(request()->get('card')) or request()->get('card') == 'grid')
                        <div class="row">
                            @foreach ($category->subCategories as $sub)
                                @foreach ($sub->webinars as $webinar)
                                    <div class="col-12 col-md-4 mt-20">
                                        @include('web.default.includes.webinar.grid-card', [
                                            'webinar' => $webinar,
                                        ])
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @elseif(request()->get('card') == 'list')
                        @foreach ($category->subCategories as $sub)
                            @foreach ($sub->webinars as $webinar)
                                @include('web.default.includes.webinar.list-card', ['webinar' => $webinar])
                            @endforeach
                        @endforeach
                    @endif
                </div>

            </div>
        </form> --}}

    {{-- No built-in pagination due to nested subcategory loop --}}
    {{-- If webinars are loaded directly with pagination, add: --}}
    {{-- {{ $webinars->appends(request()->input())->links('vendor.pagination.panel') }} --}}
    </div>

    <section class="home-sections home-sections-swiper container">
        <h2 class="section-title mb-20">الدورات الأكثر طلبا</h2>

        @php
            $latestWebinars = collect();
            foreach ($category->subCategories as $sub) {
                $latestWebinars = $latestWebinars->merge($sub->webinars);
            }
            $latestWebinars = $latestWebinars->sortByDesc('created_at')->take(12); // You can adjust this
        @endphp

        <div class="swiper-container latestSwiper position-relative px-1">
            <div class="swiper-wrapper">
                @foreach ($latestWebinars as $product)
                    <div class="swiper-slide">
                        <a href="{{ $product->getUrl() }}" class="d-block">
                            <div class="product-card d-flex flex-column">
                                <figure class="d-flex flex-column ">
                                    <div class="image-box">
                                        <div class="image-box__a">
                                            <img src="{{ url($product->thumbnail) }}" class="img-cover h-100"
                                                alt="{{ $product->title }}">
                                        </div>
                                    </div>
                                    <figcaption
                                        class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                                        @php
                                            $creator = $product->creator ?? null;
                                            $isOrganization = $creator && $creator->role_name === 'organization';
                                            $organization = $isOrganization ? $creator : $creator->organization ?? null;
                                        @endphp
                                        <div class="align-items-center d-flex flex-row justify-content-start">
                                            <img src="{{ $organization->avatar ?? asset('store/new/default-avatar.svg') }}"
                                                alt="organization avatar" width="10%" height="100%"
                                                style="flex-shrink: 0;">
                                            <span
                                                class="text-gray text-right font-12">{{ $organization->full_name ?? 'none' }}</span>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <h3 class="product-title font-weight-bold font-16 text-dark-blue">
                                                    {{ $product->title ?? $product->slug }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="mt-20 d-flex flex-row justify-content-start gap-1 align-items-center">
                                            <img src="{{ asset('store/new/cert.svg') }}" alt="cert" width="8%" />
                                            <p class="text-dark">{{ trans('home.have-certificate') }}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                        </a>
                    </div>
            </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev text-orange"></div>
        <div class="swiper-button-next text-orange"></div>
        </div>

    </section>

    <section class="home-sections home-sections-swiper container">
        <h2 class="section-title mb-20">أهم برامج تقنية المعلومات</h2>

        @php
            $latestWebinars = collect();
            foreach ($category->subCategories as $sub) {
                $latestWebinars = $latestWebinars->merge($sub->webinars);
            }
            $latestWebinars = $latestWebinars->sortByDesc('created_at')->take(12); // You can adjust this
        @endphp

        <div class="swiper-container latestSwiper position-relative px-1">
            <div class="swiper-wrapper">
                @foreach ($latestWebinars as $product)
                    <div class="swiper-slide">
                        <a href="{{ $product->getUrl() }}" class="d-block">
                            <div class="product-card d-flex flex-column">
                                <figure class="d-flex flex-column ">
                                    <div class="image-box">
                                        <div class="image-box__a">
                                            <img src="{{ url($product->thumbnail) }}" class="img-cover h-100"
                                                alt="{{ $product->title }}">
                                        </div>
                                    </div>
                                    <figcaption
                                        class="product-card-body d-flex flex-column justify-content-between flex-grow-1">
                                        @php
                                            $creator = $product->creator ?? null;
                                            $isOrganization = $creator && $creator->role_name === 'organization';
                                            $organization = $isOrganization ? $creator : $creator->organization ?? null;
                                        @endphp
                                        <div class="align-items-center d-flex flex-row justify-content-start">
                                            <img src="{{ $organization->avatar ?? asset('store/new/default-avatar.svg') }}"
                                                alt="organization avatar" width="10%" height="100%"
                                                style="flex-shrink: 0;">
                                            <span
                                                class="text-gray text-right font-12">{{ $organization->full_name ?? 'none' }}</span>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <h3 class="product-title font-weight-bold font-16 text-dark-blue">
                                                    {{ $product->title ?? $product->slug }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="mt-20 d-flex flex-row justify-content-start gap-1 align-items-center">
                                            <img src="{{ asset('store/new/cert.svg') }}" alt="cert"
                                                width="8%" />
                                            <p class="text-dark">{{ trans('home.have-certificate') }}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                        </a>
                    </div>
            </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev text-orange"></div>
        <div class="swiper-button-next text-orange"></div>
        </div>

    </section>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/default/js/parts/categories.min.js"></script>
    <script>
        new Swiper('.latestSwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            slidesPerGroup: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                576: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                }
            }
        });
    </script>
@endpush
