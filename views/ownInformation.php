<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/ownInformationService.php');


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
	<title>Own Information</title>
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
						<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>
					</ul>
				</td>
				<td rowspan="6">
					<fieldset>
					    <legend><b>Own Information</b></legend>
						<br/>
						<table cellspacing="0" cellpadding="5" border="0">
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
			             	    $owninfo = OwnInformation($userid);
							?>
							<tr>
								<td>Student Id</td>
								<td>:</td>
								<td><?=$owninfo['studentid']?></td>
							</tr>
							<tr>
								<td>Student Name</td>
								<td>:</td>
								<td><?=$owninfo['studentname']?></td>
							</tr>
							<tr>
								<td>Course ID</td>
								<td>:</td>
								<td><?=$owninfo['courseid']?></td>
							</tr>
							<tr>
								<td>Course Name</td>
								<td>:</td>
								<td><?=$owninfo['coursename']?></td>
							</tr>
							<tr>
								<td>Traier Id</td>
								<td>:</td>
								<td><?=$owninfo['trainerid']?></td>

							</tr>
							<tr>
								<td>Trainer Name</td>
								<td>:</td>
								<td><?=$owninfo['trainername']?></td>
							</tr>
							<tr>
								<td colspan="6">
									<a href="studentHome.php">
										<button type="button">
											Back
										</button>
									</a>
								</td>
							</tr>
		                </table>
		            </fieldset>    
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>