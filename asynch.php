<?php
include_once "../system/functions.php";
include_once "../system/db_connect.php";
include_once "../system/remise_manipulation.php";

$code = intval($_GET['code']);

if($code == 1)
{
	$id =  intval($_GET['id']);
	$return_arr = array();
	
	if($result = $mysqli->query("SELECT name chauffeurname,surname chauffeursurname,id chauffeurid FROM members WHERE role_id = 4 order by surname" ))
	{	
		while($row = $result->fetch_array())
		{	
			echo "test";
			$row_array['chauffeurname'] = $row['chauffeurname']." ".$row['chauffeursurname'];
			$row_array['chauffeurid'] = $row['chauffeurid'];
		
			array_push($return_arr,$row_array);
		}
	}
	echo json_encode($return_arr);	
}

$mysqli->close();
?>