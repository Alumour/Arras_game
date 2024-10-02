<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Tournoi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="/CSS/tournoi.css" rel="stylesheet">
</head>
<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>TOURNOIS</title>
</head>
<body>
    <h2>Ajouter un nouveau tournoi</h2>
    <br>
    
        <form action="" method="post" name="ajouter_tournois">

        <label for="nom">Nom du tournoi :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="jeu">Jeu :</label>
        <input type="text" id="jeu" name="jeu" required><br>

        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required><br>

        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" required><br>

        <label for="plateforme">Plateforme :</label>
        <input type="text" id="plateforme" name="plateforme" required><br>

        <input type="submit" value="Ajouter" name="submit">
    </form>
</body>
</html>
<?php

require_once("stayconnect.php"); // Assure-toi que cette connexion fonctionne

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $plateforme = $_POST['plateforme'];
    $jeu = $_POST['jeu'];

    try {
        // Préparation de la requête SQL (en supposant que la table s'appelle "tournois")
        $sql = "INSERT INTO tournois (nom_tournoi, date_debut, date_fin, plateforme,jeu) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql); // Remplacez $pdo par votre objet PDO

        // Exécution de la requête une seule fois
        $stmt->execute([$nom, $date_debut, $date_fin, $plateforme, $jeu ]);

        echo "<p>Tournoi ajouté avec succès !</p>";
    } catch(PDOException $e) { 
        echo "Erreur : " . $e->getMessage();
    }
    
}