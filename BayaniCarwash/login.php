<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
<link rel="tab icon" href="images\tire.ico">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  body {
 	 background-image: url("images/background3.jpg");
  }
  h1.title{
     text-align: center;
     font-family: serif;
  }
  </style>
</head>
<body class = "bg">
<?php
	$login_form = <<<EOD
	
	
	<div class="container">
	</div>
		<div class="container">
		<div class="well well-lg">
	<form method="POST" action="validation.php" role="form">
		<div class="form-group">
		<label>Username: </label>
		<input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Username"/>
		</div>
		
		<div class="form-group">
		<label>Password: </label>
		<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password"/>
		</div>
		
		<button type="submit" class="btn btn-default" id="login"/>Login</button>
		
	</form>
		
	</div>
	</div>
	
	<div class="container">                
  	<ul class="pager">
    <li class="previous"><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
 	 </ul>
	</div>
EOD;
		echo "<div class='jumbotron'><h1 class='title'>Welcome!</h1></div>";
		echo $login_form;
		if(isset($_GET['msg'])){
		$msg=$_GET['msg'];
		if($msg!=''){
				
			if($msg == 'You have logged out!'){
				echo "<div class='alert alert-success'><strong>Success!</strong> ".$msg."</div>";
			}else{
				echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
			}
		}
		}
	?>
</body>
</html>