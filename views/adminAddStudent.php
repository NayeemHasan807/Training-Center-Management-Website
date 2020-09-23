<?php
	require_once('../php/sessionAndCookieHeader.php');
	
	if(!empty($_SESSION))
	{
		if($_SESSION['usertype']!="Admin")
		{
			header('location:../php/logout.php');
		}
	}
	else
	{
		if($_COOKIE['usertype']!="Admin")
		{
			header('location:../php/logout.php');
		}
	}

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}


?>

<!DOCTYPE html>
<head>
	<title>add student</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/adminStyle.css">
</head>


<fieldset>
    <p><h1><font color='green'>NSS Training Center</font></h1></p>
	<?php
	    if(!empty($_SESSION))
		{
			echo "<p align='right'><font color='black'> Logged in as </font><a href='viewProfileAdmin.php'><font color='red'>".$_SESSION['userid']."</font></a>|<a href = '../php/logout.php'><font color='red'>Logout</font></a></p>";
		}
		else
			echo "<p align='right'><font color='black'> Logged in as </font><a href='viewProfileAdmin.php'><font color='red'>".$_COOKIE['userid']."</font></a>|<a href = '../php/logout.php'><font color='red'>Logout</font></a></p>";
	?>
</fieldset>
<fieldset>
    <table cellspacing="0" cellpadding="5" width="100%" border="1">
	    <tr>
		    <td colspan="10">
			    Account<hr/>
				<ul>
				    <li><a href = "adminHome.php"><font color='red'>Home</font></a></li>
					<li><a href = "viewProfileAdmin.php"><font color='red'>View Profile</font></a></li>
					<li><a href = "editProfileAdmin.php"><font color='red'>Edit Profile</font></a></li>
					<li><a href = "changePassword.php"><font color='red'>Change Password</font></a></li>
					<li><a href = "userManage.php"><font color='red'>Manage Users</font></a></li>
					<li><a href = "courseManage.php"><font color='red'>Manage Courses</font></a></li>
					<li><a href = "adminMail.php"><font color='red'>Mail</font></a></li>
					<li><a href = "adminNotice.php"><font color='red'>Notice</font></a></li>
					<li><a href = "adminForms.php"><font color='red'>Forms</font></a></li>
					<li><a href = "financeManage.php"><font color='red'>Finance</font></a></li>
					<li><a href = "informations.php"><font color='red'>Informations</font></a></li>
					<li><a href = "../php/logout.php"><font color='red'>Logout</font></a></li>
				</ul>
			</td>
			<td>
				<form action="../php/adminAddStudentController.php" method="POST">
			    <fieldset>
					<legend><b>CREATE NEW STUDENT</b></legend>
					<table>
						<tr>
							<td>Student ID</td>
							<td><input type="text" name="studentid"></td>
						</tr>
						<tr>
							<td>Student Name</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email"></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><input type="text" name="gender"></td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td><input type="text" name="dob"></td>
						</tr>
						<tr>
							<td>Course ID</td>
							<td><input type="text" name="courseid"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="userManage.php">
									<button type="button">
										Back
									</button>
								</a>
								<input type="submit" name="addstudent" value="Create">
								<input type="reset" name="reset">
							</td>
						</tr>
					</table>
					</form>
				</fieldset>
			</td>
		</tr>
	</table>
</fieldset>