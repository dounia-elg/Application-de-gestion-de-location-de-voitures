<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex justify-center items-center py-32">
    <div class="container ">
    <?php
    require '../connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idvoiture = $_POST['idvoiture'];
        $marque = $_POST['marque']; 
        $modele = $_POST['modele']; 
        $year = $_POST['year']; 

        $stmt = $conn->prepare("INSERT INTO voiture (idvoiture, marque, modele, annee) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $idvoiture, $marque, $modele, $year); 

        if ($stmt->execute()) {
            echo "<p class='text-green-500'>Car added successfully!</p>";
            header("Location: cars.php");
            exit;
        } else {
            echo "<p class='text-red-500'>Error: {$stmt->error}</p>";
        }

        $stmt->close();
    }
    ?>


        <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">

            <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Add New Car</h2>

            <div class="mb-4">
                <label for="idvoiture" class="block text-sm font-medium text-gray-600">ID Car</label>
                <input type="text" name="idvoiture"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="marque" class="block text-sm font-medium text-gray-600">Marque</label>
                <input type="text" name="marque"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="modele" class="block text-sm font-medium text-gray-600">Modele</label>
                <input type="text" name="modele"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-600">Year</label>
                <input type="number" name="year"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Add Car</button>

        </form>
    </div>
</body>
</html>
