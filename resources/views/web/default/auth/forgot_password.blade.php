@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')

<div class="container col-11 col-md-8 col-lg-5 col-xl-3">
    <div class="login-container justify-content-center align-items-center">
        <div class="d-flex justify-content-center align-items-center py-20">
            <img src="{{asset('store/new/cleraxLogo.png')}}" class="h-auto" alt="site logo">
        </div>


        <div class="login-card">
            <h1 class="font-20 font-weight-bold">{{ trans('auth.forget_password') }}</h1>

            <form method="post" action="/forget-password" class="mt-35">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('web.default.auth.includes.register_methods')

                @if(!empty(getGeneralSecuritySettings('captcha_for_forgot_pass')))
                @include('web.default.includes.captcha_input')
                @endif


                <button type="submit"
                    class="btn new-btn btn-block mt-20 py-10">{{ trans('auth.reset_password') }}</button>
            </form>

            <div class="text-center mt-20">
                <span
                    class="badge badge-circle-gray300 text-orange d-inline-flex align-items-center justify-content-center">or</span>
            </div>

            <div class="text-center mt-20">
                <span class="text-secondary">
                    <a href="/login" class="text-orange font-weight-bold">{{ trans('auth.login') }}</a>
                </span>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/select2/select2.min.js"></script>
<script src="/assets/default/js/parts/forgot_password.min.js"></script>
@endpush