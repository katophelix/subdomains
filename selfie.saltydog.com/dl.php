<?php
$image = $_GET['image'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
<title>Untitled Document</title>
</head>
<body style="height:auto;width:auto;">
<div id="cont" style="display:block;width:100%;max-width:640px;height:auto;">
<!--<image id="img1" src="<?php echo $image?>" style="width:100%;position:relative;top:0;z-index:9999999;left:0;max-width:640px;">-->
<image id="img1" src="https://saltydog.com/animated-logo3.gif" style="width:250px;position:relative;top:0;z-index:9999999;left:0;max-width:640px;left:50%;margin-left:-125px;">
<div style="clear:both;"></div>
</div>
 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    jQuery(document).ready(function () {	
	setTimeout(function(){
		var img = '<?=$image?>';
 $("img").attr('src','<?=$image?>');
 $("img").load(function() {
 $("img").css({
	 'width':'100%',
	 'margin':'0',
	 'left':'0',
 });
 });
 	$("img").one("load", function() {
        var frame = $('#iframe1', window.parent.document);
            var height = jQuery("#img1").height();
            frame.height(height + 15);
}).each(function() {
  if(this.complete) $(this).load();
});

    },3500);
	
	$("img").one("load", function() {
        var frame = $('#iframe1', window.parent.document);
            var height = jQuery("#img1").height();
            frame.height(height + 15);
}).each(function() {
  if(this.complete) $(this).load();
});
	
		
    
    });
</script>
</body>
</html>