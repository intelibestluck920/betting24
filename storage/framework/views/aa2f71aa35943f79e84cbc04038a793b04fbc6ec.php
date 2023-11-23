<?php $__env->startSection('title', trans($title)); ?>

<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<div class="row g-3">
    <div class="dashboard__body__wrap">
      <h3 class="account__head mb__30">Withdraw</h3>
      <div class="payment__cart__check">
        <div class="row">
            <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
                <div class="deposit-box addFund payment__cart__items"
                data-id="<?php echo e($gateway->id); ?>"
                data-name="<?php echo e($gateway->name); ?>"
                data-min_amount="<?php echo e(getAmount($gateway->minimum_amount, $basic->fraction_number)); ?>"
                data-max_amount="<?php echo e(getAmount($gateway->maximum_amount,$basic->fraction_number)); ?>"
                data-percent_charge="<?php echo e(getAmount($gateway->percent_charge,$basic->fraction_number)); ?>"
                data-fix_charge="<?php echo e(getAmount($gateway->fixed_charge, $basic->fraction_number)); ?>"

                data-backdrop='static' data-keyboard='false'
               >
                <!-- <input class="form-check-input" type="checkbox"> -->
                <label
                class="form-check-label"    
                >
                <img class="img-fluid gateway deposit_img " src="<?php echo e(getFile(config('location.withdraw.path').$gateway->image)); ?>"
                alt="<?php echo e($gateway->name); ?>">
                <p><?php echo e(trans($gateway->name)); ?></p>
            </label>
        </input>
        <div class="cstm_deposit">
            <div>
            <span> Minimum: $<?php echo e(showAmount($gateway->minimum_amount)); ?> </span>
            <span> Maximum: $<?php echo e(showAmount($gateway->maximum_amount)); ?></span>
        </div>
            <div>
                No service charges
                <br>
                Instant
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="deposit_modal" style="display:none;">
    <div id="makeDeposit">
        <div role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="method-name"></h4>
                    <button type="button" class="btn-close close modal_close">
                        <span aria-hidden="true" class="white-text"></span>
                    </button>
                </div>

                <form id="submit_form" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="payment-form">
                            <p class="depositLimit"></p>
                            <p class="depositCharge"></p>
                            <br><br>
                            <input type="hidden" class="gateway" name="gateway" value="">
                            <div class="form-group">
                                <!-- <label><?php echo app('translator')->get('Amount'); ?></label> -->
                                <div class="input-box">
                                    <div class="input-group input-group-lg">
                                        <input type="text" style="color:gray;" class="amount form-control" name="amount" placeholder="Amount">
                                        <div class="input-group-append">
                                            <span class="input-group-text show-currency"></span>
                                        </div>
                                    </div>
                                    <p class="text-danger err_div"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="cmn--btn checkCalc"><?php echo app('translator')->get('Next'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>

<?php if(count($errors) > 0 ): ?>
<script>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    Notiflix.Notify.Failure("<?php echo app('translator')->get($error); ?>");
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>
<?php endif; ?>

<script>
    $('.modal_close').on('click',function () {
        $('.deposit_modal').hide();
        $('.amount').val('');
    })
    $('.payment__cart__items').on('click',function () {
        $('.deposit_modal').toggle();
    })

    "use strict";

    var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, gateway;

    $('.addFund').on('click', function () {
        id = $(this).data('id');
        gateway = $(this).data('gateway');
        minAmount = $(this).data('min_amount');
        maxAmount = $(this).data('max_amount');
        baseSymbol = "<?php echo e(config('basic.currency_symbol')); ?>";
        fixCharge = $(this).data('fix_charge');
        percentCharge = $(this).data('percent_charge');
        currency = $(this).data('currency');
        $('.depositLimit').text(`<?php echo app('translator')->get('Transaction Limit:'); ?> ${baseSymbol}${minAmount} - ${baseSymbol}${maxAmount}  `);

        var depositCharge = `<?php echo app('translator')->get('Charge:'); ?>  ${baseSymbol}${fixCharge}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
        $('.depositCharge').text(depositCharge);
        $('.method-name').text(`<?php echo app('translator')->get('Payout By'); ?> ${$(this).data('name')}`);
        $('.show-currency').text("<?php echo e(config('basic.currency')); ?>");
        $('.gateway').val(id);
    });
    $('.checkCalc').on('click',function (e) {
        var amount = $('.amount').val();
        var gateway = $(".gateway").val();
         $.ajax({
                url: "<?php echo e(route('user.payout.moneyRequest')); ?>",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:"json",
                data: {
                    amount,
                    gateway
                },
                success(data) {
                    if(data.success == 0)
                    {
                        $('.err_div').text(data.response);
                    }
                    if(data.success == 1)
                    {
                        window.location.href = "https://recasino.io/user/withdraw/preview";
                        $('.amount').val('');

                    }
                    if(data.error)
                    {
                        $('.err_div').text(data.error);
                    }
                }
            });
    })
    $('.close').on('click', function (e) {
        $('#loading').hide();
        $('.amount').val(``);
        $("#makeDeposit").modal("hide");
    });

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/user/payout/money.blade.php ENDPATH**/ ?>