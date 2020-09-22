<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerMailService.php');

	//save mail

	if (isset($_POST['addmail'])) 
	{
		$json = $_POST['addmail'];
		$data = json_decode($json);
		$mailsubject = $data->mailsubject;
		$towhom  = $data->towhom;
		$mailbody = trim($data->mailbody);
		
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		if(empty($mailbody) or empty($mailsubject) or empty($towhom))
		{
			echo "null error";
		}
		else
		{
			$count = getalltrainermailcount();
			$savemail = [
				'id' => $count+1,
				'userid' => $userid,
				'towhom' => $towhom,
				'mailsubject' => $mailsubject,
				'mailbody' => $mailbody
			];

			$status = insertmail($savemail);
			if($status)
			{
				echo "Mail Sent";
			}
			else
			{
				echo "Database error";
			}
		}
	}

	//update mail
	if (isset($_POST['updatemail'])) 
	{
		$json = $_POST['updatemail'];
		$data = json_decode($json);
		$id = $data->id;
		$mailsubject = $data->mailsubject;
		$towhom  = $data->towhom;
		$mailbody = trim($data->mailbody);

		if(empty($mailbody) or empty($mailsubject) or empty($towhom))
		{
			echo "null submission";
		}
		else
		{
			$updatemail = [
				'id' => $id,
				'mailsubject' => $mailsubject,
				'towhom' => $towhom,
				'mailbody' => $mailbody
			];

			$status = updatemail($updatemail);
			if($status)
			{
				echo "Mail Updated";
			}
			else
			{
				echo "Database Error";;
			}
		}
	}
	
	//delete mail
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$status = deletemail($id);

		if($status){
			header('location: ../views/trainerViewMail.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/trainerViewMail.php');
	}

?>