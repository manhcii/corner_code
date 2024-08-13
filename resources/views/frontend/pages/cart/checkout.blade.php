<!DOCTYPE html>
<html lang="{{ $locale ?? 'vi' }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $page->json_params->name->$locale ?? ($page->name ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')))) }}
    </title>
    <link rel="icon" href="{{ json_decode($setting->image)->favicon ?? '' }}" type="image/x-icon">
    {{-- Print SEO --}}
    @php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
    @endphp
    <meta name="description" content="{{ $seo_description }}" />
    <meta name="keywords" content="{{ $seo_keyword }}" />
    <meta name="news_keywords" content="{{ $seo_keyword }}" />
    <meta property="og:image" content="{{ $seo_image }}" />
    <meta property="og:title" content="{{ $seo_title }}" />
    <meta property="og:description" content="{{ $seo_description }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/corner/css/checkout.css') }}" />
    <style>
    </style>
    {{-- End Print SEO --}}
    {{-- Include style for app --}}
    @include('frontend.panels.styles')
    {{-- Styles custom each page --}}
    @stack('style')

</head>

<body class="page">
    <div id="page" class="hfeed page-wrapper">

        @isset($widget->header)
            @if (\View::exists('frontend.widgets.header.' . $widget->header->json_params->layout))
                @include('frontend.widgets.header.' . $widget->header->json_params->layout)
            @else
                {{ 'View: frontend.widgets.header.' . $widget->header->json_params->layout . ' do not exists!' }}
            @endif
        @endisset

        <section id="fhm-breadcrumb" class="breadcrumb">
      <div class="container">
        <div class="breadcrumb-list">
          <a href="#" title="Address" class="breadcrumb-link">Address</a>
          <div class="breadcrumb-arrow">
            <svg
              width="6"
              height="14"
              viewBox="0 0 6 14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                fill="#979797"
              />
            </svg>
          </div>

          <a href="#" title="Shipping" class="breadcrumb-link">Shipping</a>
          <div class="breadcrumb-arrow">
            <svg
              width="6"
              height="14"
              viewBox="0 0 6 14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                fill="#979797"
              />
            </svg>
          </div>

          <a href="#" title="Payment" class="breadcrumb-link">Payment</a>
          <div class="breadcrumb-arrow">
            <svg
              width="6"
              height="14"
              viewBox="0 0 6 14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                fill="#979797"
              />
            </svg>
          </div>

          <a href="#" title="Overview" class="breadcrumb-link">Overview</a>
        </div>
      </div>
    </section>

    <main>
      <div class="container">
        @if (session('cart'))
        <div class="row">
          <div class="col-12 col-xl-7 col-lg-7">
            <div class="checkout-address">
              <div class="checkout-title d-flex">
                <h2>Address</h2>
                <div class="checkout-user d-flex">
                  <span>Former Customer?</span>
                  <a href="#">Get Information here</a>
                </div>
              </div>
              <div class="checkout-form">
                <form action="{{ route('processTransaction') }}" id="form-checkout" method="get">
                    @csrf
                  <div class="checkout-form-row d-flex justify-content-between">
                    <div class="checkout-form-line checkout-form-line-full">
                      <label for="name">First name</label>
                      <input
                        type="text"
                        placeholder="Mike"
                        name="name"
                        value="{{ $user_auth->name ?? old('name') }}"
                        required
                      />
                    </div>
                    

                    <div class="checkout-form-line checkout-form-line-full">
                      <label for="company">Company Name</label>
                      <input
                        value="{{ old('json_params.company') }}"
                        type="text"
                        placeholder="FHM Agency"
                        name="json_params[company]"
                      />
                    </div>

                    <div class="checkout-form-line">
                      <label for="district">ADDRESS 1</label>
                      <input
                        type="text"
                        value="{{ old('json_params.address2') }}"
                        placeholder="Cau Giay, Hanoi"
                        name="json_params[address1]"
                        required
                      />
                    </div>

                    <div class="checkout-form-line">
                      <label for="province">ADDRESS 2</label>
                      <input
                      value="{{ old('json_params.address2') }}"
                        type="text"
                        placeholder="Dong Da, Hanoi"
                        name="json_params[address2]"
                        required
                      />
                    </div>

                    <div class="checkout-form-line">
                      <label for="email">Email</label>
                      <input
                      value="{{ $user_auth->email ?? old('email') }}"
                        type="email"
                        placeholder="hungtran123@gmail.comcom"
                        name="email"
                        title="Email chưa đúng định dạng"
                      />
                    </div>

                    <div class="checkout-form-line">
                      <label for="phone">Phone number</label>
                      <input
                      value="{{ $user_auth->phone ?? old('phone') }}"
                        type="text"
                        pattern="[0-9]{10,}$"
                        placeholder="0913 123 456456"
                        name="phone"
                        title="Số điện thoại phải là số và có tối thiểu 10 ký tự"
                      />
                    </div>

                    <div class="checkout-form-line">
                      <label for="postal">Postal Code</label>
                      <input
                        name="transaction_code"
                        value="{{ old('transaction_code') }}"
                        type="text"
                        placeholder="12 3333"
                      />
                    </div>

                    <div class="checkout-form-line">
                      <label for="city">City/Town</label>
                      <div class="input-select position-relative">
                        <select name="json_params[country]"
                            required=""
                            class="country-select custom-select">
                            <option value="">Select a country /
                                region…</option>
                            @foreach ($country as $val)
                                <option
                                    {{ old('json_params.country') == $val->id ? 'selected' : '' }}
                                    {{ isset($user_auth->country_id) && $user_auth->country_id == $val->id ? 'selected' : '' }}
                                    value="{{ $val->id }}">
                                    {{ $val->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-select-arrow position-absolute">
                          <svg
                            width="25"
                            height="24"
                            viewBox="0 0 25 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              clip-rule="evenodd"
                              d="M12.8977 15.203C12.678 15.4226 12.3219 15.4226 12.1022 15.203L6.36739 9.46808C6.14772 9.24841 6.14772 8.89231 6.36739 8.67263L6.63256 8.40743C6.85222 8.18776 7.20838 8.18776 7.42805 8.40743L12.5 13.4794L17.5719 8.40743C17.7916 8.18776 18.1477 8.18776 18.3674 8.40743L18.6326 8.67263C18.8522 8.89231 18.8522 9.24841 18.6326 9.46808L12.8977 15.203Z"
                              fill="black"
                            />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="button-action d-flex">
                  <div class="back-cart">
                    <svg
                      width="24"
                      height="25"
                      viewBox="0 0 24 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M12 20.5L13.41 19.09L7.83 13.5L20 13.5L20 11.5L7.83 11.5L13.41 5.91L12 4.5L4 12.5L12 20.5Z"
                        fill="#769496"
                      />
                    </svg>
                    <a href="{{ route('frontend.order.cart') }}" title="Back to Cart">Back to Cart</a>
                  </div>
                  <button
                    class="button button-cart"
                    type="submit"
                    form="form-checkout"
                    title="Continue Shipping"
                  >
                    Continue Shipping
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-5 col-lg-5">
            <div class="your-order">
              <div class="order-head d-flex">
                <h2>your Order</h2>
                <span class="quantity-order">{{ count(session('cart')) }} items</span>
              </div>
              <div class="order-list">
                @php $subtotal = 0 @endphp
                @foreach (session('cart') as $id => $details)
                    @php
                        $subtotal += $details['price'] * $details['quantity'];
                    @endphp
                    <div class="order-item d-flex">
                      <div class="item-image">
                        <img src="{{ $details['image_thumb'] ?? $details['image'] }}" alt="{{ $details['title'] }}" title="{{ $details['title'] }}"/>
                      </div>
                      <div class="item-info">
                        <span class="item-category d-block">kitchen</span>
                        <p class="item-name-product">{{ $details['title'] }}</p>
                      </div>
                      <div class="item-price">
                        <p class="current-price">${{ number_format($details['price'], 2) }}</p>
                        <span class="old-price">${{ isset($details['price_old'])?number_format($details['price_old'], 2):__('Contact') }}</span>
                      </div>
                    </div>
                @endforeach
              </div>
              <form action="{{ route('frontend.order.coupon.add') }}" method="POST">
                @csrf
              <div class="order-promotion d-flex justify-content-between">
                <input
                name="coupon_code"
                value="{{ Session::get('coupon') ? session('coupon')['coupon_code'] : '' }}"
                  type="text"
                  placeholder="Discount Code"
                  autocomplete="off"
                />
                @php $subtotal_coupon_from = 0 @endphp
                @foreach (session('cart') as $details_c_chil)
                        @php
                            $subtotal_coupon_from += $details_c_chil['price'] * $details_c_chil['quantity'];
                        @endphp
                @endforeach
                <input type="hidden"
                    name="amount_sub"value="{{ $subtotal_coupon_from }}">
                <button class="button apply-voucher apply_coupon" title="Apply">Apply</button>
              </div>
            </form>
              <div class="order-foot">
                <div class="order-subtotal d-flex justify-content-between">
                  <span>Subtotal</span>
                  <strong>${{ number_format($subtotal, 2) }} USD</strong>
                </div>

                @if (Session::get('coupon'))
                @php
                    if (session('coupon')['coupon_type'] == 'pecent') {
                        $total_coupon = ($subtotal * session('coupon')['discount']) / 100;
                    } else {
                        $total_coupon = round(session('coupon')['discount']);
                    }
                    $subtotal = $subtotal - $total_coupon;
                @endphp
                <div class="order-discount d-flex justify-content-between">
                  <span>Discounts</span>
                  <strong>${{ number_format($total_coupon, 2) }} USD</strong>
                  <input type="hidden" name="discount"
                            value="{{ number_format($total_coupon, 2) }}"class="discount-price-value">
                @if (isset(session('coupon')['id']) && session('coupon')['id'] != '')
                    <input type="hidden"
                        name="json_params[id_discount]"
                        value="{{ session('coupon')['id'] }}"class="id-discount-value">
                @endif
                </div>
                
            @endif
            <input
                type="hidden"value="{{ $total_coupon ?? 0 }}"class="subtotal-coupon"> USD</strong>
                </div>

                <div class="order-total d-flex justify-content-between">
                  <p>Total <span>({{ count(session('cart')) }} items)</span></p>
                  <strong>${{ number_format($subtotal, 2) }} USD</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </main>
        @isset($widget->footer)
            @if (\View::exists('frontend.widgets.footer.' . $widget->footer->json_params->layout))
                @include('frontend.widgets.footer.' . $widget->footer->json_params->layout)
            @else
                {{ 'View: frontend.widgets.footer.' . $widget->footer->json_params->layout . ' do not exists!' }}
            @endif
        @endisset
    </div>
    {{-- Include scripts --}}
    @include('frontend.panels.scripts')
    @include('frontend.components.sticky.alert')
    {{-- Scripts custom each page --}}
    @stack('script')

</body>

</html>
