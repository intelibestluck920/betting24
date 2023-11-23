<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    @include('partials.seo')


    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/bootstrap.min.css') }}"/>
    @stack('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/skitter.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/aos.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/jquery.fancybox.min.css') }}"/>

    <script src="{{ asset('assets/admin/js/fontawesome/fontawesomepro.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/_header.scss') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/glyphter-font/css/Glyphter.css') }}"/>

    @stack('style')

</head>

<body @if(session()->get('dark-mode') == 'true') class="dark-mode" @endif>


<!-- navbar -->
@include($theme.'partials.nav')
    
<section class="dashboard__body mt__30 pb-60"> 
    <div class="container">
        <div class="row g-4">
            <div class="col-xxl-3 col-xl-3 col-lg-4">
                <div class="dashboard__side__bar">
                    <ul class="account__menu">
                        <li>
                            <a href="{{route('user.home')}}" class="{{menuActive('user.home')}}">
                                <i class="fal fa-home"></i>
                                @lang('Dashboard')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.profile')}}" class="{{menuActive('user.profile')}}">
                                <i class="fal fa-user"></i>
                                @lang('Personal Profile')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.addFund')}}" class="{{menuActive('user.addFund')}}">
                                <i class="fal fa-money-bill"></i>
                                @lang('Make A Deposit')
                            </a>
                        </li>

                        <li>
                            <a href="{{route('user.fund-history')}}" class="{{menuActive('user.fund-history')}}">
                                <i class="fal fa-hand-holding-usd"></i>
                                @lang('Deposit History')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.transaction')}}" class="{{menuActive('user.transaction')}}">
                                <i class="far fa-money-check-edit"></i>
                                @lang('Transactions')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.betHistory')}}" class="{{menuActive('user.betHistory')}}">
                                <i class="fal fa-history"></i>
                                @lang('Bet History')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.ticket.list')}}" class="{{menuActive('user.ticket.list')}}">
                                <i class="fas fa-headset"></i>
                                @lang('Support Tickets')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.payout.money')}}" class="{{menuActive('user.payout.money')}}">
                                <i class="fas fa-envelope-open-dollar"></i>
                                @lang('Withdraw Funds')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.payout.history')}}" class="{{menuActive('user.payout.history')}}">
                                <i class="fal fa-wallet"></i>
                                @lang('Payouts History')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.referral')}}" class="{{menuActive('user.referral')}}">
                                <i class="fal fa-user-friends"></i>
                                @lang('Invite Friends')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.referral.bonus')}}" class="{{menuActive('user.referral.bonus')}}">
                                <i class="fal fa-cog"></i>
                                @lang('Referral Bonus')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.twostep.security')}}" class="{{menuActive('user.twostep.security')}}">
                                <i class="fas fa-key"></i>
                                @lang('2FA Security')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-9 col-lg-8">
                @yield('content')
            </div>
        </div>
    </div>
</section>
<!-- wrapper -->
@include($theme.'partials.footer')



@stack('loadModal')


<script src="{{ asset($themeTrue . 'js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery-3.6.0.min.js') }}"></script>

@stack('extra-js')

{{--<script src="{{ asset($themeTrue . 'js/fontawesome.min.js') }}"></script>--}}
<script src="{{ asset($themeTrue . 'js/owl.carousel.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.skitter.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/aos.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/script.js') }}"></script>


<script src="{{asset('assets/global/js/notiflix-aio-2.7.0.min.js')}}"></script>
<script src="{{asset('assets/global/js/pusher.min.js')}}"></script>
<script src="{{asset('assets/global/js/vue.min.js')}}"></script>
<script src="{{asset('assets/global/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@include('plugins')
@auth
    @if(config('basic.push_notification') == 1)
    <script>
        'use strict';
        let pushNotificationArea = new Vue({
            el: "#pushNotificationArea",
            data: {
                items: [],
            },
            mounted() {
                this.getNotifications();
                this.pushNewItem();
            },
            methods: {
                getNotifications() {
                    let app = this;
                    axios.get("{{ route('user.push.notification.show') }}")
                        .then(function (res) {
                            app.items = res.data;
                        })
                },
                readAt(id, link) {
                    let app = this;
                    let url = "{{ route('user.push.notification.readAt', 0) }}";
                    url = url.replace(/.$/, id);
                    axios.get(url)
                        .then(function (res) {
                            if (res.status) {
                                app.getNotifications();
                                if (link != '#') {
                                    window.location.href = link
                                }
                            }
                        })
                },
                readAll() {
                    let app = this;
                    let url = "{{ route('user.push.notification.readAll') }}";
                    axios.get(url)
                        .then(function (res) {
                            if (res.status) {
                                app.items = [];
                            }
                        })
                },
                pushNewItem() {
                    let app = this;
                    // Pusher.logToConsole = true;
                    let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                        encrypted: true,
                        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                    });
                    let channel = pusher.subscribe('user-notification.' + "{{ Auth::id() }}");
                    channel.bind('App\\Events\\UserNotification', function (data) {
                        app.items.unshift(data.message);
                    });
                    channel.bind('App\\Events\\UpdateUserNotification', function (data) {
                        app.getNotifications();
                    });
                },
                archiveAccount() {
                    Notiflix.Notify.Success("Archive Account Success");
                    return 0;
                },
                enrollFunc(){
                    Notiflix.Notify.Success("Enroll Setting Success");
                    return 0;
                }
            }
        });
    </script>
    @endif
@endauth
@stack('script')


@include($theme.'partials.notification')
<script>
    $(document).ready(function () {
        $(".language").find("select").change(function () {
            window.location.href = "{{route('language')}}/" + $(this).val()
        })
    })

    const darkMode = () => {
        var $theme = document.body.classList.toggle("dark-mode");
        $.ajax({
            url: "{{ route('themeMode') }}/" + $theme,
            type: 'get',
            success: function (response) {
                console.log(response);
            }
        });
    };
</script>

</body>
</html>
