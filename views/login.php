<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'null_value'){
			echo "Username/Password field can't left empty...";
		}

		if($_GET['error'] == 'invalid_user'){
			echo "Invalid username or Password";
		}

		if($_GET['error'] == 'invalid_request'){
			echo "Unauthorized access detected!!Please login again.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../assets/js/login.js"></script>
</head>
<body>
	<form action="../php/logCheck.php" method="POST" onsubmit="return validate()">
		<table height="300" width="400" align="center" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td colspan="3" align="center">
					<font color="green"><h1>Login</h1>For<h4>NSS Training Center</h4></font>
				</td>
			</tr>
			<tr>
				<td width="30%">User Id:</td>
				<td width="50%">
					<input type="text" id="userid" name="userid" onclick="click1()">
				</td>
				<td id="show1"></td>
			</tr>
			<tr>
				<td width="30%">Password:</td>
				<td width="50%">
					<input type="password" id="password" name="password" onclick="click2()">
					<br/>
					<input type="checkbox" name="rememberme">Remember Me
				</td>
				<td id="show2"></td>
			</tr>
			<tr>
				<td colspan="3" align="right">
					<a href="../home.php">
						<button type="button">
							Go To Home
						</button>
					</a>
					<input type="Submit" name="login" value="Login">
					<input type="Reset" name="reset" value="Reset" onclick="click1(),click2()">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>