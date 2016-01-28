<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Create Tables</title>
</head>

    <body>
	    <?php
	    
	    $host = "localhost";
	    $user = "neigelYap";
	    $pass = "";
	    
	    $connect = mysql_connect($host,$user,$pass) or die("ERROR: Database connection failed");
	    
	    if($connect == true){
	    	print "MESSAGE: Database connection success";
	    }
	    
	    $dbEnvironment = "testEnvironment";
	    $dbSelect = mysql_select_db($dbEnvironment) or die("<br/>ERROR: Database selection failed<hr/>");
	    
	    if($dbSelect == true){
	    	print "<br/>MESSAGE: Database selection success<hr/>";
	    }
	    
	    $customers = "CREATE TABLE Customers (
			id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	    	lastName VARCHAR(30) NOT NULL,
	    	firstName VARCHAR(30) NOT NULL,
	    	contactNumber INT(11) NOT NULL
	    )";
	    
// 	    $cars = "CREATE TABLE Cars (
// 			id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// 	    	color VARCHAR(30) NOT NULL,
// 	    	brand VARCHAR(30) NOT NULL,
// 	    	model VARCHAR(30) NOT NULL,
// 	    	plateNumber INT(7) NOT NULL
// 	    )";
	    
// 	    $transactions = "CREATE TABLE Customers (
// 			id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// 	    	lastName VARCHAR(30) NOT NULL,
// 	    	firstName VARCHAR(30) NOT NULL,
// 	    	contactNumber INT(11) NOT NULL,
// 	    )";
		
	    if(mysql_query($customers)){
			print "MESSAGE: Table creation success";
		}else{
			print "ERROR: Table creation failed: ".mysql_error($connect);
		}
		
		mysql_close($connect)
		?>
    </body>

</html>