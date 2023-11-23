<!--Login Modal Start-->
<div class="modal register__modal" id="signupin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row align-items-center g-4">
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="modal__left">--}}
{{--                                <img src="assets/img/modal/loginmodal.png" alt="modal">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-lg-12">
                            <div class="modal__right">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="{{route('login')}}" class="nav-link active">@lang('SIGN IN')</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="{{route('register')}}" class="nav-link">@lang('JOIN NOW')</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade  show active" id="home2" role="tabpanel">
                                        <div class="form__tabs__wrap">
                                            <form class="login-form" id="login-form" action="{{route('loginModal')}}" method="post">
                                                @csrf
                                                <div class="form__grp">
                                                    <label for="emailsign">@lang('Username')</label>
                                                    <input type="text" id="emailsign"  name="username" placeholder="@lang('Username')">
                                                    <span class="text-danger emailError"></span>
                                                    <span class="text-danger usernameError"></span>
                                                </div>
                                                <div class="form__grp">
                                                    <label for="toggle-password3">@lang('Password')</label>
                                                    <input id="toggle-password3" type="password" name="password" placeholder="@lang('Password')">
                                                    <span id="#toggle-password3" class="fa fa-fw fa-eye field-icon toggle-password3"></span>
                                                </div> 
                                                <div class="login__signup">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            autocomplete="off"
                                                            value=""
                                                            id="flexCheckDefault"
                                                            name="remember" {{ old('remember') ? 'checked' : '' }}
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexCheckDefault">
                                                            @lang('Remember Me')
                                                        </label>
                                                    </div>  
                                                    <a href="{{ route('password.request') }}">@lang('Forgot password?')</a>
                                                </div>  
                                                <div class="create__btn cstm_sign_btn">
                                                    <button class="cmn--btn " type="submit">
                                                        <p style="color:white">@lang('SIGN IN')</p>
                                                    </button>
                                                </div>
                                                <p>
                                                    @lang("Don't you have an account yet?") 
                                                </p>
                                                <p><a href="{{route('register')}}">@lang('JOIN NOW')</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--Login Modal Start-->
<div class="modal register__modal" id="registermodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row align-items-center g-4">
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="modal__left">--}}
{{--                                <img src="assets/img/modal/loginmodal.png" alt="modal">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-lg-12">
                            <div class="modal__right">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="{{route('login')}}" class="nav-link">@lang('SIGN IN')</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="{{route('register')}}" class="nav-link active">@lang('JOIN NOW')</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade   show active" id="contact3" role="tabpanel">
                                        <div class="form__tabs__wrap">
                                            <form class="login-form" id="signup-form" action="{{route('register')}}" method="post">
                                                @csrf
                                                <div class="form__grp">
                                                    <input
                                                        type="text"
                                                        autocomplete="off"
                                                        name="firstname"
                                                        value="{{old('firstname')}}"
                                                        class="form-control"
                                                        placeholder="@lang('First Name')"/>
                                                    <span class="text-danger firstnameError"></span>
                                                </div>
                                                <div class="form__grp">
                                                    <input
                                                        type="text"
                                                        autocomplete="off"
                                                        name="lastname" value="{{old('lastname')}}"
                                                        class="form-control"
                                                        placeholder="@lang('Last name')"/>
                                                    <span class="text-danger lastnameError"></span>
                                                </div> 
                                                <div class="form__grp">
                                                    <input
                                                        type="text"
                                                        autocomplete="off"
                                                        name="username" value="{{old('username')}}"
                                                        class="form-control"
                                                        placeholder="@lang('Username')"/>
                                                    <span class="text-danger usernameError"></span>
                                                </div> 
                                                <div class="form__grp">
                                                    <input
                                                        type="email"
                                                        autocomplete="off"
                                                        name="email" value="{{old('email')}}"
                                                        class="form-control"
                                                        placeholder="@lang('Email address')"/>
                                                    <span class="text-danger emailError"></span>
                                                </div> 
                                                <div class="d-flex">
                                                    <div class="form__grp col-md-6">
                                                        @php
                                                            $country_code = (string) @getIpInfo()['code'] ?: null;
                                                            $myCollection = collect(config('country'))->map(function($row) {
                                                                return collect($row);
                                                            });
                                                            $countries = $myCollection->sortBy('code');
                                                        @endphp
                                                        <select
                                                            class="form-select form-control country_code dialCode-change" name="phone_code"
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
                                                    <div class="form__grp col-md-6">
                                                        <input
                                                            type="text"
                                                            autocomplete="off"
                                                            name="phone" value="{{old('phone')}}"
                                                            class="form-control dialcode-set"
                                                            placeholder="@lang('Phone Number')"/>
                                                        <span class="text-danger phoneError"></span>
                                                        <input  autocomplete="off" type="hidden" name="country_code" value="{{old('country_code')}}" class="text-dark">
                                                    </div>
                                                </div> 
                                                <div class="form__grp">
                                                    <input
                                                        type="password"
                                                        name="password" value="{{old('password')}}"
                                                        class="form-control"
                                                        placeholder="@lang('Password')"/>
                                                    <span class="text-danger passwordError"></span>
                                                </div>
                                                <div class="form__grp">
                                                    <input
                                                        type="password"
                                                        name="password_confirmation"
                                                        class="form-control"
                                                        placeholder="@lang('Confirm Password')"/>
                                                </div>
                                                <div class="create__btn">
                                                    <button class="cmn--btn" type="submit">
                                                        <p style=" font-size:20px!important;color: #141c33;">@lang('JOIN NOW')</p>
                                                    </button>
                                                </div>
                                                <p>
                                                    @lang('Do you have an account?') 
                                                </p>
                                                <p><a  href="{{route('login')}}">@lang('Login')</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Login Modal End-->
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
