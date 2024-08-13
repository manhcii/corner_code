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
    <section id="fhm-our-service" class="our-service" style="background: url('<?php echo e($image_background); ?>')">
        <div class="container">
            <div class="our-service-content text-center">
                <span class="sub-title"><?php echo e($title); ?></span>
                <h3><?php echo e($brief); ?></h3>
            </div>
            <div class="our-service-wrap">
                <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                            $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                            $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $icon_childs = $item->icon ?? '';
                            $gallery_image_childs = $item->json_params->gallery_image ?? '';
                        ?>
                <div class="our-service-item">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>">
                    <h4><?php echo e($title_childs); ?></h4>
                    <p>
                        <?php echo e($content_childs); ?>

                    </p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/custom/styles/our_services.blade.php ENDPATH**/ ?>