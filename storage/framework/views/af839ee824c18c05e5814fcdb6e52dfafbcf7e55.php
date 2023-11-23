<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Bet History'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-between">
    <div class="col-md-12">
        <div class="dashboard__body__wrap">
            <div class="casinoform__tabe">
                <table>
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('SL No.'); ?></th>
                            <th><?php echo app('translator')->get('Bet Amount'); ?></th>
                            <th><?php echo app('translator')->get('Possible Winnings'); ?></th>
                            <th><?php echo app('translator')->get('Odds'); ?></th>
                            <th class="text-center"><?php echo app('translator')->get('Status'); ?></th>
                            <th class="text-center"><?php echo app('translator')->get('Information'); ?></th>
                            <th><?php echo app('translator')->get('Time'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $betInvests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('SL No.'); ?>"><?php echo e(++$key); ?></td>
                            <td data-label="<?php echo app('translator')->get('Invest Amount'); ?>"><?php echo e(config('basic.currency_symbol')); ?><?php echo app('translator')->get($item->invest_amount); ?></td>
                            <td data-label="<?php echo app('translator')->get('Return Amount'); ?>"><?php echo e(config('basic.currency_symbol')); ?><?php echo app('translator')->get($item->return_amount); ?></td>
                            <!--<td data-label="<?php echo app('translator')->get('Charge'); ?>"><?php echo e(config('basic.currency_symbol')); ?><?php echo app('translator')->get($item->charge); ?></td>-->
                            <td data-label="<?php echo app('translator')->get('Ratio'); ?>"> <?php echo app('translator')->get($item->ratio); ?></td>
                            <td data-label="<?php echo app('translator')->get('Status'); ?>" class="text-center">
                                <?php if($item->status == 0): ?>
                                <span class="badge bg-warning"><?php echo app('translator')->get('Processing'); ?></span>
                                <?php elseif($item->status == 1): ?>
                                <span class="badge bg-success"><?php echo app('translator')->get('Win'); ?></span>
                                <?php elseif($item->status == -1): ?>
                                <span class="badge bg-danger"><?php echo app('translator')->get('Loss'); ?></span>
                                <?php elseif($item->status == 2): ?>
                                <span class="badge bg-primary"><?php echo app('translator')->get('Refund'); ?></span>
                                <?php endif; ?>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Information'); ?>" class="text-center">
                                <button type="button" data-resource="<?php echo e($item->betInvestLog); ?>" data-bs-target="#investLogList" data-bs-toggle="modal" class="action-btn investLogList">
                                    <i class="fa fa-info-circle"></i></button>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                    <?php echo e(dateTime($item->created_at, 'd M Y h:i A')); ?>

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
                <?php echo e($betInvests->appends($_GET)->links($theme.'partials.pagination')); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="investLogList" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog  modal-md">
        <div class="modal-custom-content">
            <div class="modal-body" style="min-height:300px">
                <table class="table table-striped" id="service-table">
                    <thead class="thead-dark">
                        <tr>
                            <th><?php echo app('translator')->get('#'); ?></th>
                            <th><?php echo app('translator')->get('Match Name'); ?></th>
                            <th><?php echo app('translator')->get('Sports'); ?></th>
                            <th><?php echo app('translator')->get('Tournament Name'); ?></th>
                            <th><?php echo app('translator')->get('Set Event'); ?></th>
                            <th><?php echo app('translator')->get('Odds'); ?></th>
                            <th><?php echo app('translator')->get('Result'); ?></th>
                        </tr>
                    </thead>
                    <tbody class="result-body">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-custom me-2 mb-2"
                data-bs-dismiss="modal"><span><?php echo app('translator')->get('Close'); ?></span></button>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('style'); ?>
    <script src="<?php echo e(asset('assets/admin/js/fontawesome/fontawesomepro.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('script'); ?>
    <script>
        'use strict'
        $(document).on('click', '.investLogList', function() {
         var obj = $(this).data('resource');console.log('bet slip data--->', obj);
         var betInvests = <?php echo json_encode($betInvests, 15, 512) ?>;console.log('bet invest data', betInvests)
         var output = [];
         var betType = obj.length >1 ? 'Multi Bet' : 'Single Bet';
         var status = ['Lose','','Processing','','Win','Refunded']
         if (0 < obj.length) {
            obj.map(function(obj, i) {
                var betStake = betInvests.data.filter((item)=> item.bet_invest_log.filter((data)=>data.id == obj.id))[0].invest_amount

              
                var tr =
                `
                <div class="modal-header modal-colored-header">
                <div>
                <h3 class="modal-title service-title"  style="color:#88b6ff"><?php echo app('translator')->get('Bet Slip No'); ?>&nbsp;&nbsp;&nbsp;${obj.id}&nbsp;&nbsp;&nbsp;</h3>
                ${new Date(obj.created_at).toLocaleString('en-US', { dateStyle: 'medium', timeStyle: 'medium' })}
                </div>
                
                <button type="button" data-bs-dismiss="modal" style="font-size:20px; color:#f3486a" aria-label="Close">X</button>
                </div>
                <hr>
                <div style="display: flex;">
                <div class="col" style="padding:0px 25px 0px 25px">
                <div style="display:flex; justify-content: space-between; padding:10px">
                <h5  style="color:#88b6ff">Bet Type</h5><span>${betType}</span>
                </div>
                <div style="display:flex; justify-content: space-between;padding:10px">
                <h5  style="color:#88b6ff">Stake</h5><span>${betStake}</span>
                </div>
                <div style="display:flex; justify-content: space-between;padding:10px">
                <h5  style="color:#88b6ff">Overall Odds</h5><span>${obj.ratio}</span>
                </div>
                <div style="display:flex; justify-content: space-between;padding:10px">
                <h5  style="color:#88b6ff">Potential winnings</h5><span>${obj.ratio * betStake}</span>
                </div>
                </div>
                </div>
                <hr>
                <div style="padding:25px;">
                <h4>${obj.tournament_name}</h4>
                <p style="margin-left:17px">(${new Date(obj.created_at).toLocaleString('en-US', { dateStyle: 'medium', timeStyle: 'medium' })})</p>
                <h4 style="margin:16px 0">${obj.match_name}</h4>

                <div style="display: flex;">
                <div class="col">
                <div style="display:flex; justify-content: space-between; padding:10px">
                <h5  style="color:#88b6ff">Odds</h5><span>${obj.ratio}</span>
                </div>
                <div style="display:flex; justify-content: space-between;padding:10px">
                <h5  style="color:#88b6ff">Status</h5>


                ${(() => {
                    if (obj.status == 2) {
                        return `<span class="badge bg-success">${status[obj.status + 2]}</span>`;
                    } else if (obj.status == -2) {
                        return `<span class="badge bg-danger">${status[obj.status + 2]}</span>`;
                    } else {
                        return `<span class="badge bg-warning">${status[obj.status + 2]}</span>`;
                    }
                })()}
                </div>
                <div style="display:flex; justify-content: space-between;padding:10px">
                <h5  style="color:#88b6ff">Event</h5><span>${obj.option_name}</span>
                </div>

                </div>
                </div>
                </div>
                `;
                output[i] = tr;
            });

        } else {
            output[0] = `
            <tr>
            <td colspan="100%" class=""text-center><?php echo app('translator')->get('No Data Found'); ?></td>
            </tr>`;
        }

        $('.modal-custom-content').html(output);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/user/betHistory/index.blade.php ENDPATH**/ ?>