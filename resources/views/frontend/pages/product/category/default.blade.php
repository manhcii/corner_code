{{-- Check và gọi template tương ứng --}}
@extends('frontend.layouts.default')
@section('content')
    @php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $background_breadcrumbs = json_decode($setting->image)->background_breadcrumbs ?? '';
        $category_title = $page->json_params->name->{$locale} ?? $page->name;
        $category_brief = $page->json_params->brief->{$locale} ?? $page->brief;
        $category_description = $page->json_params->description->{$locale} ?? $page->description;
        $category_content = $page->json_params->content->{$locale} ?? $page->content;
        $category_image = $page->json_params->image != '' ? $page->json_params->image : $setting->background_breadcrumbs;
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : $setting->background_breadcrumbs;
    @endphp
    <section id="fhm-collections-banner" class="position-relative">
        <div class="banner-image">
            <img src="{{ '/themes/frontend/corner/assets/breadcrumb.png' }}" alt="{{ $category_title }}"
                title="{{ $category_title }}" />
        </div>
        <div class="banner-title position-absolute">
            <div class="container">
                <h1>{{ $category_title }}</h1>
            </div>
        </div>
    </section>
    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="{{ route('home.default') }}" title="Home" class="breadcrumb-link" title="Home">Home</a>
                <div class="breadcrumb-arrow">
                    <svg width="6" height="14" viewBox="0 0 6 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                            fill="#979797" />
                    </svg>
                </div>

                <a href="#" title="{{ $category_title }}" class="breadcrumb-link">{{ $category_title }}</a>
            </div>
        </div>
    </section>

    <main class="position-relative">
        <!-- START PRODUCTS -->
        <section id="fhm-list-product-products">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                        <div class="products-filter-toggle-button">
                            <svg height="16pt" viewBox="-4 0 393 393.99003" width="16pt"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m368.3125 0h-351.261719c-6.195312-.0117188-11.875 3.449219-14.707031 8.960938-2.871094 5.585937-2.3671875 12.3125 1.300781 17.414062l128.6875 181.28125c.042969.0625.089844.121094.132813.183594 4.675781 6.3125 7.203125 13.957031 7.21875 21.816406v147.796875c-.027344 4.378906 1.691406 8.582031 4.777344 11.6875 3.085937 3.105469 7.28125 4.847656 11.65625 4.847656 2.226562 0 4.425781-.445312 6.480468-1.296875l72.3125-27.574218c6.480469-1.976563 10.78125-8.089844 10.78125-15.453126v-120.007812c.011719-7.855469 2.542969-15.503906 7.214844-21.816406.042969-.0625.089844-.121094.132812-.183594l128.683594-181.289062c3.667969-5.097657 4.171875-11.820313 1.300782-17.40625-2.832032-5.511719-8.511719-8.9726568-14.710938-8.960938zm-131.53125 195.992188c-7.1875 9.753906-11.074219 21.546874-11.097656 33.664062v117.578125l-66 25.164063v-142.742188c-.023438-12.117188-3.910156-23.910156-11.101563-33.664062l-124.933593-175.992188h338.070312zm0 0" />
                            </svg>
                            <span class="ms-2">Filter</span>
                        </div>
                        <div class="products-filter-list">
                            <div class="products-filter-toggle-button-close">&#10005;</div>

                            <form class="form_search_post" action="" method="get">
                                @isset($widget->sidebar)
                                    @if (\View::exists('frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout))
                                        @include(
                                            'frontend.widgets.sidebar.' .
                                                $widget->sidebar->json_params->layout)
                                    @else
                                        {{ 'View: frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout . ' do not exists!' }}
                                    @endif
                                @endisset
                            </form>




                            <div class="products-filter-item">
                                <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
                                    aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#filter-stock">
                                    <h2 class="heading">Availability</h2>
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
                                <div id="filter-stock" class="collapse show">
                                    <div class="products-filter-item-radio">
                                        <label class="products-filter-item-radio-item">
                                            In Stock
                                            <span class="stock-quantity">(123)</span>
                                            <input type="radio" name="radio" />
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="products-filter-item-radio-item">
                                            Out Of Stock
                                            <span class="stock-quantity">(123)</span>
                                            <input type="radio" name="radio" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 g-0 col-lg-9 col-md-8 col-12">
                        <div class="products-list">
                            <div class="products-list-sort">
                                <div class="products-list-sort-view d-flex justify-content-between align-items-center">
                                    <div
                                        class="products-list-sort-view-status d-flex justify-content-between align-items-center">
                                        <p class="text">Sort by</p>
                                        <div class="seclect-sort-view position-relative">
                                            <select name="price" id="price">
                                                <option value="Low - High" selected>
                                                    Price: Low - High
                                                </option>
                                                <option value="Price: High - Low">
                                                    Price: High - Low
                                                </option>
                                                <option value="Name: A - Z">Name: A - Z</option>
                                                <option value="Name: Z - A">Name: Z - A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="products-list-sort-view-mode d-flex justify-content-between align-items-center">
                                        <div class="mode-list d-flex justify-content-between align-items-center">
                                            <div class="mode-item active d-flex justify-content-center align-items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1_526)">
                                                        <rect x="4" y="4" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="10" y="4" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="16" y="4" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="4" y="10" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="10" y="10" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="16" y="10" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="4" y="16" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="10" y="16" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                        <rect x="16" y="16" width="4" height="4" rx="1"
                                                            fill="#272727" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1_526">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="mode-item d-flex justify-content-center align-items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1_538)">
                                                        <rect x="4" y="5" width="16" height="3" rx="1"
                                                            fill="#272727" />
                                                        <rect x="4" y="11" width="16" height="3" rx="1"
                                                            fill="#272727" />
                                                        <rect x="4" y="17" width="16" height="3" rx="1"
                                                            fill="#272727" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1_538">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-list-grids">
                                @foreach($rows as $item)
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{ route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" title="{{ $item->name }}">
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                                title="{{ $item->name }}" />
                                        </a>
                                        <div class="product-wishlist liked">
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
                                        <button class="main-btn position-absolute add-to-cart" data-id="{{ $item->id }}"
                                        data-quantity = 1 data-bs-toggle="offcanvas"
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
                                        <a href="{{ route('frontend.page', ['taxonomy' => $item->alias ?? '']) }}" class="product-name text-2-line text-short"
                                            title="{{ $item->name }}">
                                            {{ $item->name }}
                                        </a>
                                        <div class="product-price">
                                            <span class="product-price-current">${{ number_format($item->price) }}</span>
                                            <span class="product-price-old">${{ number_format($item->price) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          {{ $rows->withQueryString()->links('frontend.pagination.default') }}
                            <div class="collections-des-guide collections-des-guide-show position-relative">
                                <h2 class="heading">buying guide</h2>
                                <div class="collections-content">
                                    <p class="paragraph">
                                        Aliqua id fugiat nostrud irure ex duis ea quis id quis ad
                                        et. Sunt qui esse pariatur duis deserunt mollit dolore
                                        cillum minim tempor enim. Elit aute irure tempor cupidatat
                                        incididunt sint deserunt ut voluptate aute id deserunt
                                        nisi.
                                        <br />
                                    </p>
                                    <p class="paragraph">
                                        Aliqua id fugiat nostrud irure ex duis ea quis id quis ad
                                        et. Sunt qui esse pariatur duis deserunt mollit dolore
                                        cillum minim tempor enim. Elit aute irure tempor cupidatat
                                        incididunt sint deserunt ut voluptate aute id deserunt
                                        nisi.
                                    </p>
                                    <p class="paragraph">
                                        Aliqua id fugiat nostrud irure ex duis ea quis id quis ad
                                        et. Sunt qui esse pariatur duis deserunt mollit dolore
                                        cillum minim tempor enim. Elit aute irure tempor cupidatat
                                        incididunt sint deserunt ut voluptate aute id deserunt
                                        nisi.
                                    </p>
                                    <p class="paragraph">
                                        Aliqua id fugiat nostrud irure ex duis ea quis id quis ad
                                        et. Sunt qui esse pariatur duis deserunt mollit dolore
                                        cillum minim tempor enim. Elit aute irure tempor cupidatat
                                        incididunt sint deserunt ut voluptate aute id deserunt
                                        nisi.
                                    </p>
                                </div>
                                <div class="collections-des-viewmore text-center position-relative">
                                    <button class="button" title="Read more">Read more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END PRODUCTS -->
    </main>
@endsection

@push('script')
<script src="{{ asset('themes/frontend/corner/js/rangeslider.umd.min.js') }}"></script>
<script src="{{ asset('themes/frontend/corner/js/collections.js') }}"></script>
@endpush
