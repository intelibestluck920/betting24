
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Transaction'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between">
        <div class="col-md-12">
            <div class="dashboard__body__wrap">
                <h3 class="account__head mb__30">
                    Transaction History
                </h3>
                <div class="cainoform__wrap">
                    <div class="row g-4">
                        <div class="col-xl-6">
                            <div class="casino__date">
                                <h4 class="f__title">
                                    From
                                </h4>
                                <div class="calender-bar">
                                    <input type="date" class="datepicker" placeholder="2023-2-2">
                                    <i class="icon-calender"></i>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="casino__date">
                                <h4 class="f__title">
                                    Until
                                </h4>
                                <div class="calender-bar">
                                    <input type="date" class="datepicker" placeholder="2023-2-2">
                                    <i class="icon-calender"></i>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="casinoform__tabe">
                    <table>
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('SL No.'); ?></th>
                            <th><?php echo app('translator')->get('Transaction ID'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?></th>
                            <th><?php echo app('translator')->get('Remarks'); ?></th>
                            <th><?php echo app('translator')->get('Time'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('SL No.'); ?>"><?php echo e(loopIndex($transactions) + $loop->index); ?></td>
                                <td data-label="<?php echo app('translator')->get('Transaction ID'); ?>"><?php echo app('translator')->get($transaction->trx_id); ?></td>
                                <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                    <span class="font-weight-bold text-<?php echo e(($transaction->trx_type == "+") ? 'success': 'danger'); ?>"><?php echo e(($transaction->trx_type == "+") ? '+': '-'); ?><?php echo e(getAmount($transaction->amount, config('basic.fraction_number')). ' ' . trans(config('basic.currency'))); ?></span>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Remarks'); ?>"> <?php echo app('translator')->get($transaction->remarks); ?></td>
                                <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                    <?php echo e(dateTime($transaction->created_at, 'd M Y h:i A')); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <tr class="text-center">
                                <td colspan="100%"><?php echo e(__('No Data Found!')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($transactions->appends($_GET)->links($theme.'partials.pagination')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/user/transaction/index.blade.php ENDPATH**/ ?>