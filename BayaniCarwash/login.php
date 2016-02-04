<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Admin Login</title>
<link rel="tab icon" href="images\tire.ico">
<link href="admin_styles.css" rel="stylesheet" />
</head>
<body>
<?php
	$login_form = <<<EOD
	
	<form method="POST" action="validation.php">
		<p>Username: <input type="text" id="userName" name="userName"/></p>
		<p>Password: <input type="password" id="pass" name="pass"/></p>
		<p><input type="submit" value="LOGIN" id="login"/></p>
	</form>
		</div>
	</div>
EOD;
	$msg=$_GET['msg'];
	if($msg!=''){
		echo "<div class='container'><div class='bottom'><p><font color='#BF0040'>".$msg."</font></p></div></div>";
	}
		echo "<div class='container'><div class='center'><h1>Welcome!</h1>";
		echo $login_form;
	?>
</body>
</html>