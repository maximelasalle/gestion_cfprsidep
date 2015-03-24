<?php

include_once 'db_connect.php';
include_once 'functions.php';
include_once 'member_manipulation.php';/*

sec_session_start();
*/
echo "  testos2  ";
?>
<form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</form>

<?php


/*
if (login_check($mysqli) == true) 
{
	echo "  login ok";
/*
	echo "login ok";
	if(add_user_to_cour($_SESSION['user_id'], $mysqli, 13, 2))
	{
		echo "ca marche";
	}

}
else
{
	echo "  pas login  ";
}*/
?>