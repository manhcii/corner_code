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
    
    <section id="fhm-popular-collections">
        <div class="container">
          <div class="popular-collections-content text-center">
            <p class="sub-title"><?php echo e($brief); ?></p>
            <h2 class="title"><?php echo e($title); ?></h2>
          </div>
          <div class="popular-collections-list">
            <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                            $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                            $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $icon_childs = $item->icon ?? '';
                            $gallery_image_childs = $item->json_params->gallery_image ?? '';
                        ?>
            <div class="popular-collections-item">
              <img
                src="<?php echo e($image); ?>"
                alt="Living Room Collection"
                title="Living Room Collection"
              />
              <div class="popular-collections-item-content position-absolute">
                <h5><?php echo e($title_childs); ?></h5>
                <div class="button button-viewmore">
                  <a href="<?php echo e($url_link_childs); ?>" title="Show Now"><?php echo e($url_link_childs_title); ?></a>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/custom/styles/our_services.blade.php ENDPATH**/ ?>