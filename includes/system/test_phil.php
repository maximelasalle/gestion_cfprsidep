<?php

include_once 'db_connect.php';
include_once 'functions.php';
include_once 'member_manipulation.php';
include_once 'notice_manipulation.php';
include_once 'cours_manipulation.php';
include_once 'exam_manipulation.php';
include_once 'group_manipulation.php';
include_once 'horaire_manipulation.php';
include_once 'remise_manipulation.php';


sec_session_start();

echo "  tostitos  ";

if (login_check($mysqli) == true) 
{
	echo "  login ok";

	echo " login ok";
	
	if(delete_notice($_SESSION['user_id'], $mysqli, 13, 9))
	{
		echo "ca marche";
	}

}
else
{
	echo "  pas login  ";
}
//if(add_user_to_cour($_SESSION['user_id'], $mysqli, 13, 3))
	//if(remove_user_from_group($_SESSION['user_id'], $mysqli, 15, 3))
?>