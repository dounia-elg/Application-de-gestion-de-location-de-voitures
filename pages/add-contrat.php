<?php

$servername = "localhost";
$username = "root";
$password = "password";
$database = "gestionloca";

//create connection
$connection = new mysqli($servername, $username, $password, $database);


$idcontrat = "";
$dateDebut = "";
$dateFin = "";
$duree = "";
$idclient = "";
$idvoiture = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $idcontrat = $_POST["idcontrat"] ;
    $dateDebut = $_POST["dateDebut"];
    $dateFin = $_POST["dateFin"];
    $duree = $_POST["duree"];
    $idclient = $_POST["idclient"];
    $idvoiture = $_POST["idvoiture"];

    do {
        if ( empty($idcontrat) || empty($dateDebut) || empty($dateFin) || empty($duree) || empty($idclient) || empty($idvoiture)){
            $errorMessage = "All the fields are required";
            break;
        }

        //add new client to db

        $sql = "INSERT INTO contrats (idcontrat, dateDebut, dateFin, duree, idclient, idvoiture) 
        VALUES (' $idcontrat', '$dateDebut', '$dateFin', ' $duree', '$idclient', ' $idvoiture')";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $idcontrat = "";
        $dateDebut = "";
        $dateFin = "";
        $duree = "";
        $idclient = "";
        $idvoiture = "";

        $successMessage = "Contrat added correctly";

        header("contrats.php");
        exit;

    }while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contrat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-10 max-w-lg bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">New Contrat</h2>

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
                <label for="idcontrat" class="block text-gray-700 font-medium mb-2">ID Contrat</label>
                <input type="number" id="idcontrat" name="idcontrat" value="<?php echo $idcontrat; ?>"class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="dateDebut" class="block text-gray-700 font-medium mb-2">Start Date</label>
                <input type="date" id="dateDebut" name="dateDebut" value="<?php echo $dateDebut; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

           
            <div>
                <label for="dateFin" class="block text-gray-700 font-medium mb-2">End Date</label>
                <input type="date" id="dateFin" name="dateFin" value="<?php echo $dateFin; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div>
                <label for="duree" class="block text-gray-700 font-medium mb-2">Duration</label>
                <input type="number" id="duree" name="duree" value="<?php echo $duree; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="idclient" class="block text-gray-700 font-medium mb-2">ID Client</label>
                <input type="number" id="idclient" name="idclient" value="<?php echo $idclient; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="idvoiture" class="block text-gray-700 font-medium mb-2">ID Car</label>
                <input type="text" id="idvoiture" name="idvoiture" value="<?php echo $idvoiture; ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
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

            <a href="./contrats.php" role="button"  type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</a>
            <a href="./contrats.php" role="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>

            </div>
        </form>
    </div>
</body>
</html>
