function validate()
{
	var show1 = document.getElementById("show1");
	var adminforms = document.getElementById("adminforms").value;
	var show2 = document.getElementById("show2");
	var towhom = document.getElementById("towhom").value;
	var cf=false;
	var i=false;

	if (adminforms != "") 
	{
		var last;
		var check = adminforms.toLowerCase().split(".");
		for (var i = 0; i < check.length; i++) 
		{
			var last = check[i];
			continue;
		}
		if(last == "docx")
		{
			cf=true;
		}
		else
		{
			show1.innerHTML = "Please upload a valid file";
		}
	}
	else
	{
		show1.innerHTML="First select a file to upload!!";
	}

	if (towhom!="") 
	{
		i=true;
	}
	else
	{
		show2.innerHTML="must need to be selected";
	}

	if (cf==true & i==true) 
	{
		show1.innerHTML="Forms uploaded!";
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
function click2()
{
	var show = document.getElementById("show2");
	show.innerHTML="";
}
