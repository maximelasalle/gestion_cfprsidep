<html>
<head>
	<!-- google webfont --> 
	<link href='http://fonts.googleapis.com/css?family=Noticia+Text:200,400,700' rel='stylesheet' type='text/css'>
	
	<!-- Stylesheet -->
	<?php
	$horaire = $_SERVER["DOCUMENT_ROOT"];
	$horaire .= "/css/horaire.css";
	$blobpath = $_SERVER["DOCUMENT_ROOT"];
	$blobpath .= "/includes/blob.php";
	
	?>
	
	<link rel="stylesheet"type="text/css"href="css/<?php echo $horaire?>"/>
</head>


<body id="popup_body">
<?php
 $db_connect = $_SERVER["DOCUMENT_ROOT"];
 $db_connect .= "/includes/db_connect.php";
 $functions = $_SERVER["DOCUMENT_ROOT"];
 $functions .= "/includes/functions.php";
 $blobpath = $_SERVER["DOCUMENT_ROOT"];
 $blobpath .= "/includes/blob.php";

include_once "$db_connect";
include_once "$functions";
include_once "$blobpath";

sec_session_start(); 

include_once $blobpath;

if(get_horaire($_SESSION['user_id'],$mysqli) == true)
	{
		
		$blob = $_SESSION['horaire_blob'];

		header("Content-Type: application/pdf");
		
		echo '<embed src="' . $blob . '" width="1150" height="750">';
	}
	else
	{
	}
?>

</body>