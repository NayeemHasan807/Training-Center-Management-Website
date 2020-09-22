function validate()
{
	var show1 = document.getElementById("show1");
	var towhom = document.getElementById("towhom").value; 
	var sid=false;
	var show2 = document.getElementById("show2");
	var subject = document.getElementById("subject").value;
	var cn=false;
	var show3 = document.getElementById("show3");
	var body = document.getElementById("body").value;
	var m=false;
	
	if (towhom != "") 
	{
		sid=true;
	}
	else
	{
		show1.innerHTML="towhom can not be empty!!";
	}
	
	if (subject != "") 
	{
		cn=true;
	}
	else
	{
		show2.innerHTML="new towhom can not be empty!!";
	}

	if (body != "") 
	{
		m=true;	
	}
	else
	{
		show3.innerHTML="body can not be empty!!";
	}

	if (sid==true & cn==true & m==true) 
	{
		var data = {
			'towhom' : towhom,
			'subject' : subject,
			'body' : body
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/sendMailToPeerController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('addmail='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "mail send")
					{
						document.getElementById('towhom').value=null;
						document.getElementById('subject').value=null;
						document.getElementById('body').value=null;
						document.getElementById('output').innerHTML = this.responseText;
					}
					else
					{
						document.getElementById('output').innerHTML = this.responseText;	
					}
				}
				else
				{
					document.getElementById('output').innerHTML = "";
				}
			}
		}
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
function click4()
{
	var show = document.getElementById("output");
	show.innerHTML="";
}