<?php
include_once 'member_manipulation.php';

sec_session_start();

echo "test";

if (login_check($mysqli) == true) 
{
	echo "login ok";
	if(add_user_to_cour($_SESSION['user_id'], $mysqli, 13, 2))
	{
		echo "ca marche";
	}
}
?>