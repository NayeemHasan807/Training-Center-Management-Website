<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminMailService.php');

	if (isset($_POST['addmail'])) 
	{
		$json = $_POST['addmail'];
		$data = json_decode($json);
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
		
		if(empty($body) or empty($subject))
		{
			echo "Fill all the information first!";
		}
		else
		{
			$count = getalladminmailcount();
			$savemail = [
				'id' => $count+1,
				'userid' => $userid,
				'subject' => $subject,
				'body' => $body
			];

			$status = insertmail($savemail);
			if($status)
			{
				echo "Mail send!";
			}
			else
			{
				echo "Database Error!";;
			}
		}
	}
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$status = deletemail($id);

		if($status){
			header('location: ../views/adminViewAllMail.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/adminViewAllMail.php');
	}
?>