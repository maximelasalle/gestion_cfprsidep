function addbuttonRemise(id, divClassId, imgFirst, imgChange, imgHover, isAcknowledged, userName, userSurname) 
{
	var p = document.createElement("P");
	p.id = id;
	var del = document.createElement("img");
	del.type = "image";
	del.name = id;
	del.id = id;

	if(isAcknowledged == 1)
	{
		del.src = imgChange;
		del.value = "change";
	}
	else	
	{
		del.src = imgFirst;	
		del.value = "first";
	}
	
	del.onclick = function () 
	{
        if(del.value != "change")
		{		
			del.src = imgChange;
			del.value = "change";
		}
		var displayDate = new Date();
		document.getElementById("datereception"+id).innerHTML = "Date de reception: "+displayDate.format('DD/MM/YYYY HH:mm');
		window.location.replace("http://gestion.cfprsidep.ca/includes/system/download_remise.php?p=" + encodeURIComponent(id)+"&name="+userName+"&surname="+userSurname);
	};
	
	del.onmouseover = function () 
	{
		del.src = imgHover;
	};
	
	del.onmouseout = function () 
	{
		if(del.value != "change")
		{
			del.src = imgFirst;
		}
		else
		{
			del.src = imgChange;
		}
	};
	
	p.appendChild(del);
	document.getElementById(divClassId).appendChild(p);
}

function addbuttonRemiseDelete(id, divClassId, imgFirst, imgChange, imgHover, userId) 
{
	var p = document.createElement("P");
	p.id = "delete"+id;
	var del = document.createElement("img");
	del.type = "image";
	del.name = "delete"+id;
	del.id = "delete"+id;
	del.src = imgFirst;	
	del.value = "first";
	
	del.onclick = function () 
	{
		var r = confirm("Confirmer la supression");
		if (r == true) 
		{
			if(del.value != "change")
			{		
				del.src = imgChange;
				del.value = "change";
			}
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					$('#remiseProfBody_formRemiseBar').submit();
				}
			}
			xmlhttp.open("GET","includes/enseignants/asynch_enseigants.php?code=3&id="+id+"&userid="+userId,true);
			xmlhttp.send();
		}
	};
	
	del.onmouseover = function () 
	{
		del.src = imgHover;
	};
	
	del.onmouseout = function () 
	{
		if(del.value != "change")
		{
			del.src = imgFirst;
		}
		else
		{
			del.src = imgChange;
		}
	};
	
	p.appendChild(del);
	document.getElementById(divClassId).appendChild(p);
}

