@extends($theme.'layouts.user')
@section('title',trans('Dashboard'))
@section('content')
    <!-- contents -->
    
    <div class="dashboard__body__wrap">
        <h3 class="account__head mb__30">
            Account Settings
        </h3>
        <dov class="row g-4">
            <div class="col-xl-4">
                <div class="user__box">
                    <div class="img__change">
                        <img src="{{getFile(config('location.user.path').auth()->user()->image)}}" alt="..."/>
                        <div class="icons" id="profile-picture">
                            <i class="fas fa-pen"></i>
                        </div>
                    </div>
                    <div class="user__content">
                        <h5 class="usertext__one">{{auth()->user()->username}}</h5>
                        <h6 class="usertext__two">BALANCE:</h6>
{{--                        <a href="#0" class="link">--}}
{{--                            ffbe99f2-7f4b-11ed-9e24-3ee8038fe302--}}
{{--                        </a>--}}
                        ${{Auth()->user()->balance}}
                    </div>
                    <div class="reset__wrap">
                        <a href="{{route('user.profile')}}" class="reset">
                            Reset Password
                        </a>
                    </div>
                    <div class="user__dated">
                        <span class="date">Joined {{auth()->user()->created_at}}</span>
                        <a href="#0" class="lastlogin">
                            Last Login on {{auth()->user()->updated_at}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="account__body">
                    <div class="account__strength__box mb__30">
                        <div class="strength__box">
                            <div class="circle__box">
                                <div class="circle">
                                    <div class="box">
                                        <h3 class="text">
                                            70%
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <h5>
                                Account Strength
                            </h5>
                        </div>
                        <div class="strength__content">
                            <div class="items">
                                <input class="form-check-input" type="checkbox" id="stre1c" checked>
                                <label class="form-check-label" for="stre1c">
                                    Create account
                                </label>
                            </div>
                            <div class="items">
                                <input class="form-check-input" type="checkbox" id="stre2">
                                <label class="form-check-label" for="stre2">
                                    Complete Account
                                </label>
                            </div>
                            <div class="items">
                                <input class="form-check-input" type="checkbox" id="stre3">
                                <label class="form-check-label" for="stre3">
                                    Verify Identity
                                </label>
                            </div>
                            <div class="items">
                                 <input class="form-check-input" type="checkbox" id="stre4">
                                <span>
                                Made a Deposit
                                </span>
                            </div>
                            <div class="items">
                                 <input class="form-check-input" type="checkbox" id="stre5">
                                <span>
                                Upload Avatar
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="account__email mb__30">
                        <h5>
                            Account Emails
                        </h5>
                        <span class="subtitle">
                            Primary Emails
                        </span>
                        <div class="form__wrap">
                            <form action="#">
                                <input type="text" placeholder="{{auth()->user()->email}}">
                                <i class="icon-lock"></i>
                            </form>
                            <div class="check__items">
                                <input class="form-check-input" type="checkbox" id="stre1" checked>
                                <label class="form-check-label" for="stre1">
                                    Verified
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="account__email enroll__box mb__30">
                        <h5>
                            Multi_factor Authentication
                        </h5>
                        <p>
                            Add an Extra Layer of security to your Recasino account when logging in with Email/Passsword. A verrification code will be sent to your email each time you loin to secrely protect your account.
                        </p>
                        <button onclick="pushNotificationArea.enrollFunc()" type='button'  class="cmn--btn">
                           Enroll
                        </button>
                    </div>
                    <!-- <div class="account__email language__box mb__30">
                        <h5>
                            Language
                        </h5>
                        <span class="slanguage">Select Language</span>
                        <div class="language__wrap">
                            <select name="#" id="#id">
                                <option value="1">
                                    English
                                </option>
                                <option value="2">
                                    Turki
                                </option>
                                <option value="3">
                                    Spanish
                                </option>
                            </select>
                            <a href="#0" class="cmn--btn">
                                <span>Save</span>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="account__email social__box mb__30">
                        <h5>
                            Social Accounts
                        </h5>
                        <span class="slanguage">Connect your accounts for faster login.</span>
                        <div class="social__wrap">
                            <div class="social__left">
                                <a href="#0">
                                    <span>
                                        <img src="assets/img/profile/goggle.png" alt="icon">
                                    </span>
                                    <span>
                                        Connect Google
                                    </span>
                                </a>
                                <a href="#0">
                                    <span>
                                        <img src="assets/img/profile/steam.png" alt="icon">
                                    </span>
                                    <span>
                                        Connect steam
                                    </span>
                                </a>
                                <a href="#0">
                                    <span>
                                        <img src="assets/img/profile/twitter.png" alt="icon">
                                    </span>
                                    <span>
                                        Connect Twitter
                                    </span>
                                </a>
                            </div>
                            <div class="social__left">
                            <a href="#0">
                                <span>
                                    <img src="assets/img/profile/facebook.png" alt="icon">
                                </span>
                                <span>
                                    Connect facebook
                                </span>
                            </a>
                            <a href="#0">
                                <span>
                                    <img src="assets/img/profile/twitch.png" alt="icon">
                                </span>
                                <span>
                                    Connect twitch
                                </span>
                            </a>
                            <a href="#0">
                                <span>
                                    <img src="assets/img/profile/vkonta.png" alt="icon">
                                </span>
                                <span>
                                    Connect vkontakte
                                </span>
                            </a>
                        </div>
                        </div>
                    </div> -->
                    <div class="account__email enroll__box">
                        <h5>
                            Archive Account
                        </h5>
                        <p>
                            Want to temporarily close your account?
                        </p>
                        <button onclick="pushNotificationArea.archiveAccount()" type="button" class="cmn--btn">
                            Archive Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><sup>{{config('basic.currency_symbol')}}</sup>{{Auth()->user()->balance}}</h2>
                    <p class="info">@lang('Total Balance')</p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="{{asset('assets/themes/betting/images/icon/wallet.png')}}" alt="...">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><sup>{{config('basic.currency_symbol')}}</sup>{{$userBet['totalInvest']}}</h2>
                    <p class="info">@lang('Total Bet Amount')</p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="{{asset('assets/themes/betting/images/icon/invest.png')}}" alt="...">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price">{{$userBet['totalBet']}}</h2>
                    <p class="info">@lang('Total Bet')</p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="{{asset('assets/themes/betting/images/icon/bet.png')}}" alt="...">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price">{{$userBet['win']}}</h2>
                    <p class="info">@lang('Bet Win')</p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="{{asset('assets/themes/betting/images/icon/earn.png')}}" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 col-sm-12">
            <div id="container" class="apexcharts-canvas"></div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body ">
                    <div class="table-parent table-responsive m-0">
                        <table class="table  table-striped" id="service-table">
                            <thead>
                            <tr>
                                <th>@lang('SL No.')</th>
                                <th>@lang('Invest Amount')</th>
                                <th>@lang('Return Amount')</th>
                                <th>@lang('Charge')</th>
                                <th>@lang('Ratio')</th>
                                <th class="text-center">@lang('Status')</th>
                                <th class="text-center">@lang('Information')</th>
                                <th>@lang('Time')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($betInvests as $key => $item)
                                <tr>
                                    <td data-label="@lang('SL No.')">{{++$key}}</td>
                                    <td data-label="@lang('Invest Amount')">{{config('basic.currency_symbol')}}@lang($item->invest_amount)</td>
                                    <td data-label="@lang('Return Amount')">{{config('basic.currency_symbol')}}@lang($item->return_amount)</td>
                                    <td data-label="@lang('Charge')">{{config('basic.currency_symbol')}}@lang($item->charge)</td>
                                    <td data-label="@lang('Ratio')"> @lang($item->ratio)</td>
                                    <td data-label="@lang('Status')" class="text-center">
                                        @if($item->status == 0)
                                            <span class="badge bg-warning">@lang('Processing')</span>
                                        @elseif($item->status == 1)
                                            <span class="badge bg-success">@lang('Win')</span>
                                        @elseif($item->status == -1)
                                            <span class="badge bg-danger">@lang('Loss')</span>
                                        @elseif($item->status == 2)
                                            <span class="badge bg-primary">@lang('Refund')</span>
                                        @endif

                                    </td>
                                    <td data-label="@lang('Information')" class="text-center">
                                        <button type="button" data-resource="{{$item->betInvestLog}}"
                                                data-bs-target="#investLogList" data-bs-toggle="modal"
                                                class="action-btn investLogList">
                                            <i class="fa fa-info-circle"></i></button>
                                    </td>
                                    <td data-label="@lang('Time')">
                                        {{ dateTime($item->created_at, 'd M Y h:i A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="100%">{{__('No Data Found!')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="investLogList" role="dialog">
        <div class="modal-dialog  modal-xl">
            <div class="modal-custom-content">
                <div class="modal-header modal-colored-header">
                    <h5 class="modal-title service-title">@lang('Information')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="service-table">
                        <thead class="thead-dark">
                        <tr>
                            <th>@lang('#')</th>
                            <th>@lang('Match Name')</th>
                            <th>@lang('Category Name')</th>
                            <th>@lang('Tournament Name')</th>
                            <th>@lang('Question Name')</th>
                            <th>@lang('Option Name')</th>
                            <th>@lang('Ratio')</th>
                            <th>@lang('Result')</th>
                        </tr>
                        </thead>
                        <tbody class="result-body">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom me-2 mb-2"
                            data-bs-dismiss="modal"><span>@lang('Close')</span></button>
                </div>
            </div>
        </div>
    </div> -->

@endsection

@push('script')
    <script src="{{asset($themeTrue.'js/apexcharts.js')}}"></script>
    <script>
        'use strict'
        $(document).on('click', '.investLogList', function () {
            var obj = $(this).data('resource');
            var output = [];
            if (0 < obj.length) {
                obj.map(function (obj, i) {
                    var tr =
                        `<tr>
                        <td data-label="@lang('#')">${++i}</td>
                        <td data-label="@lang('Match Name')">${(obj).match_name}</td>
                        <td data-label="@lang('Category Name')">${obj.category_icon} ${obj.category_name}</td>
                        <td data-label="@lang('Tournament Name')">${obj.tournament_name}</td>
                        <td data-label="@lang('Question Name')">${obj.question_name}</td>
                        <td data-label="@lang('Option Name')">${obj.option_name}</td>
                        <td data-label="@lang('Ratio')">${obj.ratio}</td>
                        <td data-label="@lang('Result')">
                            ${(obj.status == '0') ? ` <span class='badge bg-warning'>@lang('Processing')</span>` : ''}
                            ${(obj.status == '2') ? ` <span class='badge bg-success'>@lang('Win')</span>` : ''}
                            ${(obj.status == '-2') ? ` <span class='badge bg-danger'>@lang('Lose')</span>` : ''}
                            ${(obj.status == '3') ? ` <span class='badge bg-secondary'>@lang('Refunded')</span>` : ''}

                        </td>
                    </tr>`;

                    output[i] = tr;
                });

            } else {
                output[0] = `
                        <tr>
                            <td colspan="100%" class=""text-center>@lang('No Data Found')</td>
                        </tr>`;
            }

            $('.result-body').html(output);
        });

        var options = {
            theme: {
                mode: '{{(session()->get('dark-mode') == 'true') ? 'dark' :  ''}}',
            },
            series: [
                {
                    name: "{{trans('Invested')}}",
                    color: '{{config('basic.base_color')}}',
                    data: {!! $dailyPayout->flatten() !!}
                },

            ],
            chart: {
                type: 'bar',
                // height: ini,
                background: '{{(session()->get('dark-mode') == 'true') ? '#294056' :  '#ffffff'}} ',
                toolbar: {
                    show: false
                }

            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: {!! $dailyPayout->keys() !!},

            },
            yaxis: {
                title: {
                    text: ""
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                colors: ['#000'],
                y: {
                    formatter: function (val) {
                        return val + " {{config('basic.currency')}}"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#container"), options);
        chart.render();

    </script>
@endpush
