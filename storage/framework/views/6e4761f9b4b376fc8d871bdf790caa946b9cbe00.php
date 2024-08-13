<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

<section id="fhm-breadcrumb" class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo e(route('home.default')); ?>" title="Home" class="breadcrumb-link"><?php echo app('translator')->get('Home'); ?></a>
            <div class="breadcrumb-arrow">
                <img src="./themes/frontend/assets/image/icons/breadcrumb-arrow.svg" alt="Home" title="Home" />
            </div>
            <a href="contact-us.html" title="<?php echo e($page->json_params->title->{$locale}?? $page->title); ?>" class="breadcrumb-link"><?php echo e($page->json_params->title->{$locale}?? $page->title); ?></a>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/contact/styles/map.blade.php ENDPATH**/ ?>