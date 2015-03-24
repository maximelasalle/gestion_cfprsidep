<?php
include_once '../system/db_connect.php';
include_once '../system/functions.php';

sec_session_start();

if (login_check($mysqli) == true) 
{
	$courId = 0;
	if(isset($_GET['remisecourlist']))
	{
		$courId = intval($_GET['remisecourlist']);
	}
	
	$groupId = 0;
	if(isset($_GET['remisecourlist']))
	{
		$courId = intval($_GET['remisecourlist']);
	}
	
	$userId = $_SESSION['user_id'];
	
	$query = "SELECT remise.id remiseid, message, date_sent, acknowledged, date_acknowledged, filename, members.name memname, members.surname memsurname, 
					 groupe.name groupname, cours.description coursdescription ,CHAR_LENGTH(remise.file_blob) blobsize 
				FROM remise, members, groupe, members_group, cours WHERE members.id = members_group.member_id AND groupe.id = members_group.group_id AND remise.member_orig_id = members.id AND remise.deleted = 0 
				 AND remise.cours_id = cours.id AND remise.member_dest_id = $userId";

	if($courId != 0)
	{
		$query = $query." AND cours.id = $courId ";
	}
	
	if($groupId != 0)
	{
		$query = $query." AND groupe.id = $groupId ";
	}
	
	if($result = $mysqli->query($query))
	{		
		while($row = $result->fetch_array())
		{	
			$daterem = date('d/m/Y H:i', $row['date_sent']);  
			$daterec = date('d/m/Y H:i', $row['date_acknowledged']); 

			$sizeMB = 0;
			if($row['blobsize'] > 0)
			{
				$sizeMB = round($row['blobsize']/1024/1024,2);
			}
			// $row["coursdescription"]
			echo '<div class="remiseProf_documentObject""><li>
					<div class="">
					<p class ="remiseProf_nomEleve">' . 'Nom: ' . $row['memname'] . ' ' . $row['memsurname'] . '</p>
					<p class ="remiseProf_nomFichier">' . 'Nom du fichier: ' . $row['filename'] . '</p>
					<p class ="remiseProf_groupe">' . 'Groupe: ' . $row['groupname'] . '</p>
					<p class ="remiseProf_dateRemise">' . 'Date de remise: ' . $daterem . '</p>
					<p class ="remiseProf_dateReception" id = "datereception'.$row['remiseid'].'">' . 'Date de reception: ' . $daterec . '</p>
					<p class ="remiseProf_taille" id = "d'.$row['remiseid'].'">' . 'Taille (MB): ' . $sizeMB . '</p>
					<div id = ' . 'c' . $row['remiseid'].' class="remiseProf_boutonTelecharger">
					<script>
						addbuttonRemise("'.$row['remiseid'].'","c'.$row['remiseid'].'","../../images/remiseProf_nouveau.png","../../images/remiseProf_retelecharger.png","../../images/remiseProf_telecharger.png","'.$row['acknowledged'].'","'.$row['memname'].'","'.$row['memsurname'].'"); 
					</script>
					</div>	
					<div id = ' . 'delete' . $row['remiseid'].' class="remiseProf_boutonSupprimer">
					<script>
						addbuttonRemiseDelete("'.$row['remiseid'].'","delete'.$row['remiseid'].'","../../images/remiseProf_supprimer.png","../../images/remiseProf_supprimer.png","../../images/remiseProf_supprimerHover.png",'.$userId.'); 
					</script>
					</div>						
				</li></div>';
		}
	}	
}
?>