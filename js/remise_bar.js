$(document).ready(function () {
    $('#remiseProfBody_formRemiseBar').on('submit', function(e) {
        e.preventDefault();
        $.ajax({	
            url : $(this).attr('action'),
            type: "GET",
            data: $(this).serialize(),
            success: function (data) {
                $("#form_remise_output").html(data);
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
	//Get default remise
	$('#remiseProfBody_formRemiseBar').submit();
});

function populateRemiseCourlist(userId)
{
	var select = document.getElementById("remisecourlist");
	
	emptySelect(select);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			var i;
			
			addEmptyDefaultOption(select);
			
			var courList = JSON.parse(xmlhttp.responseText);
			
			for	(i = 0; i < courList.length; i++)
			{
				var option = document.createElement("option");
				option.text = courList[i].coursdesc;
				option.value = courList[i].coursid;
				select.add(option);
			}
		}
	}

	xmlhttp.open("GET","includes/enseignants/asynch_enseigants.php?code=1&id="+userId,false);
	xmlhttp.send();
}

function populateRemiseGrouplist(userId)
{
	var select = document.getElementById("remisegrouplist");
	
	emptySelect(select);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			var i;
			
			addEmptyDefaultOption(select);
			
			var groupList = JSON.parse(xmlhttp.responseText);
			
			for	(i = 0; i < groupList.length; i++)
			{
				var option = document.createElement("option");
				option.text = groupList[i].groupname;
				option.value = groupList[i].groupid;
				select.add(option);
			}
		}
	}
	xmlhttp.open("GET","includes/enseignants/asynch_enseigants.php?code=4&id="+userId,false);
	xmlhttp.send();
}





