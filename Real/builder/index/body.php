<body>
<?php
 $header = $_SERVER["DOCUMENT_ROOT"];
 $header .= "/builder/general/header.php";
 $footer = $_SERVER["DOCUMENT_ROOT"];
 $footer .= "/builder/general/footer.php";
 $contenu = $_SERVER["DOCUMENT_ROOT"];
 $contenu .= "/builder/index/contenu.php";
?>

<?php include_once($header); ?>
<?php include_once($footer); ?>
<?php include_once($contenu); ?>

</body>