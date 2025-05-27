@extends(getTemplate().'.layouts.app')

@section('content')
<div class="container col-11 col-md-8 col-lg-5 col-xl-3">
    <div class="login-container justify-content-center align-items-center">
        <div class="d-flex justify-content-center align-items-center py-20">
            <img src="{{asset('store/new/cleraxLogo.png')}}" class="h-auto" alt="site logo">
        </div>

        <div class="login-card">
            <h1 class="font-20 font-weight-bold">{{ trans('auth.reset_password') }}</h1>
            <form method="post" action="/reset-password" class="mt-35">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="input-label" for="email">{{ trans('auth.email') }}:</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" value="{{ request()->get('email') }}" aria-describedby="emailHelp">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="input-label" for="password">{{ trans('auth.password') }}:</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" aria-describedby="passwordHelp">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="input-label" for="confirm_password">{{ trans('auth.retype_password') }}:</label>
                    <input name="password_confirmation" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror" id="confirm_password"
                        aria-describedby="confirmPasswordHelp">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <input hidden name="token" placeholder="token" value="{{ $token }}">

                <button type="submit"
                    class="btn new-btn btn-block mt-20 py-10">{{ trans('auth.reset_password') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection