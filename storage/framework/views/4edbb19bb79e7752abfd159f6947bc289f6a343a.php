
<?php
    $params['status'] = App\Consts::STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::TAXONOMY['post'];
    $rows_post = App\Models\CmsPost::getsqlCmsPost($params)
        ->limit(3)
        ->get();
?>
<div class="header-nav d-none d-lg-flex d-xl-flex">
    <nav>
      <ul class="nav-list">
        <?php
        $menu_childs = $menu->filter(function ($item, $key) use ($component) {
          return $item->parent_id == $component->json_params->menu_id;
        });
      ?>
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
          <div class="mega-menu mega-menu-text position-absolute">
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
                    <a href="<?php echo e($link); ?>" class="nav-item-parent" title="Sushi Dress"><?php echo e($name); ?></a>
                    <ul class="mega-menu-col-child">
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
                      <li class="nav-list">
                        <a href="<?php echo e($link); ?>" title="Sushi Beef"><?php echo e($name); ?></a>
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
                 <?php if(isset($menu_image)): ?>
                <div class="mega-menu-image">
                  <img class="d-block" src="<?php echo e($menu_image->json_params->image); ?>" alt="<?php echo e($menu_image->name); ?>"  title="<?php echo e($menu_image->name); ?>"/>
                  <div class="mega-menu-image-shopnow d-flex align-items-center justify-content-end">
                    <a href="<?php echo e($menu_image->url_link); ?>" title="Book Now"><?php echo e($menu_image->name); ?></a>
                    <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_156_1499)">
                        <path
                          d="M11.937 7.99984C11.6858 7.88884 11.5797 7.75851 11.6323 7.56738C11.6617 7.46044 11.7406 7.35661 11.8217 7.27523C12.547 6.54688 13.2775 5.82383 14.0069 5.09954C14.2426 4.86569 14.4797 4.63309 14.7546 4.36183H14.5239C9.936 4.36183 5.34847 4.36183 0.760624 4.36183C0.641004 4.36183 0.52107 4.36557 0.40145 4.3609C0.16127 4.35092 -0.000624474 4.20032 1.81067e-06 3.99392C0.000628095 3.79437 0.155007 3.6472 0.387672 3.62787C0.43934 3.62351 0.491635 3.62631 0.54393 3.62631C5.19941 3.62631 9.8549 3.62631 14.5101 3.62631H14.7387C14.672 3.55585 14.6319 3.51095 14.5893 3.46886C13.6546 2.53878 12.7198 1.60901 11.7851 0.678615C11.6004 0.494969 11.5703 0.30571 11.6962 0.14233C11.8183 -0.016061 12.0328 -0.0472403 12.1934 0.0728002C12.2432 0.109904 12.289 0.152931 12.3331 0.196582C13.4936 1.34866 14.6541 2.50074 15.8124 3.655C15.8848 3.72702 15.938 3.81775 16 3.89975V4.08621C15.9264 4.17912 15.8616 4.28045 15.7783 4.3637C14.6422 5.49676 13.5046 6.62795 12.3635 7.75602C12.2667 7.85143 12.1424 7.91909 12.0309 7.99953H11.9373L11.937 7.99984Z"
                          fill="black" />
                      </g>
                      <defs>
                        <clipPath id="clip0_156_1499">
                          <rect width="16" height="8" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </li>
        <?php else: ?>
        <li>
          <a class="nav-item" href="<?php echo e($parent_link); ?>" title="Products"><?php echo e($parent_name); ?></a>
          <?php if(count($menu_childs_0)): ?>
          <ul class="nav-list-lv0">
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

        <li> <a class="button-book" href="<?php echo e($menu_image->url_link); ?>" title="<?php echo e($menu_image->name); ?>"><?php echo e($menu_image->name); ?></a></li>
      </ul>
    </nav>

  </div>
  <div class="show-menu-mobile d-block d-xl-none d-lg-none" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#menumobile" aria-controls="menumobile">
    <svg height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
      <g id="_31" data-name="31">
        <path d="m15.5 4h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
        <path d="m15.5 9h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
        <path d="m15.5 14h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
      </g>
    </svg>
  </div>

  <div class="offcanvas offcanvas-start menumobile" tabindex="-1" id="menumobile" aria-labelledby="menumobileLabel">
    <div class="offcanvas-body">
      <nav class="nav-mobile">
        <ul class="nav-list">
            <?php $__currentLoopData = $menu_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $parent_name = $val_menu1->json_params->name->$locale ?? $val_menu1->name ?? '';
              $parent_image = $val_menu1->json_params->image ?? 'themes/frontend/vape/assets/img/no-image.jpg';
              $parent_link = $val_menu1->url_link ?? '#';
              $parent_image_title = $val_menu1->json_params->img_title ?? '#';
              $parent_image_link = $val_menu1->json_params->img_link ?? '#';
              if ($val_menu1->json_params->style == 'image') {
                                                        continue;
                                                    }
              $menu_childs_0 = $menu->filter(function ($item, $key) use ($val_menu1) {
                return $item->parent_id == $val_menu1->id;
              });
            ?>
          <li>
            <a href="<?php echo e($parent_link); ?>" class="nav-item" title="Services"><?php echo e($parent_name); ?></a>
            <?php if($val_menu1->sub > 0): ?>
            <ul class="nav-list-lv0 collapse" id="collapsesubmenu<?php echo e($val_menu1->id); ?>">
                <?php $__currentLoopData = $menu_childs_0; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $menu_childs_2 = $menu->filter(function ($item, $key) use ($item1) {
                            return $item->parent_id == $item1->id;
                        });
                ?>
              <li>
                <a href="<?php echo e($item1->url_link); ?>" class="nav-item" title="Sushi Dress"><?php echo e($item1->name); ?></a>

                <ul class="nav-list-lv1 collapse" id="collapsesubmenulv1-<?php echo e($item1->id); ?>">
                    <?php $__currentLoopData = $menu_childs_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <a href="<?php echo e($item2->url_link); ?>" class="nav-item" title="<?php echo e($item2->name); ?>"><?php echo e($item2->name); ?></a>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <div class="close-sub-nav collapsed" data-bs-toggle="collapse" href="#collapsesubmenulv1-<?php echo e($item1->id); ?>"
                  role="button" aria-expanded="false" aria-controls="collapsesubmenulv1-<?php echo e($item1->id); ?>">
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                    style="enable-background: new 0 0 512 512" xml:space="preserve">
                    <g>
                      <g>
                        <path
                          d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                      </g>
                    </g>

                  </svg>

                  <svg id="svg1591" height="24" viewBox="0 0 6.3499999 6.3500002" width="24"
                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                    <g id="layer1" transform="translate(0 -290.65)">
                      <path id="path2047"
                        d="m.79427278 293.56039a.2646485.2646485 0 0 0 0 .52917h4.76146822a.2646485.2646485 0 0 0 0-.52917z"
                        font-variant-ligatures="normal" font-variant-position="normal" font-variant-caps="normal"
                        font-variant-numeric="normal" font-variant-alternates="normal"
                        font-feature-settings="normal" text-indent="0" text-align="start"
                        text-decoration-line="none" text-decoration-style="solid"
                        text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed"
                        white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal"
                        solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" />
                    </g>
                  </svg>
                </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="close-sub-nav collapsed" data-bs-toggle="collapse" href="#collapsesubmenu<?php echo e($val_menu1->id); ?>" role="button"
              aria-expanded="false" aria-controls="collapsesubmenu<?php echo e($val_menu1->id); ?>">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                style="enable-background: new 0 0 512 512" xml:space="preserve">
                <g>
                  <g>
                    <path
                      d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                  </g>
                </g>

              </svg>

              <svg id="svg1591" height="24" viewBox="0 0 6.3499999 6.3500002" width="24"
                xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                <g id="layer1" transform="translate(0 -290.65)">
                  <path id="path2047"
                    d="m.79427278 293.56039a.2646485.2646485 0 0 0 0 .52917h4.76146822a.2646485.2646485 0 0 0 0-.52917z"
                    font-variant-ligatures="normal" font-variant-position="normal" font-variant-caps="normal"
                    font-variant-numeric="normal" font-variant-alternates="normal" font-feature-settings="normal"
                    text-indent="0" text-align="start" text-decoration-line="none" text-decoration-style="solid"
                    text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed"
                    white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal"
                    solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" />
                </g>
              </svg>
            </div>
            <?php endif; ?>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </nav>
      <a class="button-book" href="<?php echo e($menu_image->url_link); ?>" title="<?php echo e($menu_image->name); ?>"><?php echo e($menu_image->name); ?></a>
    </div>
  </div>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/components/header_default/menu/layout/default.blade.php ENDPATH**/ ?>