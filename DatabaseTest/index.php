<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Bayani Car Wash</title>
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
			
		echo '<form action="createTables.php">
			  <input type="submit" value="Create Tables" id="createTables">
			  </form>';
		echo '<form action="insertCustomer.php">
			  <input type="submit" value="Customer Entry" id="insertCustomer">
			  </form>';
		?>
		
	</body>
</html>