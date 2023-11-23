<?php $__env->startSection('title',trans('Dashboard')); ?>
<?php $__env->startSection('content'); ?>
    <!-- contents -->
    
    <div class="dashboard__body__wrap">
        <h3 class="account__head mb__30">
            Account Settings
        </h3>
        <dov class="row g-4">
            <div class="col-xl-4">
                <div class="user__box">
                    <div class="img__change">
                        <img src="<?php echo e(getFile(config('location.user.path').auth()->user()->image)); ?>" alt="..."/>
                        <div class="icons" id="profile-picture">
                            <i class="fas fa-pen"></i>
                        </div>
                    </div>
                    <div class="user__content">
                        <h5 class="usertext__one"><?php echo e(auth()->user()->username); ?></h5>
                        <h6 class="usertext__two">BALANCE:</h6>



                        $<?php echo e(Auth()->user()->balance); ?>

                    </div>
                    <div class="reset__wrap">
                        <a href="<?php echo e(route('user.profile')); ?>" class="reset">
                            Reset Password
                        </a>
                    </div>
                    <div class="user__dated">
                        <span class="date">Joined <?php echo e(auth()->user()->created_at); ?></span>
                        <a href="#0" class="lastlogin">
                            Last Login on <?php echo e(auth()->user()->updated_at); ?>

                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="account__body">
                    <div class="account__strength__box mb__30">
                        <div class="strength__box">
                            <div class="circle__box">
                                <div class="circle">
                                    <div class="box">
                                        <h3 class="text">
                                            70%
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <h5>
                                Account Strength
                            </h5>
                        </div>
                        <div class="strength__content">
                            <div class="items">
                                <input class="form-check-input" type="checkbox" id="stre1c" checked>
                                <label class="form-check-label" for="stre1c">
                                    Create account
                                </label>
                            </div>
                            <div class="items">
                                <input class="form-check-input" type="checkbox" id="stre2">
                                <label class="form-check-label" for="stre2">
                                    Complete Account
                                </label>
                            </div>
                            <div class="items">
                                <input class="form-check-input" type="checkbox" id="stre3">
                                <label class="form-check-label" for="stre3">
                                    Verify Identity
                                </label>
                            </div>
                            <div class="items">
                                 <input class="form-check-input" type="checkbox" id="stre4">
                                <span>
                                Made a Deposit
                                </span>
                            </div>
                            <div class="items">
                                 <input class="form-check-input" type="checkbox" id="stre5">
                                <span>
                                Upload Avatar
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="account__email mb__30">
                        <h5>
                            Account Emails
                        </h5>
                        <span class="subtitle">
                            Primary Emails
                        </span>
                        <div class="form__wrap">
                            <form action="#">
                                <input type="text" placeholder="<?php echo e(auth()->user()->email); ?>">
                                <i class="icon-lock"></i>
                            </form>
                            <div class="check__items">
                                <input class="form-check-input" type="checkbox" id="stre1" checked>
                                <label class="form-check-label" for="stre1">
                                    Verified
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="account__email enroll__box mb__30">
                        <h5>
                            Multi_factor Authentication
                        </h5>
                        <p>
                            Add an Extra Layer of security to your Recasino account when logging in with Email/Passsword. A verrification code will be sent to your email each time you loin to secrely protect your account.
                        </p>
                        <button onclick="pushNotificationArea.enrollFunc()" type='button'  class="cmn--btn">
                           Enroll
                        </button>
                    </div>
                    <!-- <div class="account__email language__box mb__30">
                        <h5>
                            Language
                        </h5>
                        <span class="slanguage">Select Language</span>
                        <div class="language__wrap">
                            <select name="#" id="#id">
                                <option value="1">
                                    English
                                </option>
                                <option value="2">
                                    Turki
                                </option>
                                <option value="3">
                                    Spanish
                                </option>
                            </select>
                            <a href="#0" class="cmn--btn">
                                <span>Save</span>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="account__email social__box mb__30">
                        <h5>
                            Social Accounts
                        </h5>
                        <span class="slanguage">Connect your accounts for faster login.</span>
                        <div class="social__wrap">
                            <div class="social__left">
                                <a href="#0">
                                    <span>
                                        <img src="assets/img/profile/goggle.png" alt="icon">
                                    </span>
                                    <span>
                                        Connect Google
                                    </span>
                                </a>
                                <a href="#0">
                                    <span>
                                        <img src="assets/img/profile/steam.png" alt="icon">
                                    </span>
                                    <span>
                                        Connect steam
                                    </span>
                                </a>
                                <a href="#0">
                                    <span>
                                        <img src="assets/img/profile/twitter.png" alt="icon">
                                    </span>
                                    <span>
                                        Connect Twitter
                                    </span>
                                </a>
                            </div>
                            <div class="social__left">
                            <a href="#0">
                                <span>
                                    <img src="assets/img/profile/facebook.png" alt="icon">
                                </span>
                                <span>
                                    Connect facebook
                                </span>
                            </a>
                            <a href="#0">
                                <span>
                                    <img src="assets/img/profile/twitch.png" alt="icon">
                                </span>
                                <span>
                                    Connect twitch
                                </span>
                            </a>
                            <a href="#0">
                                <span>
                                    <img src="assets/img/profile/vkonta.png" alt="icon">
                                </span>
                                <span>
                                    Connect vkontakte
                                </span>
                            </a>
                        </div>
                        </div>
                    </div> -->
                    <div class="account__email enroll__box">
                        <h5>
                            Archive Account
                        </h5>
                        <p>
                            Want to temporarily close your account?
                        </p>
                        <button onclick="pushNotificationArea.archiveAccount()" type="button" class="cmn--btn">
                            Archive Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><sup><?php echo e(config('basic.currency_symbol')); ?></sup><?php echo e(Auth()->user()->balance); ?></h2>
                    <p class="info"><?php echo app('translator')->get('Total Balance'); ?></p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="<?php echo e(asset('assets/themes/betting/images/icon/wallet.png')); ?>" alt="...">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><sup><?php echo e(config('basic.currency_symbol')); ?></sup><?php echo e($userBet['totalInvest']); ?></h2>
                    <p class="info"><?php echo app('translator')->get('Total Bet Amount'); ?></p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="<?php echo e(asset('assets/themes/betting/images/icon/invest.png')); ?>" alt="...">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><?php echo e($userBet['totalBet']); ?></h2>
                    <p class="info"><?php echo app('translator')->get('Total Bet'); ?></p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="<?php echo e(asset('assets/themes/betting/images/icon/bet.png')); ?>" alt="...">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-10 mb-2">
            <div class="dashboard__card">
                <div class="dashboard__card-content">
                    <h2 class="price"><?php echo e($userBet['win']); ?></h2>
                    <p class="info"><?php echo app('translator')->get('Bet Win'); ?></p>
                </div>
                <div class="dashboard__card-icon">
                    <img src="<?php echo e(asset('assets/themes/betting/images/icon/earn.png')); ?>" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 col-sm-12">
            <div id="container" class="apexcharts-canvas"></div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body ">
                    <div class="table-parent table-responsive m-0">
                        <table class="table  table-striped" id="service-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('SL No.'); ?></th>
                                <th><?php echo app('translator')->get('Invest Amount'); ?></th>
                                <th><?php echo app('translator')->get('Return Amount'); ?></th>
                                <th><?php echo app('translator')->get('Charge'); ?></th>
                                <th><?php echo app('translator')->get('Ratio'); ?></th>
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
                                    <td data-label="<?php echo app('translator')->get('Charge'); ?>"><?php echo e(config('basic.currency_symbol')); ?><?php echo app('translator')->get($item->charge); ?></td>
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
                                        <button type="button" data-resource="<?php echo e($item->betInvestLog); ?>"
                                                data-bs-target="#investLogList" data-bs-toggle="modal"
                                                class="action-btn investLogList">
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
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="investLogList" role="dialog">
        <div class="modal-dialog  modal-xl">
            <div class="modal-custom-content">
                <div class="modal-header modal-colored-header">
                    <h5 class="modal-title service-title"><?php echo app('translator')->get('Information'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="service-table">
                        <thead class="thead-dark">
                        <tr>
                            <th><?php echo app('translator')->get('#'); ?></th>
                            <th><?php echo app('translator')->get('Match Name'); ?></th>
                            <th><?php echo app('translator')->get('Category Name'); ?></th>
                            <th><?php echo app('translator')->get('Tournament Name'); ?></th>
                            <th><?php echo app('translator')->get('Question Name'); ?></th>
                            <th><?php echo app('translator')->get('Option Name'); ?></th>
                            <th><?php echo app('translator')->get('Ratio'); ?></th>
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
    </div> -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset($themeTrue.'js/apexcharts.js')); ?>"></script>
    <script>
        'use strict'
        $(document).on('click', '.investLogList', function () {
            var obj = $(this).data('resource');
            var output = [];
            if (0 < obj.length) {
                obj.map(function (obj, i) {
                    var tr =
                        `<tr>
                        <td data-label="<?php echo app('translator')->get('#'); ?>">${++i}</td>
                        <td data-label="<?php echo app('translator')->get('Match Name'); ?>">${(obj).match_name}</td>
                        <td data-label="<?php echo app('translator')->get('Category Name'); ?>">${obj.category_icon} ${obj.category_name}</td>
                        <td data-label="<?php echo app('translator')->get('Tournament Name'); ?>">${obj.tournament_name}</td>
                        <td data-label="<?php echo app('translator')->get('Question Name'); ?>">${obj.question_name}</td>
                        <td data-label="<?php echo app('translator')->get('Option Name'); ?>">${obj.option_name}</td>
                        <td data-label="<?php echo app('translator')->get('Ratio'); ?>">${obj.ratio}</td>
                        <td data-label="<?php echo app('translator')->get('Result'); ?>">
                            ${(obj.status == '0') ? ` <span class='badge bg-warning'><?php echo app('translator')->get('Processing'); ?></span>` : ''}
                            ${(obj.status == '2') ? ` <span class='badge bg-success'><?php echo app('translator')->get('Win'); ?></span>` : ''}
                            ${(obj.status == '-2') ? ` <span class='badge bg-danger'><?php echo app('translator')->get('Lose'); ?></span>` : ''}
                            ${(obj.status == '3') ? ` <span class='badge bg-secondary'><?php echo app('translator')->get('Refunded'); ?></span>` : ''}

                        </td>
                    </tr>`;

                    output[i] = tr;
                });

            } else {
                output[0] = `
                        <tr>
                            <td colspan="100%" class=""text-center><?php echo app('translator')->get('No Data Found'); ?></td>
                        </tr>`;
            }

            $('.result-body').html(output);
        });

        var options = {
            theme: {
                mode: '<?php echo e((session()->get('dark-mode') == 'true') ? 'dark' :  ''); ?>',
            },
            series: [
                {
                    name: "<?php echo e(trans('Invested')); ?>",
                    color: '<?php echo e(config('basic.base_color')); ?>',
                    data: <?php echo $dailyPayout->flatten(); ?>

                },

            ],
            chart: {
                type: 'bar',
                // height: ini,
                background: '<?php echo e((session()->get('dark-mode') == 'true') ? '#294056' :  '#ffffff'); ?> ',
                toolbar: {
                    show: false
                }

            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?php echo $dailyPayout->keys(); ?>,

            },
            yaxis: {
                title: {
                    text: ""
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                colors: ['#000'],
                y: {
                    formatter: function (val) {
                        return val + " <?php echo e(config('basic.currency')); ?>"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#container"), options);
        chart.render();

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/user/dashboard.blade.php ENDPATH**/ ?>