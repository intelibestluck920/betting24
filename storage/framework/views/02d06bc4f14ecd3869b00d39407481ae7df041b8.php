<!-- slider -->
<?php if(isset($contentDetails['slider'])): ?>
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
                <?php $__currentLoopData = $contentDetails['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>

                        <a href="<?php echo e(optional($data->content->contentMedia->description)->button_link); ?>">

                           <img src="https://recasino.io/assets/uploads/content/647718338d7fc16855265792nd.jpg" class="downBars" id="responsiveImg"/>


                        </a>
                        <div class="label_text">
                            <h2>
                                <?php echo e(optional($data->description)->name); ?>


                            </h2>
                            <p class="mb-4">
                                <?php echo e(optional($data->description)->short_description); ?>

                            </p>
                            <a href="<?php echo e(optional($data->content->contentMedia->description)->button_link); ?>"><button class="btn-custom">
                                    <?php echo e(optional($data->description)->button_name); ?>


                                </button></a>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div> -->
</div>
<?php endif; ?>
<?php /**PATH /home/u428797525/domains/recasino.io/public_html/resources/views/themes/betting/partials/home/slider.blade.php ENDPATH**/ ?>