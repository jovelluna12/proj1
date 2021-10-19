<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		$encrypted_pass=$_SESSION["hash"];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if(password_verify($password,$user_data['password']))
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		color:black;
		border: none;
	}
	#box-wrap{
		padding:150px;
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
				<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
				<input id="text" type="text" name="user_name"><br><br>
				<input id="text" type="password" name="password"><br><br>
				<input id="button" type="submit" value="Login"><br><br>
				<a id="linkbtn" href="signup.php">Signup</a><br><br>
			</form>
		</div>
	</div>
</body>
</html>