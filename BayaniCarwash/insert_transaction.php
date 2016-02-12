<?php
	
	if(isset($_POST['transact'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
//		dont erease the comments below THANKS!
		
// 		session_start();
// 		mysqli_select_db($dbName);
// 		$insertCust = mysqli_query($connect, $_SESSION['customer']);
// 		$insertCar = mysqli_query($connect, $_SESSION['car']);
// 		$fullName = $_SESSION['fullName'];
// 		$temp = "INSERT INTO records (cust_id, car_id) SELECT customers.id, cars.id FROM customers INNER JOIN cars ON customers.fullname = cars.fullname WHERE customers.fullname = '$fullName'";
// 		$mergeTables = mysqli_query($connect, $temp);

		//The code below has not been tested so it may or may not produce any error.
		$servicesChosen = array(); //This is where the data from the checkboxes would be inserted.
		$serviceValue = "";
		$index = 0;
		if(count($_POST['Name']) > 0) {
			//The condition above checks if the Name[] has values in them.
			foreach ($_POST['Name'] as $serviceValue) {
			$servicesChosen = array_fill($index, 1, $serviceValue );
			//The above translates to : insert into servicesChosen[] the value of the Name[] at this certain
			//index. After insertion, the index value is incremented so that it moves to a new slot.
			$index++;
			}
		}
		
		$payment = $_POST['payment'];
		$insert_transaction = "INSERT INTO (<insert here the variables.>)VALUES(<insert here the variables.>)";
		//I don't really know what order the variables are arranged so I left them blank. 
		session_start();
		$_SESSION['transaction'] = $insert_transaction;
		
		session_destroy();
		header("location: index.html");
		
		mysqli_close($connect);
	}else{
		header("location: transaction.php");
	}
?>