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
         <div class="footer-col">
            <h4 class="footer-title"><?php echo e($title); ?></h4>
            <div class="footer-content">
              <ul>
                <?php if($component_childs): ?>
                <?php $__currentLoopData = $component_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                        $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                        $image_childs = $item->image != '' ? $item->image : null;
                        $url_link = $item->json_params->url_link != '' ? $item->url_link : '';
                        $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                    ?>
              <li class="footer-link"><a href="<?php echo e($url_link); ?>" title="<?php echo e($title_childs); ?>"><?php echo e($title_childs); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
              </ul>
            </div>
          </div>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/components/footer_default/footer/layout/social.blade.php ENDPATH**/ ?>