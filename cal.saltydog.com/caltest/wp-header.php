<?php
// =============================================================================
// VIEWS/INTEGRITY/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Integrity.
// =============================================================================
?>

<?php x_get_view( 'global', '_header' ); ?>
<?php
if(is_page('homeslider')){
 ?>
  <div id="top" class="site">
<style>
.single_job_listing .company{
			display:none !important;
		}
  #wrapper {

				width: 100%;

				z-index:9999;
			}
 #carousel-wrapper {

				position: relative;
				max-height:300px;
			}
			#carousel, #thumbs {
				overflow: hidden;
			}
			#carousel-wrapper .caroufredsel_wrapper {
				border-radius: 0px;
				box-shadow: none;
			}

			#carousel span, #carousel img,
			#thumbs a, #thumbs img  {
				display: block;
				float: left;
			}
			#carousel span, #carousel a,
			#thumbs span, #thumbs a {
				position: relative;
			}
			#carousel img,
			#thumbs img {
				border: none;
				width: 100%;
				height: 100%;
				/*position: absolute;*/
				top: 0;
				left: 0;
			}
			#carousel{
				max-height:300px;
			}
			#carousel img.glare,
			#thumbs img.glare {
				width: 102%;
				height: auto;
			}

			#carousel span {
				width: 554px;
				height: 313px;
			}

			#thumbs-wrapper {
				padding: 10px 40px;
				position: relative;
			}
			#thumbs a {

				width: 150px;
				height: 100px;
				margin: 0 10px;
				overflow: hidden;


				-webkit-transition: border-color .5s;
				-moz-transition: border-color .5s;
				-ms-transition: border-color .5s;
				transition: border-color .5s;
			}
			#thumbs a:hover, #thumbs a.selected {

			}
			.caroufredsel_wrapper{

			}
			#wrapper img#shadow {
				width: 100%;
				position: absolute;
				bottom: 0;
			}

			#prev, #next {
				/*background: transparent url('http://saltydog.com/formtest/img/gui/carousel_nav.png') no-repeat 0 0;*/
				display: block;
				width: 30px;
				height: 100%;
				margin-top: 0px;
				position: absolute;
				top: 0%;
				background:#3b3b3b;
				opacity:.8;
				color:#fff;
			}
			#prev {
				background-position: 0 0;
				left: 0px;
			}
			#next {
				background-position: -19px 0;
				right: 0px;
			}
			#prev:hover {
				background-position: 0 -20px;
			}
			#next:hover {
				background-position: -19px -20px;
			}
			#prev.disabled, #next.disabled {
				display: none !important;
			}

			#donate-spacer {
				height: 100%;
			}
			#donate {
				border-top: 1px solid #999;
				width: 750px;
				padding: 50px 75px;
				margin: 0 auto;
				overflow: hidden;
			}
			#donate p, #donate form {
				margin: 0;
				float: left;
			}
			#donate p {
				width: 650px;
			}
			#donate form {
				width: 100px;
			}
			.around{
				max-width:1000px;
				margin:0 auto;
			}
			#thumbs span{
				/*background:rgba(255,255,255,.8);*/
				background:#fff;
				width:100%;
				position:relative;
				top:78%;
				color:#2c3e50;
				padding:5px;
				text-align:center;
				-webkit-font-smoothing:antialiased;
			line-height:10px;
				display:block;
				display:none;
			}
			#thumbs-wrapper{
				padding:0;
			}
			#thumbs a{
				margin:0;
			}
			.bio{
	width:100%;
	max-width:500px;
	background:rgba(255,255,255,.9);
	padding:20px;
	box-shadow: 3px 3px 5px rgba(0,0,0,1);
	min-height:700px;
	position:relative;
	top:50%;
	margin-top:-350px;
	left:50%;
	margin-left:-300px;
	position:fixed;
	display:none;
	z-index:9999;
	color:#333;
}
.close,.author-image{
	cursor:pointer;
	z-index:9999;
}
.chef-image img{
	float:left;
	padding:3px;
	border:1px solid #ddd;
	margin:40px 10px 0px 20px;
}
.chef-name h3{
	font-size:18px;
	font-weight:normal;
	padding-bottom:20px;
}
.chef-position{
	width:100%;
	text-align:center;
	font-family:sans-serif;
}
.chef-name h3{
	color:#000;
	font-weight:normal;
}
.chef-details p{
	padding:0 20px;
	font-size:14px;
	line-height:16px;
}

			@media( max-width: 885px ){
				#thumbs span{
					font-size:12px;
					top:61%;
				}
			}
			@media( max-width: 1025px ){
				#legend{
					margin-top:20px !important;
				}
			}
</style>
<style>
#advps_container3{
	max-height:408px !important;
}
.masthead.fixed{
  position:fixed !important;
  z-index: 9999;
  top:0;
}
.x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
	font-size:14px !important;
	-webkit-font-smoothing:antialiased !important;
	font-weight:bold !important;
	text-transform:uppercase;
}
.x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
}
.x-navbar .x-nav > li > a{
	padding:0 15px !important;
}
.x-navbar .x-nav > li:first-child a{
	padding-left:0 !important;
}
@media only screen and ( max-width: 1280px ){
	.x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
	font-size:12px !important;
	font-family:open_sansregular !important;
	-webkit-font-smoothing:antialiased !important;
	font-weight:bold !important;
	text-transform:uppercase;
}
.x-navbar .x-nav > li > a{
	padding:0 15px !important;
}
}
@media only screen and ( max-width: 1170px ){
	.x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
	font-size:11px !important;
	font-family:open_sansregular !important;
	-webkit-font-smoothing:antialiased !important;
	font-weight:bold !important;
	text-transform:uppercase;
}
.x-navbar .x-nav > li > a{
	padding:0 15px !important;
}
}
@media only screen and ( max-width: 480px ){
.mosaicflow3{
	position:relative;
}
}
@media ( max-width: 885px ){
	.weatherInfo{
		font-size:14px !important;
		line-height:16px !important;
	}
	.weatherInfo span#temp{
		font-size:50px !important;
	}
}
@media ( max-width: 720px ){
	#tick2{
		display:none;
	}
}
@media ( max-width: 640px ){
	.cam{
		display:none;
	}
}
@media ( max-width: 900px ){
#legend{
margin-top:0 !important;
}
#slide{
display:none !important;
}
}
</style>
<link rel="stylesheet" href="https://saltydog.com/img/slide/css/flexslider.css" type="text/css" media="screen" />
<?php if (!is_page('receipt-form')){?>
    <header class="masthead" role="banner" style="z-index:888888;position:relative;margin-bottom:0px;">
      <?php x_get_view( 'global', '_topbar' ); ?>
      <?php x_get_view( 'global', '_navbar' ); ?>
      <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>
    </header>
<?php }?>
<style>

#nextend-smart-slider-1{
	float:none !important;
}
</style>
        <?php
	if ( (is_page('Front Page') || is_page('form-test') || is_page('homeslider'))){
		?>

	  <div id="slide" style="z-index:8888;margin:0 auto 50px;max-width:1100px;width:90%;position:relative;top:10px;display:block;border:0px solid rgba(255,255,255,.5);">

      <div clas="large-12 columns">
      <div class="large-9 medium-9 columns" style="padding-left:0;padding-right:0;">

        <style>
		.flexslider {
    margin: 0 0 60px;
    background: transparent !important;
    border: 0 !Important;
    position: relative;
    zoom: 1;
	margin:0 0 0 !important;
		}
		.flex-direction-nav a{
			background:transparent !important;
			color:#fff !important;
			height:100px;
			/*display:none !important;*/
		}
		.flex-direction-nav a:before{
			background:transparent !important;
			color:#fff !important;
		}
		.slides li{
			cursor:pointer;
		}
		.flex-nav-next{
			right:10px !important;
			padding-top:40px !important;
			margin-top:-40px !important;
			left:none !important;


		}
.log2{
	display:none;
}
	@media (max-width: 600px){
		.log2{
			width:40px;
			top:5px !important;
			right:5px !important;
		}

	}
    </style>

        <div id="main" role="main">
      <section class="slider">
        <div id="slider2" class="flexslider">
          <!-- Social Media Brand Colors

          twitter:     #00aced     rgb(0, 172, 237)
          facebook:    #3b5998     rgb(59, 89, 152)
          googleplus:  #dd4b39     rgb(221, 75, 57)
          pinterest:   #cb2027     rgb(203, 32, 39)
          linkedin:    #007bb6     rgb(0, 123, 182)
          youtube:     #bb0000     rgb(187, 0, 0)
          vimeo:       #aad450     rgb(170, 212, 80)
          tumblr:      #32506d     rgb(50, 80, 109)
          instagram:   #517fa4     rgb(81, 127, 164)
          flickr:      #ff0084     rgb(255, 0, 132)
          dribbble:    #ea4c89     rgb(234, 76, 137)
          quora:       #a82400     rgb(168, 36, 0)
          foursquare:  #0072b1     rgb(0, 114, 177)
          forrst:      #5B9A68     rgb(91, 154, 104)
          vk:          #45668e     rgb(69, 102, 142)
          wordpress:   #21759b     rgb(33, 117, 155)
          stumbleupon: #EB4823     rgb(235, 72, 35)
          yahoo:       #7B0099     rgb(123, 0, 153)
          blogger:     #fb8f3d     rgb(251, 143, 61)
          soundcloud:  #ff3a00     rgb(255, 58, 0)

          -->

         <ul class="slides">
      <li><a href="https://saltydogtshirt.com" target="tshirt"> <img src="/img/eventBanner.jpg" width="825" height="334" alt="Salty Dog Event Banner" title="Shamrock Dog"></a>
<div style="height:75px;background:#3b3b3b">
<style>
@media only screen and ( max-width: 1185px ){
	.social{
		font-size:2rem !important;
}
	}
	</style>
  <div class="social large-9 medium-9 small-9 columns" style="height:75px;background: #ffffff;text-align:center;line-height:75px;color:#082F87;font-size:2.5rem;font-weight:300;padding-left:5rem;">
<div class="log2" style="position:absolute;top:0px;left:0px;height:75px;z-index:999;"><img src="http://saltydog.com/img/2yearstoolatelogo.jpg" style="height:75px !important;width:auto !important"></div>
FOLLOW THE SALTY DOG!
</div>
  <div class="large-1 medium-1 small-1 columns" style="height:75px;background:#547BBC;line-height:75px;color:#fff;font-size:32px;text-align:center;padding:0 !important"><a style="width:100%;height:100%;display:block;color:#fff;" target="facebook" href="https://www.facebook.com/SaltyDog/"><i class="fa fa-facebook" style=""></i></a></div>
  <div class="large-1 medium-1 small-1 columns" style="height:75px;background:#D01700;line-height:75px;color:#fff;font-size:32px;text-align:center;padding:0 !important"><a style="width:100%;height:100%;display:block;color:#fff;" target="instagram" href="https://www.instagram.com/thesaltydogcafe/"><i class="fa fa-instagram" style="width:100%;"></i></a></div>
  <div class="large-1 medium-1 small-1 columns" style="height:75px;background:#00aced;line-height:75px;color:#fff;font-size:32px;text-align:center;padding:0 !important"><a style="width:100%;height:100%;display:block;color:#fff;" target="twitter" href="https://twitter.com/thesaltydogcafe"><i class="fa fa-twitter" style=""></i></a></div>
</div>
</li>
          </ul>
        </div>
        </section>
        </div>
        </div>


        <div class="large-3 medium-3 columns cam" style="padding-right:0;position:relative;">

      <div style="position:absolute;top:5px;left:20px;color:red;font-size:16px;font-weight:bold;padding:3px;background:rgba(255,255,255,.5);font-family:sans-serif;-webkit-font-smooting:antialiased;">LIVE</div>
      <a class="holder oneShot" href="http://saltydog.com/pages/webcams/" style="color:#fff;width:100%;display:block;">

    <img id="cam" src="#" style="width:100%;">



      <!-- <iframe src="camframe.html" style="width:100%;height:197px;" frameborder="0" scrolling="no"></iframe>-->
</a>

<div style="width:100%;display:block;margin-top:15px;color:#fff;font-family:'open sans',sans-serif;position:relative;">
<a href="http://saltydog.com/hilton-head-weather" style="color:#fff;">
        <img src="http://saltydog.com/weatherIcon.jpg" style="width:100%;">
        <div class="weath" style="width:100%;height:100%;display:block;background:rgba(0,0,0,.1);position:absolute;top:0;left:0;">
        <div class="weatherInfo" style="position:absolute;top:20px;padding:10px 20px;font-family:sans-serif;font-size:18px;line-height:24px;">it's <span id="temp" style="font-weight:300;font-size:60px;"></span> <br>on Hilton Head Island<br><p class="wind2"></p><span id="tick21" style="display:none;"></span></div>
        <div style="clear:both;"></div>
        </div>
 <script>
	jQuery(document).ready(function($){
		$('#cam').attr('src','http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989');
		setInterval(function(){
     $("#cam").attr("src", "http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989&"+new Date().getTime());
}, 500);
	});

	</script>
     <div style="clear:both;"></div>
</div>
   </a>
        </div>
        </div>
    <div style="clear:both;"></div>
        </div>

        <?php
		}
		?>


<?php if(is_page('form-test2')){?>
 <div id="slide" style="z-index:8888;margin:0 auto 20px;max-width:1100px;width:90%;position:relative;top:10px;display:block;border:0px solid rgba(255,255,255,.5);">
      <div clas="large-12 columns">
      <div class="large-9 medium-9 columns" style="padding-left:0;padding-right:0;">
      <div id="wrapper">
			<div id="carousel-wrapper">
				<img id="shadow" src="http://saltydog.com/formtest/img/gui/carousel_shadow.png" />
				<div id="carousel">
<span id="crab"><a href="http://saltydog.com/calendar"><img src="http://saltydog.com/newSlides/crab.jpg"></a></span>
<span id="cruise"><a href="http://cruise.saltydog.com"><img src="http://saltydog.com/newSlides/cruise.jpg"></a></span>
<span id="football"><a href="http://saltydogtshirt.com/football-dog-l-s.html"><img src="http://saltydog.com/newSlides/football.jpg"></a></span>
<span id="bach"><a href="http://saltydog.com/specials"><img src="http://saltydog.com/newSlides/bach.jpg"></a></span>
<span id="boil"><a href="http://saltydog.com/specials"><img src="http://saltydog.com/newSlides/boil.jpg"></a></span>
<span id="keywest"><a href="http://keywest.saltydog.com"><img src="http://saltydog.com/newSlides/keywest.jpg"></a></span>

				</div>
			</div>
			<div id="thumbs-wrapper">
				<div id="thumbs">
<a href="#crab"><img src="http://saltydog.com/newSlides/crab.jpg"></a></span>
<a href="#cruise"><img src="http://saltydog.com/newSlides/cruise.jpg"></a></span>
<a href="#football"><img src="http://saltydog.com/newSlides/football.jpg"></a></span>
<a href="#bach"><img src="http://saltydog.com/newSlides/bach.jpg"></a></span>
<a href="#boil"><img src="http://saltydog.com/newSlides/boil.jpg"></a></span>
<a href="#keywest"><img src="http://saltydog.com/newSlides/keywest.jpg"></a></span>

				</div>
				<a id="prev" href="#" style="font-size:20px;text-align:center"><div style="width:30px;margin:0 auto;position:relative;top:50%;margin-top:-10px;display:block;"<i class="fa fa-chevron-circle-left" ></i></div></a>
				<a id="next" href="#" style="font-size:20px;text-align:center"><div style="width:30px;margin:0 auto;position:relative;top:50%;margin-top:-10px;display:block;"<i class="fa fa-chevron-circle-right" ></i></div></a>
			</div>
		</div>
        </div>

        <div class="large-3 medium-3 columns cam" style="padding-right:0;position:relative;">

      <div style="position:absolute;top:5px;left:20px;color:red;font-size:16px;font-weight:bold;padding:3px;background:rgba(255,255,255,.5);font-family:sans-serif;-webkit-font-smooting:antialiased;">LIVE</div>
      <a class="holder" href="http://saltydog.com/pages/webcams/" style="color:#fff;width:100%;height:100%;display:block;background:000;">

    <img id="cam" src="http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989" style="width:100%;">
    <script>
	jQuery(document).ready(function($){
    $(window).load(function(){
		$('#cam').attr('src','http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989');
		setInterval(function(){
     $("#cam").attr("src", "http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989&"+new Date().getTime());
}, 500);
	});
	});

	</script>


      <!-- <iframe src="camframe.html" style="width:100%;height:197px;" frameborder="0" scrolling="no"></iframe>-->
</a>

<div style="width:100%;display:block;margin-top:15px;color:#fff;font-family:sans-serif;position:relative;">
<a href="http://saltydog.com/hilton-head-weather" style="color:#fff;">
        <img src="http://saltydog.com/weatherIcon.jpg" style="width:100%;">
        <div style="width:100%;height:100%;display:block;background:rgba(0,0,0,.1);position:absolute;top:0;left:0;">
        <div class="weatherInfo" style="position:absolute;top:20px;padding:10px 20px;font-family:sans-serif;font-size:18px;line-height:24px;">it's <span id="temp" style="font-weight:300;font-size:60px;"></span> <br>on Hilton Head Island<br><p class="wind2"></p><span id="tick21" style="display:none;"></span></div>
        <div style="clear:both;"></div>
        </div>

     <div style="clear:both;"></div>
</div>
   </a>
        </div>
        </div>
    <div style="clear:both;"></div>
        </div>

        <?php
		}
}else{
		?>
    <div id="top" class="site">
    <style>
    .single_job_listing .company{
        display:none !important;
      }
    #wrapper {

          width: 100%;

          z-index:9999;
        }
    #carousel-wrapper {

          position: relative;
          max-height:300px;
        }
        #carousel, #thumbs {
          overflow: hidden;
        }
        #carousel-wrapper .caroufredsel_wrapper {
          border-radius: 0px;
          box-shadow: none;
        }

        #carousel span, #carousel img,
        #thumbs a, #thumbs img  {
          display: block;
          float: left;
        }
        #carousel span, #carousel a,
        #thumbs span, #thumbs a {
          position: relative;
        }
        #carousel img,
        #thumbs img {
          border: none;
          width: 100%;
          height: 100%;
          /*position: absolute;*/
          top: 0;
          left: 0;
        }
        #carousel{
          max-height:300px;
        }
        #carousel img.glare,
        #thumbs img.glare {
          width: 102%;
          height: auto;
        }

        #carousel span {
          width: 554px;
          height: 313px;
        }

        #thumbs-wrapper {
          padding: 10px 40px;
          position: relative;
        }
        #thumbs a {

          width: 150px;
          height: 100px;
          margin: 0 10px;
          overflow: hidden;


          -webkit-transition: border-color .5s;
          -moz-transition: border-color .5s;
          -ms-transition: border-color .5s;
          transition: border-color .5s;
        }
        #thumbs a:hover, #thumbs a.selected {

        }
        .caroufredsel_wrapper{

        }
        #wrapper img#shadow {
          width: 100%;
          position: absolute;
          bottom: 0;
        }

        #prev, #next {
          /*background: transparent url('http://saltydog.com/formtest/img/gui/carousel_nav.png') no-repeat 0 0;*/
          display: block;
          width: 30px;
          height: 100%;
          margin-top: 0px;
          position: absolute;
          top: 0%;
          background:#3b3b3b;
          opacity:.8;
          color:#fff;
        }
        #prev {
          background-position: 0 0;
          left: 0px;
        }
        #next {
          background-position: -19px 0;
          right: 0px;
        }
        #prev:hover {
          background-position: 0 -20px;
        }
        #next:hover {
          background-position: -19px -20px;
        }
        #prev.disabled, #next.disabled {
          display: none !important;
        }

        #donate-spacer {
          height: 100%;
        }
        #donate {
          border-top: 1px solid #999;
          width: 750px;
          padding: 50px 75px;
          margin: 0 auto;
          overflow: hidden;
        }
        #donate p, #donate form {
          margin: 0;
          float: left;
        }
        #donate p {
          width: 650px;
        }
        #donate form {
          width: 100px;
        }
        .around{
          max-width:1000px;
          margin:0 auto;
        }
        #thumbs span{
          /*background:rgba(255,255,255,.8);*/
          background:#fff;
          width:100%;
          position:relative;
          top:78%;
          color:#2c3e50;
          padding:5px;
          text-align:center;
          -webkit-font-smoothing:antialiased;
        line-height:10px;
          display:block;
          display:none;
        }
        #thumbs-wrapper{
          padding:0;
        }
        #thumbs a{
          margin:0;
        }
        .bio{
    width:100%;
    max-width:500px;
    background:rgba(255,255,255,.9);
    padding:20px;
    box-shadow: 3px 3px 5px rgba(0,0,0,1);
    min-height:700px;
    position:relative;
    top:50%;
    margin-top:-350px;
    left:50%;
    margin-left:-300px;
    position:fixed;
    display:none;
    z-index:9999;
    color:#333;
    }
    .close,.author-image{
    cursor:pointer;
    z-index:9999;
    }
    .chef-image img{
    float:left;
    padding:3px;
    border:1px solid #ddd;
    margin:40px 10px 0px 20px;
    }
    .chef-name h3{
    font-size:18px;
    font-weight:normal;
    padding-bottom:20px;
    }
    .chef-position{
    width:100%;
    text-align:center;
    font-family:sans-serif;
    }
    .chef-name h3{
    color:#000;
    font-weight:normal;
    }
    .chef-details p{
    padding:0 20px;
    font-size:14px;
    line-height:16px;
    }

        @media( max-width: 885px ){
          #thumbs span{
            font-size:12px;
            top:61%;
          }
        }
        @media( max-width: 1025px ){
          #legend{
            margin-top:20px !important;
          }
        }
    </style>
    <style>
    #advps_container3{
    max-height:408px !important;
    }
    .masthead.fixed{
    position:fixed !important;
    z-index: 9999;
    top:0;
    }
    .x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
    font-size:14px !important;
    -webkit-font-smoothing:antialiased !important;
    font-weight:bold !important;
    text-transform:uppercase;
    }
    .x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    }
    .x-navbar .x-nav > li > a{
    padding:0 15px !important;
    }
    .x-navbar .x-nav > li:first-child a{
    padding-left:0 !important;
    }
    @media only screen and ( max-width: 1280px ){
    .x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
    font-size:12px !important;
    font-family:open_sansregular !important;
    -webkit-font-smoothing:antialiased !important;
    font-weight:bold !important;
    text-transform:uppercase;
    }
    .x-navbar .x-nav > li > a{
    padding:0 15px !important;
    }
    }
    @media only screen and ( max-width: 1170px ){
    .x-navbar-fixed-top-active .x-navbar .x-nav > li > a{
    font-size:11px !important;
    font-family:open_sansregular !important;
    -webkit-font-smoothing:antialiased !important;
    font-weight:bold !important;
    text-transform:uppercase;
    }
    .x-navbar .x-nav > li > a{
    padding:0 15px !important;
    }
    }
    @media only screen and ( max-width: 480px ){
    .mosaicflow3{
    position:relative;
    }
    }
    @media ( max-width: 885px ){
    .weatherInfo{
      font-size:14px !important;
      line-height:16px !important;
    }
    .weatherInfo span#temp{
      font-size:50px !important;
    }
    }
    @media ( max-width: 720px ){
    #tick2{
      display:none;
    }
    }
    @media ( max-width: 640px ){
    .cam{
      display:none;
    }
    }
    @media ( max-width: 900px ){
    #legend{
    margin-top:0 !important;
    }
    #slide{
    display:none !important;
    }
    }
    </style>
    <link rel="stylesheet" href="https://saltydog.com/img/slide/css/flexslider.css" type="text/css" media="screen" />
    <?php if (!is_page('receipt-form')){?>
      <header class="masthead" role="banner" style="z-index:888888;position:relative;margin-bottom:0px;">
        <?php x_get_view( 'global', '_topbar' ); ?>
        <?php x_get_view( 'global', '_navbar' ); ?>
        <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>
      </header>
    <?php }?>
    <style>

    #nextend-smart-slider-1{
    float:none !important;
    }
    </style>
          <?php
    if ( (is_page('Front Page') || is_page('form-test'))){
      ?>

      <div id="slide" style="z-index:8888;margin:0 auto 50px;max-width:1100px;width:90%;position:relative;top:10px;display:block;border:0px solid rgba(255,255,255,.5);">

        <div clas="large-12 columns">
        <div class="large-9 medium-9 columns" style="padding-left:0;padding-right:0;">

          <style>
      .flexslider {
      margin: 0 0 60px;
      background: transparent !important;
      border: 0 !Important;
      position: relative;
      zoom: 1;
    margin:0 0 0 !important;
      }
      .flex-direction-nav a{
        background:transparent !important;
        color:#fff !important;
        height:100px;
        /*display:none !important;*/
      }
      .flex-direction-nav a:before{
        background:transparent !important;
        color:#fff !important;
      }
      .slides li{
        cursor:pointer;
      }
      .flex-nav-next{
        right:10px !important;
        padding-top:40px !important;
        margin-top:-40px !important;
        left:none !important;


      }
.log2{
	display:none;
}
    @media (max-width: 600px){
      .log2{
        width:40px;
        top:5px !important;
        right:5px !important;
      }

    }
     @media (max-width: 900px){
     	.log2{
     		display:block;
     		position: absolute;
    top: 5px;
    right: 5px;
    z-index: 999999;
    width: 91px;
    left: 50%;
    margin-left: -41.5px;
     	}

     }
      </style>

          <div id="main" role="main">
        <section class="slider">
          <div id="slider2" class="flexslider">
          <div class="log2" style=""><img src="http://saltydog.com/img/2yearstoolatelogo.jpg"></div>
           <ul class="slides">
            <?php /*
        remove_filter('the_content', 'wpautop');
    $args = array( 'post_type' => 'myslider', 'posts_status' => 'publish','order' => 'ASC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    $link = get_post_meta( get_the_ID(), 'link', true );
    echo '<li>';
    the_content();
    echo '</li>';
    endwhile;
    ?>

              <?php
        remove_filter('the_content', 'wpautop');
    $args = array( 'post_type' => 'myslider', 'posts_status' => 'publish','order' => 'ASC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    $link = get_post_meta( get_the_ID(), 'link', true );
    echo '<li>';
    the_content();
    echo '</li>';
    endwhile;
    ?>
          <?php
        remove_filter('the_content', 'wpautop');
    $args = array( 'post_type' => 'myslider', 'posts_status' => 'publish','order' => 'ASC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    $link = get_post_meta( get_the_ID(), 'link', true );
    echo '<li>';
    the_content();
    echo '</li>';
    endwhile;
    ?>
            </ul>
          </div>
                  <div id="carousel2" class="flexslider">
            <ul class="slides">
           <?php
        remove_filter('the_content', 'wpautop');
    $args = array( 'post_type' => 'myslider', 'posts_status' => 'publish','order' => 'ASC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    $link = get_post_meta( get_the_ID(), 'link', true );
    echo '<li>';
    the_content();
    echo '</li>';
    endwhile;
    ?>
              <?php
        remove_filter('the_content', 'wpautop');
    $args = array( 'post_type' => 'myslider', 'posts_status' => 'publish','order' => 'ASC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    $link = get_post_meta( get_the_ID(), 'link', true );
    echo '<li>';
    the_content();
    echo '</li>';
    endwhile;
    ?>
               <?php
        remove_filter('the_content', 'wpautop');
    $args = array( 'post_type' => 'myslider', 'posts_status' => 'publish','order' => 'ASC' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    $link = get_post_meta( get_the_ID(), 'link', true );
    echo '<li>';
    the_content();
    echo '</li>';
    endwhile;
   */ ?>
   
      <li><a href="https://saltydogtshirt.com" target="tshirt"> <img src="/img/eventBanner.jpg" width="825" height="334" alt="Salty Dog Event Banner" title="Shamrock Dog"></a>
<div style="height:75px;background:#3b3b3b">
<style>
@media only screen and ( max-width: 1185px ){
	.social{
		font-size:2rem !important;
}
	}
	</style>
  <div class="social large-9 medium-9 small-9 columns" style="height:75px;background: #ffffff;text-align:center;line-height:75px;color:#082F87;font-size:2.5rem;font-weight:300;padding-left:5rem;">
<div class="log2" style="position:absolute;top:0px;left:0px;height:75px;display:block;z-index:999;"><img src="http://saltydog.com/img/2yearstoolatelogo.jpg" style="height:75px !important;width:auto !important"></div>
FOLLOW THE SALTY DOG!
</div>
  <div class="large-1 medium-1 small-1 columns" style="height:75px;background:#547BBC;line-height:75px;color:#fff;font-size:32px;text-align:center;padding:0 !important"><a style="width:100%;height:100%;display:block;color:#fff;" target="facebook" href="https://www.facebook.com/SaltyDog/"><i class="fa fa-facebook" style=""></i></a></div>
  <div class="large-1 medium-1 small-1 columns" style="height:75px;background:#D01700;line-height:75px;color:#fff;font-size:32px;text-align:center;padding:0 !important"><a style="width:100%;height:100%;display:block;color:#fff;" target="instagram" href="https://www.instagram.com/thesaltydogcafe/"><i class="fa fa-instagram" style="width:100%;"></i></a></div>
  <div class="large-1 medium-1 small-1 columns" style="height:75px;background:#00aced;line-height:75px;color:#fff;font-size:32px;text-align:center;padding:0 !important"><a style="width:100%;height:100%;display:block;color:#fff;" target="twitter" href="https://twitter.com/thesaltydogcafe"><i class="fa fa-twitter" style=""></i></a></div>
</div>
</li>
  

            </ul>
          </div>
          </section>
          </div>
          </div>


          <div class="large-3 medium-3 columns cam" style="padding-right:0;position:relative;">

        <div style="position:absolute;top:5px;left:20px;color:red;font-size:16px;font-weight:bold;padding:3px;background:rgba(255,255,255,.5);font-family:sans-serif;-webkit-font-smooting:antialiased;">LIVE</div>
        <a class="holder oneShot" href="http://saltydog.com/pages/webcams/" style="color:#fff;width:100%;display:block;">

      <img id="cam" src="#" style="width:100%;">



        <!-- <iframe src="camframe.html" style="width:100%;height:197px;" frameborder="0" scrolling="no"></iframe>-->
    </a>

    <div style="width:100%;display:block;margin-top:15px;color:#fff;font-family:'open sans',sans-serif;position:relative;">
    <a href="http://saltydog.com/hilton-head-weather" style="color:#fff;">
          <img src="http://saltydog.com/weatherIcon.jpg" style="width:100%;">
          <div class="weath" style="width:100%;height:100%;display:block;background:rgba(0,0,0,.1);position:absolute;top:0;left:0;">
          <div class="weatherInfo" style="position:absolute;top:20px;padding:10px 20px;font-family:sans-serif;font-size:18px;line-height:24px;">it's <span id="temp" style="font-weight:300;font-size:60px;"></span> <br>on Hilton Head Island<br><p class="wind2"></p><span id="tick21" style="display:none;"></span></div>
          <div style="clear:both;"></div>
          </div>
    <script>
    jQuery(document).ready(function($){
      $('#cam').attr('src','http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989');
      setInterval(function(){
       $("#cam").attr("src", "http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989&"+new Date().getTime());
    }, 500);
    });

    </script>
       <div style="clear:both;"></div>
    </div>
     </a>
          </div>
          </div>
      <div style="clear:both;"></div>
          </div>

          <?php
      }
      ?>


    <?php if(is_page('form-test2')){?>
    <div id="slide" style="z-index:8888;margin:0 auto 20px;max-width:1100px;width:90%;position:relative;top:10px;display:block;border:0px solid rgba(255,255,255,.5);">
        <div clas="large-12 columns">
        <div class="large-9 medium-9 columns" style="padding-left:0;padding-right:0;">
        <div id="wrapper">
        <div id="carousel-wrapper">
          <img id="shadow" src="http://saltydog.com/formtest/img/gui/carousel_shadow.png" />
          <div id="carousel">
    <span id="crab"><a href="http://saltydog.com/calendar"><img src="http://saltydog.com/newSlides/crab.jpg"></a></span>
    <span id="cruise"><a href="http://cruise.saltydog.com"><img src="http://saltydog.com/newSlides/cruise.jpg"></a></span>
    <span id="football"><a href="http://saltydogtshirt.com/football-dog-l-s.html"><img src="http://saltydog.com/newSlides/football.jpg"></a></span>
    <span id="bach"><a href="http://saltydog.com/specials"><img src="http://saltydog.com/newSlides/bach.jpg"></a></span>
    <span id="boil"><a href="http://saltydog.com/specials"><img src="http://saltydog.com/newSlides/boil.jpg"></a></span>
    <span id="keywest"><a href="http://keywest.saltydog.com"><img src="http://saltydog.com/newSlides/keywest.jpg"></a></span>

          </div>
        </div>
        <div id="thumbs-wrapper">
          <div id="thumbs">
    <a href="#crab"><img src="http://saltydog.com/newSlides/crab.jpg"></a></span>
    <a href="#cruise"><img src="http://saltydog.com/newSlides/cruise.jpg"></a></span>
    <a href="#football"><img src="http://saltydog.com/newSlides/football.jpg"></a></span>
    <a href="#bach"><img src="http://saltydog.com/newSlides/bach.jpg"></a></span>
    <a href="#boil"><img src="http://saltydog.com/newSlides/boil.jpg"></a></span>
    <a href="#keywest"><img src="http://saltydog.com/newSlides/keywest.jpg"></a></span>

          </div>
          <a id="prev" href="#" style="font-size:20px;text-align:center"><div style="width:30px;margin:0 auto;position:relative;top:50%;margin-top:-10px;display:block;"<i class="fa fa-chevron-circle-left" ></i></div></a>
          <a id="next" href="#" style="font-size:20px;text-align:center"><div style="width:30px;margin:0 auto;position:relative;top:50%;margin-top:-10px;display:block;"<i class="fa fa-chevron-circle-right" ></i></div></a>
        </div>
      </div>
          </div>

          <div class="large-3 medium-3 columns cam" style="padding-right:0;position:relative;">

        <div style="position:absolute;top:5px;left:20px;color:red;font-size:16px;font-weight:bold;padding:3px;background:rgba(255,255,255,.5);font-family:sans-serif;-webkit-font-smooting:antialiased;">LIVE</div>
        <a class="holder" href="http://saltydog.com/pages/webcams/" style="color:#fff;width:100%;height:100%;display:block;background:000;">

      <img id="cam" src="http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989" style="width:100%;">
      <script>
    jQuery(document).ready(function($){
      $(window).load(function(){
      $('#cam').attr('src','http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989');
      setInterval(function(){
       $("#cam").attr("src", "http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989&"+new Date().getTime());
    }, 500);
    });
    });

    </script>


        <!-- <iframe src="camframe.html" style="width:100%;height:197px;" frameborder="0" scrolling="no"></iframe>-->
    </a>

    <div style="width:100%;display:block;margin-top:15px;color:#fff;font-family:sans-serif;position:relative;">
    <a href="http://saltydog.com/hilton-head-weather" style="color:#fff;">
          <img src="http://saltydog.com/weatherIcon.jpg" style="width:100%;">
          <div style="width:100%;height:100%;display:block;background:rgba(0,0,0,.1);position:absolute;top:0;left:0;">
          <div class="weatherInfo" style="position:absolute;top:20px;padding:10px 20px;font-family:sans-serif;font-size:18px;line-height:24px;">it's <span id="temp" style="font-weight:300;font-size:60px;"></span> <br>on Hilton Head Island<br><p class="wind2"></p><span id="tick21" style="display:none;"></span></div>
          <div style="clear:both;"></div>
          </div>

       <div style="clear:both;"></div>
    </div>
     </a>
          </div>
          </div>
      <div style="clear:both;"></div>
          </div>

          <?php
      }
}
      ?>
