<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Finish</title>
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
<body class = "bg">
<nav class='navbar navbar-inverse'>
	  <div class='container-fluid'>
	    <div class='navbar-header'>
	      <a class='navbar-brand' href='index.php'>Bayani Carwash</a>
	    </div>
	    <ul class='nav navbar-nav'>
	      <li><a href='index.php'>Home</a></li>
	    </ul>
	    <ul class='nav navbar-nav navbar-right'>
	      <li><a href='login.php'><span class='glyphicon glyphicon-user'></span> Admin Login</a></li>
	    </ul>
	  </div>
	</nav>
	<?php 
			if(!isset($_COOKIE['fullName'])){
				echo "<div class='alert alert-danger'><strong>Warning!</strong>It seems you have jumped to this page without transacting.</div>";
				echo "<h2><center>Redirecting you to the customer details page...</center></h2>";
				header("Refresh:2; url=customerform.php");
				exit;
			}else if(!isset($_COOKIE['car'])){
				echo "<div class='alert alert-danger'><strong>Warning!</strong>It seems you have jumped to this page without transacting.</div>";
				echo "<h2><center>Redirecting you to the car details page...</center></h2>";
				header("Refresh:2; url=carforms.php");
				exit;
			}
			
			if(isset($_GET['msg'])){
				$msg=$_GET['msg'];
				if($msg!=''){
					echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
			
				}
			}
		?>
<div class="container">
		
		<div class='page-header'><h1 class='title'>Finish</h1></div>
		<div class ="well well-lg">
  			<legend>Service Number Legend:</legend>
  			<div align = "center">
  			<h3>1<small> - Wash (PhP100)</small> 2<small> - Wax (PhP140)</small> 3<small> - Asphalt Removal (PhP80)</small> 4<small> - Armor All (PhP80)</small></h3>
  			<h3>5<small> - Vacuum (PhP80)</small> 6<small> - Tire Black (PhP300)</small> 7<small> - Interior Detailing (PhP3000)</small> 8<small> - Exterior Detailing (PhP3500)</small></h3>
  			</div>
  			<hr/>
  			<?php
  			 
  				define('DOC_ROOT', dirname(__FILE__));
				include (DOC_ROOT.'/config.php');
  				
  				$query = "select * from transactions";
  				$result1 = mysqli_query($connect, $query);
  				$lastId = (mysqli_num_rows($result1));
  				$query = "select * from transactions where id='$lastId'";
  				$result = mysqli_query($connect, $query);
  				if($lastId > 0) {
	  			  	$row = mysqli_fetch_assoc($result);
	  			  	
	  			  	$getCustID = "SELECT * FROM records WHERE id = '".$row['record_id']."'";
	  			  	$get = mysqli_query($connect, $getCustID);
	  			  	$ID = mysqli_fetch_assoc($get);
	  			  	
	  			  	$getFullName = "SELECT * FROM customers WHERE id = '".$ID['cust_id']."'";
	  			  	$get = mysqli_query($connect, $getFullName);
	  			  	$custName = mysqli_fetch_assoc($get);
	  			  	
	  			  	$getCar = "SELECT * FROM cars WHERE id = '".$ID['car_id']."'";
	  			  	$get = mysqli_query($connect, $getCar);
	  			  	$carName = mysqli_fetch_assoc($get);
					$car = $carName['color']." ".$carName['manufacturer']." ".$carName['model'];
	  			  	
					echo "<h3><small>(".$row['date'].")</small></h3>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Name: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$custName['fullname']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Contact No.: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$custName['tel_num']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Car: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$car."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Plate Number.: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$carName['plate_num']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Services Availed: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$row['service_id']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Payment: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$row['payment']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Total Amount: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>PhP ".$row['total_amount']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Change: </h3></div>";
					echo "<div class='col-sm-4'><h3><mark>PhP ".$row['change_']."</mark></h3></div>";
					?>
					<div class="col-sm-4"><a href= "display-pdf.php" target="_blank"><button type="button" class="btn btn-primary btn btn-lg" id="viewPDF" name="viewPDF" >View Receipt</button></a></div>
					</div>
					
					<?php
					session_start();
					$date=date("Y-m-d");
					$num = $row['id'];
					$timeStamp = $date." (".$num.")";
					define('SAMPLE', dirname(__FILE__));
					include (SAMPLE.'/fpdf181/fpdf.php');
					$pdf=new FPDF();
					$pdf->AddPage();
					$pdf->SetFont("Arial","",45);
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,10,"BAYANI CAR WASH",0,1,"C");
					$pdf->SetFont("Arial","",30);
					$pdf->Cell(0,10,"------------------------------------------------------------------",0,1,"C");
					$pdf->SetFont("Arial","",20);
					$pdf->Cell(0,10,"Customer: ".$custName['fullname']."",0,0,"");
					$pdf->Cell(0,10,"Date: ".$row['date']."",0,1,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,10,"Car: ".$car."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,10,"Plate Number: ".$carName['plate_num']."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->SetFont("Arial","",30);
					$pdf->Cell(0,10,"------------------------------------------------------------------",0,1,"C");
					$pdf->Cell(0,10,"Total Amount: PhP ".$row['total_amount']."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->SetFont("Arial","",20);
					$pdf->Cell(0,10,"Payment: PhP ".$row['payment']."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,10,"Total Amount: PhP ".$row['change_']."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->SetFont("Arial","",30);
					$pdf->Cell(0,10,"------------------------------------------------------------------",0,1,"C");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->SetFont("Arial","",20);
					$pdf->Cell(0,10,"Received by: _______________",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->SetFont("Arial","",10);
					$pdf->Cell(0,10,"Any questions? Here's our number: 09XXX-XXXXXX",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Output("F","receipts/$timeStamp.pdf");
					
					$_SESSION['pdf'] = "$timeStamp.pdf";
					
					mysqli_close($connect);
				}else {
  					echo "<div class='alert alert-danger'>No transactions!</div>";
  					mysqli_close($connect);
  				}

			?>
			</div>
			
	<ul class="pagination">
  		<li><a href="customerform.php">1</a></li>
  		<li><a href="carforms.php">2</a></li>
		<li><a href="transaction.php">3</a></li>
		<li class="active"><a href="receipt.php">4</a></li>
	</ul> 
	<div class='container'><hr/><i>Powered by E-Team&copy;</i></div>
			</div>
</body>
</html>