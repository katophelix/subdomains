<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Salty Dog Live!</title><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/audio.min.js"></script>
<script>
jQuery(document).ready(function($){
var url = "http://www.saltydog.com/webcam/click5/5.html"
var loading_url = "http://saltydog.com/tv/noshow.php"
$('#iframe').attr('src',loading_url);
$.ajax({
    url: url,
    type: 'GET',
    complete: function(e, xhr, settings){
         if(e.status === 200){
              $('#iframe').attr('src',url);
         }
    }
});
});
</script>
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
var url = 'http://98.101.223.10:8000';
var songSrc = 'http://98.101.223.10:8000';
$.ajax({
    url: url,
    type: 'GET',
    complete: function(e, xhr, settings){
         if(e.status === 200){
              songSrc = 'http://98.101.223.10:8000';
         }
    }
});
	
	song = new Audio(songSrc);
	duration = song.duration;

	if (song.canPlayType('audio/mpeg;')) {
    	song.type= 'audio/mpeg';
    	song.src= songSrc;
	} else {
    	song.type= 'audio/ogg';
    	song.src= songSrc;
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
<body bgcolor="#00FFFF">
<div align="center">

<font size="3" face="verdana" color="navy">Broadcasting Live* from The Salty Dog Cafe</font>
<br>
<font size="2" face="verdana" color="navy">
Hilton Head Island,  USA  &nbsp;&nbsp; 29928
<br><br>
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
<!--<div style="width:300px;margin:50px auto 0;display:block">
<a href="http://saltydog.com/live" target="_blank">
<div style="float:left;width:75px;height:75px;border-radius:75px;background:#f00;position:relative;top:-20px;margin-right:10px;text-align:center;color:#fff;line-height:65px;">BETA<br><span class="testing" style="font-size:11px;line-height:11px;position:relative;">Testing</span></div><div style="float:left;"><span style="display:block;margin-top:-20px;font-size:12px;">click for</span>Live Streaming from<br>The Salty Dog Cafe!</div>

</a>
<div style="clear:both;"></div>
</div>-->
>><a href = "http://music.saltydog.com">go to music.saltydog.com for schedules</a>
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

<div id="spin" style="width:640px;height:415px;overflow:hidden;position:relative;border:3px solid #000;">

<IFRAME id="iframe" SRC=""  WIDTH=660 HEIGHT=505 frameborder=0 style="position:relative;top:-56px;left:-10px;"></IFRAME>
<div style="clear:both;"></div>

</div>

<br><br>

<a href="http://saltydog.com"><img src="http://saltydog.com/images/home.png" alt="home" style="width:45px;"></a>

<br>
<font fcae="verdana" size = "2">* Audio and/or Video May be Missing if Musician Not OnStage
</div>

</body></html>



