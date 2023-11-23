@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection


@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card secbg">
                <div class="card-body text-center">
                    <h3 class="card-title font_class">@lang('Payment Preview')</h3>
                    
                    <h4 class="font_class"> @lang('PLEASE SEND EXACTLY') 
                        <span class="text-success font_class"> {{ getAmount($data->amount) }}</span> {{$data->currency}}
                    </h4>
                    <h5 class="font_class">@lang('TO') <span class="text-success font_class"> {{ $data->sendto }}</span></h5>
                    <img src="{{$data->img}}" alt="..." class="cstm_scan_img">
                    <h4 class="text-color font-weight-bold font_class">@lang('SCAN TO SEND')</h4>
                </div>
            </div>
        </div>
    </div>
@endsection

