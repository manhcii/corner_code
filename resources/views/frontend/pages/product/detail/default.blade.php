@extends('frontend.layouts.default')

@section('content')
    @php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $link = route('frontend.page', ['taxonomy' => $detail->alias ?? '']);

        $page_title = $detail->json_params->name->{$locale} ?? $detail->name;
        $page_brief = $detail->json_params->brief->{$locale} ?? $detail->brief;
        $page_description = $detail->json_params->description->{$locale} ?? $detail->description;
        $page_content = $detail->json_params->content->{$locale} ?? $detail->content;
        $page_image = $detail->image != '' ? $detail->image : $setting->background_breadcrumbs;
        $page_backgroud = $detail->image_thumb != '' ? $detail->image_thumb : $setting->background_breadcrumbs;

    @endphp
    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="{{ route('home.default') }}" title="Home" class="breadcrumb-link">Home</a>
                <div class="breadcrumb-arrow">
                    <svg width="6" height="14" viewBox="0 0 6 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                            fill="#979797" />
                    </svg>
                </div>
                <a href="#" title="Products" class="breadcrumb-link">Products</a>
                <div class="breadcrumb-arrow">
                    <svg width="6" height="14" viewBox="0 0 6 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                            fill="#979797" />
                    </svg>
                </div>
                <a href="#" title="Living Room" class="breadcrumb-link">Living Room</a>
            </div>
        </div>
    </section>

    <!-- START PRODUCT DETAIL -->
    <section id="fhm-product-detail">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="product-detail-image-wrapper d-flex align-items-start">
                        <div class="thumbs-image order-2 order-xl-1">
                            <div class="swiper thumb-image-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-1.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-2.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-3.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-4.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-5.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                </div>
                                <div class="swiper-button-prev">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"
                                            fill="#769496" />
                                    </svg>
                                </div>
                                <div class="swiper-button-next">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"
                                            fill="#769496" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="large-image order-1 order-xl-2">
                            <div class="swiper large-image-swiper text-center">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-1.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-2.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-3.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-4.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./themes/frontend/corner/assets/product-5.png" alt="Colin King Kirkwood Sofa Vintage "
                                            title="Colin King Kirkwood Sofa Vintage " />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-xl-block d-lg-block">
                        <div class="product-detail-tab-wrapper">
                            <ul class="product-detail-tab-list d-flex align-items-center" id="productDetailTab"
                                role="tablist">
                                <li class="product-detail-tab-item active" id="product-tab-detail-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-detail" role="tab"
                                    aria-controls="product-tab-detail" aria-selected="true">
                                    <p class="text">Details</p>
                                </li>

                                <li class="product-detail-tab-item" id="product-tab-shipping-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-shipping" role="tab"
                                    aria-controls="product-tab-shipping" aria-selected="false">
                                    <p class="text">Shipping</p>
                                </li>

                                <li class="product-detail-tab-item" id="product-tab-return-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-return" role="tab"
                                    aria-controls="product-tab-return" aria-selected="false">
                                    <p class="text">Returns</p>
                                </li>

                                <li class="product-detail-tab-item" id="product-tab-review-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-review" role="tab"
                                    aria-controls="product-tab-review" aria-selected="false">
                                    <p class="text">Reviews</p>
                                </li>


                            </ul>
                            <div class="product-detail-tab-content tab-content" id="productDetailTabContent">
                                <div class="tab-pane fade show active" id="product-tab-detail" role="tabpanel"
                                    aria-labelledby="product-tab-detail-tab" tabindex="0">
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Suspendisse varius enim in eros elementum tristique. Duis
                                        cursus, mi quis viverra ornare, eros dolor interdum nulla, ut
                                        commodo diam libero vitae erat. Aenean faucibus nibh et justo
                                        cursus id rutrum lorem imperdiet.
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="product-tab-shipping" role="tabpanel"
                                    aria-labelledby="product-tab-shipping-tab" tabindex="0">
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Suspendisse varius enim in eros elementum tristique. Duis
                                        cursus, mi quis viverra ornare, eros dolor interdum nulla, ut
                                        commodo diam libero vitae erat. Aenean faucibus nibh et justo
                                        cursus id rutrum lorem imperdiet.
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="product-tab-return" role="tabpanel"
                                    aria-labelledby="product-tab-return-tab" tabindex="0">
                                    <p class="paragraph">
                                        tab return
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="product-tab-review" role="tabpanel"
                                    aria-labelledby="product-tab-review-tab" tabindex="0">
                                    <p class="paragraph">
                                        tab review
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 col-lg-6 col-12">
                    <div class="product-detail-information-wrapper product">
                        <div class="product-detail-information-heading product-info">
                            <h1 class="product-name">{{ $page_title }}</h1>
                        </div>
                        <div class="product-detail-information-rating d-flex align-items-center">
                            <div class="product-detail-information-rating-item d-flex align-items-center">
                                <div class="icon">
                                    <svg width="116" height="21" viewBox="0 0 116 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.99984 2.16667L12.5748 7.38334L18.3332 8.22501L14.1665 12.2833L15.1498 18.0167L9.99984 15.3083L4.84984 18.0167L5.83317 12.2833L1.6665 8.22501L7.42484 7.38334L9.99984 2.16667Z"
                                            fill="#FFB23F" stroke="#FFB23F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M33.9998 2.16667L36.5748 7.38334L42.3332 8.22501L38.1665 12.2833L39.1498 18.0167L33.9998 15.3083L28.8498 18.0167L29.8332 12.2833L25.6665 8.22501L31.4248 7.38334L33.9998 2.16667Z"
                                            fill="#FFB23F" stroke="#FFB23F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M57.9998 2.16667L60.5748 7.38334L66.3332 8.22501L62.1665 12.2833L63.1498 18.0167L57.9998 15.3083L52.8498 18.0167L53.8332 12.2833L49.6665 8.22501L55.4248 7.38334L57.9998 2.16667Z"
                                            fill="#FFB23F" stroke="#FFB23F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M81.9998 2.16667L84.5748 7.38334L90.3332 8.22501L86.1665 12.2833L87.1498 18.0167L81.9998 15.3083L76.8498 18.0167L77.8332 12.2833L73.6665 8.22501L79.4248 7.38334L81.9998 2.16667Z"
                                            fill="#FFB23F" stroke="#FFB23F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M106 2.16667L108.575 7.38334L114.333 8.22501L110.167 12.2833L111.15 18.0167L106 15.3083L100.85 18.0167L101.833 12.2833L97.6665 8.22501L103.425 7.38334L106 2.16667Z"
                                            fill="#FFB23F" stroke="#FFB23F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <p class="rating-scores">5.0</p>
                            </div>
                            <p class="rating-quantity">(10 Reviews)</p>
                        </div>
                        <div class="product-detail-information-price product-info">
                            <div class="product-price">
                                <span class="product-price-current">${{ number_format($detail->price) }}</span>
                                <span class="product-price-old">${{ number_format($detail->price_old) }}</span>
                            </div>
                        </div>
                        <p class="product-detail-information-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse varius enim in eros elementum tristique.
                        </p>

                        <div class="product-detail-variants">
                            <div class="product-variant-default">
                                <label for="variant-default">Variant</label>
                                <div class="position-relative">
                                    <select name="variant-default" id="variant-default">
                                        <option value="Option 1" selected>Select</option>
                                        <option value="Option 2">Option</option>
                                        <option value="Option 3">Option 3</option>
                                    </select>
                                    <div class="variant-select-arrow position-absolute">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.3977 15.203C12.178 15.4226 11.8219 15.4226 11.6022 15.203L5.86739 9.46808C5.64772 9.24841 5.64772 8.89231 5.86739 8.67263L6.13256 8.40743C6.35222 8.18776 6.70838 8.18776 6.92805 8.40743L12 13.4794L17.0719 8.40743C17.2916 8.18776 17.6477 8.18776 17.8674 8.40743L18.1326 8.67263C18.3522 8.89231 18.3522 9.24841 18.1326 9.46808L12.3977 15.203Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="product-variant-default product-variant-color">
                                <span class="label d-inline-block">Choose Color</span>
                                <ul class="variant-list variant-color-list swiper-pagination d-flex">
                                </ul>
                            </div>

                            <div class="product-variant-default product-variant-size">
                                <span class="label d-inline-block">Choose Size</span>
                                <ul class="variant-list variant-size-list d-flex">
                                    <li class="variant-item">
                                        <input type="radio" name="size" checked />
                                        <label class="label-size">72"W</label>
                                    </li>
                                    <li class="variant-item">
                                        <input type="radio" name="size" />
                                        <label class="label-size">80"W</label>
                                    </li>
                                    <li class="variant-item">
                                        <input type="radio" name="size" />
                                        <label class="label-size">88"W</label>
                                    </li>
                                    <li class="variant-item">
                                        <input type="radio" name="size" />
                                        <label class="label-size">96"W</label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-detail-quantity">
                            <label for="quantity">Quantity</label>
                            <div class="cart-quantity-form cart-item-action">
                                <button class="qtyminus minus">
                                    -
                                </button>
                                <input type="text" name="quantity" value="1" class="qty" />
                                <button class="qtyplus plus">
                                    +
                                </button>
                            </div>
                        </div>
                        <div
                            class="product-detail-information-cart cart-product d-flex justify-content-between align-items-center">
                            <button class="add-wishlish" title="Yêu thích">
                                <svg width="24" height="21" viewBox="0 0 24 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.6 1.5C9.29038 1.5 10.8323 2.34142 12 3.3C13.1677 2.34142 14.7096 1.5 16.4 1.5C20.0451 1.5 23 4.21049 23 7.55386C23 14.295 15.3274 18.221 12.7981 19.3321C12.2886 19.556 11.7114 19.556 11.2019 19.3321C8.67259 18.221 1 14.2948 1 7.5537C1 4.21033 3.95492 1.5 7.6 1.5Z"
                                        stroke="#769496" stroke-width="1.5" />
                                </svg>
                            </button>
                            <button class="main-btn button" data-bs-toggle="offcanvas" data-bs-target="#cart-popup"
                                aria-controls="cart-popup">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-block d-xl-none d-lg-none">
                    <div class="product-detail-tab-wrapper">
                        <ul class="product-detail-tab-list d-flex align-items-center" id="productDetailTab"
                            role="tablist">
                            <li class="product-detail-tab-item active" id="product-tab-detail-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-detail" role="tab" aria-controls="product-tab-detail"
                                aria-selected="true">
                                <p class="text">Details</p>
                            </li>

                            <li class="product-detail-tab-item" id="product-tab-shipping-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-shipping" role="tab"
                                aria-controls="product-tab-shipping" aria-selected="false">
                                <p class="text">Shipping</p>
                            </li>

                            <li class="product-detail-tab-item" id="product-tab-return-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-return" role="tab" aria-controls="product-tab-return"
                                aria-selected="false">
                                <p class="text">Returns</p>
                            </li>

                            <li class="product-detail-tab-item" id="product-tab-review-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-review" role="tab" aria-controls="product-tab-review"
                                aria-selected="false">
                                <p class="text">Reviews</p>
                            </li>
                        </ul>
                        <div class="product-detail-tab-content tab-content" id="productDetailTabContent">
                            <div class="tab-pane fade show active" id="product-tab-detail" role="tabpanel"
                                aria-labelledby="product-tab-detail-tab" tabindex="0">
                                <p class="paragraph">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse varius enim in eros elementum tristique. Duis
                                    cursus, mi quis viverra ornare, eros dolor interdum nulla,
                                    ut commodo diam libero vitae erat. Aenean faucibus nibh et
                                    justo cursus id rutrum lorem imperdiet.
                                </p>
                            </div>

                            <div class="tab-pane fade" id="product-tab-shipping" role="tabpanel"
                                aria-labelledby="product-tab-shipping-tab" tabindex="0">
                                <p class="paragraph">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse varius enim in eros elementum tristique. Duis
                                    cursus, mi quis viverra ornare, eros dolor interdum nulla,
                                    ut commodo diam libero vitae erat. Aenean faucibus nibh et
                                    justo cursus id rutrum lorem imperdiet.
                                </p>
                            </div>

                            <div class="tab-pane fade" id="product-tab-return" role="tabpanel"
                                aria-labelledby="product-tab-return-tab" tabindex="0">
                                <p class="paragraph">tab return</p>
                            </div>

                            <div class="tab-pane fade" id="product-tab-review" role="tabpanel"
                                aria-labelledby="product-tab-review-tab" tabindex="0">
                                <p class="paragraph">tab review</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="fhm-product-related">
        <div class="container">
            <div class="product-related-content text-center">
                <p class="sub-title">Deals of the Day</p>
                <h3 class="title"><a href="/">You May Also Like</a></h3>
            </div>
            <div class="swiper product-related">
                <div class="swiper-wrapper">
                    @if(isset($relatedPosts) && count($relatedPosts)>0)
                    @foreach($relatedPosts as $item)
                    <div class="swiper-slide">
                        <div class="product-item">
                            <div class="product-img position-relative">
                                <a href="{{  route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" title="{{ $item->name }}">
                                    <img src="{{ $item->image }}" alt="{{ $item->name }}" title="{{ $item->name }}" />
                                </a>
                                <div class="product-wishlist position-absolute">
                                    <div class="product-wishlist-hidden">
                                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.33331 0.833374C7.74196 0.833374 9.02693 1.53456 9.99998 2.33337C10.973 1.53456 12.258 0.833374 13.6666 0.833374C16.7042 0.833374 19.1666 3.09212 19.1666 5.87825C19.1666 11.4959 12.7728 14.7676 10.665 15.6935C10.2405 15.88 9.7595 15.88 9.33493 15.6935C7.22713 14.7675 0.833313 11.4957 0.833313 5.87812C0.833313 3.09198 3.29575 0.833374 6.33331 0.833374Z"
                                                fill="#769496" stroke="#769496" stroke-width="1.5" />
                                        </svg>
                                    </div>
                                    <div class="product-wishlist-show">
                                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.33331 0.833374C7.74196 0.833374 9.02693 1.53456 9.99998 2.33337C10.973 1.53456 12.258 0.833374 13.6666 0.833374C16.7042 0.833374 19.1666 3.09212 19.1666 5.87825C19.1666 11.4959 12.7728 14.7676 10.665 15.6935C10.2405 15.88 9.7595 15.88 9.33493 15.6935C7.22713 14.7675 0.833313 11.4957 0.833313 5.87812C0.833313 3.09198 3.29575 0.833374 6.33331 0.833374Z"
                                                fill="white" stroke="#769496" stroke-width="1.5" />
                                        </svg>
                                    </div>
                                </div>
                                <button class="main-btn position-absolute" data-bs-toggle="offcanvas"
                                    data-bs-target="#cart-popup" aria-controls="cart-popup">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.72117 1.54131C1.33081 1.54131 0.949755 1.54596 0.568694 1.54131C0.159752 1.53666 -0.109779 1.14631 0.0435745 0.77919C0.131869 0.560777 0.303811 0.435306 0.540812 0.430659C1.10776 0.426012 1.67935 0.421365 2.24629 0.430659C2.53906 0.435306 2.75282 0.649072 2.78535 0.946485C2.8597 1.62496 2.92941 2.30808 2.99912 2.98655C3.00841 3.05626 3.0177 3.12596 3.03165 3.21426C3.106 3.21426 3.18035 3.21426 3.2547 3.21426C7.11643 3.21426 10.9781 3.21426 14.8399 3.21426C15.4347 3.21426 15.9041 3.56279 15.9877 4.11579C16.0202 4.33885 15.9831 4.57585 15.9366 4.79891C15.5137 6.79251 15.0908 8.78611 14.654 10.7797C14.4774 11.5976 13.8175 12.1181 12.981 12.1181C10.1184 12.1181 7.25119 12.1181 4.38859 12.1181C3.45918 12.1181 2.77141 11.4768 2.67847 10.5566C2.51582 8.9534 2.33923 7.35016 2.17194 5.75156C2.02788 4.38068 1.88382 3.00979 1.7444 1.63425C1.73511 1.61566 1.73046 1.59243 1.72117 1.54131ZM3.13853 4.3342C3.20823 4.97085 3.27329 5.58427 3.33835 6.20233C3.48706 7.61969 3.63577 9.03705 3.78912 10.4544C3.83094 10.8262 4.03541 11.0074 4.41647 11.0074C7.26513 11.0074 10.1091 11.0074 12.9578 11.0074C13.311 11.0074 13.5062 10.8494 13.5805 10.5009C13.9383 8.83258 14.2962 7.15963 14.654 5.49133C14.7376 5.11027 14.8166 4.72456 14.9003 4.3342C10.9735 4.3342 7.06531 4.3342 3.13853 4.3342Z"
                                            fill="black" />
                                        <path
                                            d="M3.34302 14.9107C3.34302 13.9906 4.0912 13.2378 5.00667 13.2378C5.92679 13.2378 6.67962 13.986 6.67962 14.9014C6.67962 15.8216 5.93144 16.5744 5.01597 16.5744C4.10049 16.579 3.34302 15.8262 3.34302 14.9107ZM5.00667 15.4591C5.30873 15.4591 5.56432 15.2128 5.56432 14.9107C5.56897 14.6087 5.32267 14.3531 5.02061 14.3484C4.71391 14.3438 4.45367 14.5994 4.45367 14.9061C4.45832 15.2082 4.70926 15.4591 5.00667 15.4591Z"
                                            fill="black" />
                                        <path
                                            d="M11.6892 16.5746C10.7737 16.5746 10.0209 15.8218 10.0209 14.9017C10.0209 13.9862 10.7737 13.2334 11.6938 13.2334C12.6139 13.2334 13.3621 13.9862 13.3621 14.9063C13.3621 15.8265 12.6093 16.5746 11.6892 16.5746ZM11.6892 14.3487C11.3871 14.3487 11.1362 14.5996 11.1362 14.9017C11.1362 15.2038 11.3825 15.4547 11.6845 15.4593C11.9912 15.464 12.2515 15.2038 12.2468 14.8971C12.2468 14.595 11.9912 14.3487 11.6892 14.3487Z"
                                            fill="black" />
                                    </svg>
                                </button>
                            </div>
                            <div class="product-info">
                                <span class="product-type">Living Room</span>
                                <a href="{{  route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" class="product-name text-2-line text-short" title="{{ $item->name }}">
                                    {{ $item->name }}
                                </a>
                                <div class="product-price">
                                    <span class="product-price-current">${{ number_format($item->price) }}</span>
                                    <span class="product-price-old">${{ number_format($item->price_old) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="text-center">
                    <div class="button button-viewmore">
                        <a href="{{  route('frontend.page', ['taxonomy' =>  '/product-category/products']) }}" title="See All Products">See All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
