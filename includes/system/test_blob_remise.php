<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

?>
<script type="text/JavaScript" src="../../js/std_lanterne.js"></script> 

<form id="fileDialogForm" method="post" action="process_remise.php" enctype="multipart/form-data" onsubmit="return checkSize(10485760)"> <!-- max_size set to 10 mb in dev0
.	<!-- MAX_FILE_SIZE must precede the file input field -->
	<input type="hidden" name="MAX_FILE_SIZE" value="10485760"> <!-- this is only used by the server --> 
	 <!-- Name of input element determines name in $_FILES array -->
	<input name="userfile" type="file" id="userfile"> 
	<input name="upload" type="submit" class="box" id="upload" value=" Upload " >
</form>

