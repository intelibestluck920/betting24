@extends($theme.'layouts.app')
@section('title','Login')
@section('content')
    <section class="login-section">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-6 p-0">
                    <div class="text-box h-100">
                        <div class="overlay h-100">
                            <div class="text">
                                <h1 style="font-weight: unset;" class="font_change">@lang('Sign in to your account')</h1>
                                <a href="{{route('home')}}" class="font_change">@lang('back to home')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-wrapper d-flex align-items-center h-100">
                        <form action="{{ route('login') }}" method="post" class="login-form">
                            @csrf
                            <div class="row g-4">
                                <div class="form__grp">
                                    <label for="emailsign">@lang('Username')</label>
                                    <input type="text" id="emailsign"  name="username" placeholder="@lang('Username')" style="    border-radius: 10px;
                                        border: unset;
                                        font-size: 14px;
                                        font-weight: 400;
                                        background: #20283f;
                                        /* border: unset; */
                                        width: 100%;
                                        padding: 13px 50px 15px 18px;
                                        outline: none;
                                        color: var(--white);
                                        position: relative;">
                                    @error('username')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                    @error('email')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                                <div class="form__grp">
                                    <input type="password" class="form-control" name="password"
                                    style=" border-radius: 10px;
                                            border: unset;
                                            font-size: 14px;
                                            font-weight: 400;
                                            background: #20283f;
                                            /* border: unset; */
                                            width: 100%;
                                            padding: 13px 50px 15px 18px;
                                            outline: none;
                                            color: var(--white);
                                            position: relative;"
                                       placeholder="@lang('Password')"/>
                                    @error('password')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if(basicControl()->reCaptcha_status_login)
                                    <div class="box mb-4 form-group">
                                        {!! NoCaptcha::renderJs(session()->get('trans')) !!}
                                        {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                                        @error('g-recaptcha-response')
                                        <span class="text-danger mt-1">@lang($message)</span>
                                        @enderror
                                    </div>
                                @endif
                                <div class="col-12">
                                    <div class="links">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember" {{ old('remember') ? 'checked' : '' }}
                                                id="flexCheckDefault"/>
                                            <label
                                                class="form-check-label"
                                                for="flexCheckDefault">
                                                @lang('Remember Me')
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}">@lang('Forgot password?')</a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="create__btn d-flex justify-content-center">
                                <button class="cmn--btn" type="submit">
                                    <span >@lang('Sign In')</span>
                                </button>
                            </div>
                            <p class="justify-content-center d-flex">
                                @lang("Don't Have an Account?")
                            </p>
                            <p class="justify-content-center d-flex"><a href="{{route('register')}}" style="color:#0d6efd">@lang('Create an Account')</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .modal .text-box,
        .login-section .text-box {
            background: url({{getFile(config('location.logo.path').'loginImage.jpg')}});
            background-size: cover;
        }
    </style>
@endpush
