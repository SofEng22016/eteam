<?php
	
	if(isset($_POST['carEntry'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
		$carManufacturer = $_POST['carManufacturer'];
		$carModel = $_POST['carModel'];
		$carColor = $_POST['carColor'];
		
		$carPlateNum = $_POST['carPlateNum'];
		
		$carManufacturer = stripslashes($carManufacturer); // removes quotes/un-quote marks on string
		$carModel = stripslashes($carModel);
		$carColor = stripslashes($carColor);
		
		$carPlateNum = stripslashes($carPlateNum);
		
		$insert_car = "INSERT INTO cars (plate_num, color, manufacturer, model)
		VALUES('$carPlateNum','$carColor','$carManufacturer','$carModel')";

		session_start();
		$_SESSION['car'] = $insert_car;
		
		header("location: transaction.php");

		mysqli_close($connect);
	}else{
		header("location: carforms.php");
	}
?>