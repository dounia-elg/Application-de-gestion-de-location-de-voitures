<?php

require '../connect.php';

if (isset ($_GET['idcontrat'])) {
    $idcontrat = $_GET['idcontrat'];

    $stmt = $conn->prepare("DELETE FROM contrats WHERE idcontrat = ?");
    $stmt->bind_param("i" , $idcontrat);

    if ($stmt->execute()) {
        echo "Contrat deleted successfully!";
    }else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}else {
    echo "NO contrat ID provided.";
}

?>