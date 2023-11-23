<!-- FOOTER SECTION -->
<?php if(in_array(Request::route()->getName(),['home','condition','policy','gambling','bonusterm','category','tournament','match','login','register','register.sponsor','user.check','password.request','about','contact','kyc_policy','casino_promotion','sport_promotion','deposit_withdraw','sportStat','casino','slot','betResult','user.fund-history','user.home','user.addFund','user.transaction','user.betHistory','user.ticket.list'])): ?>


    <!--Footer Start-->
    <footer class="footer__section main__footer__section media991__pb60 pt-60">
        <div class="container-fluid p-0">

            <!--Footer Top-->
        <div class="footer__top pb-60">
            <div class="row g-5">
                <div class="col-xxl-3 col-xl-5 col-lg-5 col-md-5 col-sm-5 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="widget__items">
                        <div class="footer-head">
                            <h3 class="title">
                                General Info
                            </h3>
                        </div>
                        <div class="content-area">
                            <ul class="quick-link">
                                <li>
                                    <a  href="<?php echo e(route('about')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> About Us
                                    </a>
                                </li>
                                <li>
                                    <a  href="<?php echo e(route('condition')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Terms and Conditions
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('policy')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Cookie Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('kyc_policy')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> KYC Policy
                                    </a>
                                </li>
                                <li>
                                    <a  href="<?php echo e(route('contact')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Contacts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-5 col-lg-5 col-md-5 col-sm-5 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="widget__items">
                        <div class="footer-head">
                            <h3 class="title">
                                Casino
                            </h3>
                        </div>
                        <div class="content-area">
                            <ul class="quick-link">
                                <li>
                                    <a href="<?php echo e(route('slot')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Top
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('slot')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> New
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('slot')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Popular
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('slot')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Slots
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Jackpots
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('casino')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Live Casino
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('slot')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> All Games
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-5 col-lg-7 col-md-5 col-sm-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="widget__items">
                        <div class="footer-head">
                        <h3 class="title">
                            Promotions
                        </h3>
                        </div>
                        <div class="content-area">
                            <ul class="quick-link">
                                <li>
                                    <a href="<?php echo e(route('casino_promotion')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Casino Promotions
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('sport_promotion')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Sport Promotions
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-5 col-lg-7 col-md-5 col-sm-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="widget__items">
                        <div class="footer-head">
                        <h3 class="title">
                            Help
                        </h3>
                        </div>
                        <div class="content-area">
                            <ul class="quick-link">
                                <li>
                                    <a href="<?php echo e(route('contact')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Help
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('deposit_withdraw')); ?>">
                                    <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> Deposits & Withdrawals
                                    </a>
                                </li>
                                <li>
                                    <a  href="<?php echo e(route('condition')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle">
                                        Terms & conditions
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('bonusterm')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle">
                                        Bonus terms & conditions
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('gambling')); ?>">
                                        <img src="<?php echo e(getFile(config('location.footer.path').'rightarrow.png')); ?>" alt="angle"> 
                                        Responsible Gambling
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Top-->

            <!--Footer Sponor Here-->
            <div class="footer__sponsor owl-theme owl-carousel">
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s1.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s12.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s3.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s4.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s5.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s6.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s7.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s8.png')); ?>" alt="simg">
                    </a>
                </div>
                <div class="footer__sponsor__items">
                    <a href="#0">
                        <img src="<?php echo e(getFile(config('location.sponsor.path').'s9.png')); ?>" alt="simg">
                    </a>
                </div>
                <!--<div class="footer__sponsor__items">-->
                <!--    <a href="#0">-->
                <!--        <img src="<?php echo e(getFile(config('location.sponsor.path').'s10.png')); ?>" alt="simg">-->
                <!--    </a>-->
                <!--</div>-->
            </div>
            <!--Footer Sponor End-->

            <!--Footer bottom-->
            <div class="footer__bottom">
                <p>
                    &copy; 2023 <a href="<?php echo e(route('home')); ?>" class="text--base">RECASINO</a> - All Right Reserved
                </p>
                <p style="font-size: 10px !important;">
                    RECASINO.IO is owned by HARBESINA LTD (reg.number HE 405135) with a registered office located at Poseidonos, 1, Flat/Office 201, Aglantzia, 2101, Nicosia, Cyprus as a Billing Agent and RECASINO.io is operated by PREVAILER B.V. as a License Holder (Curacao license No. 8048/JAZ).
                </p>

















            </div>
            <!--Footer bottom-->
        </div>
    </footer>
    <!--Footer End-->

<?php endif; ?>


<?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/footer.blade.php ENDPATH**/ ?>