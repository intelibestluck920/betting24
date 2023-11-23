@extends($theme.'layouts.user')
@section('title')
@lang('Bet History')
@endsection
@section('content')
<div class="row justify-content-between">
    <div class="col-md-12">
        <div class="dashboard__body__wrap">
            <div class="casinoform__tabe">
                <table>
                    <thead>
                        <tr>
                            <th>@lang('SL No.')</th>
                            <th>@lang('Bet Amount')</th>
                            <th>@lang('Possible Winnings')</th>
                            <th>@lang('Odds')</th>
                            <th class="text-center">@lang('Status')</th>
                            <th class="text-center">@lang('Information')</th>
                            <th>@lang('Time')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($betInvests as $key => $item)
                        <tr>
                            <td data-label="@lang('SL No.')">{{++$key}}</td>
                            <td data-label="@lang('Invest Amount')">{{config('basic.currency_symbol')}}@lang($item->invest_amount)</td>
                            <td data-label="@lang('Return Amount')">{{config('basic.currency_symbol')}}@lang($item->return_amount)</td>
                            <!--<td data-label="@lang('Charge')">{{config('basic.currency_symbol')}}@lang($item->charge)</td>-->
                            <td data-label="@lang('Ratio')"> @lang($item->ratio)</td>
                            <td data-label="@lang('Status')" class="text-center">
                                @if($item->status == 0)
                                <span class="badge bg-warning">@lang('Processing')</span>
                                @elseif($item->status == 1)
                                <span class="badge bg-success">@lang('Win')</span>
                                @elseif($item->status == -1)
                                <span class="badge bg-danger">@lang('Loss')</span>
                                @elseif($item->status == 2)
                                <span class="badge bg-primary">@lang('Refund')</span>
                                @endif

                            </td>
                            <td data-label="@lang('Information')" class="text-center">
                                <button type="button" data-resource="{{$item->betInvestLog}}" data-bs-target="#investLogList" data-bs-toggle="modal" class="action-btn investLogList">
                                    <i class="fa fa-info-circle"></i></button>
                                </td>
                                <td data-label="@lang('Time')">
                                    {{ dateTime($item->created_at, 'd M Y h:i A') }}
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
                {{ $betInvests->appends($_GET)->links($theme.'partials.pagination') }}
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
                            <th>@lang('#')</th>
                            <th>@lang('Match Name')</th>
                            <th>@lang('Sports')</th>
                            <th>@lang('Tournament Name')</th>
                            <th>@lang('Set Event')</th>
                            <th>@lang('Odds')</th>
                            <th>@lang('Result')</th>
                        </tr>
                    </thead>
                    <tbody class="result-body">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-custom me-2 mb-2"
                data-bs-dismiss="modal"><span>@lang('Close')</span></button>
            </div>
        </div>
    </div>
    @endsection
    @push('style')
    <script src="{{ asset('assets/admin/js/fontawesome/fontawesomepro.js') }}"></script>
    @endpush
    @push('script')
    <script>
        'use strict'
        $(document).on('click', '.investLogList', function() {
         var obj = $(this).data('resource');console.log('bet slip data--->', obj);
         var betInvests = @json($betInvests);console.log('bet invest data', betInvests)
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
                <h3 class="modal-title service-title"  style="color:#88b6ff">@lang('Bet Slip No')&nbsp;&nbsp;&nbsp;${obj.id}&nbsp;&nbsp;&nbsp;</h3>
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
            <td colspan="100%" class=""text-center>@lang('No Data Found')</td>
            </tr>`;
        }

        $('.modal-custom-content').html(output);
    });
</script>
@endpush
