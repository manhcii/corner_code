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
    ?>
<section id="fhm-our-product" class="our-product">
    <div class="container">
        <div class="our-product-content text-center">
            <span class="sub-title"><?php echo e($title); ?></span>
            <h3><?php echo e($brief); ?></h3>
        </div>
    </div>
    <div class="container position-relative">
        <div class="swiper our-product-swiper">
            <div class="swiper-wrapper">
            <?php if($rows): ?>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php
                     $title_product =  $item->json_params->name->{$locale} ?? $item->name;
                     $image_product = $item->image ?? '';
                 ?>
              <div class="swiper-slide">
                <div class="product-item">
                    <div class="product-item-image">
                        <img src="<?php echo e($image_product); ?>" alt="<?php echo e($title_product); ?>" title="<?php echo e($title_product); ?>">
                    </div>
                    <p class="product-name"><?php echo e($title_product); ?></p>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>

        </div>

        <div class="swiper-button-prev">
            <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 1L2 13L14 22.6" stroke="#CF3031" stroke-width="2"/>
            </svg>
        </div>
        <div class="swiper-button-next">
            <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L13 13L1 22.6" stroke="#CF3031" stroke-width="2"/>
            </svg>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>