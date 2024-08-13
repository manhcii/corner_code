<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'vi'); ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo e($page->json_params->name->$locale ?? ($page->name ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? ''))))); ?>

    </title>
    <link rel="icon" href="<?php echo e(json_decode($setting->image)->favicon ?? ''); ?>" type="image/x-icon">
    
    <?php

        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));

    ?>
    <meta name="description" content="<?php echo e($seo_description); ?>" />
    <meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
    <meta name="news_keywords" content="<?php echo e($seo_keyword); ?>" />
    <meta property="og:image" content="<?php echo e($seo_image); ?>" />
    <meta property="og:title" content="<?php echo e($seo_title); ?>" />
    <meta property="og:description" content="<?php echo e($seo_description); ?>" />
    <meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />
    
    
    <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldPushContent('style'); ?>

</head>

<body class="page">
    <div id="page" class="hfeed page-wrapper">

        <?php if(isset($widget->header)): ?>
            <?php if(\View::exists('frontend.widgets.header.' . $widget->header->json_params->layout)): ?>
                <?php echo $__env->make('frontend.widgets.header.' . $widget->header->json_params->layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo e('View: frontend.widgets.header.' . $widget->header->json_params->layout . ' do not exists!'); ?>

            <?php endif; ?>
        <?php endif; ?>

        <div id="site-main" class="site-main">
            <div id="main-content" class="main-content">
                <div id="primary" class="content-area">
                    <div id="title" class="page-title">
                        <div class="section-container">
                            <div class="content-title-heading">
                                <h1 class="text-title-heading">
                                    Shopping Cart
                                </h1>
                            </div>
                            <div class="breadcrumbs">
                                <a href="/">Home</a><span class="delimiter"></span>Shopping Cart
                            </div>
                        </div>
                    </div>

                    <div id="content" class="site-content" role="main">
                        <div class="section-padding">
                            <div class="section-container p-l-r">

                                <?php if(session('cart')): ?>
                                    <div class="woocommerce-page-header">
                                        <ul>
                                            <li class="shopping-cart-link line-hover active">
                                                <a href="<?php echo e(route('frontend.order.cart')); ?>">Shopping Cart<span
                                                        class="cart-count">(1)</span></a>
                                            </li>
                                            <li class="checkout-link line-hover "><a
                                                    href="<?php echo e(route('frontend.order.checkout')); ?>">Checkout</a></li>
                                            <li class="order-tracking-link"><a
                                                    href="<?php echo e(route('frontend.order.checkout')); ?>">Order Tracking</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="shop-cart">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                                                <form class="cart-form" action="" method="post">
                                                    <div class="table-responsive">
                                                        <table class="cart-items table" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-thumbnail"><?php echo app('translator')->get('Product'); ?></th>
                                                                    <th class="product-price"><?php echo app('translator')->get('Price'); ?></th>
                                                                    <th class="product-quantity"><?php echo app('translator')->get('Quantity'); ?></th>
                                                                    <th class="product-subtotal"><?php echo app('translator')->get('Subtotal'); ?></th>
                                                                    <th class="product-remove">&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $total = 0 ?>

                                                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $items_cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php $__currentLoopData = $items_cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $total += $details['price'] * $details['quantity'];
                                                                        ?>
                                                                        <tr data-id='<?php echo e($details['id']); ?>' data-arr="<?php echo e($key); ?>"
                                                                            class="cart-item">
                                                                            <td class="product-thumbnail">
                                                                                <a
                                                                                    href="<?php echo e(route('frontend.page', ['taxonomy' => $details['alias'] ?? ''])); ?>">
                                                                                    <img width="600" height="600"
                                                                                        src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>"
                                                                                        class="product-image"
                                                                                        alt="<?php echo e($details['title']); ?>">
                                                                                </a>
                                                                                <div class="product-name ssssss">
                                                                                    <a
                                                                                        href="<?php echo e(route('frontend.page', ['taxonomy' => $details['alias'] ?? ''])); ?>"><?php echo e($details['title']); ?></a>

                                                                                    <div>
                                                                                        <span
                                                                                            class="size"><?php echo app('translator')->get('Size'); ?>:
                                                                                            <?php echo e($details['size'] ? $details['size'] : ''); ?>

                                                                                        </span>
                                                                                        <span
                                                                                            class="color ml-2"><?php echo app('translator')->get('Color'); ?>:
                                                                                            <span class="box_bg_color"
                                                                                                style="background-color: <?php echo e($details['color'] ? $details['color'] : ''); ?>"></span></span>

                                                                                    </div>
                                                                                </div>


                                                                            </td>
                                                                            <td class="product-price">
                                                                                <span class="price">$<span
                                                                                        class="price_num"><?php echo e(number_format($details['price'], 2)); ?></span></span>
                                                                            </td>
                                                                            <td class="product-quantity">
                                                                                <div class="quantity">
                                                                                    <button type="button"
                                                                                        class="minus">-</button>
                                                                                    <input type="number"
                                                                                        class="qty update-cart"
                                                                                        step="1" min="0"
                                                                                        max="" name="quantity"
                                                                                        value="<?php echo e($details['quantity']); ?>"
                                                                                        title="Qty" size="4"
                                                                                        placeholder=""
                                                                                        inputmode="numeric"
                                                                                        autocomplete="off">
                                                                                    <button type="button"
                                                                                        class="plus">+</button>
                                                                                </div>
                                                                            </td>
                                                                            <td class="product-subtotal">
                                                                                <span>$<?php echo e(number_format($details['price'] * $details['quantity'], 2)); ?></span>
                                                                            </td>
                                                                            <td class="product-remove">
                                                                                <a href="#"
                                                                                    data-id='<?php echo e($details['id']); ?>'
                                                                                    data-arr='<?php echo e($key); ?>'
                                                                                    class="remove remove-card">×</a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                                                <div class="cart-totals">
                                                    <h2>Cart totals</h2>
                                                    <div>
                                                        <div class="cart-subtotal">
                                                            <div class="title">Subtotal</div>
                                                            <div><span>$<?php echo e(number_format($total, 2)); ?></span></div>
                                                        </div>

                                                        <div class="order-total">
                                                            <div class="title">Total</div>
                                                            <div><span>$<?php echo e(number_format($total, 2)); ?></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="proceed-to-checkout">
                                                        <a href="<?php echo e(route('frontend.order.checkout')); ?>"
                                                            class="checkout-button button">
                                                            Proceed to checkout
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="shop-cart-empty">
                                        <div class="notices-wrapper">
                                            <p class="cart-empty">Your cart is currently empty.</p>
                                        </div>
                                        <div class="return-to-shop">
                                            <a class="button" href="/">
                                                Return to shop
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div><!-- #main-content -->
        </div>

        <?php if(isset($widget->footer)): ?>
            <?php if(\View::exists('frontend.widgets.footer.' . $widget->footer->json_params->layout)): ?>
                <?php echo $__env->make('frontend.widgets.footer.' . $widget->footer->json_params->layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo e('View: frontend.widgets.footer.' . $widget->footer->json_params->layout . ' do not exists!'); ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <?php echo $__env->make('frontend.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.components.sticky.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldPushContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/pages/cart/default.blade.php ENDPATH**/ ?>