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
	<script type="text/javascript" src="../assets/js/editProfileStudent.js"></script>
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
							<td><input type="text" id="studentid" name="studentid" value="<?=$details['studentid']?>" disabled></td>
							<td></td>
						</tr>
						<tr>
							<td>Student Name</td>
							<td>:</td>
							<td><input type="text" name="name" value="<?=$details['name']?>" onclick="clicks1()"></td>
							<td id="show1"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="text" name="email" value="<?=$details['email']?>" onclick="clicks2()"></td>
							<td id="show2"></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>
								<input type="radio" name="gender" id="male" value="Male" onclick="clicks3()">Male
							  	<input type="radio" name="gender" id="female" value="Female" onclick="clicks3()">Female
							   	<input type="radio" name="gender" id="other" value="Others" onclick="clicks3()">Other
							</td>
							<td id="show3"></td>
						</tr>
						<tr>
							<td>Date Of Birth</td>
							<td>:</td>
							<td><input type="text" name="dob" value="<?=$details['dob']?>" onclick="clicks4()"></td>
							<td id="show4"></td>
						</tr>
						<tr>
							<td>Course Id</td>
							<td>:</td>
							<td><input type="text" name="courseid" value="<?=$details['courseid']?>" disabled></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" align="left">
								<a href="studentHome.php">
									<button type="button">
										Back
									</button>
								</a>
								<input type="hidden" name="id" value="<?=$details['studentid']?>">
								<input type="submit" id="update" name="update" value="Update">
							</td>
							<td id="output"></td>
						</tr>
					</table>
					</form>
					<hr/>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>