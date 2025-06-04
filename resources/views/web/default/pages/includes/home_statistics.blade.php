@php
    $statisticsSettings = getStatisticsSettings();
@endphp

@if(!empty($statisticsSettings['enable_statistics']))
    @if(!empty($statisticsSettings['display_default_statistics']) and !empty($homeDefaultStatistics))
        <div class="">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box teacher">
                                <img src="/assets/default/img/stats/teacher.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10">{{ $homeDefaultStatistics['skillfulTeachersCount'] }}</strong>
                            <h4 class="stat-title">{{ trans('home.skillful_teachers') }}</h4>
                            <p class="stat-desc mt-10">{{ trans('home.skillful_teachers_hint') }}</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box student">
                                <img src="/assets/default/img/stats/student.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10">{{ $homeDefaultStatistics['studentsCount'] }}</strong>
                            <h4 class="stat-title">{{ trans('home.happy_students') }}</h4>
                            <p class="stat-desc mt-10">{{ trans('home.happy_students_hint') }}</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box video">
                                <img src="/assets/default/img/stats/video.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10">{{ $homeDefaultStatistics['liveClassCount'] }}</strong>
                            <h4 class="stat-title">{{ trans('home.live_classes') }}</h4>
                            <p class="stat-desc mt-10">{{ trans('home.live_classes_hint') }}</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                        <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                            <div class="stat-icon-box course">
                                <img src="/assets/default/img/stats/course.svg" alt="" class="img-fluid"/>
                            </div>
                            <strong class="stat-number mt-10">{{ $homeDefaultStatistics['offlineCourseCount'] }}</strong>
                            <h4 class="stat-title">{{ trans('home.offline_courses') }}</h4>
                            <p class="stat-desc mt-10">{{ trans('home.offline_courses_hint') }}</p>
                        </div>
                    </div>
                </div> -->

                <div class="row slider-content align-items-center flex-column-reverse flex-md-row">

                        <div class="col-12 col-md-7 col-lg-6 d-flex flex-column align-items-start mt-20">
                            <h2 class="text-dark font-weight-bold w-75 font-30 gradient-title">
                                <!-- {{ $heroSectionData['title'] }} -->
                                  <span>طور مهاراتك، وافتح أبوابًا</span>
                                  <br>
                                  <span>جديدة لمستقبلك</span>
                            </h2>
                            <p class="slide-hint text-dark mt-20 w-75">
                                <!-- {!! nl2br($heroSectionData['description']) !!} -->
                                في عالم يتغير بسرعة، لم يعد الثبات خيارًا. التعلّم المستمر هو البوصلة التي تقودنا لنصبح نسخة أفضل .
                            </p>
                            <p class="slide-hint text-dark mt-20 w-75">
                                 <!-- {!! nl2br($heroSectionData['description']) !!} -->
                                كل مهارة جديدة نكتسبها، تفتح لنا أفقًا لم نكن نراه من قبل.<br>
                                فالنجاح لا يحدث صدفة، بل هو نتيجة لاختيارات صغيرة تبدأ بالإرادة… وتستمر بالشغف.
                            </p>

                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-start mt-20 gap-3 w-100" >
                                <div class="col-12 col-md-5 d-flex flex-column align-items-start justify-content-start p-0 border-bottom-gray pb-15">
                                    <h2 class="text-dark font-36">85%</h2>
                                    <p class="slide-hint text-dark">
                                        <span class="font-weight-bold">من المدراء</span>
                                        يربطون بين الترقية والقدرة على التعلّم والتطور المستمر.
                                    </p>
                                </div>
                                <div class="col-12 col-md-5 d-flex flex-column align-items-start justify-content-start p-0 border-bottom-gray pb-15">
                                    <h2 class="text-dark font-36">73%</h2>
                                    <p class="slide-hint text-dark">
                                        <span class="font-weight-bold">من الشركات</span>
                                        تفضّل توظيف أشخاص يسعون لتطوير أنفسهم بانتظام.
                                    </p>
                                </div>
                            </div>

                            <!-- <form action="/search" method="get" class="d-inline-flex mt-30 mt-lg-30 w-100">
                                <div class="form-group d-flex align-items-center m-0 slider-search p-10 bg-white w-100">
                                    <input type="text" name="search" class="form-control border-0 mr-lg-50" placeholder="{{ trans('home.slider_search_placeholder') }}"/>
                                    <button type="submit" class="btn btn-primary ">{{ trans('home.find') }}</button>
                                </div>
                            </form> -->
                            <button type="submit" class="btn new-btn  mt-20 w-lg-50 py-10 px-2">
                                <!-- {{ trans('home.find') }} -->
                               <a> مهاراتك تستحق أن تتطور — ابدأ الآن</a>
                            </button>

                        </div>

                        <div class="col-12 col-md-5 col-lg-6">
                            <!-- @if(!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == "1")
                                <lottie-player src="{{ $heroSectionData['hero_vector'] }}" background="transparent" speed="1" class="w-100" loop autoplay></lottie-player>
                            @else
                                <img src="{{ $heroSectionData['hero_vector'] }}" alt="{{ $heroSectionData['title'] }}" class="img-cover">
                            @endif -->
                            <img src="{{asset('store/new/couses-hero2.png')}}" alt="{{ $heroSectionData['title'] }}" class="img-cover">

                        </div>
                        
                    </div>
            </div>
        </div>
    @elseif(!empty($homeCustomStatistics))
        <div class="stats-container">
            <div class="container">
                <div class="row">
                    @foreach($homeCustomStatistics as $homeCustomStatistic)
                        <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                            <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                                <div class="stat-icon-box " style="background-color: {{ $homeCustomStatistic->color }}">
                                    <img src="{{ $homeCustomStatistic->icon }}" alt="{{ $homeCustomStatistic->title }}" class="img-fluid"/>
                                </div>
                                <strong class="stat-number mt-10">{{ $homeCustomStatistic->count }}</strong>
                                <h4 class="stat-title">{{ $homeCustomStatistic->title }}</h4>
                                <p class="stat-desc mt-10">{{ $homeCustomStatistic->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="my-40"></div>
    @endif
@else
    <div class="my-40"></div>
@endif
