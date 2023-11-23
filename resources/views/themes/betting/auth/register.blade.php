@extends($theme.'layouts.app')
@section('title','Register')
@section('content')
    <section class="login-section">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-6 p-0">
                    <div class="text-box h-100">
                        <div class="overlay h-100">
                            <div class="text">
                                <h1 style="font-weight: unset;" class="font_change">@lang('create an account')</h1>
                                <a href="{{route('home')}}" class="font_change">@lang('back to home')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-wrapper d-flex align-items-center h-100">
                        <form action="{{ route('register') }}" method="post"  class="login-form">
                            @csrf
                            <div class="row g-4">
                                @if(session()->get('sponsor') != null)
                                    <div class="input-box col-12">
                                        <label>@lang('Sponsor Name')</label>
                                        <input type="text" name="sponsor" class="form-control" id="sponsor"
                                               placeholder="{{trans('Sponsor By') }}"
                                               value="{{session()->get('sponsor')}}" readonly>
                                    </div>
                                @endif
                                <div class="form__grp">
                                    <input
                                        type="text"
                                        name="firstname"
                                        value="{{old('firstname')}}"
                                        class="form-control"
                                        placeholder="@lang('First name')"/>
                                    @error('firstname')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                                <div class="form__grp">
                                    <input
                                        type="text"
                                        name="lastname"
                                        value="{{old('lastname')}}"
                                        class="form-control"
                                        placeholder="@lang('Last name')"/>
                                    @error('lastname')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                                <div class="form__grp">
                                    <input
                                        type="text"
                                        name="username"
                                        value="{{old('username')}}"
                                        class="form-control"
                                        placeholder="@lang('Username')"/>
                                    @error('username')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                                <div class="form__grp">
                                    <input
                                        type="email"
                                        name="email"
                                        value="{{old('email')}}"
                                        class="form-control"
                                        placeholder="@lang('Email address')"/>
                                    @error('email')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                                <div class="form__grp">
                                    @php
                                        $country_code = (string) @getIpInfo()['code'] ?: null;
                                        $myCollection = collect(config('country'))->map(function($row) {
                                            return collect($row);
                                        });
                                        $countries = $myCollection->sortBy('code');
                                    @endphp
                                    <select
                                        class="form-select country_code dialCode-change" name="phone_code"
                                        aria-label="Default select example" id="basic-addon1">
                                        <option selected="" disabled>@lang('Select Code')</option>
                                        @foreach(config('country') as $value)
                                            <option value="{{$value['phone_code']}}"
                                                    data-name="{{$value['name']}}"
                                                    data-code="{{$value['code']}}"
                                                {{$country_code == $value['code'] ? 'selected' : ''}}> {{$value['name']}}
                                                ({{$value['phone_code']}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form__grp">
                                    <input
                                        type="text"
                                        name="phone" value="{{old('phone')}}"
                                        class="form-control dialcode-set"
                                        placeholder="@lang('Phone Number')"/>
                                    @error('phone')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="country_code" value="{{old('country_code')}}"
                                       class="text-dark">
                                <div class="form__grp">
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="@lang('Password')"/>
                                    @error('password')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form__grp">
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        placeholder="@lang('Confirm Password')"/>
                                </div>
                                @if(basicControl()->reCaptcha_status_registration)
                                    <div class="col-md-6 box mb-4 form-group">
                                        {!! NoCaptcha::renderJs(session()->get('trans')) !!}
                                        {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                                        @error('g-recaptcha-response')
                                        <span class="text-danger mt-1">@lang($message)</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            <div class="create__btn d-flex justify-content-center mt-3">
                                <button class="cmn--btn" type="submit">
                                    <span>@lang('Sign Up')</span>
                                </button>
                            </div>
                            <p class="justify-content-center d-flex">
                                @lang('Already have an account?')
                            </p>
                            <p class="justify-content-center d-flex">
                                <a href="{{route('login')}}" style="color:#0d6efd">@lang('Login here')</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        "use strict";
        $(document).ready(function () {
            setDialCode();
            $(document).on('change', '.dialCode-change', function () {
                setDialCode();
            });

            function setDialCode() {
                let currency = $('.dialCode-change').val();
                $('.dialcode-set').val(currency);
            }

        });

    </script>
@endpush

@push('style')
    <style>
        .modal .text-box,
        .login-section .text-box {
            background: url({{getFile(config('location.logo.path').'loginImage.jpg')}});
            background-size: cover;
        }
        
        .form__grp .form-control {
            border-radius: 10px;
            border: unset;
            font-size: 14px;
            font-weight: 400;
            background: #20283f;
            /* border: unset; */
            width: 100%;
            padding: 13px 50px 15px 18px;
            outline: none;
            color: var(--white);
            position: relative;

        }
    </style>
@endpush
