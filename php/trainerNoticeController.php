<?php 
	//session_start();
	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/trainerNoticeService.php');


	//save notice
	if (isset($_POST['addnotice'])) 
	{
		$json = $_POST['addnotice'];
		$data = json_decode($json);
		$noticesubject = $data->noticesubject;
		$noticebody = trim($data->noticebody);
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		if(empty($noticebody) or empty($noticesubject))
		{
			echo "Fill all the information first!";
		}
		else
		{
			$count = getalltrainernoticecount();
			$savenotice = [
				'id' => $count+1,
				'userid' => $userid,
				'noticesubject' => $noticesubject,
				'noticebody' => $noticebody
			];

			$status = insertnotice($savenotice);
			if($status)
			{
				echo "Notice uploaded!";
			}
			else
			{
				echo "Database Error!";;
			}
		}
	}

	//update notice
	if (isset($_POST['updatenotice'])) 
	{
		$json = $_POST['updatenotice'];
		$data = json_decode($json);
		$id = $data->id;
		$noticesubject = $data->noticesubject;
		$noticebody = trim($data->noticebody);

		if(empty($noticesubject) or empty($noticebody))
		{
			echo "Fill all the information first!";
		}
		else
		{
			$updatenotice = [
				'id' => $id,
				'noticesubject' => $noticesubject,
				'noticebody' => $noticebody
			];

			$status = updatenotice($updatenotice);
			if($status)
			{
				echo "Notice updated!";
			}
			else
			{
				echo "Database Error!";
			}
		}
	}

	//delete notice
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$status = deletenotice($id);

		if($status){
			header('location: ../views/trainerViewNotice.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/trainerViewNotice.php');
	}

?>