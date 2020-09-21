function validate()
{
	var show1 = document.getElementById("show1");
	var password = document.getElementById("password").value;
	var sid=false;
	var show2 = document.getElementById("show2");
	var newpassword = document.getElementById("newpassword").value;
	var cn=false;
	var show3 = document.getElementById("show3");
	var renewpassword = document.getElementById("renewpassword").value;
	var m=false;
	var match=false;
	
	if (password != "") 
	{
		sid=true;
	}
	else
	{
		show1.innerHTML="password can not be empty!!";
	}
	
	if (newpassword != "") 
	{
		cn=true;
	}
	else
	{
		show2.innerHTML="new password can not be empty!!";
	}

	if (renewpassword != "") 
	{
		m=true;	
	}
	else
	{
		show3.innerHTML="renewpassword can not be empty!!";
	}

	if (newpassword !="" & renewpassword !="")
	{
		if (newpassword==renewpassword) 
		{
			match=true;
		}
		else
		{
			show2.innerHTML="New password and retype new password must need to be same!";
			show3.innerHTML="New password and retype new password must need to be same!";
		}
	}
	alert(sid);
	alert(cn);
	alert(m);
	alert(match);
	if (sid==true & cn==true & m==true & match==true) 
	{
		var data = {
			'password' : password,
			'newpassword' : newpassword,
			'renewpassword' : renewpassword
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/userController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('change='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Password changed!")
					{
						document.getElementById('password').value=null;
						document.getElementById('newpassword').value=null;
						document.getElementById('renewpassword').value=null;
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