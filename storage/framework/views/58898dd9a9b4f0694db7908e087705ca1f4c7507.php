<script src="<?php echo e(asset('themes/frontend/assets/bootstrap/js/bootstrap.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/about-us.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/corner/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/corner/js/index.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/corner/js/article.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/blog-detail.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/corner/js/product.js')); ?>"></script>

<script>
    // (function($) {
    //     $(document).ready(function() {
    //         $('.share-facebook').click(function(e) {
    //             e.preventDefault();
    //             window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + (
    //                     $(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 -
    //                     225) +
    //                 ', toolbar=0, location=0, menubar=0,         directories=0, scrollbars=0');
    //             return false;
    //         });
    //     });
        // Form ajax default
        $(".form_ajax").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    form[0].reset();
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    // Get errors
                    console.log(response);
                    var errors = response.responseJSON.errors;
                    // Foreach and show errors to html
                    var elementErrors = '';
                    $.each(errors, function(index, item) {
                        if (item === 'CSRF token mismatch.') {
                            item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
                        }
                        elementErrors += '<p>' + item + '</p>';
                    });
                }
            });
        });

        $(document).on('click', '.add-to-cart', function() {
            let _root2 = $(this).find('.button');
            let _root = $(this);
            let _html = _root.html();
            let _id = _root.attr("data-id");
            let _quantity = _root.attr("data-quantity") ?? $("#quantity").val();
            let _size = $("input[name='size']:checked").val() ?? "";
            let _color = $(".data-color .data-parameter.checked").attr("data") ?? "";

            // _root2.addClass('loading');

            if (_id > 0) {
                var url = "<?php echo e(route('frontend.order.add_to_cart')); ?>";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "id": _id,
                        "quantity": _quantity,
                        "size": _size,
                        "color": _color
                    },
                    success: function(data) {
                        _root.html(_html);
                        window.location.reload();

                    },
                    error: function(data) {
                        // Get errors
                        var errors = data.responseJSON.message;
                        alert(errors);
                        location.reload();
                    }

                });
            }
        });

        $(".qtyminus, .qtyplus").on("click", function (e) {
            e.preventDefault();
            var ele = $(this);
            var parent = ele.closest(".quantity");
            var quantityInput = parent.find(".qty");

            console.log("Số lượng hiện tại:", quantityInput.val());
            // Update quantity based on button clicked
            var currentQuantity = parseInt(quantityInput.val());
            if (ele.hasClass("qtyminus")) {
                quantityInput.val(currentQuantity - 1);
            } else {
                quantityInput.val(currentQuantity + 1);
            }

            // Trigger the change event manually
            quantityInput.trigger("change");
        });
        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            var parent = ele.closest(".quantity");
            $.ajax({
                url: '<?php echo e(route('frontend.order.cart.update')); ?>',
                method: "PATCH",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: parent.data("id"),
                    key: parent.data("arr"),
                    quantity: parent.find(".qty").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $('.remove-card').on('click', function(e) {
            e.preventDefault();

            if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
                var id = $(this).attr('data-id');
                var key = $(this).attr('data-arr');
                // var mini_cart = $(this).closest('.mini-cart');
                // var _this=$(this);
                $.ajax({
                    url: '<?php echo e(route('frontend.order.cart.remove')); ?>',
                    method: "DELETE",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        id: id,
                        key: key,
                    },
                    success: function(response) {
                        location.reload();
                        // _this.closest('li').remove();
                        // mini_cart.find('.cart-count').text(mini_cart.find('.cart-list-wrap .cart-list li').length);
                        // if (!mini_cart.find('.cart-list-wrap .cart-list li').length) {
                        //     mini_cart.find('.cart-empty-wrap').show();
                        //     mini_cart.find('.cart-list-wrap').hide();
                        // }
                        // var total=0;
                        // $('.each_cart').each(function(){
                        //   var each_quantity=Number($(this).find('.quantity_num').text());
                        //   var each_price=Number($(this).find('.price_num').text());
                        //   var each_total=each_quantity*each_price;
                        //   total+=Number(each_total);
                        // })
                        // $('.total-price-number').text('$'+total);
                        // $('body').append('<div class="cart-product-added"><div class="added-message">Product was added to cart successfully!</div>');
                        //   setTimeout(function() {
                        //       $(".cart-product-added").fadeOut(1000, function() {});
                        //   }, 1500);
                    }
                });
            }
        })
        $(function() {
            $("#login_form").submit(function(e) {
                $(".login_result .alert").text("<?php echo app('translator')->get('Processing...'); ?>");
                $(".login_result").removeClass('d-none');
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(response) {
                        form[0].reset();
                        if (response.message === 'success') {
                            if (response.data.url != '') {
                                window.location.href = response.data.url;
                            } else {
                                location.reload();
                            }
                        } else {
                            $("login_result .alert").html(response.message);
                        }

                    },
                    error: function(response) {
                        // Get errors
                        console.log(response);
                        var errors = response.responseJSON.message;
                        console.log(errors);
                        if (errors === 'CSRF token mismatch.') {
                            $(".login_result .alert").html("<?php echo app('translator')->get('CSRF token mismatch.'); ?>");
                        } else if (errors === 'The given data was invalid.') {
                            $(".login_result .alert").html("<?php echo app('translator')->get('The given data was invalid.'); ?>");
                        } else {
                            $(".login_result .alert").html(errors);
                        }
                    }
                });
            });
        });
        // Wishlist button
        $('.btn-wishlist .product-btn').on('click', function(e) {
            e.preventDefault();
            var btn_wishlist = $(this);
            var id = btn_wishlist.attr('data-id');

            $.ajax({
                url: '<?php echo e(route('frontend.wishlist.check')); ?>',
                method: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                    lang: '<?php echo e($locale ?? 'vi'); ?>',
                },
                dataType: 'JSON',
                success: function(response) {
                    if (response.data == 'error') {
                        var _html =
                            '<div class="alert alert-dismissible alert-warning alert-fixed"> ' +
                            response.message + '  </div>';
                        $('body').append(_html);
                        setTimeout(function() {
                            $('.alert.alert-dismissible').remove();
                        }, 3000);
                    } else {
                        var _html = "";
                        $('.count-wishlist').text(response.data.length);
                        response.data.forEach(elm => {
                            _html +=
                                `<tr class="wishlist-item">
                            <td class="wishlist-item-remove"><span data-id="` + elm.id + `"></span></td>
                            <td class="wishlist-item-image">
                                <a href="/` + elm.link + `">
                                    <img width="600" height="600" src="` + elm.image + `" alt="` + elm.name + `">
                                </a>
                               </td>
                            <td class="wishlist-item-info">
                                <div class="wishlist-item-name">
                                    <a href="` + elm.link + `">` + elm.name + `</a>
                                </div>
                                <div class="wishlist-item-price">
                                    <span>$` + elm.price + `</span>
                                </div>
                                <div class="wishlist-item-time">` + elm.time +
                                `</div>
                            </td>
                            <td class="wishlist-item-actions">
                                <div class="wishlist-item-stock">
                                    In stock
                                </div>
                                <div class="wishlist-item-add">
                                    <div data-title="Add to cart" class="add-to-cart" data-quantity="1" data-id="` +
                                elm.id + `">
                                        <a rel="nofollow" href="javascript:void(0)" class="button" >Add to cart</a>
                                    </div>
                                </div>
                            </td>
                        </tr> `;
                        })


                        $('.list_wishlist-items').html(_html);
                        if (btn_wishlist.hasClass('added')) {
                            $('.wishlist-popup').addClass('show');
                        } else {
                            btn_wishlist.addClass('adding');
                            // btn_wishlist.html('Add to wishlist...');
                            setTimeout(function() {
                                btn_wishlist.removeClass('adding');
                                btn_wishlist.addClass('added');

                                var path_color = btn_wishlist.find('svg path');
                                // Thêm CSS vào phần tử được click
                                btn_wishlist.parent().css({
                                    "background-color": 'black',
                                });

                                path_color.css('fill', '#fff');
                                // btn_wishlist.html('Browse wishlist');
                                $('.wishlist-popup').addClass('show');
                                setTimeout(function() {
                                    $('.wishlist-notice').removeClass(
                                        'wishlist-notice-show');
                                }, 1000);
                            }, 1000);
                        }
                    }

                },
                error: function(response) {
                    // Get errors
                    var errors = response.responseJSON.message;
                    alert(errors);
                    location.reload();
                }
            });
        })
        $(document).on('click', '.btn-wishlist .product-btn.added', function(e) {
            var id = $(this).attr('data-id');
            var btn_wishlist = $(this);
            var circle_color = btn_wishlist.find('svg circle');
            var path_color = btn_wishlist.find('svg path');
            // Xóa CSS vào phần tử được click
            btn_wishlist.parent().css({
                "background-color": '',
            });

            path_color.css('fill', '#616161');

            $.ajax({
                url: '<?php echo e(route('frontend.wishlist.delete')); ?>',
                method: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                },
                dataType: 'JSON',
                success: function(response) {
                    if (response.data != "") {
                        btn_wishlist.removeClass('added');
                    }
                },
            });


        })

        $(document).on('click', '.wishlist-item-remove span', function(e) {
            var id = $(this).attr('data-id');
            $(this).addClass('removing');
            $('.wishlist-notice').text('Removed from wishlist!');
            $('.wishlist-notice').addClass('wishlist-notice-show');
            var wishlist_items = $(this).closest('.wishlist-items');
            var wishlist_item = $(this).closest('.wishlist-item');
            setTimeout(function() {
                $('.wishlist-notice').removeClass('wishlist-notice-show');
                wishlist_item.remove();
                $('.count-wishlist').text(wishlist_items.find('tbody tr')
                    .length);
                if (!wishlist_items.find('tbody tr').length) {
                    wishlist_items.before(
                        '<div class="wishlist-empty">There are no products on the wishlist!</div>'
                    );
                }
            }, 1000);
            $.ajax({
                url: '<?php echo e(route('frontend.wishlist.delete')); ?>',
                method: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                },
                dataType: 'JSON',
                success: function(response) {
                    if (response.data != "") {
                        $('.wishlist-' + response.data).removeClass('added');
                        location.reload();
                    }
                },
            });


        })

    //     const filterArray = (array, fields, value) => {
    //         fields = Array.isArray(fields) ? fields : [fields];
    //         return array.filter((item) => fields.some((field) => item[field] === value));
    //     };
    // })(jQuery);

    // function loadMore(cl = '', view = '', type = '') {
    //     const productGroup = $(cl + ".active");
    //     var perpage = productGroup.data('perpage');
    //     var currentpage = productGroup.data('currentpage');
    //     var lastpage = productGroup.data('lastpage');
    //     var taxonomy = productGroup.data('taxonomy');
    //     var lang = '<?php echo e($locale ?? 'vi'); ?>';
    //     var url = "<?php echo e(route('frontend.view_more')); ?>";
    //     var items = '';
    //     if (currentpage + 1 >= lastpage) {
    //         productGroup.find('.main-button-m').hide();
    //     }
    //     $.ajax({
    //         type: "POST",
    //         url: url,
    //         data: {
    //             "_token": "<?php echo e(csrf_token()); ?>",
    //             "taxonomy": taxonomy,
    //             "lastpage": lastpage,
    //             "currentpage": currentpage,
    //             "perpage": perpage,
    //             "lang": lang,
    //             "type": type,
    //         },
    //         success: function(response) {
    //             productGroup.attr('data-currentpage', (currentpage + 1));
    //             $.each(response.data, function(key, val) {
    //                 if (type == 'product') {
    //                     items += `
    //                 <li class="products-item">
    //                     <div class="image">
    //                         <img src="` + val.image + `"
    //                             alt="` + val.name + `"
    //                             title="` + val.name + `" />
    //                     </div>
    //                     <a href="` + val.link + `"
    //                         title="` + val.name + `"
    //                         class="name">` + val.name + `</a>
    //                     <span class="price"> $` + val.price + ` </span>
    //                 </li>`;
    //                 } else {
    //                     items += `
    //                     <li class="news-item">
    //                         <div class="news-item-image">
    //                             <img src="` + val.image + `"
    //                                 alt="` + val.name + `"
    //                                 title="` + val.name + `" />
    //                         </div>
    //                         <p class="news-item-date">` + val.time + `</p>
    //                         <a href="` + val.link + `"
    //                             title="` + val.name + `"
    //                             class="news-item-title">` + val.name + `</a>
    //                         <p class="news-item-desc">
    //                             ` + val.brief + `
    //                         </p>
    //                     </li>
    //                     `;
    //                 }

    //             });
    //             productGroup.find(view).append(items);
    //         },
    //         error: function(data) {
    //             // Get errors
    //             var errors = data.responseJSON.message;
    //             alert(errors);
    //             location.reload();
    //         }
    //     });
    // }
    function loadMore(cl = '', view = '', type = '') {
        const productGroup = $(cl + ".active");
        // const productGroup = $(t).parents(cl);
        var perpage = productGroup.attr('data-perpage');
        var currentpage = Number( productGroup.attr('data-currentpage'));
        var lastpage = productGroup.attr('data-lastpage');
        var taxonomy = productGroup.attr('data-taxonomy');
        var lang = '<?php echo e($locale ?? 'vi'); ?>';
        var url = "<?php echo e(route('frontend.view_more')); ?>";
        var items = '';

        $.ajax({
            type: "POST",
            url: url,
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "taxonomy": taxonomy,
                "lastpage": lastpage,
                "currentpage": currentpage,
                "perpage": perpage,
                "lang": lang,
                "type": type,
            },
            success: function(response) {
                productGroup.attr('data-currentpage', (currentpage + 1));
                if (currentpage + 1 >= lastpage) {
                        productGroup.find('.load-more').hide();
                    }
                $.each(response.data, function(key, val) {
                    if (type == 'product') {
                        items += `
                    <div class="product-item">
                        <div class="product-item-image">
                            <img src="` + val.image + `"
                                alt="` + val.name + `"
                                title="` + val.name + `" />
                        </div>
                        <p class="product-name">` + val.name + `</p>
                        <p class="product-price"> $` + val.price + ` </p>
                    </div>`;
                    } else {
                        items += `
                        <div class="blog-item">
                            <div class="blog-item-image">
                                <img src="` + val.image + `"
                                    alt="` + val.name + `"
                                    title="` + val.name + `" />
                            </div>
                            <div class="blog-item-info">
                                <p class="blog-item-date">` + val.time + `</p>
                                <h3>
                                    title="` + val.name + `"
                                    class="news-item-title">` + val.name + `
                                </h3>
                            </div>
                        </div>
                        `;
                    }

                });
                productGroup.find(view).append(items);
            },
            error: function(data) {
                // Get errors
                var errors = data.responseJSON.message;
                alert(errors);
                location.reload();
            }
        });
    }
</script>

<?php /**PATH C:\xamppp\htdocs\corner\shushi\resources\views/frontend/panels/scripts.blade.php ENDPATH**/ ?>