<?php $__env->startSection('title',trans('Home')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make($theme.'partials.mainTab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--Global Main Body-->
    <section class="main__body__area" id="getMatchList" v-cloak> 
        <div class="container-fluid p-0">
            <div class="row g-0">
                <!-- leftbar -->
                <div class="leftbar col-xxl-2 col-xl-2 col-lg-2" id="leftbar">
                    <?php echo $__env->make($theme.'partials.home.leftMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <!-- contents -->
                <div class="col-xxl-8 col-xl-8 col-lg-8 flex">
                    <div class="container-fluid p-0">
                        <div class="row g-0">
                            <?php if(Request::routeIs('condition')): ?>
                                <div class = "condition-content">
                                        <?php echo $__env->make($theme.'partials.home.condition', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('policy')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.policy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('kyc_policy')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.kyc_policy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('bonusterm')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.bonusterm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('gambling')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.gambling', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('about')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('casino_promotion')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.casino_promotion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('sport_promotion')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.sport_promotion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('sportStat')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.sportStat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Request::routeIs('deposit_withdraw')): ?>
                                <div class = "condition-content">
                                    <?php echo $__env->make($theme.'partials.home.deposit_withdraw', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            <div class="content col-xxl-12 col-xl-12 col-lg-12" id="sport-content">
                                <?php if(!in_array(Request::route()->getName(),['condition','policy','bonusterm','gambling','about','kyc_policy','casino_promotion','sport_promotion','deposit_withdraw','sportStat'])): ?>
                                    <?php echo $__env->make($theme.'partials.home.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php if(Request::routeIs('match')): ?>
                                        <?php echo $__env->make($theme.'partials.home.match', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <?php echo $__env->make($theme.'partials.home.bet365', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make($theme.'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php if(!in_array(Request::route()->getName(),['condition','policy','bonusterm','gambling','about','kyc_policy','casino_promotion','sport_promotion','deposit_withdraw','sportStat'])): ?>
                                <?php echo $__env->make($theme.'partials.home.rightbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
            </div>
        </div>
        
    <div class="modal fade" id="BetSlipModal" role="dialog" style="top:170px">
        <div class="modal-dialog  modal-xl">
            <div class="modal-custom-content">
                <div class="modal-header modal-colored-header">
                    <h5 class="modal-title service-title"><?php echo app('translator')->get('Information'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" style="min-height:300px">
                    <table class="table table-striped" id="service-table">
                        <thead class="thead-dark">
                        <tr>
                            <th><?php echo app('translator')->get('#'); ?></th>
                            <th><?php echo app('translator')->get('Match Name'); ?></th>
                            <th><?php echo app('translator')->get('Category Name'); ?></th>
                            <th><?php echo app('translator')->get('Tournament Name'); ?></th>
                            <th><?php echo app('translator')->get('Question Name'); ?></th>
                            <th><?php echo app('translator')->get('Option Name'); ?></th>
                            <th><?php echo app('translator')->get('Ratio'); ?></th>
                            <th><?php echo app('translator')->get('Result'); ?></th>
                        </tr>
                        </thead>
                        <tbody class="result-body">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom me-2 mb-2"
                            data-bs-dismiss="modal"><span><?php echo app('translator')->get('Close'); ?></span></button>
                </div>
        </div>
    </div>
    </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <?php
        $segments = request()->segments();
        $last  = end($segments);
    ?>

    <script>



        let getMatchList = new Vue({
            el: "#getMatchList",
            data: {
                loaded: true,
                currency_symbol: "<?php echo e(config('basic.currency_symbol')); ?>",
                currency: "<?php echo e(config('basic.currency')); ?>",
                minimum_bet: "<?php echo e(config('basic.minimum_bet')); ?>",
                allSports_filter: [],
                upcoming_filter: [],
                selectedData: {},
                betSlip: [],
                betSlipSingle: [],
                totalOdds: 0,
                minimumAmo: 1,
                return_amount: 0,
                win_charge: "<?php echo e(config('basic.win_charge')); ?>",
                form: {
                    amount: 0
                },
                showType: '',
                isLoadingStatus:false,
                bet365: {},
                setBet365SportInplayId: 1,
                setBet365SportUpcomingId: 1,
                upcoming_details:{},
                upcoming_manual_details:{},
                bet365InplayFilterApiResponse: [],
                bet365UpcomingEventsApiResponse: [],
                bet365PrematchOddsApiResponse: [],
                countryName:[],
                leagueName:[],
                lastCountry:null,
                countryLeague:[],
                leagueData:[],
                lastLeague:null,
                bet365Sports: {
                    1  : "Soccer",
                    // 2  : "Horse Racing",
                    3  : "Cricket",
                    // 4  :	"Greyhounds",
                    // 8  : "Rugby Union",
                    // 12 : "American Football",
                    13 : "Tennis",
                    // 14 :	"Snooker",
                    // 15 :	"Darts",
                    // 16 :	"Baseball",
                    17 :  "Ice Hockey",
                    18 : "Basketball",
                    // 19" :	"Rugby League",
                    // 36" : "Australian Rules",
                    // 66 : 	"Bowls",
                    // 75 : "Gaelic Sports",
                    78 :  "Handball",	
                    // 83 : "Futsal",
                    // 90 : "Floorball",
                    91 :  "Volleyball",
                    92 : "Table Tennis",
                    // 94 : "Badminton",
                    // 95 : "Beach Volleyball",
                    // 107 : "Squash",
                    // 110 : "Water Polo",
                    // 148 : "Surfing",
                    // 151 : "E-sports",
                    // 162 : "MMA",
                },
                image:null
            },
            mounted() {
                console.log(window.location.href,'location')
                    if(localStorage.getItem('topMenu') ==='true')
                        localStorage.setItem("showType", 'live');
                    else
                        localStorage.setItem("showType", 'upcoming');
                localStorage.setItem("betType",'single')
                this.showType = localStorage.getItem("showType");
                var category_id = localStorage.getItem("category_id");
                if(!category_id || category_id ==0){
                    localStorage.setItem("category_id",1);
                    this.setBet365SportInplayId = 1;
                    this.setBet365SportUpcomingId = 1;
                }
                else {
                    this.setBet365SportInplayId = localStorage.getItem('category_id');
                    this.setBet365SportUpcomingId = localStorage.getItem('category_id');
                }
               
                //localStorage.setItem('category_id',1)
                this.getMatches();
                this.getSlip();
                this.getEvents();
                // this.getBet365AllUpcomingEvents();
                this.getBet365UpcomingEvents();
                this.getBet365InplayFilterEvents();

                localStorage.setItem("topMenu",false)
            },
            methods: {
                async getMatches() {
                    var _this = this;
                    var _segment = "<?php echo e(Request::segment(1)); ?>"
                    var routeName = "<?php echo e(Request::route()->getName()); ?>"
                    var $lastSegment = "<?php echo e($last); ?>"
                    var $url = '<?php echo e(route('allSports')); ?>';
                    

                    if (routeName == 'category') {
                        $url = '<?php echo e(route('allSports')); ?>?categoryId=' + $lastSegment;
                    }
                    if (routeName == 'tournament') {
                        $url = '<?php echo e(route('allSports')); ?>?tournamentId=' + $lastSegment;
                    }
                    if (routeName == 'match') {
                        $url = '<?php echo e(route('allSports')); ?>?matchId=' + $lastSegment;
                    }
                    _this.isLoadingStatus = true;
                    // if(routeName == 'match' && !localStorage.getItem('upcoming_manual_details').startsWith('[object Object]')){
                    //     var matchId = "<?php echo e(Request::segment(3)); ?>";
                    //     _this.upcoming_manual_details = JSON.parse(localStorage.getItem('upcoming_manual_details'))
                    //     _this.isLoadingStatus = false;
                    // }
                    // else{
                        await axios.get($url)
                            .then(function (response) {
                                console.log(response,"res")
                                _this.allSports_filter = response.data.liveList.filter((item)=>item.newindex.results[0].schedule.sp.main.length>0);
                                _this.upcoming_filter = response.data.upcomingList;
                                var matchId = "<?php echo e(Request::segment(3)); ?>";
                                _this.upcoming_manual_details = _this.upcoming_filter.filter((item)=>(item.id).toString() === matchId.toString())[0]
                                console.log('all sports filter', _this.allSports_filter);
                                console.log('upcoming filter', _this.upcoming_filter);
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    //     localStorage.setItem('upcoming_manual_details',{})
                    // }
                },
                async updateBet365Events(sportId) {
                    console.log('here is your code', sportId);
                },
                async getBet365InplayEvents() {
                    
                },
                async getBet365InplayFilterEvents() {
                    var _this = this;
                    _this.bet365InplayFilterApiResponse = [];
                    let url = "<?php echo e(route('bet365.inplay_filter', ':sportId')); ?>";
                    url = url.replace(':sportId',_this.setBet365SportInplayId)
                    _this.isLoadingStatus = true
                    await axios.get(url)
                    .then(function (...result) {
                        console.log(result,"res1")
                        let filerData = result['0'].data.results;
                        console.log(filerData,"data")
                        _this.bet365InplayFilterApiResponse =  filerData.filter((item)=>!item.league.name.includes('Esoccer')).filter((item)=>!item.league.name.includes('Esports')).filter((item)=>item.newindex.results[0].schedule.sp.main.length>0)
                        console.log('bet365InplayFilterApiResponse', _this.bet365InplayFilterApiResponse)
                        _this.bet365InplayFilterApiResponse.map((record) => {
                            record.newindex?.results[0]?.schedule?.sp?.main.forEach((element, key) => {
                                element.betdata = {
                                    category_name : _this.bet365Sports[_this.setBet365SportInplayId],
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
                                console.log("element",element)
                            });
                        })
                        console.log('bet365InplayFilterApiResponse', _this.bet365InplayFilterApiResponse)
                        if(_this.bet365UpcomingEventsApiResponse.length != 0) _this.isLoadingStatus = false;
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
                    });
                },
                async getBet365AllUpcomingEvents() {
                    var _this = this;
                    _this.bet365UpcomingEventsApiResponse = [];
                    let url = "<?php echo e(route('bet365.upcoming', ':sportsId')); ?>";
                    url = url.replace(':sportsId',_this.setBet365SportId);
                    await axios.get(url)
                    .then(function (...result) {
                        let filerData = result['0'].data.results;
                        _this.bet365UpcomingEventsApiResponse =  filerData.filter((item)=>!item.league.name.includes('Esoccer')).filter((item)=>!item.league.name.includes('Esports'))
                        console.log('bet365UpcomingEventsApiResponse getBet365AllUpcomingEvents', _this.bet365UpcomingEventsApiResponse)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                },
                async getBet365UpcomingEvents() {
                    var _this = this;
                    _this.bet365UpcomingEventsApiResponse = [];
                    let url = "<?php echo e(route('bet365.upcoming', ':sportsId')); ?>";
                    url = url.replace(':sportsId',_this.setBet365SportUpcomingId);
                    _this.isLoadingStatus = true;
                    var routeName = "<?php echo e(Request::route()->getName()); ?>"
                    if(routeName == 'match' && !localStorage.getItem('upcoming_details').startsWith('[object Object]')){
                        var matchId = "<?php echo e(Request::segment(3)); ?>"
                        _this.upcoming_details = JSON.parse(localStorage.getItem('upcoming_details'))
                        _this.isLoadingStatus = false;
                        // _this.upcoming_details = _this.bet365UpcomingEventsApiResponse.filter((item)=>item.id == matchId)[0]
                        console.log('here here here', _this.upcoming_details)
                    }else{
                        localStorage.setItem('upcoming_details',{})
                    }
                    if((typeof localStorage.getItem('upcoming_details')) === 'string' && localStorage.getItem('upcoming_details').startsWith('[object Object]'))
                    await axios.get(url)
                    .then(function (...result) {
                        let filerData = result['0'].data.results;
                        if(_this.setBet365SportUpcomingId != 2)
                            _this.bet365UpcomingEventsApiResponse =  filerData.filter((item)=>!item.away.name.includes('Esoccer')).filter((item)=>!item.away.name.includes('Esports')).filter((item)=>item.newindex.results[0].schedule.sp.main.length>0);
                        else _this.bet365UpcomingEventsApiResponse = filerData;
                        _this.bet365UpcomingEventsApiResponse.map((record) => {
                            record.newindex?.results[0]?.schedule?.sp?.main.forEach((element, key) => {
                                element.betdata = {
                                    category_name : _this.bet365Sports[_this.setBet365SportUpcomingId],
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
                        });
                        var matchId = "<?php echo e(Request::segment(3)); ?>"
                        _this.upcoming_details = _this.bet365UpcomingEventsApiResponse.filter((item)=>item.id==matchId)[0]
                        _this.isLoadingStatus = false;
                        let decodedCookie = decodeURIComponent(document.cookie);
                        let ca = decodedCookie.split(';');
                        console.log(ca,"decodedCookie");
                        let data11 = ca[0];
                        let cond = data11.split('=')[0]
                        if(cond=='sport'){
                        let sport = data11.split('=')[1];

                    //      var sport = localStorage.getItem("sport");
                             if(sport!=null){
                        console.log("null ni hai");
                        _this.getCountryName(sport);
                            }       
                        }
                        console.log('bet365UpcomingEventsApiResponse getBet365UpcomingEvents', _this.bet365UpcomingEventsApiResponse);
                        console.log('cc aauna',_this.bet365UpcomingEventsApiResponse[0].CC)                        
                    })
                    .catch(function (error) {
                        _this.isLoadingStatus = false;
                        console.log(error);
                    })
                },
                async getBet365PrematchOdds(eventId) {
                    var _this = this;
                    _this.bet365PrematchOddsApiResponse = [];
                    let url = "<?php echo e(route('bet365.prematch_odds', ':eventId')); ?>";
                    url = url.replace(':eventId',eventId);
                    _this.isLoadingStatus = true;
                    await axios.get(url)
                        .then(function (...result) {
                            let filerData = result['0'].data.results;
                            _this.bet365PrematchOddsApiResponse =  filerData
                            _this.isLoadingStatus = false
                            console.log('bet365PrematchOddsApiResponse getBet365PrematchOdds', _this.bet365PrematchOddsApiResponse)
                        })
                        .catch(function (error) {
                            _this.isLoadingStatus = false
                            console.log(error);
                        });
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
                    this.getBet365UpcomingEvents();
                },
                setBetType(type){
                    if(type) localStorage.setItem("betType","single");
                    else localStorage.setItem("betType","multi");
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
                    console.log(data,"dataaaa");
                    if (data.is_unlock_question == 1 || data.is_unlock_match == 1) {
                        return 0;
                    };
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
                    };
                    if(localStorage.getItem("betType") === "single"){
                        _this.totalOdds = _this.oddsCalc(_this.betSlipSingle)
                        localStorage.setItem("newBetSlipSingle", JSON.stringify(_this.betSlipSingle));
                    }   else{
                        _this.totalOdds = _this.oddsCalc(_this.betSlip)
                        localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                    };
                },
                getSlip() {
                    var _this = this;
                    if(localStorage.getItem("betType")==="single"){
                        var selectData = JSON.parse(localStorage.getItem('newBetSlipSingle'));
                        if (selectData != null) {
                            _this.betSlipSingle = selectData;
                        } else {
                            _this.betSlipSingle = [];
                        }
                        _this.totalOdds = _this.oddsCalc(_this.betSlipSingle);
                    }else{
                        var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                        if (selectData != null) {
                            _this.betSlip = selectData;
                        } else {
                            _this.betSlip = [];
                        }
                        console.log('single',_this.betSlip);
                        _this.totalOdds = _this.oddsCalc(_this.betSlip);
                    }
                },
                removeItem(obj) {
                    var _this = this;
                    if (localStorage.getItem("betType")==="single"){
                        _this.betSlipSingle.splice(_this.betSlipSingle.indexOf(obj), 1);
                        _this.totalOdds = _this.oddsCalc(_this.betSlipSingle);
                        var selectData = JSON.parse(localStorage.getItem('newBetSlipSingle'));
                        var storeIds = selectData.filter(function (item) {
                            if (item.id === obj.id) {
                                return false;
                            }
                            return true;
                        });
                        localStorage.setItem("newBetSlipSingle", JSON.stringify(storeIds));
                    }   else {
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
                    };
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
                        val = 0;
                    }
                    if (0 >= val) {
                        val = 0;
                    }
                    this.return_amount = parseFloat(val * this.totalOdds).toFixed(2);
                },
                goMatch(item) {
                    item.home ? localStorage.setItem('upcoming_details', JSON.stringify(item)) :  localStorage.setItem('upcoming_manual_details', JSON.stringify(item));
                    var $url = '<?php echo e(route("match", [":match_name",":match_id"])); ?>';
                    $url = item.home ? $url.replace(':match_name', `${item.home.name.replace(/\//g, '-')}-vs-${item.away.name.replace(/\//g, '-')}`) : $url.replace(':match_name', `${item.team1.replace(/\//g, '-')}-vs-${item.team2.replace(/\//g, '-')}`);
                    $url = $url.replace(':match_id', item.id);
                    window.location.href = $url;
                },
                getEvents() {
                    let _this = this;
                    // Pusher.logToConsole = true;
                    let pusher = new Pusher("<?php echo e(env('PUSHER_APP_KEY')); ?>", {
                        encrypted: true,
                        cluster: "<?php echo e(env('PUSHER_APP_CLUSTER')); ?>"
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
                    var authCheck = "<?php echo e(auth()->check()); ?>";
                    if(localStorage.getItem('betType')=='single'){
                        _this.betSlip = _this.betSlipSingle
                    };
                    if (authCheck !== '1') {
                        window.location.href = "<?php echo e(route('login')); ?>"
                        return 0;
                    };
                    if (_this.betSlip.length == 0) {
                        Notiflix.Notify.Failure("Please make a bet slip");
                        return 0
                    };
                    if (_this.form.amount == 0) {
                        Notiflix.Notify.Failure("Please put a amount");
                        return 0
                    };
                    if (0 > (_this.form.amount)) {
                        Notiflix.Notify.Failure("Please put a valid amount");
                        return 0
                    };
                    if (parseInt(_this.minimum_bet) > parseInt(_this.form.amount)) {
                        Notiflix.Notify.Failure("Minimum Bet " + _this.minimum_bet + " " + _this.currency);
                        return 0
                    };
                    axios.post('<?php echo e(route('user.betSlip')); ?>', {
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
                                $('#BetSlipModal').show()
                                console.log('betSlip', _this.betSlip)
                                Notiflix.Notify.Success("Your bet has place successfully");
                                Notiflix.Notify.Success("Your bet has place successfully");
                                if(localStorage.getItem('betType') == 'single'){
                                    _this.betSlipSingle = [];
                                    localStorage.setItem("newBetSlipSingle", JSON.stringify(_this.betSlipSingle));
                                    
                                }else{
                                    _this.betSlip = [];
                                    localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                                }

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
                },
                getTimeDifference(timestamp) {
                  const currentTime = Math.floor(Date.now() / 1000); // Get current Unix timestamp in seconds
                  const timeDifference = timestamp - currentTime;
                
                  // Calculate the hours, minutes, and seconds
                  const hours = Math.floor(timeDifference / 3600);
                  const minutes = Math.floor((timeDifference % 3600) / 60);
                  const seconds = timeDifference % 60;
                
                  // Format the time difference
                  const formattedTime = `${hours}h ${minutes}m ${seconds}s`;
                
                  return formattedTime;
                },
                getCountryName(sport){
                    var arr = [];
                    this.bet365UpcomingEventsApiResponse.forEach((el)=>{
                        if(arr.length<1){
                            arr.push(el.CC.results[0].league.cc);

                            // this.countryName.push(el.CC.results[0].league.cc);                              
                        }
                        else{
                            var existingCountry = arr.find((r)=>{
                                return r==el.CC.results[0].league.cc;
                            })
                            
                            if(existingCountry){

                            }
                            else{
                                if(el.CC.results[0].league.cc != null)
                                {
                                    arr.push(el.CC.results[0].league.cc);
                                    // this.countryName.push(el.CC.results[0].league.cc);
                                }
                            }
                        }
                    })
                    console.log("arr",arr)
                    if(this.countryName.length == 0){
                         arr.forEach(async(ele)=>{
                        var data = await this.countryFromJson(ele);
                        console.log("data",data,this.image)
                        this.countryName.push({countryName:data,cc:ele,image:this.image});

                        console.log("this.countryName",this.countryName)
                       
                        console.log("this.countryName11",this.countryName)
                    })
                    }
                   

                    setTimeout(()=>{
                        $(`#${sport}`).toggle();
                    },0)
                    console.log(this.countryName,"country...")
                },
                getLeague(country){
                    console.log(country,"cc??")
                    if(this.lastCountry==null){
                    this.bet365UpcomingEventsApiResponse.forEach((el)=>{
                        if(el.CC.results[0].league.cc==country){
                            console.log("comin??")
                            this.countryLeague.push(el);
                            console.log("two?")
                        if(this.leagueName.length<1){
                            console.log("three")
                            this.leagueName.push(el.CC.results[0].league.name);
                            console.log(this.leagueName,"league1")
                            console.log("four");
                        }   
                        else{
                            console.log("five")
                             var existingCountry = this.leagueName.find((r)=>{
                                console.log("cccc")
                                return r==el.CC.results[0].league.name;
                                console.log("cc2c2c2")
                            })
                             console.log("six");
                            // console.log(existingCountry,"cond")
                            if(existingCountry){

                            }
                            else{
                                console.log("seven");
                                this.leagueName.push(el.CC.results[0].league.name);
                            }
                        }

                        }
                    })
                    console.log(this.leagueName,"league2")
                    // var element = document.getElementById(country);
                    // $(`.${country}`).css('display','')
                    setTimeout(()=>{
                        console.log("hey")
                    $(`.${country}`).css('display','block')
                    this.lastCountry=country;
                    },0)
                    }
                    else{
                        if(country==this.lastCountry){
                             // $(`.${country}`).css('display','none');
                            $(`.${country}`).toggle();
                        }
                        else{
                        this.countryLeague=[];
                        this.leagueName = [];
                        this.bet365UpcomingEventsApiResponse.forEach((el)=>{
                        if(el.CC.results[0].league.cc==country){
                            this.countryLeague.push(el);
                        if(this.leagueName.length<1){
                            this.leagueName.push(el.CC.results[0].league.name);
                        }   
                        else{
                             var existingCountry = this.leagueName.find((r)=>{
                                return r==el.CC.results[0].league.name;
                            })
                            // console.log(existingCountry,"cond")
                            if(existingCountry){

                            }
                            else{
                                this.leagueName.push(el.CC.results[0].league.name);
                            }
                        }
                        }
                    })
                    // var element = document.getElementById(country);
                    // $(`.${country}`).css('display','')
                    setTimeout(()=>{
                    $(`.${this.lastCountry}`).css('display','none')
                    $(`.${country}`).css('display','block')
                    this.lastCountry=country;
                    },0)    
                        }

                    }
                },
                getLeagueData(item,item1){
                    console.log(item,"item")
                    console.log(item1,"item1")
                    if(this.lastLeague!=null){
                        this.leagueData=[];
                    
                    }
                    $(`#defaultData`).hide();
                    $(`#loadedData`).show();
                    this.lastLeague=item1;
                    $(`.${item}`).toggle();
                    console.log(this.countryLeague,"countrydata")
                    this.countryLeague.forEach((el)=>{
                        if(el.league.name==item1){
                            this.leagueData.push(el);
                        }
                    })
                    console.log(this.leagueData,"leagueData");
                },
                async countryFromJson(cc) {
                  try {
                    const response = await fetch('/assets/country/countries.json'); // Replace with the correct URL
                    const data = await response.json();
                    const country =  data.results.find(countryData => countryData.cc === cc);
                    console.log("country",country);
                    if (country) {
                        // console.log(country.name);
                        console.log("iimage",country.image_path)
                        this.image=country.image_path
                        return country.name;
                    } else {
                      return cc;
                  }
                } catch (error) {
                    console.error('Error fetching or parsing JSON:', error);
                    return 'Error';
                }
                }
}
});


// Example usage:

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/home.blade.php ENDPATH**/ ?>