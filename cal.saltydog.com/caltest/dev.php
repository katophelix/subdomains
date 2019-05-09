<?php
date_default_timezone_set('America/New_York');
$day = date('m/d/Y');
$dateSelect =  date('m/d',strtotime($day)).'-'.date('m/d',strtotime('+7 day',strtotime($day)));
if(isset($_POST['dSelect'])){
	$dateSelect = $_POST['dSelect'];
}
$tiStart = explode('-',$dateSelect);
$timeStart = $tiStart[0].'/'.date('Y').' 00:00:00';
$time = new DateTime($timeStart);
$dateTime = $time->format(DateTime::ATOM);
$tiEnd = explode('-',$dateSelect);
$timeEnd = $tiStart[1].'/'.date('Y').' 23:59:59';
$timeE = new DateTime($timeEnd);
$dateTimeE = $timeE->format(DateTime::ATOM);
$kidsurl = "https://www.googleapis.com/calendar/v3/calendars/orlckuk8igit9ba3ls26q1vqrc@group.calendar.google.com/events?key=AIzaSyD7GsjCq0vylLv6vv3A1WjkrFTOuidj-hU&singleEvents=true&orderBy=startTime&timeMin=".$dateTime."&maxResults=100&timeMax=".$dateTimeE;
$eventsurl = "https://www.googleapis.com/calendar/v3/calendars/hndn1g7andcvs8gk35jf4i82s4@group.calendar.google.com/events?key=AIzaSyD7GsjCq0vylLv6vv3A1WjkrFTOuidj-hU&singleEvents=true&orderBy=startTime&timeMin=".$dateTime."&maxResults=100&timeMax=".$dateTimeE;
$wreckurl="https://www.googleapis.com/calendar/v3/calendars/0rivmsv263ckaa19au3t22b2kg@group.calendar.google.com/events?key=AIzaSyD7GsjCq0vylLv6vv3A1WjkrFTOuidj-hU&singleEvents=true&orderBy=startTime&timeMin=".$dateTime."&maxResults=100&timeMax=".$dateTimeE;
$url="https://www.googleapis.com/calendar/v3/calendars/todd@saltydog.com/events?key=AIzaSyD7GsjCq0vylLv6vv3A1WjkrFTOuidj-hU&singleEvents=true&orderBy=startTime&timeMin=".$dateTime."&maxResults=100&timeMax=".$dateTimeE;
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);

$json = json_decode($result, true);
$x = 1;
foreach ($json['items'] as $item) {
if($x < 30){
$start = $item['start']['dateTime'];
$start = explode('T',$start);

$dt=new DateTime($item['start']['dateTime']);
$dt = $dt->format('U');

$startDate = $start[0];
$startTimes = $start[1];
$startTime = explode('-',$startTimes);
$color = '#2980b9';
$type = 'Music';
$title = $item['summary'];
if (strpos($title, 'The') !== false) {
    $color = '#9b59b6';
    $type = 'Event';
}
if (strpos($title, 'Salty Dog') !== false) {
    $color = '#9b59b6';
    $type = 'Event';
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
echo '<div class="large-3 small-3 columns" style="height:100px;line-height:100px;text-align:center;border-left: 8px solid #474747;padding:0;background:url(http://saltydog.com/artists/'.$name.'.jpg) no-repeat 0 0;background-size:cover;">
</div>';
echo '<div class="large-7 small-7 columns" style="padding-left:10px;padding-top:10px;">';
echo '<div class="title large-7 small-8 columns" style="font-size:18px;font-weight:300;padding:0;width:inherit">'.$item['summary'].'<br><span style="font-size:12px;">more info<i class="fa fa-sign-out" style="margin-left:5px;"></i></span></div>';
echo '<div class="times large-4 small-4 offset-1 columns" style="font-size:22px;font-weight:bold;color:#3b3b3b;line-height:20px;padding:0;text-align:right">'.date('g:i',$dt)/*.' - '.date('g:i a',strtotime($item['end']['dateTime']))*/.'<br><span style="font-size:14px;font-weight:normal;width:100%;">- '.date('g:i',strtotime($item['end']['dateTime'])).'</span></div>';
echo '</div>';
//echo '<div class="large-3 small-3 columns" style="height:100px;"></div>';
echo '</div>';
echo '</div>';
}
$x++;
}
?>