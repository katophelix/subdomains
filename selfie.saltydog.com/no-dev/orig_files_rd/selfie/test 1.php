<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('src/class.phpmailer.php');
if(isset($_POST['image'])){
	$image = $_POST['image'];
}
function copyRemoteFile($url, $localPathname){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    if ($data) {
        $fp = fopen($localPathname, 'wb');

        if ($fp) {
            fwrite($fp, $data);
            fclose($fp);
        } else {
            fclose($fp);
            return false;
        }
    } else {
        return false;
    }

    return true;
}

copyRemoteFile("http://98.101.223.10:8077/-wvhttp-01-/GetOneShot?image_size=640x480&REQUEST_ID=1177767237989",  "/var/www/vhosts/saltydog.com/httpdocs/src/".$image.".jpg");
?>