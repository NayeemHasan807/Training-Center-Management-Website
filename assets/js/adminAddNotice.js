function validate()
{
	var show1 = document.getElementById("show1");
	var noticesubject = document.getElementById("noticesubject").value;
	var cns=false;
	var show2 = document.getElementById("show2");
	var noticebody = document.getElementById("noticebody").value;
	var cnb=false;
	if (noticesubject != "") 
	{
		cns=true;
	}
	else
	{
		show1.innerHTML="notice subject can not be empty!!"
	}
	if (noticebody != "") 
	{
		cnb=true;
	}
	else
	{
		show2.innerHTML="notice body can not be empty!!"
	}
	if (cns==true & cnb==true) 
	{
		var addnotice = document.getElementById("addnotice").value;
		var data = {
			'noticesubject' : noticesubject,
			'noticebody' : noticebody
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/adminNoticeController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('addnotice='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Notice uploaded!")
					{
						document.getElementById('noticesubject').value=null;
						document.getElementById('noticebody').value=null;
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