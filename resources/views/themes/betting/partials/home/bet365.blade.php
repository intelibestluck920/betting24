<!--Match Fixing Slider-->
<div class="match__fixing__wrap top__bottom__space left__right__space owl-theme owl-carousel">
</div>
<!--Match Fixing Slider-->
<!--Main body-->
<div class="main__body__wrap left__right__space">

    <!--Live__heightlight Here-->
    <div class="live__heightlight mb__30" v-if="localStorage.getItem('showType') == 'live'">
        <div class="section__title">
            <h3 style="color: #13E08D;font-weight: unset;" class="font_change">
                LIVE HIGHLIGHTS
            </h3>
        </div>
        <div class="heightlight__tab">
            <div class="nav b__bottom" id="nav-tabheight" role="tablist">
                <button 
                    class="nav-link" 
                    id="lightlighttab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#height1" 
                    type="button" role="tab" 
                    aria-selected="true" 
                    v-for="(sport, index) in this.bet365Sports" 
                    class="nav-link" 
                    :class="(setBet365SportInplayId == index && showType == 'live') ? 'active': '' " 
                    :key="index" 
                    :id="index" 
                    @click="updatebet365InplayData(index)">
                    <span class="icons">
                      <i v-if="index == 1" class="icon-football"></i>
                      <i v-if="index == 3" class="icon-cricket"></i>
                      <i v-if="index == 17" class="icon-icehockey"></i>
                      <i v-if="index == 13" class="icon-tennis"></i>
                      <i v-if="index == 18" class="icon-basketball"></i>
                      <i v-if="index == 92" class="icon-ttennis"></i>
                      <i v-if="index == 91" class="icon-volly"></i>
                      <i v-if="index == 78" class="icon-handball"></i>
                    </span>
                    <span  style="padding-top:4px">
                     @{{ sport }}
                    </span>
                </button>
            </div>
        </div>
        <div class="main__table main__table__tennis main__table__cricket">
            <div class="table__wrap">
{{--                <div class="table__items table__pointnone__items" v-if="bet365InplayFilterApiResponse.length">--}}
{{--                    <div class="t__items">--}}
{{--                    <div class="t__items__left">--}}
{{--                            --}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart__point">--}}
{{--                        --}}
{{--                    </div>--}}
{{--                    <div class="mart__point__items">--}}
{{--                        <a href="#0" class="twing opo twing__right">--}}
{{--                            <i class="icon-twer"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#0" class="mart opo">--}}
{{--                            <i class="icon-pmart"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#0box" class="point__box bg__none">--}}
{{--                            1--}}
{{--                        </a>--}}
{{--                        <a href="#0box" class="point__box bg__none">--}}
{{--                            X--}}
{{--                        </a>--}}
{{--                        <a href="#0box" class="point__box bg__none">--}}
{{--                            2--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="cart__point cart__point__two">--}}
{{--                        Goals--}}
{{--                    </div>--}}
{{--                    <div class="mart__point__two">--}}
{{--                        <div class="mart__point__left">--}}
{{--                            <a href="#box" class="point__box bg__none">--}}
{{--                                Over --}}
{{--                            </a>--}}
{{--                            <a href="#box" class="point__box bg__none">--}}
{{--                                Under--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="mart__point__right">--}}
{{--                            <a href="#0" class="point__box bg__none">--}}
{{--                                Yes--}}
{{--                            </a>--}}
{{--                            <a href="#0" class="point__box bg__none">--}}
{{--                                No--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div v-if="isLoadingStatus && bet365InplayFilterApiResponse.length == 0"  style="display: flex; flex-direction: column; align-items: center;">
                 <div class="loading">

                    <div class="demo_loader">
                        <div class="loader__ball"></div>
                        <div class="loader__ball"></div>
                        <div class="loader__ball"></div>
                    </div>
                </div>
                    <p  style="text-align: center;">Please wait... Loading Sports Events!</p>
                </div>
                <div class="waiting-component table__items table__pointnone__items" v-if="!isLoadingStatus && bet365InplayFilterApiResponse.length ==0">
                    <p>No match is being played right now.</p>
                </div>
                <div class="table__items b__bottom" v-if="!isLoadingStatus && bet365InplayFilterApiResponse.length>0" v-for="(record,index) in bet365InplayFilterApiResponse">
                    <div class="t__items">
                        <div class="t__items__left">
                            <h6>
                            @{{ record.league.name }}
                            </h6>
                            <span class="text">
                            @{{ record.home.name }} vs @{{ record.away.name }}
                            </span>
                            <p>
                                <a href="#0">
                                    Live
                                </a>
                            </p>
                        </div>
                        <!-- <div class="serial">
                                264/7
                        </div> -->
                    </div>
                    <div class="cart__point">
                        <span>
                            @{{ record.ss? record.ss.split('-')[0] : 0}} -
                        </span>
                        <span>
                            @{{ record.ss? record.ss.split('-')[1] : 0}}
                        </span>
                    </div>
                    <div class="mart__point__items">
                        <a href="#0" class="twing twing__right">
                            <i class="icon-twer"></i>
                        </a>
                        <a href="#0" class="mart">
                            <i class="icon-pmart"></i>
                        </a>
                        <a href="#box" 
                            class="point__box" 
                            v-for="(odd,index) in record?.newindex?.results[0]?.schedule?.sp?.main" 
                            v-if="index<3"
                            @click="addToSlip(odd.betdata)">
                            <!-- <span class="point__1">@{{ odd.name }}</span> -->
                            <span> @{{ Number(odd.odds).toFixed(2) }}</span>
                        </a>
                        <!-- <a class="point__box" 
                                            @click="addToSlip(odd.betdata)">
                            @{{record.newindex.original.results[0].filter(arr=>arr.type==="EV")?.[0]?.MP}}
                        </a>
                        <a href="#0box" class="point__box" 
                                            @click="addToSlip(odd.betdata)">
                            @{{record.newindex.original.results[0].filter(arr=>arr.type==="EV")?.[0]?.TS}}
                        </a>
                        <a href="#0box" class="point__box" 
                                            @click="addToSlip(odd.betdata)">
                            @{{record.newindex.original.results[0].filter(arr=>arr.type==="EV")?.[0]?.T3}}
                        </a> -->
                    </div>
                    <div class="cart__point cart__point__two">
                        @{{record.ss}}
                    </div>
                    <div class="mart__point__two">
                        <div class="mart__point__left">
                            <a href="#box" class="point__box" 
                                            @click="addToSlip({...record?.newindex?.results[0]?.schedule?.sp?.main[0].betdata, ratio:record?.newindex?.results[0]?.goals?.sp?.goals_over_under[1].odds,tournament_name:'Over' })">
                                @{{ record?.newindex?.results[0]?.goals?.sp?.goals_over_under[1].odds}}
                            </a>
                            <a href="#box" class="point__box" 
                                            @click="addToSlip({...record?.newindex?.results[0]?.schedule?.sp?.main[0].betdata, ratio:record?.newindex?.results[0]?.goals?.sp?.goals_over_under[2].odds,tournament_name:'Under' })">
                                @{{ record?.newindex?.results[0]?.goals?.sp?.goals_over_under[2].odds}}
                            </a>
                        </div>
                        <div class="mart__point__right">
                            <a href="#0" class="point__box bg__none">
                                <i class="icon-lock"></i>
                            </a>
                            <a href="#0" class="point__box bg__none">
                                <i class="icon-star star"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="table__footer">
                    <a href="#0" class="lobby text__opa">
                        Open <span class="text__btn"> Volleyball Live</span> Events
                    </a>
                    <a href="#0" class="footerpoing">
                        <span>8</span>
                        <span><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
    <!--Live__heightlight End-->


    <!-- <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    jfgjgfgh
                </div>
            </div>
        </div>
    </div> -->


    <!--Next-To-Go Here-->
    <div class="live__heightlight mb__30"v-if="localStorage.getItem('showType') == 'upcoming'">
        <div class="section__title">
            <h3 style="color: #13E08D; font-weight: unset;" class="font_change">
                UPCOMING EVENTS 
            </h3>
        </div>
        <div class="heightlight__tab nexttogo__tab">
            <div class="nav pt-20 pb-20" id="nav-tabheightnextgo" role="tablist">
                <button
                    class="nav-link"
                    data-bs-toggle="tab"
                    data-bs-target="#height1next"
                    type="button"
                    role="tab"
                    aria-selected="true"
                    v-for="(sport, index) in this.bet365Sports"
                    class="nav-link"
                    :class="(showType == 'upcoming' && setBet365SportUpcomingId == index) ? 'active': '' "
                    :key="index"
                    :id="index"
                    @click="updatebet365UpcomingData(index)">
                  <span class="icons">
                      <i v-if="index == 1" class="icon-football"></i>
                      <i v-if="index == 3" class="icon-cricket"></i>
                      <i v-if="index == 17" class="icon-icehockey"></i>
                      <i v-if="index == 13" class="icon-tennis"></i>
                      <i v-if="index == 18" class="icon-basketball"></i>
                      <i v-if="index == 92" class="icon-ttennis"></i>
                      <i v-if="index == 91" class="icon-volly"></i>
                      <i v-if="index == 78" class="icon-handball"></i>
                  </span>
                  <span  style="padding-top:4px">
                      @{{ sport }}
                  </span>
                </button>
            </div>
        </div>
        <div class="height__table">
            <div class="tab-content" id="nav-tabContentheightnext">
                <div class="tab-pane fade text-white show active" id="height1next" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table">
                        <div class="table__wrap">
                            <div  v-if="bet365UpcomingEventsApiResponse.length == 0 && isLoadingStatus"  style="display: flex; flex-direction: column; align-items: center;">
                            <!-- <div  v-if="isLoadingStatus"  style="display: flex; flex-direction: column; align-items: center;"> -->

                              <!--   <div class="waiting-component  ">
                                	<div class="yellow waiting"></div>
                                	<div class="red waiting"></div>
                                	<div class="blue waiting"></div>
                                	<div class="violet waiting"></div>
                                </div> -->
                                <div class="loading">
                                 
                                    <div class="demo_loader">
                                        <div class="loader__ball"></div>
                                        <div class="loader__ball"></div>
                                        <div class="loader__ball"></div>
                                    </div>
                                </div>
                                <p  style="text-align: center;">Please wait... Loading Sports Events!</p>
                            </div>
                            <div id="defaultData">
                            <div class="waiting-component table__items b__bottom" v-if="bet365UpcomingEventsApiResponse.length == 0 && !isLoadingStatus">
                            	<p>No match is being played right now.</p>
                            </div>  
                            <div class="table__items b__bottom" v-if="index<=3" v-for="(record,index) in bet365UpcomingEventsApiResponse">
                                <div class="t__items">
                                    <div class="t__items__left t__items__left__nextogo">
                                      <div class="t__items__icon">
                                          <i v-if="setBet365SportUpcomingId == 1" class="icon-football"></i>
                                          <i v-if="setBet365SportUpcomingId == 3" class="icon-cricket"></i>
                                          <i v-if="setBet365SportUpcomingId == 17" class="icon-icehockey"></i>
                                          <i v-if="setBet365SportUpcomingId == 13" class="icon-tennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 18" class="icon-basketball"></i>
                                          <i v-if="setBet365SportUpcomingId == 92" class="icon-ttennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 91" class="icon-volly"></i>
                                          <i v-if="setBet365SportUpcomingId == 78" class="icon-handball"></i>
                                      </div>
                                      <div class="content_new">
                                          <h6>
                                            @{{ record.home.name }}
                                          </h6>
                                          <h6 class="text">
                                            @{{ record.away.name }}
                                          </h6>
                                      </div>
                                    </div>
                                </div>
                                <div class="mart__point__two mart__pint__nextgo">
                                    <div class="mart__point__left">
                                        <a href="#box" 
                                            class="point__box" 
                                            v-if="index<3"
                                            v-for="(odd, index) in record?.newindex?.results[0]?.schedule?.sp?.main" 
                                            @click="addToSlip(odd.betdata)">
                                            <span class="point__1">@{{ odd.name }}</span>
                                            <span> @{{ Number(odd.odds).toFixed(2) }}</span>
                                        </a>
                                    </div>
{{--                                    <div class="mart__point__right">--}}
{{--                                        <button type='button' @click="goMatch(record)" class="point__box-text point__box__nextto">--}}
{{--                                        <span> Starting in @{{Math.floor((record.time-record.updated_at)/60)}} min  | Match Details</span>--}}
{{--                                        <span class="icons"><i class="fas fa-angle-right"></i></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    <div class="mart__point__right">
                                        <button type="button" @click="goMatch(record)" class="point__box__nextto cmn--btn2" style="font-family: 'Inter', sans-serif; font-size: 10px; color: white;">
                                            <span> Starting in
                                                @{{ Math.floor((record.time - record.updated_at) / 60 / 60) }}h
                                                @{{ Math.floor(((record.time - record.updated_at) / 60) % 60) }}min <br> Match Details
                                            </span>
                                        </button>
                                    </div>


                                </div>
                            </div>
                            <div v-if="upcoming_filter.length>0 && bet365UpcomingEventsApiResponse.length > 0 && !isLoadingStatus && setBet365SportUpcomingId ==1 " class="table__items b__bottom" v-for="record in upcoming_filter">
                                <div class="t__items">
                                    <div class="t__items__left t__items__left__nextogo">
                                      <div class="t__items__icon">
                                          <i v-if="setBet365SportUpcomingId == 1" class="icon-football"></i>
                                          <i v-if="setBet365SportUpcomingId == 3" class="icon-cricket"></i>
                                          <i v-if="setBet365SportUpcomingId == 17" class="icon-icehockey"></i>
                                          <i v-if="setBet365SportUpcomingId == 13" class="icon-tennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 18" class="icon-basketball"></i>
                                          <i v-if="setBet365SportUpcomingId == 92" class="icon-ttennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 91" class="icon-volly"></i>
                                          <i v-if="setBet365SportUpcomingId == 78" class="icon-handball"></i>
                                      </div>
                                      <div class="content_new">
                                          <h6>
                                            @{{ record.team1 }}
                                          </h6>
                                          <h6 class="text">
                                            @{{ record.team2 }}
                                          </h6>
                                      </div>
                                    </div>
                                </div>
                                <div class="mart__point__two mart__pint__nextgo">
                                    <div class="mart__point__left">
                                        <a href="#box" 
                                            class="point__box" 
                                            v-for="(odd, index) in record?.questions[0]?.options" 
                                            v-if="index<3"
                                            @click="addToSlip(odd)">
                                            <span class="point__1">@{{ odd.option_name }}</span>
                                            <span> @{{ Number(odd.ratio).toFixed(2) }}</span>
                                        </a>
                                    </div>
{{--                                    <div class="mart__point__right">--}}
{{--                                        <button type='button' @click="goMatch(record)" class="point__box-text point__box__nextto">--}}
{{--                                        <span> Starting in @{{Math.floor((new Date(record.start_date)-  new Date())/60000)}} min  | Match Details</span>--}}
{{--                                        <span class="icons"><i class="fas fa-angle-right"></i></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    <div class="mart__point__right">
                                        <button type="button" @click="goMatch(record)" class="point__box__nextto cmn--btn2" style="font-family: 'Inter', sans-serif; font-size: 9px; color: white;">
                                            <span>
                                                Starting in
                                                @{{Math.floor(((new Date(record.start_date) - new Date()) / 60000) / 60)}}h
                                                @{{Math.floor((new Date(record.start_date) - new Date()) / 60000 % 60)}}min <br> Match Details


                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom" v-if="index>3" v-for="(record,index) in bet365UpcomingEventsApiResponse">
                                <div class="t__items">
                                    <div class="t__items__left t__items__left__nextogo">
                                      <div class="t__items__icon">
                                          <i v-if="setBet365SportUpcomingId == 1" class="icon-football"></i>
                                          <i v-if="setBet365SportUpcomingId == 3" class="icon-cricket"></i>
                                          <i v-if="setBet365SportUpcomingId == 17" class="icon-icehockey"></i>
                                          <i v-if="setBet365SportUpcomingId == 13" class="icon-tennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 18" class="icon-basketball"></i>
                                          <i v-if="setBet365SportUpcomingId == 92" class="icon-ttennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 91" class="icon-volly"></i>
                                          <i v-if="setBet365SportUpcomingId == 78" class="icon-handball"></i>
                                      </div>
                                      <div class="content_new">
                                          <h6>
                                            @{{ record.home.name }}
                                          </h6>
                                          <h6 class="text">
                                            @{{ record.away.name }}
                                          </h6>
                                      </div>
                                    </div>
                                </div>
                                <div class="mart__point__two mart__pint__nextgo">
                                    <div class="mart__point__left">
                                        <a href="#box" 
                                            class="point__box" 
                                            v-if="index<3"
                                            v-for="(odd, index) in record?.newindex?.results[0]?.schedule?.sp?.main" 
                                            @click="addToSlip(odd.betdata)">
                                            <span class="point__1">@{{ odd.name }}</span>
                                            <span> @{{ Number(odd.odds).toFixed(2) }}</span>
                                        </a>
                                    </div>
{{--                                    <div class="mart__point__right">--}}
{{--                                        <button type='button' @click="goMatch(record)" class="point__box-text point__box__nextto">--}}
{{--                                        <span> Starting in @{{Math.floor((record.time-record.updated_at)/60)}} min  | Match Details</span>--}}
{{--                                        <span class="icons"><i class="fas fa-angle-right"></i></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    <div class="mart__point__right">
                                        <button type="button" @click="goMatch(record)" class="point__box__nextto cmn--btn2" style="font-family: 'Inter', sans-serif; font-size: 10px; color: white;">
                                            <span> Starting in
                                                @{{ Math.floor((record.time - record.updated_at) / 60 / 60) }}h
                                                @{{ Math.floor(((record.time - record.updated_at) / 60) % 60) }}min <br> Match Details
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div v-if="setBet365SportUpcomingId == 8 || setBet365SportUpcomingId == 12 || setBet365SportUpcomingId == 14 || setBet365SportUpcomingId == 15" class="table__items b__bottom" v-for="record in bet365UpcomingEventsApiResponse">
                                <div class="t__items">
                                    <div class="t__items__left">
                                        <h6>
                                          @{{ record.home.name }}
                                        </h6>
                                        <h6 class="text">
                                          @{{ record.away.name }}
                                        </h6>
                                    </div>
                                    
                                </div>
                                <div class="mart__point__two mart__pint__nextgo">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box" v-for="odd in 2" @click="addToSlip(odd)">
                                            <span class="point__1">-</span>
                                            <span> -</span>
                                        </a>
                                    </div>
{{--                                    <div class="mart__point__right">--}}
{{--                                        <button type="button" @click="goMatch(record)" class="point__box-text point__box__nextto">--}}
{{--                                        <span> Starting in @{{Math.floor((record.time-record.updated_at)/60)}} min  | Match Details</span>--}}
{{--                                        <span class="icons"><i class="fas fa-angle-right"></i></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    <div class="mart__point__right">
                                        <button type="button" @click="goMatch(record)" class="point__box__nextto cmn--btn2" style="font-family: 'Inter', sans-serif; font-size: 10px; color: white;">
                                            <span> Starting in
                                                @{{ Math.floor((record.time - record.updated_at) / 60 / 60) }}h
                                                @{{ Math.floor(((record.time - record.updated_at) / 60) % 60) }}min <br> Match Details
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="table__footer table__footer__nextgo">
                                <a href="#show" class="lobby">
                                    <span>Show more</span>
                                    <span class="icons"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </div> -->
                        </div>
                        <div id="loadedData" style="display:none">
                        <div class="waiting-component table__items b__bottom" v-if="leagueData.length == 0 && !isLoadingStatus">
                                <p>No match is being played right now.</p>
                            </div>  
                            <div class="table__items b__bottom" v-if="index<=3" v-for="(record,index) in leagueData">
                                <div class="t__items">
                                    <div class="t__items__left t__items__left__nextogo">
                                      <div class="t__items__icon">
                                          <i v-if="setBet365SportUpcomingId == 1" class="icon-football"></i>
                                          <i v-if="setBet365SportUpcomingId == 3" class="icon-cricket"></i>
                                          <i v-if="setBet365SportUpcomingId == 17" class="icon-icehockey"></i>
                                          <i v-if="setBet365SportUpcomingId == 13" class="icon-tennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 18" class="icon-basketball"></i>
                                          <i v-if="setBet365SportUpcomingId == 92" class="icon-ttennis"></i>
                                          <i v-if="setBet365SportUpcomingId == 91" class="icon-volly"></i>
                                          <i v-if="setBet365SportUpcomingId == 78" class="icon-handball"></i>
                                      </div>
                                      <div class="content_new">
                                          <h6>
                                            @{{ record.home.name }}
                                          </h6>
                                          <h6 class="text">
                                            @{{ record.away.name }}
                                          </h6>
                                      </div>
                                    </div>
                                </div>
                                <div class="mart__point__two mart__pint__nextgo">
                                    <div class="mart__point__left">
                                        <a href="#box" 
                                            class="point__box" 
                                            v-if="index<3"
                                            v-for="(odd, index) in record?.newindex?.results[0]?.schedule?.sp?.main" 
                                            @click="addToSlip(odd.betdata)">
                                            <span class="point__1">@{{ odd.name }}</span>
                                            <span> @{{ Number(odd.odds).toFixed(2) }}</span>
                                        </a>
                                    </div>
{{--                                    <div class="mart__point__right">--}}
{{--                                        <button type='button' @click="goMatch(record)" class="point__box-text point__box__nextto">--}}
{{--                                        <span> Starting in @{{Math.floor((record.time-record.updated_at)/60)}} min  | Match Details</span>--}}
{{--                                        <span class="icons"><i class="fas fa-angle-right"></i></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    <div class="mart__point__right">
                                        <button type="button" @click="goMatch(record)" class="point__box__nextto cmn--btn2" style="font-family: 'Inter', sans-serif; font-size: 10px; color: white;">
                                            <span> Starting in
                                                @{{ Math.floor((record.time - record.updated_at) / 60 / 60) }}h
                                                @{{ Math.floor(((record.time - record.updated_at) / 60) % 60) }}min <br> Match Details
                                            </span>
                                        </button>
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

    <!--Next-To-Go End-->

    <!--Trending section Here-->
    <!-- <div class="live__heightlight trending__now">
        <div class="section__title">
            <h4>
                Trending Now
            </h4>
        </div>
        <div class="heightlight__tab">
            <div class="nav b__bottom" id="nav-tabheighttrending" role="tablist">
                <button class="nav-link active" id="lightlighttabtrend" data-bs-toggle="tab" data-bs-target="#height1trend" type="button" role="tab" aria-selected="true">
                <span class="icons">
                    <i class="icon-football"></i>
                </span>
                <span>
                    Football
                </span>
                </button>
                <button class="nav-link " id="treading1" data-bs-toggle="tab" data-bs-target="#treand2" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-tennis"></i>
                    </span>
                    <span>
                        Tennis
                    </span>
                </button>
                <button class="nav-link " id="treading2" data-bs-toggle="tab" data-bs-target="#treand3" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-basketball"></i>
                    </span>
                    <span>
                        Basketball
                    </span>
                </button>
                <button class="nav-link " id="treading3" data-bs-toggle="tab" data-bs-target="#treand4" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-volly"></i>
                    </span>
                    <span>
                        Volleyball
                    </span>
                </button>
                <button class="nav-link " id="treading4" data-bs-toggle="tab" data-bs-target="#treand5" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-ttennis"></i>
                    </span>
                    <span>
                        Table Tennis
                    </span>
                </button>
                <button class="nav-link " id="treading5" data-bs-toggle="tab" data-bs-target="#treand6" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-afootball"></i>
                    </span>
                    <span>
                        American Football
                    </span>
                </button>
                <button class="nav-link " id="treading7" data-bs-toggle="tab" data-bs-target="#treand7" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-golf"></i>
                    </span>
                    <span>
                        Golf
                    </span>
                </button>
                <button class="nav-link " id="treading8" data-bs-toggle="tab" data-bs-target="#treand8" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-cycling"></i>
                    </span>
                    <span>
                        Cycling
                    </span>
                </button>
                <button class="nav-link " id="treading9" data-bs-toggle="tab" data-bs-target="#treand9" type="button" role="tab" aria-selected="false">
                    <span class="icons">
                        <i class="icon-golf"></i>
                    </span>
                    <span>
                        Beach Volleyball
                    </span>
                </button>
            </div>
        </div>
        <div class="height__table">
            <div class="tab-content" id="nav-tabContentheighttrending">
                football
                <div class="tab-pane fade text-white show active" id="height1trend" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width treanding__table">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-football"></i>
                                </span>
                                <span>
                                    Football
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris86">
                                        <option value="1">
                                            Result 1X2
                                        </option>
                                        <option value="1">
                                            Result 1X3
                                        </option>
                                        <option value="1">
                                            Result 1X4
                                        </option>
                                        <option value="1">
                                            Result 1X5
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris20">
                                        <option value="1">
                                            Over/Under
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris21">
                                        <option value="1">
                                            Both teams to score?
                                        </option>
                                        <option value="1">
                                            ...
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ...
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items table__pointnone__items">
                                <div class="t__items">
                                    <div class="t__items__left">
                                           
                                    </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right opo">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box bg__none">
                                       1
                                    </a>
                                    <a href="#0box" class="point__box bg__none">
                                        X
                                    </a>
                                    <a href="#0box" class="point__box bg__none">
                                        2
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    Goals
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box bg__none">
                                            Over
                                        </a>
                                        <a href="#box" class="point__box bg__none">
                                            Under
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box bg__none">
                                            Yes
                                        </a>
                                        <a href="#box" class="point__box bg__none">
                                           No
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            No
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Netherlands
                                        </h6>
                                        <span class="text">
                                            England
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            USA
                                        </h6>
                                        <span class="text">
                                            Senegal
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Prance
                                        </h6>
                                        <span class="text">
                                            Poland
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Argentina
                                        </h6>
                                        <span class="text">
                                            Australia
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            France
                                        </h6>
                                        <span class="text">
                                            Senegal
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Japan
                                        </h6>
                                        <span class="text">
                                            Croatia
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Brazil
                                        </h6>
                                        <span class="text">
                                            Korea Republic
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Real Zaragoza
                                        </h6>
                                        <span class="text">
                                            Casa Pia Lisbon
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            SC Braga
                                        </h6>
                                        <span class="text">
                                            Real Zaragoza
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="mart__point__items">
                                    <a href="#0" class="twing twing__right">
                                        <i class="icon-twer"></i>
                                    </a>
                                    <a href="#0" class="mart opo">
                                        <i class="icon-pmart"></i>
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.55
                                    </a>
                                    <a href="#0box" class="point__box">
                                        2.70
                                    </a>
                                    <a href="#0box" class="point__box">
                                        8.50
                                    </a>
                                </div>
                                <div class="cart__point cart__point__two">
                                    2,6
                                </div>
                                <div class="mart__point__two">
                                    <div class="mart__point__left">
                                        <a href="#box" class="point__box">
                                            7.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            5.50
                                        </a>
                                    </div>
                                    <div class="mart__point__right">
                                        <a href="#box" class="point__box">
                                            3.05
                                        </a>
                                        <a href="#box" class="point__box">
                                            6.50
                                        </a>
                                        <a href="#0" class="point__box bg__none">
                                            <i class="icon-star star"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    Open Football lobby
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>790</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Tenni
                <div class="tab-pane fade text-white " id="treand2" role="tabpanel" tabindex="0">
                    <div class="main__table larg__width2 treanding__table main__tabletennis">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-tennis"></i>
                                </span>
                                <span>
                                    Tennis
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris22">
                                        <option value="1">
                                            2way - Who will win?
                                        </option>
                                        <option value="1">
                                            3way - Who will win?
                                        </option>
                                        <option value="1">
                                            4way - Who will win?
                                        </option>
                                        <option value="1">
                                            5way - Who will win?
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris23">
                                        <option value="1">
                                            Who will win the set?
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris24">
                                        <option value="1">
                                            Game Winner
                                        </option>
                                        <option value="1">
                                            ...
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ...
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="heght__table__points">
                            <span>1</span>
                            <span>2</span>
                            <span>1</span>
                            <span>2</span>
                            <span>1</span>
                            <span>2</span>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Alycia Parks <span>USA</span>
                                        </h6>
                                        <span class="text">
                                            Cristina Bucsa <span>ESP</span>
                                        </span>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            1.75
                                        </a>
                                        <a href="#0box" class="point__box">
                                            2.05
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box">
                                            1.75
                                        </a>
                                        <a href="#0box" class="point__box">
                                            2.05
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Rebecca Peterson  <span>SWE</span>
                                        </h6>
                                        <span class="text">
                                            Ana Konjuh  <span>CRO</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            1.75
                                        </a>
                                        <a href="#0box" class="point__box">
                                            8.50
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box">
                                            1.75
                                        </a>
                                        <a href="#0box" class="point__box">
                                        1.95
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Nick Hardt   <span>DOM</span>
                                        </h6>
                                        <span class="text">
                                            Victor Lilov   <span>USA</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            2.70
                                        </a>
                                        <a href="#0box" class="point__box">
                                            8.50
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Rebecca Peterson    <span>SWE</span>
                                        </h6>
                                        <span class="text">
                                            Alycia Parks   <span>USA</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            6.56
                                        </a>
                                        <a href="#0box" class="point__box">
                                            7.55
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Ana Konjuh    <span>CRO</span>
                                        </h6>
                                        <span class="text">
                                            Nick Hardt   <span>DOM</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            8.66
                                        </a>
                                        <a href="#0box" class="point__box">
                                        5.11
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Bu Yunchaokete <span>CHN</span>
                                        </h6>
                                        <span class="text">
                                            Mark Lajal <span>EST</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            5.66
                                        </a>
                                        <a href="#0box" class="point__box">
                                        2.11
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Alexis Gautier <span>FRA</span>
                                        </h6>
                                        <span class="text">
                                            Dino Prizmic <span>CRO</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            4.06
                                        </a>
                                        <a href="#0box" class="point__box">
                                        3.01
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Cristina Dinu <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Daniel Rincon <span>ESP</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            3.55
                                        </a>
                                        <a href="#0box" class="point__box">
                                        2.36
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Mark Lajal <span>EST</span>
                                        </h6>
                                        <span class="text">
                                            Ana Konjuh <span>CRO</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            6.33
                                        </a>
                                        <a href="#0box" class="point__box">
                                        4.55
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Lucija Ciric Bagaric <span>CRO</span>
                                        </h6>
                                        <span class="text">
                                            Ana Konjuh <span>CRO</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tableright__tennis">
                                    <div class="mart__point__items">
                                        <a href="#0" class="twing twing__right">
                                            <i class="icon-twer"></i>
                                        </a>
                                        <a href="#0" class="mart opo">
                                            <i class="icon-pmart"></i>
                                        </a>
                                        <a href="#0box" class="point__box">
                                            1.22
                                        </a>
                                        <a href="#0box" class="point__box">
                                        3.22
                                        </a>
                                    </div>
                                    <div class="mart__point__items pl__40">
                                        <a href="#0box" class="point__box icon__lock__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__two pl__40">
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-lock"></i>
                                            </a>
                                            <a href="#0" class="point__box bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    Open Tennis lobby
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>50</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Basketball
                <div class="tab-pane fade text-white" id="treand3" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width4 treanding__table main__basketballtable">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-basketball"></i>
                                </span>
                                <span>
                                    Basketball
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris25">
                                        <option value="1">
                                            Result 1X2
                                        </option>
                                        <option value="1">
                                            Result 1X3
                                        </option>
                                        <option value="1">
                                            Result 1X4
                                        </option>
                                        <option value="1">
                                            Result 1X5
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris26">
                                        <option value="1">
                                            Over/Under
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris27">
                                        <option value="1">
                                            Both teams to score?
                                        </option>
                                        <option value="1">
                                            ...
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ...
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items table__pointnone__items">
                                <div class="t__items">
                                    <div class="t__items__left">
                                          
                                    </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right opo">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box bg__none">
                                                   1
                                                </a>
                                                <a href="#0box" class="point__box bg__none">
                                                    X
                                                </a>
                                                <a href="#0box" class="point__box bg__none">
                                                    2
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            Goals
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                        <div class="mart__point__left mb__10">
                                            <a href="#box" class="point__box bg__none">
                                                Over
                                            </a>
                                            <a href="#box" class="point__box bg__none">
                                               Under
                                            </a>
                                        </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                               No
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Memphis Grizzlies @
                                        </h6>
                                        <span class="text">
                                            Detroit Pistons
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow / 05:10
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    3.25
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 79,5
                                                    </span>
                                                    <span>
                                                    8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    2.25
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 79,5
                                                    </span>
                                                    <span>
                                                    8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.60
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Boston Celtics @
                                        </h6>
                                        <span class="text">
                                            Brooklyn Nets
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow / 05:10
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        3.25
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        6.33
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 79,5
                                                    </span>
                                                    <span>
                                                    9.36
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    3.25
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 79,5
                                                    </span>
                                                    <span>
                                                    6.35
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.60
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Los Angeles Lakers @
                                        </h6>
                                        <span class="text">
                                            Washington Wizards
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow / 05:10
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast martbas__pointlast__width">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box bg__none">
                                                <i class="icon-lock lock"></i>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Phoenix Suns @
                                        </h6>
                                        <span class="text">
                                            San Antonio Spurs
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast martbas__pointlast__width">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box bg__none">
                                                <i class="icon-lock lock"></i>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Chicago Bulls @
                                        </h6>
                                        <span class="text">
                                            Sacramento Kings
                                        </span>
                                        <p>
                                            <a href="#0">
                                                TTomorrow / 05:10
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        3.25
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        6.33
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 79,5
                                                    </span>
                                                    <span>
                                                    9.36
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    3.25
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 79,5
                                                    </span>
                                                    <span>
                                                    6.35
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.60
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Denver Nuggets @
                                        </h6>
                                        <span class="text">
                                            New Orleans Pelicans
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast martbas__pointlast__width">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box bg__none">
                                                <i class="icon-lock lock"></i>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Indiana Pacers @
                                        </h6>
                                        <span class="text">
                                            Portland Trail Blazers
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast martbas__pointlast__width">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box bg__none">
                                                <i class="icon-lock lock"></i>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Chicago Bulls @
                                        </h6>
                                        <span class="text">
                                            Sacramento Kings
                                        </span>
                                        <p>
                                            <a href="#0">
                                                TTomorrow / 05:10
                                            </a>
                                            <a href="#0" class="today">
                                                BUILD A BET
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items mb__10">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        3.25
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        6.33
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                    1.80
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                    1.87
                                                    </span>
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items pl__40 pr__40">
                                        <a href="#0box" class="point__box bg__none">
                                            <i class="icon-lock lock"></i>
                                        </a>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 79,5
                                                    </span>
                                                    <span>
                                                    9.36
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    3.25
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 79,5
                                                    </span>
                                                    <span>
                                                    6.35
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.60
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    Open Football lobby
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>222</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Vollyball
                <div class="tab-pane fade text-white" id="treand4" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width5  treanding__table main__basketballtable">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-volly"></i>
                                </span>
                                <span>
                                    Vollyball
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris28">
                                        <option value="1">
                                            2way - Who will win?
                                        </option>
                                        <option value="1">
                                            3way - Who will win?
                                        </option>
                                        <option value="1">
                                            4way - Who will win?
                                        </option>
                                        <option value="1">
                                            5way - Who will win?
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris29">
                                        <option value="1">
                                            Set Winner
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items table__pointnone__items">
                                <div class="t__items">
                                    <div class="t__items__left">
                                          
                                    </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right opo">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box bg__none">
                                                    1
                                                </a>
                                                <a href="#0box" class="point__box bg__none">
                                                    2
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box bg__none">
                                                   1
                                                </a>
                                                <a href="#box" class="point__box bg__none">
                                                   2
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none opo">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            ZAKSA Kedzierzyn-Kozle
                                        </h6>
                                        <span class="text">
                                            Cerrad Czarni Radom
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 19:45
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    1.04
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.26
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.15
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Sao Paulo Barueri VC
                                        </h6>
                                        <span class="text">
                                            Unilife Maringa
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow / 02:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                1.28
                                                </a>
                                                <a href="#0box" class="point__box">
                                                9.50
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.11
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        5.25
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Gas Sales Piacenza
                                        </h6>
                                        <span class="text">
                                            Top Volley Cisterna
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow / 02:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    1.19
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    4.33
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.10
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.65
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Verona
                                        </h6>
                                        <span class="text">
                                            Volley Siena
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow / 02:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    2.30
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.57
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        3.25
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.10
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Vero Volley Monza
                                        </h6>
                                        <span class="text">
                                            Modena Volley
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 23:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    2.70
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    8.50
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.15
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Volley Bergamo
                                        </h6>
                                        <span class="text">
                                            ASD Pallavolo Pinerolo
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 23:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    1.15
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    4.33
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        3.65
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.35
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Volley Milano
                                        </h6>
                                        <span class="text">
                                            Volley Civitanova
                                        </span>
                                        <p>
                                            <a href="#0">
                                                06/12/2022 00:30
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    2.70
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    8.50
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.65
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            ZAKSA Kedzierzyn-Kozle
                                        </h6>
                                        <span class="text">
                                            Cerrad Czarni Radom
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    1.01
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    10.00
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.36
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.90
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Unet E-Work Busto Arsizio
                                        </h6>
                                        <span class="text">
                                            Helvia Recina Macerata
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    2.70
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    160
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.45
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.55
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Reale Mutua Fenera Chieri
                                        </h6>
                                        <span class="text">
                                            Volley Vallefoglia
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    4.50
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    4.33
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.15
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.75
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Cuneo Granda Volley
                                        </h6>
                                        <span class="text">
                                            Vero Volley Milano
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    6.03
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    2.35
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.35
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        3.87
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    OPEN VOLLEYBALL LOBBY
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>100</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Table Tennis
                <div class="tab-pane fade text-white" id="treand5" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width6 treanding__table main__basketballtable">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-ttennis"></i>
                                </span>
                                <span>
                                    Table Tennis
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris30">
                                        <option value="1">
                                            2way - Who will win?
                                        </option>
                                        <option value="1">
                                            3way - Who will win?
                                        </option>
                                        <option value="1">
                                            4way - Who will win?
                                        </option>
                                        <option value="1">
                                            5way - Who will win?
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris31">
                                        <option value="1">
                                            Set Winner
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                        <option value="1">
                                            ....
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items table__pointnone__items">
                                <div class="t__items">
                                    <div class="t__items__left">
                                           
                                    </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right opo">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box bg__none">
                                                    1
                                                </a>
                                                <a href="#0box" class="point__box bg__none">
                                                    2
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box bg__none">
                                                   1
                                                </a>
                                                <a href="#box" class="point__box bg__none">
                                                   2
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none opo">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                    <div class="t__items__left">
                                            <h6>
                                                Jiri Louda <span>CZE</span>
                                            </h6>
                                            <span class="text">
                                                Petr Oliver Korp <span>CZE</span>
                                            </span>
                                            <p>
                                                <a href="#0">
                                                    Today / 19:45
                                                </a>
                                                <a href="#0" class="text__btn">
                                                    35 min
                                                </a>
                                            </p>
                                    </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    3.22
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    5.44
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.15
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Pavel Kulhanek <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Jiri Svec <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Starting in 
                                            </a>
                                            <a href="#0" class="text__btn">
                                                35 min
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    2.28
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    6.50
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.11
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        5.25
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Gas Sales Piacenza
                                        </h6>
                                        <span class="text">
                                            Top Volley Cisterna
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Starting in 
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    1.19
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    4.33
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.10
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.65
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Jan Mecl Jr. <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Martin Kowalik <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Tomorrow/ 01:30
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    4.30
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.57
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        3.25
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.10
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Petr Oliver Korp <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Jan Mecl Jr. <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 23:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    2.70
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    3.50
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.15
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Martin Kowalik <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Jiri Louda <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                06/12/2022 00:30
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    1.70
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    8.50
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.65
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Tibor Kolenic <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Pavel Kulhanek <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    5.01
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    9.00
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.36
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.90
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Jiri Louda <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Jan Mecl Jr. <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    3.70
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    1.60
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.45
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.55
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Pavel Kulhanek <span>CZE</span>
                                        </h6>
                                        <span class="text">
                                            Radek Bartunek <span>CZE</span>
                                        </span>
                                        <p>
                                            <a href="#0">
                                                Today / 21:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__40">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                        <div class="tablemartbasket__colum">
                                            <div class="mart__point__items">
                                                <a href="#0box" class="point__box">
                                                    5.50
                                                </a>
                                                <a href="#0box" class="point__box">
                                                    3.33
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        1.15
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        Set 1
                                                    </span>
                                                    <span>
                                                        2.75
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    OPEN VOLLEYBALL LOBBY
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>42</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                American Football
                <div class="tab-pane fade text-white" id="treand6" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table treanding__table main__basketballtable larg__width7">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-afootball"></i>
                                </span>
                                <span>
                                    American Football
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris32">
                                        <option value="1">
                                            Game Lines
                                        </option>
                                        <option value="1">
                                            Game Lines 2
                                        </option>
                                        <option value="1">
                                            Game Lines 3
                                        </option>
                                        <option value="1">
                                            Game Lines 4
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items table__pointnone__items">
                                <div class="t__items">
                                    <div class="t__items__left">
                                           
                                    </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right opo">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart opo">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                        <div class="mart__point__left">
                                            <a href="#box" class="point__box bg__none">
                                                Spread
                                            </a>
                                            <a href="#box" class="point__box bg__none">
                                                Total
                                            </a>
                                            <a href="#box" class="point__box bg__none">
                                                Money Line
                                            </a>
                                        </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box opo point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                    <div class="t__items__left">
                                            <h6>
                                                New Orleans Saints @
                                            </h6>
                                            <span class="text">
                                                Tampa Bay Buccaneers
                                            </span>
                                            <p>
                                                <a href="#0">
                                                    Tomorrow / 05:10
                                                </a>
                                                <a href="#0" class="today">
                                                    BUILD A BET
                                                </a>
                                            </p>
                                    </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +3,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        0 40,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    2.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -3,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 40,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.53
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Kansas City Chiefs @
                                        </h6>
                                        <span class="text">
                                            Denver Broncos
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -8,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        0 42,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    4.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +9,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 44,5
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.22
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            New York Jets @
                                        </h6>
                                        <span class="text">
                                            Buffalo Bills
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +9,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        0 44,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                        1.80
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 44,5
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Las Vegas Raiders @
                                        </h6>
                                        <span class="text">
                                            Los Angeles Rams
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        0 43
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                        1.80
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 43
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Philadelphia Eagles @
                                        </h6>
                                        <span class="text">
                                            New York Giants
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                        1.80
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Jacksonville Jaguars @
                                        </h6>
                                        <span class="text">
                                            Tennessee Titans
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        0 44,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.48
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 44,5
                                                    </span>
                                                    <span>
                                                        1.91
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    3.20
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Cleveland Browns @
                                        </h6>
                                        <span class="text">
                                            Cincinnati Bengals
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +3,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        0 42
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -3,5
                                                    </span>
                                                    <span>
                                                        U 42
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 44,5
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Carolina Panthers @
                                        </h6>
                                        <span class="text">
                                            Seattle Seahawks
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +1
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    6.33
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -1
                                                    </span>
                                                    <span>
                                                        1.80
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        U 109,5
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Minnesota Vikings @
                                        </h6>
                                        <span class="text">
                                            Detroit Lions
                                        </span>
                                        <p>
                                            <a href="#0">
                                                12/12/2022 03:05
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="tablebasket__martpoin__wrap pr__10">
                                        <div class="mart__point__items">
                                            <a href="#0" class="twing twing__right">
                                                <i class="icon-twer"></i>
                                            </a>
                                            <a href="#0" class="mart">
                                                <i class="icon-pmart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast americanf__point__box">
                                            <div class="mart__point__left mb__10">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        +6,5
                                                    </span>
                                                    <span>
                                                        2.70
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        O 109,5
                                                    </span>
                                                    <span>
                                                        8.50
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    7.50
                                                </a>
                                            </div>
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -1
                                                    </span>
                                                    <span>
                                                        1.80
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    <span class="spoint">
                                                        -6,5
                                                    </span>
                                                    <span>
                                                        1.87
                                                    </span>
                                                </a>
                                                <a href="#box" class="point__box">
                                                    1.55
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    OPEN AMERICAN FOOTBALL LOBBY
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>42</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Golf Playing
                <div class="tab-pane fade text-white" id="treand7" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width6 treanding__table main__basketballtable">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-golf"></i>
                                </span>
                                <span>
                                    Golf
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris33">
                                        <option value="1">
                                            3-ball Match
                                        </option>
                                        <option value="1">
                                            4-ball Match
                                        </option>
                                        <option value="1">
                                            5-ball Match
                                        </option>
                                        <option value="1">
                                            6-ball Match
                                        </option>
                                    </select>
                                </div>
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris34">
                                        <option value="1">
                                            3-ball Match
                                        </option>
                                        <option value="1">
                                            4-ball Match
                                        </option>
                                        <option value="1">
                                            5-ball Match
                                        </option>
                                        <option value="1">
                                            6-ball Match
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="heght__table__points">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>1</span>
                            <span>2</span>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            To win a Major in 2023
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6 class="p__max">
                                            Rory McIlroy major championship wins in 2023
                                            (bets void if he does not play in all...
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            The Match VII
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    OPEN GOLF LOBBY
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>4</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Cycling Playing
                <div class="tab-pane fade text-white" id="treand8" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width6 treanding__table main__basketballtable">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-cycling"></i>
                                </span>
                                <span>
                                    Cycling
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris35">
                                        <option value="1">
                                            Main bets 1
                                        </option>
                                        <option value="1">
                                            Main bets 2 
                                        </option>
                                        <option value="1">
                                            Main bets 3
                                        </option>
                                        <option value="1">
                                            Main bets 4
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="heght__table__points">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>1</span>
                            <span>2</span>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Milano-San Remo 2023
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6 class="p__max">
                                            Paris-Roubaix 2023
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Tour de France 2023 - General Classification
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Tour of Flanders 2023
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    OPEN GOLF LOBBY
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>4</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                Beach Playing
                <div class="tab-pane fade text-white" id="treand9" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                    <div class="main__table larg__width6 treanding__table main__basketballtable">
                        <div class="section__head b__bottom">
                            <div class="left__head">
                                <span class="icons">
                                    <i class="icon-golf"></i>
                                </span>
                                <span>
                                    Beach Volleyball
                                </span>
                            </div>
                            <div class="right__catagoris">
                                <div class="right__cate__items">
                                    <select name="cate1" id="categoris37">
                                        <option value="1">
                                            Main bets 1
                                        </option>
                                        <option value="1">
                                            Main bets 2 
                                        </option>
                                        <option value="1">
                                            Main bets 3
                                        </option>
                                        <option value="1">
                                            Main bets 4
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="heght__table__points">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>1</span>
                            <span>2</span>
                        </div>
                        <div class="table__wrap">
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Tour de France 2023 - General Classification
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table__items b__bottom">
                                <div class="t__items">
                                <div class="t__items__left">
                                        <h6>
                                            Tour of Flanders 2023
                                        </h6>
                                        <p>
                                            <a href="#0">
                                                23/07/2023 22:00
                                            </a>
                                        </p>
                                </div>
                                </div>
                                <div class="tablebasket__main__wrap">
                                    <div class="mart__point__items">
                                    <div class="martbas__pointlast">
                                            <div class="mart__point__left">
                                                <a href="#box" class="point__box aroow__text bg__none">
                                                    <span>Bet now</span>
                                                    <span class="icons"><i class="fas fa-chevron-right"></i></span>
                                                </a>
                                            </div>
                                    </div>
                                        <div class="mart__point__right">
                                            <a href="#0" class="point__box point__boxpadding bg__none">
                                                <i class="icon-star star"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table__footer">
                                <a href="#0" class="lobby text__opa">
                                    OPEN GOLF LOBBY
                                </a>
                                <a href="#0" class="footerpoing">
                                    <span>4</span>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--Trending section End-->

    <!--Footer Content Here-->
    <!-- <div class="footer__content__section pt-60 pb-60">
        <div class="footer__content__items">
            <h5>
                Sports Betting at Sportingbet
            </h5>
            <p>
                Nulla facilisis scelerisque leo, nec accumsan metus. Vestibulum molestie augue vel erat molestie accumsan. In placerat dolor ut leo porttitor facilisis in a ante. Quisque vitae nibh arcu. Nam vitae cursus purus. Suspendisse sit amet auctor massa. Nulla ac urna in erat molestie maximus. Aliquam a velit vitae ex vehicula suscipit non in enim. Phasellus iaculis libero non dui consequat, vitae vulputate ipsum posuere. Praesent sagittis ipsum venenatis pharetra eleifend. Maecenas commodo mauris vitae leo faucibus fermentum at quis arcu. Nunc malesuada purus ex, vitae posuere turpis pellentesque eget. Curabitur rutrum a tellus et suscipit. Phasellus rhoncus dui et enim aliquet, et tincidunt mi laoreet. Nulla sagittis nibh purus, quis commodo nulla molestie nec. Donec et purus accumsan, sodales nunc at, pretium orci.
            </p>
        </div>
        <div class="footer__content__items">
            <h5>
                Bet online at Sportingbet
            </h5>
            <p>
                Nulla facilisis scelerisque leo, nec accumsan metus. Vestibulum molestie augue vel erat molestie accumsan. In placerat dolor ut leo porttitor facilisis in a ante. Quisque vitae nibh arcu. Nam vitae cursus purus. Suspendisse sit amet auctor massa. Nulla ac urna in erat molestie maximus. Aliquam a velit vitae ex vehicula suscipit non in enim. Phasellus iaculis libero non dui consequat, vitae vulputate ipsum posuere. Praesent sagittis ipsum venenatis pharetra eleifend. Maecenas commodo mauris vitae leo faucibus fermentum at quis arcu. Nunc malesuada purus ex, vitae posuere turpis pellentesque eget. Curabitur rutrum a tellus et suscipit. Phasellus rhoncus dui et enim aliquet, et tincidunt mi laoreet. Nulla sagittis nibh purus, quis commodo nulla molestie nec. Donec et purus accumsan, sodales nunc at, pretium orci.
            </p>
        </div>
        <div class="footer__content__items">
            <h5>
                Bet on Football
            </h5>
            <p>
                Nulla facilisis scelerisque leo, nec accumsan metus. Vestibulum molestie augue vel erat molestie accumsan. In placerat dolor ut leo porttitor facilisis in a ante. Quisque vitae nibh arcu. Nam vitae cursus purus. Suspendisse sit amet auctor massa. Nulla ac urna in erat molestie maximus. Aliquam a velit vitae ex vehicula suscipit non in enim. Phasellus iaculis libero non dui consequat, vitae vulputate ipsum posuere. Praesent sagittis ipsum venenatis pharetra eleifend. Maecenas commodo mauris vitae leo faucibus fermentum at quis arcu. Nunc malesuada purus ex, vitae posuere turpis pellentesque eget. Curabitur rutrum a tellus et suscipit. Phasellus rhoncus dui et enim aliquet, et tincidunt mi laoreet. Nulla sagittis nibh purus, quis commodo nulla molestie nec. Donec et purus accumsan, sodales nunc at, pretium orci.
            </p>
        </div>
    </div> -->
    <!--Footer Content End-->

<!--Main body-->
<!-- <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button v-for="(sport, index) in this.bet365Sports" class="nav-link" :class="(index == 1) ? 'active': '' " :key="index" :id="index" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" @click="updatebet365Data(index)">@{{ sport }}</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="table-parent table-responsive d-sm-block">
      <h3>Upcoming</h3>
      <div class="row">
        <div v-if="bet365UpcomingEventsApiResponse.length < 1" class="col-6 ml-5"><h5 class="">No Record Found</h5></div>
        <div class="col-6" v-for="record in bet365UpcomingEventsApiResponse">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-5"><span> @{{ record.league.name }} </span></th> 
                <th class="col-2">
                  <div class="d-flex justify-content-evenly" v-if="record.sport_id == 1">
                    <span>1</span> <span>X</span> <span>2</span>
                  </div>
                  <div class="d-flex justify-content-evenly" v-if="record.sport_id == 2">
                    <span>1</span> <span>2</span> <span>3</span>
                  </div>
                  <div class="d-flex justify-content-evenly" v-if="record.sport_id == 3">
                    <span>1</span> <span>2</span>
                  </div>
                </th> 
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>
                      <span>
                      @{{ record.home.name }}
                      </span>
                    </p>
                    <p>
                      <span>
                      @{{ record.away.name }}
                      </span>
                    </p>
                    <p>
                      <span class="float-end">
                        <a href="" class="me-2 d-none"><i aria-hidden="true" class="fal fa-chart-bar"></i></a>
                      </span>
                    </p>
                  </td>
                  <td v-if="record.sport_id == 1">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in record?.newindex?.results[0]?.main?.sp?.full_time_result " @click="addToSlip(odd)">@{{ odd.odds }}</button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 3">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in record?.newindex?.results[0]?.main?.sp?.to_win_the_match" @click="addToSlip(odd)">@{{ odd.odds }}</button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 8">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in 2"> - </button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 12">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in 2"> - </button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 13">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in record?.newindex?.results[0]?.main?.sp?.to_win_match" >@{{ odd.odds }}</button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 14">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in 2"> - </button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 15">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in record?.newindex?.results[0]?.main?.sp?.match_winner">@{{ odd.odds }}</button>
                      </div>
                  </td>
                  <td v-if="record.sport_id == 16">
                      <div class="d-flex justify-content-evenly w-100">
                      <button type="button" title="odd.name" v-for="odd in 2"> - </button>
                      </div>
                  </td>
                </tr></tbody>
          </table>
        </div>
      </div>

      <h3>Live</h3>
      <div v-if="bet365InplayFilterApiResponse.length < 1">No Record Found</div>
      <table class="table table-striped" v-for="record in bet365InplayFilterApiResponse">
        <thead>
          <tr>
            <th class="col-5"><span>@{{ record.league.name }}</span></th> 
            <th class="col-2"><div class="d-flex justify-content-evenly"><span>1</span> <span>X</span> <span>2</span></div></th> 
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p>
                  <span>
                    <img src="https://www.vv-beteso.com/assets/uploads/team/64166d2f397a51679191343.png" alt="..">Leverkusen
                    @{{ record.home.name }}
                  </span>
                </p>
                <p>
                  <span>
                    <img src="https://www.vv-beteso.com/assets/uploads/team/64166d88b21b91679191432.png" alt="..">Koln
                    @{{ record.away.name }}
                  </span>
                </p>
                <p>
                  <span class="float-end">
                    <a href="" class="me-2 d-none"><i aria-hidden="true" class="fal fa-chart-bar"></i></a>
                  </span>
                </p>
              </td>
              <td>
                  <div class="d-flex justify-content-evenly w-100">
                    <button type="button" title="1" class=""> 0.0 </button>
                    <button type="button" title="X" class=""> 0.0 </button>
                    <button type="button" title="2" class=""> 0.0 </button>
                  </div>
              </td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
</div> -->