$(document).ready(function () {
    $('#notesProfBody_formCoursBar').on('submit', function(e) {
        e.preventDefault();
        $.ajax({	
            url : $(this).attr('action'),
            type: "GET",
            data: $(this).serialize(),
            success: function (data) {
                $("#notes_form_output").html(data);
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});

function validateExam()
{
	var select = document.getElementById("examlist");
	if(select.options.length == 0)
	{
		var button = document.getElementById("exambutton");
		button.disabled = true;
		alert("Aucun examen assigne a ce cour");
	}
	else
	{
		var button = document.getElementById("exambutton");
		button.disabled = false;
	}
}

function populateCourlist()
{
	$("#notes_form_output").html("");
	
	var select = document.getElementById("courlist");
	emptySelect(select);

	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			var i;
			
			var courList = JSON.parse(xmlhttp.responseText);
			for	(i = 0; i < courList.length; i++) 
			{
				var option = document.createElement("option");
				option.text = courList[i].coursdesc;
				option.value = courList[i].coursid;
				select.add(option);
			}
			populateExamList();
		}
	}
	xmlhttp.open("GET","includes/enseignants/asynch_enseigants.php?code=1&id=9",true);
	xmlhttp.send();	
}

function populateExamList()
{
	$("#notes_form_output").html("");
	
	var parentSelect = document.getElementById("courlist");
	var parentId = parentSelect.value;
	var select = document.getElementById("examlist");
	emptySelect(select);

	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			var i;
			
			var examList = JSON.parse(xmlhttp.responseText);
			
			for	(i = 0; i < examList.length; i++) 
			{
				var option = document.createElement("option");
				option.text = examList[i].examdesc;
				option.value = examList[i].examid;
				select.add(option);
			}
			validateExam()
		}
	}
	xmlhttp.open("GET","includes/enseignants/asynch_enseigants.php?code=2&id="+parentId,true);
	xmlhttp.send();	
}