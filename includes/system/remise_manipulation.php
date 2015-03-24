<?php
include_once 'psl-config.php';
include_once 'functions.php';


function add_remise($user_id, $mysqli, $member_dest_id, $message, $filename, $filetype, $path)
{   
	$transaction_code = 1010;
	
	$blob = file_get_contents($path);

	if(!$blob )
	{
		return FALSE;
	}
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_b (blob_2, member_id, transaction_code, field_2, field_4, field_1, field_3) VALUES (?, ?, ?, ?, ?, ?, ?)")) 
	{ 
		$null = NULL;
		$insert_stmt->bind_param('biiisss',  $null, $user_id, $transaction_code, $member_dest_id, $message, $filename, $filetype);
		
	
		if(!$insert_stmt->send_long_data(0, $blob))
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

function delete_remise($user_id, $mysqli, $file_id)
{
	$transaction_code = 290;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_14) VALUES (?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $file_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
}

function retrieve_remise($user_id, $mysqli, $blob_id, &$filename, &$filetype, &$content)
{
    if ($stmt = $mysqli->prepare(" SELECT filename, filetype, file_blob FROM remise WHERE id = ? LIMIT 1")) 
	{
        $stmt->bind_param('i', $blob_id);  // Bind "$id" to parameter.
        if(!$stmt->execute())    // Execute the prepared query.
		{
			return FALSE;
		}
		
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($filename, $filetype, $content);
        $stmt->fetch();		
		
		return TRUE;
	}
	return FALSE;
}

function mark_remise_read($user_id, $mysqli, $remise_id)
{
	$transaction_code = 300;
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_8) VALUES (?, ?, ?)")) 
	{ 
		$insert_stmt->bind_param('iii', $user_id, $transaction_code, $remise_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;	
}


function set_remise_to_deleted($user_id, $mysqli, $file_id, $deleted_file)
{
	$transaction_code = 310;
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_9, field_10) VALUES (?, ?, ?, ?)")) 
	{ 
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $file_id, $deleted_file);
		
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