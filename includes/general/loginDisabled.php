
<form  class="loginDisabling" id="login_loginBox" action="includes/system/process_login.php" method="post" name="login_form">                      
            <p id="login_emailText">Courriel</P> <input class="login_dialogBox" id="login_email" type="text" name="email" disabled  />
			<p id="login_passwordText">Mot de passe</p> <input class="login_dialogBox" id="login_password" type="password"
                             name="password" 
                             id="password"
							  disabled />
            <input 
					id="login_button"
					style="border: none; outline: none;"
					type="image"
					src="images/login_sendButton.png"
					onclick="formhash(this.form, this.form.password);"
					disabled
					/> 

</form>


<div id="login_antiOverflow">
<img id='login_cfprCornerLogo' src='images/login_cfprCornerLogo.png'>
</div>