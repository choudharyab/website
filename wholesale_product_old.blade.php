@extends('admin_views.layout.website_layout')
@section('content')



<section id="wrapper">
   <div class="laberBreadcrumb">
      <div class="container">
         <nav data-depth="1" class="breadcrumb hidden-sm-down">
            <ol itemscope itemtype="">
               <li itemprop="itemListElement" itemscope itemtype="">
                  <a itemprop="item" href="{{URL::to('/')}}">
                  <span itemprop="name">Home</span>
                  </a>
                
               </li>
			    <li itemprop="itemListElement" itemscope itemtype="">
                  <a itemprop="item" href="{{URL::to('wholesale')}}">
                  <span itemprop="name">Wholesale</span>
                  </a>
                 
               </li>
            </ol>
         </nav>
      </div>
   </div>
   <aside id="notifications">
      <div class="container">
      </div>
   </aside>
   
  @if(session()->has('message'))
     <div class="alert alert-success">
         {{ session()->get('message') }}
     </div>
   @endif
   <div class="container padd_both">
      <div class="row ">
         <div id="content-wrapper">
            <section id="main">
               <!-- <h1>List of products by brand Fashion Manufacturer</h1>-->
               <div id="manufacturer-short_description"></div>
               <div id="manufacturer-description"></div>
               <section id="products" class="active_grid">
                  <ul class="laberGridList pull-left">
                    <!--<a class="Details">
						<span onclick="show_post()" class="div_data11" ><i class="icon ion-ios-settings Filters30"></i>
						<span class="filter_tx"><span><b>Filters</b></span></span></span>
						<span onclick="hide_post()" class="div_data1" style="display:none;"><i class="icon ion-ios-close Filters30"></i>
						<span class="filter_tx"><span><b>Filters</b></span></span>
						</span>
							
						<span class="filter_tx">| 2 filter Applied</span>
					</a>-->
                  </ul>
                 
                  <ul class="laberGridList pull-right">
                     <li id="grid" class="pull-left"><a rel="nofollow" href="javascript:void(0)" title="Grid"><i class="mdi mdi-view-grid"></i></a></li>
                     <li id="list" class="pull-left"><a rel="nofollow" href="javascript:void(0)" title="List"><i class="mdi mdi-view-headline"></i></a></li>
                  </ul>
				  <div class="div_data col-lg-12 col-md-12 col-sm-12 col-xs-12 main_cl" style="display:none;">
				
				  <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
					 <div class="onr">BY Size</div>
					 <div>
							<h2 class="b"></h2>
							<div class="a"></div>
 

					 </div>
				  </div>
				  <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
					 <div class="onr">Range</div>
					  <div>
						<h2 class="d"></h2>
						<div class="c"></div>
					 </div>
				  </div>
				    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button class="button_s" id="save">Save</button>
                    </div>
				  
				  </div>
                  <div class="clearfix"></div>
                  <div id="">
                     <div id="js-product-list">
                        <div  class="laberProductGrid laberProducts">
                           <div class="row row1" id="gridbox">
                                @foreach($product as $key=>$value)

                                   @if(!empty($value['product_image'][0]['image']))
                              <div class="item-inner col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                 <div class="height306">
                                    <!--<article class="product-miniature js-product-miniature" data-toggle="modal" data-target="#productmodal" style="cursor:pointer;">-->
                                    <article class="product-miniature js-product-miniature"  onclick="add_wishlist({{$value['id']}})" style="cursor:pointer;">  
                                       <div class="item">
                                          <div class="products">
                                             <div class="product-container">
                                                <a  class="grid-link">
                                                   <div class="ImageOverlayCa"></div>
                                                   <div class="reveal"> 
                                                      <img src="{{URL::asset('public/uploadimages/'.$value['product_image'][0]['image'])}}" class="featured-image images_prodcusts" alt="Maybelle gold">
                                                   </div>
                                                </a>
                                                <div class="ImageWrapper">
                                                <!-- <div class="product-button">
                                     
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
                                                <img   src="{{ asset('websiteassets/img/eye.png') }}"  class="image_d left_4 top_9" title="View"/>                                   
                                                </a>    
                                                                                         
                                                <a onclick="add_wishlist({{$value['id']}})">                      
                                                 <img  src="{{ asset('websiteassets/img/wishlist.png') }}"  class="image_d left_4" title="Add To Wishlist"/>
                                                </a> 
                                             </div>-->
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
                                    </article>
                                 </div>
                              </div>
                                @endif
                             @endforeach
							  
                           </div>
                        </div>
						<!-- details View -->
                        <div  class="laberProductList laberProducts">
                           <div class="row no-margin" id="longbox">
                                 @foreach($product as $key=>$value)
                                   @if(!empty($value['product_image'][0]['image']))
                              <div class="item-inner clearfix">
                                <!-- <article class="product-miniature js-product-miniature" data-toggle="modal" data-target="#productmodal" style="cursor:pointer;">-->
                                <article class="product-miniature js-product-miniature"  onclick="add_wishlist({{$value['id']}})" style="cursor:pointer;">  
                                    <div class="laberProduct-container item">
                                       <div class="row">
                                         
                                              <div class="products">
                                             <div class="product-container width_100 margin_b0">
                                             <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                                <a  class="grid-link" >
                                                   <div class="ImageOverlayCa"></div>
                                                   <div class="reveal reveal_i"> 
                                                    <center>  <img src="{{URL::asset('public/uploadimages/'.$value['product_image'][0]['image'])}}" class="featured-image" alt="Maybelle gold"></center> 
                                                   </div>
                                                </a>
                                                <div class="ImageWrapper">
                                        
                                                <!--<div class="product-button product-button1">
                    
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
                                                <img   src="{{ asset('websiteassets/img/eye.png') }}"  class="image_d left_4 top_9" title="View"/>                                   
                                                </a>    
                                                <!--<a  class="quick-view-text">    
                                                <img  src="{{ asset('websiteassets/img/link.png') }}"  class="image_d left_4" title="link"/>                                   
                                                </a>-->                                             
                                                <!--<a onclick="add_wishlist({{$value['id']}})">                      
                                                 <img  src="{{ asset('websiteassets/img/wishlist.png') }}"  class="image_d left_4" title="Add To Wishlist"/>
                                                </a> 
                                             </div>-->
                                                </div>
												 
                                             </div>
											             <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                             <div class="laber-product-description padding_top33">
                                                <h2 class="laber-product-title" itemprop="name"><a href="{{URL::to('view_product/'.$value['id'])}}"> {{$value['product_name']}}</a></h2>
                                                 <div class="product_price">
                                             <div class="grid-link__org_price mar_V">
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
                                                <div class="description_short">
                                                   <p>{{$value['description']}}</p>
                                                </div>
                                               </div>
                                              </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </article>
                              </div>
                               @endif
                             @endforeach
                           </div>
                        </div>
						<!-- details View -->
                        <nav class="pagination">
                           <div class="row">
                              <div class="col-md-4">
                                 Showing 1-12 of 13 item(s)
                              </div>
                              <div class="col-md-8">
                                 <div class="laberPagination">
                                    <ul class="page-list clearfix text-xs-center">
                                       <li >
                                          <a
                                             rel="prev"
                                             href="1_fashion-manufacturer2679.html?page=1"
                                             class="previous disabled js-search-link"
                                             >
                                          <i class="material-icons">&#xE314;</i>Previous
                                          </a>
                                       </li>
                                       <li  class="current" >
                                          <a
                                             rel="nofollow"
                                             href="1_fashion-manufacturer2679.html?page=1"
                                             class="disabled js-search-link"
                                             >
                                          1
                                          </a>
                                       </li>
                                       <li >
                                          <a
                                             rel="nofollow"
                                             href="1_fashion-manufacturer4658.html?page=2"
                                             class="js-search-link"
                                             >
                                          2
                                          </a>
                                       </li>
                                       <li >
                                          <a
                                             rel="next"
                                             href="1_fashion-manufacturer4658.html?page=2"
                                             class="next js-search-link"
                                             >
                                          Next<i class="material-icons">&#xE315;</i>
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </nav>
                        <div class="hidden-md-up text-xs-right up">
                           <a href="#header" class="btn btn-secondary">
                           Back to top
                           <i class="material-icons">&#xE316;</i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div id="js-product-list-bottom">
                     <div id="js-product-list-bottom"></div>
                  </div>
               </section>
			   
			   

            </section>
         </div>
      </div>
   </div>
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
                           <!-- 				<p class="page_subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                              -->
                           <div class="heading-line d_none"><span></span></div>
                        </div>
                        <div class="laberblog-i row">
                           <div class="row no-margin home_blog_post_inner carousel">
                              <article class="blog_post col-xs-12 col-sm-2 wow fadeIn " data-wow-delay="100ms">
                                 <div class="blog_post_content">
                                    <div class="blog_post_content_top">
                                       <div class="post_thumbnail laberMedia-body">
                                          <a class="thumbnail" href="">
                                          <img class="xipblog_img img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="vintage for women">
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
                                          <img class="xipblog_img img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="Street style new 2017">
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
                                          <img class="xipblog_img img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="vintage for women">
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
                                 <img class="img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="laberthemes" />
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
                                 <img class="img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="laberthemes" />
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
                                 <img class="img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="laberthemes" />
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
                                 <img class="img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="laberthemes" />
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
                                 <img class="img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="laberthemes" />
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
                                 <img class="img-responsive" src="{{ asset('websitemodules/labtestimonials/views/img/resized_c7fb5206ff755bb022c432fcd3ad2bc6.jpg')}}" alt="laberthemes" />
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


 <div id="productmodal" class="modal " role="dialog">
  <div class="modal-dialog  modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header custimec">
        <button type="button" class="close custimec1" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body pass_n">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pass_n">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 login-text minmax">
      <div class="text_c">Whole Sale</div>
      <div class="text_c1">Enquiry For Products</div>
      <div class="clearfix"></div>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         <section class="login-form">
                    <form enctype="multipart/form-data" id="enquiry_form" role="form" method="POST" action="" >
                           <section class="sassas"> 
                              <div class="form-group">
                                 <div class="">
                                    <input class="form-control passs" name="name" type="text" value="" placeholder="Name" required>
                                 </div>
                              </div>
                             <div class="form-group">
                                 <div class="">
                                    <input class="form-control passs" name="phone"  type="text" value=""  placeholder="Phone No." required>
                                 </div>
                              </div>
                               <div class="form-group">
                                 <div class="">
                                    <input class="form-control passs" name="email"  type="email" value=""  placeholder="Email" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="">
                                    <textarea class="form-control passs" name="message"  placeholder="Message" required  style="height: 75px;"></textarea>
                                 </div>
                              </div>
                               <div class="">
                                    <input type="hidden" name="product_id" id="product_id" value="">
                                    <button type="submit" id="product_enquiry" class="btn btn-primary add-to-cart login-but">
                                       Enquiry
                                    </button>
                               </section> 
                           <p  style="color: #c454e6;font-size: 12px; text-align: center;" id="login_success"></p>
                             
                      </form>
             </section>
      
      </div>
      <div class="clearfix"></div>
     </div>
     <div class="clearfix"></div>
    </div>

  </div>
</div>
</div>


<style>
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
  
  background-color: #EEEEEE;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
  background: #b343d5;
}
.ui-slider-horizontal .ui-slider-handle{
  top: -.5em;
}
.ui-slider-horizontal{
  height: .4em;
  border: 0;
  background-color: #b343d5;
  
  
}
.b{
  border-radius: 3px;
    color: #333;
    display: inline-block;
    font-size: 16px;
    font-weight: 200;
    min-width: 100%;
	text-align: center;
    transition: all 0.3s ease 0s;
  &:hover{
    background-color: darken(#b343d5,5%);
    
  }
}

.d{
  border-radius: 3px;
    color: #333;
    display: inline-block;
    font-size: 16px;
    font-weight: 200;
    min-width: 100%;
	text-align: center;
    transition: all 0.3s ease 0s;
  &:hover{
    background-color: darken(#b343d5,5%);
    
  }
}
  .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus,.ui-state-active{
    border-color: #b343d5;
    border-width: 3px;
    height: 1.2em;
    width: 1.2em;

    background-color: #b343d5  ;
      &:hover,&:focus,&:active{
    background-color: #b343d5;
        
  }
  }

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{border-color: #b343d5;}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
     -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  background-color: #b343d5;
  outline: 0;
  &:hover,&:focus,&:active{
    outline: 0;
    background-color: #b343d5;
    border-color:  #b343d5;
  }
  &:hover{
    background-color: #fff;
    &:active{
      background-color: #b343d5;
    }
  }
}
.ui-widget-header{background:#b343d5 !important;}
.ui-widget-content{background:#C1C1C1 !important;}
</style>
<script>
 $(function() {
   
$( ".a" ).slider({
range: true,
  min: 0,
max: 500,
values: [ 0, 300 ],
slide: function( event, ui ) {
$( ".b" ).text( ui.values[ 0 ] + "MM" + " - " + ui.values[ 1 ] + " MM ");
}
});
$( ".b" ).text( $( ".a" ).slider( "values", 0 ) + "MM" +
" - " + $(".a" ).slider( "values", 1 ) + " MM " );
   
});
</script>

<script>
  $(function() {
   
$( ".c" ).slider({
range: true,
min: 0,
max: 5000,
values: [ 0, 500 ],
slide: function( event, ui ) {
$( ".d" ).text( "Rs." + ui.values[ 0 ] + " - Rs." + ui.values[ 1 ] );
}
});
$( ".d" ).text( "Rs." + $( ".c" ).slider( "values", 0 ) +
" - Rs." + $(".c" ).slider( "values", 1 ) );
   
});
</script>
<script>
	function show_post()
	{
		
		$(".div_data").show("slow");
		$(".div_data1").show("slow");
		$(".div_data11").hide("slow");
	}
	function hide_post()
	{
		$(".div_data").hide("slow");
		$(".div_data1").hide("slow");
		$(".div_data11").show("slow");
		
	}
</script>
 <script>
  function add_wishlist($value)
  {
     $('#product_id').val($value);
     $('#productmodal').modal('show'); 
  }  
  </script>  
  <script>
 $("#product_enquiry").click(function(e){
       e.preventDefault();
         var form=$("#enquiry_form")[0];
         var fd =new FormData(form);
          $.ajax({
               url: '{{url("product_enquiry")}}',
               data:fd,
               async:false,
               type: 'POST',
               processData: false,
               contentType: false,
              success:function(response){
              if(response.flag=="true")
                 {
                       window.location ='{{url("product_enquiry_success")}}';
                 }
                 else if(response.flag=="false")
                  {
                      alert("Unable to sent the enquiry");
                  } 
          },
        });
 });

</script>   
@stop