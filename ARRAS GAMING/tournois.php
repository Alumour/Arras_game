<?php 
require_once("stayconnect.php");
$stmt = $pdo->prepare("SELECT *FROM tournois");
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournois</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="/CSS/tournoi.css" rel="stylesheet">
<body>
<?php include('header.php') ?>
<head>
</body>
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
                        <th>Plateforme</th>
</tr>
                </thead>
                <tbody>
                    <?php
                    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$res['nom_tournoi']."</td>";
                        echo "<td>".$res['jeu']."</td>";
                        echo "<td>".$res['date_debut']."</td>";
                        echo "<td>".$res['date_fin']."</td>";
                        echo "<td>".$res['plateforme']."<td>";
                        echo "<td><a href=\"traitement_inscription.php?id=".$res['id_tournoi']."\" class='btn btn-warning btn-sm'>inscription</a>";
                    }
                    
                    ?>
                </tbody>
                
            </table>
            
        
        </section>
    </main>
    
    
</head>
<body>
</body>
</html>
