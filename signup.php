<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$encrypted_pass=password_hash($password,PASSWORD_DEFAULT);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$encrypted_pass')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100%;
		background-color: #008CBA;
		border: none;
	}

	#box{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	#box-wrap{
		padding:150px;
	}
	#box{
		background-color: grey;
		border-radius: 5px;
		border: solid thin #aaa;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	a:link{
		text-decoration: none;
		
	}
	#linkbtn{
		color: black;
		margin: 42%;
	}
	</style>
	<div id="box-wrap"> 
		<div id="box">
			<form method="post">
				<div style="font-size: 20px;margin: 10px;color: white;">Registration</div>
				<input id="text" type="text" name="user_name"><br><br>
				<input id="text" type="password" name="password"><br><br>
				<input id="button" type="submit" value="Sign up"><br><br>
				<a id="linkbtn" href="login.php">Login</a><br><br>
			</form>
		</div>
	</div>
</body>
</html>