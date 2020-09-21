function validate()
{
	var show1 = document.getElementById("show1");
	var noticesubject = document.getElementById("noticesubject").value;
	var cns=false;
	var show2 = document.getElementById("show2");
	var noticebody = document.getElementById("noticebody").value;
	var cnb=false;
	var id=document.getElementById("id").value;
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
		var updatenotice = document.getElementById("updatenotice").value;
		var data = {
			'id' : id,
			'noticesubject' : noticesubject,
			'noticebody' : noticebody
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/trainerNoticeController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('updatenotice='+data);
		//xhttp.send('noticesubject='+noticesubject+'&noticebody='+noticebody+'&addnotice='+addnotice);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Notice updated!")
					{
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