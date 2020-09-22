function validate()
{
	var show1 = document.getElementById("show1");
	var assignment = document.getElementById("assignment").value;
	var ca=false;

	if (assignment != "") 
	{
		var last;
		var check = assignment.toLowerCase().split(".");
		for (var i = 0; i < check.length; i++) 
		{
			var last=check[i];
			continue;
		}
		if(last == "pdf" || last == "docx")
		{
			ca=true;
		}
		else
		{
			show1.innerHTML = "Please upload an valid assignment";
		}
	}
	else
	{
		show1.innerHTML="First select a assignment to upload!!";
	}

	if (ca==true)
	{
		show1.innerHTML="Assignment Uploaded!"
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