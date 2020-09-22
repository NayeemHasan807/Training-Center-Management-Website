function validate()
{
	var show1 = document.getElementById("show1");
	var trainerattendance = document.getElementById("trainerattendance").value;
	var show2 = document.getElementById("show2");
	var month = document.getElementById('month').value;
	var show3 = document.getElementById("show3");
	var year = document.getElementById('year').value;
	var ca=false;
	var m=false;
	var y=false;

	if (trainerattendance != "") 
	{
		var last;
		var check = trainerattendance.toLowerCase().split(".");
		for (var i = 0; i < check.length; i++) 
		{
			var last=check[i];
			continue;
		}
		if(last == "xlsx")
		{
			ca=true;
		}
		else
		{
			show1.innerHTML = "Please upload an valid attendance file";
		}
	}
	else
	{
		show1.innerHTML="First select a attendance file to upload!!";
	}

	if (month != "") 
	{
		m=true;	
	}
	else
	{
		show2.innerHTML="month need to be selected!"	
	}

	if (year != "") 
	{
		y=true;
	}
	else
	{
		show3.innerHTML="Must need to set a year!"
	}

	if (ca==true & m==true & y==true)
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
function click2()
{
	var show = document.getElementById("show2");
	show.innerHTML="";
}
function click3()
{
	var show = document.getElementById("show3");
	show.innerHTML="";
}