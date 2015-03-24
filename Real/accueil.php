<?php
 $db_connect = $_SERVER["DOCUMENT_ROOT"];
 $db_connect .= "/includes/db_connect.php";
 $functions = $_SERVER["DOCUMENT_ROOT"];
 $functions .= "/includes/functions.php";

include_once "$db_connect";
include_once "$functions";
include_once "includes/email.php";

sec_session_start(); 
 
if (login_check($mysqli) == true) {

//SuperUser
if ($_SESSION["role_id"] == 1){

 $head = $_SERVER["DOCUMENT_ROOT"];
 $head .= "/builder/accueil/superUser/head.php";
 $body = $_SERVER["DOCUMENT_ROOT"];
 $body .= "/builder/accueil/superUser/body.php";

 include_once($head);
 include_once($body);

}
//Professeur
elseif ($_SESSION["role_id"] == 2){

 $head = $_SERVER["DOCUMENT_ROOT"];
 $head .= "/builder/accueil/enseignant/head.php";
 $body = $_SERVER["DOCUMENT_ROOT"];
 $body .= "/builder/accueil/enseignant/body.php";

 include_once($head);
 include_once($body);

}
//Etudiant
elseif ($_SESSION["role_id"] == 3){
$head = $_SERVER["DOCUMENT_ROOT"];
 $head .= "/builder/accueil/etudiant/head.php";
 $body = $_SERVER["DOCUMENT_ROOT"];
 $body .= "/builder/accueil/etudiant/body.php";

 include_once($head);
 include_once($body);
 
}
else
{

//Faire un envoi auto de message à l'admin
echo "Vous n'avez aucun rôle d'assigné, veuillez contacter votre administrateur.";

}

}else{

header("Location: index.php");

}

?>