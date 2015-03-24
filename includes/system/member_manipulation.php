<?php
include_once 'psl-config.php';
include_once 'functions.php';

function make_password(&$password,&$salt)
{
	// hash the clear text password to 128 char
	$password = hash('sha512', $password);

	if (strlen($password) != 128) 
	{
		return FALSE;
	}
	else
	{
		// make a random salt
		$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		// hash with random salt
		$password = hash('sha512', $password . $salt);
		
		return TRUE;
	}
}

function change_password($user_id, $mysqli, $newpassword) 
{	
	$transaction_code = 50;
	$password = $newpassword;
	$newpassword = "";
	$salt = "";
	
	if (!make_password($password,$salt)) 
	{
		return FALSE;
	}
	else
	{
		if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_4, field_5, field_14) VALUES (?, ?, ?, ?, ?)")) 
		{
            $insert_stmt->bind_param('iissi', $user_id, $transaction_code, $password, $salt, $user_id);
			echo " bond ok ";
            // Execute the prepared query.
            if (!$insert_stmt->execute()) 
			{
				return FALSE;
            }
        }
		return TRUE;
	}
}

function update_user($updater_user_id, $mysqli, $newactive, $newname, $newsurname, $updated_user_id) 
{	
	$transaction_code = 30;
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_9, field_7, field_6, field_14) VALUES (?, ?, ?, ?, ?, ?)")) 
	{
		$insert_stmt->bind_param('iiissi', $updater_user_id, $transaction_code, $newactive, $newname, $newsurname ,$updated_user_id);
		
		// Execute the prepared query.
		if (! $insert_stmt->execute()) 
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function create_user($user_id, $mysqli, $newprogram_id, $newname, $newsurname, $newrole_id, $newactive, $newpassword)
{
	$transaction_code = 60;
	$password = $newpassword;
	$newpassword = "";
	$salt = "";
	
	if (!make_password($password,$salt)) 
	{
		return FALSE;
	}
	else
	{
		if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_1, field_2, field_10, field_9, field_4, field_5, field_11) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)")) 
		{
			$insert_stmt->bind_param('iissiissi', $user_id, $transaction_code, $newname, $newsurname, $newrole_id, $newprogram_id, $password, $salt, $newactive);
			
			// Execute the prepared query.
			if (!$insert_stmt->execute()) 
			{		
				return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}
}

function delete_user($deleter_user_id, $mysqli, $deleted_user_id) 
{	
	$transaction_code = 40;
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10) VALUES (?, ?, ?)")) 
	{
		$insert_stmt->bind_param('iii', $deleter_user_id, $transaction_code, $deleted_user_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_user_to_cour($user_id, $mysqli, $added_user_id, $cour_id)
{
	$transaction_code = 320;

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

function add_user_to_group($user_id, $mysqli, $added_user_id, $group_id)
{
	$transaction_code = 150;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_10, field_11) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $added_user_id, $group_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function add_user_to_horaire($user_id, $mysqli, $added_user_id, $horaire_id)
{
	$transaction_code = 100;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_8, field_9) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $added_user_id, $horaire_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function remove_user_from_horaire($user_id, $mysqli, $remove_user_id, $remove_horaire_id)
{
	$transaction_code = 110;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_8, field_9) VALUES (?, ?, ?, ?)")) 
	{ 

		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $remove_user_id, $remove_horaire_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
		
	}
	return FALSE;
	
}

function remove_user_from_cours($user_id, $mysqli, $remove_user_id, $remove_cours_id)
{
	$transaction_code = 130;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_8, field_9) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $remove_user_id, $remove_cours_id);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		return TRUE;
	}
	return FALSE;
}

function remove_user_from_group($user_id, $mysqli, $remove_user_id, $remove_group_id)
{
	$transaction_code = 160;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code, field_12, field_14) VALUES (?, ?, ?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('iiii', $user_id, $transaction_code, $remove_user_id, $remove_group_id);
		
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

