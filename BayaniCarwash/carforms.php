<!DOCTYPE html>
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
<body class = "bg">
<?php
$insert_car = <<<EOD
	
  	<div class="container">
		<div class="well well-lg">
  	<form method="POST" action="insert_car.php" role="form">
   
   	<div class="form-group">
   	<label>Car Details:</label>
    <input type="text" class="form-control" id="carManufacturer" name="carManufacturer"
    	placeholder="Enter Car's Manufacturer" required="required">
    <input type="text" class="form-control" id="carModel" name="carModel"
    	placeholder="Enter Car's Model Name" required="required">
    <input type="text" class="form-control" id="carColor" name="carColor"
    	placeholder="Enter Car's Color" >
    </div>
   
    <div class="form-group">
    <label>Car Plate Number:</label>
    <input type="text" class="form-control" id="carPlateNum" name="carPlateNum"
    	placeholder="Enter Car's Plate Number" required="required">
    </div>
    
    <button type="submit" class="btn btn-default" id="carEntry" name="carEntry">Submit</button>
  	
  	</form>
	</div>
	</div>
EOD;

	echo "<div class='jumbotron'><h1 class='title'>Car Details Form</h1></div>";
	echo $insert_car;
?>
</body>
</html>