<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex justify-center items-center py-32">
    <div class="container mx-auto px-4">

    <?php

    require '../connect.php';

    if (isset ($_GET['idvoiture'])) {
        $idvoiture = $_GET['idvoiture'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $idvoiture = $_POST['idvoiture']; 
            $marque = $_POST['marque']; 
            $modele = $_POST['modele'];
            $year = $_POST['year']; 

            
            $stmt = $conn->prepare("UPDATE voiture SET idvoiture = ?, marque = ?, modele = ?, annee = ? WHERE idvoiture = ?");
            $stmt->bind_param("sssis", $idvoiture, $marque, $modele, $year, $idvoiture);

            if ($stmt->execute()) {
                echo "car updated successfully!";
                header("Location: cars.php");
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();


            }

            $stmt = $conn->prepare("SELECT * FROM voiture WHERE idvoiture = ?");
            $stmt->bind_param("s", $idvoiture);
            $stmt->execute();
            $result = $stmt->get_result();
            $car = $result->fetch_assoc();
            $stmt->close();
            
    }

    ?>

    <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">

        <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Edit Car</h2>

        <div class="mb-4">
            <label for="idvoiture" class="block text-sm font-medium text-gray-600">ID Car</label>
            <input type="text" name="idvoiture"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $car['idvoiture'] ?>" required>
        </div>

        <div class="mb-4">
            <label for="marque" class="block text-sm font-medium text-gray-600">Marque</label>
            <input type="text" name="marque"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $car['marque'] ?>" required>
        </div>

        <div class="mb-4">
            <label for="modele" class="block text-sm font-medium text-gray-600">Modele</label>
            <input type="text" name="modele"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $car['modele'] ?>" required>
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-gray-600">Year</label>
            <input type="number" name="year"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none" value="<?= $car['annee'] ?>" required>
        </div>

        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Edit Car</button>

    </form>
    </div>
</body>
</html>
