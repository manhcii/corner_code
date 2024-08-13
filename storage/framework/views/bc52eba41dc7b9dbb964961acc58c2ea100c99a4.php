<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $gallery_image = $block->json_params->gallery_image ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
   <section id="fhm-testimonial" class="testimonial">
    <div class="container">
      <div class="testimonial-content text-center">
        <span class="sub-title"><?php echo e($title); ?></span>
        <h3><?php echo e($brief); ?></h3>
      </div>
      <div class="swiper testimonial-swiper">
        <div class="swiper-wrapper">
            <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                $image_childs = $item->image != '' ? $item->image : null;
                                $image_back_childs = $item->image_background != '' ? $item->image_background : null;
                                $gallery_image = $item->json_params->gallery_image ?? null;
                            ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="testimonial-item-image">
                <img src="<?php echo e($image_back_childs); ?>" alt="I loveee it!!!" title="I loveee it!!!">
              </div>
              <div class="testimonial-item-content">
                <div class="testimonial-item-user">
                  <img src="<?php echo e($image_childs); ?>" alt="Cost Tasti" title="Cost Tasti">
                  <div class="testimonial-item-user-name">
                    <p><?php echo e($title_childs); ?></p>
                    <span><?php echo e($brief_childs); ?></span>
                  </div>
                </div>
                <div class="testimonial-item-star">
                  <img src="<?php echo e(asset('./themes/frontend/assets/image/star.svg')); ?>" alt="Rating" title="Rating">
                </div>
                <p class="testimonial-item-oh"><?php echo e($url_link_title); ?></p>
                <p class="testimonial-item-say">
                  <?php echo e($content_childs); ?>

                </p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/block_star/styles/block_testimonials.blade.php ENDPATH**/ ?>