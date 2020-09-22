function validate()
{
	var show2 = document.getElementById("show2");
	var marks = document.getElementById('marks').value;
	var show3 = document.getElementById("show3");
	var deadline = document.getElementById('deadline').value;
	var m=false;
	var dl=false;

	if (marks != "") 
	{
		if (marks>0 & marks<=50) 
		{
			m=true;
		}
		else
		{
			show2.innerHTML="Marks need to be in between 1-50!"
		}
	}
	else
	{
		show2.innerHTML="Marks need to be assigned!"	
	}

	if (deadline != "") 
	{
		var devide = deadline.split("/");
		if(devide[0] >=1 & devide[0] <= 31 & devide[1] >=1 & devide[1] <= 12 & devide[2] >=2020 & devide[2] <= 2021)
		{
			dl=true;
		}
		else
		{
			show3.innerHTML="Give a correct deadline!"
		}
	}
	else
	{
		show3.innerHTML="Must need to set a deadline!"
	}

	if (m==true & dl==true)
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