<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contrat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex justify-center items-center py-32">
    <div class="container mx-auto px-4">

    <?php

    require '../connect.php';

    if (isset ($_GET['idcontrat'])) {
        $idcontrat = $_GET['idcontrat'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dateDebut = $_POST['dateDebut']; 
            $dateFin = $_POST['dateFin']; 
            $duree = $_POST['duree']; 

            
            $stmt = $conn->prepare("UPDATE contrats SET dateDebut = ?, dateFin = ?, duree = ? WHERE idcontrat = ?");
            $stmt->bind_param("ssii", $dateDebut, $dateFin, $duree, $idcontrat);

            if ($stmt->execute()) {
                echo "contratt updated successfully!";
                header("Location: contrats.php");
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();


            }

            $result = $conn->query("SELECT * FROM contrats WHERE idcontrat = $idcontrat");
            $contrat = $result->fetch_assoc();
            
    }

    ?>

    <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">

        <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Edit Contrat</h2>

        <div class="mb-4">
            <label for="dateDebut" class="block text-sm font-medium text-gray-600">Start Date</label>
            <input type="date" name="dateDebut"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $contrat['dateDebut'] ?>" required>
        </div>

        <div class="mb-4">
            <label for="dateFin" class="block text-sm font-medium text-gray-600">End Date</label>
            <input type="date" name="dateFin"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $contrat['dateFin'] ?>"  required>
        </div>

        <div class="mb-4">
            <label for="duree" class="block text-sm font-medium text-gray-600">Duration</label>
            <input type="number" name="duree"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $contrat['duree'] ?>"  required>
        </div>

        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Edit Contrat</button>

    </form>
    </div>
</body>
</html>
