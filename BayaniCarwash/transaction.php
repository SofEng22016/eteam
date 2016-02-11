<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transaction Window</title>
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
$insert_transaction = <<<EOD

 	<div class="container">
	<div class="well well-lg">
  	<label>Service Availed:</label> 
    <form action="insert_transaction.php" method="post" role="form">
    <div class="row">
	<div class="col-sm-4">
		<div class="form-group">
        <input type="checkbox" name="Name[]" value="WASH AND WAX"/> Wash and Wax</br>
        <input type="checkbox" name="Name[]" value="Asphalt Removal"/> Asphalt Removal<br>
        <input type="checkbox" name="Name[]" value="Tire Black"/> Tire Black
        </div>
	</div>
    <div class="col-sm-4">
                <div class="form-group">
                <input type="checkbox" name="Name[]" value="WASH"/> Wash</br>
                <input type="checkbox" name="Name[]" value="Armor All"/> Armor All</br>
                <input type="checkbox" name="Name[]" value="Interior Detailing"/> Interior Detailing

                </div>
    </div>
    <div class="col-sm-4">
    	<input type="checkbox" name="Name[]" value="WAX"/> Wax</br>
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
    </div>
EOD;

	echo "<div class='jumbotron'><h1 class='title'>Transaction Window</h1></div>";
	echo $insert_transaction;
	?>
    </body>
</html>