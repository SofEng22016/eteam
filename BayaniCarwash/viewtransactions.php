<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Transactions</title>
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

	 <nav class="navbar navbar-inverse">
       <div class="container-fluid">
         <div class="navbar-header">
           <a class="navbar-brand">Bayani Carwash</a>
       </div>
      <ul class="nav navbar-nav">
       <li class="active"><a href="index.html">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>
      </ul>
     </div>
    </nav>
    
    <div class = "container">
		<div class ="well well-lg">
			<div class="jumbotron">
				<h1>List of Transactions</h1>
  			<hr/>
  			<?php 
  				$dbhost = "localhost";
				$dbuser = "buckwick";
				$dbpass = "buckwick";
				$dbName = "bayanicarwash";
	    
				$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbName) or die("ERROR: Database connection failed");
  				
  				$query = "SELECT * FROM transactions";
  				$result = mysqli_query($connect, $query)
  						or die("Error querying database.");
  				if($result != null) {
  			
				echo '<table>';
				echo '<tr><th>ID&nbsp;&nbsp;</th><th>Service ID&nbsp;&nbsp;
						</th><th>Record ID&nbsp;&nbsp;</th><th>Total Amount&nbsp;&nbsp;
							</th><th>Payment&nbsp;&nbsp;</th><th>Change&nbsp;&nbsp;
								</th></tr>';
				while ($row = mysqli_fetch_array($result)) {
				echo '<tr><td>' . $row['id'] . '</td>';
				echo '<td>' . $row['service_id'] . '</td>';
				echo '<td>' . $row['record_id'] . '</td>';
				echo '<td>' . $row['total_amount'] . '</td>';
				echo '<td>' . $row['payment'] . '</td>';
				echo '<td>' . $row['change_'] . '</td>';
				}
				echo '</table>';
				mysqli_close($connect);
  				} else {
  					echo "<h2>No transactions available.</h2>";
  					mysqli_close($connect);
  				}
       			
			?>
			</div>
		</div>
		 <a href="adminPage.php" class="btn btn-default">Back</a>
	</div>
	

	
    <?php

	?>
    </body>
</html>