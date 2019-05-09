<?php
date_default_timezone_set('America/New_York');
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../wp-load.php');
$day = date('m/d/Y');
$thisDate = date('Y-m-d');
$thatDate = date('Y-m-d',strtotime('+8 day',strtotime($thisDate)));
$dateSelect =  date('m/d',strtotime($day)).'-'.date('m/d',strtotime('+7 day',strtotime($day)));
if(isset($_POST['dSelect'])){
	$dateSelect = $_POST['dSelect'];
}
$tiStart = explode('-',$dateSelect);
$timeStart = $tiStart[0].'/'.date('Y').' 00:00:00';
$ts = explode('/',$tiStart[0]);
$thisDate = date('Y').'-'.$ts[0].'-'.$ts[1];
$time = new DateTime($timeStart);
$dateTime = $time->format(DateTime::ATOM);
$tiEnd = explode('-',$dateSelect);
$timeEnd = $tiStart[1].'/'.date('Y').' 23:59:59';
$te = explode('/',$tiStart[1]);
$thatDate = date('Y').'-'.$te[0].'-'.$te[1];
$timeE = new DateTime($timeEnd);
$dateTimeE = $timeE->format(DateTime::ATOM);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.cronofy.com/v1/events?tzid=America%2FNew_York&from=".$thisDate."&to=".$thatDate."&include_managed=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer zao7ityokMEHkc6W90pwiW-REw-iDmlm",
    "cache-control: no-cache",
    "postman-token: 59f55038-6f34-cd9c-8536-39c51215b2ea"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

}
//echo $response;
$json = json_decode($response,true);
foreach($json['events'] as $item){
$start = $item['start'];
$start = explode('T',$start);

$dt=new DateTime($item['start']);
$dt = $dt->format('U');

$startDate = $start[0];
$sd = $startDate.' 00:00:00';
$ed = $startDate.' 23:59:59';
$startTimes = $start[1];
$startTime = explode('-',$startTimes);
$color = '#2980b9';
$type = 'Music';
$title = $item['summary'];
if($item['location']){
$location = $item['location']['description'];
}
if (strpos($title, 'The') !== false) {
    $color = '#9b59b6';
    $type = 'Event';
}
if (strpos($title, 'Salty Dog') !== false) {
    $color = '#9b59b6';
    $type = 'Event';
}
if (strpos($location, 'Wreck') !== false) {
    $color = '#f39c12';
    $type = 'Wreck';
}
if (strpos($title, 'Kids') !== false) {
    $color = '#e74c3c';
    $type = 'Kids';
}
if (strpos($title, 'Kid\'s') !== false) {
    $color = '#e74c3c';
    $type = 'Kids';
}
if (strpos($title, 'Cruise') !== false) {
    $color = '#27ae60';
    $type = 'Cruise';
}
$name='bruce';
if(str_word_count($item['summary']) <= 2){
$name = explode(' ',trim($item['summary']));
$name = strtolower($name[0]);
}elseif( $item['summary'] == 'The Music Lady\'s Kids Show'){
$name = 'beth';
}elseif( $item['summary'] == 'The Salty Dog Grand Re-Opening Oyster Roast'){
$name='oyster2';
}elseif( strpos($title,'Happy Hour Cruise') !== false){
/*$title2 = explode('with',trim($title));
$title3 = $title2[1];
$title4 = explode(' ',trim($title3));
$name = strtolower($title4[0]);*/
$name='cruise';
}
/********************************************************/

global $wpdb;
$sql = $wpdb->get_results("SELECT meta_value,meta_key,post_id FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND meta_value > '{$sd}' AND meta_value < '{$ed}' ORDER BY meta_value LIMIT 100;");
foreach($sql as $sq){
	$time = date('g:i',$sq->_EventStartDate);
	$end = strtotime($time) + 60*90;
	echo '<div class="row event" style="padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;height:100px;overflow:hidden;margin-bottom:20px;">';
echo '<div class="large-12 colums" style="height:100%;">';
echo '<div class="large-2 small-2 columns" style="background:#27ae60;color:#fff;height:100%;display:block;padding:0;margin:0;">';
echo '<div style="height:100%;width:100%;position:relative;top:20px;">';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="day" style="font-size:20px;text-transform:uppercase;">'.date('M',strtotime($sd)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:33px;line-height:30px;opacity:1">'.date('j',strtotime($sd)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:14px;line-height:30px;">cruise</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '<div class="large-3 small-3 columns" style="height:100px;line-height:100px;text-align:center;border-left: 1px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/artists/cruise.jpg) no-repeat 0 0;background-size:cover;">
</div>';
echo '<div class="large-7 small-7 columns" style="padding-left:10px;padding-top:10px;">';
echo '<div class="title large-7 small-8 columns" style="font-size:18px;font-weight:300;padding:0;width:inherit">Salty Dog Happy Hour Cruise<br><span style="font-size:12px;">more info<i class="fa fa-sign-out" style="margin-left:5px;"></i></span></div>';
echo '<div class="times large-4 small-4 offset-1 columns" style="font-size:22px;font-weight:bold;color:#3b3b3b;line-height:20px;padding:0;text-align:right">'.$time/*.' - '.date('g:i a',strtotime($item['end']['dateTime']))*/.'<br><span style="font-size:14px;font-weight:normal;width:100%;">- '.date('g:i',strtotime($item['end']['dateTime'])).'</span></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
}
/********************************************************/


echo '<div class="row event" style="padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;height:100px;overflow:hidden;margin-bottom:20px;">';
echo '<div class="large-12 colums" style="height:100%;">';
echo '<div class="large-2 small-2 columns" style="background:'.$color.';color:#fff;height:100%;display:block;padding:0;margin:0;">';
echo '<div style="height:100%;width:100%;position:relative;top:20px;">';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="day" style="font-size:20px;text-transform:uppercase;">'.date('M',strtotime($startDate)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:33px;line-height:30px;opacity:1">'.date('j',strtotime($startDate)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:14px;line-height:30px;">'.$type.'</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '<div class="large-3 small-3 columns" style="height:100px;line-height:100px;text-align:center;border-left: 1px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/artists/'.$name.'.jpg) no-repeat 0 0;background-size:cover;">
</div>';
echo '<div class="large-7 small-7 columns" style="padding-left:10px;padding-top:10px;">';
echo '<div class="title large-7 small-8 columns" style="font-size:18px;font-weight:300;padding:0;width:inherit">'.$item['summary'].'<br><span style="font-size:12px;">more info<i class="fa fa-sign-out" style="margin-left:5px;"></i></span></div>';
echo '<div class="times large-4 small-4 offset-1 columns" style="font-size:22px;font-weight:bold;color:#3b3b3b;line-height:20px;padding:0;text-align:right">'.date('g:i',$dt)/*.' - '.date('g:i a',strtotime($item['end']['dateTime']))*/.'<br><span style="font-size:14px;font-weight:normal;width:100%;">- '.date('g:i',strtotime($item['end']['dateTime'])).'</span></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
}
?>