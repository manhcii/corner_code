<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
    <section id="fhm-special-menu" class="special-menu">
        <div class="container">
          <div class="special-menu-content text-center">
            <span class="sub-title"><?php echo e($title); ?></span>
            <h3><?php echo e($brief); ?></h3>
          </div>
        </div>
        <div class="special-menu-wrap">
          <div class="special-menu-image" style="background: url('<?php echo e($image); ?>') no-repeat;background-size: cover"></div>
          <div class="swiper special-menu-info">
            <div class="swiper-wrapper">
             <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                $image_childs = $item->image != '' ? $item->image : null;
                                $gallery_image = $item->json_params->gallery_image ?? null;
                            ?>
              <div class="swiper-slide">
                <div class="special-menu-item">
                  <h4><?php echo e($title_childs); ?></h4>
                  <?php echo $brief_childs; ?>

                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
            <div class="special-menu-swiper-button position-relative">
              <div class="swiper-pagination"></div>
              <div class="swiper-button-prev">
                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 1L1 8L8 13.6" stroke="#727272" stroke-width="1.19444"/>
                </svg>
              </div>
              <div class="swiper-button-next">
                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L1 13.6" stroke="#727272" stroke-width="1.19444"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/custom/styles/our_menu.blade.php ENDPATH**/ ?>