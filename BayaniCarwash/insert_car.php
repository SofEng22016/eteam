<?php
	
	if(isset($_POST['carEntry'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		mysqli_select_db($dbName);
// 		session_start();

		$carManufacturer = $_POST['carManufacturer'];
		$carModel = $_POST['carModel'];
		$carColor = $_POST['carColor'];
		$fullName = $_COOKIE['fullName'];
		
		$carPlateNum = $_POST['carPlateNum'];
		$plateChecker = "SELECT * FROM cars WHERE plate_num = '$carPlateNum'";
		$check = mysqli_query($connect, $plateChecker);
		
		if(mysqli_num_rows($check)>0){
			$msg = "There is a plate number already registered.";
			header("location: carforms.php?msg=$msg");
		}else{
		
			$carManufacturer = stripslashes($carManufacturer); // removes quotes/un-quote marks on string
			$carModel = stripslashes($carModel);
			$carColor = stripslashes($carColor);
			
			$carPlateNum = stripslashes($carPlateNum);
			
			$carCheck = "SELECT * FROM cars WHERE plate_num = '$carPlateNum' AND fullname = '$fullName'";
			$result = mysqli_query($connect, $carCheck);
				
			if(mysqli_num_rows($result) > 0){
				setcookie('fullName', $fullName);
				setcookie('car', $carPlateNum);
			}else{
			
				$insert_car = "INSERT INTO cars (plate_num, color, manufacturer, model,fullname)
				VALUES('$carPlateNum','$carColor','$carManufacturer','$carModel','$fullName')";
		
		// 		$_SESSION['car'] = $insert_car;
				setcookie('car',$insert_car);
				setcookie('plate', $carPlateNum);
			}
			header("location: transaction.php");
	
			mysqli_close($connect);
		}
	}else{
		header("location: carforms.php");
	}
?>