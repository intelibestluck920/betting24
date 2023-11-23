    <!--Sub-Header Tabs Here-->
    <section class="main__tab__slide">
        <ul class="nav nav-tabs" id="myTabmain" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="<?php echo e(route('casino')); ?>" type="button" role="tab" <?php if(Request::routeIs('casino')): ?> :class="active" <?php endif; ?>>
                  <span class="icons"><i class="icon-live"></i></span>
                  <span>
                      New
                  </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="<?php echo e(route('casino')); ?>" type="button" role="tab" <?php if(Request::routeIs('casino')): ?> :class="active" <?php endif; ?>>
                  <span class="icons"><i class="icon-live"></i></span>
                  <span>
                      Popular
                  </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
             <a class="nav-link" href="<?php echo e(route('slot')); ?>" type="button"  role="tab" <?php if(Request::routeIs('slot')): ?> :class="active" <?php endif; ?>>
                <span class="icons"><i class="icon-slots"></i></span>
                <span>Slots</span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="<?php echo e(route('casino')); ?>" type="button" role="tab" <?php if(Request::routeIs('casino')): ?> :class="active" <?php endif; ?>>
                  <span class="icons"><i class="icon-live"></i></span>
                  <span>
                      Live Casino
                  </span>
              </a>
            </li>
          </ul>  
    </section>
     <!--Sub-Header Tabs Here--><?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/gameTab.blade.php ENDPATH**/ ?>