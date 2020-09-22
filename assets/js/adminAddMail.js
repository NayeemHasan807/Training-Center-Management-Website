function validate()
{
	var show1 = document.getElementById("show1");
	var subject = document.getElementById("subject").value;
	var ms=false;
	var show2 = document.getElementById("show2");
	var body = document.getElementById("body").value;
	var mb=false;
	if (subject != "") 
	{
		ms=true;
	}
	else
	{
		show1.innerHTML="subject can not be empty!!"
	}
	if (body != "") 
	{
		mb=true;
	}
	else
	{
		show2.innerHTML="body can not be empty!!"
	}
	if (ms==true & mb==true) 
	{
		var addmail = document.getElementById("addmail").value;
		var data = {
			'subject' : subject,
			'body' : body
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/adminMailController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('addmail='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Mail send!")
					{
						document.getElementById('subject').value=null;
						document.getElementById('body').value=null;
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