<?php

// Include the database connection file
require_once("stayconnect.php");
include('header.php') ;
//require_once("check.php");

// Fetch data in descending order (lastest entry first)
$stmt = $pdo->prepare("SELECT * FROM tournois");
$stmt->execute();
$role_stmt = $pdo->prepare("SELECT name FROM role WHERE id = :user_id");
$role_stmt->bindParam(':user_id', $_SESSION['id']); 
$role_stmt->execute();

$role = $role_stmt->fetchColumn();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main id="tournois-table">
        <section >
            <h2 >Table des Tournois</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom du tournoi</th>
                        <th>Le jeu</th>
                        <th>Dates début</th>
                        <th>Dates fin</th>
                        <th>plateforme</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['id_role']) && $_SESSION['id_role'] === 2) {
                    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$res['nom_tournoi']."</td>";
                        echo "<td>".$res['jeu']."</td>";
                        echo "<td>".$res['date_debut']."</td>";
                        echo "<td>".$res['date_fin']."</td>";
                        echo "<td>".$res['plateforme']."</td>";
                        echo "<td><a href=\"edit.php?id=".$res['id_tournoi']."\" class='btn btn-warning btn-sm'>Edit</a> 
                              <a href=\"delete.php?id=".$res['id_tournoi']."\" class='btn btn-danger btn-sm' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "vous devez être admin pour accéder au crud";
                }
                    ?>
                </tbody>
            </table>
          
            <a href="ajouter_tournois.php" class='btn btn-ajout btn-sm'>Ajouter tournois</a>
        </section>
    </main>
</body>


</html>