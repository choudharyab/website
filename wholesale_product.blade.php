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
   <div class="container padd_both">
      <div class="row ">
         <div id="content-wrapper">
           <section class="page-content page-cms page-cms-3">

    
<h1 class="page-heading">{{$about_us[0]->heading}}</h1>

<p class="bottom-indent">
   {{$about_us[0]->paragraph1}}
</p>


<p class="bottom-indent">
   {{$about_us[0]->paragraph1}}
</p>
    
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
      
      
           <br/>
       <br/>
         
</section>


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
max: 500,
values: [ 0, 300 ],
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
@stop