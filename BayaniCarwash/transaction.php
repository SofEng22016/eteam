<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transaction Window</title>
<link rel="tab icon" href="images\tire.ico">
<link rel="stylesheet" href="https://bootswatch.com/readable/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  body {
 	 background-image: url("images/background3.jpg");
  }
  h1.title{
     text-align: left;
  }
  </style>

</head>
   <body class="bg">
<?php 
$insert_transaction = <<<EOD
 	<div class="container">
		<div class='page-header'><h1 class='title'>Transaction Window</h1></div>
	<div class="well well-lg">
  	<label>Service Availed:</label>
    <form action="insert_transaction.php" method="post" role="form">
    <div class="row">
		
		<div id="services">
		
	<div class="col-sm-4">
		<div class="form-group">
        <input type="checkbox" name="Name[]" id="1" value="Asphalt Removal" onclick="attachCheckboxHandlers()"/> Asphalt Removal<br>
		<input type="checkbox" name="Name[]"  id="2" value="Vacuum" onclick="attachCheckboxHandlers()"/> Vacuum<br>
        <input type="checkbox" name="Name[]" value="Tire Black" onclick="attachCheckboxHandlers()"/> Tire Black
        </div>
	</div>
    <div class="col-sm-4">
                <div class="form-group">
                <input type="checkbox" name="Name[]" value="Wash" onclick="attachCheckboxHandlers()"/> Wash</br>
                <input type="checkbox" name="Name[]" value="Armor All" onclick="attachCheckboxHandlers()"/> Armor All</br>
                <input type="checkbox" name="Name[]" value="Interior Detailing" onclick="attachCheckboxHandlers()"/> Interior Detailing

                </div>
    </div>
    <div class="col-sm-4">
    	<input type="checkbox" name="Name[]" value="Wax" onclick="attachCheckboxHandlers()"/> Wax</br>
        <input type="checkbox" name="Name[]" value="Exterior Detailing" onclick="attachCheckboxHandlers()"/> Exterior Detailing
    </div>
		
		</div>

    </div>
		<label>Total:</label>
		
		<p>PhP <input type="text" name="total" class="num" size="6" value="0" readonly="readonly" /></p>
        <div class="form-group">
        <label>Payment:</label>
        <input type="number" name="payment" class="form-control" placeholder="Enter Payment"/>
        </div>
           		
        <button type="submit" class="btn btn-default" id="transact" name="transact">Submit</button> 
		<button type="reset" class="btn btn-default">Reset</button>

	</form>
		
    </div>
		<ul class="pagination">
  		<li><a href="customerform.php">1</a></li>
  		<li><a href="carforms.php">2</a></li>
		<li class="active"><a href="transaction.php">3</a></li>
		<li><a href="receipt.php">4</a></li>
		</ul>
	</div>

	<script>
	function attachCheckboxHandlers() {
	
	    var el = document.getElementById('services');
	
	    var tops = el.getElementsByTagName('input');
	    
	    for (var i=0, len=tops.length; i<len; i++) {
	        if ( tops[i].type === 'checkbox' ) {
	            tops[i].onclick = updateTotal;
	        }
	    }
	}
	    
	function updateTotal(e) {

	    var form = this.form;
		var temp = this.value;
			if(this.value == "Asphalt Removal"){
				temp = 80;
			}else if(this.value == "Vacuum"){
				temp = 80;
			}else if(this.value == "Tire Black"){
				temp = 30;
			}else if(this.value == "Wash"){
				temp = 100;
			}else if(this.value == "Armor All"){
				temp = 80;
			}else if(this.value == "Interior Detailing"){
				temp = 3000;
			}else if(this.value == "Wax"){
				temp = 140;
			}else if(this.value == "Exterior Detailing"){
				temp = 3500;
			}
			
		var val = parseFloat( form.elements['total'].value );
	
	    if ( this.checked ) {
	        val += parseFloat(temp);
	    } else {
	        val -= parseFloat(temp);
	    }
	
	    form.elements['total'].value = val;
	}
	attachCheckboxHandlers();
	</script>	
EOD;
	echo "<nav class='navbar navbar-inverse'>
	  <div class='container-fluid'>
	    <div class='navbar-header'>
	      <a class='navbar-brand' href='index.html'>Bayani Carwash</a>
	    </div>
	    <ul class='nav navbar-nav'>
	      <li><a href='index.html'>Home</a></li>
	    </ul>
	    <ul class='nav navbar-nav navbar-right'>
	      <li><a href='login.php'><span class='glyphicon glyphicon-user'></span> Admin Login</a></li>
	    </ul>
	  </div>
	</nav>";
// 	echo "<div class='jumbotron'><h1 class='title'>Transaction Window</h1></div>";
	echo $insert_transaction;
	if(isset($_GET['msg'])){
		$msg=$_GET['msg'];
		if($msg!=''){
			echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
	
		}
	}
	echo "<div class='container'><hr/><i>Powered by E-Team&copy;</i></div>";
	?>
    </body>
</html>