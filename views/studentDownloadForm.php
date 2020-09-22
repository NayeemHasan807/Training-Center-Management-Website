<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/downloadFormService.php');

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
	<title>Download Assignment</title>
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
				<td align="Center">
					<table border="1" width="100%" cellspacing="0" cellpadding="5">
						<tr>
							<td>Form Name</td>
							<td>Form</td>
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
							$forms = getallformbyuserid($userid);
							for ($i=0; $i != count($forms); $i++)
							{
						?>
						<tr>
							<td><?=$forms[$i]['formname']?></td>
							<td>
								<a href="<?=$forms[$i]['form']?>">Download Link</a>
							</td>
						</tr>
						<?php 
							} 
						?>
						<tr>
							<td colspan="3" align="left">
								<a href="downloadForm.php">
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