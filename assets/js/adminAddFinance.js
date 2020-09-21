function validate()
{
	var show1 = document.getElementById("show1");
	var month = document.getElementById("month").value;
	var m=false;
	var show2 = document.getElementById("show2");
	var year = document.getElementById("year").value;
	var y=false;
	var show4 = document.getElementById("show3");
	var trainerssalary = document.getElementById("trainerssalary").value;
	var t=false;
	var show3 = document.getElementById("show4");
	var studentfees = document.getElementById("studentfees").value;
	var s=false;
	
	if (month != "") 
	{
		m=true;
	}
	else
	{
		show1.innerHTML="Month need to be selected!!"
	}
	if (year != "") 
	{
		y=true;
	}
	else
	{
		show2.innerHTML="Year need to be selected!!"
	}
	if (trainerssalary != "") 
	{
		if (trainerssalary>1000 & trainerssalary<500000) 
		{
			t=true;
		}
		else
		{
			show4.innerHTML="Must need to be in between 1000-500000!!"
		}
	}
	else
	{
		show3.innerHTML="Trainer salary cant be empty!!"
	}
	if (studentfees != "") 
	{
		if (studentfees>1000 & studentfees<1000000) 
		{
			s=true;
		}
		else
		{
			show4.innerHTML="Must need to be in between 1000-1000000!!"
		}
		
	}
	else
	{
		show4.innerHTML="Student fees cant be empty!!"
	}


	if (m==true & y==true & t==true & s==true) 
	{
		var data = {
			'month' : month,
			'year' : year,
			'trainerssalary' : trainerssalary,
			'studentfees' : studentfees
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/adminFinanceController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('addfinance='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Notice uploaded!")
					{
						document.getElementById('trainerssalary').value=null;
						document.getElementById('studentfees').value=null;
						document.getElementById('show5').innerHTML = this.responseText;
					}
					else
					{
						document.getElementById('show5').innerHTML = this.responseText;	
					}
				}
				else
				{
					document.getElementById('show5').innerHTML = "";
				}
			}
		}
	}
}


function check1()
{
	var show = document.getElementById("show1");
	show.innerHTML="";
}
function check2()
{
	var show = document.getElementById("show2");
	show.innerHTML="";
}
function check3()
{
	var show = document.getElementById("show3");
	show.innerHTML="";
}
function check4()
{
	var show = document.getElementById("show4");
	show.innerHTML="";
}
function check5()
{
	var show = document.getElementById("show5");
	show.innerHTML="";
}