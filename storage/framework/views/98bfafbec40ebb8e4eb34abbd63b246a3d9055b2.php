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

<section id="fhm-about-us" class="about-us">
    <div class="container container-about-us" style="background:url('<?php echo e($image_background); ?>') no-repeat">
        <div class="about-us-wrap d-flex">
            <div class="about-us-content">
                <span class="sub-title"><?php echo e($title); ?></span>
                <div class="about-us-title position-relative">
                    <?php echo $brief; ?>

                    <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/about-us-icon-title.svg')); ?>" alt="Fresh Healthy And Delicious" class="about-us-title-icon position-absolute" title="Fresh Healthy And Delicious">
                </div>
                <p class="about-us-des">
                   <?php echo e($content); ?>

                </p>
                <a href="<?php echo e($url_link); ?>" class="button" title="Explore Now"><?php echo e($url_link_title); ?></a>
            </div>
            <div class="about-us-image position-relative">
                <img src="<?php echo e($image); ?>" alt="Fresh Healthy And Delicious Luck Sushi" title="Fresh Healthy And Delicious Luck Sushi">
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/banner/layout/about_us.blade.php ENDPATH**/ ?>