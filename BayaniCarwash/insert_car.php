<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Car Details Form</title>
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
		
		$insert = "INSERT INTO cars (plate_num, color, manufacturer, model)
		VALUES('$carPlateNum','$carColor','$carManufacturer','$carModel')";
		
		mysqli_select_db($dbName);
		$retval = mysqli_query($connect,$insert);
		if($retval){
			header("location: index.html");
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