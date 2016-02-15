<!DOCTYPE html>
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
<body class = "bg">
<?php 
$insert_customer = <<<EOD

  	<div class="container">
	<div class="well well-lg">
  	<form method="POST" action="insert_customer.php" role="form">
   
   	<div class="form-group">
   	<label>Customer Name:</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required="required">
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" required="required">
    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter Middle Name" required="required">
    </div>
    
    <div class="form-group">
   	<label>Customer Contact Info</label>
    <input type="number" class="form-control" id="telephoneNum" name="telephoneNum" placeholder="Enter Telephone Number" 
    		required="required" maxlength="7">
    <input type="number" class="form-control" id="cellphoneNum" name="cellphoneNum" placeholder="Enter Cellphone Number" maxlength="11">
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
    </div>
    <button type="submit" class="btn btn-default" id="customerEntry" name="customerEntry" >Submit</button>
  	</form>
	
	<form method="POST" action="customerform.php" role="form">
	<div class="form-group">
	<button type="submit" class="btn btn-default" id="resetCustomerForm" name="resetCustomerForm">Reset</button>
	</div>
	</form>
	
	</div>
	</div>

	<div class="container">                
  	<ul class="pager">
    <li class="previous"><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
 	 </ul>
	</div>
EOD;

	echo "<div class='jumbotron'><h1 class='title'>Customer Details Form</h1></div>";
	echo $insert_customer;
 	
	
	
	?>
</body>
</html>