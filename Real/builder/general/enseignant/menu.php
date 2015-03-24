<div id="userTag">

<?php 
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<p id="userName"><?php echo $_SESSION['name'] . " " . $_SESSION['surname'];?></p>
<p id="userRole">Enseignant</p>



<a id="userLogout" href="includes/logout.php">Déconnexion</a>
</div>



<ul class="menu">
<li><a href="#" id="boutonAccueil"><div id="fakeBorder2"></div>
<div id="fakeBorder3"></div>Accueil</a></li>
<li><a href="#">Notes</a>
<ul>
<?php

 $groupesSelect = $_SERVER["DOCUMENT_ROOT"];
 $groupesSelect .= "/includes/groupes_select.php";
 
 include_once("$groupesSelect"); 
 
?>
	</ul>
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
        <li>
          <a href="#">Gérer</a>
          <ul>
            <li>
              <a href="#">Ajouter des examens</a>
            </li>
            <li>
              <a href="#">Notifier des élèves</a>
            </li>
          </ul>
        </li>
		</ul>
		
<div id="fakeBorder1"></div>