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
        $i = 0;
        // dd($block_childs);
    ?>
 <section id="fhm-best-experienc" class="best-experienc" style="background: url('<?php echo e($image_background); ?>') no-repeat">
    <div class="container">
        <div class="best-experienc-head text-center">
            <span class="sub-title"><?php echo e($title); ?></span>
            <h1><?php echo e($brief); ?> </h1>
        </div>
        <div class="best-experienc-main">
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                    $image_childs = $item->image ?: null;
                    $image_background_childs = $item->image_background ?: null;
                    $url_link_childs = $item->url_link ?: '';
                    $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                    $icon_childs = $item->icon ?: '';
                    $gallery_image_childs = $item->json_params->gallery_image ?? [];
                    $style = $item->json_params->style ?? '';
                    $isActive = $loop->first ? 'active' : '';
                ?>

                <div class="best-experienc-item ">
                    <div class="best-experienc-left">
                        <span class="best-experienc-item-number"><?php echo e($title_childs); ?></span>
                        <button class="button-experienc" title="The Menu Is Extensive"><?php echo e($brief_childs); ?></button>
                        <div class="best-experienc-item-des">
                            <p><?php echo e($content_childs); ?></p>
                        </div>
                    </div>

                    <div class="best-experienc-image">
                        <div class="swiper best-experienc-thumbs">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $gallery_image_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e($galleryItem); ?>" alt="Fresh And Delicious" title="Fresh And Delicious">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="swiper best-experienc-large">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $gallery_image_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo e($galleryItem); ?>" alt="Fresh And Delicious" title="Fresh And Delicious">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/our-service.js')); ?>"></script>

<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/service_block/styles/our_services.blade.php ENDPATH**/ ?>