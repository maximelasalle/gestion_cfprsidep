<?php 
 $db_connect = $_SERVER["DOCUMENT_ROOT"];
 $db_connect .= "/includes/db_connect.php";
 $functions = $_SERVER["DOCUMENT_ROOT"];
 $functions .= "/includes/functions.php";

include_once "$db_connect";
include_once "$functions";
 
sec_session_start();

if (login_check($mysqli) == true) {
if($_SESSION["role_id"] == 2){

$result = $mysqli->query("SELECT id, name FROM groupe WHERE name <> 'prof'");

while($row = $result->fetch_array())
	{
	echo "<li><a href='notes.php?groupe=" . $row['name'] . "'>" . $row['name'] . "</a></li>";
	} 
	}
	else 
	{
	header("Location: index.php");
	}
	}
	else
	{
	header("Location: index.php");
	}

?>
