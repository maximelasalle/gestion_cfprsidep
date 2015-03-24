
	<div id="notesProfBody_page">
	
		<div  id="notesProfBody_topBorder" ><img src="images/notesProfBody_topBorder.png"></div>
	
			<!--<div class="notesProfBody_menuNotesProf">
			
				<img id="notesProfBody_confirmation"  src="images/notesProfBody_confirmation.png" onclick="notesMenuOut()"></img>
			</div>-->
	
			<div id="notesProfBody_contenu">
			
			
			<div id="notesProfBody_filtre">
				<form id="notesProfBody_formCoursBar" action="includes/enseignants/notes.php">
					<select name="courlist" id="courlist" form="notesProfBody_formCoursBar" onchange="populateExamList()">
					</select>
					<select name="examlist" id="examlist" form="notesProfBody_formCoursBar" onchange="validateExam()">
					</select>
					<input style="border: none; outline: none;" type="image" src="images/notesProfBody_recherche.png" id="exambutton" disabled></input>
				</form>
			</div>
			<div id="notes_form_output">
		</div>
		
		<script>
			 populateCourlist();
		</script>	
	
		</div>
	</div>




