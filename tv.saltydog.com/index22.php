<?php

mysql_connect("localhost", "timeclk", "SALTYK987") or die(mysql_error()); 

mysql_select_db("saltydog") or die(mysql_error()); 

$now = date('Y-m-d');

$sql = "SELECT * FROM wp_term_relationships,wp_postmeta,wp_posts WHERE wp_postmeta.post_id = wp_term_relationships.object_id AND  wp_postmeta.post_id = wp_posts.ID AND wp_term_relationships.term_taxonomy_id = '297' AND wp_postmeta.meta_value LIKE '$now%'";

$result = mysql_query($sql) or die(mysql_error());

$meta = array();

$pid = array();

$start = array();

$end = array();

$ti = array();

$time = array();

$name = array();

    while ( $row = mysql_fetch_array($result) )

{

	$pid[] = $row['object_id'];

	$meta[] = $row['meta_value'];

	$ti[] = $row['post_title'];

	

}

//sort($meta);

$c = array_combine($meta,$ti);

ksort($c);



foreach($c as $key => $value){

	$time[] = $key;

	$name[] = $value;

}

$count = count($pid);

$x=0;

while ( $x < $count ){

	$y = $x + 1;

	$start[] = date('g:i a',strtotime($time[$x]));

	$end[] = date('g:i a',strtotime($time[$y]));

	$x++;

}

?>

<!DOCTYPE html>

<html>

<head>

	<title>Salty Dog Live!</title>

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

var url = 'http://98.101.223.10:8000';

var songSrc = 'http://98.101.223.10:8011';

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

<br><br>  >><a href = "http://music.saltydog.com">go to music.saltydog.com for schedules</a>

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



<div style="width:640px;height:475px;overflow:hidden;position:relative;border:3px solid #000;">

<script>

jQuery(document).ready(function($){

var url = "http://98.101.223.10:8040/ViewerFrame?Resolution=640x480&Quality=Standard&Size=STD&Language=0&PanTiltMin=0&Sound=Disable&Mode=JPEG&RPeriod=65535&SendMethod=1&View=Full"

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

<IFRAME id="iframe" SRC=""  WIDTH=660 HEIGHT=505 frameborder=0 style="position:relative;top:-25px;"></IFRAME>

<div style="clear:both;"></div>

<div style="position:absolute;top:50px;left:20px;color:#fff;font-size:20px;font-family:helvetica,arial,sans-serif;-webkit-font-smoothing:antialiased;text-align:left;">

You are listening to Salty Dog Radio.<br>

<?php if($name[0]){?>

<hr style="border-top:1px solid rgba(255,255,255,.1);border-left:0;border-right:0;border-bottom:0;">

<span style="font-size:18px;line-height:24px;">Tune in at <?php echo $start[0]?> to watch <?php echo ucwords($name[0])?> live!</span>

<?php }?>

</div>

</div>



<br><br>



<a href="http://saltydog.com"><img src="http://saltydog.com/images/home.png" alt="home" style="width:45px;"></a>



<br>

<font fcae="verdana" size = "2">* Audio and/or Video May be Missing if Musician Not OnStage

</div>



</body></html>







