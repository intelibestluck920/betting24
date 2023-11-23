@extends($theme.'layouts.user')
@section('title', trans($title))

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row g-3">
    <div class="dashboard__body__wrap">
      <h3 class="account__head mb__30">Withdraw</h3>
      <div class="payment__cart__check">
        <div class="row">
            @foreach($gateways as $key => $gateway)
            <div class="col-md-6">
                <div class="deposit-box addFund payment__cart__items"
                data-id="{{$gateway->id}}"
                data-name="{{$gateway->name}}"
                data-min_amount="{{getAmount($gateway->minimum_amount, $basic->fraction_number)}}"
                data-max_amount="{{getAmount($gateway->maximum_amount,$basic->fraction_number)}}"
                data-percent_charge="{{getAmount($gateway->percent_charge,$basic->fraction_number)}}"
                data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}"

                data-backdrop='static' data-keyboard='false'
               >
                <!-- <input class="form-check-input" type="checkbox"> -->
                <label
                class="form-check-label"    
                >
                <img class="img-fluid gateway deposit_img " src="{{ getFile(config('location.withdraw.path').$gateway->image)}}"
                alt="{{$gateway->name}}">
                <p>{{trans($gateway->name)}}</p>
            </label>
        </input>
        <div class="cstm_deposit">
            <div>
            <span> Minimum: ${{ showAmount($gateway->minimum_amount)}} </span>
            <span> Maximum: ${{ showAmount($gateway->maximum_amount)}}</span>
        </div>
            <div>
                No service charges
                <br>
                Instant
            </div>
        </div>
    </div>
</div>
@endforeach
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
                    @csrf
                    <div class="modal-body ">
                        <div class="payment-form">
                            <p class="depositLimit"></p>
                            <p class="depositCharge"></p>
                            <br><br>
                            <input type="hidden" class="gateway" name="gateway" value="">
                            <div class="form-group">
                                <!-- <label>@lang('Amount')</label> -->
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
                        <button type="button" class="cmn--btn checkCalc">@lang('Next')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection
@push('script')

@if(count($errors) > 0 )
<script>
    @foreach($errors->all() as $key => $error)
    Notiflix.Notify.Failure("@lang($error)");
    @endforeach
</script>
@endif

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
        baseSymbol = "{{config('basic.currency_symbol')}}";
        fixCharge = $(this).data('fix_charge');
        percentCharge = $(this).data('percent_charge');
        currency = $(this).data('currency');
        $('.depositLimit').text(`@lang('Transaction Limit:') ${baseSymbol}${minAmount} - ${baseSymbol}${maxAmount}  `);

        var depositCharge = `@lang('Charge:')  ${baseSymbol}${fixCharge}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
        $('.depositCharge').text(depositCharge);
        $('.method-name').text(`@lang('Payout By') ${$(this).data('name')}`);
        $('.show-currency').text("{{config('basic.currency')}}");
        $('.gateway').val(id);
    });
    $('.checkCalc').on('click',function (e) {
        var amount = $('.amount').val();
        var gateway = $(".gateway").val();
         $.ajax({
                url: "{{route('user.payout.moneyRequest')}}",
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
@endpush

