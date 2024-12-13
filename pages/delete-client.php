<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET["idclient"])) {
    $idclient = $_GET["idclient"];

    $sql = "DELETE FROM clients WHERE idclient = $idclient";
    $connection->query($sql);
}

header("Location: clients.php");
exit;

?>
