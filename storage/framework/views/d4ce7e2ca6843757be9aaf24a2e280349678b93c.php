<?php $__env->startSection('content'); ?>
    <?php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $title = $detail->json_params->name->{$locale} ?? $detail->name;
        $image = $detail->image ?? '';
        $time = date('M d, Y', strtotime($detail->created_at));
        $content = $detail->json_params->content->{$locale} ?? 'Chưa cập nhật';
        $category = $taxonomys->first(function ($item, $key) use ($relationship) {
            return in_array($item->id, $relationship);
        });
        $link = route('frontend.page', ['taxonomy' => $detail->alias ?? '']);
    ?>

    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="<?php echo e(route('home.default')); ?>" title="Home" class="breadcrumb-link"><?php echo app('translator')->get('Home'); ?></a>
                <div class="breadcrumb-arrow">
                    <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg')); ?>" alt="Home" title="Home" />
                </div>
                <a href="blog-list.html" title="Blog" class="breadcrumb-link"><?php echo e($category->name); ?></a>
                <div class="breadcrumb-arrow">
                    <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/breadcrumb-arrow.svg')); ?>" alt="Home" title="Home" />
                </div>
                <a href="blog-detail.html" title="<?php echo e($detail->name); ?>" class="breadcrumb-link"><?php echo e($detail->name); ?></a>
            </div>
        </div>
    </section>
    <main class="page-blog-detail">
        <div class="container">
            <div class="blog-detail-wrap d-flex">
                <div class="blog-detail-left">
                    <div class="blog-detail-content">
                        <h1><?php echo e($title); ?></h1>

                        <div class="blog-detail-post d-flex">
                            <p class="blog-detail-author"><?php echo app('translator')->get('By'); ?>:<?php echo e($detail->admin_name); ?></p>
                            <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/blog-detail-elipse.svg')); ?>" alt="FlavorFul Fusion's">
                            <p class="blog-detail-date"><?php echo e($time); ?></p>
                        </div>

                        <div class="blog-detail-tags">
                            <?php if(isset($detail->json_params->paramater->tag) && count($detail->json_params->paramater->tag) > 0): ?>
                                <?php $__currentLoopData = $detail->json_params->paramater->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="blog-list.html" title="technology">#<?php echo e($item); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </div>

                        <?php echo $detail->json_params->content->{$locale} ?? $detail->content; ?>

                    </div>

                    <div class="blog-share d-flex" id="blog-share" title="SHARE">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($link); ?>" class="blog-share-button">
                            <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/share-all.svg')); ?>" alt="Share" title="Share">
                            <span><?php echo app('translator')->get('SHARE'); ?></span>
                        </a>

                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($link); ?>" class="blog-share-button" title="SHARE FACEBOOK">
                            <img src="<?php echo e(('./themes/frontend/assets/image/icons/share-facebook.svg')); ?>" alt="Share Facebook" title="Share Facebook">
                            <span><?php echo app('translator')->get('FACEBOOK'); ?></span>
                        </a>

                        <a  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($link); ?>" class="blog-share-button" title="SHARE PINTEREST">
                            <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/share-pinterest.svg')); ?>" alt="Share Pinterest" title="Share Pinterest">
                            <span><?php echo app('translator')->get('PINTEREST'); ?></span>
                        </a>

                        <a  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($link); ?>" class="blog-share-button" title="SHARE INSTAGRAM">
                            <img src="<?php echo e(asset('./themes/frontend/assets/image/icons/share-instagram.svg')); ?>" alt="Share Instagram" title="Share Instagram">
                            <span><?php echo app('translator')->get('INSTAGRAM'); ?> </span>
                        </a>
                    </div>
                </div>

                <div class="blog-related">
                    <h3><?php echo app('translator')->get('# Latest Articles'); ?></h3>
                    <div class="swiper blog-related-list">
                        <div class="swiper-wrapper">
                          <?php if(isset($feature) && count($feature)>0): ?>
                          <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="swiper-slide">
                            <div class="blog-item">
                                <div class="blog-item-image">
                                    <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->name); ?>" title="<?php echo e($item->name); ?>">
                                </div>
                                <div class="blog-item-info">
                                    <p class="blog-item-date"><?php echo e(date('M d, Y', strtotime($item->created_at))); ?></p>
                                    <a href="<?php echo e($item->alias); ?>" title="<?php echo e($item->name); ?>">
                                        <?php echo e($item->name); ?>

                                    </a>
                                    <p class="blog-item-des">
                                        <?php echo e($item->json_params->brief->{$locale} ?? $item->brief); ?>

                                    </p>
                                </div>
                            </div>
                          </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </main>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/pages/post/detail/default.blade.php ENDPATH**/ ?>