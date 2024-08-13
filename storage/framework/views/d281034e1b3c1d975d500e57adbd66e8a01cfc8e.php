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

<section id="fhm-page-about-banner" class="page-banner page-about-banner position-relative">
    <img src="<?php echo e($image_background); ?>" alt="Who Are We ?" title="Who Are We ?" />
    <div class="container">
        <div class="page-about-banner-content text-center">
            <h1><?php echo e($url_link); ?></h1>
            <p><?php echo e($brief); ?></p>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/banner/layout/banner.blade.php ENDPATH**/ ?>