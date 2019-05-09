<?php
define('DONOTCACHEPAGE',1);
date_default_timezone_set('America/New_York');
error_reporting(E_ALL);
ini_set("display_errors", 1);

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-BLANK-1.PHP (Container | Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================
include('../wp-blog-header.php');
$today = strtotime(date('Y-m-d 00:00:00'));
$dateSelect = date('m/d',$today).'-'.date('m/d',strtotime('+7 day',$today));
if(isset($_POST['timeSpan'])){
	$dateSelect = $_POST['timeSpan'];
}
$cruise = 'crui.jpg';
$bruce = 'bruc.jpg';
$todd = 'todd.jpg';
$trevor = 'trev.jpg';
$will = 'will.jpg';
$dave = 'dave.jpg';
$sterlin = 'ster.jpg';
$jeff = 'jeff.jpg';
?>
<?php get_header();?>
<link href='http://saltydog.com/cal2/fullcalendar.css' rel='stylesheet' />
<link href='http://saltydog.com/cal2/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='http://saltydog.com/cal2/lib/moment.min.js'></script>
<script src='http://saltydog.com/cal2/fullcalendar.js'></script>
<script src='http://saltydog.com/cal2/gcal.js'></script>

<script type='text/javascript'>

	jQuery(document).ready(function($) {

		$('#calendar2').fullCalendar({
			googleCalendarApiKey: 'AIzaSyD7GsjCq0vylLv6vv3A1WjkrFTOuidj-hU',
		editable: true,
			eventSources: [
            {
                googleCalendarId: 'orlckuk8igit9ba3ls26q1vqrc@group.calendar.google.com',
                className: 'kids'
            },
			{
                googleCalendarId: 'hndn1g7andcvs8gk35jf4i82s4@group.calendar.google.com',
                className: 'events'
            },
			{
                googleCalendarId: '0rivmsv263ckaa19au3t22b2kg@group.calendar.google.com',
                className: 'wreck'
            },
			{
                googleCalendarId: 'todd@saltydog.com',
                className: 'music'
            }
        ],
		eventRender: function(event, element) {
			var location = event.location;
			var description = event.description;
			var title = event.title;
			var path = "http://saltydog.com/artists/";
		 var ext = ".jpg";
		 var perf = title;
		 var name = perf.split(' ');
		 var count = name.length;
		 if ( (count <= 2) && (name[0] != 'SHAMROCK')){
		 var image = path + name[0].toLowerCase() + ext;
		 }else if(perf == "The Singing Frog Kidz DJ Dance Party"){
		 image = path + 'anneliza' + ext;
		 }else if(perf == "The Really Big Little Kids' Show with Jordan Ross"){
			 image = path + 'jordan' + ext;
		 }else if(perf == "The Music Lady's Kids Show"){
			 image = path + 'music-lady' + ext;
		 }else{
			image = "http://placehold.it/100&text=No+Image";
		 }
			if(typeof location === 'undefined'){
				location = 'The Salty Dog Cafe, 232 South Sea Pines Drive #301, Hilton Head Island, SC 29928, United States';
			}
			if(typeof description === 'undefined'){
				description = 'Live at the Salty Dog Cafe';
			}


       element.find('.fc-content').append('<div class="desc"><div style="font-size:22px;font-weight:bold;width:100%;text-align:left;margin-bottom:10px;display:block;">' + event.title + '</div><div style="font-size:14px;font-weight:bold;width:100%;text-align:left;padding:0 0 5px;dispplay:block;width:100%;">' + moment(event.start).format("ddd, MMM DD,") + moment(event.start).format("h:mm a") + ' - ' + moment(event.end).format("h:mm a") +'</div><div style="width:100%;display:block;font-size:14px;line-height:18px;margin-bottom:10px;background:#efefef;padding:5px;">' + location + '</div><div style="width:100%;display:block;font-size:16px;line-height:16px;"><div style="float:left;position:relative;margin:0 10px 10px 0;"><div style="width:100px;height:100px;background:url(' + image + ') no-repeat center;background-size:cover;"></div></div><div>' + description + '</div></div><div style="clear:both;"></div><div style="margin-top:40px;float:right;font-size:14px;"><a href="https://www.google.com/maps/place/The+Salty+Dog+Cafe/@32.116015,-80.825394,17z/data=!3m1!4b1!4m2!3m1!1s0x88fb874c9b603f5f:0xaf6a47b3411ba26c" target="map" class="map">View Map</a></div></div>');
    },
			displayEventEnd:true,
			defaultView: 'agendaFourDay',
			header: {
			left: 'title',
			center: '',
			right:'today prev,next',
			},
			 views: {
        agendaFourDay: {
            type: 'basicDay',
            duration: { days: 4 },
            buttonText: '4 day'
        }
    },

			eventClick: function(event) {
				var content = $('.desc',this).html();
				$('.modal').html(content);
var offset = $(document).scrollTop();
var viewportHeight = $(window).height();
var viewportWidth = $(window).width();
$modal = $('.modal');
$modal.css('top',  ((viewportHeight/2)) - ($modal.outerHeight()/2));
$modal.css('left',  ((viewportWidth/2)) - ($modal.outerWidth()/2));
$('.modal').fadeIn();
$('.modal').not('.map').on('click',function(){
		$(this).hide();
	});
				return false;
			},

			loading: function(bool) {
				$('#loading').toggle(bool);
			}

		});

	});


</script>
<style>


	body {
	}

	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
	.fc-widget-header{
		padding:15px 0;
		color:#fff;
		background:#666;
	}
#calendar{
	max-width:1400px;
width:100%;
}
.fc-day-number{
	background:#b2b2b2 !important;
	color:#fff;
}
.fc-past{
	opacity:.4;
}
.fc-event{
	background-color:transparent !important;
	border:0 !important;
	color:#666;
}
.fc-event:hover{
	color:#ccc;
}
.fc-day-number.fc-today{
	background:#21759b !important;
}
.fc-day-grid-event .fc-content{
	white-space:normal !important;
}
.fc-time{
	font-weight:normal !important;

}
.fc-content{
	padding-bottom:5px !important;
	border-bottom:1px dotted #eee !important;
	margin-bottom:5px;
	position:relative !important;
}
.fc-title{
	font-weight:bold;
}
#calendar td{
	border-color:#ddd !important;
}
.fc-day-header{
	border-width:0 !important;
}
#calendar table{
	margin:0 !important;
}
#calendar h2{
	font-size:1.3125rem !important;
	text-align:left;
	line-height:1.3125rem !important;
}
#calendar h2 span{
	font-size:1.0125rem !important;
}
#calendar button{
	background-color:#21759b !important;
	border-color:#21759b !important;
}
.fc-state-default{
	text-shadow:none !important;
}
.hentry{
	margin-top:0 !important;
}
body,#tribe-events-header{
	font-family:'Open Sans',Helvetica,Arial,sans-serif !important;
	-webkit-font-smoothing:antialiased;
}
.fc-view-container{

}
.desc,.modal{
	display:none;
	width:95%;
	max-width:600px;
	position:fixed;
	padding:20px 50px 50px;
	background:#fff;
	color:#666;
	text-align:left;
	box-shadow: 0 0 10px rgba(0,0,0,.8);
	font-size:18px;
}
.modal:after{
	content:"\f00d";
	font-family: fontawesome;
	position:absolute;
	top:10px;
	right:10px;
	color:#999;
}
.modal{
	z-index:999;
	line-height:20px;
}
.fc-event{
	font-size:1em !important;
}
.fc-day-grid-container{
	height:100% !important;
}
.tribe-events-list-separator-month {
  text-transform: none;
  font-size: 24px;
  margin: 1.25em auto;
  text-align: center;
  position: relative;
  background-color: transparent;
  z-index: 1;
}
.tribe-events-list-separator-month {
  display: block;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 14px;
  margin: 2.5em 0 0;
  background-color: #EEE;
  padding: 6px 10px;
}
.tribe-events-list-separator-month span {
  background-color: #fff;
  padding: 0 7.5%;
}
.tribe-events-list-separator-month {
  text-transform: none;
  font-size: 24px;
  margin: 1.25em auto;
  text-align: center;
  position: relative;
  background-color: transparent;
  z-index: 1;
}
.tribe-events-list-separator-month:after {
  content: '';
  border-bottom: 1px solid #c2c2c2;
  height: 1px;
  width: 100%;
  display: block;
  position: absolute;
  top: 50%;
  left: 0;
  z-index: -1;
}
.test{
  width: 230px;
  height: 100%;
  position: fixed;
  top: 0px;
  left: 0px;
  z-index: 99999999;
  transform: translate(-230px);
  -ms-transform: translate(-230px);
  -webkit-transform: translate(-230px);
  transition: all .30s ease-in-out !important;
  -webkit-transition: all .30s ease-in-out !important;
  overflow: hidden;
}
.mob{
	display:none;
}
.mob{
  display:block;
}
.desk{
  display:none;
}
@media( max-width: 580px ){
	.mob{
		display:block;
	}
	.desk{
		display:none;
	}
}
</style>
<script>
jQuery(document).ready(function($){
$('#mobmenu-center').on('click',function(){
$('.mob_menu_left_panel').addClass('test');
})
});
</script>



<style>
.temp{
	border:0 !important;
	box-shadow:none !important;
	width:100% !important;
	margin-top:0 !important;
}
.num,.mon,.day{
	text-align:center;
}
.num{
	font-size:40px;
	font-weight:bold;
	letter-spacing:-1px;
	line-height:50px;
	opacity:.7;
}
.mon,{
	line-height:30px;
}
.title{
	font-weight:bold;
	font-size:20px;
	padding:0 20px;
	line-height:22px;
	color:#3b3b3b;
}
.times{
	padding-left:20px;
}
.times i{
	padding-right:10px;
}
p{
	line-height:16px;
	font-size:14px;
	padding:20px;
}
.mob .columns{
}
.header{
	text-align:center;
	padding:20px;
	font-size:40px;
	color:#3b3b3b;
	line-height:40px;
}
.mob table,tr,td{
	background:transparent !important;
	border:0 !important;
	vertical-align:top !important;
	padding:0 !important;
	margin:0 !important;
	color:#7a7a7a !important;
}
.mob td{
	width:auto;

}
.desk table tr td{
	border:0 !important;
	vertical-align:top !important;
	padding:10px !important;
	margin:0 !important;
	color:#fff !important;
}
#loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
}
#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 40%;
    width: 75px;
    height: 75px;
    margin: -37px 0 0 -37px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;

    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */

    z-index: 1010;
}
#preloader {
    display: block;
    position: relative;
    left: 50%;
    top: 42.5%;
    width: 200px;
    height: 25px;
    margin: -12px 0 0 -100px;
text-align:center;
    z-index: 1001;
}

    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;

        -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;

        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }


    @-webkit-keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }

    #loader-wrapper .loader-section {
        position: fixed;
        top: 0;
        width: 51%;
        height: 100%;
        background: #fff;
        z-index: 1000;
        -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(0);  /* IE 9 */
        transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
    }

    #loader-wrapper .loader-section.section-left {
        left: 0;
    }

    #loader-wrapper .loader-section.section-right {
        right: 0;
    }

    /* Loaded */
    .loaded #loader-wrapper .loader-section.section-left {
        -webkit-transform: translateX(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateX(-100%);  /* IE 9 */
                transform: translateX(-100%);  /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #loader-wrapper .loader-section.section-right {
        -webkit-transform: translateX(100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateX(100%);  /* IE 9 */
                transform: translateX(100%);  /* Firefox 16+, IE 10+, Opera */

-webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #loader {
        opacity: 0;
        -webkit-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
    }
    .loaded #loader-wrapper {
        visibility: hidden;

        -webkit-transform: translateY(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: translateY(-100%);  /* IE 9 */
                transform: translateY(-100%);  /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.3s 1s ease-out;
                transition: all 0.3s 1s ease-out;
    }

    /* JavaScript Turned Off */
    .no-js #loader-wrapper {
        display: none;
    }
	input[type=checkbox].css-checkbox {
							position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
						}

						input[type=checkbox].css-checkbox + label.css-label {
							padding-left:5px;
							height:20px; 
							display:inline-block;
							line-height:20px;
							background-repeat:no-repeat;
							background-position: 0 0;
							font-size:16px;
							vertical-align:middle;
							cursor:pointer;
							color:#fff;
							font-weight:bold;

						}

						input[type=checkbox].css-checkbox:checked + label.css-label {
							background-position: 0 -20px;
						}
						label.css-label {
				background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_6f8ba1b8becacc84c53c3fb2a008baa7.png);
				-webkit-touch-callout: none;
				-webkit-user-select: none;
				-khtml-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
</style>

<div class="mob">
<div class="temp" style="width:100%;max-width:1000px;background:#fff;display:block;border: 2px dashed #eee;box-shadow: 0 0 0 8px #fff;margin:40px auto;padding:0;padding-bottom:40px;" role="main">

<!--<div id="loader-wrapper">
<div id="preloader"><img src="http://saltydog.com/head.jpg" width="25"><br><br><br>Loading Calendar Data</div>
<div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>-->
<div id="content" style="display:inline-block;height:100%;width:100%;padding:20px 0;">
<div id="calendar"></div>
<div class="row">
<div class="large-12 columns">

</div>
</div>

<div class="large-7  columns">
<div class="row">
<div class="large-12 columns timeSpan" style="padding:10px 0;">
<style>
#timeSpan{
	font-weight:bold;
	font-size:16px !important;
	padding:10px !important;
	/*padding-left:205px !important;*/
}
@media(max-width: 450px){
	.title p{
		/*display:none;*/
	}
}
</style>
<?php
function getStartAndEndDate($week, $year) {
  $dto = new DateTime();
  $dto->setISODate($year, $week);
  $ret['week_start'] = $dto->format('Y-m-d');
  $dto->modify('+6 days');
  $ret['week_end'] = $dto->format('Y-m-d');
  return $ret;
}
$ddate = date('Y-m-d');
$date = new DateTime($ddate);
$week = $date->format("W");
$year = $date->format("Y");
$ns = strtotime("next Saturday");
$today = strtotime(date('Y-m-d 00:00:00',$ns));
$addWeek = strtotime("+7 day",$today);
$nextsat = strtotime("next Saturday");
$nextsat = date('m/d',$nextsat);
 ?>
<form id="time" name="time" action="" method="POST">
<div id="ts" style="position:relative;height:auto;width:100%;display:inline-block;">
<select id="timeSpan" name="timeSpan" style="border:1px solid #ddd;-webkit-appearance:none;box-shadow:none;outline:none;width:100%;padding:10px;">
<option selected=selected disabled=disabled value="">Select Dates</option>

<?php

$y=0;
while($y<=16){
if($y<1){
$day=strtotime(date('Y-m-d 00:00:00'));
$day2 = date('m/d',strtotime("+7 day",$day));
}
if($y>0){
$diff = $diff + 604800;
$day = $today + $diff;
$day2 = $today + $diff;
$day2 = date('m/d',strtotime('+7 day',$day2));
}
echo '<option value="'.date('m/d',$day).'-'.$day2.'">Happening the week of '.date('m/d',$day).' - '.$day2.'</option>';
$y++;
}
 ?>
</select>
</div>
</form>
</div>
</div>
<script>
jQuery(document).ready(function($){
	$('#timeSpan option:nth-child(2)').text('Next 7 Days');
	//$('#timeSpan option:nth-child(3)').text('Happening Next Week');
})
</script>

<style>
#tabs .columns{
	cursor:pointer;
}
.fa-check{
	padding-right:5px;
	margin-left:-5px;
}
#tabs columns{
	padding-left:0 !important;
	padding-right:0 !important;
}
@media(max-width: 900px){
	#timeSpan{
		height:50px;
	}
	#tabs{
		position:relative;
		
	}
	#timeSpan{
		margin-bottom:0 !important;
	}
}
</style>
  <div class="row" style="text-align:center;margin: 0;">
  <div id="tabs">
    <div class="large-2 medium-4 small-4 columns" id="cruise" data-type="cruises" data-element="cruise" style="padding:0 !important;"><div style="height:40px;width:100%;display:block;background:#27ae60;line-height:40px;color:#fff;text-align:center;font-weight:bold;"><i class="fa fa-check"></i>Cruises</div></div>
     <div class="large-3 medium-4 small-4 columns" data-type="music" style="padding:0 !important;" data-element="Music"><div style="height:40px;width:100%;display:block;background:#2980b9;line-height:40px;color:#fff;text-align:center;font-weight:bold;"><i class="fa fa-check"></i>Cafe Music</div></div>
       <div class="large-2 medium-4 small-4 columns" data-type="kids" style="padding:0 !important;" data-element="Kids"><div style="height:40px;width:100%;display:block;background:#e74c3c;line-height:40px;color:#fff;text-align:center;font-weight:bold;"><i class="fa fa-check"></i>Kids</div></div>
         <div class="large-3 medium-6 small-6 columns" data-type="wreck" style="padding:0 !important;" data-element="Wreck"><div style="height:40px;width:100%;display:block;background:#f39c12;line-height:40px;color:#fff;text-align:center;font-weight:bold;"><i class="fa fa-check"></i>Wreck Music</div></div>
  <div class="large-2 medium-6 small-6 columns" data-type="events" style="padding:0 !important;" data-element="Event"><div style="height:40px;width:100%;display:block;background:#9b59b6;line-height:40px;color:#fff;text-align:center;font-weight:bold;"><i class="fa fa-check"></i>Events</div></div>

 


 </div>
  </div>
  <div style="position:relative;">
<hr>
<style>
.loader {
  margin: 60px auto;
  font-size: 10px;
  position: absolute;
  top:0;
  left:50%;
  margin-left:-5em;
  z-index:99999;
  text-indent: -9999em;
  border-top: 1.1em solid rgba(41, 128, 185, 0.2);
  border-right: 1.1em solid rgba(41, 128, 185, 0.2);
  border-bottom: 1.1em solid rgba(41, 128, 185, 0.2);
  border-left: 1.1em solid rgba(41, 128, 185,1);
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
.loader,
.loader:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<div class="loader"></div>
<div id="test"></div>
<div id="cal">
</div>
</div>
</div>
<script>
jQuery(document).ready(function($){
	var firstclick;
	firstclick = true
	$('#tabs .columns').each(function(){
	$(this).on('click tap',function(e){
		e.stopPropagation();
		console.log(firstclick);
		if(firstclick){
		$('#tabs .columns i').removeClass('fa-check');
		$('#tabs .columns i').addClass('not');
		$('i',this).addClass('fa-check');
		$('i',this).removeClass('not');
		$('.loader').show();
	    var classed = $(this).attr('data-element');
		var classy = '.' + classed;
		$('#cal .row').not(classy).hide();
		firstclick = false;
	}else{
	$('.loader').show();
if($('#tabs .columns i.not').length == 4 && $('i',this).hasClass('fa-check')){
		$('#tabs .columns i').each(function(){
			$(this).addClass('fa-check');
			$(this).removeClass('not');
			var elem = $(this).closest('.columns').attr('data-element');
			var element = '.' + elem;
			$(element).show();
		})
	}else{
	var classed = $(this).attr('data-element');
	var classy = '.' + classed;
	$('i',this).toggleClass('fa-check');
	if($('i',this).hasClass('fa-check')){
		$(classy).show();
		$('i',this).removeClass('not');
	}else{
		$(classy).hide();
		$('i',this).addClass('not');
	}
	}
	}
	$('.loader').hide();
	});
	});
	
	
$('.droptext').on('click tap touchstart',function(){
	$('#timeSpan').attr('size',6);
});
$('#timeSpan option').on('click tap touchstart',function(){
	$('#timeSpan').attr('size',1);
});
var timeSpan = '<?=$dateSelect?>';
if(timeSpan != ''){
	$('#timeSpan option').each(function(){
		if($(this).attr('value') == timeSpan){	
			$(this).prop('selected',true);
		}
	});
};

$.ajax({
	url:'all.php',
	data: {'dSelect':'<?=$dateSelect?>'},
	method: 'POST',
	type: 'HTML',
	success: function(data){
		$('#cal').html(data);
		$('.loader').hide();
	}
});
function imageExists(url, callback) {
  var img = new Image();
  img.onload = function() { callback(true); };
  img.onerror = function() { callback(false); };
  img.src = url;
}


$('.event').each(function(){
var id = Math.random();
$('.desc2 p',this).attr('data-id',id);
var name = $('.title', this).text();
if(name == 'The Singing Frog Kidz DJ Dance Party'){
	name = 'anneliza empty'
}
if(name == 'The Music Lady\'s Kids Show'){
	name = 'music-lady empty'
}
if(name == 'The Really Big Little Kids\' Show with Jordan Ross'){
	name = 'jordan empty'
}
name = name.split(' ')
var artist = name[0];
artist = artist.toLowerCase();
var img2 = 'http://saltydog.com/artists/' + artist + '.jpg';
var real='false';
var imageUrl = img2;
imageExists(imageUrl, function(exists) {
  if(exists){real = 'true';}
if(real === 'true'){
	var spot = $('.desc2').find('[data-id="' + id + '"]');
$(spot).prepend('<div style="float:left;width:50px;margin-right:10px;margin-bottom:10px;"><img src="' + img2 + '" width="50"></div>');
}
});
});

    setTimeout(function(){
        $('body').addClass('loaded');
    }, 3000);


$('#timeSpan').on('change',function(e){

firstclick = true;
	$('#test').html('');
	$('.loader').show();
e.preventDefault();
var dSelect = $(this).val();
var area = $('.current').attr('data-type');
if(!area){
	area = 'all';
}
$.ajax({
	url:area + '.php',
	data: {'dSelect':dSelect},
	method: 'POST',
	type: 'HTML',
	success: function(data){
		//console.log(data);
		$('#cal').html(data);
		if(data.length < 1){
		$('#test').html('<div style="width:100%;text-align:center;font-weight:bold;padding:20px;font-size:20px;">No Events Scheduled</div>');
		}
		$('.loader').hide();
		$('#tabs i').each(function(){
			$(this).addClass('fa-check');
		});
		
	}
});
})
});
</script>
<div class="large-5 columns" style="position:relative;top:10px;">
  <div style="width:100%;margin-bottom:20px;text-align:center;color:#fff;"><img src="../marketing/cal/banners/banner_luau_04-16-2016.jpg"></div>
  <div style="width:100%;margin-bottom:20px;text-align:center;color:#fff;"><img src="../marketing/cal/banners/banner_icecream_04-29-2016.jpg"></div>
  <div style="width:100%;margin-bottom:20px;text-align:center;color:#fff;"><img src="../marketing/cal/banners/banner_salad_05-30-2016.jpg"></div>
</div>
<div style="clear:both"></div>
</div>

</div>

 </div>

</div>
<div class="desk">
<div style="clear:both;"></div>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-top:0;">
      <div class="entry-content" style="background:transparent;box-shadow:none;max-width:95%;margin:0 auto;padding:0 10px 40px 10px;">



<div style="width:100%;max-width:1400px;margin:20px auto 0;background:#fff;position:relative;padding:0px;text-align:center;height:100%;z-index:5 !important;padding-bottom:0px;">
<div id='loading' style='display:none'>loading...</div>
<div class="modal"></div>
<div id='calendar'></div>
<script>
jQuery(document).ready(function($){
	$('.fc-day').each(function(){
		var fcHeight = $(this).width();
		$(this).css('min-height',fcHeight + 'px');
	});
});
</script>



      </div> <!-- end .entry-wrap.entry-content -->
    </article> <!-- end .hentry -->
    <div style="clear:both;"></div>
  </div> <!-- end .x-main.x-container-fluid.max.width.offset -->
<?php $check = $_SERVER['REQUEST_URI'];
if($check != '/events/category/music/'){
	?>
  <script>
jQuery(document).ready(function($){
	if($(window).width() > 600){
$.backstretch("http://saltydog.com/images/dronebg.jpg");
	}
});
</script>
<?php }else{?>
<script>
jQuery(document).ready(function($){
	$('.eventTop').hide();
	if($(window).width() > 600){
$.backstretch("<?php echo bloginfo('stylesheet_directory');?>/img/music-bg.jpg");
	}


});
</script>
<?php }?>
 <div style="clear:both;"></div>
<?php //get_footer(); ?>