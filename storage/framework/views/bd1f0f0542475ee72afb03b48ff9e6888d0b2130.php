<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $icon = $block->icon ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>
<section id="fhm-space-restaurant" class="space-restaurant">
    <div class="container">
        <div class="space-restaurant-content text-center">
            <span class="sub-title"><?php echo e($title); ?></span>
            <h3><?php echo e($brief); ?> </h3>
            <p>
                <?php echo e($content); ?>

            </p>
        </div>
    </div>
    <div class="space-restaurant-main">
        <div class="swiper space-restaurant-swiper">
            <div class="swiper-wrapper">
                <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                        $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                        $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                        $image_childs = $item->image != '' ? $item->image : null;
                        $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                        $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                        $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                        $icon_childs = $item->icon ?? '';
                        $gallery_image_childs = $item->json_params->gallery_image ?? '';
                    ?>
              <div class="swiper-slide">
                  <img src="<?php echo e($image_childs); ?>" alt="FlavorFulFusion" title="FlavorFulFusion">
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="swiper-button-prev swiper-circle">
              <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14 1L2 13L14 22.6" stroke="#CF3031" stroke-width="2"/>
              </svg>
          </div>
          <div class="swiper-button-next swiper-circle">
              <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 22.6L13 10.6L1 0.999977" stroke="#CF3031" stroke-width="2"/>
              </svg>
          </div>
    </div>

</section>

    
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/about_block/styles/values.blade.php ENDPATH**/ ?>