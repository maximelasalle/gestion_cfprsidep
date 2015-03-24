<body>
   <?php
//CONNECTION

$db_connect = $_SERVER["DOCUMENT_ROOT"];
$db_connect .= "/includes/system/db_connect.php";
$functions = $_SERVER["DOCUMENT_ROOT"];
$functions .= "/includes/system/functions.php";
$login = $_SERVER["DOCUMENT_ROOT"];
$login .= "/includes/general/login.php";


//SYSTÈME

$head = $_SERVER["DOCUMENT_ROOT"];
$head .= "/includes/general/head.php";
$cssReset = $_SERVER["DOCUMENT_ROOT"];
$cssReset .= "/includes/general/cssReset.php";

//ANIMATIONS


$menuOutAnimation = $_SERVER["DOCUMENT_ROOT"];
$menuOutAnimation .= "/includes/animations/menuOutAnimation.php";
$menuOutAnimationInnactive = $_SERVER["DOCUMENT_ROOT"];
$menuOutAnimationInnactive .= "/includes/animations/menuOutAnimationInnactive.php";
$pageInAnimation = $_SERVER["DOCUMENT_ROOT"];
$pageInAnimation .= "/includes/animations/pageInAnimation.php";
$pageInAnimationDisabled = $_SERVER["DOCUMENT_ROOT"];
$pageInAnimationDisabled .= "/includes/animations/pageInAnimationDisabled.php";

//PAGE PARTS

$header = $_SERVER["DOCUMENT_ROOT"];
$header .= "/includes/general/header.php";
$menuEleveDisabled = $_SERVER["DOCUMENT_ROOT"];
$menuEleveDisabled .= "/includes/eleves/menuEleveDisabled.php";
$notesProfBody = $_SERVER["DOCUMENT_ROOT"];
$notesProfBody .= "/includes/enseignants/notesProfBody.php";


include_once "$db_connect";
include_once "$functions";

sec_session_start();

include_once "$head";
include_once "$header";
include_once "$cssReset";

if (login_check($mysqli) == true) {
				
				
				//Etudiant
				
				if ($_SESSION["role_id"] == 3 || $_SESSION["role_id"] == 2) {
								
								include_once "$menuEleveDisabled";
								
								//Animation d'entrée
								if (($_SESSION['menuout_anim_active']) == false) {
												include_once "$menuOutAnimation";
												$_SESSION['menuout_anim_active'] = true;
								} else {
												include_once "$menuOutAnimationInnactive";
								}
								
								include_once "$notesProfBody";
								
				} else {
								
								header('Location: index.php');
								
				}
				
} else {
				header('Location: index.php');
}
?>	
</body>