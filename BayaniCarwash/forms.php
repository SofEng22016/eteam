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

	<div class="container">
	  <div class='jumbotron'><h1 class='title'>Bayani Carwash</h1></div>
	  <ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#customer">Customer</a></li>
	    <li><a data-toggle="tab" href="#car">Car</a></li>
	    <li><a data-toggle="tab" href="#transact">Services</a></li>
	    <li><a data-toggle="tab" href="#receipt">Receipt</a></li>
	  </ul>
	<div class="tab-content">
	    <div id="customer" class="tab-pane fade in active">
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
		    <button type="submit" class="btn btn-default" id="customerEntry" name="customerEntry">Submit</button>
		    <button type="reset" class="btn btn-default">Reset</button>
		  	</form>
			

		</div>
	   </div>
	    <div id="car" class="tab-pane fade">
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
		  	<button type="reset" class="btn btn-default">Reset</button>
		  	</form>
			

				
			</div>
	    </div>
	    <div id="transact" class="tab-pane fade">
	      <div class="well well-lg">
  	<label>Service Availed:</label> 
    <form action="insert_transaction.php" method="post" role="form">
    <div class="row">
	<div class="col-sm-4">
		<div class="form-group">
        <input type="checkbox" name="Name[]" value="Wash and Wax"/> Wash and Wax</br>
        <input type="checkbox" name="Name[]" value="Asphalt Removal"/> Asphalt Removal<br>
        <input type="checkbox" name="Name[]" value="Tire Black"/> Tire Black
        </div>
	</div>
    <div class="col-sm-4">
                <div class="form-group">
                <input type="checkbox" name="Name[]" value="Wash"/> Wash</br>
                <input type="checkbox" name="Name[]" value="Armor All"/> Armor All</br>
                <input type="checkbox" name="Name[]" value="Interior Detailing"/> Interior Detailing

                </div>
    </div>
    <div class="col-sm-4">
    	<input type="checkbox" name="Name[]" value="Wax"/> Wax</br>
    	<input type="checkbox" name="Name[]" value="Vacuum"/> Vacuum<br>
        <input type="checkbox" name="Name[]" value="Exterior Detailing"/> Exterior Detailing
    </div>

    </div>
        <div class="form-group">
        <label>Payment:</label>
        <input type="number" name="payment" class="form-control" placeholder="Enter Payment"/>
        </div>
           		
        <button type="submit" class="btn btn-default" id="transact" name="transact">Submit</button> 
    </form>
		
	<form method="POST" action="transaction.php" role="form">
	<div class="form-group">
	<button type="submit" class="btn btn-default" id="resetTransactionForm" name="resetTransactionForm">Reset</button>
	</div>
	</form>	
		
    </div>
	    </div>
	    <div id="receipt" class="tab-pane fade">
	      <h3>Menu 3</h3>
	      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
	    </div>
	  </div>
</div>
</body>
</html>