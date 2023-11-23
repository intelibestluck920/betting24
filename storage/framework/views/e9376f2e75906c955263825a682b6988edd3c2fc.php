<?php $__env->startSection('title',trans('Fund History')); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-md-12">
                <div class="dashboard__body__wrap">
                    <h3 class="account__head mb__30">
                        Deposit History
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
                                <th scope="col"><?php echo app('translator')->get('Transaction ID'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Gateway'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Fee'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Time'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td data-label="#<?php echo app('translator')->get('Transaction ID'); ?>">
                                        <strong><?php echo e($data->transaction); ?></strong>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Gateway'); ?>"><?php echo app('translator')->get(optional($data->gateway)->name); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                        <strong><?php echo e(getAmount($data->amount)); ?> <?php echo app('translator')->get($basic->currency); ?></strong>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Charge'); ?>">
                                        <strong><?php echo e(getAmount($data->charge)); ?> <?php echo app('translator')->get($basic->currency); ?></strong>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($data->status == 1): ?>
                                            <span class="badge bg-success"><?php echo app('translator')->get('Complete'); ?></span>
                                        <?php elseif($data->status == 2): ?>
                                            <span class="badge bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                        <?php elseif($data->status == 3): ?>
                                            <span class="badge bg-danger"><?php echo app('translator')->get('cancelled'); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                        <?php echo e(dateTime($data->created_at, 'd M Y h:i A')); ?>

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
                    <?php echo e($funds->appends($_GET)->links($theme.'partials.pagination')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/user/transaction/fundHistory.blade.php ENDPATH**/ ?>