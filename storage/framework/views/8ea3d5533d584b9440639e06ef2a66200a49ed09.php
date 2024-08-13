
<?php if(isset($taxonomys)): ?>
<div class="products-filter-item">
    <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
        aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#filter-categories">
        <h2 class="heading"><?php echo e($component->title); ?></h2>
        <div class="icon position-relative">
            <div class="line position-absolute">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="11" width="12" height="2" fill="#818181" />
                </svg>
            </div>
            <div class="line position-absolute">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="11" width="12" height="2" fill="#818181" />
                </svg>
            </div>
        </div>
    </div>
    <div id="filter-categories" class="collapse show">
        <ul class="products-filter-item-criteria" data-type="checkbox">
            <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $item->alias ?? ''])); ?>">
            <li>

                    <div class="checkbox" data-status="uncheck"></div>
                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $item->alias ?? ''])); ?>">
                <p class="text">
                    <?php echo e($item->json_params->name->$locale??$item->name); ?> <span class="quantity">(<?php echo e($item->count_post); ?>)</span>
                </p>

            </li>
        </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="clear-button">
            <div class="icon">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 3.4427C3.05293 3.27897 3.13232 3.13515 3.29773 3.05771C3.49401 2.96478 3.67926 2.98469 3.85349 3.11302C3.89319 3.14179 3.92847 3.1794 3.96376 3.2148C5.11939 4.37419 6.27501 5.53357 7.43285 6.69296C7.45711 6.7173 7.48357 6.74164 7.52547 6.78368C7.54973 6.75049 7.56517 6.7173 7.58943 6.69296C8.74947 5.52472 9.91171 4.3587 11.074 3.19489C11.2791 2.98912 11.5172 2.94708 11.7444 3.07098C12.0245 3.22586 12.1017 3.602 11.9054 3.85423C11.8745 3.89406 11.8392 3.92946 11.8039 3.96486C10.6483 5.12425 9.49269 6.28363 8.33706 7.44302C8.3128 7.46736 8.28413 7.48727 8.2312 7.52931C8.27751 7.56029 8.31059 7.57577 8.33485 7.60233C9.4971 8.76835 10.6593 9.93216 11.8216 11.0982C12.0311 11.3084 12.073 11.5584 11.9385 11.7863C11.8569 11.9257 11.7245 11.9965 11.5768 12.0452C11.5172 12.0452 11.4599 12.0452 11.4004 12.0452C11.2327 12.0053 11.1137 11.8947 10.9968 11.7752C9.86099 10.6335 8.723 9.49407 7.58722 8.35239C7.56296 8.32805 7.54753 8.29486 7.51445 8.2484C7.47254 8.29928 7.45269 8.32805 7.42844 8.35239C6.29266 9.49407 5.15467 10.6335 4.01889 11.7752C3.90201 11.8925 3.78292 12.0031 3.61531 12.0452C3.55576 12.0452 3.49842 12.0452 3.43887 12.0452C3.39256 12.0275 3.34625 12.012 3.30214 11.9899C3.13453 11.9124 3.05072 11.7708 3 11.6027C3 11.5429 3 11.4854 3 11.4256C3.0419 11.2575 3.14997 11.138 3.26906 11.0207C4.40704 9.88127 5.54282 8.73959 6.68081 7.60011C6.70507 7.57577 6.73815 7.56029 6.78446 7.5271C6.73374 7.48506 6.70507 7.46515 6.68081 7.44081C5.54282 6.30133 4.40704 5.15965 3.26906 4.02018C3.15217 3.90291 3.0419 3.78343 3 3.61528C3 3.55996 3 3.50022 3 3.4427Z"
                        fill="black" />
                </svg>
            </div>
            <p class="text">Clear All</p>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/components/sidebar_product/paramater/layout/categories.blade.php ENDPATH**/ ?>