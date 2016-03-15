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
						$service;
					
					session_start();
					$date=date("Y-m-d");
					$num = $row['id'];
					$timeStamp = $date." (".$num.")";
					define('SAMPLE', dirname(__FILE__));
					include (SAMPLE.'/fpdf181/fpdf.php');
					$pdf=new FPDF();
					$pdf->AddPage();
					
					
					//Sorry kung mahaba yung name :( sa google ko lang kinopya eh..
					//baguhin nyo na lang, pero atleast.. may initial na.. sorry ulit 
					//-beni
					$pdf->Image('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAvVBMVEX///8AAAD/VVWjo6MwMDC2trYSEhLz8/Pv7+/5+fmJiYnMzMzy8vL8/Pz/UlLe3t7Dw8NeXl7/Q0OXl5fS0tJSUlK9vb1sbGw+Pj6dnZ3/TEx4eHiqqqqPj4//R0dYWFjk5ORFRUV0dHSBgYE6OjopKSkgICBKSkoZGRn/2dn/pKT/9fX/srL/7e3/5ub/ycn/b2//jY3/hYX/l5f/ZWX/wMD/n5//YWH/uLj/1NT/e3v/Y2P/bW3/iYn/NTUMaFDKAAAMAklEQVR4nNVdaWOqOBStVVSkFqkodavY2tq39q0z894s//9nTW1uSFgluTcQz6e3SHIPSe5yEuDiwjiG/sSZjqLg0Hvud47oPz8egmg0dSbh0Hz3JjH2nU3w2KnGUzBy/HHbpmogdlb7E9xk9FZrv22TFeB3AwVyAtvuObB05/da7DgiZ9A2hSoM1lsUPYbD+qptIsUYO2X0nmb3m7Xjhf5weDV4xXDoh56z3qxmT2UkHbdtOjmEhZPz8LA+ERCG4Xp0KLo08hqyvBbG63xM2I+cuHYD8Xx0m2vhuWvLQA4fsrb1Np56hBt7m1x8WcX05irDz0aGyNF3FIN5lGltGxLaqoNwlqE3QTfpZVb0rs0F6af5bedE7U7S82LX1jjGKTueF5RRzO2mfNesjWTHXaVMwM/OLLzUDbxvPNVZN+Dy0k56YaSPMoTyHBqZu73uRl4HzbmcsTxBN2bD8ngq9RU1lAJMpD4fzC+P1DhSeetKSDE5aEaEuJK7ND6Moeis11yY8qWsld5rpyDNmLXZnjJwpJVhsJuBuJVB0/HJFVO1Z2xxeI1NlZa6F347akn9Ezn5yETzIolqxGUXQgSqGXnbgx5ve9emTuQm1cwT8WKMzc4PBYi1QlpviEXehotJIzRhSxKMqKeGFgaJnEMWkpNKaUvVIhJJaCSqqLq2LEGBKalJG/I5QYBk3RCkcAnB9n2MjJCMYjJF29Yts/CJJmriZOzb2UtC9BTTSjLdYxqrSDHs4x2EZzNBiaK2i4jtJvhKEekkBvauQY6Eol6u1cPdoEbAPeqzzsW8HrQrDmbB46JGvcgTI5symSLMdcOip3th4+BDoag8cC9jSzVRBV5pqHkbkA2fDBlFC6gXH1Wu2WjdlrbggrWr+pdwB2W3GxVQt/dsvAzHAiyuu20DS3dn1ChabJUcI5ddLT0/Vwi+FJ06Px7rxZeWweN3nQ0j2MKOjBtFCzA7OP1L7pfO7ug1FIunjzM8nlegEOBDc+p369qDbR1gnp6QbbhPsvqwdQm4i6xOxOA+2F4yFcOp4SNBmek1ZRMxdsz8KtUFUgObdYsqwADdlv/CP183w7A6FTFmdZZqGXznDa2mQlC478v+HyKK5l4H5PftFs3T6mg+Q0WKrg1ealw5iLAKN5qNW8GQW1G8EkEg1T38ZwdDqN4La1tQyLULe0MMx+/Ufr8oj4kPyHzNEMOX/378VPn9uDSxgf9R0KsyMMTwy/X13fL9p/oXgE6YVyigqIi1TTHD8PPN5SuWN+9rXwGrLV9isLoQcSDODMPvyyPDyxuF1QhCWvafw+pQWQNGGH64eyN4/UPhGr+YCju6qbUNBzDC8CMbwjslZ8NU/kx2DX4Gc4rKCMPL6zeGS6WL1kVRwSlzQPVhguEvNkmXfyhdBcPVTf0jKwxRe2kmGP5mQ3ijECyOYEsulZxC1YGqfAww/HTD/Mxvxeu8fORbFztYJRhgCKHi7pfqhXmvsi3LdBRAz3DMCF7/qXzlQ3aauuhgeGGC4U/GcPmX8pUQ3YVYMSeYpAYY/sn8zJ3GBgOzRYii9wSTlJ7hL+Znlt81rl1lgj6zrdbeWznIGX6DUPFZ49pJelb6+HB/Qc/wg2aoeAMEfS78dklMo2b4HkLFi9bVTFXjmlOQ+psuqBlCqLjUu5qJGVyuYaZhn5QmZvgTUtKPepf78kIEtR+76UvM8B/wMx80r5cXopNNAPRAy/AdhIqvug2whcjqCxY70MeDaBl+VVcv0phKMX5PEQ2JGfJQ8Y92C6y+6B//CKEjxhpFylBLvUjhSgT5lNdBgJTh5aWGepFGP4kQzNEc0EZRMnyBUFFfJc0jSFwN04jxz4BRMvyNDBVHMFdz1PAZV/zpC0KGn8HPfMM0Mk/m5qMUGjEgZMiFbmX1QobwL+wP+PPOdAzHIHT/jWoFhAuXb2Tg7aJj+Je2epECj4JsMAnOF9AxRKgXMm4hXLBqmOAlDGQM9YTuPCLI1Vg4vEfbRcdQU+jOYQQBkYUNbPl7QcdQV+guMWgDTAkOI1Ix/ENX6M6Cz04+W9GgYniHUi8ksOoigJSG4GVvRAyR6oUEJnzvLg5EKQ0Vwx8QKjApKUMMcZA9C0vwqC8NQ7R6IcBymf7FM1HSVsLQdSpQsDb+RQjdGcCmKBSKxhhCqV2MfBTm6sUXvD08MYXsjeAZJw2G+QNYOKE7jXGKIcHTByQMGcHLa7w5Fzz1toshhXohYCPDLwTqhYCFDEG9WP6Lt+YIYGjcl/ZLkWOIFrpT4L7UcDxUAQ8VKsf0KsDjIROirMhp8EJ3CjynsSgv1TqmVw6el9pTW7wQqRccvLawpz6kUi84eH1oTY3/iULolsFq/MgenYZMvUgbNAKm+g8hZBrUZjgmUy842OxcWKOXEgndEriHCcGnooFkSCR0S9hBlLBk3wJzTK8EzJ7Ylr0nzDG9YiR7TxdPREkNiiGZ0C0g9g+t2AOmVC8Ac0hpuFPFv08IxRDUC7pQIe/j23AWg07oFmDB4ngWw4bzNNhjekUQ52ksOBNFKHQngPr3TSZluj76TQEIhrTqBYMnTc3Wzybij+kVgB0SZqf12SNBFa/LqAd9hh/pQwUPguzBIHA17Z0RBvWCRujm6MiJTCfxOhhoM6QVugHpYWPPdbV2Vv/Hkj5UgDX7wr/h2tRg+O7rzZJSvXhDetRgRJHKPiJafPh4fUcaKnIrr0MREXHV0wvtEMrR8AiWwtn27BoG7BFL8Vyzk2GsBasYsqRUlIQDinhhE0N4hjQW/8I2L3CSok0MRzlTLH2WWxsdKWVjgJ1a1KPOFjHMT1I+TVGvorOI4arAEvCmmE9gWsSQWZJ+L4Zb9I9qsIchDFdGAmZBX+nF7RnYw5AdYc9uxXjokGgNQ0izc0noM9bXWMPwviT0dQsnrwJsYQgJWr7cBV+j/wybLQynpUO1QgYMWxh2SpdbXDa6NWEJQzCjcC8NXiKsq7lZwpBZUayNQjan+6E2OxhCDVGSYe9QK9EOhp3KzMVDrUQr3iO8KIn2HDCIesfafWd+RKufHHCrhzBZief2aQuBh8pVeAS8Ddrej+VVAwJelbbtV/la+zGriIUckLUSHMZsAZPydEaAf28NU+y3BrA9rv7V4nydDbiZk5vZrE6kOBbdMPjnLE/+0Kv7Q9vweCLYC8CrlAmeX28UTOau9ZJZ/jGd8/oeEv8WUi2Ngn/Z86z8Kdhc8wAifCSB4GR0Y4ClVfd0Hp+nqE96Nwr+gfTaNQP/PuC5fDOIBwqFVAyC55l8uovPOaU0pXc6S7cHbOOMvX2uNoY6t6UlgAyqWvPxpWi/t+FeRrkeGule2DD4UGjkYLOzcKjcjWoV7U9687tRgG6hmYBxb9OJaa0ixBXSRD4DrP089wC+rqpfzfJV3LeTovuM94ZrmykOOEFURFvYO1Gv+BRFPmXAw6J1HjXxougHfHkSbllc9MkIShRt+hT5hJCgNFHtyVHXpAST0w32VBq8miB4ahKQ3LK9DeqUezAwqZJpb4G/SXwMbdkTJs1iPs1GgWQ+UW88DHkC0dm2OlOjhGBM3vbM1M1TgJhKtybucxI1qHw0wgJDuyrzpIN+Gw7HfzTjY2QMRR8rujd01MSDuL8mc+Qk1jYtUYl4ZTrvkHraxWa7khDPGryz7lZ0tmpG9XfFBO0cCN5DehKO6K8zbWA5LqT+CN7YVQeDQOoT84hGHaylvrbNKQ2e1G1nYXAcu3JHzRaoU7nrjZl7O0h1QlYp1cUwkruP6EOUfy93EMTkHdQw4VY2Yb8mnaxOuvG2ijZvL5vRuadKycNVqt3HNg++TNIcOw/4mx2O0k0+tq2Aebu0QZ3VBDFdvYd+urVbGw4u+VGGY2e20HE8fnebbShoXzRhuJpmTXtlOfXqJ1gDbxHkmzAUhDQxKbCw0w+mc7+6GHf9+TR6Lrh21vbyy2PQ3RcY+raWolHX8cJ4OHDflqg7GMah53RH0a7kil7XquETiBdlJFXQW8RtE6nCcF00Xetju47bplAD4WanxW6/Oaez12E36p/mJBAswsaVHzyuvO7qcJLbbtVViCs2wo1f3ebmPtg9iUHtP+2CaLRwvNi8gP4/GweVXlw04kEAAAAASUVORK5CYII=',90,5,0,30,'PNG');
					$pdf->Cell(0,30,"",0,1,"C");
					$pdf->SetFont("Arial","",40);
					
					$pdf->Cell(0,5,"",0,1,"C");
					$pdf->Cell(0,5,"BAYANI CAR WASH",0,1,"C");
						$pdf->SetFont("Arial","",15);
					 	$pdf->Cell(0,5,"",0,1,"C");
					 	$pdf->Cell(0,5,"iACADEMY Plaza, H.V. Dela Costa, Makati, Metro Manila",0,1,"C");
					$pdf->SetFont("Arial","",30);
					$pdf->Cell(0,5,"___________________________________________________________________",0,1,"C");
					$pdf->Cell(0,5,"",0,1,"C");
					
					//actually gusto ko mag bago ng fonts kaso.. di ko sure kung paano eh
					//sa fpdf.php ba?
					//pag binabago ko kasi ng manual, nag error :(
					//$pdf->SetFont("Times New Roman","",20);    <- like that
					//ito na yung pinaka nag SET ng FONT sa mga susunod
					$pdf->SetFont("Arial","",20);
					
					$pdf->Cell(0,10,"Customer: ".$custName['fullname']."",0,2,"");
					$pdf->Cell(0,5,"",0,1,"C");
					
					$pdf->Cell(0,5,"Car: ".$car."",0,2,"");
					$pdf->Cell(0,5,"",0,1,"C");
					
					$pdf->Cell(0,5,"Plate Number: ".$carName['plate_num']."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->Cell(0,0,"Services Availed: ");
					$pdf->Cell(0,0, " " . $row['service_id'] ." ",0,0,"R");
					$pdf->Cell(0,5,"",0,1," ");
					
					$pdf->Cell(0,10," ",0,1,"C");
					$pdf->Cell(0,0,"Total:");
					$pdf->Cell(0,0,"".$row['total_amount'].".00",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->Cell(0,0,"Payment: ");
					$pdf->CELL(0,0," ".$row['payment'].".00",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->Cell(0,0,"Change Due: ");
					$pdf->Cell(0,0, " ".$row['change_'].".00",0,0,"R");
					$pdf->Cell(0,5,"",0,1,"C");
					
					$pdf->Cell(0,0,"___________________________________________________________________",0,1,"C");
					$pdf->Cell(0,10,"",0,1,"C");
					//Kailangan pa ba ng RECEIVED BY? may record naman tayo sa database diba?..
					//$pdf->SetFont("Arial","",20);
					//$pdf->Cell(0,0,"Received by: _______________");
					//$pdf->Cell(0,5,"",0,1,"C");
					
					
					$pdf->SetFont("Arial","",15);
					$pdf->Cell(0,0,"[Services Offered]",0,0,"C");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,0,"1 - Wash (PhP100)");
					$pdf->Cell(0,0,"5 - Vacuum (PhP80)",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,0,"2 - Wax (PhP140)");
					$pdf->Cell(0,0,"6 - Tire Black (PhP300)",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,0,"3 - Asphalt Removal (PhP80)");
					$pdf->Cell(0,0,"7 - Interior Detailing (PhP3000)",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					$pdf->Cell(0,0,"4 - Armor All (PhP80)");
					$pdf->Cell(0,0,"8 - Exterior Detailing (PhP3500)",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->SetFont("Arial","",12);
					$pdf->Cell(0,5,"Telephone number: 09XXX-XXXXXX",0,2,"C");
					$pdf->Cell(0,1,"",0,1,"C");
					$pdf->Cell(0,5,"".$row['date']." ",0,1,"C");
					$pdf->Cell(0,1,"",0,1,"C");
					$pdf->Cell(0,5,"THIS SERVES AS OFFICIAL SALES INVOICE",0,2,"C");
					$pdf->Cell(0,1,"",0,1,"");
					$pdf->Cell(0,5,"Thank You! Please Come Again",0,2,"C");
					$pdf->Cell(0,1,"",0,1,"");
					

							
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