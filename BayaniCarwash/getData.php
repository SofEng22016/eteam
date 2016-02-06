<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Verification Window</title>
</head>
    <body>
    <p></p>
    Service Availed:   
<?php if (isset($_POST['Name'])) 
    {
    	echo $_POST["Name"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name1']))
	{
    	echo $_POST["Name1"] . "<br>";
	} 
	else {}
?>

<?php if (isset($_POST['Name2'])) 
	{
    	echo $_POST["Name2"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name3'])) 
    {
    	echo $_POST["Name3"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name4'])) 
    {
    	echo $_POST["Name4"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name5'])) 
    {
    	echo $_POST["Name5"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name6'])) 
    {
    	echo $_POST["Name6"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name7'])) 
    {
    	echo $_POST["Name7"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name8'])) 
    {
    	echo $_POST["Name8"] . "<br>";
	}
	else {}
?>

<?php if (isset($_POST['Name9'])) 
    {
    	echo $_POST["Name9"] . "<br>";
	}
	else {}
?>


	
	<br>Your payment is: 
	<?php echo "P" . $_POST["payment"]; ?><br>
    
    </body>
</html>