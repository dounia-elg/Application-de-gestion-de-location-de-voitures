<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-10 px-4">

        <!---------- Header Section ---------->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">All Cars</h2>
            <a class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600" href="add-car.php" role="button">Add Car</a>
        </div>

        <!---------- Table Section ----------->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">

            <table class="table-auto w-full border-collapse">

                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">ID Car</th>
                        <th class="px-4 py-2 border">Marque</th>
                        <th class="px-4 py-2 border">Modele</th>
                        <th class="px-4 py-2 border">Year</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "password";
                    $database = "gestionloca";

                    //create connection
                    $connection = new mysqli($servername, $username, $password, $database);

                    //check connection
                    if ($connection->connect_error){
                        die("Connection failed:" . $connection->connect_error);
                    }

                    //read all row from database table
                    $sql = "SELECT * FROM voiture";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query:" . $connection->error);
                    }

                    //read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr class='hover:bg-gray-100'>
                            <td class='px-4 py-2 border'>$row[idvoiture]</td>
                            <td class='px-4 py-2 border'>$row[marque]</td>
                            <td class='px-4 py-2 border'>$row[modele]</td>
                            <td class='px-4 py-2 border'>$row[annee]</td>
                            <td class='px-4 py-2 border text-center'>
                                <a class='bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600' href='edit-car.php?idvoiture=$row[idvoiture]'>Edit</a>
                                <a class='bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600' href='delete-car.php?idvoiture=$row[idvoiture]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>

</body>
</html>
