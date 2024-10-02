<?php 
require_once("stayconnect.php");
session_start();

$id = $_GET['id'];


    try {
        $sql = "DELETE FROM tournois WHERE id_tournoi =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: crudtournois.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    } 




?>