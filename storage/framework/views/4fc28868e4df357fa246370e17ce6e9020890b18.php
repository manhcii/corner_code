<?php $__env->startSection('content'); ?>
    <?php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $background_breadcrumbs = json_decode($setting->image)->background_breadcrumbs ?? '';
        $category_title = $page->json_params->name->{$locale} ?? $page->name;
        $category_brief = $page->json_params->brief->{$locale} ?? $page->brief;
        $category_description = $page->json_params->description->{$locale} ?? $page->description;
        $category_content = $page->json_params->content->{$locale} ?? $page->content;
        $category_image = $page->json_params->image != '' ? $page->json_params->image : $setting->background_breadcrumbs;
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : $setting->background_breadcrumbs;
    ?>
<section id="fhm-breadcrumb" class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo e(route('home.default')); ?>" title="Home" class="breadcrumb-link"><?php echo app('translator')->get('Home'); ?></a>
            <div class="breadcrumb-arrow">
                <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg')); ?>" alt="Home" title="Home" />
            </div>
            <a href="<?php echo e(route('frontend.page',['taxonomy'=>'menu'])); ?>" title="Menu" class="breadcrumb-link"><?php echo app('translator')->get('Menu'); ?></a>
            <div class="breadcrumb-arrow">
                <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg')); ?>" alt="Home" title="Home" />
            </div>
            <a href="<?php echo e($page->alias); ?>" title="List Product" class="breadcrumb-link"><?php echo e($page->name); ?></a>
        </div>
    </div>
</section>

<main class="page-list-product">
    <!--Tabs Components Menu-->
    <section id="fhm-tab-components-menu" class="tabs-menu">
        <div class="container">
            <div class="tabs-menu-head text-center">
                <span class="sub-title"><?php echo e($page->json_params->name->{$locale} ?? $page->name); ?></span>
                <h1><?php echo e($page->json_params->description->{$locale} ?? $page->description); ?></h1>
            </div>

            <ul class="tabs-menu-list" id="tabsMenuList" role="tablist">
                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->index < 1): ?>
                <li role="presentation">
                    <button class="tabs-menu-button active" data-bs-toggle="tab" data-bs-target="#tabs-item-all"
                        type="button" role="tab" aria-controls="tabs-item-all" aria-selected="true">All</button>
                </li>
                <?php else: ?>
                <li role="presentation">
                    <button class="tabs-menu-button" data-bs-toggle="tab" data-bs-target="#tabs-item-<?php echo e($item->id); ?>"
                        type="button" role="tab" aria-controls="tabs-item-<?php echo e($item->id); ?>"
                        aria-selected="false"><?php echo e($item->name); ?></button>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="tab-content tabs-menu-content" id="tabsMenuContent">
                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($loop->index <1): ?>
                <div class="tab-pane fade show active" id="tabs-item-all" role="tabpanel" aria-labelledby="tabs-item-all"
                    tabindex="0"  data-perpage="<?php echo e($rows->withQueryString()->perPage()); ?>"
                    data-currentpage="<?php echo e($rows->withQueryString()->currentPage()); ?>"
                    data-taxonomy="<?php echo e($val_taxonomy->id); ?>"
                    data-lastpage="<?php echo e($rows->withQueryString()->lastPage()); ?>">
                    <div class="tabs-menu-products">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <div class="product-item-image">
                                <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->title); ?>" title="<?php echo e($item->title); ?>">
                            </div>
                            <p class="product-name"><?php echo e($item->name); ?></p>
                            <p class="product-price">$<?php echo e($item->price); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($rows->withQueryString()->currentPage() < $rows->withQueryString()->lastPage()): ?>
                    <button class="button load-more" onclick="loadMore('.tab-pane','.tabs-menu-products','product')" title="Load more">Load more</button>
                  <?php endif; ?>
                </div>
                <?php else: ?>
                <?php
                    $data_relationship['id'] = $val_taxonomy->id;
                    $list_product = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['product']);
                ?>
                <div class="tab-pane fade show" id="tabs-item-<?php echo e($val_taxonomy->id); ?>" role="tabpanel" aria-labelledby="tabs-item-<?php echo e($val_taxonomy->id); ?>"
                    tabindex="0"  data-perpage="<?php echo e($list_product->withQueryString()->perPage()); ?>"
                    data-currentpage="<?php echo e($list_product->withQueryString()->currentPage()); ?>"
                    data-taxonomy="<?php echo e($val_taxonomy->id); ?>"
                    data-lastpage="<?php echo e($list_product->withQueryString()->lastPage()); ?>">
                    <div class="tabs-menu-products">
                        <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item">
                            <div class="product-item-image">
                                <img src="<?php echo e($item->image); ?>" alt="Salmon Sushi Combination" title="Salmon Sushi Combination">
                            </div>
                            <p class="product-name"><?php echo e($item->name); ?></p>
                            <p class="product-price">$<?php echo e($item->price); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($list_product->withQueryString()->currentPage() < $list_product->withQueryString()->lastPage()): ?>
                            <button class="button load-more" onclick="loadMore('.tab-pane','.tabs-menu-products','product')" title="Load more">Load more</button>
                     <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/pages/product/category/default.blade.php ENDPATH**/ ?>