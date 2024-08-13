<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = $block->json_params->style ?? '';
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });

    ?>

<section id="fhm-homebanner" class="position-relative">
    <div class="banner-image position-absolute">
      <picture>
        <source media="(min-width: 992px)" srcset="<?php echo e(asset('./themes/frontend/corner/assets/homebanner.png')); ?>" />
        <source
          media="(min-width: 569px)"
          srcset="<?php echo e(asset('./themes/frontend/corner/assets/homebanner-tablet.png')); ?>"
        />
        <source
          media="(max-width: 567px)"
          srcset="<?php echo e(asset('./themes/frontend/corner/assets/homebanner-mobile.png')); ?>"
        />
        <img src="<?php echo e(asset('./themes/frontend/corner/assets/homebanner.png')); ?>" alt="Your Design Destination" title="Your Design Destination"/>
      </picture>
    </div>
    <div class="container">
      <div class="float-right position-relative">
        <div class="homebanner-content text-center d-inline-block">
          <h4 class="title"><?php echo e($title); ?></h4>
          <p><?php echo e($brief); ?></p>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/banner/layout/banner.blade.php ENDPATH**/ ?>