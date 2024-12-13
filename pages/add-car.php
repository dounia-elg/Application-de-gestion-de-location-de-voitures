<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";

//create connection
$connection = new mysqli($servername, $username, $password, $database);


$idvoiture = "";
$marque = "";
$modele = "";
$year = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $idvoiture = $_POST["idvoiture"] ;
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $year = $_POST["year"];

    do {
        if ( empty($idvoiture) || empty($marque) || empty($modele) || empty($year)){
            $errorMessage = "All the fields are required";
            break;
        }

        

        $sql = "INSERT INTO voiture (idvoiture, marque, modele, annee) 
        VALUES ('$idvoiture', '$marque', '$modele', '$year')";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $idvoiture = "";
        $marque = "";
        $modele = "";
        $year = "";

        $successMessage = "Car added correctly";

        header("location : ./cars.php");
        exit;

    }while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-10 max-w-lg bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">New Car</h2>

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
                <label for="idvoiture" class="block text-gray-700 font-medium mb-2">ID Car</label>
                <input type="text" id="idvoiture" name="idvoiture" value="<?php echo $idvoiture; ?>"class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="marque" class="block text-gray-700 font-medium mb-2">Marque</label>
                <input type="text" id="marque" name="marque" value="<?php echo $marque; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

           
            <div>
                <label for="modele" class="block text-gray-700 font-medium mb-2">Modele</label>
                <input type="text" id="modele" name="modele" value="<?php echo $modele; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="year" class="block text-gray-700 font-medium mb-2">Year</label>
                <input type="text" id="year" name="year" value="<?php echo $year; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                <a href="./cars.php" role="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>

            </div>
        </form>
    </div>
</body>
</html>
