function addButtonNotesReussiteEchec(id, divId, idState, imgPath) 
{
	var p = document.createElement("P");
	p.id = "p"+id;
	var del = document.createElement("img");
	del.type = "image";
	del.name = id;
	del.id = id+"imgState";
	del.value = "first";
	document.getElementById(divId).dataset.resultat = idState;
	setImage(idState,del,imgPath,0);

	del.onclick = function ()
	{
		idState++;
		if(idState > 3)
		{
			idState = 0;
		}
		setImage(idState,del,imgPath,1);
		document.getElementById(divId).dataset.resultat = idState;
	};
	
	del.onmouseover = function ()
	{
		setImage(idState,del,imgPath,1);
	};
	
	del.onmouseout = function ()
	{
		setImage(idState,del,imgPath,0);
	};
	
	p.appendChild(del);
	document.getElementById(divId).appendChild(p);
}

function makeImgName(state,imgPath,hover)
{
	var states = ["Base","Reussite","Echec","Absent"];
	
	var prefix = imgPath+"notesProf_bouton";
	var suffix = ".png";
	if(hover)
	{
		suffix = "Hover"+suffix;
	}
	
	return name = prefix+states[state]+suffix;
}

function setImage(state, imgTarget, imgPath, hover)
{
	imgTarget.src = makeImgName(state, imgPath, hover);
}

function addButtonNotesComment(id, divId, pRowId, imgFirst, imgHover) 
{
	var p = document.createElement("P");
	p.id = pRowId;
	var del = document.createElement("img");
	del.type = "image";
	del.name = id;
	del.id = id;
    del.src = imgFirst;	
	del.value = "first";
	document.getElementById(divId).dataset.comment = "";
	
	del.onclick = function ()
	{
		//ouvrir popup
	};
	
	del.onmouseover = function ()
	{
		del.src = imgHover;
	};
	
	del.onmouseout = function ()
	{
		del.src = imgFirst;
	};
	
	p.appendChild(del);
	document.getElementById(divId).appendChild(p);
}