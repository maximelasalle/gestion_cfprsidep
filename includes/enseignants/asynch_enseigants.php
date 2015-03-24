<?php
include_once "../system/functions.php";
include_once "../system/db_connect.php";
include_once "../system/remise_manipulation.php";

$code = intval($_GET['code']);

if($code == 1)
{
	$id =  intval($_GET['id']);
	$return_arr = array();
	
	if($result = $mysqli->query("SELECT cours.description coursdesc,cours.id coursid FROM cours, members_cours, members WHERE cours.id = members_cours.cours_id AND members.id = members_cours.member_id AND members.id = $id" ))
	{	
		while($row = $result->fetch_array())
		{	
			$row_array['coursdesc'] = $row['coursdesc'];
			$row_array['coursid'] = $row['coursid'];
		
			array_push($return_arr,$row_array);
		}
	}
	echo json_encode($return_arr);	
}

if($code == 2) 
{
	$id =  intval($_GET['id']);
	$return_arr = array();
	
	if($result = $mysqli->query("SELECT cours_exam.description examdesc,cours_exam.id examid FROM cours, cours_exam WHERE cours.id = cours_exam.cours_id AND cours.id = $id" ))
	{	
		while($row = $result->fetch_array())
		{	
			$row_array['examdesc'] = $row['examdesc'];
			$row_array['examid'] = $row['examid'];
		
			array_push($return_arr,$row_array);
		}
	}
	echo json_encode($return_arr);	
}

if($code == 4) 
{
	$id =  intval($_GET['id']);
	$return_arr = array();
	
	if($result = $mysqli->query("SELECT DISTINCT groupe.name groupname, groupe.id groupeid FROM remise, members, groupe, members_group, cours 
	                              WHERE members.id = members_group.member_id AND groupe.id = members_group.group_id AND remise.member_orig_id = members.id 
								  AND remise.deleted = 0 AND remise.cours_id = cours.id AND remise.member_dest_id = $id"))
	{	
		while($row = $result->fetch_array())
		{	
			$row_array['groupname'] = $row['groupname'];
			$row_array['groupeid'] = $row['groupeid'];
		
			array_push($return_arr,$row_array);
		}
	}
	echo json_encode($return_arr);	
}

if($code == 3)
{
	$id =  intval($_GET['id']);

	$userId = intval($_GET['userid']);
	
	if(set_remise_to_deleted($userId, $mysqli, $id, 1))
	{
		echo "1";
	}
	else
	{
		echo "0";
	}		
}

$mysqli->close();
?>

