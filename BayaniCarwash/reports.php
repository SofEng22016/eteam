<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reports</title>
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
    <body>
    <?php 
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
	?>
    <nav class="navbar navbar-inverse">
 		 <div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="index.php">Bayani Carwash</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li><a href="index.php">Home</a></li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
     			 <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>
    		</ul>
  		</div>
	</nav>
	
	<div class="container">
	<div class='page-header'><h1 class='title'><span class="glyphicon glyphicon-stats"></span> Reports</h1></div>
		
		<div class ="well well-lg">
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body"><legend>Yearly</legend>
						<?php

									if (isset($_POST['year'])) {
										
										if($_POST['year']>0){

											$inputYear = $_POST['year'];
											$query = "SELECT * FROM transactions";
											$result1 = mysqli_query($connect, $query);
											$id = (mysqli_num_rows($result1));
											$query = "select * from transactions where id='$id'";
											$result = mysqli_query($connect, $query);
											$totalCust=0;
											$totalMoney=0;
											if($id > 0){
												$row = mysqli_fetch_assoc($result);
												
												while($row = mysqli_fetch_array($result1)){
													$date = explode("/",$row['date']);
													
													if($date[0] == $inputYear){
														$totalCust++;
														$totalMoney = $totalMoney+$row['total_amount'];
													}
												}
												echo "<h3><small>($inputYear)</small></h3>";
												echo "<h3>Frequency of Customers: <mark>$totalCust</mark></h3>";
												echo "<h3>Profit Earned: <mark>PhP $totalMoney</mark></h3>";
												mysqli_close($connect);
											}else {
							  					echo "<div class='alert alert-danger'>No records found!</div>";
							  					mysqli_close($connect);
							  				}
											
											echo "<a href='reports.php' class='btn btn-default'>Back</a>";
										}else{
											echo "<div class='alert alert-danger'>No year entered!</div>";
											echo "<a href='reports.php' class='btn btn-default'>Back</a>";
											mysqli_close($connect);
										}
									}else{
								?>
							<form method="POST" role="form">
								<div class="form-group">
								
									<label>Enter a Year: </label>
									<input type="number" class="form-control" id="year" name="year" placeholder="Year"/>
								</div>
		
								<button type="submit" class="btn btn-default" id="submitYear" name="submitYear"/>Submit</button>
								
							
							</form>
							<?php }?>
					</div>
				</div>
				</div>
				<div class="col-sm-6">
				<div class="panel panel-default">
						<div class="panel-body"><legend>Monthly</legend>
						
			    			<?php

									if (isset($_POST['month'])) {
										
										if($_POST['month']>0){

											$inputMonth = $_POST['month'];
											$inputYear = date("Y");
											$query = "SELECT * FROM transactions";
											$result1 = mysqli_query($connect, $query);
											$id = (mysqli_num_rows($result1));
											$query = "select * from transactions where id='$id'";
											$result = mysqli_query($connect, $query);
											$totalCust=0;
											$totalMoney=0;
											if($id > 0){
												$row = mysqli_fetch_assoc($result);
												
												while($row = mysqli_fetch_array($result1)){
													$date = explode("/",$row['date']);
													
													if($date[0] == $inputYear && $date[1] == $inputMonth){
														$totalCust++;
														$totalMoney = $totalMoney+$row['total_amount'];
													}
												}
												echo "<h3><small>($inputYear-$inputMonth)</small></h3>";
												echo "<h3>Frequency of Customers: <mark>$totalCust</mark></h3>";
												echo "<h3>Profit Earned: <mark>PhP $totalMoney</mark></h3>";
												mysqli_close($connect);
											}else {
							  					echo "<div class='alert alert-danger'>No records found!</div>";
							  					mysqli_close($connect);
							  				}
											
											echo "<a href='reports.php' class='btn btn-default'>Back</a>";
										}else{
											echo "<div class='alert alert-danger'>No month entered!</div>";
											echo "<a href='reports.php' class='btn btn-default'>Back</a>";
											mysqli_close($connect);
										}
									}else{
								?>
							<form method="POST" role="form">
								<div class="form-group">
								
									<label>Choose a Month: </label>
									<select class="form-control" id="month" name="month">
									  <option value=00>--</option>
							          <option value=01>January</option>
							          <option value=02>February</option>
							          <option value=03>March</option>
							          <option value=04>April</option>
							          <option value=05>May</option>
							          <option value=06>June</option>
							          <option value=07>July</option>
							          <option value=08>August</option>
							          <option value=09>September</option>
							          <option value=10>October</option>
							          <option value=11>November</option>
							          <option value=12>December</option>
							        </select>
								</div>
		
								<button type="submit" class="btn btn-default" id="submitMonth" name="submitMonth"/>Submit</button>
								
							
							</form>
							<?php }?>
						</div>
			
					</div>
				
				</div>
		</div>

		<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body"><legend>Today</legend>
						
						<?php
						if (isset($_POST['submitToday'])) {
							$today = date("Y/m/d");
							$query = "SELECT * FROM transactions";
							$result1 = mysqli_query($connect, $query);
							$id = (mysqli_num_rows($result1));
							$query = "select * from transactions where id='$id'";
							$result = mysqli_query($connect, $query);
							$totalCust=0;
							$totalMoney=0;
							if($id > 0){
								$row = mysqli_fetch_assoc($result);
							
								while($row = mysqli_fetch_array($result1)){
										
									if($row['date'] == $today){
										$totalCust++;
										$totalMoney = $totalMoney+$row['total_amount'];
									}
								}
								echo "<h3><small>($today)</small></h3>";
								echo "<h3>Frequency of Customers: <mark>$totalCust</mark></h3>";
								echo "<h3>Profit Earned: <mark>PhP $totalMoney</mark></h3>";
								
							}else {
								echo "<div class='alert alert-danger'>No records found!</div>";
								 
							}
							echo "<a href='reports.php' class='btn btn-default'>Back</a>";
						}else{
						?>
						<form method="POST" role="form">
						<label>Click button below to view records today:</label>
								<div class="form-group">
						<button type="submit" class="btn btn-default" id="submitToday" name="submitToday"/>View</button>
						</div>
						</form>
						<?php }?>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
				<div class="panel panel-default">
						<div class="panel-body"><legend>Specific Date</legend>
						<?php

									if (isset($_POST['date'])) {
										
										if(!empty($_POST['date'])){

											$inputDate = $_POST['date'];
											$query = "SELECT * FROM transactions WHERE date='$inputDate'";
											$result1 = mysqli_query($connect, $query);
											$id = (mysqli_num_rows($result1));
											$query = "select * from transactions where id='$id'";
											$result = mysqli_query($connect, $query);
											$totalCust=0;
											$totalMoney=0;
											if($id > 0){
												$row = mysqli_fetch_assoc($result);
												
												while($row = mysqli_fetch_array($result1)){
													
													if($row['date'] == $inputDate){
														$totalCust++;
														$totalMoney = $totalMoney+$row['total_amount'];
													}
												}
												echo "<h3><small>($inputDate)</small></h3>";
												echo "<h3>Frequency of Customers: <mark>$totalCust</mark></h3>";
												echo "<h3>Profit Earned: <mark>PhP $totalMoney</mark></h3>";
												mysqli_close($connect);
											}else {
							  					echo "<div class='alert alert-danger'>No records found!</div>";
							  					mysqli_close($connect);
							  				}
											
											echo "<a href='reports.php' class='btn btn-default'>Back</a>";
										}else{
											echo "<div class='alert alert-danger'>No date entered!</div>";
											echo "<a href='reports.php' class='btn btn-default'>Back</a>";
											mysqli_close($connect);
										}
									}else{
								?>
							<form method="POST" role="form">
								<div class="form-group">
								
									<label>Enter a date (YYYY/MM/DD): </label>
									<input type="text" class="form-control" id="date" name="date" placeholder="Date"/>
								</div>
		
								<button type="submit" class="btn btn-default" id="submitDate" name="submitDate"/>Submit</button>
								
							
							</form>
							<?php }?>
						</div>
			
					</div>
				
				</div>
		</div>
		</div>
		<a href="adminPage.php" class="btn btn-default">Back</a>
			<div class='container'><hr/><i>Powered by E-Team&copy;</i></div>
		</div>
		
	
    </body>
</html>