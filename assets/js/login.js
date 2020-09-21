function validate()
{
	var show1 = document.getElementById("show1");
	var userid = document.getElementById("userid").value;
	var uid=false;
	var show2 = document.getElementById("show2");
	var password = document.getElementById("password").value;
	var up=false;
	if (userid !="") 
	{
		uid=true;
	}
	else
	{
		show1.innerHTML="userid cant be empty!";
	}
	if (password !="") 
	{
		up=true;
	}
	else
	{
		show2.innerHTML="password cant be empty!";
	}
	if (up==true&uid==true) 
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