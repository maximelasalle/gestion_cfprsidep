
	<div id="remiseProfBody_page">
	
		<div  id="remiseProfBody_topBorder" ><img src="images/remiseProfBody_topBorder.png"></div>
	
			<div id="remiseProfBody_contenu">
		
				<div id="form_remise_output">
				</div>
	
			</div>
			
				
			<div class="remiseProfBody_menuRemiseProf">
				<form id="remiseProfBody_formRemiseBar" method="post" action="includes/enseignants/remise.php" >
					<p id="remisecourslisttext">Cours:</p>
					<select name="remisecourlist" id="remisecourlist" form="remiseProfBody_formRemiseBar">
					</select>
					<p id="remisegrouplisttext">Groupe:</p>
					<select name="remisegrouplist" id="remisegrouplist" form="remiseProfBody_formRemiseBar">
					</select>
					<input style="border: none; outline: none;" type="image" src="images/remiseProfBody_recherche.png" id="remisebutton"></button>
				</form>
			
				<img id="remiseProfBody_tabFiltre"  src="images/remiseProfBody_tabFiltre.png" onclick="remiseMenuOut()"></img>
			</div>
			<script>
				populateRemiseGrouplist(<?php echo $_SESSION['user_id'] ?>);
				populateRemiseCourlist(<?php echo $_SESSION['user_id'] ?>);
			</script>	
	</div>