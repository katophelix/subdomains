<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Salty Dog Music</title>
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
        //Detect iPhone
        (navigator.platform.indexOf("iPhone") != -1) ||
        //Detect iPod
        (navigator.platform.indexOf("iPad") != -1)
    );
}

	jQuery(function($) {
	song = new Audio('http://98.101.223.10:8011');
	duration = song.duration;

	if (song.canPlayType('audio/mpeg;')) {
    	song.type= 'audio/mpeg';
    	song.src= 'http://64.203.245.206:8041';
	} else {
    	song.type= 'audio/ogg';
    	song.src= 'http://64.203.245.206:8041';
	}
        
		song.play();
        


		$('#spinner').on('click',function(){
			song.delay(3000).play();
		});
		
		$(song).bind("playing", function() {
		$("#spinner").fadeOut('slow');
		 $('#frame').load('data.php');
		
	});
});
</script>
</head>
<body bgcolor="#00FFFF">
<div align="center">

<font size="3" face="verdana" color="navy">Live from The Salty Dog Cafe</font>
<br>
<font size="2" face="verdana" color="navy">
Hilton Head Island &nbsp;&nbsp; USA</font>
<br><br>
<script>
if(!isiPhone()){
document.write('<img src="loader2.gif" id="spinner">');
}else{
document.write('<input type="button" style="width:auto;padding:10px 20px;" class="clickHere" value="Click Here for Audio">');
}
$('.clickHere').on('click',function(){
	$(this).html('<img src="loader2.gif" id="spinner">');
	$(this).css('background','transparent');
	song.play();
	$('#frame').load('http://saltydog.com/tv/data.php');
});
	</script>
<br><br>
<a href="/index.html">

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
<div id="frame" style="width:640px;height:475px;overflow:hidden;position:relative;border:3px solid #000;">

</div>

</a>
<br><br>

<a href="http://saltydog.com"><img src="http://saltydogcafe.com/home.jpg" alt="home"></a>

</div>


</body></html>



