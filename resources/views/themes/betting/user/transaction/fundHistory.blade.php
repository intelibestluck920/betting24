@extends($theme.'layouts.user')
@section('title',trans('Fund History'))
@section('content')

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
                                <th scope="col">@lang('Transaction ID')</th>
                                <th scope="col">@lang('Gateway')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Fee')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Time')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($funds as $key => $data)
                                <tr>

                                    <td data-label="#@lang('Transaction ID')">
                                        <strong>{{$data->transaction}}</strong>
                                    </td>
                                    <td data-label="@lang('Gateway')">@lang(optional($data->gateway)->name)</td>
                                    <td data-label="@lang('Amount')">
                                        <strong>{{getAmount($data->amount)}} @lang($basic->currency)</strong>
                                    </td>

                                    <td data-label="@lang('Charge')">
                                        <strong>{{getAmount($data->charge)}} @lang($basic->currency)</strong>
                                    </td>

                                    <td data-label="@lang('Status')">
                                        @if($data->status == 1)
                                            <span class="badge bg-success">@lang('Complete')</span>
                                        @elseif($data->status == 2)
                                            <span class="badge bg-warning">@lang('Pending')</span>
                                        @elseif($data->status == 3)
                                            <span class="badge bg-danger">@lang('cancelled')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Time')">
                                        {{ dateTime($data->created_at, 'd M Y h:i A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="100%">{{__('No Data Found!')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $funds->appends($_GET)->links($theme.'partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

