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

<main class="page-404">
    <div class="page-404-image">
        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
    </div>
    <h1><?php echo e($title); ?></h1>
    <a class="page-404-button" href="<?php echo e(route('home.default')); ?>" title="BACK TO HOMEPAGE"><?php echo e($content); ?></a>
</main>

<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/custom/styles/404.blade.php ENDPATH**/ ?>