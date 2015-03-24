<?php
include_once 'psl-config.php';
include_once 'functions.php';

function add_notice($user_id, $mysqli, $user_orig_id, $notice_date, $title, $notice_text)
{
	$transaction_code = 270;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_13, field_3, field_1, field_7) VALUES (?, ?, ?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiisss', $user_id, $transaction_code, $user_orig_id, $notice_date, $title, $notice_text);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_notice_to_group($user_id, $mysqli, $group_id, $user_orig_id, $notice_date, $title, $notice_text, $insert_to_user)
{
	$transaction_code = 200;
	
	if($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_11, field_9, field_1, field_3, field_7, field_12) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"))
	{
		
		$insert_stmt->bind_param('iiiisssi',$user_id, $transaction_code, $group_id, $user_orig_id, $notice_date, $title, $notice_text, $insert_to_user);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute()) 
		{
			
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
	
}

function add_notice_to_member($user_id, $mysqli, $add_user_id, $notice_id)
{
	$transaction_code = 210;
	
	if($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10, field_12) VALUES (?, ?, ?, ?)"))
	{
		
		$insert_stmt->bind_param('iiii',$user_id, $transaction_code, $add_user_id, $notice_id);
		
		
		// Execute the prepared query.
		if (!$insert_stmt->execute()) 
		{
			
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
	
}

function delete_notice($user_id, $mysqli, $notice_id, $user_orig_id)
{
	$transaction_code = 230;
	
	if($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_12, field_13) VALUES (?, ?, ?, ?)"))
	{
		
		$insert_stmt->bind_param('iiii',$user_id, $transaction_code, $notice_id, $user_orig_id);
		
		
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