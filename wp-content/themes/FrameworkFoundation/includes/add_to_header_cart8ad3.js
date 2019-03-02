function msieversion() {
    var ua = window.navigator.userAgent
    var msie = ua.indexOf("MSIE ")
    if (msie > 0) return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)))
    else
        return 0;
}
jQuery(window).load(function() {
    jQuery('.current-qty').each( function() {

        var id = jQuery(this).attr('data-id'),
             qty = jQuery(this).attr('data-qty');
        var currentCookie = jQuery.cookie(id);

        if( currentCookie > 0 ) {
            jQuery(this).attr('data-qty', currentCookie)
                   .css('display','inline-block');
            jQuery(this).find('strong')
                   .html(currentCookie);
        }
    });
});

jQuery(document).ready(function($) {
    var url = '/wp-admin/admin-ajax.php';
    window.onbeforeunload = confirmexit;

    function confirmexit() {
        var has_items = 0;
        jQuery('input[type=number]').each(function(i) {
            if (parseInt(jQuery(this).val()) > 0) {
                has_items = 1;
            }
        });
        if (has_items == 1) {
            return "You have items which are not added to your cart. You will loose them of you leave the page!";
        }
    }

    /**
    * Upon item removal from cart, cart number notif will also be updated
    //clear cookie id before removing item from cart
    */
    jQuery('body').on('click', '.no_remove_item, .remove_item, .product-remove .remove', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var $cartGreen = jQuery('#nav_wrapper #cart-green-main .cart-green'),
            $noToRemove = parseInt(jQuery(this).closest('.cart-items').find('.cart-number').html()),
            $currentCartNo = parseInt($cartGreen.html()),
            newTotal = $currentCartNo - $noToRemove,
            isDone = false,
            thisId = jQuery(this).attr('data-product_id');

        if(isDone) {
            isDone = false;
            return;
        } 

        jQuery.cookie( thisId, 0, { path: '/' } );

        isDone = true; //set flag

        $cartGreen.html(newTotal);

        window.location = jQuery(this).attr("href");
    }); 


    // $('#form-cart input.qty').change(function(e) {
    //     console.log( $(this).val() ); 
    //     // $(this).on('change', function(e)) {
    //     //     $(this).closest('.cart_item_prod_id').val( $(this).val() );

    //     // });
    // });

    //On submit Update Cart Form
    jQuery('#form-cart').submit( function(e) {
        $('input.cart_item_prod_id').each(function(e) {

            var thisId = $(this).attr('name');
            var qty = $(this).val();

            jQuery.cookie( thisId, qty, { path: '/' } );
        });
    });


    var timer;
    var timerinner;
    var toAdd;
    var counter = 0;
    
    /**
    * Add to Cart Functions (plus and minus)
    */
    jQuery('.product-buttons input.plus').live('click', function() {
        var thisQuantity = jQuery(this).parents('.product-buttons').find('input[name=quantity]');
        clearTimeout(this.timer);
        clearTimeout(this.timerinner);
        thisQuantity.attr("ready-plus", "no");
        thisQuantity.attr("ready-minus", "yes");

        var $this = $( this ),
            mainParent = $this.closest( '.product-cart' ),
            data = mainParent.find( '.current-qty' ), //find current data quantity
            dataId = data.attr('data-id');

        var x = 0;
        x = parseInt(jQuery(this).siblings(".qty.text").val());
        var product_added_cover = jQuery(this).parents('.product-cart').find('.product-added-cover');
        product_added_cover.addClass('to-be-added');
        jQuery(this).parents('div.product-single-price-add').find('.single-product-added').addClass('to-be-added-single');
        counter = counter +1;
        this.timer = setTimeout(function() {
            thisQuantity.attr("ready-plus", "yes");
            if ((thisQuantity.attr("ready-plus") == "yes") && (thisQuantity.attr("ready-minus") == "yes")) {
                var updateCount = addToHeaderCart( thisQuantity, dataId );
                product_added_cover.css('display', 'block');
                product_added_cover.css('opacity', '100');
                jQuery('.to-be-added-single').css('opacity', '100');
                jQuery('.cartNumber').html(counter + " products added to cart");
                //update cart number display 
                if( updateCount > 0 ) {
                    data.attr( 'data-qty', updateCount )
                        .css( 'display','inline-block' )
                        .find( 'strong' )
                        .text( updateCount );
                }
            }
        }, 1000);
        this.timerinner = setTimeout(function() {
            if ((thisQuantity.attr("ready-plus") == "yes") && (thisQuantity.attr("ready-minus") == "yes")) {
                product_added_cover.css('display', 'none');
                product_added_cover.css('opacity', '0');
                thisQuantity.val(parseInt('0'));
                product_added_cover.removeClass('to-be-added');
                jQuery('.to-be-added-single').css('opacity', '0');
            }
        }, 3000);
    });
    jQuery('.product-buttons input.minus').live("click", function() {
        var thisQuantity = jQuery(this).parents('.product-buttons').find('input[name=quantity]');
        clearTimeout(this.timer);
        clearTimeout(this.timerinner);
        thisQuantity.attr("ready-plus", "yes");
        thisQuantity.attr("ready-minus", "no");
        var product_added_cover = jQuery(this).parents('.product-cart').find('.product-added-cover');

        var $this = $(this),
            data = $this.closest('.prod-cart').find('.current-qty'),
            currentId = data.attr('data-id'),
            currentQty = data.attr('data-qty'), 
            updateCount;

        var x = 0;
        x = parseInt(jQuery(this).siblings(".qty.text").val());
        if (x > 0) {}
        if (x == 0) {
            product_added_cover.removeClass('to-be-added');
            jQuery(this).parents('div.product-single-price-add').find('.single-product-added').removeClass('to-be-added-single');
        }
        this.timer = setTimeout(function() {
            thisQuantity.attr("ready-minus", "yes");
            if ((thisQuantity.attr("ready-plus") == "yes") && (thisQuantity.attr("ready-minus") == "yes")) {
                if (product_added_cover.hasClass('to-be-added')) {
                    //addToHeaderCart(thisQuantity);
                    product_added_cover.css('display', 'block');
                    product_added_cover.css('opacity', '100');
                }
                if ($('.single-product-added').hasClass('to-be-added-single')) {
                    //addToHeaderCart(thisQuantity);
                    jQuery('.to-be-added-single').css('opacity', '100');
                }
                //update cart no display   
                if( updateCount > 0 ) {
                    data.attr('data-qty', updateCount)
                        .css('display','block')
                        .find('strong')
                        .text( updateCount );
                }
            }
        }, 1000);
        this.timerinner = setTimeout(function() {
            if ((thisQuantity.attr("ready-plus") == "yes") && (thisQuantity.attr("ready-minus") == "yes")) {
                if (product_added_cover.hasClass('to-be-added')) {
                    product_added_cover.css('display', 'none');
                    product_added_cover.css('opacity', '0');
                    thisQuantity.val(parseInt('0'));
                    product_added_cover.removeClass('to-be-added');
                }
                if ($('.single-product-added').hasClass('to-be-added-single')) {
                    jQuery('.to-be-added-single').css('opacity', '0');
                    thisQuantity.val(parseInt('0'));
                }
            }
        }, 3000);
    });

    function showAddedToCart(product_added_cover) {
        var thisparent = product_added_cover.parents('.product-cart');
        product_added_cover.height(thisparent.height());
        product_added_cover.width(thisparent.width());
        product_added_cover.css('display', 'block');
        product_added_cover.css('opacity', '100');
        jQuery('.to-be-added-single').css('opacity', '100');
    }
    var cntafter = 0;
    var timerafter;

    function startTimerAfter() {
        if (cntafter < 2) {
            timerafter = setTimeout(function() {
                startTimerAfter();
                cntafter++;
                if (cntafter == 2) {
                    jQuery('.cart_info').slideUp();
                }
            }, 1000);
        }
    }

    function addToHeaderCart(thisQuantity, thisId) {
        var products = [],
        currentCartNo;

        jQuery(thisQuantity).each(function(i) {
            var product_id = jQuery(this).attr("prodid");
            var quantity = parseInt(jQuery(this).val());
            if (quantity > 0) {
                var object = new Object();
                object.prod_id = product_id;
                object.prod_qty = quantity;
                products.push(object);
            }
        });
        if (products.length > 0) {
            jQuery('#content').addClass('fade_wrapper');

             //if no cookie existing
            if (typeof jQuery.cookie(thisId) === 'undefined'){
                jQuery.cookie(thisId, 0, { path: '/' }); //set cookie value to zero
            }
            //update cookie by adding current no. of clicks/items 
            currentCartNo = parseInt(jQuery.cookie(thisId)) + products[0].prod_qty;
            //update cookie
            jQuery.cookie( thisId, currentCartNo, { path: '/' } );

            jQuery.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: 'action=custom_woocommerce_add_to_cart&products_info=' + JSON.stringify(products),
                success: function(result) {
                    // jQuery('.ci-items').empty();
                    // jQuery('.ci-items').html(result.new_cart);
                    // jQuery('#header-cart-subtotal').empty();
                    // jQuery('#header-cart-subtotal').html(result.cart_total_price);
                    // jQuery('#nav_wrapper #cart-green-main').empty();
                    // jQuery('#navigation-mobile #cart-green-main').empty();
                    // jQuery('#nav_wrapper #cart-green-main').html(result.cart_total_items);
                    // jQuery('#navigation-mobile #cart-green-main').html(result.cart_total_items);
                    jQuery('.ci-items').empty().html(result.new_cart);
                    jQuery('#header-cart-subtotal').empty().html(result.cart_total_price);
                    jQuery('#nav_wrapper #cart-green-main').empty().html(result.cart_total_items);
                    jQuery('#navigation-mobile #cart-green-main').empty().html(result.cart_total_items);
                    //jQuery('.cart_info').slideDown();
                    clearTimeout(timerafter);
                    cntafter = 0;
                    startTimerAfter();
                }
            });
        }
        jQuery(document).ajaxStop(function() {});
        return currentCartNo;
    }
    $fragment_refresh1 = {
        url: url,
        type: 'POST',
        data: {
            action: 'custom_woocommerce_get_refreshed_fragments'
        },
        success: function(data) {
            var item_count = data.cart_total_items;
            var cart_total_price = data.cart_total_price;
            jQuery('#item_qty_header').html(item_count);
            jQuery('#cart_total_header').html(cart_total_price);
        }
    };
    //jQuery.ajax($fragment_refresh1);
    var floatingbox = jQuery('.add_to_cart_all_at_once');
    var pos = floatingbox.position();
    jQuery(window).scroll(function() {
        var scrollY = jQuery(window).scrollTop();
        var isfixed = floatingbox.css('position') == 'fixed';
        var content = jQuery('#content').width() - 20;
        var product_list = jQuery('.product_list').width() - 20;
        var tabs = jQuery('.tab');
        var is_my_account_page = typeof cart_at_once_page !== 'undefined' && cart_at_once_page == 'my_account' ? true : false;
        if (floatingbox.length > 0) {
            if (!navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
                if (is_my_account_page) {
                    var active_tab = '';
                    jQuery.each(tabs, function() {
                        if (jQuery(this).hasClass('active')) {
                            active_tab = jQuery(this).attr('id');
                        }
                    });
                    if (active_tab !== 'favs_link') return false;
                    if (scrollY > 200) {
                        floatingbox.css({
                            width: content,
                        }).addClass('add_to_cart_my_account_fixed');
                    } else {
                        floatingbox.removeAttr('style').removeClass('add_to_cart_my_account_fixed');
                    }
                } else {
                    if (scrollY > pos.top) {
                        floatingbox.css({
                            width: content,
                        }).addClass('add_to_cart_all_at_once_fixed');
                    } else {
                        floatingbox.removeAttr('style').removeClass('add_to_cart_all_at_once_fixed');
                    }
                }
            } else {
                if (scrollY > pos.top && !isfixed) {
                    floatingbox.stop().css({
                        width: product_list,
                    }).addClass('add_to_cart_all_at_once_fixed_mobile');
                } else if (scrollY < 900 && isfixed) {
                    floatingbox.removeAttr('style').removeClass('add_to_cart_all_at_once_fixed_mobile');
                }
            }
        }
    });
});