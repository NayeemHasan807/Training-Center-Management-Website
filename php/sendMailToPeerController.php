<?php 
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/sendMailToPeerService.php');


	//add mail
	if (isset($_POST['addmail'])) 
	{
		$json = $_POST['addmail'];
		$data = json_decode($json);
		$towhom = $data->towhom;
		$subject = $data->subject;
		$body = trim($data->body);
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		if(empty($body) or empty($subject) or empty($towhom))
		{
			echo "Cant be empty";
		}
		else
		{
			$check = getpeeridbyid($towhom);
			$count = count($check);
			if ($count != 0) 
			{
				if($check['0']['studentid']!=$userid)
				{
					$count = getallmailcount();
					$savemail = [
						'id' => $count+1,
						'userid' => $userid,
						'towhom' => $towhom,
						'subject' => $subject,
						'body' => $body
					];

					$status = insertmail($savemail);
					if($status)
					{
						echo "mail send";
					}
					else
					{
						echo "database error";
					}
				}
				else
				{
					echo "you cant send mail to yourself";
				}
			}
			else
			{
				echo "invalid reciver id";
			}
			
		}
	}