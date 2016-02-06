<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customer Details Form</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <style>
  body {
 	 background-image: url("images/background3.jpg");
  }
  h1.title{
     text-align: center;
     font-family: serif;
  }
</style>
</head>
	<body class="bg">
<?php
	
	if(isset($_POST['customerEntry'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$middleName = $_POST['middleName'];
		
		$tel = $_POST['telephoneNum'];
		$cell = $_POST['cellphoneNum'];
		$email = $_POST['email'];
		
		$firstName = stripslashes($firstName); // removes quotes/un-quote marks on string
		$lastName = stripslashes($lastName);
		$middleName = stripslashes($middleName);
		
		$tel = stripslashes($tel);
		$cell = stripslashes($cell);
		$email = stripslashes($email);
		
		$insert = "INSERT INTO customers (lastname, firstname, middlename, tel_num, contact_num, email)
		VALUES('$lastName','$firstName','$middleName','$tel','$cell','$email')";
		
		mysqli_select_db($dbName);
		$retval = mysqli_query($connect,$insert);
		if($retval){
			header("location: carforms.php");
		}else{
			header("location: login.php");
		}
		mysqli_close($connect);
	}else{
		header("location: index.html");
	}
?>
</body>
</html>