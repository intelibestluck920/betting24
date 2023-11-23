@extends($theme.'layouts.user')
@section('title')
    @lang('Add Fund')
@endsection
@section('content')
    <div class="row g-3">
        <div class="dashboard__body__wrap">
          <h3 class="account__head mb__30">Deposit</h3>
              <div class="payment__cart__check">
                <div class="row g-4">
                    <div class="payment_status_div">Active Payment Methods</div>
                    @foreach($gateways as $key => $gateway) 
                        @if($gateway->display_active == 1)
                        <div class="payment__cart col-md-6 modal_btn">
            
                            <div
                                class="deposit-box  addFund payment__cart__items"
                                onclick="scrollToElement()"
                                data-id="{{$gateway->id}}"
                                data-name="{{$gateway->name}}"
                                data-currency="{{$gateway->currency}}"
                                data-gateway="{{$gateway->code}}"
                                data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                data-max_amount="{{getAmount($gateway->max_amount,$basic->fraction_number)}}"
                                data-percent_charge="{{getAmount($gateway->percentage_charge,$basic->fraction_number)}}"
                                data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}">
                                <!-- <input class="form-check-input" type="checkbox"> -->
                                  <label
                                    class="form-check-label"
                                  >
                                    <img  
                                        class="img-fluid deposit_img"
                                        src="{{ getFile(config('location.gateway.path').$gateway->image)}}"
                                        alt="{{$gateway->name}}"
                                    />
                                    <span>{{trans($gateway->name)}}</span>
                                    </label>
                                </input>
                                <div class="cstm_deposit">
                                    <div>
                                    <span> Minimum: ${{ showAmount($gateway->min_amount)}} </span>
                                    <span> Maximum: ${{ showAmount($gateway->max_amount)}}</span></div>
                                    <div>
                                        No service charges
                                        <br>
                                        Instant
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endif
                    @endforeach
                    <div class="payment_status_div"> ID Verification Required </div>
                    @foreach($gateways as $key => $gateway) 

                         @if($gateway->display_active == 0)
                        <div class=" stripe_btn payment__cart col-md-6">
            
                            <div
                                class="deposit-box addFund payment__cart__items"
                               
                                data-id="{{$gateway->id}}"
                                data-name="{{$gateway->name}}"
                                data-currency="{{$gateway->currency}}"
                                data-gateway="{{$gateway->code}}"
                                data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                data-max_amount="{{getAmount($gateway->max_amount,$basic->fraction_number)}}"
                                data-percent_charge="{{getAmount($gateway->percentage_charge,$basic->fraction_number)}}"
                                data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}">
                                <!-- <input class="form-check-input" type="checkbox"> -->
                                  <label
                                    class="form-check-label"
                                  >
                                    <img
                                        class="img-fluid deposit_img"
                                        src="{{ getFile(config('location.gateway.path').$gateway->image)}}"
                                        alt="{{$gateway->name}}"
                                    />
                                    <span>{{trans($gateway->name)}}</span>
                                    </label>
                                </input>
                                <div class="cstm_deposit">
                                    <div>
                                    <span> Minimum: ${{ showAmount($gateway->min_amount)}} </span>
                                    <span> Maximum: ${{ showAmount($gateway->max_amount)}}</span>
                                    </div>
                                    <div>
                                        No service charges
                                        <br>
                                        Instant
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="display_modal mt-5" id="content_deposit">
                    <div
                    class="show_modal"
                    id="makeDeposit"
                    style="display: none;"
                    data-bs-backdrop="static"
                    data-bs-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="makeDepositLabel"
                    aria-hidden="true">
                    <div class="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 >@lang('Make Deposit')</h4>
                                <button
                                type="button" style="height: 0em;"
                                class="btn-close close close_btn"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body mt-4">
                                <form>
                                    <div class="payment-form">
                                        @if(0 == $totalPayment)
                                        <p class="depositLimit"></p>
                                        <p class="depositCharge"></p>
                                        @endif

                                        <input type="hidden" class="gateway" name="gateway" value="">
                                        <div class="form-group mb-30">
                                            <div class="input-box">
                                                <div class="input-group mt-4">
                                                    <input style="color:gray;" type="text" class="amount form-control" name="amount"
                                                    autocomplete="off"
                                                    placeholder="@lang('Amount')"
                                                    @if($totalPayment != null) value="{{$totalPayment}}"
                                                    placeholder="@lang('Amount')" readonly @endif>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text show-currency"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <pre class="text-danger errors"></pre>
                                        </div>
                                    </div>
                                </form>
                                <div class="payment-info text-center">
                                    <img id="loading" src="{{asset('assets/admin/images/loading.gif')}}" alt="..."
                                    class="w-15"/>
                                </div>
                            </div>

                            <div class="modal-footer border-top-0 mt-0 m-3">
                                <a type="button" class="cmn--btn checkCalc"><p>@lang('Next')</p></a>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Deposit Modal -->
        
        <div
            class="stripe_modal"
            id="stripeError"
            style="display: none;"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            tabindex="-1"
            aria-labelledby="makeDepositLabel"
            aria-hidden="true">
            <div class="" style="border: solid 0.5px #13e08d; border-radius: 6px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 >@lang('ERROR')</h4>

                        <button
                            type="button" style="height: 0em;"
                            class="btn-close close close_btn"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <p class="px-3">Confirm your identity with identifying documents in order to use this deposit method.</p>
                    <div class="modal-footer border-top-0">
                        <a type="button" class="cmn--btn checkCalc" ><p>@lang('Close')</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script>
        function scrollToElement() {
            var elmnt = document.getElementById("content_deposit");
          elmnt.scrollIntoView({behavior:'smooth', block:'start'});
      }
        $('#loading').hide();
        "use strict";
        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, amount, gateway;
        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "{{config('basic.currency_symbol')}}";
            fixCharge = $(this).data('fix_charge');
            if(fixCharge == '0')
            {
                fixCharge = '0.00'
            }
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');
            $('.depositLimit').text(`@lang('Transaction Limit: ') ${baseSymbol}${minAmount} - ${baseSymbol}${maxAmount}  `);

            var depositCharge = `@lang('Fee: ') ${baseSymbol}${fixCharge}   ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);

            $('.method-name').text(`@lang('Payment By') ${$(this).data('name')} - ${currency}`);
            $('.show-currency').text("{{config('basic.currency')}}");
            $('.gateway').val(currency);

            // amount
        });

        $(".modal_btn").on('click',function()
        {
            $(".stripe_modal").hide();
            $(".show_modal").show();
        })

         $(".stripe_btn").on('click',function()
        {
            $(".stripe_modal").show();
            $(".show_modal").hide();

        })

        $(".close_btn").on('click',function()
        {
            $(".show_modal").hide();
            $(".stripe_modal").hide();
        })


        $(".checkCalc").on('click', function () {
            $('.payment-form').addClass('d-none');

            $('#loading').show();
            $('.modal-backdrop.fade').addClass('show');
            amount = $('.amount').val();
            $.ajax({
                url: "{{route('user.addFund.request')}}",
                type: 'POST',
                data: {
                    amount,
                    gateway
                },
                success(data) {

                    $('.payment-form').addClass('d-none');
                    $('.checkCalc').closest('.modal-footer').addClass('d-none');

                    var htmlData = `
                     <ul class="list-group text-center text-white cstm_li_demo">
                        <li class="list-group-item bg-transparent cstm_li_demo" style=" display: flex;align-items: center;">
                            <lable>@lang('Payment Provider'):</lable>
                            <span>
                                <img class="w-100"src="${data.gateway_image}"
                                style="max-width:33px;"/>
                            </span>
                        </li>

                         
                        
                        <li class="list-group-item bg-transparent cstm_li_demo">
                            <lable>@lang('Fee'):</lable>
                            <span>${data.charge}</span>
                        </li>
                        <li class="list-group-item bg-transparent cstm_li_demo">
                            <lable>@lang('Payable'):</lable>
                            <span> ${data.payable}</span>
                        </li>
                       
                        <li class="list-group-item bg-transparent cstm_li_demo">
                            <lable>@lang('Conversion Rate'):</lable>
                            <span> ${data.conversion_rate}</span>
                        </li>
                        <li class="list-group-item bg-transparent  cstm_main_input">
                            <span><input type="text" disabled class="form-control cstm_li_input" placeholder="${data.amount} "></input></span>
                        </li>
                        <li class="list-group-item bg-transparent" style="text-align: left;">
                            ${data.in}
                        </li>

                        ${(data.isCrypto == true) ? `
                        <li class="list-group-item bg-transparent" style="text-align: left;">
                            ${data.conversion_with}
                        </li>
                        ` : ``}

                        <li class="list-group-item bg-transparent payment_btn" >
                        <a href="${data.payment_url}" class=" line-h22   btn-block addFund ">@lang('Pay Now')</a>
                        </li>
                        </ul>`;

                    $('.payment-info').html(htmlData)
                },
                complete: function () {
                    $('#loading').hide();
                },
                error(err) {
                    var errors = err.responseJSON;
                    for (var obj in errors) {
                        $('.errors').text(`${errors[obj]}`)
                    }

                    $('.payment-form').removeClass('d-none');
                }
            });
        });


        $('.close').on('click', function (e) {
            $('#loading').hide();
            $('.payment-form').removeClass('d-none');
            $('.checkCalc').closest('.modal-footer').removeClass('d-none');
            $('.payment-info').html(``)
            $('.amount').val(``);
            $("#addFundModal").modal("hide");
        });

    </script>
@endpush

