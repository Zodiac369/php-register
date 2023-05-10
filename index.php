<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mon site Web</title>
</head>
<body>

	<a href="logout.php">Déconnexion</a>
	<h1>Bienvenue !!</h1>

	<br>
	Content de te voir <?php echo $user_data['user_name'],"🤗"; ?>
</body>
</html>