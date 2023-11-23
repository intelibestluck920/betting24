
<!--Sub-Header Tabs Here-->
<section class="main__tab__slide">
    <ul class="nav nav-tabs" id="myTabmain" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab" type="button" role="tab" href="<?php echo e(route('home')); ?>" >
              <span class="icons"><i class="icon-home"></i></span>
              <span style="padding-top:4px">Home</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab2" type="button" role="tab" onclick="setLiveData(true)" href="<?php echo e(route('home')); ?>" >
              <span class="icons"><i class="icon-live"></i></span>
              <span style="padding-top:4px">Live</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab3" type="button" role="tab" href="<?php echo e(route('home')); ?>">
              <span class="icons"><i class="icon-calender"></i></span>
              <span style="padding-top:4px">Today</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab4" type="button" role="tab" onclick="setLocalStorage(1)" data-id="1" >
              <span class="icons"><i class="icon-football"></i></span>
              <span style="padding-top:4px">Football</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab5" type="button" role="tab" onclick="setLocalStorage(13)" data-id="13" >
              <span class="icons"><i class="icon-tennis"></i></span>
              <span style="padding-top:4px">Tennis</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab6" type="button" role="tab" onclick="setLocalStorage(18)" data-id="18">
                <span class="icons"><i class="icon-basketball"></i></span>
                <span style="padding-top:4px">Basketball</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab7" type="button" role="tab" onclick="setLocalStorage(17)" data-id="17">
                <span class="icons"><i class="icon-icehockey"></i></span>
                <span style="padding-top:4px">
                    Ice Hockey
                </span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab8" type="button" role="tab" onclick="setLocalStorage(78)" data-id="78" >
                <span class="icons"><i class="icon-handball"></i></span>
                <span style="padding-top:4px">Handball</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="main-tab10" type="button" role="tab" onclick="setLocalStorage(16)" data-id="16"  >
                <span class="icons"><i class="icon-baseball"></i></span>
                <span style="padding-top:4px">
                    Baseball
                </span>
            </a>
          </li>
          <!--<li class="nav-item" role="presentation">-->
          <!--    <a class="nav-link" id="main-tab11" data-bs-toggle="tab" onclick="setLocalStorage(2)" data-bs-target="#mainTab11" type="button" role="tab"  aria-selected="false">-->
          <!--      <span class="icons"><i class="icon-horse"></i></span>-->
          <!--      <span>Horse Racing</span>-->
          <!--   </a>-->
          <!--</li>-->
         <!--  <li class="nav-item" role="presentation">
              <a class="nav-link" id="main-tab12" data-bs-toggle="tab" onclick="setLocalStorage(1)" data-id="1" data-bs-target="#mainTab12" type="button" role="tab"  aria-selected="false">
              <span class="icons"><i class="icon-v"></i></span>
              <span style="padding-top:4px">E-Sports</span>
            </a>
          </li> -->
      </ul>  
</section>
  <!--Sub-Header Tabs Here-->
  <script>
  function setLocalStorage(category_id) {
      // localStorage.setItem("category_id", category_id);
  }
  function setLiveData(status){
      localStorage.setItem('topMenu',status)
  }
</script><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/mainTab.blade.php ENDPATH**/ ?>