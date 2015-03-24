
<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {

	header('Location: /accueil.php'); 
	
} else {

 $head = $_SERVER["DOCUMENT_ROOT"];
 $head .= "/builder/index/head.php";
 $body = $_SERVER["DOCUMENT_ROOT"];
 $body .= "/builder/index/body.php";
 
 include_once($head);
 include_once($body);
	
}
?>

