<?php
date_default_timezone_set('America/New_York');
error_reporting(E_ALL);
mysql_connect("localhost", "saltydog", "SALTYK987") or die(mysql_error()); 
mysql_select_db("saltydog") or die(mysql_error()); 
$day = date('m/d/Y');
$thisDate = date('Y-m-d');
//$thatDate = date('Y-m-d',strtotime('+8 day',strtotime($thisDate)));
$thatDate = date('Y-m-d',strtotime('next Saturday'));
$thisDate2 = date('Y-m-d 00:00:00');
$thatDate2 = date('Y-m-d 23:59:59',strtotime('+8 day',strtotime($thisDate2)));
//$dateSelect =  date('m/d',strtotime($day)).'-'.date('m/d',strtotime('+7 day',strtotime($day)));
$nextsat = date('m/d',strtotime('next Saturday'));
$dateSelect =  date('m/d',strtotime($day)).'-'.$nextsat;

function http_file_exists($url, $followRedirects = true) 
{ 
   $url_parsed = parse_url($url); 
   extract($url_parsed); 
   if (!@$scheme) $url_parsed = parse_url('http://'.$url); 
   extract($url_parsed); 
   if(!@$port) $port = 80; 
   if(!@$path) $path = '/'; 
   if(@$query) $path .= '?'.$query; 
   $out = "HEAD $path HTTP/1.0\r\n"; 
   $out .= "Host: $host\r\n"; 
   $out .= "Connection: Close\r\n\r\n"; 
   if(!$fp = @fsockopen($host, $port, $es, $en, 5)){ 
       return false; 
   } 
   fwrite($fp, $out); 
   while (!feof($fp)) { 
       $s = fgets($fp, 128); 
       if(($followRedirects) && (preg_match('/^Location:/i', $s) != false)){ 
           fclose($fp); 
           return http_file_exists(trim(preg_replace("/Location:/i", "", $s))); 
       } 
       if(preg_match('/^HTTP(.*?)200/i', $s)){ 
           fclose($fp); 
           return true; 
       } 
   } 
   fclose($fp); 
   return false; 
} 


if(isset($_POST['dSelect'])){
	$dateSelect = $_POST['dSelect'];
}

$tiStart = explode('-',$dateSelect);
$timeStart = $tiStart[0].'/'.date('Y').' 12:00:00';
$ts = explode('/',$tiStart[0]);
$thisDate = date('Y').'-'.$ts[0].'-'.$ts[1];
$time = new DateTime($timeStart);
$dateTime = $time->format(DateTime::ATOM);
$tiEnd = explode('-',$dateSelect);
$timeEnd = $tiStart[1].'/'.date('Y').' 11:59:59';
$te = explode('/',$tiStart[1]);
$thatDate = date('Y').'-'.$te[0].'-'.$te[1];
$timeE = new DateTime($timeEnd);
$dateTimeE = $timeE->format(DateTime::ATOM);
$calendar_ids='cal_Vuqs3@V9Ok2lARpc_vh1IMJCC0aM5qJqSFGc8GA&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_7@MarfW0sxxUsrHIAb6XpQ&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_OyOQ7RKpyeYCDbuZnY31Bg&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_E7lP@AhFPHhvxZ7TMX7P2A&calendar_ids[]=cal_Vuqs3@V9Ok2lARpc_2uqEu5teO97ANf1dboMtyQ';
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
//print_r($json);
$boatId = '';

$pi = array();
foreach($json['events'] as $item){
$dis = 'false';
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
	$needle = 'Dog';
    $event = substr($title, strpos($title, $needle) + strlen($needle), 5);
	$event = trim(strtolower($event));
	$event = $event.'.jpg';
	$dis = 'true';
}
if (strpos($location, 'Wreck') !== false) {
    $color = '#f39c12';
    $type = 'Wreck';
}
if (strpos($location, 'Cargo') !== false) {
    $color = '#e74c3c';
    $type = 'Kids';
}
//if (strpos($title, 'Kid\'s') !== false) {
  //  $color = '#e74c3c';
  ///  $type = 'Kids';
//}
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
$name="default";
if(str_word_count($item['summary']) > 2){
$name = explode(' ',$item['summary']);
$name = substr($name[0],0,4);
$name = strtolower($name.'.jpg');
if(strpos($item['summary'],'Salty Dog') > 0){
	$name = explode(' ',$item['summary']);
	$name = $name[3];
	$name = substr($name,0,4);
	$name = strtolower($name.'.jpg');
}
}
if(str_word_count($item['summary']) <= 2){
$name = explode(' ',trim($item['summary']));
$name = strtolower($name[0]);
}elseif( $item['summary'] == 'The Music Lady\'s Kids Show'){
$name = 'beth';
}elseif( $item['summary'] == 'Salty Dog Birthday Bash'){
$name = 'birt';
}elseif( $item['summary'] == 'Salty Dog Preakness Party'){
$name = 'prea';
}elseif( $item['summary'] == 'The Salty Dog Grand Re-Opening Oyster Roast'){
$name='oyster2';
}elseif( $item['summary'] == 'Salty Dog Craft Beer & BBQ Festival'){
$name='craft';
}elseif( $item['summary'] == 'The Salty Dog Annual Oyster Roast'){
$name='oyster';
}elseif( $item['summary'] == 'Salty Dog Lobsterfest'){
$name='lobster';
}elseif( $item['summary'] == 'Salty Dog Low and Slow Fest (BBQ)'){
$name='lowslow';
}elseif( $item['summary'] == 'The Salty Dog New England Clam Bake'){
$name='clambake';
}elseif( $item['summary'] == 'Salty Dog Homecoming'){
$name='hime';

}elseif( strpos($title,'Happy Hour Cruise') !== false){
/*$title2 = explode('with',trim($title));
$title3 = $title2[1];
$title4 = explode(' ',trim($title3));
$name = strtolower($title4[0]);*/
$name='cruise';
}

/********************************************************/

$cancel = array();
	$dql = "SELECT * FROM wp_postmeta WHERE meta_key = '_EventVenueID' and meta_value = '18374'";
	$result = mysql_query($dql) or die(mysql_error());
	while($row = mysql_fetch_array($result)){
		$cancel[] = $row['post_id'];
	}


$sql = "SELECT DISTINCT meta_id,meta_value,meta_key,post_id FROM wp_postmeta WHERE meta_key = '_EventStartDate' AND meta_value > '{$sd}' AND post_id NOT IN ( '" . implode($cancel, "', '") . "' ) AND meta_value < '{$ed}' ORDER BY meta_value;";
$result= mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result)){
if ( in_array($row['post_id'], $pi) ) {
	continue;
}
$pi[] = $row['post_id'];
$sql1 = "SELECT meta_key,meta_value,post_id FROM wp_postmeta WHERE meta_key = 'performer' AND post_id = ".$row['post_id'];
$result1 = mysql_query($sql1);
while($per = mysql_fetch_array($result1)){
	$performer = $per['meta_value'];
}
$sql2 = "SELECT post_name,post_title FROM wp_posts WHERE id = ".$row['post_id'];
$result2 = mysql_query($sql2) or die(mysql_error());
while($row2 = mysql_fetch_array($result2)){
$link = $row2['post_name'];
$ptitle = $row2['post_title'];
}

$time = date('g:i',strtotime($row['meta_value']));
$timeEnd = date('G:i',strtotime($row['meta_value']));
$a = date('A',strtotime($row['meta_value']));
$end = strtotime($timeEnd) + 60*90;
if($boatId != $row['meta_id']){
echo '<div class="122 row cruise" style="cursor:pointer;padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;margin-bottom:20px;max-width:100%;margin:0 auto 20px;">';
echo '<div class="large-12 colums">';
echo '<div class="large-2 small-4 columns" style="background:#27ae60;color:#fff;height:100px;display:block;padding:0;margin:0;">';
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


echo '<div class="times large-1 small-4 columns" style="height:100px;font-size:16px;font-weight:normal;color:#3b3b3b;padding:10px 0;text-align:center;color:#fff;background:#7f8c8d;border-left:0px solid #fff;">'.$time.'<span style="font-size:12px;display:block;">'.$a.'</span><div style="font-size:10px;display:block;height:20px;line-height:15px;">to</div><span style="display:block">'.date('g:i',$end).'</span><span style="font-size:12px;display:block;">'.date('A',$end).'</span></div>';

if($ptitle === 'Supermoon Cruise'){
echo '<div class="large-3 small-4 columns" style="height:100px;line-height:100px;text-align:center;border-left: 0px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/marketing/cal/banners/banner_supermoon_11-14-2016.jpg?v=543) no-repeat 0 0;background-size:cover;">';
}else{
echo '<div class="large-3 small-4 columns" style="height:100px;line-height:100px;text-align:center;border-left: 0px solid rgba(255,255,255,.5);padding:0;background:url(http://saltydog.com/marketing/cal/crui.jpg?v=90118) no-repeat 0 0;background-size:cover;">';
}
echo '</div>';



echo '<div class="large-6 small-12 columns" style="padding-left:10px;padding-top:10px;">';
if($performer !== ''){
	$per = '<span style="display:block;font-size:14px;">Music by '.$performer.'</span>';
}else{
	$per = '';
}
echo '<div class="title" style="font-size:18px;font-weight:300;padding:0;">Salty Dog '.$ptitle.'<br>'.$per;
echo '<a class="book" href="http://saltydog.com/boatcruise/'.$link.'"><span style="cursor:pointer;font-size:12px;">book this cruise<i class="fa fa-sign-out" style="margin-left:5px;"></i></span></a></div>';
?>






<script>
jQuery(document).ready(function($){
$('.book').on('click tap touchstart',function(e){
	e.preventDefault();
	var linked = $(this).attr('href');
var wihe = 'width='+screen.availWidth/2+',height='+screen.availHeight;
var spot = screen.availWidth/3;
window.open(linked,"popupWindow", "screenX=1,screenY=1,left="+spot+",top=1," + wihe);	
});
});
</script>

<?php
echo '</div>';
echo '</div>';
echo '</div>';
$boatId = $row['meta_id'];
}
}
?>








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

$image_url = 'http://saltydog.com/marketing/'; 
$image_path = (http_file_exists($image_url.'cal/'.$name.'.jpg')) ? '<div class="large-3 small-4 columns" style="height:100px;line-height:100px;text-align:center;border-left: 0px solid rgba(255,255,255,.5);padding:0;background:url('.$image_url.'cal/'.$name.'.jpg?v=228778833) no-repeat center;background-size:cover;)"></div>' : '<div class="'.$name.' large-3 small-4 columns" style="height:100px;line-height:100px;text-align:center;border-left: 0px solid rgba(255,255,255,.5);padding:0;background:url('.$image_url.'cal/default.jpg?v=228778833) no-repeat center;background-size:85px 89px;)"></div>'; 

echo '<div class="row '.$typ.'" style="padding:0px;padding-left:0px;background:#fafafa;border:1px solid #ddd;border-bottom:01px solid #ddd;margin-bottom:20px;">';
echo '<div class="large-12 colums">';
echo '<div class="large-2 small-4 columns" style="height:100px;background:'.$color.';color:#fff;display:block;padding:0;margin:0;">';
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


echo '<div class="times large-1 small-4 columns" style="height:100px;font-size:16px;font-weight:normal;color:#3b3b3b;padding:10px 0;text-align:center;color:#fff;background:#7f8c8d;border-left:0px solid #fff;">'.date('g:i',$dt).'<span style="font-size:12px;display:block;">'.date('A',$dt).'</span><div style="font-size:10px;display:block;height:20px;line-height:15px;">to</div><span style="display:block">'.date('g:i',strtotime($item['end'])).'</span><span style="font-size:12px;display:block;">'.date('A',strtotime($item['end'])).'</span></div>';

	echo $image_path;

echo '<div class="large-6 small-12 columns" style="height:100px;overflow:hidden;padding-left:10px;padding-top:10px;">';
echo '<div class="title" style="font-size:18px;font-weight:300;padding:0;">'.$item['summary'].'<br><p style="font-size:12px;padding:0;margin:0;">'.substr($desc,0,180).'</p></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
}
}
?>