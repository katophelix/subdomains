<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Salty Dog Piano Live!</title>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/audio.min.js"></script>
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
     <script>
	 function isiPhone(){
    return (
        (navigator.platform.indexOf("iPhone") != -1) ||
        (navigator.platform.indexOf("iPad") != -1)
    );
}
var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1;

	jQuery(function($) {
	songSrc = 'http://98.101.223.10:8000';
	song = new Audio('http://98.101.223.10:8000');
	duration = song.duration;

	if (song.canPlayType('audio/mpeg;')) {
    	song.type= 'audio/mpeg';
    	song.src= 'http://98.101.223.10:8000';
	} else {
    	song.type= 'audio/ogg';
    	song.src= 'http://98.101.223.10:8000';
	}

		song.play();
		
		$('#spinner').on('click',function(){
			song.play();
		});
		
		$(song).bind("playing", function() {
		$("#spinner").fadeOut('slow');
	});
});
</script>
</head>
<body bgcolor="#EAFFFF">
<div align="center">

<font size="3" face="verdana" color="navy">Broadcasting Live* from The Wreck of Salty Dog</font>
<br>
<font size="2" face="verdana" color="navy">
Hilton Head Island,  USA  &nbsp;&nbsp; 29928
<br><br><a href = "http://music.saltydog.com" target="_blank">go to: music.saltydog.com for schedules</a>
</font>
<br>
<script>
if(isiPhone() || isAndroid){
	document.write('<div class="clickHere"><input type="button" style="width:auto;padding:10px 20px;font-size:40px;margin-top:20px;" value="Click Here for Audio"></div>');

}else{
document.write('<img src="loader2.gif" id="spinner">');
}
$('.clickHere').on('click',function(){
	$(this).html('<img src="loader2.gif" id="spinner">');
	song.play();
});
	</script>
<br><br>

<!-- <script language="javascript">
var refreshrate=.5;             
var image="http://64.203.245.206:8096/webcam.jpg";
var imgheight=480;                   
var imgwidth=640;                
function refresh(){
document.images["pic"].src=image+"?"+new Date();
setTimeout('refresh()', refreshrate*1000);}
document.write('<IMG SRC="'+image+'" ALT="Please Stand By For Webcam Photo Upload" NAME="pic" ID="pic" WIDTH="'+imgwidth+'" HEIGHT="'+imgheight+'" STYLE="border: 3px solid Black;">');
</script>  -->

<div style="width:640px;height:475px;overflow:hidden;position:relative;border:3px solid #000;">
<IFRAME SRC="http://98.101.223.10:8040/ViewerFrame?Resolution=640x480&Quality=Standard&Size=STD&Language=0&PanTiltMin=0&Sound=Disable&Mode=JPEG&RPeriod=65535&SendMethod=1&View=Full"  WIDTH=660 HEIGHT=505 frameborder=0 style="position:relative;top:-25px;"></IFRAME>
<div style="clear:both;"></div>

</div>

<br><br>

<a href="http://saltydog.com" target="_blank"><img src="http://saltydog.com/images/home.png" alt="home" style="width:45px;"></a>

<br>
<font fcae="verdana" size = "2">* Audio and/or Video May be Missing if Musician Not OnStage
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52699719-1', 'auto');
  ga('send', 'pageview');

</script>
</body></html>



