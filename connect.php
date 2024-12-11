<?php
$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";

//create connection
$connection = new mysqli($servername, $username, $password, $database);

//check connection
if ($connection->connect_error){
    die("Connection failed:" . $connection->connect_error);
}
echo "Connected successfully!<br>";


?>
