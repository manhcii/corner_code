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
        $block_hot = $rows->take(3);
        $block_pich = $rows->random();
    ?>
    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="<?php echo e(route('home.default')); ?>" title="Home" class="breadcrumb-link"><?php echo app('translator')->get('Home'); ?></a>
                <div class="breadcrumb-arrow">
                    <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg')); ?>" alt="Home" title="Home" />
                </div>
                <a href="blog-list.html" title="<?php echo e($page->json_params->name->{$locale} ?? $page->name); ?>" class="breadcrumb-link"><?php echo e($page->json_params->name->{$locale} ?? $page->name); ?></a>
            </div>
        </div>
    </section>
    <main class="page-blog-list">
        <section id="fhm-tabs-blogs" class="tabs-blogs">
            <div class="container">
                <div class="tabs-blogs-head text-center">
                    <span class="sub-title"><?php echo e($page->json_params->name->{$locale} ?? $page->name); ?></span>
                    <h1><?php echo e($page->json_params->description->{$locale}?? $page->description); ?></h1>
                </div>
                <ul class="tabs-blogs-list" id="tabsBlogsList" role="tablist">
                    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index < 1): ?>
                    <li role="presentation">
                        <button class="tab-blogs-button active" data-bs-toggle="tab" data-bs-target="#tab-item-all"
                            type="button" role="tab" aria-controls="tab-item-all" aria-selected="true">All</button>
                    </li>
                    <?php else: ?>
                    <li role="presentation">
                        <button class="tab-blogs-button" data-bs-toggle="tab" data-bs-target="#tab-item-<?php echo e($val_taxonomy->id); ?>"
                            type="button" role="tab" aria-controls="tab-item-<?php echo e($val_taxonomy->id); ?>"
                            aria-selected="false"><?php echo e($val_taxonomy->name); ?></button>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tab-content tabs-blogs-content" id="tabsBlogsContent">
                    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index <1): ?>
                    <div class="tab-pane fade show active"  id="tab-item-all" role="tabpanel" aria-labelledby="tab-item-all"data-perpage="<?php echo e($rows->withQueryString()->perPage()); ?>"
                        data-currentpage="<?php echo e($rows->withQueryString()->currentPage()); ?>"
                        data-taxonomy="<?php echo e($val_taxonomy->id); ?>" data-lastpage="<?php echo e($rows->withQueryString()->lastPage()); ?>">
                        <div class="tab-blogs-grid">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blog-item">
                                <div class="blog-item-image">
                                    <img src="<?php echo e($item_post->image ?? ''); ?>"
                                    alt="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>"
                                    title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>" />
                                </div>
                                <div class="blog-item-info">
                                    <p class="blog-item-date"><?php echo e(date('M d, Y', strtotime($item_post->created_at))); ?></p>
                                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item_post->alias ?? ''])); ?>" title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>">
                                        <?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>

                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if($rows->withQueryString()->currentPage() < $rows->withQueryString()->lastPage()): ?>

                        <button class="button load-more"  onclick="loadMore('.tab-pane','.tab-blogs-grid','post')" title="Load more">Load more</button>
                    <?php endif; ?>

                    </div>
                    <?php else: ?>
                    <?php
                        $data_relationship['id'] = $val_taxonomy->id;
                        $list_posts = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['post']);
                    ?>

                    <div class="tab-pane fade show"  id="tab-item-<?php echo e($val_taxonomy->id); ?>" role="tabpanel" aria-labelledby="tab-item-<?php echo e($val_taxonomy->id); ?>" data-perpage="<?php echo e($list_posts->withQueryString()->perPage()); ?>"
                        data-currentpage="<?php echo e($list_posts->withQueryString()->currentPage()); ?>"
                        data-taxonomy="<?php echo e($val_taxonomy->id); ?>"
                        data-lastpage="<?php echo e($list_posts->withQueryString()->lastPage()); ?>">
                        <div class="tab-blogs-grid">
                            <?php $__currentLoopData = $list_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blog-item">
                                <div class="blog-item-image">
                                    <img src="<?php echo e($item_post->image ?? ''); ?>"
                                    alt="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>"
                                    title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>" />
                                </div>
                                <div class="blog-item-info">
                                    <p class="blog-item-date"><?php echo e(date('M d, Y', strtotime($item_post->created_at))); ?></p>
                                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item_post->alias ?? ''])); ?>" title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>">
                                        <?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>

                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if($list_posts->withQueryString()->currentPage() < $list_posts->withQueryString()->lastPage()): ?>

                        <button class="button load-more"  onclick="loadMore('.tab-pane','.tab-blogs-grid','post')" title="Load more">Load more</button>
                    <?php endif; ?>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    </main>
    <section id="fhm-featured-topics" class="featured-topics">
        <div class="featured-topics-left">
            <div class="container">
                <h3><?php echo app('translator')->get('Featured Topics'); ?></h3>
                <div class="featured-topics-main">
                    <?php $__currentLoopData = $block_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="featured-item">
                        <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->name); ?>" title="<?php echo e($item->name); ?>">
                        <div class="featured-item-info">
                            <p class="featured-item-date"><?php echo e(date('M d, Y', strtotime($item->created_at))); ?></p>
                            <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item->alias ?? ''])); ?>" title="<?php echo e($item->name); ?>">
                               <?php echo e($item->name); ?>


                            </a>
                            <p class="featured-item-des">
                                <?php echo e($item->json_params->brief->{$locale} ?? $item->brief); ?>

                            </p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="featured-topics-right">
            <img src="<?php echo e(asset('./themes/frontend/assets/image/page-blog-list-image2.png')); ?>" alt="Featured Topics" title="Featured Topics">
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/pages/post/category/default.blade.php ENDPATH**/ ?>