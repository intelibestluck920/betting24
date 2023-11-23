
<div class="popular__events__left display991">
 <!-- <a href="<?php echo e(route('countriesJson')); ?>"> upload json </a> -->
    <!-- <div class="popular__events__head">
        <h5>
            Popular events
        </h5>
        <ul>
            <li>
                <span><img src="assets/img/leftmenu/cup.png" alt="img"></span>
                <span>Eorld Cup 2022</span>
            </li>
            <li>
                <span><img src="assets/img/leftmenu/europ.png" alt="img"></span>
                <span>Euroleague. Season 22/23</span>
            </li>

        </ul>
    </div>
    <div class="star__wrap">
        <span><img src="assets/img/leftmenu/start.png" alt="img"></span>
        <span>Favorites</span>
    </div> -->
    <?php if(!in_array(Request::route()->getName(),['condition','policy','bonusterm','gambling','about','contact','kyc_policy','casino_promotion','sport_promotion','deposit_withdraw','sportStat'])): ?>
    <div class="prematch__wrap">
        <div class="nav" id="nav-tabpre" role="tablist">

            <!-- <span class="nav_items mt-3"> -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z" fill="rgba(19,224,141,1)"></path></svg>
                <button class="nav-link " id="nav-home-tabpre-redirect-custom" data-bs-toggle="tab" data-bs-target="#nav-homepre" type="button" role="tab" aria-controls="nav-homepre" aria-selected="false" @click="liveUpComing('live')">Live</button>
                <!-- </span> -->

                <!-- <span class="nav_items mt-3"> -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM10.6219 8.41459L15.5008 11.6672C15.6846 11.7897 15.7343 12.0381 15.6117 12.2219C15.5824 12.2658 15.5447 12.3035 15.5008 12.3328L10.6219 15.5854C10.4381 15.708 10.1897 15.6583 10.0672 15.4745C10.0234 15.4088 10 15.3316 10 15.2526V8.74741C10 8.52649 10.1791 8.34741 10.4 8.34741C10.479 8.34741 10.5562 8.37078 10.6219 8.41459Z" fill="rgba(19,224,141,1)"></path></svg>
                    <button class="nav-link active" id="nav-profile-tabpre" data-bs-toggle="tab" data-bs-target="#nav-profilepre" type="button" role="tab" aria-controls="nav-profilepre" aria-selected="true"  @click="liveUpComing('upcoming')">Prematch</button>
                    <!-- </span> -->
                </div>
                <div class="tab-content mt-3" id="nav-tabContentpre" >
                    <div class="tab-pane fade text-white" id="nav-homepre" role="tabpanel" aria-labelledby="nav-home-tabpre" tabindex="0">
                        <div class="prematch__scopre">
                            <a  @click="updatebet365InplayData(1)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-football icon_color"></i></span>
                                    <span class="score">
                                        Soccer
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-clock-o"></i><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                             <a  @click="updatebet365InplayData(17)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-icehockey icon_color"></i></span>
                                    <span class="score">
                                        Ice Hokey
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                              <a  @click="updatebet365InplayData(18)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-basketball icon_color"></i></span>
                                    <span class="score">
                                        Basketball
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                             <a  @click="updatebet365InplayData(13)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-tennis icon_color"></i></span>
                                    <span class="score">
                                        Tennis
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                          
                            <a  @click="updatebet365InplayData(3)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-cricket icon_color"></i></span>
                                    <span class="score">
                                        Cricket
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                           
                            <a  @click="updatebet365InplayData(92)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-ttennis icon_color"></i></span>
                                    <span class="score">
                                        Table Tennis
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                            <a  @click="updatebet365InplayData(91)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-volly icon_color"></i></span>
                                    <span class="score">
                                        Volleyball
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                            <a @click="updatebet365InplayData(78)" class="prescore__items">
                                <div class="prescore__left">
                                    <span><i class="icon-handball icon_color"></i></span>
                                    <span class="score">
                                        Handball
                                    </span>
                                </div>
                                <div class="prescore__right">
                                    <span><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade text-white  show active" id="nav-profilepre" role="tabpanel" aria-labelledby="nav-profile-tabpre" tabindex="0">
                        <div class="multiple__components">
                            <div class="prematch__scopre">

                            <a @click="setLocalStorage(1,'soccer')"  class="prescore__items">

                                <div class="prescore__left" @click="getCountryName('soccer')">
                                    <span><i class="icon-football icon_color"></i></span>
                                    <span class="score" >
                                        Soccer
                                    </span>
                                </div>

                                <div class="prescore__right">
                                    <span><i class="fa fa-clock-o"></i><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                            <div class="CC_div" id="soccer" style="display:none">
                                <div v-for="item in countryName" :key="item" @click="getLeague(item.cc)">
                                    <div class="prescore__items">
                                        <div class="prescore__items__inner">
                                                <img :src=item?.image>
                                            <div class="prescore__left">
                                                {{item.countryName}}
                                            </div>
                                        </div>

                                        <div class="prescore__right">
                                            <span style="border-bottom: none;"><i class="fa fa-chevron-down"></i></span>
                                        </div>
                                    </div>

                                    <p v-for="item1 in leagueName" :key="item1" :class="item.cc" style="display:none;cursor: pointer;" @click="getLeagueData(item.cc,item1)">{{item1}}</p>
                                </div>
                            </div>



                            <a @click="setLocalStorage(17,'icehocky')"  class="prescore__items">

                                <div class="prescore__left" @click="getCountryName('icehocky')">
                                    <span><i class="icon-icehockey icon_color"></i></span>

                                    <span class="score" >
                                        Ice Hokey
                                    </span>
                                </div>

                                <div class="prescore__right">
                                    <span><i class="fa fa-clock-o"></i><i class="fa fa-chevron-down"></i></span>
                                </div>
                            </a>
                            <div class="CC_div" id="icehocky" style="display:none">
                                <div v-for="item in countryName" :key="item" @click="getLeague(item.cc)">
                                    <div class="prescore__items">
                                        <div class="prescore__items__inner">
                                                <img :src=item?.image>
                                            <div class="prescore__left">
                                                {{item.countryName}}
                                            </div>
                                        </div>

                                        <div class="prescore__right">
                                            <span style="border-bottom: none;"><i class="fa fa-chevron-down"></i></span>
                                        </div>
                                    </div>

                                    <p v-for="item1 in leagueName" :key="item1" :class="item.cc" style="display:none;cursor: pointer;" @click="getLeagueData(item.cc,item1)">{{item1}}</p>
                                </div>
                            </div>

                              
                               <!--  <a  @click="setLocalStorage(17,'icehocky')"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-icehockey icon_color"></i></span>
                                        <span class="score">
                                            Ice Hokey
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a> -->

<!-- ------------------------------------------------------------------------------------------------------------------- -->

                                <a @click="setLocalStorage(18,'Basketball')"  class="prescore__items">

                                    <div class="prescore__left" @click="getCountryName('Basketball')">
                                        <span><i class="icon-basketball icon_color"></i></span>


                                        <span class="score" >
                                            Basketball
                                        </span>
                                    </div>

                                    <div class="prescore__right">
                                        <span><i class="fa fa-clock-o"></i><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a>
                                <div class="CC_div" id="Basketball" style="display:none">
                                    <div v-for="item in countryName" :key="item" @click="getLeague(item.cc)">
                                        <div class="prescore__items">
                                            <div class="prescore__items__inner">
                                                <img :src=item?.image>
                                                <div class="prescore__left">
                                                    {{item.countryName}}
                                                </div>
                                            </div>

                                            <div class="prescore__right">
                                                <span style="border-bottom: none;"><i class="fa fa-chevron-down"></i></span>
                                            </div>
                                        </div>

                                        <p v-for="item1 in leagueName" :key="item1" :class="item.cc" style="display:none;cursor: pointer;" @click="getLeagueData(item.cc,item1)">{{item1}}</p>
                                    </div>
                                </div>

                                <!--   <a   @click="setLocalStorage(18)"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-basketball icon_color"></i></span>
                                        <span class="score">
                                            Basketball
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a> -->
                                 <a   @click="setLocalStorage(13)"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-tennis icon_color"></i></span>
                                        <span class="score">
                                            Tennis
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a>

                                <a   @click="setLocalStorage(3)"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-cricket icon_color"></i></span>
                                        <span class="score">
                                            Cricket
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a>

                               
                              
                                <a  @click="setLocalStorage(92)"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-ttennis icon_color"></i></span>
                                        <span class="score">
                                            Table Tennis
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a>
                                <a   @click="setLocalStorage(91)"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-volly icon_color"></i></span>
                                        <span class="score">
                                            Volleyball
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a>
                                <a   @click="setLocalStorage(78)"  href="<?php echo e(route('home')); ?>" class="prescore__items">
                                    <div class="prescore__left">
                                        <span><i class="icon-handball icon_color"></i></span>
                                        <span class="score">
                                            Handball
                                        </span>
                                    </div>
                                    <div class="prescore__right">
                                        <span><i class="fa fa-chevron-down"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="prematch__wrap">
                <div class="prematch__scopre">
                    <a href="<?php echo e(route('about')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                About Us
                            </span>
                        </div>
                    </a>
                    <a  href="<?php echo e(route('condition')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Terms and Conditions
                            </span>
                        </div>
                    </a>
                    <a href="<?php echo e(route('bonusterm')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Bonus terms
                            </span>
                        </div>
                    </a>
                    <a href="<?php echo e(route('gambling')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Responsible Gambling
                            </span>
                        </div>
                    </a>
                    <a href="<?php echo e(route('policy')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Cookie Policy
                            </span>
                        </div>
                    </a>
                    <a href="<?php echo e(route('deposit_withdraw')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Deposits & Withdrawals
                            </span>
                        </div>
                    </a>
                    <a  href="<?php echo e(route('kyc_policy')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                KYC Policy
                            </span>
                        </div>
                    </a>
                    <a  href="<?php echo e(route('sport_promotion')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Sport Promotions
                            </span>
                        </div>
                    </a>
                    <a  href="<?php echo e(route('sportStat')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                                Sports Stats
                            </span>
                        </div>
                    </a>
                    <a  href="<?php echo e(route('casino_promotion')); ?>" class="prescore__items">
                        <div class="prescore__left">
                            <span><i class="icon-football"></i></span>
                            <span class="score">
                             Casino Promotions
                         </span>
                     </div>
                 </a>
                 <a  href="<?php echo e(route('contact')); ?>" class="prescore__items">
                    <div class="prescore__left">
                        <span><i class="icon-football"></i></span>
                        <span class="score">
                            Contacts
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if(!in_array(Request::route()->getName(),['condition','policy','bonusterm','gambling','kyc_policy','sport_promotion','casino_promotion','about'])): ?>
        <div class="bottom p-1">
            <a href="<?php echo e(route('betResult')); ?>" class="btn-custom light w-100"><?php echo app('translator')->get('results'); ?></a>
        </div>
        <?php endif; ?>
    </div>

    <script>


      function setLocalStorage(category_id,sport) {
          let val = localStorage.getItem('category_id');
          if(val!=category_id){
              localStorage.setItem("category_id", category_id);
          // localStorage.setItem("sport",sport);
          // $.cookie('sport', sport, { expires: 0.0013888888888889});
          // var date = new Date()+2000;
              var currentDate = new Date();
              currentDate.setMinutes(currentDate.getMinutes() + 2);
              var expires = currentDate.toUTCString();
              console.log(expires,"time")
              document.cookie = `sport=${sport}; expires=${expires}`;
              window.location.href='/'
          }

      }

      function onPageLoaded() {

          var val = JSON.stringify(localStorage.getItem('category_id'))
          var el = document.querySelector(`[data-id=${val}]`)


          el.classList.add('active');
      }


      document.addEventListener("DOMContentLoaded", onPageLoaded);


      window.addEventListener("load", onPageLoaded);

  // window.addEventListener('resize', function() {
  //     var imgElement = document.getElementsByClassName('image_main');
  //     var windowWidth = window.innerWidth || document.documentElement.clientWidth;
  //
  //     if (windowWidth <= 575) {
  //
  //         imgElement.src = 'https://recasino.io/assets/uploads/content/647718338d7fc16855265792nd.jpg';
  //
  //     } else {
  //         imgElement.src = 'https://recasino.io/assets/uploads/content/647718338d7fc1685526579.jpg';
  //     }
  // });
  </script><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/home/leftMenu.blade.php ENDPATH**/ ?>