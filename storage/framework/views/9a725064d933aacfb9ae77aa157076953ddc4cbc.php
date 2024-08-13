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
    
    <section id="fhm-blogs-tab">
        <div class="container">
          <div class="row">
            <div class="col-12 col-xl-8 col-lg-8 offset-lg-2">
              <div class="blog-tabs-wrapper">
                <h1 class="title text-center">Our blogs</h1>
                <div class="blog-tabs-main">
                  <ul class="blogs-tab d-flex" id="blogs-tab" role="tablist">
                    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index < 1): ?>
                    <li class="blogs-tab-item" role="presentation">
                      <div class="blogs-tab-button active" id="tab-all-tab" data-bs-toggle="tab" data-bs-target="#tab-all"
                        type="button" role="tab" aria-controls="tab-all" aria-selected="true">
                        All Posts
                      </div>
                    </li>
                    <?php else: ?>
                    <li class="blogs-tab-item" role="presentation">
                      <div class="blogs-tab-button" id="tab-tips-tab" data-bs-toggle="tab" data-bs-target="#tab-<?php echo e($val_taxonomy->id); ?>"
                        type="button" role="tab" aria-controls="tab-<?php echo e($val_taxonomy->id); ?>" aria-selected="false">
                        <?php echo e($val_taxonomy->name); ?>

                      </div>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>

                  <div class="tab-content blog-tabs-content" id="blogs-tabContent">
                    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index <1): ?>
                    <div class="tab-pane  fade show active" id="tab-all" role="tabpanel" aria-labelledby="tab-all"
                      tabindex="0" data-perpage="<?php echo e($rows->withQueryString()->perPage()); ?>"
                      data-currentpage="<?php echo e($rows->withQueryString()->currentPage()); ?>"
                      data-taxonomy="<?php echo e($val_taxonomy->id); ?>" data-lastpage="<?php echo e($rows->withQueryString()->lastPage()); ?>">
                      <div class="list-blog">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-item">
                          <div class="blog-item-image">
                            <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item_post->alias ?? ''])); ?>" title="<?php echo e($item_post->name); ?>">
                              <img src="<?php echo e($item_post->image); ?>" alt="<?php echo e($item_post ->name); ?>"
                                title="<?php echo e($item_post->name); ?>" />
                            </a>
                          </div>
                          <div class="blog-item-info">
                            <p class="blogs-category">Art</p>
                            <h3>
                              <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item_post->alias ?? ''])); ?>" title=" B"><?php echo e($item_post->name); ?></a>
                            </h3>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </div>
                      <?php if($rows->withQueryString()->currentPage() < $rows->withQueryString()->lastPage()): ?>
                      <div class="d-block text-center">
                        <button class="button2 load-more " onclick="loadMore('.tab-pane','.list-blog','post')" title="See more">
                          See more
                        </button>
                      </div>
                      <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <?php
                    $data_relationship['id'] = $val_taxonomy->id;
                    $list_posts = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['post']);
                    ?>
                    <div class="tab-pane fade" id="tab-<?php echo e($val_taxonomy->id); ?>" role="tabpanel" aria-labelledby="tab-tips-tab" tabindex="0" data-perpage="<?php echo e($list_posts->withQueryString()->perPage()); ?>"
                        data-currentpage="<?php echo e($list_posts->withQueryString()->currentPage()); ?>"
                        data-taxonomy="<?php echo e($val_taxonomy->id); ?>"
                        data-lastpage="<?php echo e($list_posts->withQueryString()->lastPage()); ?>">
                      <div class="list-blog">
                        <?php $__currentLoopData = $list_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-item">
                          <div class="blog-item-image">
                            <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item->alias ?? ''])); ?>" title="<?php echo e($item->name); ?>">
                              <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->name); ?>"
                                title="<?php echo e($item->name); ?>" />
                            </a>
                          </div>
                          <div class="blog-item-info">
                            <p class="blogs-category">Tips</p>
                            <h3>
                              <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item->alias ?? ''])); ?>" title=" B"><?php echo e($item->name); ?></a>
                            </h3>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                      <div class="d-block text-center">
                        <?php if($list_posts->withQueryString()->currentPage() < $list_posts->withQueryString()->lastPage()): ?>
                        <button class="button2 load-more" onclick="loadMore('.tab-pane','.list-blog','post')" title="See more">
                          See more
                        </button>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('themes/frontend/corner/js/masonry.js')); ?>"></script>

<script src="<?php echo e(asset('themes/frontend/corner/js/blogs.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/pages/post/category/default.blade.php ENDPATH**/ ?>