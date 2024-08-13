
<?php
    $params['status'] = App\Consts::STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::TAXONOMY['post'];
    $rows_post = App\Models\CmsPost::getsqlCmsPost($params)
        ->limit(3)
        ->get();
?>

  <?php
  $menu_childs = $menu->filter(function ($item, $key) use ($component) {
    return $item->parent_id == $component->json_params->menu_id;
  });
?>
  <div class="header-nav d-none d-lg-block d-xl-block">
    <nav>
      <ul class="nav-list">
        <?php $__currentLoopData = $menu_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $parent_name = $val_menu1->json_params->name->$locale ?? $val_menu1->name ?? '';
        $parent_image = $val_menu1->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
        $parent_link = $val_menu1->url_link ?? '#';
        $parent_image_title = $val_menu1->json_params->img_title ?? '#';
        $parent_image_link = $val_menu1->json_params->img_link ?? '#';

        $menu_childs_0 = $menu->filter(function ($item, $key) use ($val_menu1) {
          return $item->parent_id == $val_menu1->id;
        });
        if ($val_menu1->json_params->style == 'image') {
                                                        continue;
                                                    }
      ?>
       <?php if(isset($val_menu1->json_params->style) && $val_menu1->json_params->style == 'header-nav-button'): ?>
        <li>
          <a href="<?php echo e($parent_link); ?>" class="<?php echo e($val_menu1->json_params->style == 'menu-image' ? $val_menu1->json_params->style : 'nav-item'); ?>" title="<?php echo e($parent_name); ?>"><?php echo e($parent_name); ?></a>
          <div class="mega-menu position-absolute">
            <div class="container">
              <div class="mega-menu-main d-flex">
                <div class="mega-menu-list d-flex">
                    <?php $__currentLoopData = $menu_childs_0; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $menu_childs_1 = $menu->filter(function ($item, $key) use ($val_menu2) {
                          return $item->parent_id == $val_menu2->id;
                      });
                      $name = $val_menu2->json_params->name->$locale ?? $val_menu2->name ?? '';
                      $link = $val_menu2->url_link ?? '#';
                      $image = $val_menu2->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
                      if ($val_menu2->json_params->style == 'image') {
                                                        continue;
                                             }
                    ?>
                  <div class="mega-menu-col">
                    <a href="<?php echo e($link); ?>" class="nav-item-parent" title="<?php echo e($name); ?>"><?php echo e($name); ?></a>
                    <ul class="mega-menu-list">
                        <?php if($menu_childs_1): ?>
                        <?php $__currentLoopData = $menu_childs_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                            $menu_childs2 = $menu->filter(function ($item, $key) use ($val_menu3) {
                                return $item->parent_id == $val_menu3->id;
                            });
                            $name = $val_menu3->json_params->name->$locale ?? $val_menu3->name ?? '';
                            $link = $val_menu3->url_link ?? '#';
                            $image = $val_menu3->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
                          ?>
                      <li>
                        <a href="<?php echo e($link); ?>" class="nav-item" title="<?php echo e($name); ?>">
                         <?php echo e($name); ?>

                        </a>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </ul>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <?php
                $menu_image = $menu_childs_0->first(function ($item, $key) {
                    return ($item->json_params->style == 'image');
                });
                 ?>
                <div class="mega-menu-image">
                  <img src="<?php echo e($menu_image->json_params->image??''); ?>" alt="FHM" title="FHM" />
                </div>
              </div>
            </div>
          </div>
        </li>
        <?php else: ?>
        <li>
          <a href="<?php echo e($parent_link); ?>" class="nav-item" title="<?php echo e($parent_name); ?>"><?php echo e($parent_name); ?></a>
          <?php if($val_menu1->sub > 0): ?>
          <ul class="nav-list-lv0 position-absolute">
            <?php $__currentLoopData = $menu_childs_0; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $menu_childs1 = $menu->filter(function ($item, $key) use ($val_menu2) {
                  return $item->parent_id == $val_menu2->id;
              });
            ?>
            <li><a href="<?php echo e($val_menu2->url_link); ?>" class="nav-item" title="<?php echo e($val_menu2->json_params->name->$locale ?? $val_menu2->name); ?> "><?php echo e($val_menu2->json_params->name->$locale ?? $val_menu2->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <?php endif; ?>
        </li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </nav>
  </div>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/components/header_default/menu/layout/default.blade.php ENDPATH**/ ?>