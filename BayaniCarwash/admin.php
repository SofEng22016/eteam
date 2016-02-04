<?php 
	session_start(); // starts the session

	if(!$_SESSION['loginUser']){// checks if the session was registered
								// (security feature so that no one can access the admin page through the URL)
		header("location: login.php?msg=Unable to access!</br>Please enter a Username and Password.");
		
	}else
		header( 'Content-Type: text/html; charset=utf-8' ); // else, the system will continue on the admin page
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<title>Welcome, <?php echo $_SESSION['loginUser'];?></title>
</head>
    <body>
		Welcome <?php echo $_SESSION['loginUser'];?>
		<form action="logout.php">
			<input type="submit" value="Logout" id="login"/> <!-- Logs out the user in the logout.php -->
		</form>
    </body>

</html>