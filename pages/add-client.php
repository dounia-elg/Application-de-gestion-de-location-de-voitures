<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";

//create connection
$connection = new mysqli($servername, $username, $password, $database);


$idclient = "";
$name = "";
$address = "";
$phone = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $idclient = $_POST["idclient"] ;
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    do {
        if ( empty($idclient) || empty($name) || empty($address) || empty($phone)){
            $errorMessage = "All the fields are required";
            break;
        }

        //add new client to db

        $sql = "INSERT INTO clients (idclient, nom, adresse, tel) 
        VALUES ('$idclient', '$name', '$address', '$phone')";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $idclient = "";
        $name = "";
        $address = "";
        $phone = "";

        $successMessage = "Client added correctly";

        header("clients.php");
        exit;

    }while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-10 max-w-lg bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">New Client</h2>

        <!------------- Error Message --------------->
        <?php 
            if (!empty($errorMessage)) { 
                echo "
                <div class='bg-yellow-100 text-yellow-700 border-l-4 border-yellow-500 p-4 mb-4'>
                    <strong>$errorMessage</strong>
                    <button class='float-right text-yellow-700 font-bold' onclick='this.parentElement.style.display=\"none\";'>×</button>
                </div>";
            }
            
        ?>

        <form method="post" class="space-y-4">
            
            <div>
                <label for="idclient" class="block text-gray-700 font-medium mb-2">ID Client</label>
                <input type="number" id="idclient" name="idclient" value="<?php echo $idclient; ?>"class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

           
            <div>
                <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!------------ Success Message ---------->
            <?php 
                if (!empty($successMessage)) {
                    echo "
                    <div class='bg-green-100 text-green-700 border-l-4 border-green-500 p-4 mb-4'>
                        <strong>$successMessage</strong>
                        <button class='float-right text-green-700 font-bold' onclick='this.parentElement.style.display=\"none\";'>×</button>
                    </div>";

                }
            ?>

            <!-------------- Buttons ----------->
            <div class="flex justify-between items-center">

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
                <a href="clients.php" role="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>

            </div>
        </form>
    </div>
</body>
</html>
