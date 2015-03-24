<?php

$pass = "Password01";

echo $pass;
echo "</br>";

if(make_password($pass,$salt))
{
		echo strlen($pass);
		echo "</br>";
		echo $pass;
		echo "</br>";
		echo strlen($salt);
		echo "</br>";
		echo $salt;
}		
	


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

?>