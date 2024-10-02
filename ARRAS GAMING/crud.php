<?php
// Inclut le fichier de connexion à la base de données
require_once("stayconnect.php");

// Récupère les données par ordre décroissant (la dernière entrée en premier)
$stmt = $pdo->prepare("SELECT * FROM players ORDER BY id ");
$stmt->execute();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>

<body>
    <main>
        <?php include('header.php') ?>
        <h2>CRUD</h2>
        <p>
            <a href="#">Crud Utilisateurs</a>

            <a href="#">Add New Data</a>
        </p>
        <table width='80%' border=0>
            <tr bgcolor='#DDDDDD'>
                <td><strong>Id</strong></td>
                <td><strong>Login</strong></td>
                <td><strong>Password</strong></td>
                <td><strong>email</strong></td>
                <td><strong>Pseudo</strong></td>
                <td><strong>Action</strong></td>
            </tr>
            <?php
            // Récupère la ligne suivante d'un jeu de résultats sous forme de tableau associative
            while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$res['id']."</td>";
                echo "<td>".$res['login']."</td>";
                echo "<td>".$res['password']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['pseudo']."</td>";
                echo "<td><a href=\"edit.php?id=".$res['id']."\">Edit</a> | 
                <a href=\"delete.php?id=".$res['id']."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            }

            ?>
        </table>
    </main>
</body>
</html>