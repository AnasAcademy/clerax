@php
$socials = getSocials();
if (!empty($socials) and count($socials)) {
$socials = collect($socials)->sortBy('order')->toArray();
}

$footerColumns = getFooterColumns();

$array = ['get_login','get_register','get_forget_password','get_reset_password'];
@endphp
@if (!in_array(Route::currentRouteName(), $array))
<footer class="footer position-relative user-select-none" style="background-color: #292929;">
    <!-- <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" footer-subscribe d-block d-md-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        <strong>{{ trans('footer.join_us_today') }}</strong>
                        <span class="d-block mt-5 text-white">{{ trans('footer.subscribe_content') }}</span>
                    </div>
                    <div class="subscribe-input bg-white p-10 flex-grow-1 mt-30 mt-md-0">
                        <form action="/newsletters" method="post">
                            {{ csrf_field() }}

                            <div class="form-group d-flex align-items-center m-0">
                                <div class="w-100">
                                    <input type="text" name="newsletter_email" class="form-control border-0 @error('newsletter_email') is-invalid @enderror" placeholder="{{ trans('footer.enter_email_here') }}"/>
                                    @error('newsletter_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill">{{ trans('footer.join') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    @php
    $columns = ['first_column','second_column','third_column','forth_column'];
    @endphp

    <div class=" py-4">
        <div class="row">

            <!-- @foreach($columns as $column)
            <div class="col-6 col-md-3">
                @if(!empty($footerColumns[$column]))
                @if(!empty($footerColumns[$column]['title']))
                <span class="header d-block text-white font-weight-bold">{{ $footerColumns[$column]['title'] }}</span>
                @endif

                @if(!empty($footerColumns[$column]['value']))
                <div class="mt-20">
                    {!! $footerColumns[$column]['value'] !!}
                </div>
                @endif
                @endif
            </div>
            @endforeach

        </div> -->

        <!-- <div class="mt-40 border-blue py-25 d-flex align-items-center justify-content-between">
            <div class="footer-logo">
                <a href="/">
                    @if(!empty($generalSettings['footer_logo']))
                        <img src="{{ $generalSettings['footer_logo'] }}" class="img-cover" alt="footer logo">
                    @endif
                </a>
            </div>

            <div class="footer-social">
                @if(!empty($socials) and count($socials))
                    @foreach($socials as $social)
                        <a href="{{ $social['link'] }}" target="_blank">
                            <img src="{{ $social['image'] }}" alt="{{ $social['title'] }}" class="mr-15">
                        </a>
                    @endforeach
                @endif
            </div>
        </div> -->
    </div>

    @if(getOthersPersonalizationSettings('platform_phone_and_email_position') == 'footer')
    <div class="footer-copyright-card">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-1">
            <img src="{{asset('store/new/white-clerax.svg')}}" width="20%" alt="img">

            <div class=" text-white w-sm-100 text-center d-flex flex-row justify-content-center align-items-center gap-1">
                <!-- {{ trans('update.platform_copyright_hint') }} -->
                جميع الحقوق محفوطة 
                <span>لصالح مجموعة Lxera</span>
                @2025
            </div>

            <div class="d-flex align-items-center justify-content-center">
                @if(!empty($generalSettings['site_phone']))
                <div class="d-flex align-items-center text-white font-14">
                    <i data-feather="phone" width="20" height="20" class="mr-10"></i>
                    {{ $generalSettings['site_phone'] }}
                </div>
                @endif

                <!-- @if(!empty($generalSettings['site_email']))
                        <div class="border-left mx-5 mx-lg-15 h-100"></div>

                        <div class="d-flex align-items-center text-white font-14">
                            <i data-feather="mail" width="20" height="20" class="mr-10"></i>
                            {{ $generalSettings['site_email'] }}
                        </div>
                    @endif -->
            </div>
            <!-- <div class="d-flex flex-row justify-content-center justify-content-lg-end align-items-center w-25 gap-1">
                <img src="{{asset('store/new/extraLogo1.png')}}" alt="extraLogo" class="extraLogo">
                <img src="{{asset('store/new/extraLogo2.png')}}" alt="extraLogo" class="extraLogo">
                <img src="{{asset('store/new/extraLogo3.png')}}" alt="extraLogo" class="extraLogo">

            </div> -->
        </div>
    </div>
    @endif

</footer>
@endif