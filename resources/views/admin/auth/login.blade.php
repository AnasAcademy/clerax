@extends('admin.auth.auth_layout')

@section('content')
@php
$siteGeneralSettings = getGeneralSettings();
@endphp

<div class="">
    <div class="d-flex justify-content-center align-items-center py-20">
        <img src="{{asset('store/new/cleraxLogo.png')}}" class="h-auto" alt="site logo">
    </div>
    <!-- <h4 class="text-dark font-weight-normal">{{ trans('admin/main.welcome') }} 
        <span class="font-weight-bold">{{ $siteGeneralSettings['site_name'] ?? '' }}</span>
    </h4> -->

    <p class="text-muted">{{ trans('auth.admin_tagline') }}</p>

    <form method="POST" action="{{ getAdminPanelUrl() }}/login" class="needs-validation" novalidate="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="email">{{ trans('public.email') }}</label>
            <input id="email" type="email" value="{{ old('email') }}"
                class="form-control  @error('email')  is-invalid @enderror" name="email" tabindex="1" required
                autofocus>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">{{ trans('auth.password') }}</label>
            </div>
            <input id="password" type="password" class="form-control  @error('password')  is-invalid @enderror"
                name="password" tabindex="2" required>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        @if(!empty(getGeneralSecuritySettings('captcha_for_admin_login')))
        @include('admin.includes.captcha_input')
        @endif

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">{{ trans('auth.remember_me') }}</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn new-btn btn-block mt-20 py-10" tabindex="4">
                {{ trans('auth.login') }}
            </button>
        </div>
    </form>

    <a href="{{ getAdminPanelUrl() }}/forget-password" class="text-orange">{{ trans('auth.forget_your_password') }}</a>
</div>
@endsection