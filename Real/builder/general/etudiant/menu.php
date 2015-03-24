<div id="userTag">

<?php 
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<p id="userName"><?php echo $_SESSION['name'] . " " . $_SESSION['surname'];?></p>
<p id="userRole"><?php echo "Étudiant " . $_SESSION['group_name']?></p>


<a id="userLogout" href="includes/logout.php">Déconnexion</a>
</div>

<div id="fakeBorder2"></div>
<div id="fakeBorder3"></div>

      <ul class="menu">
        <li>
          <a id="boutonAccueil" href="#">Accueil</a>
        </li>
        <li>
          <a href="#">Notes</a>
        </li>
		<li>
          <a href="#">Horaires</a>
          <ul>
			<?php

			 $horaireSelect = $_SERVER["DOCUMENT_ROOT"];
			 $horaireSelect .= "/includes/horaire_select.php";
			 
			 include_once("$horaireSelect"); 
			 
			?>
          </ul>
        </li>
      </ul>

		
<div id="fakeBorder1"></div>
	 
<div id="fakeBorder1"></div>
    </div>