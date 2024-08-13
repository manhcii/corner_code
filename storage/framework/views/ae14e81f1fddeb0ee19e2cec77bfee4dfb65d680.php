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
     <section id="fhm-menu-introduce" class="menu-introduce position-relative">
        <div class="container">
            <div class="menu-introduce-content">
                <p>
                  <?php echo e($brief); ?>

                </p>
                <ul class="menu-introduce-content-list">
                  <?php echo $content; ?>

                </ul>
            </div>
        </div>
        <div class="menu-introduce-image">
            <div class="menu-introduce-image-main">
                <img src="<?php echo e($image); ?>" alt="FlavorFul Fusion's" title="FlavorFul Fusion's">
            </div>
            <div class="menu-introduce-image-child">
                <img src="<?php echo e($image_background); ?>" alt="FlavorFul Fusion's" title="FlavorFul Fusion's">
            </div>
        </div>
    </section>

<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/custom/styles/products_mission.blade.php ENDPATH**/ ?>