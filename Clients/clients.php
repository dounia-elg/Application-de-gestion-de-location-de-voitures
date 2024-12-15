<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style-clients.css">
</head>
<body class="bg-black">

    <!-----------------Header----------------------->
    <nav class="header">
        <div class="logo ">
            <img src="../img/logooo.png" href="../home.html" alt="car Logo">
        </div>
        <div class="nav-menu">
            <ul>
                <li><a href="../home.html" >Home</a></li>
                <li><a href="../Clients/clients.php" class="active">Clients</a></li>
                <li><a href="../Cars/cars.php">Cars</a></li>
                <li><a href="../Contrats/contrats.php">Contrats</a></li>
            </ul>
        </div>
    </nav>




    <div class="container mx-auto mt-[150px] px-20">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-yellow-500">All Clients</h2>
            <a class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600" href="add-client.php" role="button">Add Client</a>
        </div>

        <?php
        require '../connect.php';

        $result = $conn->query("SELECT * FROM clients");

        if ($result->num_rows > 0) {
            echo "<div class='bg-white shadow-md rounded-lg overflow-hidden'>
                    <table class='table-auto w-full border-collapse'>
                        <thead class='bg-[#F2E8C6] text-gray-700'>
                            <tr>
                                <th class='px-4 py-2 border'>ID Client</th>
                                <th class='px-4 py-2 border'>Name</th>
                                <th class='px-4 py-2 border'>Address</th>
                                <th class='px-4 py-2 border'>Phone</th>
                                <th class='px-4 py-2 border'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";

            while ($row = $result->fetch_assoc()) {

                echo "<tr class='hover:bg-gray-300'>
                        <td class='px-4 py-2 border'>{$row['idclient']}</td>
                        <td class='px-4 py-2 border'>{$row['nom']}</td>
                        <td class='px-4 py-2 border'>{$row['adresse']}</td>
                        <td class='px-4 py-2 border'>{$row['tel']}</td>
                        <td class='px-4 py-2 border flex items-center justify-center gap-2'>
                            <a class='bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600' href='edit-client.php?idclient=$row[idclient]'>Edit</a>
                            <a class='bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600' href='delete-client.php?idclient=$row[idclient]'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "    </tbody>
                    </table>
                </div>";

        } else {
            echo "<p class='text-center text-gray-600'>No clients found.</p>";
        }
        ?>
    </div>
</body>
</html>
