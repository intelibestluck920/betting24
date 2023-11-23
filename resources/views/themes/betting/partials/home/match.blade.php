
<div class="ecuador__match__fixing"  style="padding-top:0;">
    <div  v-if="!upcoming_manual_details?.id && !upcoming_details?.id"  style="display: flex; flex-direction: column; align-items: center;">
        <!-- <div class="waiting-component table__items ">
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
    <div class="live__heightlight mb__30 ">
        <div class="section__title matchpage_banner" style="background-image: url({{getFile(config('location.logo.path').'match_background.png')}}); background-position: center;background-size: cover;padding: 50px 0 50px 0;margin-bottom:16px;" v-if="upcoming_details?.id">
            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center;">
                <p style="text-align:center">@{{new Date(upcoming_details?.time*1000)}}</p>
            </div>

            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center;">
                <h3>
                   @{{upcoming_details?.away.name}} - @{{upcoming_details?.home.name}}
                </h3>
            </div>
            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center;">

                <h4> @{{upcoming_details?.league.name}}</h4>
            </div>
            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center;">
                <h5>Starts in @{{Math.floor((upcoming_details?.time - Date.now()/1000)/3600)}} hours and @{{Math.floor(((upcoming_details?.time - Date.now()/1000) % 3600)/60)}} minutes</h5>
            </div>
        </div>
    <div class="row g-4 font_change" v-if="upcoming_details?.id ">
        <div class="col-xl-12">
            <div class="equator__match__result">
                <div class="match__box mb__30">
                    <span class="title" v-if="upcoming_details?.newindex.results[0].schedule.sp.main">
                        Match Result
                    </span>
                    <div class="devaided__box">
                        <a href="#0" @click="addToSlip(upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata)"
                            class="point__box font_change" >
                            {{'1'}} <br>&nbsp;@{{Number(upcoming_details?.newindex.results[0].schedule.sp.main[0].odds).toFixed(2)}}
                        </a>
                        <a href="#0" @click="addToSlip(upcoming_details?.newindex.results[0].schedule.sp.main[1].betdata)"
                            class="point__box font_change" >
                            {{'x'}}<br>@{{Number(upcoming_details?.newindex.results[0].schedule.sp.main[1].odds).toFixed(2)}}
                        </a>
                        <a href="#0" @click="addToSlip(upcoming_details?.newindex.results[0].schedule.sp.main[2].betdata)" v-if="upcoming_details?.newindex.results[0].schedule.sp.main[2]"
                            class="point__box font_change" >
                           {{'2'}}<br>&nbsp;@{{Number(upcoming_details?.newindex.results[0].schedule.sp.main[2].odds).toFixed(2)}}
                        </a>
                    </div>
                </div>
                <div class="match__box mb__30"  v-if="upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals">
                    <span class="title" >
                        Result/Total goals
                    </span>
                    <div class="devaided__box mb__1" v-for="(score, index) in upcoming_details?.newindex?.results[0].goals.sp?.result_total_goals" v-if="index<upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals.length/3">
                        <a href="#0"
                            class="point__box" >
                        <span >@{{upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index].name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a href="#0" @click="addToSlip({...upcoming_details?.newindex?.results[0]?.schedule?.sp?.main[0].betdata, id:upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+3].id, ratio:upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+3]?.odds, question_name:upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+3]?.header})"
                            class="point__box" >
                        <span >@{{upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+3]?.header}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="poin">@{{upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+3]?.odds}}</span>
                        </a>
                        <a href="#0" @click="addToSlip({...upcoming_details?.newindex?.results[0]?.schedule.sp.main[0].betdata, id:upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+6].id, ratio:upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+6]?.odds, question_name:upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+6]?.header})"
                            class="point__box" >
                        <span >@{{upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+6]?.header}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="poin">@{{upcoming_details?.newindex?.results[0]?.goals?.sp?.result_total_goals[index+6]?.odds}}</span>
                        </a>
                    </div>
                </div>
                <div class="match__box" v-if="upcoming_details?.newindex?.results[0]?.main?.sp?.to_win_the_match">
                    <span class="title mb__1">
                        Match Result and Both Teams to Score
                    </span>
                    <div class="devaided__box mb__1 " v-for="(item, index) in upcoming_details?.newindex?.results[0]?.main?.sp?.to_win_the_match">
                        <a href="#0" @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:item.id, ratio:item.odds, question_name:item.name})"
                            class="point__box" >
                        <span>@{{item.name}} will win the game</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="poin">@{{item.odds}}</span>
                        </a>
                    </div>
                </div>
                <div class="match__box" v-if="upcoming_details?.newindex?.results[0]?.goals?.sp?.both_teams_to_score">
                    <span class="title mb__1">
                       Both Teams will Score
                    </span>
                    <div class="devaided__box mb__1 " v-for="(item, index) in upcoming_details?.newindex?.results[0]?.goals?.sp?.both_teams_to_score">
                        <a href="#0" @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:item.id, ratio:item.odds, question_name:item.name})"
                            class="point__box" >
                        <span>@{{item.name}} </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="poin">@{{item.odds}}</span>
                        </a>
                    </div>
                </div>
                <div class="match__box" v-if="upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score">
                    <span class="title mb__1">
                        Match Result and Both Teams to Score
                    </span>
                    <div class="devaided__box mb__1 " v-for="(item, index) in upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score"  v-if="index<upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score?.length/3">
                        <a href="#0"
                            class="point__box" >
                        <span >@{{upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index].name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a href="#0" @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+3].id, ratio:upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+3]?.odds, question_name:upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+3]?.header})"
                            class="point__box" >
                        <span >@{{upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+3]?.header}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="poin">@{{upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+3]?.odds}}</span>
                        </a>
                        <a href="#0" @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+6].id, ratio:upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+6]?.odds, question_name:upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+6]?.header})"
                            class="point__box" >
                        <span >@{{upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+6]?.header}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="poin">@{{upcoming_details?.newindex?.results[0]?.main?.sp?.result_both_teams_to_score[index+6]?.odds}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="equator__match__result">
                <div class="match__box mb__30" v-if="upcoming_details?.newindex.results[0].main.sp?.goals_over_under">
                    <span class="title mb__1">
                        Over/Under
                    </span>
                    <div class="devaided__box" >
                        <a href="#0"
                            class="point__box">
                            @{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[0].name }}
                        </a>
                        <a href="#0"
                            class="point__box"  @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex.results[0].main.sp?.goals_over_under[1].id, ratio:upcoming_details?.newindex.results[0].main.sp?.goals_over_under[1].odds, question_name:upcoming_details?.newindex.results[0].main.sp?.goals_over_under[1].header})" >
                            <!--@{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[1].header }}-@{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[1].odds }}-->
                            More of - @{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[1].odds }}
                        </a>
                        <a href="#0"
                            class="point__box"  @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex.results[0].main.sp?.goals_over_under[2].id, ratio:upcoming_details?.newindex.results[0].main.sp?.goals_over_under[2].odds, question_name:upcoming_details?.newindex.results[0].main.sp?.goals_over_under[2].header})" >
                            <!--@{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[2].header }}-@{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[2].odds }}-->
                            less than - @{{ upcoming_details?.newindex.results[0].main.sp?.goals_over_under[2].odds }}
                        </a>
                    </div>
                </div>
                <div class="match__box mb__30">
                    <span class="title mb__1">
                        Correct Score / @{{upcoming_details?.away.name}} - @{{upcoming_details?.home.name}} / Odds
                    </span>
                    <div class="devaided__box mb__1">
                        <a href="#0"
                            class="point__box" >
                            1
                        </a>
                        <a href="#0"
                            class="point__box" >
                            2
                        </a>
                        <a href="#0"
                            class="point__box" >
                            3
                        </a>
                    </div>
                    <div class="devaided__box mb__1" v-for="(score, index) in upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score" v-if="index<upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score.length/3">
                        <a href="#0" 
                            class="point__box" v-if="3*index < upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score.length"  @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].id, ratio:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].odds, question_name:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].name})">
                            @{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].header}}<br/>
                            @{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].name}}&nbsp;@{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].odds}}
                        </a>
                        <a href="#0"
                            class="point__box"  v-if="(3*index+1) < upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score.length"   @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+1].id, ratio:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+1].odds, question_name:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+1].name})">
                            @{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].header}}<br/>
                            @{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+1].name}}&nbsp;@{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+1].odds}}
                        </a>
                        <a href="#0"
                            class="point__box"  v-if="(3*index+2) < upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score.length"  @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+2].id, ratio:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+2].odds, question_name:upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+2].name})">
                           @{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index].header}}<br/>
                            @{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+2].name}}&nbsp;@{{upcoming_details?.newindex.results[0].half.sp?.half_time_correct_score[3*index+2].odds}}
                        </a>
                    </div>
                </div>
                <div class="match__box mb__30" v-if="upcoming_details?.newindex.results[0].main.sp?.double_chance">
                    <span class="title">
                        Double Chance
                    </span>
                    <div class="devaided__box">
                        <a href="#0"
                            class="point__box"  @click="addToSlip({...upcoming_details?.newindex.results[0].schedule.sp.main[0].betdata, id:chance.id, ratio:chance.odds, question_name:chance.name})" v-for="chance in upcoming_details?.newindex.results[0].main.sp?.double_chance">
                            @{{chance.name}} - @{{chance.odds}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        <div class="section__title matchpage_banner" style="background-image: url({{getFile(config('location.logo.path').'match_background.png')}}); background-position: center;background-size: cover;padding: 50px 0 50px 0;margin-bottom:16px;"
        v-if="upcoming_manual_details?.questions">
            <div style="display:flex; justify-content:center; margin-bottom:16px">
                <p style="text-align:center">@{{new Date(upcoming_manual_details?.start_date)}}</p>
            </div>
            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center">
                <h3>
                   @{{upcoming_manual_details?.team1}} - @{{upcoming_manual_details?.team2}} 
                </h3> 
            </div>
            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center">

                <h4> @{{upcoming_manual_details?.game_tournament.name}}</h4>
            </div>
            <div style="display:flex; justify-content:center; margin-bottom:16px; text-align: center">
                <h5>Starts in @{{Math.floor((new Date(upcoming_manual_details?.start_date)/1000 - Date.now()/1000)/3600)}} hours and @{{Math.floor(((new Date(upcoming_manual_details?.start_date)/1000 - Date.now()/1000) % 3600)/60)}} minutes</h5>
            </div>
        </div>
        <div class="col-xl-12 font_change" v-if="upcoming_manual_details?.questions">
            <div class="equator__match__result">
                <div class="match__box mb__30">
                    <span class="title">
                        Match Result
                    </span>
                    <div class="devaided__box" v-for="(record, index) in upcoming_manual_details.questions" v-if="index==0">
                        <a href="#box" 
                            class="point__box" 
                            v-for="(odd, index) in record?.options" 
                            v-if="index<3"
                            @click="addToSlip(odd)" style="display:inline-table">
                            <div><p class="point__1">@{{ odd.option_name }}</p></div>
                            <div><p> @{{ Number(odd.ratio).toFixed(2) }}</p></div>
                        </a>
                    </div>
                </div>
                <div class="match__box mb__30">
                    <span class="title">
                        Over/Under
                    </span>
                    <div class="devaided__box" v-for="(record, index) in upcoming_manual_details.questions" v-if="index>0">
                        <a href="#box" 
                            class="point__box" 
                            v-for="(odd, index) in record?.options" 
                            v-if="index<3"
                            @click="addToSlip(odd)" style="display:inline-table">
                            <div><span class="point__1">@{{ odd.option_name }}</span></div>
                            <div><span> @{{ Number(odd.ratio).toFixed(2) }}</span></div>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>