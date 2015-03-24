<?php
include_once '../system/db_connect.php';
include_once '../system/functions.php';

sec_session_start(); 

if (login_check($mysqli) == true && isset($_SESSION['user_id'])) 
{
	$id = $_SESSION['user_id'];

	$examId = intval($_GET['examlist']);
	
	$query = "SELECT members_evaluation.id members_evaluationid, members.name membersname, members.surname memberssurname, groupe.name groupname, 
	                 members_evaluation.completed members_evaluationcompleted, members_evaluation.success members_evaluationsuccess,
					members_evaluation.comment members_evaluationcomment, cours_exam.description examdescription, formation_exam_type.description formation_exam_typedescription, 
					formation_exam_version.code formation_exam_versioncode, cours_exam.date_time examdate_time  
					FROM members_evaluation, members, members_group, groupe, cours_exam, formation_exam_type, formation_exam_version 
					WHERE members.id = members_evaluation.member_id AND members.id = members_group.member_id AND groupe.id = members_group.group_id and members_evaluation.exam_id = cours_exam.id 
					and cours_exam.version_id = formation_exam_version.id and cours_exam.type_id = formation_exam_type.id AND cours_exam.id = $examId  order by groupe.name, members.surname";
	
	if($result = $mysqli->query($query))
	{	
		$currentGroup = "";
	
		while($row = $result->fetch_array())
		{	
			$date = date('d/m/Y H:i', $row['examdate_time']); 
			
			echo '<div class="notesProf_documentObject"">
					<div class="">';
			
			if($currentGroup != $row[groupname])
			{
			echo '<li><p class ="notesProf_groupe">'  . $row['groupname'] . '</p></li>';
				$currentGroup = $row[groupname];
			}
			
			echo   '<div class="notesProf_listObject">
					<li><p class ="notesProf_nomEleve">' . $row['membersname'] . ' ' . $row['memberssurname'] . '</p>
					<div id = ' . 'c' . $row['members_evaluationid'].' class="notesProf_boutonCommentaire">
					<script>
						addButtonNotesComment("'.$row['members_evaluationid'].'","c'.$row['members_evaluationid'].'","p'.$row['members_evaluationid'].'","../../images/notesProf_boutonCommentaire.png","../../images/notesProf_boutonCommentaireHover.png"); 
					</script>
					</div>
					<div id = ' . 'states' . $row['members_evaluationid'].' class="notesProf_boutonState">
					<script>
						addButtonNotesReussiteEchec("'.$row['members_evaluationid'].'","states'.$row['members_evaluationid'].'",0,"../../images/"); 
					</script>
					</div>
					</div>				
					</li></div>';
		}
	}
}
?>	
