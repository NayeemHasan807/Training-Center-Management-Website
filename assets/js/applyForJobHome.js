function validate()
{
	var show1 = document.getElementById("show1");
	var cv = document.getElementById("cv").value;
	var ca=false;

	if (cv != "") 
	{
		var last;
		var check = cv.toLowerCase().split(".");
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
			show1.innerHTML = "Please upload an valid cv";
		}
	}
	else
	{
		show1.innerHTML="First select a file to upload!!";
	}

	if (ca==true)
	{
		show1.innerHTML="cv Uploaded!"
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