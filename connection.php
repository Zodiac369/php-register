<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("connexion échoué!");
}

