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

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
		elseif ($_GET['error'] == 'null_error') {
			echo "null submission...please try again";
		}
		elseif ($_GET['error'] == 'file_error') {
			echo "dont support this file type";
		}
	}

	if (isset($_GET['success'])) {
		
		if($_GET['success'] == 'done'){
			echo "CV File Uploaded";
		}
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload CV</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/studentStyle.css">
	<script type="text/javascript" src="../assets/js/applyForJobHome.js"></script>
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
				<td rowspan="6">
					<fieldset>
						<form action="../php/applyForJobController.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
					    <legend><b>Upload CV</b></legend>
						<br/>
						<table cellspacing="0" cellpadding="5" border="1" width="100%">
							<tr>
								<td width="20%">Upload CV :</td>
								<td>
									<input type="file" id="cv" name="cv" onclick="click1()">
								</td>
								<td id="show1"></td>
							</tr>
							<tr>
								<td width="20%" colspan="3">
									<input type="submit" name="uploadcv" value="Upload">
									<a href="studentHome.php">
									<button type="button">Back</button>
								    </a>
								</td>
							</tr>
						</tr>
						</table>
						</form>
					</fieldset>		
				</td>
			</tr>
		</table>
	</fieldset>
</body>
</html>