<?php
	
	if(isset($_POST['carEntry'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
		session_start();

		$carManufacturer = $_POST['carManufacturer'];
		$carModel = $_POST['carModel'];
		$carColor = $_POST['carColor'];
		$fullName = $_SESSION['fullName'];
		
		$carPlateNum = $_POST['carPlateNum'];
		
		$carManufacturer = stripslashes($carManufacturer); // removes quotes/un-quote marks on string
		$carModel = stripslashes($carModel);
		$carColor = stripslashes($carColor);
		
		$carPlateNum = stripslashes($carPlateNum);
		
		$insert_car = "INSERT INTO cars (plate_num, color, manufacturer, model,fullname)
		VALUES('$carPlateNum','$carColor','$carManufacturer','$carModel','$fullName')";

		$_SESSION['car'] = $insert_car;
		
		header("location: transaction.php");

		mysqli_close($connect);
	}else{
		header("location: carforms.php");
	}
?>