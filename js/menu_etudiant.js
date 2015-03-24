function menuEtudiantDisplay(prompt)
{
	var middleDiv = document.getElementById("menuMouseOverText");
	middleDiv.innerHTML = prompt;
}

function clearEtudiantDisplay()
{
	menuEtudiantDisplay('Menu principal');
}