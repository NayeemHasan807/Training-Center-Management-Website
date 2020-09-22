var c1;
var c2;

function validate()
{
	var show1 = document.getElementById("show1");
	var mailsubject = document.getElementById("mailsubject").value;
	if (mailsubject != "") 
	{
		var show2 = document.getElementById("show2");
		var towhom = document.getElementById("towhom").value;
		if (towhom != "") 
		{
			var show3 = document.getElementById("show3");
			var mailbody = document.getElementById("mailbody").value;
			if (mailbody != "") 
			{
				if(c1==true)
				{
					if (c2==true) 
					{
						var addmail = document.getElementById("addmail").value;
						var data = {
							'mailsubject' : mailsubject,
							'towhom' : towhom,
							'mailbody' : mailbody
						};
						var data = JSON.stringify(data);
						var xhttp = new XMLHttpRequest();
						xhttp.open('POST', '../php/trainerMailController.php', true);
						xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
						xhttp.send('addmail='+data);
						//xhttp.send('mailsubject='+mailsubject+'&towhom='+towhom+'&mailbody='+mailbody+'&addmail='+addmail);

						xhttp.onreadystatechange = function (){
							if(this.readyState == 4 && this.status == 200)
							{
								if(this.responseText != "")
								{
									if (this.responseText == "Mail Sent")
									{
										document.getElementById("mailsubject").value=null;
										document.getElementById("mailbody").value=null;
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
					else
					{
						show3.innerHTML="Must need to be more then 5 words";
					}

				}
				else
				{
					show1.innerHTML="Must need to be more then 3 words";
				}
				
			}
			else
			{
				show3.innerHTML="Mail body can not be empty!!"
			}
		}
		else
		{
			show2.innerHTML="Must need to be selected!!"
		}
	}
	else
	{
		show1.innerHTML="Mail subject can not be empty!!"
	}
}

function validatesubject()
{
	var show = document.getElementById("show1");
	var mailsubject = document.getElementById("mailsubject").value;
	var words = mailsubject.split(" ");
	if (words.length > 2) 
	{
		c1=true;
		show.innerHTML=" ";
	}
	else
	{
		show.innerHTML="Must need to be more then 3 words";
	}
}

function validatebody()
{
	var show = document.getElementById("show3");
	var mailbody = document.getElementById("mailbody").value;
	var words = mailbody.split(" ");
	if (words.length > 5) 
	{
		c2=true;
		show.innerHTML=" ";
	}
	else
	{
		show.innerHTML="Must need to be more then 5 words";
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
	var output = document.getElementById("output");
	output.innerHTML="";
}