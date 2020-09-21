<?php

	require_once('../php/sessionAndCookieHeader.php');

	if(!empty($_SESSION))
	{
		if($_SESSION['usertype']!="Trainer")
		{
			header('location:../php/logout.php');
		}
	}
	else
	{
		if($_COOKIE['usertype']!="Trainer")
		{
			header('location:../php/logout.php');
		}
	}

	// if (isset($_GET['error'])) {
		
	// 	if($_GET['error'] == 'db_error'){
	// 		echo "Something went wrong...please try again";
	// 	}
	// 	elseif ($_GET['error'] == 'null_error') {
	// 		echo "null submission...please try again";
	// 	}
	// 	elseif ($_GET['error'] == 'marks_error') {
	// 		echo "marks need to be in betwoon 0-100";
	// 	}
	// 	elseif ($_GET['error'] == 'studentid_error') {
	// 		echo "this student id dont exist";
	// 	}
	// 	elseif ($_GET['error'] == 'coursename_error') {
	// 		echo "this course name dont exist";
	// 	}
	// 	elseif ($_GET['error'] == 'existance_error') {
	// 		echo "You have already added this student marks";
	// 	}
	// }
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Student Marks</title>
	<script type="text/javascript" src="../assets/js/trainerAddStudentMarks.js"></script>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='ViewProfile.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='ViewProfile.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='trainerHome.php'><font color='red'>Home</font></a></li>
						<li><a href="viewProfile.php"><font color="red">View Profile</font></a></li>
						<li><a href="editProfile.php"><font color="red">Edit Profile</font></a></li>
						<li><a href="changePassword.php"><font color="red">Change Password</font></a></li>
						<li><a href="trainerFile.php"><font color="red">Files</font></a></li>
						<li><a href="trainerNotice.php"><font color="red">Notices</font></a></li>
						<li><a href="studentMarks.php"><font color="red">Student Marks</font></a></li>
						<li><a href="trainerMail.php"><font color="red">Mails</font></a></li>
						<li><a href="trainerAssignment.php"><font color="red">Assignments</font></a></li>
						<li><a href="trainerViewClasstime.php"><font color="red">View Class Times</font></a></li>
						<li><a href="trainerAttendance.php"><font color="red">Upload Attendance</font></a></li>
						<li><a href="../php/logout.php"><font color="red">Logout</font></a></li>
					</ul>
				</td>
				<td>
					<form id="myform">
						<div>
						Student Id:<br/>
						<input type="text" id="studentid" name="studentid" onclick="click1()"><br/>
						</div>
						<div id="show1"></div>
						<div>
						Course Name:<br/>
						<input type="text" id="coursename" name="coursename" onclick="click2()"><br/>
						</div>
						<div id="show2"></div>
						<div>
						Marks:<br/>
						<input type="text" id="marks" name="marks" onclick="click3()"><br/>
						</div>
						<div id="show3"></div><br/>
						<a href="studentMarks.php">
							<button type="button">
								Back
							</button>
						</a>
						<input type="button" id="addmarks" name="addmarks" value="Add" onclick="validate()">
						<input type="reset" name="reset" onclick="click1(),click2(),click3(),click4()">
						<div id="output"></div>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>