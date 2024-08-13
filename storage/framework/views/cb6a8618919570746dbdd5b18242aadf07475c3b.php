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
    <section id="fhm-homebanner-two" class="position-relative">
        <picture>
          <source media="(min-width: 992px)" srcset="<?php echo e(asset('./themes/frontend/corner/assets/homebanner-2.png')); ?>" />
          <source
            media="(min-width: 568px)"
            srcset="<?php echo e(asset('./themes/frontend/corner/assets/homebanner-2-tablet.png')); ?>"
          />
          <source
            media="(max-width: 567px)"
            srcset="<?php echo e(asset('./themes/frontend/corner/assets/homebanner-2-mobile.png')); ?>"
          />
          <img
            src="<?php echo e(asset('./themes/frontend/corner/assets/homebanner-2.png')); ?>"
            alt="The Finishing Touch Your Home."
        title="The Finishing Touch Your Home."
          />
        </picture>
        <div class="container">
          <div class="homebanner-content position-relative">
            <h3 class="title"><?php echo e($title); ?></h3>
            <p><?php echo e($brief); ?></p>
          </div>
        </div>
      </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/banner/layout/brand.blade.php ENDPATH**/ ?>