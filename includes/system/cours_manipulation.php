<?php
include_once 'psl-config.php';
include_once 'functions.php';

function add_cours($user_id, $mysqli, $formation_id, $description, $start_date, $end_date)
{
	$transaction_code = 90;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_13, field_7, field_3, field_5) VALUES (?, ?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiisss', $user_id, $transaction_code, $formation_id, $description, $start_date, $end_date);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function delete_cours($user_id, $mysqli, $delete_cours_id)
{
	$transaction_code = 140;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10) VALUES (?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $delete_cours_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_formation($user_id, $mysqli, $program_id, $code, $name)
{
	$transaction_code = 240;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_13, field_10, field_2) VALUES (?, ?, ?, ?, ?)")) 
	{ 
	
		$insert_stmt->bind_param('iiiis', $user_id, $transaction_code, $program_id, $code, $name);
	
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function delete_formation($user_id, $mysqli, $formation_id)
{
	$transaction_code = 250;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_13) VALUES (?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $formation_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function update_formation($user_id, $mysqli, $program_id, $code, $name, $formation_id)
{
	$transaction_code = 260;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_9, field_13, field_6, field_14) VALUES (?, ?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiiisi', $user_id, $transaction_code, $program_id, $code, $name, $formation_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function delete_formation_exam($user_id, $mysqli, $formation_id)
{
	$transaction_code = 340;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10) VALUES (?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $formation_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
}

function add_formation_exam($user_id, $mysqli, $formation_id, $version_id, $type_id, $description)
{
	$transaction_code = 330;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_9, field_10, field_11, field_7) VALUES (?, ?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiiiis', $user_id, $transaction_code, $formation_id, $version_id, $type_id, $description);
		
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