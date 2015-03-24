<div id="corps">

	<div class="fadein"> <!--Background-->
		<img src="images/connexion/backgrounds/1.jpg">
		<img src="images/connexion/backgrounds/2.jpg">
		<img src="images/connexion/backgrounds/3.jpg">
		<img src="images/connexion/backgrounds/4.jpg">
	</div>
	
	<div id="boiteConnexion">
	<div id ="dialogConnexion">
	
	  <?php
        if (isset($_GET['error'])) {
            echo '<p id="loginError">Échec de la tentative de connexion!</p>';
        }
        ?> 
		
		
        <form action="includes/process_login.php" method="post" name="login_form">
		
            <div id="emailConnexion">
				<p>Adresse de courriel</p>
				</br>
				<input 
				style="	position:absolute; top: 6.6%; left: 12.5%; height: 6%; width: 75%; text-align: center;"
				type="text" 
				name="email" /></div>
				
            <div id="passwordConnexion">
				<p>Mot de passe</p>
				</br>
				<input
				style="	position:absolute; top: 26%; left: 12.5%; height: 6%; width: 75%; text-align: center;"
				type="password"
				name="password"
				id="password"/></div>
			
            <div id="boutonConnexion">
				<input
				style="border: none; outline: none;"
				type="image"
				src="images/connexion/iconeConnexion.png"
				onclick="formhash(this.form, this.form.password);" /></div>
				
        </form>
		
	</div>
	</div>
	
	
		
	</div>