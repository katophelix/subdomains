<?php
date_default_timezone_set('America/New_York');
include('../wp-load.php');
$day = date('m/d/Y');
$dateSelect =  date('m/d',strtotime($day)).'-'.date('m/d',strtotime('+7 day',strtotime($day)));

$curdate = date('Y-m-d H:i:00');

if(isset($_POST['dSelect'])){
	$dateSelect = $_POST['dSelect'];
}
$tiStart = explode('-',$dateSelect);
$timeStart = explode('/',$tiStart[0]);
$timeStart2 = date('Y').'-'.$timeStart[0].'-'.$timeStart[1].' 00:00:00';
$start = strtotime($timeStart2);
$timeEnd2 = date('Y-m-d 23:59:59',strtotime("+7 day",$start));

$time = array();
$id = array();
global $wpdb;
$sql = $wpdb->get_results("SELECT meta_value,meta_key,post_id FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND meta_value > '{$timeStart2}' AND meta_value < '{$timeEnd2}' ORDER BY meta_value LIMIT 100;");
foreach($sql as $sq){
	$time[] = $sq->meta_value;
	$id[] = $sq->post_id;
}
foreach($time as $ti){
	$end = strtotime($ti) + 60*90;
echo '<div class="row event" style="padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;height:100px;overflow:hidden;margin-bottom:20px;">';
echo '<div class="large-12 colums" style="height:100%;">';
echo '<div class="large-2 small-3 columns" style="background:#27ae60;color:#fff;height:100%;display:block;padding:0;margin:0;">';
echo '<div style="height:100%;width:100%;position:relative;top:20px;">';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="day" style="font-size:20px;text-transform:uppercase;">'.date('M',strtotime($ti)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;padding-top:5px;">';
echo '<div class="num" style="font-size:33px;line-height:30px;opacity:1">'.date('j',strtotime($ti)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:14px;line-height:30px;">Cruise</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '<div class="large-3 small-2 columns" style="height:100px;line-height:100px;text-align:center;border-left: 1px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/artists/cruise.jpg) no-repeat 0 0;background-size:cover;">
</div>';
echo '<div class="large-7 small-7 columns" style="padding-left:10px;padding-top:10px;">';
echo '<div class="title large-8 small-8 columns" style="font-size:14px;line-height:15px;font-weight:300;padding:0;">The Salty Dog Cruise includes an hour and a half boat ride around the Calibogue Sound with live music. <br><span style="font-size:12px;">more info<i class="fa fa-sign-out" style="margin-left:5px;"></i></span></div>';
echo '<div class="times large-3 small-4 columns" style="font-size:22px;font-weight:bold;color:#3b3b3b;line-height:20px;padding:0;text-align:right">'.date('g:i',strtotime($ti))/*.' - '.date('g:i a',strtotime($item['end']['dateTime']))*/.'<br><span style="font-size:14px;font-weight:normal;width:100%;">- '.date('g:i',$end).'</span></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
}
?>