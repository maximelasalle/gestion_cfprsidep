<?php 
 $db_connect = $_SERVER["DOCUMENT_ROOT"];
 $db_connect .= "/includes/db_connect.php";
 $functions = $_SERVER["DOCUMENT_ROOT"];
 $functions .= "/includes/functions.php";

include_once "$db_connect";
include_once "$functions";
 
sec_session_start();

if (login_check($mysqli) == true) {

$result = $mysqli->query("SELECT start_date, end_date, filename FROM horaire, members_horaire WHERE horaire.id = members_horaire.horaire_id AND members_horaire.member_id");

while($row = $result->fetch_array())
	{
	echo "<li><a href=JavaScript:newPopup('popups/horaire.php')> Horaire " . $row['end_date'] . "</a></li>";
	} 
	}
	else 
	{
	}

?>
