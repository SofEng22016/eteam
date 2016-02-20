<?php 
	session_start(); // starts the session

	if(!$_SESSION['loginUser']){// checks if the session was registered
								// (security feature so that no one can access the admin page through the URL)
		header("location: login.php?msg=Unable to access! Please enter a Username and Password.");
		
	}else
		header( 'Content-Type: text/html; charset=utf-8' ); // else, the system will continue on the admin page
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Admin Page</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="styles.css" rel="stylesheet" />
 <style>
  body {
 	 background-image: url("images/carbon_fibre_big.png");
  }
  h1.title{
     text-align: center;
     font-family: serif;
    

  }
  .addCar{
  	background-image: url("images/polonez_car.png")
  }
  

  </style>


</head>
    <body>
    <div class="container">
    <div class="jumbotron addCar">
    	<h1 class="title"><font color="black">Admin Page</font></h1>
    	
    </div>
    
    	 <button type="button" class="btn btn-primary btn-block addCar hvr-shrink" >
    	 <font color="black" size="30">Insert Text Here</font></button>
    	 <br><br>
    	 
    	 <button type="button" class="btn btn-primary btn-block addCar hvr-shrink">
    	 <font color="black" size="30">Insert Text Here</font></button>
    	 <br><br>
    	 
    	 <button type="button" class="btn btn-primary btn-block addCar hvr-shrink">
    	 <font color="black" size="30">Insert Text Here</font></button>
    	 <br><br>
    	 <form action="logout.php">
    	 	<button type="submit" class="btn btn-primary btn-block addCar hvr-shrink">
    	 </form>
    	 <font color="black" size="30">Logout</font></button>
    
    </div>
    </body>
</html>