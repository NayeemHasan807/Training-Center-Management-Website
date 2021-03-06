<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/marksService.php');


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
	<title>Student Marks</title>
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
							if(!empty($_SESSION))
							{
								echo "<li><a href='studentHome.php'><font color='red'>Home</font></a></li>";
								echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";	
							}
							else
							{
								echo "<li><a href='studentHome.php'><font color='red'>Home</font></a></li>";
								echo "<li><a href='../php/logout.php'><font color='red'>Logout</font></a></li>";	
							}
								
						?>
					</ul>
				</td>
				<td rowspan="6">
					<fieldset>
					    <legend><b>Student Marks</b></legend>
						<br/>
						<table cellspacing="0" cellpadding="5" border="1" width="100%">
	                        <tr>
	                        	<td>Course Name</td>
	                       		<td>Marks</td>
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
			             	    $mark = getmarks($userid);
								for ($i=0; $i != count($mark); $i++) {  ?>
							<tr>
								<td><?=$mark[$i]['coursename']?></td>
								<td><?=$mark[$i]['marks']?></td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="3">
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