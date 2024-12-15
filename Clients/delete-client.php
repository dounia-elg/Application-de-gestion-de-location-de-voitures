<?php

require '../connect.php';

if (isset ($_GET['idclient'])) {
    $idclient = $_GET['idclient'];

    $stmt = $conn->prepare("DELETE FROM clients WHERE idclient = ?");
    $stmt->bind_param("i" , $idclient);

    if ($stmt->execute()) {
        echo "Client deleted successfully!";
        header("Location: clients.php");
            exit;
    }else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}else {
    echo "NO client ID provided.";
}

?>