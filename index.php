<body id="wtf">
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

//ANIMATIONS

$loginAnimation = $_SERVER["DOCUMENT_ROOT"];
$loginAnimation .= "/includes/animations/loginAnimation.php";
$loginAnimationInnactive = $_SERVER["DOCUMENT_ROOT"];
$loginAnimationInnactive .= "/includes/animations/loginAnimationInnactive.php";
$menuInAnimation = $_SERVER["DOCUMENT_ROOT"];
$menuInAnimation .= "/includes/animations/menuInAnimation.php";
$menuInAnimationInnactive = $_SERVER["DOCUMENT_ROOT"];
$menuInAnimationInnactive .= "/includes/animations/menuInAnimationInnactive.php";
$loginDisabled = $_SERVER["DOCUMENT_ROOT"];
$loginDisabled .= "/includes/general/loginDisabled.php";

//PAGE PARTS

$header = $_SERVER["DOCUMENT_ROOT"];
$header .= "/includes/general/header.php";
$menuEleve = $_SERVER["DOCUMENT_ROOT"];
$menuEleve .= "/includes/eleves/menuEleve.php";

//LINKS

$notesEnseignants = $_SERVER["DOCUMENT_ROOT"];
$notesEnseignants .= "notesEnseignants.php";


include_once "$db_connect";
include_once "$functions";

include_once "$head";
include_once "$header";

sec_session_start();




if (login_check($mysqli) == true) {
				
				//Permet d'exécuter le loading qu'une seule fois
				if (!isset($_SESSION['loading'])) {
					 echo '<script type="text/javascript">setTimeout(function(){$(".loader").fadeOut("slow");}, 2000);</script>';
					 echo '<style>.loader { position: absolute; left: 45%; top: 65%; width: 10%; height: 20%; z-index: 9999; background: url("images/page-loader.GIF") 50% 50% no-repeat; visibility: visible; } </style>';
					 $_SESSION['loading'] = true;
				}
				
				//Reset l'animation du menu qui sort lorsque le menu est loadé pour qu'uil puisse la réexécuter lors du prochain changement de page
				$_SESSION['menuout_anim_active'] = false;
				
				//Animation du login
				if (($_SESSION['login_anim_active']) == false) {
								include_once "$loginAnimation";
								$_SESSION['login_anim_active'] = true;
								
				} elseif (!isset($_SESSION['login_anim_active'])) {
								include_once "$loginAnimation";
								$_SESSION['login_anim_active'] = true;
								
				} else {
								include_once "$loginAnimationInnactive";
				}
				
				//SuperUser	
				if ($_SESSION["role_id"] == 1) {
								//Connexion
								include_once "$loginDisabled";
								//Menu
								include_once "$menuSuperUser";
								
				}
				
				//Administrateur
				elseif ($_SESSION["role_id"] == 2) {
								//Connexion
								include_once "$loginDisabled";
								//Menu
								include_once "$menuAdministrateur";
								
				}
				
				//Enseignant
								elseif ($_SESSION["role_id"] == 3) {
								
								//Connexion
								include_once "$loginDisabled";
								//Menu
								include_once "$menuEnseignant";
				}
				
				//Etudiant
								elseif ($_SESSION["role_id"] == 4) {
									
								
									
								//Connexion
								include_once "$loginDisabled";
								
								//Menu
								include_once "$menuEleve";
								
								//Animation du menu
								
								if (($_SESSION['menu_anim_active']) == false) {
												include_once "$menuInAnimation";
												$_SESSION['menu_anim_active'] = true;
								
								} elseif (!isset($_SESSION['menu_anim_active'])) {
												include_once "$menuInAnimation";
												$_SESSION['menu_anim_active'] = true;
												
								} else {
												include_once "$menuInAnimationInnactive";
								}

				}
				
				
				
}

else {
				
				include "$login";
				
}

?>
</body>