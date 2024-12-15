<?php

require '../connect.php';

$idvoiture = '567SSSSS';  

if (isset ($_GET['idvoiture'])) {
    $idvoiture = $_GET['idvoiture'];

    $stmt = $conn->prepare("DELETE FROM voiture WHERE idvoiture = ?");
    $stmt->bind_param("s" , $idvoiture);

    if ($stmt->execute()) {
        echo "Car deleted successfully!";
    }else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}else {
    echo "NO car ID provided.";
}

?>