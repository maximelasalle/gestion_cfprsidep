<body>
<?php
 $header = $_SERVER["DOCUMENT_ROOT"];
 $header .= "/builder/general/header.php";
 $footer = $_SERVER["DOCUMENT_ROOT"];
 $footer .= "/builder/general/footer.php";
 $menu = $_SERVER["DOCUMENT_ROOT"];
 $menu .= "/builder/accueil/superUser/menu.php";
 $contenu = $_SERVER["DOCUMENT_ROOT"];
 $contenu .= "/builder/accueil/superUser/contenu.php";
?>

<?php include_once($header); ?>
<?php include_once($footer); ?>
<?php include_once($menu); ?>
<?php include_once($contenu); ?>


</body>