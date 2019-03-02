
jQuery(document).ready(function($) {
	$("a[href='http://www.naturallyorganic.co.nz/product-category/grocery/special-occasion-grocery/christmas-2015/']").attr('href', '/christmas/')
	var url = '/wp-content/themes/FrameworkFoundation/includes/functions.php';
	//>> orgiinal file grom superstore general.js
	// Fix dropdowns in Android
	$( '.nav li:has(ul)' ).doubleTapToGo();
	// Table alt row styling
	jQuery( '.entry table tr:odd' ).addClass( 'alt-table-row' );
	// FitVids - Responsive Videos
	jQuery( '.post, .widget, .panel, .page, #featured-slider .slide-media, .slide-content' ).fitVids();
	// Add class to parent menu items with JS until WP does this natively
	jQuery("ul.sub-menu, ul.children").parents('li').addClass('parent');
	// Responsive Navigation (switch top drop down for select)
	jQuery('ul#top-nav').mobileMenu({
	    switchWidth: 769,                   //width (in px to switch at)
	    topOptionText: 'Select a page',     //first option text
	    indentString: '&nbsp;&nbsp;&nbsp;'  //string for indenting nested items
	});
  	// Show/hide the main navigation
  	jQuery('.nav-toggle').click(function() {
	  jQuery('#navigation, .header-top .account, .header-top .cart').slideToggle('fast', function() {
	  	return false;
	    // Animation complete.
	  });
	});
	// Stop the navigation link moving to the anchor (Still need the anchor for semantic markup)
	jQuery('.nav-toggle a').click(function(e) {
        e.preventDefault();
    });
    jQuery(function(){
    	if(('.star-rating, ul.cart a.cart-contents, .cart a.remove, .added_to_cart, a.tiptip').length  ){
			jQuery('.star-rating, ul.cart a.cart-contents, .cart a.remove, .added_to_cart, a.tiptip').tipTip({
				defaultPosition: "top",
				delay: 0
			});
		}
	});
	// Show / hide the shipping address header on the checkout
   	$('#shiptobilling input').change(function(){
		$('#shiptobilling + h3').hide();
		if (!$(this).is(':checked')) {
			$('#shiptobilling + h3').slideDown();
		}
	}).change();

   	// Quantity buttons
	$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );

	/**var update_cart_totals_div = function( html_str ) {
		$( '.cart_totals' ).replaceWith( html_str );
		$( document.body ).trigger( 'updated_cart_totals' );
	};**/

	$( document.body ).on( 'updated_cart_totals', function(){
	    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
	});




	$( document ).on( 'click', '.plus, .minus', function() {

		// Get values
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}

		}

		// Trigger change event
		$qty.trigger( 'change' );
	});

	// Only apply the fixed stuff to desktop devices
	if ( ! navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
		// Payment box fixed
		//removed original function present in superstore\includes\js\general.js
		// category navigation fixed
		if (jQuery(window).width() > 768) {
			var bh = $('body').height();
		   	var pos = $('#cat_nav').position();
		   	if (jQuery(window).width() > 768) {
				$('#cat_nav').top
		   	}
		   	$(window).scroll(function() {
			var c = $(document).scrollTop();
			var b = $(window).height();
			var w = $(document).width();
			if (jQuery(window).width() > 768) {
			   if (c > 30+pos.top){
				$('#cat_nav').css('position','fixed').css('width',$('.header-top').width()).css('top', '0').addClass('fixed');
			   } else {
				$('#cat_nav').removeAttr('style').removeClass('fixed');
			   }
			} else {
			   $('#cat_nav').removeAttr('style').removeClass('fixed');
			}
				// console.log(bh);
		   	});
			$(window).resize(function(){
				if (jQuery(window).width() > 768) {
					$('#cat_nav').removeAttr('style').removeClass('fixed');
				} else {
					$('#cat_nav').css('width',$('#order_review .shop_table').width());
				}
		   	});
		}
	}
	//<< genera.js
 	//$("#cat_level1").chosen({width: '93%'});
 	//chosen on gravity form widget
	var widget = $('#input_2_4');
	widget.addClass('chzn_category_other');
	//filter by ingredients
	$('#dropdown_layered_nav_product-ingre').chosen({
		width: '100%'
	});
	/**if($('#product_carousel').length ){
		$('#product_carousel')
	    .jcarousel({
	        scroll: 1,
	        animation: 4000,
	        wrap: "circular",
	        auto: 1
	    });
	    $('#carousel_wrapper').fadeIn(4000);
	}**/
	$(function(){
		if( $('img.lazy').length > 0 ){
			$('img.lazy').lazyload({
			 	effect : "fadeIn",
				 threshold : 200
			});
		}

	});

	//registraion page
 	var newsletter_signup = $('.newsletter_input');
 	var newsletter_region = $('.newsletter_span');
 	if(newsletter_signup.is(':checked')){
 		newsletter_region.show("slow");
 	}
 	newsletter_signup.click(function () {
    	newsletter_region.slideToggle(this.checked);
	});
 	var chzn_category1 = $('.chzn_category');
 	//header category chosen
 	if(chzn_category1.length){
 		chzn_category1.chosen({width: '93%'});
 		$('#multi_level_categories').fadeIn(1000);
 	}
 	//register page region button
 	if($('.chzn_category_other').length){
 		$('.chzn_category_other').chosen({width: '100%'});
 	}
 	$('#cat_level2').attr('disabled', true).trigger('chosen:updated');
 	$('#cat_level3').attr('disabled', true).trigger('chosen:updated');
 	//if cookie is present make a AJAX call ASAP
 	var sel_cat1_cookie = $.cookie('sel_cat1');
 	if(sel_cat1_cookie != undefined){
 		var cat_level1 = $('#cat_level1');
 		if(cat_level1.find('option:selected').attr('t_id') ){
 			var term_id_l1 = cat_level1.find('option:selected').attr('t_id');
 			$.removeCookie('sel_cat1');
 			$.cookie('sel_cat1', term_id_l1, { expires: 1, path:'/'});
 			$.ajax({
 				url: url,
 				type: 'POST',
 				data: 'term_id=' + term_id_l1,
 				success: function(data){
 					if($.cookie('sel_cat3') != undefined){
						$('#cat_level3').attr('disabled', true).trigger("chosen:updated");
					}
					$('#cat_level2').empty();
					$('#cat_level2').html($.parseJSON(data) );
					$('#cat_level2').attr('disabled', false).trigger("chosen:updated");
 				}
 			});
 		}
 	}
 	var sel_cat2_cookie = $.cookie('sel_cat2');
 	if(sel_cat2_cookie != undefined){
 		var cat_level2 = $('#cat_level2');
 		var term_id_l2 = $.cookie('sel_cat2');
 		if(cat_level2.find('option:selected').attr('t_id') == term_id_l2){
 			term_id_l2 = cat_level2.find('option:selected').attr('t_id');
 		} else if(cat_level2.find('option:selected').attr('backup_id') == term_id_l2){
 			term_id_l2 = cat_level2.find('option:selected').attr('backup_id');
 		}
 			$.ajax({
 				url: url,
 				type: 'POST',
 				data: 'term_id=' + term_id_l2,
 				success: function(data){
 					$('#cat_level3').empty();
					$('#cat_level3').html($.parseJSON(data));
 					$('#cat_level3').attr('disabled',false).trigger("chosen:updated");
 				}
 			});
 			$.removeCookie('sel_cat2');
 			$.cookie('sel_cat2', term_id_l2, { expires: 1, path:'/'});
 	}
 	$("#cat_level1").change(function(){
 		if($(this).find('option:selected').attr('t_id')){
 			var term_id_l1 = $(this).find('option:selected').attr('t_id');
 			$.removeCookie('sel_cat1');
 			$.cookie('sel_cat1', term_id_l1, { expires: 1, path:'/'});
 			$.ajax({
 				url: url,
 				type: 'POST',
 				data: 'term_id=' + term_id_l1,
 				success: function(data){
 					if($.cookie('sel_cat3') != undefined){
						$('#cat_level3').attr('disabled', true).trigger("chosen:updated");
					}
					$('#cat_level2').empty();
					$('#cat_level2').html($.parseJSON(data) );
 					$('#cat_level2').attr('disabled', false).trigger("chosen:updated");
 				}
 			});
 		}else{
 			location = this.options[this.selectedIndex].value;
 		}
 	});
 	$("#cat_level2").change(function(){
 		if($(this).find('option:selected').attr('t_id')){
 			var cat_level2 = $(this).find('option:selected').attr('t_id');
 			$.removeCookie('sel_cat2');
 			$.cookie('sel_cat2', cat_level2,{ expires: 1, path:'/'});
 			$.ajax({
 				url: url,
 				type: 'POST',
 				data: 'term_id=' + cat_level2,
 				success: function(data){
 					if(data != undefined || data != null || data != 0){
 						$('#cat_level3').empty();
						$('#cat_level3').html($.parseJSON(data));
 						$('#cat_level3').attr('disabled',false).trigger("chosen:updated");
 					}
 				}
 			});
 		}else{
 			$.removeCookie('sel_cat2');
 			$.cookie('sel_cat2', $(this).find('option:selected').attr('backup_id'),{ expires: 1, path:'/', raw: true});
 			location = this.options[this.selectedIndex].value;
 		}
 	});
 	$("#cat_level3").change(function(){
 		$.removeCookie('sel_cat3');
 		$.cookie('sel_cat3', $(this).find('option:selected').attr('backup_id'), { expires: 1, path:'/', raw: true});
 		location = this.options[this.selectedIndex].value;
 	});
 	//footer categories widget
 	var container = $('.categories_wrapper');
 	container.show();
 	container.masonry({
 		itemSelector: '.categories_div',
 		columnWidth: 185,
 		gutter: 10
 	});
 	//delivery page scroll
 	var bufferPx = 100;
	var delay = 1000;
	$('#All_New_Zealand').click(function(){
		$("html, body").animate({ scrollTop: $('.All_New_Zealand').offset().top - bufferPx }, delay);
	});
	$('#Short_Haul').click(function(){
		$("html, body").animate({ scrollTop: $('.Short_Haul').offset().top - bufferPx }, delay);
	});
	$('#Auckland_Outer').click(function(){
		$("html, body").animate({ scrollTop: $('.Auckland_Outer').offset().top - bufferPx }, delay);
	});
	$('#Auckland_Metro_Day').click(function(){
		$("html, body").animate({ scrollTop: $('.Auckland_Metro_Day').offset().top - bufferPx }, delay);
	});
	$('#Auckland_Metro_Evening').click(function(){
		$("html, body").animate({ scrollTop: $('.Auckland_Metro_Evening').offset().top - bufferPx }, delay);
	});
	$('#Notes').click(function(){
		$("html, body").animate({ scrollTop: $('.Notes').offset().top - bufferPx }, delay);
	});
	$('#map_short_haul').click(function(){
		$("html, body").animate({ scrollTop: $('.Short_Haul').offset().top - bufferPx }, delay);
	});
	$('#map_outer_auckland').click(function(){
		$("html, body").animate({ scrollTop:$('.Auckland_Outer').offset().top - bufferPx }, delay);
	});
	//chilly bin tiptip
	if($('.chilly_flake').length){
		$('.chilly_flake').tipTip();
	}
	//scroll to top
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
	if($('.load_more_new_prods').length){
		$('.load_more_new_prods').click(function(event){
			event.preventDefault();
			var parent = $(this).parent();
			var url = $(this).find('a:first').attr('href');
			var main = $(this);
			$(this).html('<img src="/wp-content/themes/superstore/images/ajax-loader.gif" />');
			$.ajax({
 				url: url,
 				type: 'GET',
 				dataType: 'html',
 				success: function(data){
 					var products_html = $(data).find('div.product_list');
 					var final_html = products_html.html();
 					parent.append(products_html).fadeIn(1000);
 					main.hide();
  				}
 			});
		});
	}


	//shopping list stuff
	$('body').on('click', '.remove_from_list', function(){
		//console.log($(this).attr('id'));
			$( '.search_results' ).data("zozoTabs").remove($(this).attr('id'));
			$(".search_results").data('zozoTabs').prev();

		});

	$('.add_more span').click(function(){


		$('#another_item').fadeIn();
		$('#another_item input[type=text]').focus();


	});

	$(document).bind('keypress', function(e){
		if(e.keyCode==13){
             $('#another_item input[type=submit]').trigger('click');
        }
	});

	$('#another_item input[type=submit]').click(function(){

		var keyword = $('#another_item input[type=text]').val();
		keyword = keyword.trim();
		var ajax_keyword = keyword.replace( / /g, '_' ).replace( /[^A-Za-z0-9_]/g, '' );
		ajax_keyword = ajax_keyword + '_ajax';

		//filter keyword
		keyword = keyword.replace( /[^A-Za-z0-9 ]/g, '' );

		if(keyword.length !== 0 ){
			var html_keyword = keyword.replace( / /g, '_' );
			//append in url
			var url = Qurl.create();
			shopping_list = url.query('shopping_list');
			shopping_list = shopping_list + '\r\n' + keyword;
			url.query('shopping_list', shopping_list);
			localStorage.setItem("shopping_list_url", window.location.href);
			$('.search_results').data('zozoTabs').add(keyword, '<div><div id="'+ajax_keyword+'"></div></div>');

			$('ul.z-tabs-nav li').last().attr('data-link', html_keyword);

			//console.log($('.search_results').data('zozoTabs'));
			$('.search_results').data('zozoTabs').last();
			$('#another_item input[type=text]').val('');
			$('#another_item input[type=text]').focus();
		} else {
			$('#another_item input[type=text]').val('');
			$('#another_item input[type=text]').focus();
		}

		// $.cookie('shopping_list', window.location.href, {path:'/'});
		// console.log($.cookie('shopping_list'));


	});

	if(localStorage.getItem("shopping_list_url") !== null){
		$('#my_shopping_list a').attr('href', localStorage.getItem("shopping_list_url"));
	}else{
		$('#my_shopping_list a').attr('href', '/shopping-list/');
	}


});

var onselect = function( event, item ){
	if( undefined == item ){
		return false;
	}
	event.preventDefault();
	var keyword_original = item.tab.text();
	var ajax_keyword = keyword_original;

	ajax_keyword = ajax_keyword.trim();

	ajax_keyword = ajax_keyword.replace( / /g, '_' ).replace( /[^A-Za-z0-9_]/g, '' );
	ajax_keyword = '#' + ajax_keyword + '_ajax';
	//console.log(ajax_keyword);
	if(jQuery(ajax_keyword).length && jQuery(ajax_keyword) !== undefined){

		var data = {
			action: 'shopping_keyword',
			keyword: keyword_original,
			_:'ajax'
		};

		jQuery('.search_results').addClass('fade_wrapper');
		jQuery.post( woocommerce_params.ajax_url, data, function(response){
			jQuery(ajax_keyword).replaceWith(jQuery.parseJSON(response));
			jQuery('.search_results').removeClass('fade_wrapper');
			jQuery('.search_results').data('zozoTabs').refresh();
		});
	}
};

var zozoready = function(){
	localStorage.setItem("shopping_list_url", window.location.href);
}

//https://github.com/ryanburnette/Qurl

var Qurl
  ;

(function () {
  'use strict';

  var proto
    ;

  Qurl = function () {
    if ( !(this instanceof Qurl) ) {
      return new Qurl();
    }
  }

  proto = Qurl.prototype;

  proto.query = function (key,value) {
    if ( !key ) {
      return getSearch();
    }

    if ( key && typeof(value) === 'undefined' ) {
      return getSearch()[key];
    }

    if ( key && typeof(value) !== 'undefined' ) {
      return setSearch(key,value);
    }
  };

  function getSearch() {
    var string = window.location.search
      , pairs = []
      , obj = {}
      ;

    if ( !string ) {
      return obj;
    }
    string = string.replace('?','');

    pairs = string.split('&');
    pairs.forEach(function (p) {
      var pair = decodeURIComponent(p).split('=')
        , key = pair[0]
        , val = pair[1]
        ;

      obj[key] = val;
    });

    return obj;
  }

  function setSearch(key,value) {
    var search = getSearch()
      , string = window.location.search
      ;

    if ( value === false ) {
      delete search[key];
    }
    else {
      search[key] = value;
    }

    setSearchString(getSearchString(search));

    return search;
  }

  function setSearchString(string) {
    history.pushState({}, document.title, string);
  }

  function getSearchString(query) {
    var pairs = []
      ;

    Object.keys(query).forEach(function (key) {
      if ( typeof query[key] === 'undefined' ) {
        pairs.push(key);
      } else {
        pairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(query[key] || ''));
      }
    });

    if ( pairs.length === 0 ) {
      return '?';
    }
    else {
      return '?' + pairs.join('&');
    }
  }

  Qurl.create = Qurl;
}());
