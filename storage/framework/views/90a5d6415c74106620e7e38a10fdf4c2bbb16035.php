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

    
    <section id="fhm-about-us" class="about-us">
        <div class="container container-about-us">
            <div class="about-us-wrap d-flex">
                <div class="about-us-content position-relative">
                    <span class="sub-title"><?php echo e($title); ?></span>
                    <div class="about-us-title">
                        <?php echo $brief; ?>

                    </div>
                    <p class="about-us-des">
                        <?php echo e($content); ?>

                    </p>
                    <img src="<?php echo e($image); ?>" alt="Fresh Healthy And Delicious"
                        class="about-us-title-icon position-absolute" title="Fresh Healthy And Delicious" />
                </div>
                <div class="about-us-image position-relative">
                    <img src="<?php echo e($image_background); ?>" alt="Fresh Healthy And Delicious Luck Sushi"
                        title="Fresh Healthy And Delicious Luck Sushi" />
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/about_block/styles/about.blade.php ENDPATH**/ ?>