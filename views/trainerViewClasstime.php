<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerViewService.php');

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
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Classtime</title>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileTrainer.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<li><a href='trainerHome.php'><font color='red'>Home</font></a></li>
						<li><a href="viewProfileTrainer.php"><font color="red">View Profile</font></a></li>
						<li><a href="editProfileTrainer.php"><font color="red">Edit Profile</font></a></li>
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
				<td align="Center">
					<table border="1" width="100%" cellspacing="0" cellpadding="5">
						<tr>
							<td>Coursename</td>
							<td>Saturday</td>
							<td>Sunday</td>
							<td>Monday</td>
							<td>Tuesday</td>
							<td>Wednesday</td>
							<td>Thursday</td>
							<td>Friday</td>
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
							$details = getallclasstimedetailsbyuserid($userid);
							for ($i=0; $i != count($details); $i++)
							{
						?>
						<tr>
							<td><?=$details[$i]['coursename']?></td>
							<?php
								if ($details[$i]['courseday']=='Saturday') 
								{
									echo "<td>{$details[$i]['coursetime']}</td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
								}
								elseif ($details[$i]['courseday']=='Sunday') 
								{
									echo "<td></td>";
									echo "<td>{$details[$i]['coursetime']}</td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
								}
								elseif ($details[$i]['courseday']=='Monday') 
								{
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>{$details[$i]['coursetime']}</td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
								}
								elseif ($details[$i]['courseday']=='Tuesday') 
								{
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>{$details[$i]['coursetime']}</td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
								}
								elseif ($details[$i]['courseday']=='Wednesday') 
								{
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>{$details[$i]['coursetime']}</td>";
									echo "<td></td>";
									echo "<td></td>";
								}
								elseif ($details[$i]['courseday']=='Thursday') 
								{
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>{$details[$i]['coursetime']}</td>";
									echo "<td></td>";
								}
								else 
								{
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>{$details[$i]['coursetime']}</td>";
								}
							?>
						</tr>

						<?php 
							} 
						?>
						<tr>
							<td colspan="8" align="left">
								<a href="trainerHome.php">
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