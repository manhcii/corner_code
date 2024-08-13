<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $params['user_id'] = $user_auth->id ?? '';
        // list product
        $rows = App\Models\CmsProduct::getsqlCmsProduct($params)
            ->limit(10)
            ->get();
            $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
    ?>
 <section id="fhm-popular-products">
    <div class="container">
      <div class="popular-content text-center">
        <h3 class="title popular-title"><?php echo e($title); ?></h3>
        <p class="sub-content">
          <?php echo e($brief); ?>

        </p>
      </div>
      <div class="popular-main">
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
        <div class="popular-item">
          <img src="<?php echo e($image); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>"/>
          <div class="popular-item-content">
            <div class="popular-item-name">
              <h4><a href="<?php echo e($url_link_childs); ?>" title="<?php echo e($title_childs); ?>"><?php echo e($title_childs); ?></a></h4>
              <span>160 items</span>
            </div>
            <a class="popular-item-button" href="<?php echo e($url_link_childs); ?>" title="<?php echo e($title_childs); ?>">
              <svg
                width="34"
                height="35"
                viewBox="0 0 34 35"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M11.3431 11.8431L11.3431 13.8372L19.2415 13.8443L10.636 22.4497L12.0502 23.864L20.6557 15.2585L20.6628 23.1569L22.6568 23.1569L22.6568 11.8431L11.3431 11.8431Z"
                  fill="#769496"
                />
              </svg>
            </a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>