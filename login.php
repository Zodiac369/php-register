<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//quelque chose a été posté
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//lire la database
			$query = "select * from users2 where user_name = '$user_name' limit 1";
			$query = "select * from users2 where password = '$password' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Mauvais identifiant ou mot de passe! 
			    Veuillez créer un compte si ce n'est pas fait.";
		}else
		{
			echo "Mauvais identifiant ou mot de passe! 
			    Veuillez créer un compte si ce n'est pas fait.";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
</head>
<body>

	<style type="text/css">

	#text{

		height: 25px;
		border-radius: 50px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: red;
		border: solid;
		border-radius:20px;
	}

	#box{
        
		background-color: #1C2833;
		margin: auto;
		width: 300px;
		padding: 40px;
		border: double thick #AAB7B8;
		text-align: center;
		margin-top: 80px;
		border-radius: 250px;
	}
	body{
		background-color:#2C3E50;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 29px; font-family: fangsong; margin: 30px; color: white;">CONNECTE TOI</div>

			<input id="text" type="text" name="user_name" placeholder="Prénom"><br><br><br>
			<input id="text" type="password" name="password" placeholder="Mot de passe"><br><br><br>

			<input id="button" type="submit" value="Connexion"><br><br>
             
			<div style="font-family: fangsong; font-size:15px;">
			<a href="signup.php">Créer toi un compte ici</a><br><br>
		</form>
	</div>
</body>
</html>