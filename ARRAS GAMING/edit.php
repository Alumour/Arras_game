<?php
include('header.php');
require_once("stayconnect.php"); 

$id = $_GET['id'];
?>
<html>
<head>
    <title>Modifier tournoi</title>
</head>
<body>
    <h2>Modifier Tournoi</h2>
        <form action="" method="post" name="ajouter_tournois">

        <label for="nom">Nom du tournoi :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="jeu">Jeu :</label>
        <input type="text" id="jeu" name="jeu" required><br>

        <label for="date_debut">Date de début :</label>
        <input type="datetime-local" id="date_debut" name="date_debut" required><br>

        <label for="date_fin">Date de fin :</label>
        <input type="datetime-local" id="date_fin" name="date_fin" required><br>

        <label for="plateforme">Plateforme :</label>
        <input type="text" id="plateforme" name="plateforme" required><br>

        <input type="submit" value="Modifier" name="submit">
    </form>
</body>
</html>
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $plateforme = $_POST['plateforme'];
    $jeu = $_POST['jeu'];


    try {
        // Préparation de la requête SQL
        $sql = "UPDATE tournois SET nom_tournoi = :nom, date_debut = :date_debut, date_fin = :date_fin, plateforme = :plateforme, jeu = :jeu WHERE id_tournoi = :id_tournoi";
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);
        $stmt->bindParam(':plateforme', $plateforme);
        $stmt->bindParam(':jeu', $jeu);
        $stmt->bindParam(':id_tournoi', $id);

        // Exécution de la requête
        $stmt->execute();

        echo "<p>Tournoi mis à jour avec succès !</p>";
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}














