<?php if($block): ?>
  <?php
    $layout = isset($block->json_params->layout) && $block->json_params->layout != '' ? $block->json_params->layout : 'default';
  ?>

  <?php if(\View::exists('frontend.blocks.' . $block->block_code . '.styles.' . $layout)): ?>
    <?php echo $__env->make('frontend.blocks.' . $block->block_code . '.styles.' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php else: ?>
    <?php echo e('Style: frontend.blocks.' . $block->block_code . '.styles.' . $layout . ' do not exists!'); ?>

  <?php endif; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/about_block/index.blade.php ENDPATH**/ ?>