<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminProfileService.php');

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

	if (isset($_GET['error'])) 
	{
		if ($_GET['error']=="null") 
		{
			echo "null error";
		}
		elseif ($_GET['error']=="db") 
		{
			echo "database error";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<script type="text/javascript" src="../assets/js/editProfileAdmin.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/adminStyle.css">
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileAdmin.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileAdmin.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
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
					<form action="../php/adminProfileController.php" method="post" onsubmit="return validate()">
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
								$details = getadmindetails($userid);
							?>
							<tr>
								<td>Admin Id</td>
								<td>:</td>
								<td><input id="id" type="text" name="id" value="<?=$details['adminid']?>" disabled></td>
								<td id="show0"></td>
							</tr>
							<tr>
								<td>Admin Name</td>
								<td>:</td>
								<td><input id="name" type="text" name="name" value="<?=$details['name']?>" onclick="clicks1()"></td>
								<td id="show1"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><input id="email" type="text" name="email" value="<?=$details['email']?>" onclick="clicks2()"></td>
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
								<td><input id="dob" type="text" name="dob" value="<?=$details['dob']?>" onclick="clicks4()">  [dd/mm/yyyy]</td> 
								<td id="show4"></td>
							</tr>
							<tr>
								<td colspan="3" align="left">
									<a href="adminHome.php">
										<button type="button">
											Back
										</button>
									</a>
									<input type="submit" id="update" name="update" value="Update">
								</td>
								<td id="output"></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>