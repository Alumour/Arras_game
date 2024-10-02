<?php
require_once("stayconnect.php");

// Récupération des données du formulaire
$nom_tournoi = $_POST['nom_tournoi'];
$id_jeu = $_POST['id_jeu'];
// ... autres données ...

// Préparation de la requête d'insertion
$stmt = $pdo->prepare("INSERT INTO tournois (nom_tournoi, id_jeu, ...) VALUES (:nom_tournoi, :id_jeu, ...)");
$stmt->bindParam(':nom_tournoi', $nom_tournoi);
$stmt->bindParam(':id_jeu', $id_jeu);
// ... autres bindParam ...

// Exécution de la requête
if ($stmt->execute()) {
    echo "Tournoi ajouté avec succès";
    // Redirection vers la page de liste des tournois
    header("Location: tournois.php");
} else {
    echo "Erreur lors de l'ajout du tournoi";
}