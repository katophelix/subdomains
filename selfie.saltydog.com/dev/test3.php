<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('src/class.phpmailer.php');
//$url = "http://98.101.223.10:8080/2/webcam.jpg";
$name2 = "A Salty Dog Friend";$email2 = "rob@saltydog.com";$message = "No Message";
if(isset($_POST['fname'])){
	$fname2 = $_POST['fname'];
}
if(isset($_POST['lname'])){
	$lname2 = $_POST['lname'];
}
if(isset($_POST['email'])){
	$email2 = urldecode($_POST['email']);
}
$em = 'rob@saltydog.com';
$bob = '8433846463@mms.att.net';
$rob = '8432903443@mms.att.net';
$message = '
Salty Dog Photo Contest
-------------------------------
Name: '.$fname2.' '.$lname2.'
Subscribe: '.$_POST['my-checkbox'].'
Email: '.$email2.'
Image: '.$_POST['image'].'
--------------------------------';
$sent = 'yes';
$email = new PHPMailer();
$email->From      = $email2;
$email->FromName  = $fname2.' '.$lname2;
$email->Subject   = 'Salty Dog Photo Contest';
$email->Body      = $message;
//$email->AddBCC($bob);
//$email->AddBCC($rob);
$email->AddAddress( $em );

$file_to_attach = 'src/'.$_POST['image'].'.jpg';

$email->AddAttachment( $file_to_attach , 'photo-contest.jpg' );

return $email->Send();
?>