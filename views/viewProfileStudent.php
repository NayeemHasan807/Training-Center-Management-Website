<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/studentService.php');

	if(!empty($_SESSION))
	{
		if($_SESSION['usertype']!="Student")
		{
			header('location:../php/logout.php');
		}
	}
	else
	{
		if($_COOKIE['usertype']!="Student")
		{
			header('location:../php/logout.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/studentStyle.css">
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileStudent.php'><font >".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font >Logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileStudent.php'><font >".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font >Logout</font></a></p>";
		?>

	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='studentHome.php'><font color='red'>Home</font></a></li>
						<li><a href="../php/logout.php"><font color="red">Logout</font></a></li>
					</ul>
				</td>
				<td>
					<form action="../php/studentProfileController.php" method="post" onsubmit="return validate()">
					<table cellpadding="10" cellspacing="0" border="0">
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
							$details = getstudentdetails($userid);
						?>
						<tr>
							<td>Student Id</td>
							<td>:</td>
							<td><?=$details['studentid']?></td>
						</tr>
						<tr>
							<td>Student Name</td>
							<td>:</td>
							<td><?=$details['name']?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?=$details['email']?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td><?=$details['gender']?></td>
						</tr>
						<tr>
							<td>Date Of Birth</td>
							<td>:</td>
							<td><?=$details['dob']?></td>
						</tr>
						<tr>
							<td>Course Id</td>
							<td>:</td>
							<td><?=$details['courseid']?></td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<a href="studentHome.php">
									<button type="button">
										Back
									</button>
								</a>
							</td>
						</tr>
					</table>
					<hr/>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>