function validate()
{
	var show1 = document.getElementById("show1");
	var informationname = document.getElementById("informationname").value;
	var i=false;
	var show2 = document.getElementById("show2");
	var informationbody = document.getElementById("informationbody").value;
	var ib=false;
	if (informationname != "") 
	{
		i=true;
	}
	else
	{
		show1.innerHTML="information name can not be empty!!"
	}
	if (informationbody != "") 
	{
		ib=true;
	}
	else
	{
		show2.innerHTML="information body can not be empty!!"
	}
	if (i==true & ib==true) 
	{
		var addinformations = document.getElementById("addinformations").value;
		var data = {
			'informationname' : informationname,
			'informationbody' : informationbody
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/adminInformationsController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('addinformations='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Information uploaded!")
					{
						document.getElementById('informationname').value=null;
						document.getElementById('informationbody').value=null;
						document.getElementById('show3').innerHTML = this.responseText;
					}
					else
					{
						document.getElementById('show3').innerHTML = this.responseText;	
					}
				}
				else
				{
					document.getElementById('show3').innerHTML = "";
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