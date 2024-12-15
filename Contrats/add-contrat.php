<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contrat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex justify-center items-center py-32">
    <div class="container mx-auto px-4">
    <?php
    require '../connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idcontrat = $_POST['idcontrat'];
        $dateDebut = $_POST['dateDebut']; 
        $dateFin = $_POST['dateFin']; 
        $duree = $_POST['duree'];
        $idclient = $_POST['idclient'];
        $idvoiture = $_POST['idvoiture']; 

        $stmt = $conn->prepare("INSERT INTO contrats (idcontrat, dateDebut, dateFin, duree, idclient, idvoiture) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $idcontrat, $dateDebut, $dateFin, $duree, $idclient, $idvoiture); 

        if ($stmt->execute()) {
            echo "<p class='text-green-500'>Contrat added successfully!</p>";
            header("Location: contrats.php");
            exit;
        } else {
            echo "<p class='text-red-500'>Error: {$stmt->error}</p>";
        }

        $stmt->close();
    }
    ?>


        <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">

            <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Add New Contrat</h2>

            <div class="mb-4">
                <label for="idcontrat" class="block text-sm font-medium text-gray-600">ID Contrat</label>
                <input type="number" name="idcontrat"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="dateDebut" class="block text-sm font-medium text-gray-600">Start Date</label>
                <input type="date" name="dateDebut"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="dateFin" class="block text-sm font-medium text-gray-600">End Date</label>
                <input type="date" name="dateFin"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="duree" class="block text-sm font-medium text-gray-600">Duration</label>
                <input type="number" name="duree"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="idclient" class="block text-sm font-medium text-gray-600">ID Client</label>
                <input type="number" name="idclient"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="idvoiture" class="block text-sm font-medium text-gray-600">ID Car</label>
                <input type="text" name="idvoiture"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Add Contrat</button>

        </form>
    </div>
</body>
</html>
