<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = $block->json_params->style ?? '';
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
        $block_childs_decor = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style == 'decor';
        });
    ?>
    <section id="fhm-partner" class="partner" style="background: url('<?php echo e($image_background); ?>')">
        <div class="container">
          <div class="swiper partner-swiper">
            <div class="swiper-wrapper">
                <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                        ?>
              <div class="swiper-slide">
                <div class="partner-item">
                  <img src="<?php echo e($image); ?>" alt="FlavorFul Fusion" title="FlavorFul Fusion">
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/banner/layout/brand.blade.php ENDPATH**/ ?>