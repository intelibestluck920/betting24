@extends($theme.'layouts.user')
@section('title',trans($title))
@section('content')
         <div class="row justify-content-between">
            <div class="col-md-12">
                <div class="dashboard__body__wrap">
                    <h3 class="account__head mb__30">
                        Referral Bonus
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
                                <th>@lang('SL No.')</th>
                                <th>@lang('Bonus From')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Remarks')</th>
                                <th>@lang('Time')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td data-label="@lang('SL No.')">
                                        {{loopIndex($transactions) + $loop->index}}</td>
                                    <td data-label="@lang('Bonus From')">@lang(optional($transaction->bonusBy)->fullname)</td>
                                    <td data-label="@lang('Amount')">
                                                    <span
                                                        class="font-weight-bold text-success">{{getAmount($transaction->amount, config('basic.fraction_number')). ' ' . trans(config('basic.currency'))}}</span>
                                    </td>

                                    <td data-label="@lang('Remarks')"> @lang($transaction->remarks)</td>
                                    <td data-label="@lang('Time')">
                                        {{ dateTime($transaction->created_at, 'd M Y h:i A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="100%">{{trans('No Data Found!')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    {{ $transactions->appends($_GET)->links($theme.'partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
