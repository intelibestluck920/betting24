@extends($theme.'layouts.user')
@section('title',__($page_title))

@section('content')

    <div class="row">
        <div class="col-sm-12">
                <div class="dashboard__body__wrap">
                    
                    <h3 class="account__head mb__30">@lang($page_title)</h5>
                    <a href="{{route('user.ticket.create')}}" class="cmn--btn "> <i
                            class="fa fa-plus-circle "></i> @lang('Create Ticket')</a>

                    <div class="casinoform__tabe">
                        <table>
                            <thead>
                            <tr>
                                <th scope="col">@lang('Subject')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Last Reply')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tickets as $key => $ticket)
                                <tr>
                                    <td data-label="@lang('Subject')">
                                        <p> [{{ trans('Ticket#').$ticket->ticket }}
                                            ] {{ $ticket->subject }}
                                        </p>
                                    </td>
                                    <td data-label="@lang('Status')">
                                        @if($ticket->status == 0)
                                            <span
                                                class="badge bg-success">@lang('Open')</span>
                                        @elseif($ticket->status == 1)
                                            <span
                                                class="badge bg-primary">@lang('Answered')</span>
                                        @elseif($ticket->status == 2)
                                            <span
                                                class="badge bg-warning">@lang('Replied')</span>
                                        @elseif($ticket->status == 3)
                                            <span class="badge bg-dark">@lang('Closed')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Last Reply')">
                                        {{diffForHumans($ticket->last_reply) }}
                                    </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('user.ticket.view', $ticket->ticket) }}"

                                           data-toggle="tooltip" title="" data-original-title="Details">
                                            <button class="action-btn edit_btn_css"><i class="fal fa-pencil" aria-hidden="true"></i></button>
                                        </a>
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
                    {{ $tickets->appends($_GET)->links($theme.'partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
