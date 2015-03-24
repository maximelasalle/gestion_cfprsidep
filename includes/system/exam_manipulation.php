<?php
include_once 'psl-config.php';
include_once 'functions.php';

function add_exam_to_cours($user_id, $mysqli, $cours_id, $version_id, $type_id, $date_time, $description, $add_user_to_exam)
{
	$transaction_code = 170;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_13, field_10, field_12, field_3, field_7, field_11) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiiiissi', $user_id, $transaction_code, $cours_id, $version_id, $type_id, $date_time, $description, $add_user_to_exam);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_exam_to_member($user_id, $mysqli, $add_user_id, $exam_id)
{
	$transaction_code = 180;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_11, field_13) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $add_user_id, $exam_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function update_evaluation($user_id, $mysqli, $upd_success, $upd_comment, $members_evaluation)
{
	$transaction_code = 360;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_14, field_7, field_10) VALUES (?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiisi', $user_id, $transaction_code, $upd_success, $upd_comment, $members_evaluation);
		
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