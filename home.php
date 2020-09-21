<?php
	if (isset($_COOKIE['status']))
	{
		if ($_COOKIE['usertype']=="Admin") 
		{
			header('location:views/adminHome.php');
		}
		elseif ($_COOKIE['usertype']=="Student") 
		{
			header('location:views/studentHome.php');
		}
		else
			header('location:views/trainerHome.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NSS Home</title>
</head>
<body>
	<table height="300" width="400" align="center" border="1" cellpadding="1" cellspacing="0">
		<tr>
			<td colspan="2" align="center"><h1><font color="green">NSS Training Center</font></h1></td>
		</tr>
		<tr>
			<td rowspan="2" align="center">
				<h3>Welcome To Our Website!</h3>
			</td>
			<td rowspan="2">
				<ul>
					<li><a href="views/login.php"><font color="red">Login</font></a></li>
				</ul>
			</td>
		</tr>		
	</table>
</body>
</html>