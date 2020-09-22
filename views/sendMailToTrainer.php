<?php

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/sendMailToTrainerService.php');


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
		elseif ($_GET['error'] == 'to_error') {
			echo "Wrong TrainerId!!!...";
		}
	}

	if (isset($_GET['success'])) 
	{
		if ($_GET['success']  == 'done') {
			echo "Mail Sent.";	
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Send Mail To Trainer</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/studentStyle.css">
	<script type="text/javascript" src="../assets/js/sendMailToTrainer.js"></script>
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
					    <legend><b>Send Mail To Trainer</b></legend>
						<form action="../php/sendMailToTrainerController.php" method="POST">
							<br/>
							<table>
								<tr>
									<td width="10%">To</td>
									<td>:</td>
									<td>
										<input type="text" id="towhom" name="towhom" onclick="click1()">
									</td>
									<td id="show1"></td>
								</tr>
								<tr>
									<td width="10%">Subject</td>
									<td>:</td>
									<td>
										<input type="text" id="subject" name="subject" onclick="click2()">
									</td>
									<td id="show2"></td>
								</tr>
								<tr>
									<td width="10%">Body</td>
									<td>:</td>
									<td>
										<textarea rows="5" cols="60" id="body" name="body" onclick="click2()"></textarea>
									</td>
									<td id="show3"></td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="button" id="addmail" name="addmail" value="sent" onclick="click1(),click2(),click3(),validate()">
									    <a href="studentHome.php">
										    <button type="button">Back</button>
									    </a>
								    </td>
								    <td id="output"></td>
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