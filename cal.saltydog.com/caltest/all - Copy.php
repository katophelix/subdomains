<?php
date_default_timezone_set('America/New_York');
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../wp-load.php');
$day = date('m/d/Y');
$thisDate = date('Y-m-d');
$thatDate = date('Y-m-d',strtotime('+8 day',strtotime($thisDate)));
$thisDate2 = date('Y-m-d 00:00:00');
$thatDate2 = date('Y-m-d 23:59:59',strtotime('+8 day',strtotime($thisDate2)));
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
$calendar_ids='cal_Vuqs3@V9Ok2lARpc_vh1IMJCC0aM5qJqSFGc8GA&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_7@MarfW0sxxUsrHIAb6XpQ&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_OyOQ7RKpyeYCDbuZnY31Bg&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_E7lP@AhFPHhvxZ7TMX7P2A';
?>
<?php
global $wpdb;
$crus = array();
$sql = $wpdb->get_results("SELECT meta_id,meta_value,meta_key,post_id FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND meta_value > '{$thisDate2}' AND meta_value < '{$thatDate2}' ORDER BY meta_value;");
foreach($sql as $sq){
	$crus[] = $sq-> meta_value;
}
?>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.cronofy.com/v1/events?tzid=America%2FNew_York&from=".$thisDate."&to=".$thatDate."&include_managed=1&calendar_ids[]=".$calendar_ids,
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
$boatId = '';

$begin = new DateTime( $thisDate2 );
$end = new DateTime( $thatDate2 );

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

foreach ( $period as $dt ){
  echo $dt->format( "Y-m-d H:i:s\n" );
}



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
$desc = $item['description'];
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
if($type == 'Wreck'){
	$type = 'Wreck Music';
}
if($type == 'Music'){
	$type = 'Cafe Music';
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

$sql = $wpdb->get_results("SELECT DISTINCT meta_id,meta_value,meta_key,post_id FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND meta_value > '{$sd}' AND meta_value < '{$ed}' ORDER BY meta_value LIMIT 1;");
foreach($sql as $sq){
	$time = date('g:i',strtotime($sq->meta_value));
	$timeEnd = date('G:i',strtotime($sq->meta_value));
	$a = date('A',strtotime($sq->meta_value));
	$end = strtotime($timeEnd) + 60*90;
if($boatId != $sq->meta_id){
echo '<div class="row cruise" style="cursor:pointer;padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;height:100px;overflow:hidden;margin-bottom:20px;">';
echo '<div class="large-12 colums" style="height:100%;">';
echo '<div class="large-2 small-2 columns" style="background:#27ae60;color:#fff;height:100%;display:block;padding:0;margin:0;">';
echo '<div style="height:100%;width:100%;position:relative;top:10px;">';
echo '<div class="large-12 columns" style="padding:0;text-align:center;">';
echo '<div class="day-text" style="font-size:14px;font-weight:bold;text-transform:uppercase;">'.date('D',strtotime($sd)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="day" style="font-size:20px;text-transform:uppercase;">'.date('M',strtotime($sd)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:33px;line-height:35px;opacity:1">'.date('j',strtotime($sd)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:14px;line-height:20px;">Cruise</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '<div class="times large-1 small-2 columns" style="height:100%;font-size:16px;font-weight:normal;color:#3b3b3b;padding:10px 0;text-align:center;color:#fff;background:#7f8c8d;border-left:0px solid #fff;">'.$time.'<span style="font-size:12px;display:block;">'.$a.'</span><div style="font-size:10px;display:block;height:20px;line-height:15px;">to</div><span style="display:block">'.date('g:i',$end).'</span><span style="font-size:12px;display:block;">'.date('A',$end).'</span></div>';
echo '<div class="large-3 small-3 columns" style="height:100px;line-height:100px;text-align:center;border-left: 0px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/marketing/cal/crui.jpg) no-repeat 0 0;background-size:cover;">
</div>';
echo '<div class="large-6 sm all-7 columns" style="padding-left:10px;padding-top:10px;">';
echo '<div class="title" style="font-size:18px;font-weight:300;padding:0;">Salty Dog Happy Hour Cruise<br><span class="book" style="cursor:pointer;font-size:12px;">book a cruise<i class="fa fa-sign-out" style="margin-left:5px;"></i></span></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
$boatId = $sq->meta_id;
}
}
?>
<script>
jQuery(document).ready(function($){
	$('.book').on('click tap touchstart',function(){
var wihe = 'width='+screen.availWidth/2+',height='+screen.availHeight;
var spot = screen.availWidth/2;
window.open('http://cruise.saltydog.com',"popupWindow", "screenX=1,screenY=1,left="+spot+",top=1," + wihe);	
});
});
</script>
<?php
/********************************************************/
if(strlen($name) >=4 ){
	$name = substr($name,0,4);
}
if($type != 'Cruise'){
	$typ = $type;
	if($typ == 'Wreck Music'){
		$typ = 'Wreck';
	}
echo '<div class="row '.$typ.'" style="padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;height:100px;overflow:hidden;margin-bottom:20px;">';
echo '<div class="large-12 colums" style="height:100%;">';
echo '<div class="large-2 small-2 columns" style="background:'.$color.';color:#fff;height:100%;display:block;padding:0;margin:0;">';
echo '<div style="height:100%;width:100%;position:relative;top:10px;">';
echo '<div class="large-12 columns" style="padding:0;text-align:center;">';
echo '<div class="day-text" style="font-size:14px;font-weight:bold;text-transform:uppercase;">'.date('D',strtotime($startDate)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="day" style="font-size:20px;text-transform:uppercase;">'.date('M',strtotime($startDate)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:33px;line-height:35px;opacity:1">'.date('j',strtotime($startDate)).'</div>';
echo '</div>';
echo '<div class="large-12 columns" style="padding:0;">';
echo '<div class="num" style="font-size:14px;line-height:20px;">'.$type.'</div>';
echo '</div>';

echo '</div>';
echo '</div>';


echo '<div class="times large-1 small-2 columns" style="height:100%;font-size:16px;font-weight:normal;color:#3b3b3b;padding:10px 0;text-align:center;color:#fff;background:#7f8c8d;border-left:0px solid #fff;">'.date('g:i',$dt).'<span style="font-size:12px;display:block;">'.date('A',$dt).'</span><div style="font-size:10px;display:block;height:20px;line-height:15px;">to</div><span style="display:block">'.date('g:i',strtotime($item['end'])).'</span><span style="font-size:12px;display:block;">'.date('A',strtotime($item['end'])).'</span></div>';
echo '<div class="large-3 small-3 columns" style="height:100px;line-height:100px;text-align:center;border-left: 0px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/marketing/cal/'.$name.'.jpg) no-repeat 0 0;background-size:cover;">
</div>';
echo '<div class="large-6 small-7 columns" style="padding-left:10px;padding-top:10px;">';
echo '<div class="title" style="font-size:18px;font-weight:300;padding:0;">'.$item['summary'].'<br><p style="font-size:12px;padding:0;margin:0;">'.substr($desc,0,116).'...</p></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
}
}
?>