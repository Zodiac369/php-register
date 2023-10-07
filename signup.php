<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($confirm_password)) {
        // Les champs ont été remplis correctement

        if ($password == $confirm_password) {
            
            $user_id = random_num(20);
            $query = "insert into users2 (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die();
        } else {
            
            echo "Les mots de passe ne correspondent pas.";
        }
    } else {
        
        echo "Veuillez remplir tous les champs.";
    }
}
?>


<script>
function showPassword() {
    var passwordInput = document.getElementById("password");
    var confirmPasswordInput = document.getElementById("confirm_password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        confirmPasswordInput.type = "text";
    } else {
        passwordInput.type = "password";
        confirmPasswordInput.type = "password";
    }
}
</script>


<!DOCTYPE html>
<html>
<head>
    <title>INSCRIPTION</title>
</head>
<body>
    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 20px;
            padding: 4px;
            border: solid thin #aaa;
            width: 250px;
        }

        #buttonCréer {
            padding: 10px;
            width: 180px;
            color: black;
            background-color: white;
            border: solid;
            border-radius: 20px;
            margin-top: 0px;
        }
		#button {
			background-color: black;
			color: white;
			border: solid thin;
			border-radius:10px;
		}
		

        #box {
            background-color: #5D6D7E;
            margin: auto;
            width: 300px;
            padding: 40px;
            border: double thick #AAB7B8;
            margin-top: 80px;
            text-align: center;
            border-radius: 90px;
            color: red;
        }

        body {
            background-color: #2C3E50;
        }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 29px;margin: 10px;color: white; padding: 10px; color:black; padding:10px;">INSCRIPTION</div>

            <input style="border-radius: 10px; height: 28px; width: 250px" id="text" type="text" name="user_name" placeholder="Prénom"><br><br>

            <input style="border-radius: 10px; height: 28px; width: 250px" id="password" type="password" name="password" placeholder="Mot de passe"><br><br>
            <input style="border-radius: 10px; height: 28px; width: 250px" id="confirm_password" type="password" name="confirm_password" placeholder="Confirmer le MDP"><br><br>

            <button id="button" type="button" onclick="showPassword()">Afficher/Masquer<br></button><br><br>

            <input style="font-size: 15px;" id="buttonCréer" type="submit" value="Créer mon compte">

