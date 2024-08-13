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
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
<section id="fhm-instagram" class="instagram" style="background: url('<?php echo e($image_background); ?>') no-repeat;background-size: cover">
    <div class="container">
      <div class="instagram-content text-center">
        <h3><?php echo e($title); ?></h3>
        <a href="<?php echo e($setting->instagram_url); ?>" class="button" title='Flow Instagram FlavorFul.Fusion'>
          <?php echo e($brief); ?>

          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9875 18.5363C22.9875 19.9388 22.4997 21.1582 21.646 22.0119C20.7924 22.8655 19.5729 23.2924 18.2315 23.2924H11.5852C10.2438 23.2924 9.02427 22.8655 8.17062 22.0119C7.256 21.1582 6.82917 19.9388 6.82917 18.5363V11.8291C6.82917 9.02427 8.71939 7.07307 11.5852 7.07307H18.2924C19.6949 7.07307 20.8534 7.56087 21.707 8.41452C22.5607 9.26817 22.9875 10.4267 22.9875 11.8291V18.5363ZM18.2314 8.53662H11.5241C10.5485 8.53662 9.6949 8.84149 9.14613 9.39027C8.59735 9.93904 8.29248 10.7927 8.29248 11.7683V18.4755C8.29248 19.4511 8.59735 20.3048 9.2071 20.9145C9.81685 21.4633 10.6095 21.7681 11.5851 21.7681H18.2314C19.207 21.7681 20.0606 21.4633 20.6094 20.9145C21.2191 20.3657 21.524 19.5121 21.524 18.5365V11.8293C21.524 10.8537 21.2191 10.061 20.6704 9.45124C20.0606 8.84149 19.2679 8.53662 18.2314 8.53662Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7315 15.1219C10.7315 17.378 12.5607 19.2682 14.8778 19.2682C17.1948 19.2682 19.085 17.4389 19.085 15.1219C19.085 12.8049 17.1338 10.9756 14.8778 10.9756C12.6217 10.9756 10.7315 12.8049 10.7315 15.1219ZM14.8777 17.8045C16.3594 17.8045 17.5606 16.6033 17.5606 15.1216C17.5606 13.6399 16.3594 12.4387 14.8777 12.4387C13.396 12.4387 12.1948 13.6399 12.1948 15.1216C12.1948 16.6033 13.396 17.8045 14.8777 17.8045Z" fill="white"/>
            <path d="M18.2314 10.7927C18.2314 11.3415 18.6582 11.7683 19.207 11.7683C19.7557 11.7683 20.1826 11.3415 20.1826 10.7927C20.1826 10.2439 19.7557 9.81709 19.207 9.81709C18.6582 9.81709 18.2314 10.2439 18.2314 10.7927Z" fill="white"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="instagram-image">
        <div class="instagram-image-one">
            <?php if(count($gallery_image) > 0): ?>
                <?php $__currentLoopData = array_slice($gallery_image, 0, 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="instagram-image-item">
                        <img src="<?php echo e($val_image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="instagram-image-two">
            <?php if(count($gallery_image) > 6): ?>
                <?php $__currentLoopData = array_slice($gallery_image, 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_child_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="instagram-image-item">
                        <img src="<?php echo e($val_child_image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/custom/styles/block_instagram.blade.php ENDPATH**/ ?>