<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex justify-center items-center py-32">
    <div class="container mx-auto px-4">
        
    <?php
    require '../connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idclient = $_POST['idclient'];
        $name = $_POST['name']; 
        $address = $_POST['address']; 
        $phone = $_POST['phone']; 

        $stmt = $conn->prepare("INSERT INTO clients (idclient, nom, adresse, tel) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $idclient, $name, $address, $phone); 

        if ($stmt->execute()) {
            echo "<p class='text-green-500'>Client added successfully!</p>";
            header("Location: clients.php");
            exit;
        } else {
            echo "<p class='text-red-500'>Error: {$stmt->error}</p>";
        }

        $stmt->close();
    }
    ?>


        <form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">

            <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Add New Client</h2>

            <div class="mb-4">
                <label for="idclient" class="block text-sm font-medium text-gray-600">ID Client</label>
                <input type="number" name="idclient"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-600">Address</label>
                <input type="text" name="address"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
                <input type="phone" name="phone"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none"  required>
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Add Client</button>

        </form>
    </div>
</body>
</html>
