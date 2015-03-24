<?php
include_once 'psl-config.php';
include_once 'functions.php';

function add_groupe($user_id, $mysqli, $name, $start_date, $end_date)
{
	$transaction_code = 70;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_1, field_2, field_3) VALUES (?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iisss', $user_id, $transaction_code, $name, $start_date, $end_date);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
}

function delete_groupe($user_id, $mysqli, $groupe_id)
{
	$transaction_code = 80;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10) VALUES (?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $groupe_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_horaire_to_groupe($user_id, $mysqli, $groupe_id, $horaire_id)
{
	$transaction_code = 190;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10, field_13) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $groupe_id, $horaire_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_groupe_to_cour($user_id, $mysqli, $added_user_id, $cour_id)
{
	$transaction_code = 120;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_8, field_9) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $added_user_id, $cour_id);
		
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