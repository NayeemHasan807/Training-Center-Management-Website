<?php

	require_once('../php/sessionAndCookieHeader.php');

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
	<title>Student Download Home</title>
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
						<ul>
						<li><a href='studentHome.php'><font color='red'>Home</font></a></li>
						<li><a href="../php/logout.php"><font color="red">Logout</font></a></li>
					</ul>
					</ul>
				</td>
				<td>
					<ul>
						<li><a href="studentDownloadForm.php"><font color='red'>Download Form</font></a></li>
						<li><a href='studentHome.php'><font color='red'>Back</font></a></li>
					</ul>
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>