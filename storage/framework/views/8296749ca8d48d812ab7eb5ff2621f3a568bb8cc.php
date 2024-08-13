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
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['status'] = App\Consts::STATUS['active'];
        // list Category
        $rows = App\Models\ProductCategory::getSqlTaxonomy($params)
            ->limit(9)
            ->get();
    ?>
    <main class="page-menu">
        <!--Our menu-->
        <section id="fhm-components-menu" class="components-menu">
            <div class="container">
                <div class="components-menu-head text-center">
                    <span class="sub-title"><?php echo e($title); ?></span>
                    <h1><?php echo e($brief); ?></h1>
                </div>

                <div class="components-menu-list">
                    <?php if(isset($rows) && count($rows) > 0): ?>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="components-menu-item">
                        <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>">
                            <div class="components-menu-image">
                                <img src="<?php echo e($items->json_params->image??''); ?>" alt="<?php echo e($items->title); ?>" title="<?php echo e($items->title); ?>">
                            </div>
                            <div class="components-menu-name">
                                <p><?php echo e($items->json_params->name->$locale ?? $items->name); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>

            </div>
        </section>
    </main>
<?php endif; ?>
<?php $__env->startPush('script'); ?>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/menu.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/featured_category/styles/product.blade.php ENDPATH**/ ?>