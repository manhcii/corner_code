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
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
        $block_childs_decor = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style == 'decor';
        });
    ?>

<section id="fhm-about">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-6 col-lg-6">
          <div class="about-content">
            <h3 class="title"><?php echo e($title); ?></h3>
            <p class="sub-title">
              <?php echo e($brief); ?>

            </p>
          </div>
          <div class="about-action">
            <a href="<?php echo e($url_link); ?>" class="button button-start" title="Get started"><?php echo app('translator')->get('Get started'); ?></a>
            <a href="<?php echo e($url_link_title); ?>" class="button button-view" title="Learn more"><?php echo app('translator')->get('Learn more'); ?></a>
          </div>
        </div>
        <div class="col-12 col-xl-6 col-lg-6">
          <img
            src="<?php echo e($image); ?>"
            alt="Join to Get Special Discount"
            title="Join to Get Special Discount"
          />
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/banner/layout/about_us.blade.php ENDPATH**/ ?>