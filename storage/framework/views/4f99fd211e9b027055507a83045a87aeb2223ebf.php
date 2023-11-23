<!--Login Modal Start-->
<div class="modal register__modal" id="signupin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row align-items-center g-4">





                        <div class="col-lg-12">
                            <div class="modal__right">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="<?php echo e(route('login')); ?>" class="nav-link active"><?php echo app('translator')->get('SIGN IN'); ?></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="<?php echo e(route('register')); ?>" class="nav-link"><?php echo app('translator')->get('JOIN NOW'); ?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade  show active" id="home2" role="tabpanel">
                                        <div class="form__tabs__wrap">
                                            <form class="login-form" id="login-form" action="<?php echo e(route('loginModal')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="form__grp">
                                                    <label for="emailsign"><?php echo app('translator')->get('Username'); ?></label>
                                                    <input type="text" id="emailsign"  name="username" placeholder="<?php echo app('translator')->get('Username'); ?>">
                                                    <span class="text-danger emailError"></span>
                                                    <span class="text-danger usernameError"></span>
                                                </div>
                                                <div class="form__grp">
                                                    <label for="toggle-password3"><?php echo app('translator')->get('Password'); ?></label>
                                                    <input id="toggle-password3" type="password" name="password" placeholder="<?php echo app('translator')->get('Password'); ?>">
                                                    <span id="#toggle-password3" class="fa fa-fw fa-eye field-icon toggle-password3"></span>
                                                </div> 
                                                <div class="login__signup">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            autocomplete="off"
                                                            value=""
                                                            id="flexCheckDefault"
                                                            name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexCheckDefault">
                                                            <?php echo app('translator')->get('Remember Me'); ?>
                                                        </label>
                                                    </div>  
                                                    <a href="<?php echo e(route('password.request')); ?>"><?php echo app('translator')->get('Forgot password?'); ?></a>
                                                </div>  
                                                <div class="create__btn cstm_sign_btn">
                                                    <button class="cmn--btn " type="submit">
                                                        <p style="color:white"><?php echo app('translator')->get('SIGN IN'); ?></p>
                                                    </button>
                                                </div>
                                                <p>
                                                    <?php echo app('translator')->get("Don't you have an account yet?"); ?> 
                                                </p>
                                                <p><a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('JOIN NOW'); ?></a></p>
                                            </form>
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
</div><!--Login Modal Start-->
<div class="modal register__modal" id="registermodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row align-items-center g-4">





                        <div class="col-lg-12">
                            <div class="modal__right">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="<?php echo e(route('login')); ?>" class="nav-link"><?php echo app('translator')->get('SIGN IN'); ?></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="<?php echo e(route('register')); ?>" class="nav-link active"><?php echo app('translator')->get('JOIN NOW'); ?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade   show active" id="contact3" role="tabpanel">
                                        <div class="form__tabs__wrap">
                                            <form class="login-form" id="signup-form" action="<?php echo e(route('register')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="form__grp">
                                                    <input
                                                        type="text"
                                                        autocomplete="off"
                                                        name="firstname"
                                                        value="<?php echo e(old('firstname')); ?>"
                                                        class="form-control"
                                                        placeholder="<?php echo app('translator')->get('First Name'); ?>"/>
                                                    <span class="text-danger firstnameError"></span>
                                                </div>
                                                <div class="form__grp">
                                                    <input
                                                        type="text"
                                                        autocomplete="off"
                                                        name="lastname" value="<?php echo e(old('lastname')); ?>"
                                                        class="form-control"
                                                        placeholder="<?php echo app('translator')->get('Last name'); ?>"/>
                                                    <span class="text-danger lastnameError"></span>
                                                </div> 
                                                <div class="form__grp">
                                                    <input
                                                        type="text"
                                                        autocomplete="off"
                                                        name="username" value="<?php echo e(old('username')); ?>"
                                                        class="form-control"
                                                        placeholder="<?php echo app('translator')->get('Username'); ?>"/>
                                                    <span class="text-danger usernameError"></span>
                                                </div> 
                                                <div class="form__grp">
                                                    <input
                                                        type="email"
                                                        autocomplete="off"
                                                        name="email" value="<?php echo e(old('email')); ?>"
                                                        class="form-control"
                                                        placeholder="<?php echo app('translator')->get('Email address'); ?>"/>
                                                    <span class="text-danger emailError"></span>
                                                </div> 
                                                <div class="d-flex">
                                                    <div class="form__grp col-md-6">
                                                        <?php
                                                            $country_code = (string) @getIpInfo()['code'] ?: null;
                                                            $myCollection = collect(config('country'))->map(function($row) {
                                                                return collect($row);
                                                            });
                                                            $countries = $myCollection->sortBy('code');
                                                        ?>
                                                        <select
                                                            class="form-select form-control country_code dialCode-change" name="phone_code"
                                                            aria-label="Default select example" id="basic-addon1">
                                                            <option selected="" disabled><?php echo app('translator')->get('Select Code'); ?></option>
                                                            <?php $__currentLoopData = config('country'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value['phone_code']); ?>"
                                                                        data-name="<?php echo e($value['name']); ?>"
                                                                        data-code="<?php echo e($value['code']); ?>"
                                                                    <?php echo e($country_code == $value['code'] ? 'selected' : ''); ?>> <?php echo e($value['name']); ?>

                                                                    (<?php echo e($value['phone_code']); ?>)
                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form__grp col-md-6">
                                                        <input
                                                            type="text"
                                                            autocomplete="off"
                                                            name="phone" value="<?php echo e(old('phone')); ?>"
                                                            class="form-control dialcode-set"
                                                            placeholder="<?php echo app('translator')->get('Phone Number'); ?>"/>
                                                        <span class="text-danger phoneError"></span>
                                                        <input  autocomplete="off" type="hidden" name="country_code" value="<?php echo e(old('country_code')); ?>" class="text-dark">
                                                    </div>
                                                </div> 
                                                <div class="form__grp">
                                                    <input
                                                        type="password"
                                                        name="password" value="<?php echo e(old('password')); ?>"
                                                        class="form-control"
                                                        placeholder="<?php echo app('translator')->get('Password'); ?>"/>
                                                    <span class="text-danger passwordError"></span>
                                                </div>
                                                <div class="form__grp">
                                                    <input
                                                        type="password"
                                                        name="password_confirmation"
                                                        class="form-control"
                                                        placeholder="<?php echo app('translator')->get('Confirm Password'); ?>"/>
                                                </div>
                                                <div class="create__btn">
                                                    <button class="cmn--btn" type="submit">
                                                        <p style=" font-size:20px!important;color: #141c33;"><?php echo app('translator')->get('JOIN NOW'); ?></p>
                                                    </button>
                                                </div>
                                                <p>
                                                    <?php echo app('translator')->get('Do you have an account?'); ?> 
                                                </p>
                                                <p><a  href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('Login'); ?></a></p>
                                            </form>
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
<!--Login Modal End-->
<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            setDialCode();
            $(document).on('change', '.dialCode-change', function () {
                setDialCode();
            });
            function setDialCode() {
                let currency = $('.dialCode-change').val();
                $('.dialcode-set').val(currency);
            }

        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/modal-form.blade.php ENDPATH**/ ?>