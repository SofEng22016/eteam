<?php
	
	if(isset($_POST['transact'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
//		dont erease the comments below THANKS!
		
		session_start();
		mysqli_select_db($dbName);
		$insertCust = mysqli_query($connect, $_SESSION['customer']);
		$insertCar = mysqli_query($connect, $_SESSION['car']);
		$fullName = $_SESSION['fullName'];
		$temp = "INSERT INTO records (cust_id, car_id) SELECT customers.id, cars.id FROM customers INNER JOIN cars ON customers.fullname = cars.fullname WHERE customers.fullname = '$fullName'";
		$mergeTables = mysqli_query($connect, $temp);

		//The code below has not been tested so it may or may not produce any error.
		$servicesChosen = $_POST['Name'];//array(); //This is where the data from the checkboxes would be inserted.
// 		$serviceValue = "";
// 		if(count($_POST['Name']) > 0) {
// 			//The condition above checks if the Name[] has values in them.
// 			$index = 0;
// 			foreach ($_POST['Name'] as $servicesChosen) {
// 				$servicesChosen[] ;
// // 			$servicesChosen = array_fill($index, 1, $serviceValue );
// 			//The above translates to : insert into servicesChosen[] the value of the Name[] at this certain
// 			//index. After insertion, the index value is incremented so that it moves to a new slot.
// // 			$index++;
// 			}
// 		}
		
		$services="";
		for($index = 0;$index < count($servicesChosen); $index++){
			$temp2 = "SELECT services.id FROM services WHERE services.service_name = '$servicesChosen[$index]'";
			$selection = mysqli_query($connect, $temp2);
			
			$output = mysqli_fetch_assoc($selection);
			if($services == ""){
				$services = $services.$output['id'];
			}else{
				$services = $services.", ".$output['id'];
			}
			
		}
		
		$select_customer_car = "SELECT customers.id, cars.id FROM customers INNER JOIN cars ON customers.fullname = cars.fullname WHERE customers.fullname = '$fullName'";
		$sample2 = mysqli_query($connect, $select_customer_car);
		$temp3 = mysqli_fetch_assoc($sample2);
		$customerId = $temp3['id'];
		$carId = $temp3['id'];
		
		$select_record = "SELECT records.id FROM records WHERE records.cust_id = '$customerId' AND records.car_id = '$carId'";
		$select = mysqli_query($connect, $select_record);
		$records = mysqli_fetch_assoc($select);
		$recordId = $records['id'];
		
		$total=0;
		for($index = 0;$index < count($servicesChosen); $index++){
			$int = "SELECT services.price FROM services WHERE services.service_name = '$servicesChosen[$index]'";
			$selection2 = mysqli_query($connect, $int);
				
			$output2 = mysqli_fetch_assoc($selection2);
			
			$total = ($total + $output2['price']);
				
		}
		
		$payment = $_POST['payment'];
		
		$change = ($payment - $total);
		
		$insert_transaction="INSERT INTO transactions(service_id, record_id, total_amount, payment, change_) VALUES ('$services','$recordId','$total', '$payment','$change')";

		mysqli_query($connect,  $insert_transaction);
		header("location: index.html");
		
		mysqli_close($connect);
		session_destroy();
	}else{
		header("location: transaction.php");
	}
?>