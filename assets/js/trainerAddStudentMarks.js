function validate()
{
	var show1 = document.getElementById("show1");
	var studentid = document.getElementById("studentid").value;
	var sid=false;
	var show2 = document.getElementById("show2");
	var coursename = document.getElementById("coursename").value;
	var cn=false;
	var show3 = document.getElementById("show3");
	var marks = document.getElementById("marks").value;
	var m=false;
	
	if (studentid != "") 
	{
		sid=true;
		// var data = {
		// 	'studentid' : studentid
		// };
		// var data = JSON.stringify(data);
		// var xhttp = new XMLHttpRequest();
		// xhttp.open('POST', '../php/trainerStudentMarksController.php', true);
		// xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		// xhttp.send('studentid='+data);
		// xhttp.onreadystatechange = function (){
		// 	if(this.readyState == 4 && this.status == 200)
		// 	{
		// 		if(this.responseText != "")
		// // 		{
		// // 			alert(this.responseText);
		// // 			if (this.responseText == "found")
		// // 			{
		// 				sid=true;
		// // 				document.getElementById('show1').innerHTML = this.responseText;	

		// // 			}
		// // 			else
		// // 			{
		// // 				document.getElementById('show1').innerHTML = this.responseText;	
		// // 			}
		// // 		}
		// // 		else
		// // 		{
		// // 			document.getElementById('show1').innerHTML = "";
		// // 		}
		// // 	}
		// // }
	}
	else
	{
		show1.innerHTML="studentid can not be empty!!"
	}
	
	if (coursename != "") 
	{
		cn=true;
		// // var data = {
		// // 	'coursename' : coursename
		// // };
		// // var data = JSON.stringify(data);
		// // var xhttp = new XMLHttpRequest();
		// // xhttp.open('POST', '../php/trainerStudentMarksController.php', true);
		// // xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		// // xhttp.send('coursename='+data);
		// // xhttp.onreadystatechange = function (){
		// // 	if(this.readyState == 4 && this.status == 200)
		// // 	{
		// // 		if(this.responseText != "")
		// // 		{
		// // 			alert(this.responseText);
		// // 			if (this.responseText == "found")
		// // 			{
		// 				cn=true;
		// // 				document.getElementById('show2').innerHTML = this.responseText;
		// // 			}
		// // 			else
		// // 			{
		// // 				document.getElementById('show2').innerHTML = this.responseText;	
		// // 			}
		// // 		}
		// // 		else
		// // 		{
		// // 			document.getElementById('show2').innerHTML = "";
		// // 		}
		// // 	}
		// // }
	}
	else
	{
		show2.innerHTML="coursename can not be empty!!"
	}

	if (marks != "") 
	{
		if (marks>0 & marks<=100) 
		{
			m=true;	
		}
		else
		{
			show3.innerHTML="marks need to be in between 0-100!!"
		}
	}
	else
	{
		show3.innerHTML="marks can not be empty!!"
	}

	// alert(sid);
	// alert(cn);
	// alert(m);
	if (sid==true & cn==true & m==true) 
	{
		var addmarks = document.getElementById("addmarks").value;
		var data = {
			'studentid' : studentid,
			'coursename' : coursename,
			'marks' : marks
		};
		var data = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/trainerStudentMarksController.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('addmarks='+data);

		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					if (this.responseText == "Marks added!")
					{
						document.getElementById('studentid').value=null;
						document.getElementById('coursename').value=null;
						document.getElementById('marks').value=null;
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