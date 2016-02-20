<?php
	
	if(isset($_POST['transact'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
		session_start();
		$payment = $_POST['payment'];
		if($payment < 0){
			$msg="Invalid Payment.";
			header("location: transaction.php?msg=$msg");
		}else{
			if(isset($_SESSION['customer']) && isset($_SESSION['car'])){
		
				mysqli_select_db($dbName);
				$insertCust = mysqli_query($connect, $_SESSION['customer']);
				$insertCar = mysqli_query($connect, $_SESSION['car']);
				$fullName = $_SESSION['fullName'];
				$temp = "INSERT INTO records (cust_id, car_id) SELECT customers.id, cars.id FROM customers INNER JOIN cars ON customers.fullname = cars.fullname WHERE customers.fullname = '$fullName'";
				$mergeTables = mysqli_query($connect, $temp);
		
				$servicesChosen = $_POST['Name'];
				
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
				
				if($payment < $total){
					$msg="Invalid Payment.";
					header("location: transaction.php?msg=$msg");
				}
				else{
					$change = ($payment - $total);
					
					$insert_transaction="INSERT INTO transactions(service_id, record_id, total_amount, payment, change_) VALUES ('$services','$recordId','$total', '$payment','$change')";
			
					mysqli_query($connect,  $insert_transaction);
					header("location: index.html");
					
					mysqli_close($connect);
					session_destroy();
				}
			}else if(!isset($_SESSION['customer'])){
				$msg="No Customer details found.";
				header("location: transaction.php?msg=$msg");
			}else if(!isset($_SESSION['car'])){
				$msg="No Car details found.";
				header("location: transaction.php?msg=$msg");
			}
		}
	}else{
		header("location: transaction.php");
	}
?>