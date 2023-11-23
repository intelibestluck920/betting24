<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>
    <section class="login-section">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-6 p-0">
                    <div class="text-box h-100">
                        <div class="overlay h-100">
                            <div class="text">
                                <h1 style="font-weight: unset;" class="font_change"><?php echo app('translator')->get('Sign in to your account'); ?></h1>
                                <a href="<?php echo e(route('home')); ?>" class="font_change"><?php echo app('translator')->get('back to home'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-wrapper d-flex align-items-center h-100">
                        <form action="<?php echo e(route('login')); ?>" method="post" class="login-form">
                            <?php echo csrf_field(); ?>
                            <div class="row g-4">
                                <div class="form__grp">
                                    <label for="emailsign"><?php echo app('translator')->get('Username'); ?></label>
                                    <input type="text" id="emailsign"  name="username" placeholder="<?php echo app('translator')->get('Username'); ?>" style="    border-radius: 10px;
                                        border: unset;
                                        font-size: 14px;
                                        font-weight: 400;
                                        background: #20283f;
                                        /* border: unset; */
                                        width: 100%;
                                        padding: 13px 50px 15px 18px;
                                        outline: none;
                                        color: var(--white);
                                        position: relative;">
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form__grp">
                                    <input type="password" class="form-control" name="password"
                                    style=" border-radius: 10px;
                                            border: unset;
                                            font-size: 14px;
                                            font-weight: 400;
                                            background: #20283f;
                                            /* border: unset; */
                                            width: 100%;
                                            padding: 13px 50px 15px 18px;
                                            outline: none;
                                            color: var(--white);
                                            position: relative;"
                                       placeholder="<?php echo app('translator')->get('Password'); ?>"/>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger mt-1"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if(basicControl()->reCaptcha_status_login): ?>
                                    <div class="box mb-4 form-group">
                                        <?php echo NoCaptcha::renderJs(session()->get('trans')); ?>

                                        <?php echo NoCaptcha::display(['data-theme' => 'dark']); ?>

                                        <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger mt-1"><?php echo app('translator')->get($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-12">
                                    <div class="links">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                                                id="flexCheckDefault"/>
                                            <label
                                                class="form-check-label"
                                                for="flexCheckDefault">
                                                <?php echo app('translator')->get('Remember Me'); ?>
                                            </label>
                                        </div>
                                        <a href="<?php echo e(route('password.request')); ?>"><?php echo app('translator')->get('Forgot password?'); ?></a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="create__btn d-flex justify-content-center">
                                <button class="cmn--btn" type="submit">
                                    <span ><?php echo app('translator')->get('Sign In'); ?></span>
                                </button>
                            </div>
                            <p class="justify-content-center d-flex">
                                <?php echo app('translator')->get("Don't Have an Account?"); ?>
                            </p>
                            <p class="justify-content-center d-flex"><a href="<?php echo e(route('register')); ?>" style="color:#0d6efd"><?php echo app('translator')->get('Create an Account'); ?></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .modal .text-box,
        .login-section .text-box {
            background: url(<?php echo e(getFile(config('location.logo.path').'loginImage.jpg')); ?>);
            background-size: cover;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/auth/login.blade.php ENDPATH**/ ?>