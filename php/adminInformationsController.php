<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminInformationsService.php');

	if (isset($_POST['addinformations'])) 
	{
		$json = $_POST['addinformations'];
		$data = json_decode($json);
		$informationname = $data->informationname;
		$informationbody = trim($data->informationbody);
		if(!empty($_SESSION['userid']))
		{
			$userid = $_SESSION['userid'];
		}
		else
		{
			$userid = $_COOKIE['userid'];
		}
		
		if(empty($informationbody) or empty($informationname))
		{
			echo "Fill all the blank areas first!";
		}
		else
		{
			$count = getalladmininformationscount();
			$saveinformations = [
				'id' => $count+1,
				'userid' => $userid,
				'informationname' => $informationname,
				'informationbody' => $informationbody
			];

			$status = insertinformations($saveinformations);
			if($status)
			{
				echo "Information uploaded!";
			}
			else
			{
				echo "Database Error!";;
			}
		}
	}
?>