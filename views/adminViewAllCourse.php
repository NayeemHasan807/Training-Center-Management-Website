<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/courseCRUDService.php');

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
?>

<!DOCTYPE html>
<html>
<head>
	<title>all course</title>
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
				<td align="Center">
					<table border="1" width="100%" cellspacing="0" cellpadding="5">
						<tr>
							<td>Course ID</td>
							<td>Course Name</td>
							<td>Trainer ID</td>
							<td>Course Day</td>
							<td>Course Time</td>
							<td>Sit Available</td>
							<td>Action</td>
						</tr>

						<?php
							if (!empty($_SESSION['userid'])) 
							{
								$userid = $_SESSION['userid'];
							} 
							else
							{
								$userid = $_COOKIE['userid'];
							}
						?>
						<?php
							$courses = getallcourse();
							for ($i=0; $i != count($courses); $i++)
							{
						?>
						<tr>
							<td><?=$courses[$i]['courseid']?></td>
							<td><?=$courses[$i]['coursename']?></td>
							<td><?=$courses[$i]['trainerid']?></td>
							<td><?=$courses[$i]['courseday']?></td>
							<td><?=$courses[$i]['coursetime']?></td>
							<td><?=$courses[$i]['sitavailable']?></td>
							<td>
								<a href="adminEditCourse.php?courseid=<?=$courses[$i]['courseid']?>">Edit</a>
								<a href="adminDeleteCourse.php?courseid=<?=$courses[$i]['courseid']?>">Delete</a> 
							</td>
						</tr>

						<?php 
							} 
						?>
						<tr>
							<td colspan="7" align="left">
								<a href="courseManage.php">
									<button type="button">
										Back
									</button>
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>