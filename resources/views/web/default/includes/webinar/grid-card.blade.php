<div class="webinar-card">
    <figure>
        <div class="image-box">
            <!-- <div class="badges-lists">
                @if ($webinar->bestTicket() < $webinar->price)
<span
                        class="badge badge-danger">{{ trans('public.offer', ['off' => $webinar->bestTicket(true)['percent']]) }}</span>
@elseif(empty($isFeature) and !empty($webinar->feature))
<span class="badge badge-warning">{{ trans('home.featured') }}</span>
@elseif($webinar->type == 'webinar')
@if ($webinar->start_date > time())
<span class="badge badge-primary">{{ trans('panel.not_conducted') }}</span>
@elseif($webinar->isProgressing())
<span class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span>
@else
<span class="badge badge-secondary">{{ trans('public.finished') }}</span>
@endif
@elseif(!empty($webinar->type))
<span class="badge badge-primary">{{ trans('webinars.' . $webinar->type) }}</span>
@endif

                    @include('web.default.includes.product_custom_badge', ['itemTarget' => $webinar])
            </div> -->
            <a href="{{ $webinar->getUrl() }}">
                {{-- @dd($webinar) --}}
                <img src="{{ $webinar->getImage() ?? asset('store/new/hero-placeholder.png') }}" class="img-cover h-100"
                    alt="{{ $webinar->title }}">
            </a>

            @if ($webinar->checkShowProgress())
                <div class="progress">
                    <span class="progress-bar" style="width: {{ $webinar->getProgress() }}%"></span>
                </div>
            @endif

            @if ($webinar->type == 'webinar')
                <a href="{{ $webinar->addToCalendarLink() }}" target="_blank"
                    class="webinar-notify d-flex align-items-center justify-content-center">
                    <i data-feather="bell" width="20" height="20" class="" color="#D3514A"></i>
                </a>
            @endif
        </div>

        <figcaption class="webinar-card-body d-flex flex-column justify-content-between">
            <!-- <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar bg-gray200">
                    <img src="{{ $webinar->teacher->getAvatar() }}" class="img-cover" alt="{{ $webinar->teacher->full_name }}">
                </div>
                <a href="{{ $webinar->teacher->getProfileUrl() }}" target="_blank" class="user-name ml-5 font-14">{{ $webinar->teacher->full_name }}</a>
            </div> -->
            <div class="d-flex flex-column justify-content-between">
                @php
                    $creator = $webinar->creator ?? null;
                    $isOrganization = $creator && $creator->role_name === 'organization';
                    $organization = $isOrganization ? $creator : $creator->organization ?? null;
                @endphp

                @if ($organization)
                    <div class="align-items-center d-flex flex-row justify-content-start">
                        <img src="{{ $organization->getAvatar() ?? asset('store/new/default-avatar.svg') }}"
                            alt="{{ $organization->full_name ?? 'none' }}" width="15%" height="10%">
                        <span class="text-gray text-right font-12">{{ $organization->full_name ?? 'none' }}</span>

                    </div>
                @endif

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <a href="{{ $webinar->getUrl() }}">
                        <h3 class=" webinar-title font-weight-bold font-16 text-dark-blue">
                            {{ clean($webinar->title, 'title') }}
                        </h3>
                    </a>
                </div>
                @if (!empty($webinar->category))
                    <span class="d-block font-14">{{ trans('public.in') }} <a
                            href="{{ $webinar->category->getUrl() }}" target="_blank"
                            class="text-decoration-underline">{{ $webinar->category->title }}</a></span>
                @endif
                {{-- <p class="text-wrap w-100 text-break">{{ strip_tags($webinar->description) }}</p> --}}

                <!-- @include(getTemplate() . '.includes.webinar.rate', ['rate' => $webinar->getRate()]) -->

                {{-- <div class="d-flex justify-content-between ">
                 <div class="d-flex align-items-center">
                    <i data-feather="clock" width="20" height="20" class="" color="#D3514A"></i>
                    <span class="duration font-14 ml-5">{{ convertMinutesToHourAndMinute($webinar->duration) }}
                        {{ trans('home.hours') }}</span>
                </div>

                <div class="vertical-line mx-15"></div>

                <div class="d-flex align-items-center">
                    <i data-feather="calendar" width="20" height="20" class="" color="#D3514A"></i>
                    <span
                        class="date-published font-14 ml-5">{{ dateTimeFormat(!empty($webinar->start_date) ? $webinar->start_date : $webinar->created_at,'j M Y') }}</span>
                </div>
                 <div class="webinar-price-box">
                    @if (!empty($isRewardCourses) and !empty($webinar->points))
                    <span class="text-warning real font-14">{{ $webinar->points }} {{ trans('update.points') }}</span>
                    @elseif(!empty($webinar->price) and $webinar->price > 0)
                    @if ($webinar->bestTicket() < $webinar->price)
                        <span
                            class="real">{{ handlePrice($webinar->bestTicket(), true, true, false, null, true) }}</span>
                        <span class="off ml-10">{{ handlePrice($webinar->price, true, true, false, null, true) }}</span>
                        @else
                        <span class="real">{{ handlePrice($webinar->price, true, true, false, null, true) }}</span>
                        @endif
                        @else
                        <span class="real font-14">{{ trans('public.free') }}</span>
                        @endif
                </div> 

            </div> --}}
                <div class="d-flex flex-row justify-content-start gap-1 align-items-center">

                    <img src="{{ asset('store/new/cert.svg') }}" alt="cert" width="8%" />
                    <p class="text-dark">
                        {{ trans('home.have-certificate') }}</p>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-between align-items-center">
                <a type="submit" class="btn new-btn  w-50 p-1 font-12" href="/login">
                    {{ trans('home.Enrol') }}
                </a>
            </div>
        </figcaption>
    </figure>
</div>
