<?php
	require_once('../php/sessionAndCookieHeader.php');
	
	if(!empty($_SESSION))
	{
		if($_SESSION['usertype']!="Admin")
		{
			header('location:../php/logout.php');
		}
	}
	else
	{
		if($_COOKIE['usertype']!="Admin")
		{
			header('location:../php/logout.php');
		}
	}

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}


?>

<!DOCTYPE html>
<head>
	<title>add finance</title>
	<script type="text/javascript" src="../assets/js/adminAddFinance.js"></script>
</head>
<fieldset>
    <p><h1><font color='green'>NSS Training Center</font></h1></p>
	<?php
	    if(!empty($_SESSION))
		{
			echo "<p align='right'><font color='black'> Logged in as </font><a href='viewProfileAdmin.php'><font color='red'>".$_SESSION['userid']."</font></a>|<a href = '../php/logout.php'><font color='red'>Logout</font></a></p>";
		}
		else
			echo "<p align='right'><font color='black'> Logged in as </font><a href='viewProfileAdmin.php'><font color='red'>".$_COOKIE['userid']."</font></a>|<a href = '../php/logout.php'><font color='red'>Logout</font></a></p>";
	?>
</fieldset>
<fieldset>
    <table cellspacing="0" cellpadding="5" width="100%" border="1">
	    <tr>
		    <td colspan="10">
			    Account<hr/>
				<ul>
				    <li><a href = "adminHome.php"><font color='red'>Home</font></a></li>
					<li><a href = "viewProfileAdmin.php"><font color='red'>View Profile</font></a></li>
					<li><a href = "editProfileAdmin.php"><font color='red'>Edit Profile</font></a></li>
					<li><a href = "changePassword.php"><font color='red'>Change Password</font></a></li>
					<li><a href = "userManage.php"><font color='red'>Manage Users</font></a></li>
					<li><a href = "courseManage.php"><font color='red'>Manage Courses</font></a></li>
					<li><a href = "adminMail.php"><font color='red'>Mail</font></a></li>
					<li><a href = "adminNotice.php"><font color='red'>Notice</font></a></li>
					<li><a href = "adminForms.php"><font color='red'>Forms</font></a></li>
					<li><a href = "financeManage.php"><font color='red'>Finance</font></a></li>
					<li><a href = "informations.php"><font color='red'>Informations</font></a></li>
					<li><a href = "../php/logout.php"><font color='red'>Logout</font></a></li>
				</ul>
			</td>
			<td>
			    <fieldset>
			    	<form>
						<legend><b>UPDATE FINANCE</b></legend>
						<table cellspacing="5">
							<tr>
								<td>Month</td>
								<td>:</td>
								<td>
									<select id="month" name="month" onclick="check1()">
										<option value="">None</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</td>
								<td id="show1"></td>
							</tr>
							<tr>
								<td>Year</td>
								<td>:</td>
								<td>
									<select id="year" name="year" onclick="check2()">
										<option value="">None</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
									</select>
								</td>
								<td id="show2"></td>
							</tr>
							<tr>
								<td>Trainers Salary</td>
								<td>:</td>
								<td><input type="text" id="trainerssalary" name="trainerssalary" onclick ="check3()"></td>
								<td id="show3"></td>
							</tr>
							<tr>
								<td>Student Fees</td>
								<td>:</td>
								<td><input type="text" id="studentfees" name="studentfees" onclick ="check4()"></td>
								<td id="show4"></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>
									<a href="financeManage.php">
										<button type="button">
											Back
										</button>
									</a>
									<input type="button" id="addfinance" name="addfinance" value="Add" onclick="validate()">
									<input type="reset" id="reset" name="reset" onclick="check1(),check2(),check3(),check4(),check5()">
								</td>
								<td id="show5"></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</td>
		</tr>
	</table>
</fieldset>