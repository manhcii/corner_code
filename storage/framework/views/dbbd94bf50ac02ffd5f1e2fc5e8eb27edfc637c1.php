<?php if($component): ?>
    <?php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });
    ?>

<div class="header-logo">
    <a href="<?php echo e(route('home.default')); ?>" title="FlavorFul Fusion">
      <img src="<?php echo e($image); ?>" alt="Furnish Haven" title="FlavorFul Fusion">
    </a>
  </div>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/components/header_default/header/layout/image.blade.php ENDPATH**/ ?>