<?php

	require_once('../php/sessionAndCookieHeader.php');

	if(isset($_GET['message'])) 
	{
		if($_GET['message']=="done")
		{
			echo "password changed";	
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<script type="text/javascript" src="../assets/js/changePassword.js"></script>
</head>
<body>
	<fieldset>
		<p><h1><font color='green'>NSS Training Center</font></h1></p>
		<?php
			if(!empty($_SESSION))
			{
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileStudent.php'><font color='red'>".$_SESSION['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>Logout</font></a></p>";
			}
			else
				echo "<p align='right'><font color='black'>Logged in as </font><a href='viewProfileStudent.php'><font color='red'>".$_COOKIE['userid']."</font></a> | <a href='../php/logout.php'><font color='red'>Logout</font></a></p>";
		?>
	</fieldset>
	<fieldset>
		<table cellspacing="0" cellpadding="5" border="1" width="100%">
			<tr>
				<td colspan="10">
					<ul>
						<?php
							if(!empty($_SESSION))
							{
								if($_SESSION['usertype']=="Trainer")
								{
									echo "<li><a href='trainerHome.php'><font color='red'>Home</font></a></li>";
									echo "<li><a href='viewProfileStudent.php'><font color='red'>View Profile</font></a></li>";
									echo "<li><a href='editProfileStudent.php'><font color='red'>Edit Profile</font></a></li>";
									echo "<li><a href='changePassword.php'><font color='red'>Change Password</font></a></li>";
									echo "<li><a href='trainerFile.php'><font color='red'>Files</font></a></li>";
									echo "<li><a href='trainerNotice.php'><font color='red'>Notices</font></a></li>";
									echo "<li><a href='studentMarks.php'><font color='red'>Student Marks</font></a></li>";
									echo "<li><a href='trainerMail.php'><font color='red'>Send Mail</font></a></li>";
									echo "<li><a href='trainerAssignment.php'><font color='red'>Assignments</font></a></li>";
									echo "<li><a href='trainerViewClasstime.php'><font color='red'>View Class Times</font></a></li>";
									echo "<li><a href='trainerAttendance.php'><font color='red'>Upload Attendance</font></a></li>";
									echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";

								}
								elseif($_SESSION['usertype']=="Student")
								{
									echo "<li><a href='studentHome.php'><font color='red'>Home</font></a></li>";
									echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";
								}
								else
								{
									echo "<li><a href='adminHome.php'><font color='red'>Home</font></a></li>";
									echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";
								}
							}
							else
							{
								if($_COOKIE['usertype']=="Trainer")
								{
									echo "<li><a href='trainerHome.php'><font color='red'>Home</font></a></li>";
									echo "<li><a href='viewProfileStudent.php'><font color='red'>View Profile</font></a></li>";
									echo "<li><a href='editProfileStudent.php'><font color='red'>Edit Profile</font></a></li>";
									echo "<li><a href='changePassword.php'><font color='red'>Change Password</font></a></li>";
									echo "<li><a href='trainerFile.php'><font color='red'>Files</font></a></li>";
									echo "<li><a href='trainerNotice.php'><font color='red'>Notices</font></a></li>";
									echo "<li><a href='StudentMarks.php'><font color='red'>Student Marks</font></a></li>";
									echo "<li><a href='trainerMail.php'><font color='red'>Send Mail</font></a></li>";
									echo "<li><a href='trainerAssignment.php'><font color='red'>Assignments</font></a></li>";
									echo "<li><a href='ClassTimes.php'><font color='red'>Class Times</font></a></li>";
									echo "<li><a href='Attendence.php'><font color='red'>Attendence</font></a></li>";
									echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";
								}
								elseif($_COOKIE['usertype']=="Student")
								{
									echo "<li><a href='studentHome.php'><font color='red'>Home</font></a></li>";
									echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";
								}
								else
								{
									echo "<li><a href='adminHome.php'><font color='red'>Home</font></a></li>";
									echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";
								}
							}
								
						?>
					</ul>
				</td>
				<td>
					<form id="myform">
						<table width="100%">
                            <tr>
                                <td width="20%"><font size="3">Current Password</font></td>
                                <td>:</td>
                                <td>
                                	<input type="password" id="password" name="password" onclick="click1()">
                                </td>
                                <td id="show1"></td>
                            </tr>
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td><font size="3" color="green">New Password</font></td>
                                <td>:</td>
                                <td>
                                	<input type="password" id="newpassword" name="newpassword" onclick="click2()">
                                </td>
                                <td id="show2"></td>
                            </tr>
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
                                <td><font size="3" color="red" >Retype New Password</font></td>
                                <td>:</td>
                                <td>
                                	<input type="password" id="renewpassword" name="renewpassword" onclick="click3()">
                                </td>
                                <td id="show3"></td>
                            </tr>
                            <tr><td colspan="4"><hr/></td></tr>
                            <tr>
								<td colspan="3" align="left" >
									<input type="button" id="change" name="change" value="Change" onclick="validate()">
									<input type="Reset" id="clear" name="clear" value="Clear" onclick="click1(),click2(),click3(),click4()">
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