<div id="userTag">

<?php 
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<p id="userName"><?php echo $_SESSION['username'];?></p>
<p id="userRole">Super User</p>



<a id="userLogout" href="includes/logout.php">Déconnexion</a>
</div>


<ul class="menu">
<li><a href="#" id="boutonAccueil">Accueil</a>
<ul>
<li><a href="#">Submenu 1a</a></li>
<li><a href="#">Submenu 1b</a></li>
</ul>
</li>
<li><a href="#">Category 2</a>
<ul>
<li><a href="#">Submenu 2a</a></li>
<li><a href="#">Submenu 2b</a></li>
</ul>
</li>
<li><a href="#">Category 3</a>
<ul>
