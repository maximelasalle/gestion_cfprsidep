var timeoutID;

function emptySelect(select)
{
	if(select)
	{
		var length = select.options.length;

		for (i = 0; i < length; i++) {
		  select.remove(0);
		}
	}
}

function addEmptyDefaultOption(select)
{
	var option = document.createElement("option");
	option.text = "Aucune selection";
	option.value = "0";
	option.selected = true;
	select.add(option);
}

function addPadding(value, length) 
{
	var negative = ((value < 0) ? "-" : "");
	var zeros = "0";
	for (var i = 2; i < length; i++) 
	{
		zeros += "0";
	}
	return negative + (zeros + Math.abs(value).toString()).slice(-length);
}

function doTimer(max,oninstance)
{
    var count = 0;
	var start = Date.now();
	
    function instance()
    {
		if(count < max)
		{	
			var diff = Date.now() - start;
			var strDate = new Date(diff);
	
			oninstance(addPadding(strDate.getUTCHours(),2) + ':' + addPadding(strDate.getUTCMinutes(),2) + ':' + addPadding(strDate.getUTCSeconds(),2));
		
			count++;
			
			timeoutID = window.setTimeout(instance, 1000);
		}
    }

    timeoutID = window.setTimeout(instance, 1000);
}

function checkSize(max_size)
{
	
    var input = document.getElementById("userfile");//the file must be id="userfile"
    // check for browser support (may need to be modified)
	if(!input)
	{
		return false;
	}
	
    if(input.files && input.files.length == 1)
    {           
        if (input.files[0].size > max_size) 
        {
            alert("Le fichier doit etre plus petit que " + (max_size/1024/1024) + "MB");
            return false;
        }
    }

    return true;
}
