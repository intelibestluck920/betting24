@extends($theme.'layouts.app')
@section('title', trans('Latest 10 Results to Results'))
@section('content')
@include($theme.'partials.mainTab')
    @if($betResult)
        <!-- faq section -->
        <section class="faq-section faq-page d-flex">
        <div class="container-fluid p-0">
            <div class=" g-0 d-flex">
                <!-- leftbar -->
                <div class="leftbar col-xxl-2 col-xl-2 col-lg-2" id="leftbar">
                    @include($theme.'partials.home.leftMenu')
                </div>
                <div class="main__body__wrap left__right__space col-xxl-10 col-xl-10 col-lg-10">
                    <div class="live__heightlight mb__30">
                      <div class="section__title">
                          <h3 class="py-3">
                            Results 
                          </h3>
                      </div>
                       <div class="main__table main__table__tennis main__table__cricket">
                         <div class="mt-3">
                            @forelse ( $betResult as $key => $item )
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="heading{{$key}}">
                                        <button
                                            class="accordion-button @if($key != 0)collapsed" @endif
                                        type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$key}}"
                                            aria-expanded="true"
                                            aria-controls="collapse{{$key}}">
                                            {{optional($item->gameTeam1)->name}}
                                            <img src="{{ getFile(config('location.team.path') . optional($item->gameTeam1)->image) }}"
                                                alt="user" class="rounded-circle mx-1" width="25" height="25">
                                            @lang('vs')
                                            <img src="{{ getFile(config('location.team.path') . optional($item->gameTeam2)->image) }}"
                                                 alt="user" class="rounded-circle mx-1" width="25" height="25">
                                            {{$item->gameTeam2->name}}
                                        </button>
                                    </h5>
                                    <div
                                        id="collapse{{$key}}"
                                        class="accordion-collapse collapse @if ($key==0)
                                        show"
                                        @endif
                                        aria-labelledby="heading{{$key}}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-striped ">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">@lang('Name')</th>
                                                    <th scope="col">@lang('Result')</th>
                                                </tr>
                                                </thead>
                                                <tbody class="result-body">
                                                @forelse($item->gameQuestions as $key => $gameQuestion)
                                                    <tr>
                                                        <td data-label="@lang('#')">{{++$key}}</td>
                                                        <td data-label="@lang('Name')">{{$gameQuestion->name}}</td>
                                                        @if(optional($gameQuestion->gameOptionResult)->option_name)
                                                            <td data-label="@lang('Result')">{{optional($gameQuestion->gameOptionResult)->option_name }}</td>
                                                        @else
                                                            <td data-label="@lang('Result')">@lang('N/A')</td>
                                                        @endif
                                                    </tr>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                                    @include($theme.'partials.footer')
                </div>
            </div>
            </div>
            </div>
        </section>
    @endif
@endsection
