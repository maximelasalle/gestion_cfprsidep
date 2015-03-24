<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/member_manipulation.php';

echo "try";
sec_session_start(); 
echo "try";

if (login_check($mysqli) == true) 
{
	echo "try3";
	//if(create_user($_SESSION['user_id'],$mysqli,1,"George","Brassins",3,1,"33333333") == true)
	//if (change_password($_SESSION['user_id'],$mysqli,"44444444") == true)
	//if(delete_user($_SESSION['user_id'],$mysqli,19) == true)
	if(add_user_to_cour($_SESSION['user_id'],$mysqli,10,3)
	{
		echo "ok---";
	}
	else
	{
		echo "pas ok";
	}
} 
else 
{
    echo "fu";
}	
	
//	if (change_password($_SESSION['user_id'],$mysqli,"22222222") == true)

/*
if (login_check($mysqli) == true) {
	echo "try3";
	if(get_horaire($_SESSION['user_id'],$mysqli) == true)
	{
		$blob = $_SESSION['horaire_blob'];
		
		header("Content-Type: application/pdf");
		echo 'embed src = "' . $blob . '"';
		echo "OK";
	}
	else
	{
		echo "pas ok";
	}
} else {
    echo "fu";
}
*/
?>