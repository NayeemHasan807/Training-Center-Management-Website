<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminNoticeService.php');

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
			$count = getalladminnoticecount();
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


	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$status = deletenotice($id);

		if($status){
			header('location: ../views/adminViewAllNotice.php?success=done');
		}
	}
	elseif(isset($_POST['no'])){
		header('location: ../views/adminViewAllNotice.php');
	}

?>