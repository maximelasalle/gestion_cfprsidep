<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
$index_path = $_SERVER["DOCUMENT_ROOT"];
$index_path .= "index.php"; 
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
	$password = $_POST['p']; // The hashed password.
	
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: http://gestion.cfprsidep.ca');
    } else {
        // Login failed 
		header('Location: http://gestion.cfprsidep.ca?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}