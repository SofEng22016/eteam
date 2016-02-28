<?php 
	session_start(); // starts the session

	if(!$_SESSION['loginUser']){// checks if the session was registered
								// (security feature so that no one can access the admin page through the URL)
		header("location: login.php?msg=Unable to access! Please enter a Username and Password.");
		
	}else
		header( 'Content-Type: text/html; charset=utf-8' ); // else, the system will continue on the admin page
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
<link rel="tab icon" href="images\tire.ico">
<link rel="stylesheet" href="https://bootswatch.com/readable/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="styles.css" rel="stylesheet" />
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Bayani Carwash</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>
    </ul>
  </div>
</nav>

    <div class="container">
    <div class="page-header">
    	<h1 class="title"><font color="black">Welcome, <?php echo $_SESSION['loginUser']?></font></h1></div>
    <div clas ="well well-lg">
    
    	 <button type="button" class="btn btn-default btn-block addCar hvr-shrink" >
    	 <font color="black" size="30">Last Transaction</font></button>
    	 <br><br>
    	 
    	 <button type="button" class="btn btn-default btn-block addCar hvr-shrink">
    	 <font color="black" size="30">All Transactions</font></button>
    	 <br><br>
    	 
    	 <button type="button" class="btn btn-default btn-block addCar hvr-shrink">
    	 <font color="black" size="30">Reports</font></button>
    	 <br><br>
    	 <form action="logout.php">
    	 	<button type="submit" class="btn btn-default btn-block addCar hvr-shrink">
    	 </form>
    	 <font color="black" size="30">Logout</font></button>
    </div>
    
    <hr/>
    <i>Powered by E-Team&copy;</i>
    
    </div>
    </body>
</html>