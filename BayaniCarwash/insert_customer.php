<?php
	
	if(isset($_POST['customerEntry'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$middleName = $_POST['middleName'];
		$fullName = $firstName."_".$lastName;
		
		$tel = $_POST['telephoneNum'];
		$cell = $_POST['cellphoneNum'];
		$email = $_POST['email'];
		
		$firstName = stripslashes($firstName); // removes quotes/un-quote marks on string
		$lastName = stripslashes($lastName);
		$middleName = stripslashes($middleName);
		
		$tel = stripslashes($tel);
		$cell = stripslashes($cell);
		$email = stripslashes($email);
		
		$insert_cust = "INSERT INTO customers (lastname, firstname, middlename, tel_num, contact_num, email,fullname)
		VALUES('$lastName','$firstName','$middleName','$tel','$cell','$email','$fullName')";

		session_start();
		$_SESSION['customer'] = $insert_cust;
		$_SESSION['fullName']=$fullName;

		header("location: carforms.php");
		
		mysqli_close($connect);
	}else{
		header("location: customerform.php");
	}
?>