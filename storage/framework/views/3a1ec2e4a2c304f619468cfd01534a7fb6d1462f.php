<?php $__env->startSection('title',$page_title); ?>

<?php $__env->startSection('content'); ?>
    <section class="login-section">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-6 p-0">
                    <div class="text-box h-100">
                        <div class="overlay h-100">
                            <div class="text">
                                <h2><?php echo app('translator')->get('2 step Verification'); ?></h2>
                                <a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('back to home'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-wrapper d-flex align-items-center h-100">
                        <form action="<?php echo e(route('user.twoFA-Verify')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row g-4">
                                <div class="col-12">
                                    <h4><?php echo app('translator')->get('2 FA Code'); ?></h4>
                                </div>
                                <div class="input-box col-12">
                                    <input
                                        type="text"
                                        name="code" value="<?php echo e(old('code')); ?>"
                                        class="form-control"
                                        placeholder="<?php echo app('translator')->get('2 FA Code'); ?>"/>
                                    <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <button type="submit"
                                    class="btn-custom w-100 mt-4"><?php echo app('translator')->get('Submit'); ?></button>
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
            background: url(<?php echo e(getFile(config('location.logo.path').'loginImage.png')); ?>);
            background-size: cover;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/auth/verification/2stepSecurity.blade.php ENDPATH**/ ?>