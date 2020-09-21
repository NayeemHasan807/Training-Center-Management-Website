function validate()
{
	var show1 = document.getElementById("show1");
	var trainerfile = document.getElementById("trainerfile").value;
	var cf=false;

	if (trainerfile != "") 
	{
		var last;
		var check = trainerfile.toLowerCase().split(".");
		for (var i = 0; i < check.length; i++) 
		{
			var last = check[i];
			continue;
		}
		if( last == "ppt" || last == "pdf" || last == "docx")
		{
			cf=true;
		}
		else
		{
			show1.innerHTML = "Please upload an valid file";
		}
	}
	else
	{
		show1.innerHTML="First select a file to upload!!";
	}
	if (cf==true) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function click1()
{
	var show = document.getElementById("show1");
	show.innerHTML="";
}
