<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/userService.php');

	if(isset($_POST['change']))
	{
		$json = $_POST['change'];
		$data = json_decode($json);
		$password = $data->password;
		$newpassword = $data->newpassword;
		$renewpassword = $data->renewpassword;
		
		if($password!="" and $newpassword!="" and $renewpassword!="")
		{
			if(!empty($_SESSION))
			{
				if($_SESSION['password']==$password)
				{
					if($newpassword==$renewpassword)
					{
						$conformation = changepass($_SESSION['userid'],$newpassword);
						if ($conformation=="done") 
						{
							$_SESSION['password']=$newpassword;
							echo "Password changed!";
						}
						else
							echo "something went wrong please try again";

					}
					else
						echo "New Password And Retype New Password Must Need To Be Same!";

				}
				else
					echo "Current Password is Wrong!";

			}
			else
			{
				if($_COOKIE['password']==md5($password))
				{
					if($newpassword==$renewpassword)
					{
						$conformation = changepass($_COOKIE['userid'],$newpassword);
						if ($conformation=="done") 
						{
							setcookie('password',md5($newpassword),time()+10000,'/');
							echo "Password changed!";	
						}
						else
							echo "something went wrong please try again";
					}
					else
						echo "New Password And Retype New Password Must Need To Be Same!";

				}
				else
					echo "Current Password is Wrong!";
			}
		}
		else
			echo "Fill All The Info First";
	}

?>