<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->limit(4)
            ->get();

    ?>


<section id="fhm-home-blog" class="home-blog">
    <div class="container position-relative">
      <div class="home-blog-content">
        <span class="sub-title"><?php echo e($title); ?></span>
        <h3><?php echo e($brief); ?></h3>
      </div>

      <div class="swiper home-blog-swiper">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $title_child = $item->json_params->name->{$locale} ?? $item->name;
                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                $image_child = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : 'data/images/no_image.jpg');
                $time = date('d.M.Y', strtotime($item->updated_at));
                $alias = $item->alias ?? '';

            ?>

          <div class="swiper-slide">
            <div class="blog-item">
              <div class="blog-item-image">
                <img src="<?php echo e($image_child); ?>" alt="Sushi protection in against good" title="Sushi protection in against good">
              </div>
              <div class="blog-item-info">
                <a href="<?php echo e($alias); ?>" title="Sushi protection in against good  ">
                  <?php echo e($title_child); ?>

                </a>
                <p class="blog-item-des">
                    <?php echo e($brief); ?>

                </p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="swiper-button-prev swiper-circle">
        <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14 1L2 13L14 22.6" stroke="#727272" stroke-width="2"/>
        </svg>
      </div>
      <div class="swiper-button-next swiper-circle">
        <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 22.6008L13 10.6008L1 1.00083" stroke="#727272" stroke-width="2"/>
        </svg>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>