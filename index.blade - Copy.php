@extends('admin_views.layout.website_layout')
@section('content')

         <section id="wrapper">
            <!--  header slider  -->
            <div class="ImageSlider clearfix">
               <div class="container">
                  <div class="row">
                     <!-- Module labslideshow -->
                     <div class="lab-nivoSlideshow">
                        <div class="lab-loading"></div>
                        <div id="lab-slideshow" class="slides">
                             @foreach($banner as $banners)
                           <img 
                              data-thumb="public/uploadimages/{{ $banners->bannername }}"  
                              src="{{URL::asset('public/uploadimages/'.$banners->bannername)}}"
                              alt="Creative Furniture"
                              title="#htmlcaption7" />
                              @endforeach
                     
                        </div>
                        
                        <div id="htmlcaption7" class=" nivo-html-caption nivo-caption">
                           <div class="timeline" style=" 
                              position:absolute;
                              top:0;
                              left:0;
                              background-color: rgba(0, 0, 0, 0.1);
                              height:5px;
                              -webkit-animation: myfirst 6000ms ease-in-out;
                              -moz-animation: myfirst 6000ms ease-in-out;
                              -ms-animation: myfirst 6000ms ease-in-out;
                              animation: myfirst 6000ms ease-in-out;
                              ">
                           </div>
                               <div class="lab_description left style2">
                              <div class="container">
                                
                                 <div class="title">
                                   {{ $banner[0]->line1 }}       
                                 </div>
                                 <div class="legend">
                                    {{ $banner[0]->line2 }}  
                                 </div>

                                 <div class="description" >
                                    <p> {{ $banner[0]->bannertext }}  </p>
                                  
                                 </div>
                                 <div class="readmore">
                                    <a href="#">Discover now</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script data-cfasync="false" src=""></script><script>
                        $(window).load(function() {
                        	$(document).off('mouseenter').on('mouseenter', '.lab-nivoSlideshow', function(e){
                        		$('.lab-nivoSlideshow .timeline').addClass('lab_hover');
                        	});
                        	$(document).off('mouseleave').on('mouseleave', '.lab-nivoSlideshow', function(e){
                        		$('.lab-nivoSlideshow .timeline').removeClass('lab_hover');
                        	});
                        	$('#lab-slideshow').nivoSlider({
                        		effect: 'random',
                        		slices: 15,
                        		boxCols: 8,
                        		boxRows: 4,
                        		animSpeed: '500',
                        		pauseTime: '6000',
                        		startSlide: 0,
                        		controlNav:  true ,
                        		directionNav: true,
                        		controlNavThumbs: false ,
                        		pauseOnHover: true,
                        		manualAdvance: false,
                        		prevText: '<i class="fa fa-angle-left"></i>',
                        		nextText: '<i class="fa fa-angle-right"></i>',
                        		afterLoad: function(){
                        			$('.lab-loading').css("display","none");
                        		},
                        		beforeChange: function(){
                        			$('.nivo-caption .lab_description').removeClass("active").css("opacity","0");
                        		},
                        		afterChange: function(){
                        			$('.nivo-caption .lab_description').addClass("active" ).css("opacity","1");
                        		}
                        	});
                        });
                     </script>
                     <!-- /Module labslideshow -->
                     <!-- Static Block module -->
                     <!-- /Static block module -->
                  </div>
               </div>
            </div>
            <!--  header slider  -->
            <aside id="notifications">
               <div class="container">
               </div>
            </aside>
            <div>
               
			   
			   <!-- 2nd section -->
               <div class="container">
                  <div class="pic-wrapper">
				     <figure class="pic-1" style="background: url(websiteassets/img/hover2.jpg) no-repeat center center;background-size:cover;"></figure>
                    <figure class="pic-2" style="background: url(websiteassets/img/hover3.jpg) no-repeat center center;background-size:cover;"></figure>
                     <figure class="pic-3" style="background: url(websiteassets/img/hover2.jpg) no-repeat center center;background-size:cover;"></figure>
                     <figure class="pic-4" style="background: url(websiteassets/img/hover3.jpg) no-repeat center center;background-size:cover;"></figure>
		
                  </div>
               </div>
               <div class="col-lg-12 col-xs-12">
                  <div class="shopify-section index-section">
                     <div class="block-section"style="padding-top:0px;padding-bottom:0px;background-color: transparent;">
                        <div class="block_content ">
                           <div class="colgrid">
                              <div class="row" style="z-index: 1;position: relative;">
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box1_category'])}}" data-index="1" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="1">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box1']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty1'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box2_category'])}}" data-index="2" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="2">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box2']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty1'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6  col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box3_category'])}}" data-index="3" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="3">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box3']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty3'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box4_category'])}}" data-index="4" data-bgset="/images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="4">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box4']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty4'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             discover now 
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box5_category'])}}" data-index="5" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="5">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box5']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty5'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box6_category'])}}" data-index="6" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="6">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box6']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty6'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box7_category'])}}" data-index="7" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="7">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box7']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty7'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                                 <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3 width_for_640" >
                                    <a class="colgrid__box lazyload" href="{{URL::to('product/'.$add_box[0]['box8_category'])}}" data-index="8" data-bgset="images.jpg"
                                       data-sizes="auto" data-src="background-image: url(images.jpg)" data-index="8">
                                       <h3 class="colgrid__box--tit">{{$add_box[0]['box8']}}</h3>
                                       <span class="colgrid__box--number">{{count($add_box[0]['product_qty8'])}} Items</span>
                                       <span class="colgrid__box--link">
                                          <span class="colgrid--child">
                                             Explore
                                             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="next-icon pull-right" x="0" y="0" width="50" height="40" viewBox="0 0 50 40" enable-background="new 0 0 50 40" xml:space="preserve" aria-disabled="false" display="block">
                                                <path d="M34.7 19.2L30.9 15.3c-0.4-0.4-1.1-0.4-1.5 0-0.4 0.4-0.4 1.1 0 1.6l2 2H16.1c-0.6 0-1.1 0.5-1.1 1.1 0 0.6 0.5 1.1 1.1 1.1h15.3l-2 2c-0.4 0.4-0.4 1.1 0 1.6 0.4 0.4 1.1 0.4 1.5 0l3.8-3.9c0 0 0 0 0.1-0.1 0 0 0 0 0 0 0 0 0 0 0 0 0.1-0.2 0.2-0.4 0.2-0.7 0-0.2-0.1-0.5-0.2-0.7 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0-0.1-0.1C34.7 19.2 34.7 19.2 34.7 19.2z"/>
                                             </svg>
                                          </span>
                                       </span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- 2nd section -->
            
			<div class="clearfix"></div>
           

		   <!-- 3nd section -->
            <div class="displayPosition displayPosition3">
            <div class="container">
               <div class="row">
                  <!-- <script type="text/javascript" src="/prestashop/v17/laber_outstock_v17/homepage3/modules/labproductfilter/views/js/jquery-1.7.1.min.js"></script> -->
                  <div class="Lab-featured-prod laberProductFilter laberthemes laberProductGrid clearfix">
                     <div class="title_block">
                        <h3><span>New Arrivals</span></h3>
                     </div>
                     <div class="prod-filter labContent">
                        <div class="labProductFilter row">
                           <div class="owlProductFilter-Lab-featured-prod ">

                              @foreach($product as $key=>$value)
                                  @if(!empty($value['product_image'][0]['image']))
                              <div class="item-inner  ajax_block_product wow fadeIn " data-wow-delay="100ms">
                                 <div class="item">
                                    <div class="products">
                                       <div class="product-container">
                                          <a href="{{URL::to('view_product/'.$value['id'])}}" class="grid-link">
                                             <div class="ImageOverlayCa"></div>
                                             <div class="reveal"> 
                                                <img   src="{{URL::asset('public/uploadimages/'.$value['product_image'][0]['image'])}}"
                                                class="featured-image des_h281" alt="Maybelle gold" style="width:100%">
                                             </div>
                                          </a>
                                        <!-- <div class="ImageWrapper">
                                             <div class="product-button">
                                                @if(!empty($value['sale_quantity'][0]['sale_quantity']) && $value['sale_quantity'][0]['sale_quantity']==$value['quantity'])
                                                <a class="add-cart-btn" title="Out Of Stock">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Out Of Stock"/>                                 
                                                </a>
                                                @else
                                                <a class="add-cart-btn" href="{{URL::to('addCart/'.$value['id'])}}">
												            <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Add To Cart"/>                                 
                                                </a>
                                                @endif
                                                <a  class="quick-view-text" href="{{URL::to('view_product/'.$value['id'])}}">   
													         <img   src="{{ asset('websiteassets/img/eye.png') }}"  class="image_d top_9" title="View"/>												
                                                </a>    
                                                												    
                                                <a onclick="add_wishlist({{$value['id']}})">                      
                                                 <img  src="{{ asset('websiteassets/img/wishlist.png') }}"  class="image_d" title="Add To Wishlist"/>
                                                </a> 
                                             </div>
                                          </div>-->
										   <div class="product-button" style="margin-left:175px;">
												  <a onclick="add_wishlist({{$value['id']}})">                      
                                                 <img  src="{{ asset('websiteassets/img/wishlist.png') }}"  class="image_d left_4" title="Add To Wishlist" />
                                                </a> 
												 
										  </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="product-detail">
                                    <div class="product_left">
                                       <a class="grid-link__title" href="{{URL::to('view_product/'.$value['id'])}}">
                                        {{$value['product_name']}}</a>     
                                       <div class="grid-link__meta">
                                          <div class="product_price">
                                             <div class="grid-link__org_price">
                                                <span class="money checked">$ {{$value['amount']}}</span>
                                             </div>
                                             <div class="font-size12">
                                                <i class="fa fa-star checked" aria-hidden="true"></i>
                                                <i class="fa fa-star checked" aria-hidden="true"></i>
                                                <i class="fa fa-star checked" aria-hidden="true"></i>
                                                <i class="fa fa-star checked" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                             </div>
                                          </div>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endif
							        @endforeach
							  
							
                           </div>
                        </div>
                        <script type="text/javascript">
                           $(document).ready(function() {
                           	var owl = $(".owlProductFilter-Lab-featured-prod");
                           	owl.owlCarousel({
                           		items : 5,
                           		itemsDesktop : [1199,4],
                           		itemsDesktopSmall : [991,3],
                           		itemsTablet: [767,2],
                           		itemsMobile : [480,2],
                           		navigation : true,
                           		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                           		rewindNav : false,
                           		autoPlay :  false,
                           		stopOnHover: false,
                           		pagination : false,
                           	});
                           });
                        </script>
                     </div>
                  </div>
               </div>
            </div>
            <!-- 3nd section -->
            
			
			<!-- 4th section -->
            <div class="Lab-new-prod laberProductFilter laberthemes laberProductGrid clearfix">
               <div class="title_block">
                  <h3><span>Featured Products</span></h3>
               </div>
               <div class="prod-filter labContent">
			    <div class="labProductFilter col-xs-12 col-sm-6 col-md-6 col-lg-6 padd_none hd_m">
					 <img src="websiteassets/img/5.jpg" alt="Creative Furniture" class="cl_768"/>
				
				</div>
			   
                  <div class="labProductFilter col-xs-12 col-sm-6 col-md-6 col-lg-6 padd_none">
                     <div class="owlProductFilter-Lab-new-prod "> 
                  
                  <?php $i=0; ?>
					  @foreach($featured_product as $key=>$value)
                      @if(!empty($featured_product[$i]['product_image'][0]['image']))
                        <div class="item-inner inn_pad ajax_block_product wow fadeIn " data-wow-delay="900ms">  
                           <div class="">
                              <article class="product-miniature js-product-miniature images_dbdb" >
                                 <div class="laberProduct-container">
                                    <div class="item">
                                       <div class="products">
                                          <div class="product-container">
                                             <a href="{{URL::to('view_product/'.$featured_product[$i]['id'])}}" class="grid-link">
                                                <div class="ImageOverlayCa"></div> 
                                                <div class="reveal"> 
                                                   <img  src="{{URL::asset('public/uploadimages/'.$featured_product[$i]['product_image'][0]['image'])}}"
                                                     class="featured-image des_h248" alt="Maybelle gold">
                                                </div>

                                             </a>
                                             <div class="ImageWrapper">
                                 
                                                 <div class="product-button">
                                               <!-- <a class="add-cart-btn" href="{{URL::to('addCart/'.$featured_product[$i]['id'])}}">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Add To Cart"/>                                 
                                                </a>-->
                                                   @if(!empty($featured_product[$i]['sale_quantity'][0]['sale_quantity']) && $featured_product[$i]['sale_quantity'][0]['sale_quantity']==$value['quantity'])
                                                <a class="add-cart-btn" title="Out Of Stock">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Out Of Stock"/>                                 
                                                </a>
                                                @else
                                                <a class="add-cart-btn" href="{{URL::to('addCart/'.$featured_product[$i]['id'])}}">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Add To Cart"/>                                 
                                                </a>
                                                @endif
                                                <a  class="quick-view-text" href="{{URL::to('view_product/'.$featured_product[$i]['id'])}}">   
                                                <img   src="{{ asset('websiteassets/img/eye.png') }}"  class="image_d top_9" title="View"/>                                   
                                                </a>    
                                                <!--<a  class="quick-view-text">    
                                                <img  src="{{ asset('websiteassets/img/link.png') }}"  class="image_d" title="link"/>                                   
                                                </a>-->                                             
                                                <a onclick="add_wishlist({{$featured_product[$i]['id']}})">                      
                                                 <img  src="{{ asset('websiteassets/img/wishlist.png') }}"  class="image_d" title="Add To Wishlist"/>
                                                </a> 
                                             </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="product-detail">
                                       <div class="product_left">
                                          <a class="grid-link__title" href="{{URL::to('view_product/'.$featured_product[$i]['id'])}}">
                                         {{$featured_product[$i]['product_name']}}</a>     
                                          <div class="grid-link__meta">
                                             <div class="product_price">
                                                <div class="grid-link__org_price">
                                                   <span class="money checked">${{$featured_product[$i]['amount']}}</span>
                                                </div>
                                                <div class="font-size12">
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                   <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                             </div>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                           </div>
                            @if(!empty($featured_product[$i+1]['product_image'][0]['image']))
                           <div class="">
                              <article class="product-miniature js-product-miniature images_dbdb">
                                 <div class="laberProduct-container">
                                    <div class="item">
                                       <div class="products">
                                          <div class="product-container">
                                             <a href="{{URL::to('view_product/'.$featured_product[$i+1]['id'])}}" class="grid-link">
                                                <div class="ImageOverlayCa"></div>
                                            
                                                <div class="reveal"> 
                                                   <img  src="{{URL::asset('public/uploadimages/'.$featured_product[$i+1]['product_image'][0]['image'])}}"
                                                   class="featured-image des_h248" alt="Maybelle gold">
                                                </div>

                                             </a>
                                              <div class="ImageWrapper">
                                    
                                                 <div class="product-button">
                                                <!--<a class="add-cart-btn" href="{{URL::to('addCart/'.$featured_product[$i+1]['id'])}}">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Add To Cart"/>                                 
                                                </a>-->
                                                @if(!empty($featured_product[$i+1]['sale_quantity'][0]['sale_quantity']) && $featured_product[$i+1]['sale_quantity'][0]['sale_quantity']==$value['quantity'])
                                                <a class="add-cart-btn" title="Out Of Stock">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Out Of Stock"/>                                 
                                                </a>
                                                @else
                                                <a class="add-cart-btn" href="{{URL::to('addCart/'.$featured_product[$i]['id'])}}">
                                                <img src="{{ asset('websiteassets/img/ecommerce.png') }}" class="image_d" title="Add To Cart"/>                                 
                                                </a>
                                                @endif
                                                <a  class="quick-view-text" href="{{URL::to('view_product/'.$featured_product[$i+1]['id'])}}">   
                                                <img   src="{{ asset('websiteassets/img/eye.png') }}"  class="image_d top_9" title="View"/>                                   
                                                </a>    
                                                <!--<a  class="quick-view-text">    
                                                <img  src="{{ asset('websiteassets/img/link.png') }}"  class="image_d" title="link"/>                                   
                                                </a>-->                                             
                                                <a onclick="add_wishlist({{$featured_product[$i+1]['id']}})">                      
                                                 <img  src="{{ asset('websiteassets/img/wishlist.png') }}"  class="image_d" title="Add To Wishlist"/>
                                                </a> 
                                             </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="product-detail">
                                       <div class="product_left">
                                          <a class="grid-link__title" href="{{URL::to('view_product/'.$featured_product[$i+1]['id'])}}">
                                          {{$featured_product[$i+1]['product_name']}}</a>     
                                          <div class="grid-link__meta">
                                             <div class="product_price">
                                                <div class="grid-link__org_price">
                                                   <span class="money checked">${{$featured_product[$i+1]['amount']}}</span>
                                                </div>
                                                <div class="font-size12">
                                                   <i class="fa fa-star checked" aria-hidden="true"></i>
                                                   <i class="fa fa-star checked" aria-hidden="true"></i>
                                                   <i class="fa fa-star checked" aria-hidden="true"></i>
                                                   <i class="fa fa-star checked" aria-hidden="true"></i>
                                                   <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                </div>
                                             </div>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                           </div>
                           @endif
                        </div>
                        @endif
                        <?php $i=$i+2;?>
						 @endforeach
							  
			
						
                      
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  $(document).ready(function() {
                  	var owl = $(".owlProductFilter-Lab-new-prod");
                  	owl.owlCarousel({
                  		items : 3,
                  		itemsDesktop : [1199,2],
                  		itemsDesktopSmall : [991,2],
                  		itemsTablet: [767,2],
                  		itemsMobile : [480,2],
                  		navigation : true,
                  		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                  		rewindNav : false,
                  		autoPlay :  false,
                  		stopOnHover: false,
                  		pagination : false,
                  	});
                  });
               </script>
            </div>
            <!-- 4th section -->
           

		   <div class="container">
               <div class="row">
                  <div id="content-wrapper">
                     <div id="main">
                        <div id="content" class="page-home">
                           <!-- Static Block module -->
                           <!-- /Static block module -->
                        </div>
                        <footer class="page-footer">
                           <!-- Footer content -->
                        </footer>
                     </div>
                  </div>
               </div>
            </div>
			 <div class="laberBlog">
               <div class="container">
                  <div class="home_blog_post_area general displayBlog">
                     <div class="home_blog_post">
                        <div class="page_title_area">
                           <h3 class="page-heading">
                              <span>Latest Blog</span>
                           </h3>

                           <div class="heading-line d_none"><span></span></div>
                        </div>
                        <div class="laberblog-i row">
                           <div class="row no-margin home_blog_post_inner carousel">
                              <article class="blog_post col-xs-12 col-sm-2 wow fadeIn " data-wow-delay="100ms">
                                 <div class="blog_post_content">
                                    <div class="blog_post_content_top">
                                       <div class="post_thumbnail laberMedia-body">
                                          <a class="thumbnail" href="">
                                          <img class="xipblog_img img-responsive"
                                          src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}"
                                          alt="vintage for women">
                                          </a>

                                       </div>
                                    </div>
                                    <div class="blog_post_content_bottom">
										<div class="meta_date pull-left">
                                             <span>01</span>, February
                                        </div>
                                         <div class="clearfix"></div>
										 <div class="meta_author pull-left">
                                            <span><i class="fa fa-user" aria-hidden="true"></i> Posted By</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="m_left"><i class="fa fa-comments-o" aria-hidden="true"></i> 30 Comments<span>
										</div>
                                       <div class="post_meta clearfix">
									    <h3 class="post_title blog_s_m"><a href="">vintage for women</a></h3>
                                       </div>
                                       <div class="post_content">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ...</p>
                                       </div>
                                       <div class="content_more">
                                          <a class="read_more" href="">Read more <i class="fa  fa-angle-double-right"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                              <article class="blog_post col-xs-12 col-sm-3 wow fadeIn " data-wow-delay="200ms">
                                 <div class="blog_post_content">
                                    <div class="blog_post_content_top">
                                       <div class="post_thumbnail laberMedia-body">
                                          <a class="thumbnail" href="">
                                          <img class="xipblog_img img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="Street style new 2017">
                                          </a>
                                         
                                       </div>
                                    </div>
                                     <div class="blog_post_content_bottom">
										<div class="meta_date pull-left">
                                             <span>01</span>, February
                                        </div>
                                         <div class="clearfix"></div>
										 <div class="meta_author pull-left">
                                            <span><i class="fa fa-user" aria-hidden="true"></i> Posted By</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="m_left"><i class="fa fa-comments-o" aria-hidden="true"></i> 30 Comments<span>
										</div>
                                       <div class="post_meta clearfix">
									    <h3 class="post_title blog_s_m"><a href="">vintage for women</a></h3>
                                       </div>
                                       <div class="post_content">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ...</p>
                                       </div>
                                       <div class="content_more">
                                          <a class="read_more" href="">Read more <i class="fa  fa-angle-double-right"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                              <article class="blog_post col-xs-12 col-sm-3 wow fadeIn " data-wow-delay="300ms">
                                 <div class="blog_post_content">
                                    <div class="blog_post_content_top">
                                       <div class="post_thumbnail laberMedia-body">
                                          <a class="thumbnail" href="">
                                          <img class="xipblog_img img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="vintage for women">
                                          </a>
                                         
                                       </div>
                                    </div>
                                       <div class="blog_post_content_bottom">
										<div class="meta_date pull-left">
                                             <span>01</span>, February
                                        </div>
                                         <div class="clearfix"></div>
										 <div class="meta_author pull-left">
                                            <span><i class="fa fa-user" aria-hidden="true"></i> Posted By</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="m_left"><i class="fa fa-comments-o" aria-hidden="true"></i> 30 Comments<span>
										</div>
                                       <div class="post_meta clearfix">
									    <h3 class="post_title blog_s_m"><a href="">vintage for women</a></h3>
                                       </div>
                                       <div class="post_content">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ...</p>
                                       </div>
                                       <div class="content_more">
                                          <a class="read_more" href="">Read more <i class="fa  fa-angle-double-right"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              </article>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
			
			
            <div class="laberTestimonial">
               <div class="home_blog_post">
			       <div class="page_title_area w_testi">
                           <h3 class="page-heading m_b_class">
                              <span class="m_b_class">What Our Customer Say About US</span>
                           </h3>
                           <!-- 				<p class="page_subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                              -->
                           <div class="heading-line d_none"><span></span></div>
                        </div>
                  <div class="row">
                     <div class="laberTestimonialOwl">
                        <div class="item-inner">
                           <div class="item" style="box-shadow: none;">
                               <div class="col-md-6 col-xs-12 padd_none">
							   <div class="laberComment" >
                                 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                              </div>
                              <div class="image col-md-4 col-xs-12">
                                 <span>
                                 <img class="img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}"alt="laberthemes" />
                                 </span>
                              </div>
                              <div class="laberA col-md-8 col-xs-12">
                                 <span class="laberAuthor checked">laberthemes</span>
                                 <span class="laberOffice">
                                 CEO & Founder DooTr
                                 </span>
                              </div>
												<div class="font-size12 text_l">
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
												</div>
							  </div>
							  
							  
							   <div class="col-md-6 col-xs-12 padd_none">
							   <div class="laberComment" >
                                 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                              </div>
                              <div class="image col-md-4 col-xs-12">
                                 <span>
                                 <img class="img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="laberthemes" />
                                 </span>
                              </div>
                              <div class="laberA col-md-8 col-xs-12">
                                 <span class="laberAuthor checked">laberthemes</span>
                                 <span class="laberOffice">
                                 CEO & Founder DooTr
                                 </span>
                              </div>
												<div class="font-size12 text_l">
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star-half-o" aria-hidden="true"></i>
												</div>
							  </div>
							  
                           </div>
                        </div>
                        <div class="item-inner">
                             <div class="item" style="box-shadow: none;">
                             <div class="col-md-6 col-xs-12 padd_none">
							   <div class="laberComment" >
                                 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                              </div>
                              <div class="image col-md-4 col-xs-12">
                                 <span>
                                 <img class="img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="laberthemes" />
                                 </span>
                              </div>
                              <div class="laberA col-md-8 col-xs-12">
                                 <span class="laberAuthor checked">laberthemes</span>
                                 <span class="laberOffice">
                                 CEO & Founder DooTr
                                 </span>
                              </div>
												<div class="font-size12 text_l">
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star-half-o" aria-hidden="true"></i>
												</div>
							  </div>
							  
							   <div class="col-md-6 col-xs-12 padd_none">
							   <div class="laberComment" >
                                 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                              </div>
                              <div class="image col-md-4 col-xs-12">
                                 <span>
                                 <img class="img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="laberthemes" />
                                 </span>
                              </div>
                              <div class="laberA col-md-8 col-xs-12">
                                 <span class="laberAuthor checked">laberthemes</span>
                                 <span class="laberOffice">
                                 CEO & Founder DooTr
                                 </span>
                              </div>
												<div class="font-size12 text_l">
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star checked" aria-hidden="true"></i>
                                       <i class="fa fa-star-half-o" aria-hidden="true"></i>
												</div>
							  </div>
                           </div>
                        </div>
                        <div class="item-inner">
                            <div class="item" style="box-shadow: none;">
                               <div class="col-md-6 col-xs-12 padd_none">
							   <div class="laberComment" >
                                 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                              </div>
                              <div class="image col-md-4 col-xs-12">
                                 <span>
                                 <img class="img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="laberthemes" />
                                 </span>
                              </div>
                              <div class="laberA col-md-8 col-xs-12">
                                 <span class="laberAuthor checked">laberthemes</span>
                                 <span class="laberOffice">
                                 CEO & Founder DooTr
                                 </span>
                              </div>
												<div class="font-size12 text_l">
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
												</div>
							  </div>
							  
							  
							   <div class="col-md-6 col-xs-12 padd_none">
							   <div class="laberComment" >
                                 Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.
                              </div>
                              <div class="image col-md-4 col-xs-12">
                                 <span>
                                 <img class="img-responsive"  src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg') }}" alt="laberthemes" />
                                 </span>
                              </div>
                              <div class="laberA col-md-8 col-xs-12">
                                 <span class="laberAuthor checked">laberthemes</span>
                                 <span class="laberOffice">
                                 CEO & Founder DooTr
                                 </span>
                              </div>
												<div class="font-size12 text_l">
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star checked" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
												</div>
							  </div>
							  
                           </div>
                        </div>
                     </div>
                     <script type="text/javascript">
                        $(document).ready(function() {
                        	var owl = $(".laberTestimonialOwl");
                        	owl.owlCarousel({
                        		items : 1,
                        		itemsDesktop : [1199,1],
                        		itemsDesktopSmall : [991,1],
                        		itemsTablet: [767,1],
                        		itemsMobile : [480,1],
                        		rewindNav : false,
                        		autoPlay :  true,
                        		stopOnHover: false,
                        		pagination : true,
                        	});
                        });
                     </script>
                  </div>
               </div>
            </div>
         </section>
         <!------------------------------------modal ---------------------------------->



    <!------------------------------------end ---------------------------------->

  <script>
  function add_wishlist($value)
  {

      $.ajax({
                 url: '{{url("add_wishlist")}}',
                 method:'POST',
                 dataType:'json',
                 data :{value:$value},
                 cache:false,
                 success: function(response)
                 {
                      if(response.flag=='false')
                      {
                         $('#myModal').modal('show'); 
                      }else
                      {
                         window.location ='{{url("login_success")}}';
                      } 
                 }
         });
  }  
  </script>     

@stop