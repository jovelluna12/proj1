<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>
	<style>
		#wrap{
			padding: 150px;
		}
		#box{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			background-color: grey;
			border-radius: 5px;
			border: solid thin #aaa;
			margin: auto;
			width: 300px;
			padding: 20px;
		}
		a:link{
			text-decoration:none;
		}
		#link-btn{
			color: black;
			margin: 40%;
		}

	</style>
	<div id="wrap">
		<div id="box">
			Hello, <?php echo $user_data['user_name']; ?>
			<h1>This is the index page</h1>
			<br>
			<a id="link-btn" href="logout.php">Logout</a>
		</div> 
	</div>
</body>
</html>