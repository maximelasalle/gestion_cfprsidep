<?php
if (!isset($_GET['p'])) 
{
	return;
}

include_once 'db_connect.php';
include_once 'functions.php';
include_once 'remise_manipulation.php';

sec_session_start();

$id = $_GET['p'];	
$name =	$_GET['name'];											
$surname = $_GET['surname'];

if (retrieve_remise($_SESSION['user_id'], $mysqli, $id, $filename, $filetype, $content))
{
	$size = strlen($content);
	$finalFileName = $name."_".$surname."_".date('d_m_Y')."_".$filename;
	
	header("Content-length: $size");
	header("Content-type: $filetype");
	header("Content-Disposition: attachment; filename=$finalFileName");
	
	mark_remise_read($_SESSION['user_id'], $mysqli, $id);
	
	echo $content;
}
