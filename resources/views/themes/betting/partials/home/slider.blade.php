<!-- slider -->
@if(isset($contentDetails['slider']))
<div class="live__heightlight mb__30" style="padding: 0px 0px;">
   <div class="destop_show">
       <img src="https://recasino.io/assets/uploads/content/647718338d7fc1685526579.png">
      <div class="text-container">
        <h2 class="slider_h2">
            <span>LOOKING FOR THE BEST</span>
            <span>CASINO WELCOME BONUS?</span>
        </h2>
        <a href="https://recasino.io/register"><button>TAKE ME THERE</button></a>
    </div>
   </div>
   <div class="mobile_show">
       <img src="https://recasino.io/assets/uploads/content/mobile_banner.png">
      <div class="text-container">
        <h2 class="slider_h2">
            <span>LOOKING FOR THE </span>
            <span>BEST CASINO </span>
            <span>WELCOME BONUS?</span>
        </h2>
        <a href="https://recasino.io/register"><button>TAKE ME THERE</button></a>
    </div>
   </div>

   <!--  <div class="skitter-large-box" style="margin-left: -10px; margin-right: -10px">
        <div class="skitter skitter-large with-dots">
            <ul>
                @foreach($contentDetails['slider'] as $data)
                    <li>

                        <a href="{{optional($data->content->contentMedia->description)->button_link}}">
{{--                            {{getFile(config('location.content.path').@$data->coivntent->contentMedia->description->image)}}--}}
                           <img src="https://recasino.io/assets/uploads/content/647718338d7fc16855265792nd.jpg" class="downBars" id="responsiveImg"/>
{{--                            <img src="https://recasino.io/assets/uploads/content/647718338d7fc1685526579.jpg" class="desktop-image" alt="Desktop Image">--}}
{{--                            <img src="https://recasino.io/assets/uploads/content/647718338d7fc16855265792nd.jpg" class="mobile-image" alt="Mobile Image">--}}
                        </a>
                        <div class="label_text">
                            <h2>
                                {{optional($data->description)->name}}
{{--                                LOOKING FOR THE <br> BEST CASINO <br> WELCOME BONUS?--}}
                            </h2>
                            <p class="mb-4">
                                {{optional($data->description)->short_description}}
                            </p>
                            <a href="{{optional($data->content->contentMedia->description)->button_link}}"><button class="btn-custom">
                                    {{optional($data->description)->button_name}}
{{--                                    TAKE ME THERE--}}
                                </button></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> -->
</div>
@endif
