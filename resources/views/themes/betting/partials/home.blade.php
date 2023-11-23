@extends($theme.'layouts.app')
@section('title',trans('Home'))

@section('content')
    <!--Global Main Body-->
    <section class="main__body__area" id="getMatchList" v-cloak> 
        <div class="container-fluid p-0">
            <div class="row g-0">
                <!-- leftbar -->
                <div class="leftbar col-xxl-2 col-xl-2 col-lg-2" id="leftbar">
                    {{dd("lsdfgdlhglhgl")}}

                    @include($theme.'partials.home.leftMenu')
                </div>

                <!-- contents -->
                <div class="col-xxl-10 col-xl-10 col-lg-10 flex">
                    <div class="container-fluid p-0">
                        <div class="row g-0">
                            @if(Request::routeIs('condition'))
                                <div class = "condition-content"> 
                                        @include($theme.'partials.home.condition')
                                        @include($theme.'partials.footer')
                                </div>
                            @endif
                            @if(Request::routeIs('policy'))
                                <div class = "condition-content"> 
                                    @include($theme.'partials.home.policy')
                                    @include($theme.'partials.footer')
                                </div>
                            @endif  
                            @if(Request::routeIs('bonusterm'))
                                <div class = "condition-content"> 
                                    @include($theme.'partials.home.bonusterm')
                                    @include($theme.'partials.footer')
                                </div>
                            @endif   
                            @if(Request::routeIs('gambling'))
                                <div class = "condition-content"> 
                                    @include($theme.'partials.home.gambling')
                                    @include($theme.'partials.footer')
                                </div>
                            @endif    
                            <div class="content col-xxl-9 col-xl-9 col-lg-9">
                                @if(!in_array(Request::route()->getName(),['condition','policy','bonusterm','gambling']))
                                    @include($theme.'partials.home.slider')
                                    @include($theme.'partials.home.navbar')
                                    @if(Request::routeIs('match'))
                                        @include($theme.'partials.home.match')
                                    @else
                                        @include($theme.'partials.home.bet365')
                                        @include($theme.'partials.home.content') 
                                        @include($theme.'partials.footer')
                                    @endif
                                @endif

                            </div>
                            @if(!in_array(Request::route()->getName(),['condition','policy','bonusterm','gambling']))
                                @include($theme.'partials.home.rightbar')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')

    @php
        $segments = request()->segments();
        $last  = end($segments);

    @endphp

    <script>
        let getMatchList = new Vue({
            el: "#getMatchList",
            data: {

                loaded: true,
                currency_symbol: "{{config('basic.currency_symbol')}}",
                currency: "{{config('basic.currency')}}",
                minimum_bet: "{{config('basic.minimum_bet')}}",
                allSports_filter: [],
                upcoming_filter: [],

                selectedData: {},
                betSlip: [],
                betSlipSingle: [],
                totalOdds: 0,
                minimumAmo: 1,
                return_amount: 0,
                win_charge: "{{config('basic.win_charge')}}",
                form: {
                    amount: 0
                },
                showType: '',
                bet365: {},
                setBet365SportInplayId: 1,
                setBet365SportUpcomingId: 1,
                bet365InplayFilterApiResponse: [],
                bet365UpcomingEventsApiResponse: [],
                bet365PrematchOddsApiResponse: [],
                bet365Sports: {
                    1  : "Soccer",
                    // 2  : "Horse Racing",
                    3  : "Cricket",
                    // 4  :	"Greyhounds",
                    8  : "Rugby Union",
                    12 : "American Football",
                    13 : "Tennis",
                    14 :	"Snooker",
                    15 :	"Darts",
                    16 :	"Baseball",
                    // 17 :  "Ice Hockey",
                    // 18" : "Basketball",
                    // 19" :	"Rugby League",
                    // 36" : "Australian Rules",
                    // 66 : 	"Bowls",
                    // 75 : "Gaelic Sports",
                    // 78 :  "Handball",	
                    // 83 : "Futsal",
                    // 90 : "Floorball",
                    // 91 :  "Volleyball",
                    // 92 : "Table Tennis",
                    // 94 : "Badminton",
                    // 95 : "Beach Volleyball",
                    // 107 : "Squash",
                    // 110 : "Water Polo",
                    // 148 : "Surfing",
                    // 151 : "E-sports",
                    // 162 : "MMA",
                }
            },
            mounted() {
                // var showType = localStorage.getItem('showType');
                // var betType = localStorage.getItem('betType')
                // if (showType == null) {
                    localStorage.setItem("showType", 'live');
                // }
                // if(betType === null){
                    localStorage.setItem("betType",'single')
                // }
                this.showType = localStorage.getItem("showType")

                this.getMatches();
                this.getSlip();
                this.getEvents();
                this.getBet365AllUpcomingEvents();
                this.getBet365UpcomingEvents();
                this.getBet365InplayFilterEvents();

            },
            methods: {
                async getMatches() {
                    var _this = this;
                    var _segment = "{{Request::segment(1)}}"
                    var routeName = "{{Request::route()->getName()}}"
                    var $lastSegment = "{{$last}}"

                    var $url = '{{route('allSports')}}';

                    if (routeName == 'category') {
                        $url = '{{route('allSports')}}?categoryId=' + $lastSegment;
                    }
                    if (routeName == 'tournament') {
                        $url = '{{route('allSports')}}?tournamentId=' + $lastSegment;
                    }

                    if (routeName == 'match') {
                        $url = '{{route('allSports')}}?matchId=' + $lastSegment;
                    }

                    // let inplay_base_url = "https://corsproxy.io/?https://api.b365api.com/v1/bet365/inplay?token=151528-6aCG7MkXkxLxos";
                    // await axios.get(inplay_base_url)
                    // .then(function (...result) {
                    //     if(result['0'].data.success){
                    //         let filerData = result['0'].data.results[0].filter(function(record){
                    //             return record.type == 'EV';
                    //         });
                    //         _this.bet365InplayApiResponse =  filerData.slice(1,10);
                    //     }
                    // });
                },
                async updateBet365Events(sportId) {
                    
                },
                async getBet365InplayEvents() {
                    
                },
                async getBet365InplayFilterEvents() {

                    var _this = this;
                    _this.bet365InplayFilterApiResponse = [];
                    let url = "{{route('bet365.inplay_filter', ':sportId')}}";
                    url = url.replace(':sportId',_this.setBet365SportInplayId)
                    await axios.get(url)
                    .then(function (...result) {
                        let filerData = result['0'].data.results;
                        // console.log(filerData,"res")
                        _this.bet365InplayFilterApiResponse =  filerData.slice(1,10);
                        console.log('bet365InplayFilterApiResponse', _this.bet365InplayFilterApiResponse)
                        // _this.bet365InplayFilterApiResponse.map((record) => {
                        //     record.betdata = {
                        //         category_name : "",
                        //         id : 15,
                        //         is_unlock_match : 0,
                        //         is_unlock_question : 0,
                        //         match_id : 1,
                        //         match_name : "Arsenal vs Barcelona",
                        //         option_name : "1",
                        //         question_id : 5,
                        //         question_name : "ПОБЕДА",
                        //         ratio : 2.1,
                        //         tournament_name : "UEFA",
                        //     };
                        //     console.log(record);
                        // })
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                },
                async getBet365AllUpcomingEvents() {
                    
                    var _this = this;
                    _this.bet365UpcomingEventsApiResponse = [];
                    let url = "{{route('bet365.upcoming', ':sportsId')}}";
                    url = url.replace(':sportsId',_this.setBet365SportId);
                    await axios.get(url)
                    .then(function (...result) {
                        let filerData = result['0'].data.results;
                        _this.bet365UpcomingEventsApiResponse =  filerData.slice(1,10);
                        
                        console.log('bet365UpcomingEventsApiResponse getBet365AllUpcomingEvents', _this.bet365UpcomingEventsApiResponse)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                },
                async getBet365UpcomingEvents() {
                    
                    var _this = this;
                    _this.bet365UpcomingEventsApiResponse = [];
                    let url = "{{route('bet365.upcoming', ':sportsId')}}";
                    url = url.replace(':sportsId',_this.setBet365SportUpcomingId);
                    await axios.get(url)
                    .then(function (...result) {
                        let filerData = result['0'].data.results;
                        _this.bet365UpcomingEventsApiResponse =  filerData.slice(1,10);

                        _this.bet365UpcomingEventsApiResponse.map((record) => {
                            record.newindex?.results[0]?.schedule?.sp?.main.forEach((element, key) => {
                                element.betdata = {
                                    category_name : "",
                                    id : record.id,
                                    is_unlock_match : 0,
                                    is_unlock_question : 0,
                                    match_id : record.id,
                                    match_name : record.home.name + " vs " + record.away.name,
                                    option_name : key,
                                    question_id : element.id,
                                    question_name : element.name,
                                    ratio : element.odds,
                                    tournament_name : record.league.name,
                                };
                            });
                        })
                        console.log('bet365UpcomingEventsApiResponse getBet365UpcomingEvents', _this.bet365UpcomingEventsApiResponse)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                },
                async getBet365PrematchOdds(eventId) {

                    var _this = this;
                    _this.bet365PrematchOddsApiResponse = [];
                    let url = "{{route('bet365.prematch_odds', ':eventId')}}";
                    url = url.replace(':eventId',eventId);

                    await axios.get(url)
                    .then(function (...result) {
                        let filerData = result['0'].data.results;
                        _this.bet365PrematchOddsApiResponse =  filerData.slice(1,10);
                        console.log('bet365PrematchOddsApiResponse getBet365PrematchOdds', _this.bet365PrematchOddsApiResponse)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                },
                updatebet365InplayData(sportsId) {
                    var _this = this;
                    _this.setBet365SportInplayId = sportsId;
                    _this.bet365InplayFilterApiResponse = [];
                    this.getBet365InplayFilterEvents();
                },
                updatebet365UpcomingData(sportsId) {
                    var _this = this;
                    _this.setBet365SportUpcomingId = sportsId;
                    _this.bet365UpcomingEventsApiResponse = [];
                    this.getBet365UpcomingEvents()
                },
                setBetType(type){
                    if(type) localStorage.setItem("betType","single")
                    else localStorage.setItem("betType","multi")
                    this.getSlip();
                },
                addToSlip(data) {
                    // category_icon : "<i class=\"far fa-futbol\" aria-hidden=\"true\"></i>"
                    // category_name : "Футбол"
                    // id : 15
                    // is_unlock_match : 0
                    // is_unlock_question : 0
                    // match_id : 1
                    // match_name : "Arsenal vs Barcelona"
                    // option_name : "1"
                    // question_id : 5
                    // question_name : "ПОБЕДА"
                    // ratio : 2.1
                    // tournament_name : "UEFA"
                    console.log(data);
                    if (data.is_unlock_question == 1 || data.is_unlock_match == 1) {
                        return 0;
                    }
                    var _this = this;
                    if(localStorage.getItem("betType") === "single")
                        var index = _this.betSlipSingle.findIndex(object => object.match_id === data.match_id);
                    else
                        var index = _this.betSlip.findIndex(object => object.match_id === data.match_id);
                    if (index === -1) {
                        if(localStorage.getItem("betType") === "single")
                            _this.betSlipSingle[0] = data
                        else
                            _this.betSlip.push(data);
                        Notiflix.Notify.Success("Added to Bet slip");
                    } else {
                        if(localStorage.getItem("betType") === "single"){
                            var result = _this.betSlipSingle.map(function (obj) {
                                if (obj.match_id == data.match_id) {
                                    obj = data
                                }
                                return obj
                            });
                            _this.betSlipSingle = result}
                        else{
                            var result = _this.betSlip.map(function (obj) {
                                if (obj.match_id == data.match_id) {
                                    obj = data
                                }
                                return obj
                            });
                            _this.betSlip = result
                        }

                            Notiflix.Notify.Info("Bet slip has been updated");
                    }
                    if(localStorage.getItem("betType") === "single"){
                        _this.totalOdds = _this.oddsCalc(_this.betSlipSingle)
                        localStorage.setItem("newBetSlipSingle", JSON.stringify(_this.betSlipSingle));}
                    else{
                        _this.totalOdds = _this.oddsCalc(_this.betSlip)
                        localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));}
                },
                getSlip() {
                    var _this = this;
                    if(localStorage.getItem("betType")==="single"){
                        var selectData = JSON.parse(localStorage.getItem('newBetSlipSingle'));
                        if (selectData != null) {
                            _this.betSlipSingle = selectData;
                        } else {
                            _this.betSlipSingle = []
                        }console.log('multi',_this.betSlipSingle)
                        _this.totalOdds = _this.oddsCalc(_this.betSlipSingle)
                    }else{
                        var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                        if (selectData != null) {
                            _this.betSlip = selectData;
                        } else {
                            _this.betSlip = []
                        }console.log('single',_this.betSlip)
                        _this.totalOdds = _this.oddsCalc(_this.betSlip)
                    }
                },

                removeItem(obj) {
                    console.log('remove item', obj)
                    var _this = this;
                    if(localStorage.getItem("betType")==="single"){
                        _this.betSlipSingle.splice(_this.betSlipSingle.indexOf(obj), 1);
                        _this.totalOdds = _this.oddsCalc(_this.betSlipSingle)

                        var selectData = JSON.parse(localStorage.getItem('newBetSlipSingle'));
                        var storeIds = selectData.filter(function (item) {
                            if (item.id === obj.id) {
                                return false;
                            }
                            return true;
                        });
                        localStorage.setItem("newBetSlipSingle", JSON.stringify(storeIds));
                    }else{
                        _this.betSlip.splice(_this.betSlip.indexOf(obj), 1);
                        _this.totalOdds = _this.oddsCalc(_this.betSlip)

                        var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                        var storeIds = selectData.filter(function (item) {
                            if (item.id === obj.id) {
                                return false;
                            }
                            return true;
                        });
                        localStorage.setItem("newBetSlip", JSON.stringify(storeIds));
                    }
                },

                oddsCalc(obj) {
                    var ratio = 1;
                    for (var property in obj) {
                        ratio *= parseFloat(obj[property].ratio);
                    }
                    return ratio.toFixed(3);
                },

                decrement() {
                    if (this.form.amount > this.minimumAmo) {
                        this.form.amount--;
                        this.return_amount = parseFloat(this.form.amount * this.totalOdds).toFixed(3);

                        return 0;
                    }
                    return 1;
                },
                increment() {
                    this.form.amount++;
                    this.return_amount = parseFloat(this.form.amount * this.totalOdds).toFixed(3);
                    return 0;
                },
                calc(val) {
                    if (isNaN(val)) {
                        val = 0
                    }
                    if (0 >= val) {
                        val = 0;
                    }
                    this.return_amount = parseFloat(val * this.totalOdds).toFixed(2);
                },

                goMatch(item) {console.log('items', items)
                    var $url = '{{ route("match", [":match_name",":match_id"]) }}';
                    $url = $url.replace(':match_name', item.slug);
                    $url = $url.replace(':match_id', item.id);
                    window.location.href = $url;
                },

                getEvents() {
                    let _this = this;
                    // Pusher.logToConsole = true;
                    let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                        encrypted: true,
                        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                    });
                    var channel = pusher.subscribe('match-notification');

                    channel.bind('App\\Events\\MatchNotification', function (data) {
                        console.log(data)
                        if (data && data.type == 'Edit') {
                            _this.updateEventData(data)
                        } else if (data && data.type != 'Edit') {
                            _this.enlistedEventData(data)
                        }
                    });

                    

                },
                updateEventData(data) {
                    var _this = this;
                    var list = _this.allSports_filter;
                    const result = list.map(function (obj) {
                        if (obj.id == data.match.id) {
                            obj = data.match
                        }
                        return obj
                    });
                    _this.allSports_filter = result


                    var list2 = _this.upcoming_filter;


                    const upcomingResult = list2.map(function (obj) {
                        if (obj.id == data.match.id) {
                            obj = data.match
                        }
                        return obj
                    });

                    _this.upcoming_filter = upcomingResult
                },
                enlistedEventData(data) {
                    var _this = this;
                    if (data && data.type == 'Enlisted') {
                        var list = _this.allSports_filter;
                        list.push(data.match);
                    }
                    if (data && data.type == 'UpcomingList') {
                        var upcomingList = _this.upcoming_filter;
                        upcomingList.push(data.match);
                    }
                },
                betPlace() {
                    var _this = this;
                    var authCheck = "{{auth()->check()}}"
                    if (authCheck !== '1') {
                        window.location.href = "{{route('login')}}"
                        return 0;
                    }
                    if (_this.betSlip.length == 0) {
                        Notiflix.Notify.Failure("Please make a bet slip");
                        return 0
                    }
                    if (_this.form.amount == '') {
                        Notiflix.Notify.Failure("Please put a amount");
                        return 0
                    }
                    if (0 > (_this.form.amount)) {
                        Notiflix.Notify.Failure("Please put a valid amount");
                        return 0
                    }
                    if (parseInt(_this.minimum_bet) > parseInt(_this.form.amount)) {
                        Notiflix.Notify.Failure("Minimum Bet " + _this.minimum_bet + " " + _this.currency);
                        return 0
                    }
                    axios.post('{{route('user.betSlip')}}', {
                        amount: _this.form.amount,
                        activeSlip: _this.betSlip,
                    })
                        .then(function (response) {
                            if (response.data.errors) {
                                for (err in response.data.errors) {
                                    let error = response.data.errors[err][0]
                                    Notiflix.Notify.Failure("" + error);
                                }
                                return 0;
                            }
                            if (response.data.newSlipMessage) {
                                Notiflix.Notify.Warning("" + response.data.newSlipMessage);
                                var newSlip = response.data.newSlip;
                                var unlisted = _this.getDifference(_this.betSlip, newSlip);
                                const newUnlisted = unlisted.map(function (obj) {
                                    obj.is_unlock_match = 1;
                                    obj.is_unlock_question = 1;
                                    return obj
                                });
                                _this.betSlip.concat(newSlip, newUnlisted);
                                localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                                return 0;
                            }

                            if (response.data.success) {
                                _this.betSlip = [];
                                localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                                Notiflix.Notify.Success("Your bet has place successfully");

                                return 0;
                            }

                        })
                        .catch(function (err) {

                        });
                },

                getDifference(array1, array2) {
                    return array1.filter(object1 => {
                        return !array2.some(object2 => {
                            return object1.id === object2.id;
                        });
                    });
                },
                slicedArray(items) {
                    return  Object.values(items)[0];
                },
                liveUpComing(type){
                    localStorage.setItem("showType", type);
                    this.showType = type
                },
                setAmount(value){
                    this.form.amount = value
                }


            }
        });

    </script>
@endpush
