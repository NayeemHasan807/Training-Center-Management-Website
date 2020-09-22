<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/classDetailsService.php');


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
	<title>Class Details</title>
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
						<?php	
							echo "<li><a href='studentHome.php'><font color='red'>Home</font></a></li>";
							echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";	
						?>
					</ul>
				</td>
				<td rowspan="6">
					<fieldset>
					    <legend><b>Class Details</b></legend>
						<br/>
						
						<table cellspacing="0" cellpadding="5" border="1" width="100%">
	                        <tr>
	                       		<td>Course ID</td>
								<td>Course Name</td>
								<td>Trainer ID</td>
								<td>Trainer Name</td>
								<td>Seat Available</td>
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
			             	    $classDetails = classDetailsForCourse($userid);
							?>
							<tr>
								<td><?=$classDetails['courseid']?></td>
								<td><?=$classDetails['coursename']?></td>
								<td><?=$classDetails['trainerid']?></td>
								<td><?=$classDetails['name']?></td>
								<td><?=$classDetails['sitavailable']?></td>
							</tr>
							<tr>
								<td colspan="5">
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