<!-- rightbar -->
<div class="rightbar col-xxl-2 col-xl-2 col-lg-2" id="rightbar">
    <div class="right__site__section ">
        <div class="betslip__wrap">
            <h5 class="betslip__title">
                <div class="betslip_text">
                    <?php echo app('translator')->get('BET SLIP'); ?>
                </div>
                
            </h5>
            <div class="nav" id="nav-taboo" role="tablist">
                <button 
                class="nav-link active" 
                id="nav-home-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#nav-home" 
                type="button" role="tab" 
                aria-controls="nav-home" 
                @click="setBetType(true)"
                aria-selected="true"><?php echo app('translator')->get('Single'); ?></button>
                <button 
                class="nav-link " 
                id="nav-profile-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#nav-profile" 
                type="button" role="tab" 
                aria-controls="nav-profile"
                @click="setBetType(false)" 
                aria-selected="false"><?php echo app('translator')->get('Multiple'); ?></button>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade text-white  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="multiple__components" style="background:#202a39">
                        <div class="multiple__items" v-for="(item, index) in betSlipSingle" >
                            <div class="multiple__head">
                                <div class="multiple__left">
                                    <span class="icons">
                                        <i class="icon-football"></i>
                                    </span>
                                    <span>
                                     {{item.tournament_name}}
                                 </span>
                             </div>
                             <button type="button" @click="removeItem(item)" class="close-btn">
                                <i class="fal fa-times" style="color:white;"></i>
                            </button>
                        </div>
                        <span class="rightname">
                            <span class="fc">
                                {{item.match_name}}
                            </span>
                            <span class="point">
                                <!-- {{item.question_name}} -->
                            </span>
                        </span>
                        <div class="multiple__point new_bet_multiple__point">
                            <span class="match_1_name">
                                <?php echo e('Match : 1 '); ?>

                            </span>
                            <span class="pbox">
                                {{Number(item.ratio).toFixed(2)}}
                            </span>

                        </div>

                        <p v-if="item.is_unlock_match == 1 || item.is_unlock_question == 1" class="text-center "><i class="fas fa-hourglass-end"></i><?php echo app('translator')->get('Expired'); ?></p>
                    </div>
                    <div class="stake font_change">
                        STAKE
                    </div>
                    <div class="total__odds">
                        <div class="total__head">
                            <h6 class="odd">
                                Single (X1)
                            </h6>
                            <span class="bet_new_input">
                                <!-- {{totalOdds ?? 0}} -->
                                <span>
                                    Bet
                                </span>

                                <input  class="form-control stake-input" value="1"  v-model="form.amount"
                                @keyup="calc(form.amount)"
                                type="number"
                                data-zeros="true"
                                :max="999999"/> 
                            </span>
                        </div>
                        <div class="wrapper-1">
                                <!-- <div class="result my-3">
                                    <span>Stake amount, $</span>
                                    <span class="result">
                                        <input  class="form-control stake-input" value="1"  v-model="form.amount"
                                            @keyup="calc(form.amount)"
                                            type="number"
                                            data-zeros="true"
                                            :max="999999"/> 
                                    </span>
                                </div> -->
                                <div class="buttons my-3">
                                    <button type="button" @click="setAmount(5)">5</button>
                                    <button type="button" @click="setAmount(10)">10</button>
                                    <button type="button" @click="setAmount(50)">50</button>
                                </div>
                                <div class="possible__pay my-1">
                                    <span>Possible Payout: </span>
                                    <span>${{totalOdds*form.amount}}</span>
                                </div>
                                <div class="possible__pay my-1">
                                    <span>Total Bet: </span>
                                    <span>${{form.amount}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="join_now_div">
                            <button style="background: #6367F1 !important; color:white; border:none;" @click="betPlace()" class="cmn--btn2 join_now">
                                <?php if(auth()->guard()->guest()): ?>
                                <span>Sign In & Bet</span>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                <span>Bet</span>
                                <?php endif; ?>
                            </button>
                        </div>
                    </div>
                    <div class="setting__area" :class="{'d-none': 0 == betSlipSingle.length}">
                        <div class="tab-content" id="nav-tabContentsetting">
                            <div class="tab-pane fade text-white" id="nav-homesett" role="tabpanel" aria-labelledby="nav-home-tabsetting" tabindex="0">
                                <div class="sign__bets__wrap">
                                    <h5 class="betslip__title">
                                        Betslip
                                    </h5>
                                    <div class="sign__boxes">
                                        <div class="content w-100">
                                            <h6>
                                                Erase Betslip
                                            </h6>
                                            <p>
                                                Are you sure you want to erase Betslip?
                                            </p>
                                            <div class="btn__grp">
                                                <a href="#0" class="cmn--btn">
                                                    <p>No</p>
                                                </a>
                                                <a href="#0" class="cmn--btn2">
                                                    <p>Accept</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade text-white" id="nav-homeett2" role="tabpanel" aria-labelledby="nav-home-tabsetting2" tabindex="0">
                                <div class="sign__bets__wrap">
                                    <h5 class="betslip__title">
                                        Betslip
                                    </h5>
                                    <div class="setting__boxes">
                                        <div class="setting__boxes__head">
                                            <span>Accept Changes automatically?</span>
                                            <a href="#0">
                                                <i class="icon-cross"></i>
                                            </a>
                                        </div>
                                        <div class="check__wrap">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check1a">
                                                <label class="form-check-label" for="check1a">
                                                    Accept any odds changes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check2o">
                                                <label class="form-check-label" for="check2o">
                                                    Only accept increased odds
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check3">
                                                <label class="form-check-label" for="check3">
                                                    Always ask
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav" id="nav-tabseting" role="tablist">
                            <button class="nav-link" id="nav-home-tabsetting"  @click="betPlace()" style="color:white">
                                <span class="icons"><i class="icon-trush"></i></span>
                                <?php if(auth()->guard()->guest()): ?>
                                <span>Sign In & Bet</span>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                <span>Bet</span>
                                <?php endif; ?>
                            </button>
                            <button class="nav-link" id="nav-home-tabsetting2" data-bs-toggle="tab" data-bs-target="#nav-homeett2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <span class="icons"><i class="icon-setting"></i></span>
                                <span class="text">
                                    Settings
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade text-white" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="multiple__components" style="background:#202a39">
                        <div class="multiple__items" v-for="(item, index) in betSlip" >
                            <div class="multiple__head">
                                <div class="multiple__left">
                                    <span class="icons">
                                        <i class="icon-football"></i>
                                    </span>
                                    <span>
                                        {{item.match_name}}
                                    </span>
                                </div>
                                <a  @click="removeItem(item)" type="button" class="cros">
                                    <i class="icon-cross"></i>
                                </a>
                            </div>
                            <span class="rightname">
                                <span class="fc">
                                    {{item.tournament_name}}
                                </span>
                                <span class="point">
                                    {{item.question_name}}
                                </span>
                            </span>
                            <div class="multiple__point">
                                <span class="pbox">
                                    <?php echo e('Match : 1'); ?>

                                </span>
                                <span class="pbox">
                                    {{Number(item.ratio).toFixed(2)}}
                                </span>
                                
                            </div>
                            <p v-if="item.is_unlock_match == 1 || item.is_unlock_question == 1" class="text-center "><i class="fas fa-hourglass-end"></i><?php echo app('translator')->get('Expired'); ?></p>
                        </div>
                        <div class="total__odds multiple__items">

                          <div class="total__head multiple__point new_bet_multiple__point">
                            <h6 class="match_1_name">
                                <?php echo e('Match : 1 '); ?>

                            </h6>
                            <span class="pbox">

                                {{ Number(totalOdds).toFixed(2)}}
                            </span>
                        </div>
                    </div>
                    <div class="stake font_change">
                        STAKE
                    </div>
                    <div class="total__odds">
                        <div class="total__head">
                            <h6 class="odd">
                                Single (X1)
                            </h6>
                            <span class="bet_new_input">
                                <!-- {{totalOdds ?? 0}} -->
                                <span>
                                    Bet
                                </span>
                                
                                <input  class="form-control stake-input" value="1"  v-model="form.amount"
                                @keyup="calc(form.amount)"
                                type="number"
                                data-zeros="true"
                                :max="999999"/> 
                            </span>
                        </div>
                        <div class="wrapper-1">
                               <!--  <div class="result">
                                    <span>Stake amount, $</span>
                                    <span class="result">
                                        <input  class="form-control stake-input" value="1"  v-model="form.amount"
                                            @keyup="calc(form.amount)"
                                            type="number"
                                            data-zeros="true"
                                            :max="999999"/> 
                                    </span>
                                </div> -->
                                <div class="buttons">
                                    <button type="button" @click="setAmount(5)">5</button>
                                    <button type="button" @click="setAmount(10)">10</button>
                                    <button type="button" @click="setAmount(50)">50</button>
                                </div>
                            </div>
                            <div class="possible__pay my-1">
                                <span>Possible Payout: </span>
                                <span>${{totalOdds*form.amount}}</span>
                            </div>
                            <div class="possible__pay my-1">
                                <span>Total Bet: </span>
                                <span>${{form.amount}}</span>
                            </div>
                        </div>
                        <div class="join_now_div">
                            <button  @click="betPlace()" type='button' class="cmn--btn2 join_now" style="background: #6367F1 !important; color:white; border:none;">
                                <?php if(auth()->guard()->guest()): ?>
                                <span>Sign In & Bet</span>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                <span>Bet</span>
                                <?php endif; ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/home/rightbar.blade.php ENDPATH**/ ?>