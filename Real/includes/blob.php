<?php
include_once 'psl-config.php';
include_once 'functions.php';

function get_horaire($user_id, $mysqli)
{
	if(!login_check($mysqli))
	{
		return false;
	}

	if ($stmt = $mysqli->prepare(" SELECT filename,start_date,end_date,horaire_blob 
				FROM horaire,members_horaire 	
			   WHERE horaire.id = members_horaire.horaire_id
			     AND members_horaire.member_id = ?
			   LIMIT 1"))
	{
		$stmt->bind_param('i', $user_id); 
		
		$stmt->execute();    // Execute the prepared query.
		$stmt->store_result();
		$stmt->bind_result($file_name,$start_date,$end_date,$horraire_blob);

		$stmt->fetch();
		
		if ($stmt->num_rows == 1) 
		{
			$_SESSION['file_name'] = $file_name;
			$_SESSION['horaire_blob'] = $horraire_blob;
			
			return true;	
		}
	}
	return false;
}