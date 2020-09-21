<?php 

	require_once('../php/sessionAndCookieHeader.php');
	require_once('../service/adminFinanceService.php');

	if (isset($_POST['addfinance'])) 
	{
		$json = $_POST['addfinance'];
		$data = json_decode($json);
		$month = $data->month;
		$year = $data->year;
		$trainerssalary = $data->trainerssalary;
		$studentfees = $data->studentfees;
		
		if(empty($year) or empty($month) or empty($trainerssalary) or empty($studentfees))
		{
			echo "Fill all the information first!";
		}
		else
		{
			$count = getalladminfinancecount();
			$savefinance = [
				'id' => $count+1,
				'month' => $month,
				'year' => $year,
				'trainerssalary' => $trainerssalary,
				'studentfees' => $studentfees
			];

			$status = insertfinance($savefinance);
			if($status)
			{
				echo "finance uploaded!";
			}
			else
			{
				echo "Database Error!";;
			}
		}
	}

?>