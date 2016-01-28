<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Customer Entry</title>
</head>

    <body>
	    <?php
	    if(isset($_POST['customerEntry'])){
	    $host = "localhost";
	    $user = "neigelYap";
	    $pass = "";
	    $selectDB = "testEnvironment";
	    $connect = mysql_connect($host,$user,$pass,$selectDB) or die("ERROR: Database connection failed");
	     
		    if($connect == true){
		    	print "MESSAGE: Database connection success<hr/>";
		    }
	    
	    $lastName = $_POST['lastName'];
	    $firstName = $_POST['firstName'];
	    $contact = $_POST['contact'];
	    
	    $insert = "INSERT INTO customers (lastName, firstName, contactNumber)
	    			VALUES('$lastName','$firstName','$contact')";

	    mysql_select_db($selectDB);
		    if(mysql_query($insert, $connect)){
		    	print "MESSAGE: Record creation success";
		    }else{
		    	print "ERROR: Record creation failed:".mysql_error($connect);
		    }
		    
		    mysql_close($connect);
	    }else{
	    	?>
			<form method = "post" action = "<?php $_PHP_SELF ?>">
				<fieldset><legend><i>CUSTOMER DETAILS</i></legend>
	    			<p>First Name: <input type="text" name="firstName" id="firstName" size="30"></p>
					<p>Last Name: <input type="text" name="lastName" id="lastName" size="30"></p>
					<p>Contact #: <input type="number" name="contact" id="contact" size="11"></p>
				<input type="submit" name="customerEntry"value="Enter Customer" id="customerEntry">
	    	</form>
	   <?php
	    }
	    ?>
    </body>
</html>