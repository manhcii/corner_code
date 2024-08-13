<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $video = $block->json_params->video ?? null;
    $video_background = $block->json_params->video_background ?? null;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
 <div class="footer-info">
    <p><?php echo app('translator')->get('Address:'); ?> <?php echo e($setting->address); ?></p>
    <p><?php echo app('translator')->get('Phone:'); ?> <a href="tel:<?php echo e($setting->phone); ?>" title="Gọi ngay"><?php echo e($setting->phone); ?></a></p>
    <p><?php echo app('translator')->get('Email:'); ?> <a href="mailto:<?php echo e($setting->email); ?>" title="Gửi email"><?php echo e($setting->email); ?></a></p>
  </div>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/components/footer_default/footer/layout/custom.blade.php ENDPATH**/ ?>