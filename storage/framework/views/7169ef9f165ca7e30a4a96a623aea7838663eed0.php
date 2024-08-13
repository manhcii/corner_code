<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $icon = $block->icon ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section id="fhm-milestone" class="milestone" style="background: url('<?php echo e($image_background); ?>') no-repeat;background-size: cover">
        <div class="container">
            <div class="milestone-head text-center">
                <span class="sub-title"><?php echo e($title); ?></span>
                <h3><?php echo e($brief); ?></h3>
            </div>

            <div class="milestone-main">
                <div class="milestone-year" id="milestoneYear" role="tablist">
                    <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_childs = $items->json_params->title->{$locale} ?? $items->title;
                        $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                        $content_childs = $items->json_params->content->{$locale} ?? $items->content;
                        $image_childs = $items->image != '' ? $items->image : null;
                        $image_background_childs = $items->image_background != '' ? $items->image_background : null;
                        $url_link_childs = $items->url_link != '' ? $items->url_link : '';
                        $url_link_childs_title = $items->json_params->url_link_title->{$locale} ?? $items->url_link_title;
                        $icon_childs = $items->icon ?? '';
                        $gallery_image_childs = $items->json_params->gallery_image ?? '';

                    ?>
                    <?php if($loop->index < 1): ?>
                    <button  class="milestone-year-item active" role="presentation" id="milestone-<?php echo e($items->id); ?>" data-bs-toggle="tab" data-bs-target="#milestone-time-<?php echo e($items->id); ?>" type="button" role="tab" aria-controls="milestone-time-<?php echo e($items->id); ?>" aria-selected="true">
                    <span><?php echo e($title_childs); ?></span>
                    </button>
                    <?php else: ?>
                    <button class="milestone-year-item" role="presentation" id="milestone-<?php echo e($items->id); ?>" data-bs-toggle="tab" data-bs-target="#milestone-time-<?php echo e($items->id); ?>" type="button" role="tab" aria-controls="milestone-time-<?php echo e($items->id); ?>" aria-selected="true">
                        <span><?php echo e($title_childs); ?></span>
                        </button>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <div class="tab-content milestones-content" id="milestoneDes">
                    <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_childs = $items->json_params->title->{$locale} ?? $items->title;
                            $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                            $content_childs = $items->json_params->content->{$locale} ?? $items->content;
                            $image_childs = $items->image != '' ? $items->image : null;
                            $image_background_childs = $items->image_background != '' ? $items->image_background : null;
                            $url_link_childs = $items->url_link != '' ? $items->url_link : '';
                            $url_link_childs_title = $items->json_params->url_link_title->{$locale} ?? $items->url_link_title;
                            $icon_childs = $items->icon ?? '';
                            $gallery_image_childs = $items->json_params->gallery_image ?? '';
                            $block_item_childs = $blocks->filter(function ($item, $key) use ($items) {
                            return $item->parent_id == $items->id;
                             });
                        ?>
                    <?php if($loop->index <1): ?>
                    <div class="milestone-content tab-pane fade show active" id="milestone-time-<?php echo e($items->id); ?>" role="tabpanel" aria-labelledby="milestone-<?php echo e($items->id); ?>" tabindex="0">

                        <div class="swiper milestone-content-swiper">
                          <div class="swiper-wrapper">
                            <?php $__currentLoopData = $block_item_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_items_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_items_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_items_childs = $item->json_params->content->{$locale} ?? $item->content;
                            ?>
                            <div class="swiper-slide milestone-content-item">
                                <p class="milestone-content-date"><?php echo e($title_items_childs); ?></p>
                                <p><?php echo e($brief_items_childs); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        </div>

                        <div class="swiper-button-prev swiper-circle">
                            <img src="./themes/frontend/assets/image/icons/button-prev-icon.svg" alt="Prev" title="Prev">
                          </div>
                          <div class="swiper-button-next swiper-circle">
                            <img src="./themes/frontend/assets/image/icons/button-next-icon.svg" alt="Next" title="Next">
                          </div>
                    </div>
                    <?php else: ?>
                    <div class="milestone-content tab-pane fade show" id="milestone-time-<?php echo e($items->id); ?>" role="tabpanel" aria-labelledby="milestone-<?php echo e($items->id); ?>" tabindex="0">

                        <div class="swiper milestone-content-swiper">
                          <div class="swiper-wrapper">
                            <?php $__currentLoopData = $block_item_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_items_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_items_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_items_childs = $item->json_params->content->{$locale} ?? $item->content;
                            ?>
                            <div class="swiper-slide milestone-content-item">
                                <p class="milestone-content-date"><?php echo e($title_items_childs); ?></p>
                                <p><?php echo e($brief_items_childs); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        </div>

                        <div class="swiper-button-prev swiper-circle">
                            <img src="./themes/frontend/assets/image/icons/button-prev-icon.svg" alt="Prev" title="Prev">
                          </div>
                          <div class="swiper-button-next swiper-circle">
                            <img src="./themes/frontend/assets/image/icons/button-next-icon.svg" alt="Next" title="Next">
                          </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  </div>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\flavor-fusion\resources\views/frontend/blocks/about_block/styles/memorable.blade.php ENDPATH**/ ?>