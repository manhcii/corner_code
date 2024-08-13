@if (session('cart'))
    @php
        $total = $order = 0;
    @endphp
    <!--Breadcrumb-->
    <section id="fhm-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="#" title="Home" class="breadcrumb-link">Home</a>
                <div class="breadcrumb-arrow">
                    <svg width="6" height="14" viewBox="0 0 6 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.12 13.512C2.06667 13.6827 1.98133 13.8053 1.864 13.88C1.74667 13.9547 1.61867 13.992 1.48 13.992C1.34133 13.992 1.21333 13.9547 1.096 13.88C0.989333 13.816 0.914667 13.72 0.872 13.592C0.818667 13.464 0.818667 13.3093 0.872 13.128L4.632 1.48C4.68533 1.30933 4.77067 1.18667 4.888 1.112C5.00533 1.02667 5.128 0.989333 5.256 0.999999C5.39467 0.999999 5.51733 1.03733 5.624 1.112C5.74133 1.176 5.82133 1.272 5.864 1.4C5.91733 1.51733 5.92267 1.66667 5.88 1.848L2.12 13.512Z"
                            fill="#979797" />
                    </svg>
                </div>
                <a href="/cart" title="Cart" class="breadcrumb-link">Shopping Cart</a>
            </div>
        </div>
    </section>

    <!--Main Cart-->
    <section id="fhm-shopping-cart">
        <div class="container">
            <div class="shopping-cart-heading position-relative">
                <h1>Shopping Cart</h1>
                <div class="continue-shopping">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 20.5L13.41 19.09L7.83 13.5L20 13.5L20 11.5L7.83 11.5L13.41 5.91L12 4.5L4 12.5L12 20.5Z"
                            fill="#769496" />
                    </svg>
                    <a href="javascript:history.back()" title="Continue Shopping">Continue Shopping</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="shopping-cart-list">
                        @foreach (session('cart') as $id => $item)
                        @php
                          $title = $item['title'] ?? '';
                          $alias = $item['alias'] ?? '';
                          $image = $item['image'] ?? '';
                          $price = $item['price'] ?? 0;
                          $old_price = $item['price_old'] ?? 0;
                          $quantity = $item['quantity'] ?? 0;
                          $total += $price * $quantity;
                          $order += $quantity;
                          $listId_postCate = App\Models\CmsRelationship::where('object_id', $id)->get()->pluck('taxonomy_id');
                        $data =  App\Models\CmsTaxonomy::whereIn('id', $listId_postCate)->where('status', 'active')->get();
                        @endphp
                        <div class="cart-item d-flex" >
                            <div class="cart-item-image">
                                <img src="{{ $image }}" alt="{{ $title }}" title="{{ $title }}" />
                            </div>
                            <div class="cart-item-info">
                                <p>{{ $data->first()->name }}</p>
                                <a href="#" title="{{ $title }}">{{ $title }}</a>
                            </div>
                            <div class="cart-quantity-form cart-item-action" data-id="{{ $id }}">
                                <button class="qtyminus minus">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.3333 8.66666H9.33333H8H4V7.33333H8H9.33333H13.3333V8.66666Z"
                                            fill="#979797" />
                                    </svg>
                                </button>
                                <input type="text" name="quantity" value="{{ $quantity }}" class="update-cart qty" data-id="{{ $id }}" title="quantity" />
                                <button class="qtyplus plus">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.3333 8.66666H9.33333V12.6667H8V8.66666H4V7.33333H8V3.33333H9.33333V7.33333H13.3333V8.66666Z"
                                            fill="#979797" />
                                    </svg>
                                </button>
                            </div>
                            <div class="cart-item-price">
                                <p class="current-price">${{ $price }}</p>
                                <p class="old-price">${{ $old_price }}</p>
                            </div>
                            <div class="cart-item-remove remove-card" data-id="{{ $id }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.2426 17.6567L12 13.4141L7.75736 17.6567L6.34315 16.2425L10.5858 11.9998L6.34315 7.7572L7.75736 6.34298L12 10.5856L16.2426 6.34298L17.6569 7.7572L13.4142 11.9998L17.6569 16.2425L16.2426 17.6567Z"
                                        fill="#818181" />
                                </svg>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="shopping-cart-info">
                        <h3>Order Summary</h3>
                        <div class="shopping-cart-main">
                            <div class="shopping-cart-subtotal d-flex justify-content-between">
                                <p>Subtotal</p>
                                <strong>$7,896 USD</strong>
                            </div>
                            <div class="shopping-cart-discount d-flex justify-content-between">
                                <p>Discounts</p>
                                <strong>$50 USD</strong>
                            </div>
                            <div class="shopping-cart-shipping d-flex justify-content-between">
                                <p>Shipping Fee</p>
                                <strong>$20 USD</strong>
                            </div>
                        </div>

                        <div class="shopping-cart-total d-flex justify-content-between">
                            <div class="shopping-cart-total-title">
                                <strong>Total</strong>
                                <p class="d-inline-block">(12 items)</p>
                            </div>
                            <strong>$7,816 USD</strong>
                        </div>

                        <div class="button button-checkout d-block text-center">
                            <a href="checkout.html" title="Proceed to Checkout">Proceed to Checkout</a>
                        </div>
                    </div>

                    <div class="shopping-cart-protection text-center">
                        <h3>Buyer Protection</h3>
                        <p>
                            Get full refund if the item is not as described or if is not
                            delivered
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
