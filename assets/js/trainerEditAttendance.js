function validate()
{
	var show2 = document.getElementById("show2");
	var month = document.getElementById('month').value;
	var show3 = document.getElementById("show3");
	var year = document.getElementById('year').value;
	var m=false;
	var y=false;

	
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

	if (m==true & y==true)
	{
		return true;
	}
	else
	{
		return false;
	}
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