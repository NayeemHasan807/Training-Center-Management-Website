<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerProfileService.php');

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
	<script type="text/javascript" src="../assets/js/editProfileTrainer.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/trainerStyle.css">
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font >".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font >logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font >".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font >logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='trainerHome.php'><font >Home</font></a></li>
						<li><a href="viewProfileTrainer.php"><font >View Profile</font></a></li>
						<li><a href="editProfileTrainer.php"><font >Edit Profile</font></a></li>
						<li><a href="changePassword.php"><font >Change Password</font></a></li>
						<li><a href="trainerFile.php"><font >Files</font></a></li>
						<li><a href="trainerNotice.php"><font >Notices</font></a></li>
						<li><a href="studentMarks.php"><font >Student Marks</font></a></li>
						<li><a href="trainerMail.php"><font >Mails</font></a></li>
						<li><a href="trainerAssignment.php"><font >Assignments</font></a></li>
						<li><a href="trainerViewClasstime.php"><font >View Class Times</font></a></li>
						<li><a href="trainerAttendance.php"><font >Upload Attendance</font></a></li>
						<li><a href="../php/logout.php"><font >Logout</font></a></li>
					</ul>
				</td>
				<td>
					<form action="../php/trainerProfileController.php" method="post" onsubmit="return validate()">
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
								$details = gettrainerdetails($userid);
							?>
							<tr>
								<td>Trainer Id</td>
								<td>:</td>
								<td><input id="id" type="text" name="id" value="<?=$details['trainerid']?>" disabled></td>
								<td id="show0"></td>
							</tr>
							<tr>
								<td>Trainer Name</td>
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
								<td>Phone No</td>
								<td>:</td>
								<td><input id="phoneno" type="text" name="phoneno" value="<?=$details['phoneno']?>" onclick="clicks5()"></td>
								<td id="show5"></td>
							</tr>
							<tr>
								<td>Address</td>
								<td>:</td>
								<td><input id="address" type="text" name="address" value="<?=$details['address']?>" onclick="clicks6()"></td>
								<td id="show6"></td>
							</tr>
							<tr>
								<td colspan="3" align="left">
									<a href="trainerHome.php">
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