<?php
$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";


$connection = new mysqli($servername, $username, $password, $database);


if ($connection->connect_error){
    die("Connection failed:" . $connection->connect_error);
}
echo "Connected successfully!<br>";


?>
