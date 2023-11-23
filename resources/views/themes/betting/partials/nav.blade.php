
<!--Header Here-->
<header class="header-section navbar">
    <div class="container-fluid p-0 " style="display:block">
        <div class="header-wrapper ">
            <div class="menu__left__wrap">
                <div class="logo-menu px-2">
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{getFile(config('location.logoIcon.path').'logo.png')}}" alt="logo">
                    </a>
                </div>
                @guest
                    <div class="cmn-grp" style="display: none;">
                        <a class="cmn--btn-mobile" href="{{route('login')}}">
                            <span class="rela">SIGN IN</span>
                        </a>
                        <a class="cmn--btn2-mobile" href="{{route('register')}}">
                            <span class="rela">JOIN NOW</span>
                        </a>
                    </div>
                @endguest
                <div class="lang d-flex align-items-center px-2">
                    <div class="language__wrap d-none">
                        <div class="flag">
                            <img src="{{getFile(config('location.logoIcon.path').'uk.png')}}"  alt="flag">
                        </div>
                        <select name="flag" id="flag-img1">
                            <option value="1">
                                En
                            </option>
                            <option value="1">
                                Cy
                            </option>
                            <option value="1">
                            Et
                            </option>
                        </select>
                    </div> 
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <ul class="main-menu">
                    <li>
                        <a href="https://recasino.io/">
                            <span>SPORTS BETTING</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="document.getElementById('nav-home-tabpre-redirect-custom').click();">
                            <span>LIVE BETTING</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('slot')}}">
                            <span>CASINO</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('casino')}}">
                            <span>LIVE CASINO</span>
                        </a>
                    </li>
                 <!--    <li>
                        <a href="{{route('casino')}}">
                            <span>ESPORTS</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{route('sport_promotion')}}">
                            <span>PROMOTIONS</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="navbar-text" style="align-items:center">
                <!-- <button onclick="darkMode()" class="btn-custom light night-mode">
                    <i class="fal fa-moon"></i>
                </button> -->
    
    
                @auth
                    <div class="items d__text" style="padding: 0px 15px;">
                        <span>@lang('Total Balance')</span>
                        <h6><sup></sup>${{Auth()->user()->balance}}</h6>
                    </div>
                    <div class="items d__cmn" style="padding-top:8px;margin-right:6px">
                        <a href="{{route('user.addFund')}}" class="cmn--btn btn_css" style="border: 1px solid !important">
                            <span>Deposit</span>
                        </a>
                    </div>
                       <div class="notification-panel" id="pushNotificationArea" style="display:flex;align-items:center;gap:10px;margin-right:6px">
                    @auth
                        @if(config('basic.push_notification') == 1)
                        <a class="dropdown-toggle icons" v-cloak style="background:#283968">
                            <i class="icon-message"></i>
                            <span v-if="items.length > 0" class="count">@{{ items.length }}</span>
                        </a>
                        <ul class="notification-dropdown">
                            <div class="dropdown-box">
                                <li>
                                    <a v-for="(item, index) in items"
                                       @click.prevent="readAt(item.id, item.description.link)"
                                       class="dropdown-item" href="javascript:void(0)">
                                        <i class="fal fa-bell"></i>
                                        <div class="text">
                                            <p v-cloak>@{{ item.formatted_date }}</p>
                                            <span v-cloak v-html="item.description.text"></span>
                                        </div>
                                    </a>
                                </li>
                            </div>
                            <div class="clear-all fixed-bottom">
                                <a v-if="items.length > 0" @click.prevent="readAll"
                                   href="javascript:void(0)">@lang('Clear all')</a>
                                <a v-if="items.length == 0" href="javascript:void(0)">@lang('You have no notifications')</a>
                            </div>
                        </ul>
                        @endif
                    @endauth
                </div>
                    <div class="dropdown user-dropdown" style="align-items:center;display:flex;margin-right:6px">
                        <a class="dropdown-toggle icons"  style="background:#283968">
                            <i class="icon-user text-white"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{menuActive('user.home')}}" href="{{route('user.home')}}">
                                    <i class="fa fa-home"></i>
                                    @lang('Dashboard')
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{menuActive('user.addFund')}}" href="{{route('user.addFund')}}">
                                    <i class="fal fa-money-bill"></i>
                                    @lang('Make a deposit')
                                </a>
                            </li>
    
                            <li>
                                <a class="dropdown-item {{menuActive('user.payout.money')}}"
                                   href="{{route('user.payout.money')}}">
                                    <i class="fas fa-envelope-open-dollar"></i>
                                    @lang('withdraw funds')
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{menuActive('user.referral')}}" href="{{route('user.referral')}}">
                                    <i class="fal fa-user-friends"></i>
                                    @lang('invite friends')
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{menuActive('user.profile')}}" href="{{route('user.profile')}}">
                                    <i class="fal fa-user"></i>
                                    @lang('personal profile')
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{menuActive('user.betHistory')}}"
                                   href="{{route('user.betHistory')}}">
                                    <i class="fal fa-history"></i>
                                    @lang('bet history')
                                </a>
                            </li>
    
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    @lang('Sign Out')
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
    
            <!-- notification panel -->
             
            </div>
            @guest
            <div class="mneu-btn-grp">
                <a href="#0" class="cmn--btn login_btn" data-bs-toggle="modal" data-bs-target="#signupin">
                    <span>SIGN IN</span>
                </a>
                <a href="#0" class="cmn--btn2 join_now" data-bs-toggle="modal" data-bs-target="#registermodal">
                    <span class="rela">JOIN NOW</span>
                </a>
            </div>
            @endguest
        </div>
    </div>
</header>

@if(in_array(Request::route()->getName(),['home','category','tournament','match']))

    <div class="bottom-bar fixed-bottom text-center">
        <a href="{{route('home')}}" class="text-dark">
            <i class="fa fa-home"></i>
            @lang('Home')
        </a>
        <a href="javascript:void(0)" class="text-dark" onclick="toggleSidebar('leftbar')">
            <i class="far fa-globe-americas"></i>
            @lang('Sports')
        </a>

        <a href="javascript:void(0)" class="text-dark" onclick="toggleSidebar('rightbar')">
            <i class="fal fa-ticket-alt"></i>
            @lang('Bet Slip')
        </a>

        @guest
            <a href="{{route('login')}}" class="text-dark">
                <i class="fa fa-sign-in"></i>
                @lang('Login')
            </a>
        @endguest

        @auth
            <a href="{{route('user.home')}}" class="text-dark">
                <i class="fal fa-user"></i>
                @lang('Dashboard')
            </a>
        @endauth

    </div>
@endif
