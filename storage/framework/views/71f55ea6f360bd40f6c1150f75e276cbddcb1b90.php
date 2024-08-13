<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? null;
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
        $block_childs_decor = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style == 'decor';
        });
    ?>

<section id="fhm-slide" class="slide">
    <div class="slide-wrap position-relative">
        <img src="<?php echo e($image); ?>" alt="Eat Sushi The Right Way" title="Eat Sushi The Right Way">
        <div class="slide-content position-absolute text-center">
            <div class="container">
                <?php echo $brief; ?>

                <p>
                    <?php echo e($content); ?>

                </p>
                <a href="<?php echo e($url_link); ?>" class="button" title="Make A Reservation Now"><?php echo e($url_link_title); ?></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/banner/layout/slide.blade.php ENDPATH**/ ?>