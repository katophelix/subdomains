<?php
date_default_timezone_set('EST5EDT');
include('../wp-load.php');
define('DONOTCACHEPAGE',1);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<?php get_header();?>

  <link rel="stylesheet" type="text/css" href="http://cruise.saltydog.com/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="http://cruise.saltydog.com/slick/slick-theme.css"/>

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1">
<script src='http://saltydog.com/cal2/lib/moment.min.js'></script>
<script src='http://saltydog.com/cal2/fullcalendar.js'></script>
<script src='http://saltydog.com/cal2/gcal.js'></script>
<script src='http://saltydog.com/cal2/fullcalendar.js'></script>
<script src='http://saltydog.com/cal2/gcal.js'></script>
                
<?php
$curdate = date('Y-m-d H:i:00');
global $wpdb;
$cancel = array();
	$dql = $wpdb->get_results("SELECT * FROM wp_postmeta WHERE meta_key = '_EventVenueID' and meta_value = '18374'");
	foreach ($dql as $dq){
		$cancel[] = $dq->post_id;
	}
    $sql = $wpdb->get_results("SELECT meta_value,meta_key,post_id FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND post_id NOT IN ( '" . implode($cancel, "', '") . "' ) AND meta_value > '{$curdate}' ORDER BY meta_value LIMIT 1;");
    foreach($sql as $sq){
    	$time = $sq->meta_value;
    	$id = $sq->post_id;
    }
$newTime = date('M j Y H:i:00',strtotime($time));
$newTime2 = '2015-09-30 18:00:00';
$newTime3 = date('M j Y H:i:00',strtotime('09/24/15 18:00'));
$now = date("Y-m-d H:i:s");
if(strtotime($newTime) < strtotime($now)){
	$sql = $wpdb->get_results("SELECT * FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND meta_value > '{$newTime}' ORDER BY meta_value LIMIT 1;");
foreach($sql as $sq){
	$time = $sq->meta_value;
	$id = $sq->post_id;
}
$newTime = date('M j Y H:i:00',strtotime($time));
}
?>
<style>
@media( max-width: 600px ){
	.x-main{
	margin:0 !important;
}
}
.entry-wrap{
border: 2px dashed #eee !important;
box-shadow: 0 0 0 8px #fff !important;
border-radius: 0 !important;
margin-bottom:100px !important;
}
.flogo{
	top:120px !important;
	left:51% !important;
}
.section{
	text-transform:lowercase;
}
hr.divider {
border: 0;
height: 1px;
background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.25), rgba(0,0,0,0));
background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.25), rgba(0,0,0,0));
background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.25), rgba(0,0,0,0));
background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.25), rgba(0,0,0,0));
margin:40px 0 20px !important;
}
.divider2{
	 width:90%;margin:20px auto;height:2px;border-top: 4px double #ccc;
}
</style>
  <div class="x-main x-container-fluid max width offset" role="main" style="margin:0px auto;">

  <style>
  @media( max-width: 725px ){
	  .info{width:100% !important;text-align:center !important;}
  }
  #clock-container{
	  width: 350px;
    height: 100px;
    background-color: #333333;
    position: relative;
    margin: 5px auto 0;
    -webkit-box-shadow: 0 1px 6px 1px rgba(0,0,0,0.4),0 1px 2px 0 rgba(0,0,0,0.4);
    -moz-box-shadow: 0 1px 6px 1px rgba(0,0,0,0.4),0 1px 2px 0 rgba(0,0,0,0.4);
    box-shadow: 0 1px 6px 1px rgba(0,0,0,0.4),0 1px 2px 0 rgba(0,0,0,0.4);
}
#clock-wrapper{
	width:100%;
	height:100%;
	background:url(http://saltydog.com/img/new_sprite.png) no-repeat 0 -33px;
}
#counter-wrapper{
	width:336px;
	height:60px;
	margin-left:0px;
}
@media(max-width: 600px){
	#counter-wrapper{
	width:300px;
	height:60px;
	margin-left:10px;
}
#clock-container{
	  width: 320px;
}
}
#days{
	height:70px;
	width:316px;
	float:left;
	position:relative;
	text-align:left;
	padding-top:30px;
}
#days .days{
	float:left;
}
#days .label2{
	float:left;
	margin-left:10px;
	width:40px;
	font-size:20px;
	color:#ccc;
}
.label2{
	background:transparent;
	position:relative;top:-20px;
}
.goth{
	color:#fff;
	font-size:70px;
	-webkit-font-smoothing:antialiased;
}
table.goth,.goth tr,.goth td{
	background:transparent;
	border-top:0 !important;
	border-bottom: 0 !important;
	border-left:0 !important;
	padding:0 !important;
	margin:0;
	color:#fff !important;
	font-size:40px !important;
	padding-top:0px !important;
	text-align:center !important;
	line-height:1.8rem !important;
	border-right:0;
}
td{
	letter-spacing:2px;


}
td span{
	letter-spacing:0px !important;
}
.border{
	float:right;
	width:1px;
	height:100%;
	display:block;
	position:absolute;
	right:0;
	top:-10px;
	background: rgba(237,237,237,0);
background: -moz-linear-gradient(top, rgba(237,237,237,0) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(237,237,237,0)), color-stop(50%, rgba(255,255,255,0)), color-stop(100%, rgba(255,255,255,0)));
background: -webkit-linear-gradient(top, rgba(237,237,237,0) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0) 100%);
background: -o-linear-gradient(top, rgba(237,237,237,0) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0) 100%);
background: -ms-linear-gradient(top, rgba(237,237,237,0) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0) 100%);
background: linear-gradient(to bottom, rgba(237,237,237,0) 0%, rgba(255,255,255,1) 50%, rgba(255,255,255,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#ffffff', GradientType=0 );
}
td:first-child{
	background:transparent !important;
}
table{
	max-width:350px;
	table-layout: fixed;

}
td{
	position:relative;
	width:25%;
}
.bg{
	position:absolute;
	height:40px;
	width:24px;

top:-10px;
left:40px;
}
td:last-child{
	border:0 !important;
}
  </style>
<style>
#spin2{
	display:none;
}
</style>
<div id="spin2" style="position:fixed;width:100%;height:120%;text-align:center;top:-20px;background:rgba(0,0,0,.5);color:#fff;z-index:999999;display:none;left:0;right:0;">
<div style="width:60px;height:60px;position:relative;top:40%;margin-top:-30px;left:50%;margin-left:-30px;font-size:60px;">
<i class="fa fa-spinner fa-spin"></i>
</div>
</div>
<style>
.mod{
	width:100%;
	height:100%;
	display:block;
	position:absolute;
	z-index:9999;
	display:none;
}
.mod .x-colophon.top,.mod .x-colophon.bottom,.mod .masthead{
	display:none !important;
}
</style>


<div class="mod"></div>
<div class="over" style="display:none;width:100%;height:100%;position:fixed;top:0;left:0;z-index:9999999;text-align:center;background:rgba(0,0,0,.5)">
<i class="fa fa-spinner fa-spin" style="color:#fff;font-size:60px;position:relative;top:20%;margin-top:-20px;"></i>
</div>
<link rel="stylesheet" type="text/css" href="http://saltydog.com/wp-content/themes/x-child-integrity-light/css/modal.css">
<style>
@media( max-width: 600px ){
	#outer{
		margin-top:0 !important;
	}
	.cruise{
		margin-top:10px !important;
	}
	}
</style>
<div id="outer" style="width:100%;text-align:center;margin-top:0px;max-width:1100px;margin:0 auto;">
<!--<img src="http://saltydog.com/images/boat13.jpg" alt="happy_Hour_Cruise" class="" style="position:relative;top:0px;margin:0 auto;width:100%;max-width:1100px;height:auto;"/>-->

        <!-- Loading Screen -->
       

        <!-- Slides Container -->
        <div class="slider">

             <div>
                <img style="width:100%;max-width:100%;" src="http://saltydog.com/img/slide40.jpg" />
            </div>
            <div>
                <img style="width:100%;max-width:100%;" src="http://saltydog.com/img/slide41.jpg" />
            </div>
             <div>
                <img style="width:100%;max-width:100%;" src="http://saltydog.com/img/slide42.jpg" />
            </div>
           <!-- <div>
                <img u="image" src="http://saltydog.com/img/slide43.jpg" />
            </div>-->
            <div>
                <img style="width:100%;max-width:100%;" src="http://saltydog.com/img/slide44.jpg" />
            </div>


        </div>

    </div>
</div>


  <div style="text-align:center;width:100%;max-width:1100px;background:#fff;display:block;padding:0;font-family:helvetica,arial,sans-serif !important;position:relative;margin:0 auto;" role="main">
<style>
.bottom-dir{
	display:none;
}
@media only screen and ( max-width: 600px ){
	.cruise{padding:0 !important;
	}
}
ul.cal li:nth-child(1){
padding:0;
border:1px solid #ddd;
border-left:1px solid #ddd !important;
}
@media( max-width: 1025px ){
	ul.pics li:nth-child(4),ul.pics li:nth-child(5){
		display:none;
	}
	.bottom-dir{
		display:block !important;
	}
}
@media( max-width: 642px ){
	ul.pics li:nth-child(4),ul.pics li:nth-child(5){
		display:inline;
	}
	ul.pics li:nth-child(5){
		display:none;
	}
}
table.tribe-events-tickets td,.woocommerce{
	padding:20px !important;
}
</style>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content" style="background:transparent;box-shadow:none;max-width:95%;margin:0 auto;padding:0px 10px 40px;">
        <?php //if ( have_posts() ) : ?>
          <?php //while ( have_posts() ) : the_post(); ?>


<!--<div style="width:100%;padding:20px 20px 0;font-size:18px;color:red;text-align:center;margin-top:20px;line-height:22px;">The Salty Dog Happy Hour Cruise has been canceled for Fri. night,<br>Sept. 26, due to weather.<br><span style="font-size:16px;color:#4b4b4b;padding-top:10px;">We look forward to smooth sailing next week</div>-->
<div class="cruise" style="text-align:center;width:100%;font-size:14px;line-height:18px;margin:20px auto;color:#3b3b3b;margin-top:40px;">
<div style="display:block;width:100%;text-align:center;padding-top:20px;"><!--<strong>Performing This Week</strong>-->
<!--Cruise schedule and online booking at the bottom of page.-->
</div>
<!--<a style="cursor:default;"><span style="color:#4b4b4b;">Wednesday:</span> Dave Kemmerly<br><hr style="width:30%;margin:20px auto;">4:30 PM - 6:00 PM.<br>Boarding starts at 4:00 PM.</a>-->

<!--<div style="position:relative;width:320px;text-align:center;padding:10px 0;margin:0 auto;">
<a href="http://saltydog.com/boat" target="_blank">
<style>
.testing{
	top:-50px;
}
@media (max-width: 600px){
	.testing{
		top:-30%;
	}
}
</style>
<div style="float:left;width:75px;height:75px;border-radius:75px;background:#f00;position:relative;top:-20px;margin-right:10px;text-align:center;color:#fff;line-height:65px;">BETA<br><span class="testing" style="font-size:11px;line-height:11px;position:relative;">Testing</span></div><div style="float:left;"><span style="display:block;margin-top:-20px;font-size:12px;">click for</span>Live Streaming from<br>The Salty Dog Boat!</div>
</div>
</a>-->
<!--<hr>-->
<div class="row" style="padding:10px 0">
<div class="large-12 columns" style="text-align:center">
<!--<span style="font-weight:bold;font-size:20px;">Cruising starts March 16. See you soon!</span><br>-->  For information about private cruises, please email <a href="mailto:boatride@saltydog.com" style="color:#16A6CB;">boatride@saltydog.com</a>.



</div>


<!--
<div style="position:relative;display:block;top:10px;">
<div style="font-size:14px;color:#3b3b3b;"><b>Our Next Cruise Leaves The Dock In:</b></div>
<div id="clockdiv">
<div id="clock-container">
<div id="clock-wrapper">
<div style="width:100%;height:25px;"></div>
<div id="counter-wrapper">
<div style="clear:both;"></div>
<table class="goth">
<tr>
<td class="days"></td>
<td class="hours"></td>
<td class="minutes"></td>
<td class="seconds"></td>
</tr>
</table>

</div>
</div>
</div>
</div>
</div>

-->



<hr style="margin-top:2.75rem !important;">
<div class="row" style="padding-top:0px;">

<div class="large-12 columns" style="text-align:center;font-size:16px;line-height:18px;">
A 63’ powered catamaran with upper and lower decks, and a full bar that serves your favorite beverages. Happy Hour cruises feature a ride around the Calibogue Sound, an island inspired food and beverage menu, plus tropical tunes to set the mood.<br><br><!--<strong>Boarding begins 30 minutes prior to time listed on cruise schedule</strong>--></span>
</div>
</div>
<div class="row" style="padding:10px 0;">
<div class="large-12 columns" style="text-align:center;">
<a href="http://saltydog.com/faq" style="color:#16A6CB;"><strong>The Salty Dog Happy Hour Cruise Boat FAQ &rarr;</strong></a>
</div>
</div>
<br>
<style>
.iframe{
	position: relative;
    padding-bottom: 154px;
    padding-top: 35px;
    height: 0;
    overflow: hidden;
}
.iframe iframe{
	position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

<div style="text-align:center;">
<div style="color:#3b3b3b;font-weight:bold;font-size:16px;">Boarding begins 60 minutes prior to time listed on cruise schedule.<br>Valid Photo ID Required<br><br></div>
<div id="cool-stuff" style="position:relative;top:0px;z-index:100;padding:0px 0 0px;max-width:950px;margin:0px auto;">

<!--<iframe width="350" height="120" src="https://w2.countingdownto.com/979949" frameborder="0" kwframeid="1"></iframe>-->
<?php
$nt = strtotime($newTime);
$nt = $nt + 60*60;
$nt = date('M d, Y G:i:s',$nt);
?>



<style>
#cool-stuff{
	text-align:center;
}
ul{
	list-style:none;
}
h2{
	font-family:'helvetica condensed',arial;
	font-weight:bold;
	color:#095191;
	font-size:28px;
	text-transform:uppercase;
	line-height:24px;
	padding:20px 0;
}
h3{
	font-family:'Times New Roman',serif;
	font-weight:normal;
	color:#095191;
	font-size:24px;
	padding-top:10px;
}

p{
	color:#555;
	font-family:sans-serif;
	font-size:16px;
	line-height:17px;
	text-align:center;
}
h2 span{
	font-family:'helvetica condensed',arial;
	font-weight:normal;
	color:#095191;
	font-size:20px;
	text-transform:uppercase;
	margin:0;
	display:block;
}

em{
	font-size:14px;
}
.inner h3{
	font-size:18px;
	font-weight:bold;
	font-family:sans-serif;
	color:#686868;

}
.inner h1{
	font-size:26px;
	font-weight:bold;
	font-family:sans-serif;
}
.sub-title{
	display:block;
	font-size:16px;
	font-weight:normal;
}
.mContainer{
padding-bottom:50px;
padding-top:0;
}
.mContainer p{
	line-height:20px;
	text-align:left;
}
.titl{
	color:#095191;
}
.area,.area2{
	cursor:pointer;
}
.tapped{
	background:rgba(0,0,0,.5);
	border-radius:3px;

}
</style>
<div class="row mContainer">

 </div>
         </div>
      </div>
      </div>
      <?php
      $site = "specials";
if(isset($_GET['site'])){
	$site = $_GET['site'];
}
	?>

<script>
jQuery(document).ready(function($){
var param = document.URL.split('#')[1];
if(!param){
	param = 'specials2';
}

$('.mContainer').on('click','.area',function(e){
	var href = $(this).attr('data-site');
	window.location.hash = href;
	e.preventDefault();
	var site = $(this).attr('data-site');
	$('.mContainer').load('http://saltydog.com/restaurants/' + site + '.html#top');
	$('html, body').animate({ scrollTop: 0 }, 0);
});
$('.mContainer').on('click','.area2',function(e){
    e.preventDefault();
	var site = $(this).attr('data-site');
	window.location.href ='http://saltydog.com/' + site + '/';
});
if ($(window).width() > 600){
$.backstretch("https://saltydogtshirt.com/images/test-bg.jpg");
}
});
</script>
<a href="http://saltydog.com/boat/index.html"><img id="boat" src="http://saltydog.com/boat/boat.jpg?d=<?=date('YmdGis')?>" alt="Please Stand By For Webcam Photo Upload" title="Salty Dog Happy hour Cruise" width="640" style="position:relative;top:-40px;"></a>
</div>
<script>
jQuery(document).ready(function($){
	var imgSrc = $('#boat').attr('src');
	setInterval(function(){
 $("#boat").attr("src", imgSrc+'?t='+new Date().getTime());
}, 10000);
});
</script>
For more information or to inquire about reservations call, email, or text<br>
(843) 683-6462<br>
boatride@saltydog.com

<hr>
<a style="cursor:default">Adults ONLY</a>. All passengers must be 21 or older. Full bar onboard.

<hr>



<form method="get" action="https://squareup.com/store/salty-dog-boat">
    <button type="submit">Buy A Ticket</button>
</form>


<br><br>

<img src="http://saltydog.com/images/menu1.jpg" style="width:90%;max-width:850px;">

<br>

<img src="http://saltydog.com/images/menu2.jpg" style="width:90%;max-width:850px;position:relative;top:20px;">












<!-- 
<div id="wrap">

<?php
$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));

}
$year = $dt->format('o');
$week = $dt->format('W');
global $wpbd;
$cruises = array();
$start = strtotime($dt->format('l M d'));
$fivesdrafts = $wpdb->get_results(
	"
	SELECT *
	FROM $wpdb->posts
	WHERE post_type = 'tribe_events'
		AND post_status = 'publish'
	"
);

foreach ( $fivesdrafts as $fivesdraft )
{
	$cruises[] = $fivesdraft->ID;
}

?>

<div class="dir" style="font-size:25px;padding:20px;color:#fff;background:#0E687E;padding:15px 20px;border-radius:4px;display:inline-block;margin-right:20px;cursor:pointer"><i class="prev fa fa-arrow-left"></i></div>
<div class="dir" style="font-size:25px;padding:20px;color:#fff;background:#0E687E;padding:15px 20px;border-radius:4px;display:inline-block;margin-right:20px;cursor:pointer"><i class="next fa fa-arrow-right"></i></div>
<a href="http://saltydog.com/cruisecart/" class="button" style="top:5px;display:inline-block;text-transform:uppercase;text-shadow:none;border-radius:3px;background:#16A6CB;font-size:16px;">My Cart</a>
<div class="row" style="margin-top:20px;">
<span class="test" style="display:none;"></span>
    <style>
	#stuff li:first-child{
		border-left:1px solid #eee;
	}
	</style>
<ul id="stuff" class="large-block-grid-7 medium-block-grid-3 small-block-grid-2 cal" style="padding:0;">


          </ul>
          <div class="bottom-dir">
          <div class="dir" style="font-size:25px;padding:20px;color:#fff;background:#0E687E;padding:15px 20px;border-radius:4px;display:inline-block;margin-right:20px;cursor:pointer;margin-top:20px;"><i class="prev fa fa-arrow-left"></i></div>
<div class="dir" style="font-size:25px;padding:20px;color:#fff;background:#0E687E;padding:15px 20px;border-radius:4px;display:inline-block;cursor:pointer"><i class="next fa fa-arrow-right"></i></div>
</div>
<div style="width:100%;display:block;position:relative;text-align:center;">
<div style="width:100%;text-align:center;font-size:18px;color:#3b3b3b;padding:30px;">
Happy Hour Cruise Menu
</div>
<img src="http://saltydog.com/images/menu1.jpg" style="width:90%;max-width:850px;">
<img src="http://saltydog.com/images/menu2.jpg" style="width:90%;max-width:850px;position:relative;top:20px;">
</div>
          <?php //x_link_pages(); ?>
          <?php //endwhile; ?>
        <?php //endif;
		?>
        </div>
        <script>
jQuery(document).ready(function($){
	$('.menu-item a').each(function(){
		$(this).attr('target','_top');
	});


	$.ajax({
 type:'get',
 data:{
	 "week":"<?=$week?>",
	 "year":"<?=$year?>"
	 },
 url:'http://saltydog.com/cruises.php',
 dataType:'html',
 success:function(response){
   var div = $('.cal', $(response)).addClass('done');
   $('.cal').html(response);
   var max = 0;
$('.even2').each(function() {
    max = Math.max($(this).height(), max);
}).height(max);
   $('.cruise2,.cruise2 a').each(function(){
	   var cru = $(this).attr('data-id');
	 $(this).on('click',function(e){
		 e.preventDefault();
		$('#spin2').css('display','block');
		setTimeout(function(){
			$('#spin2').css('display','none');
			}, 2000);
		setTimeout(function(){ window.location = 'http://saltydog.com/boatcruise/' + cru + '/'; }, 100);
		return false
	 })
   })

 }
	});

$('.test').text('<?=$week?>')

$('.dir').on('click','i.next',function(e){
	e.preventDefault();
	var test = $('.test').text();
	$('.test').text(+test + +1);
	var test2 = $('.test').text();
	$('.over').show();



	$.ajax({
 type:'get',
 data:{
	 "week":test2,
	 "year":"<?=$year?>"
	 },
 url:'http://saltydog.com/cruises.php',
 dataType:'html',
 success:function(response){
   var div = $('.cal', $(response)).addClass('done');
   $('.cal').html(response);
    var max = 0;
$('.even2').each(function() {
    max = Math.max($(this).height(), max);
}).height(max);
   $('.cruise2,.cruise2 a').each(function(){
	   var cru = $(this).attr('data-id');
	 $(this).on('click',function(e){
		 e.preventDefault();
		$('#spin2').css('display','block');
		setTimeout(function(){
			$('#spin2').css('display','none');
			}, 2000);
		setTimeout(function(){ window.location = 'http://saltydog.com/boatcruise/' + cru + '/'; }, 100);
		return false
	 })
   })
   $('.over').hide();


	var elementHeights = $('.box').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.box').height(maxHeight);

 }
});
return false;
});

$('.dir').on('click','i.prev',function(e){
	e.preventDefault();
	var test = $('.test').text();
	$('.test').text(+test - +1);
	var test2 = $('.test').text();
	$('.over').show();



	$.ajax({
 type:'get',
 data:{"week":test2,"year":"<?=$year?>"},
 url:'http://saltydog.com/cruises.php',
 dataType:'html',
 success:function(response){
   var div = $('.cal', $(response)).addClass('done');
   $('.cal').html(response);
     var max = 0;
$('.even2').each(function() {
    max = Math.max($(this).height(), max);
}).height(max);
   $('.over').hide();


	var elementHeights = $('.box').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.box').height(maxHeight);

 }
});
return false;
});



  // Get an array of all element heights
  var elementHeights = $('.box').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.box').height(maxHeight);
})
</script>

        <div style="padding:20px;">
    Prices and availability subject to change.
    </div>
      </div> <!-- end .entry-wrap.entry-content -->
    </article> <!-- end .hentry -->
  </div> <!-- end .x-main.x-container-fluid.max.width.offset -->
  <script>
jQuery(document).ready(function($){
	if($(window).width() > 600){
$.backstretch("http://saltydog.com/wp-content/themes/x-child-integrity-light/img/test-bg.jpg");
	}
});
</script>

<div style="width:100%;height:50px;"></div><br />
<!-- JS for Modal -->
		<script src="http://saltydog.com/wp-content/themes/x-child-integrity-light/js/modal.js"></script>

		<!-- Plugins -->
		<script src="http://saltydog.com/wp-content/themes/x-child-integrity-light/js/modal-maxwidth.js"></script>
		<script src="http://saltydog.com/wp-content/themes/x-child-integrity-light/js/modal-resize.js"></script>

</div>    

<div style="clear:both;"></div>

<?php get_footer(); ?>
