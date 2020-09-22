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
		elseif ($_GET['error'] == 'null_error') {
			echo "null submission...please try again";
		}
		elseif ($_GET['error'] == 'too_long') {
			echo "Your uploaded file size is too long";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Add Forms</title>
	<script type="text/javascript" src="../assets/js/adminAddForms.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/adminStyle.css">
</head>
<body>
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
					<form action="../php/adminFormsController.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
						<fieldset>
							<p align="Center"><font color="Orange">[Must need to be docx file]</font></p>
							<table cellspacing="0" cellpadding="10" border="0" align="Center">
								<tr>
									<td>
										Upload Forms:	
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<input type="file" id="adminforms" name="adminforms" onclick="click1()">
									</td>
									<td id="show1"></td>
								</tr>
								<tr>
									<td>
										<select id="towhom" name="towhom" onclick="click2()">
											<option value="">None</option>
											<option value="Student">Student</option>
											<option value="Trainer">Trainer</option>
										</select>
									</td>
									<td id="show2"></td>
								</tr>
								<tr>
									<td>
										<a href="adminForms.php">
											<button type="button">
												Back
											</button>
										</a>
										<input type="submit" name="addforms" value="Upload">
										<input type="reset" id="reset" name="reset" onclick="click1(),click2()">
									</td>
									<td></td>
								</tr>
							</table>
						</fieldset>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>