<?php
	
	if(isset($_POST['transact'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
//		dont erease the comments below THANKS!
		
// 		session_start();
// 		mysqli_select_db($dbName);
// 		$insertCust = mysqli_query($connect, $_SESSION['customer']);
// 		$insertCar = mysqli_query($connect, $_SESSION['car']);
		
		header("location: index.html");

		mysqli_close($connect);
	}else{
		header("location: transaction.php");
	}
?>