<?php $__env->startSection('title',trans($title)); ?>
<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-md-12">
            <div class="dashboard__body__wrap">
                <h3 class="account__head mb__30">
                    Payout History
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
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Trx ID'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Gateway'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Charge'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Time'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Detail'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $payoutLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="#<?php echo app('translator')->get('Trx ID'); ?>"><?php echo e($item->trx_id); ?></td>
                                    <td data-label="<?php echo app('translator')->get('Gateway'); ?>" class="d-initial">
                                        <strong ><?php echo app('translator')->get(optional($item->method)->name); ?></strong>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                        <strong><?php echo e(getAmount($item->amount)); ?> <?php echo app('translator')->get($basic->currency); ?></strong>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Charge'); ?>">
                                        <strong><?php echo e(getAmount($item->charge)); ?> <?php echo app('translator')->get($basic->currency); ?></strong>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($item->status == 1): ?>
                                            <span class="badge bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                        <?php elseif($item->status == 2): ?>
                                            <span class="badge bg-success"><?php echo app('translator')->get('Complete'); ?></span>
                                        <?php elseif($item->status == 3): ?>
                                            <span class="badge bg-danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                        <?php echo e(dateTime($item->created_at, 'd M Y h:i A')); ?>

                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Detail'); ?>">
                                        <button type="button" class="action-btn infoButton "
                                                data-information="<?php echo e(json_encode($item->information)); ?>"
                                                data-feedback="<?php echo e($item->feedback); ?>"
                                                data-trx_id="<?php echo e($item->trx_id); ?>"><i
                                                class="fa fa-info-circle"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr class="text-center">
                                    <td colspan="100%"><?php echo e(trans('No Data Found!')); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                    <?php echo e($payoutLog->appends($_GET)->links($theme.'partials.pagination')); ?>

                </div>
            </div>
    </div>

    <div id="infoModal" class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content form-block">

                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Details'); ?></h4>
                    <button type="button" class="btn-close closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="payment-info">
                        <ul class="list-group ">
                            <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Transactions'); ?> : <span class="trx"></span>
                            </li>
                            <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Admin Feedback'); ?> : <span
                                    class="feedback"></span></li>
                        </ul>
                    </div>
                    <div class="payment-info">
                        <div class="payout-detail">

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class=" btn-custom mb-2 me-3 closeModal" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        "use strict";

        $(document).ready(function () {
            $('.infoButton').on('click', function () {
                var infoModal = $('#infoModal');
                infoModal.find('.trx').text($(this).data('trx_id'));
                infoModal.find('.feedback').text($(this).data('feedback'));
                var list = [];
                var information = Object.entries($(this).data('information'));

                var ImgPath = "<?php echo e(asset(config('location.withdrawLog.path'))); ?>/";
                var result = ``;
                for (var i = 0; i < information.length; i++) {
                    if (information[i][1].type == 'file') {
                        result += `<li class="list-group-item bg-transparent">
                                            <span class="font-weight-bold "> ${information[i][0].replaceAll('_', " ")} </span> : <img class="w-100"src="${ImgPath}/${information[i][1].field_name}" alt="..." class="w-100">
                                        </li>`;
                    } else {
                        result += `<li class="list-group-item bg-transparent">
                                            <span class="font-weight-bold "> ${information[i][0].replaceAll('_', " ")} </span> : <span class="font-weight-bold ml-3">${information[i][1].field_name}</span>
                                        </li>`;
                    }
                }

                if (result) {
                    infoModal.find('.payout-detail').html(`<br><strong class="my-3"><?php echo app('translator')->get('Payment Information'); ?></strong>  ${result}`);
                } else {
                    infoModal.find('.payout-detail').html(`${result}`);
                }
                infoModal.modal('show');
            });


            $('.closeModal').on('click', function (e) {
                $("#infoModal").modal("hide");
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/user/payout/log.blade.php ENDPATH**/ ?>