<?php
include_once 'psl-config.php';
include_once 'functions.php';


function add_horaire($user_id, $mysqli, $filename, $start_date, $end_date, $path)
{   
	$transaction_code = 1000;
	
	$horaire_blob = file_get_contents($path);

	if(!$horaire_blob)
	{
		return FALSE;
	}
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_b (blob_1, member_id, transaction_code, field_1) VALUES (?, ?, ?, ?)")) 
	{ 
		$null = NULL;
		$insert_stmt->bind_param('biis',  $null, $user_id, $transaction_code, $filename);
		
		if(!$insert_stmt->send_long_data(0, $horaire_blob))
		{
			return FALSE;
		}
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}

		if(!clean_intercessor_b($user_id, $mysqli))
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function delete_horaire($user_id, $mysqli, $horaire_id)
{
	$transaction_code = 220;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_11) VALUES (?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $horaire_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
}


?>