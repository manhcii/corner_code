<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>


<section id="fhm-network" class="network">
    <div class="container">
        <h3><?php echo e($title); ?></h3>
        <img src="<?php echo e($image); ?>" alt="our Networks" title="our Networks">
    </div>
 </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/banner/layout/about_map.blade.php ENDPATH**/ ?>