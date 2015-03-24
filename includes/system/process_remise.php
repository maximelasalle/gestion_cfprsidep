<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'remise_manipulation.php';

sec_session_start();

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	
	if (login_check($mysqli)) 
	{	
		if (add_remise($_SESSION['user_id'], $mysqli, $_SESSION['user_id'], "", $fileName, $fileType, $tmpName)) 
		{
			header('Location: http://gestion.cfprsidep.ca/includes/system/test_blob_remise.php');
		} 
		else 
		{
			header('Location: http://gestion.cfprsidep.ca/includes/system/test_blob_remise.php?error=1');
		}
    }
}
?>