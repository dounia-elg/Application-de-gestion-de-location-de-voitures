<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";

// Create a connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if `idvoiture` is provided
if (isset($_GET["idvoiture"])) {
    $idvoiture = $_GET["idvoiture"];

    // Sanitize input (ensure it's a valid string or integer)
    $idvoiture = $connection->real_escape_string($idvoiture);  // Escape the input to prevent SQL injection

    // Prepared statement to delete the car
    $sql = "DELETE FROM voiture WHERE idvoiture = ?";
    $stmt = $connection->prepare($sql);

    if ($stmt) {
        // Bind the ID parameter (string or integer) and execute the statement
        $stmt->bind_param("s", $idvoiture);  // "s" means string type

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to cars page after successful deletion
            header("Location: cars.php");
            exit;
        } else {
            echo "Error deleting car: " . $connection->error;
        }
    } else {
        echo "Error preparing the SQL query.";
    }
} else {
    echo "No car ID provided.";
}

?>
