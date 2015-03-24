<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'member_manipulation.php';
include_once 'horaire_manipulation.php';

sec_session_start();

echo "debut";

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	
	echo $fileName;
	
	echo "testos 1";
	
	if (login_check($mysqli) == true) 
	{	
		if (add_horaire($_SESSION['user_id'], $mysqli, $fileName, "", "", $tmpName)) 
		{
			echo "ca marche";
			header('Location: http://gestion.cfprsidep.ca/includes/system/test_blob.php');
		} 
		else 
		{
			header('Location: http://gestion.cfprsidep.ca/includes/system/test_blob.php?error=1');
		}
    }
}
?>