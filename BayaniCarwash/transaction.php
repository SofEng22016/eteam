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
        <input type="checkbox" name="Name[]" value="Asphalt Removal"/> Asphalt Removal<br>
		<input type="checkbox" name="Name[]" value="Vacuum"/> Vacuum<br>
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
        <input type="checkbox" name="Name[]" value="Exterior Detailing"/> Exterior Detailing
    </div>

    </div>
        <div class="form-group">
        <label>Payment:</label>
        <input type="number" name="payment" class="form-control" placeholder="Enter Payment"/>
        </div>
           		
        <button type="submit" class="btn btn-default" id="transact" name="transact">Submit</button> 
		<button type="reset" class="btn btn-default">Reset</button>

	</form>
		<p id="total"></p>
		<script>
			function addElements() {
			    document.getElementById("total").innerHTML = "Hello World";
			}
		</script>
		
    </div>
		<ul class="pagination">
		<li class="previous"><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
  		<li><a href="customerform.php">1</a></li>
  		<li><a href="carforms.php">2</a></li>
		<li class="active"><a href="transaction.php">3</a></li>
		<li><a href="receipt.php">4</a></li>
		</ul>
	</div>
EOD;

	echo "<div class='jumbotron'><h1 class='title'>Transaction Window</h1></div>";
	echo $insert_transaction;
	if(isset($_GET['msg'])){
		$msg=$_GET['msg'];
		if($msg!=''){
			echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
	
		}
	}
	?>
    </body>
</html>