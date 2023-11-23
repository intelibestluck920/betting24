    <!--Sub-Header Tabs Here-->
    <section class="main__tab__slide">
        <ul class="nav nav-tabs" id="myTabmain" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="{{route('casino')}}" type="button" role="tab" @if(Request::routeIs('casino')) :class="active" @endif>
                  <span class="icons"><i class="icon-live"></i></span>
                  <span>
                      New
                  </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="{{route('casino')}}" type="button" role="tab" @if(Request::routeIs('casino')) :class="active" @endif>
                  <span class="icons"><i class="icon-live"></i></span>
                  <span>
                      Popular
                  </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
             <a class="nav-link" href="{{route('slot')}}" type="button"  role="tab" @if(Request::routeIs('slot')) :class="active" @endif>
                <span class="icons"><i class="icon-slots"></i></span>
                <span>Slots</span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="{{route('casino')}}" type="button" role="tab" @if(Request::routeIs('casino')) :class="active" @endif>
                  <span class="icons"><i class="icon-live"></i></span>
                  <span>
                      Live Casino
                  </span>
              </a>
            </li>
          </ul>  
    </section>
     <!--Sub-Header Tabs Here-->