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
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("stayconnect.php");

// Récupérer les tournois à venir
$sql = "SELECT * FROM tournois WHERE date_debut > NOW()";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tournois = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Traiter le formulaire d'inscription (si soumis)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID du tournoi et de l'utilisateur
    $id_tournoi = (int)$_POST['tournament_id'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];

    // Vérifier si l'utilisateur existe
    $sql = "SELECT * FROM players WHERE pseudo= :pseudo AND email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id_joueur = $result['id'];
    } else {
        echo "Utilisateur introuvable.";
        exit;
    }

    // Insérer l'inscription
    $sql = "INSERT INTO inscription (id_tournois, id_joueur) VALUES (:id_tournois, :id_joueur)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_tournois', $id_tournoi);
    $stmt->bindParam(':id_joueur', $id_joueur);

    try {
        $stmt->execute();
        echo "Vous êtes inscrit au tournoi !";
    } catch(PDOException $e) {
        echo "Une erreur s'est produite lors de l'inscription : " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription à un tournoi</title>
    </head>
<body>
    <h1>Inscription à un tournoi</h1>
    <form method="post">
        <label for="tournament_id">Tournoi :</label>
        <select name="tournament_id" id="tournament_id">
            <?php foreach ($tournois as $tournoi): ?>
                <option value="<?= $tournoi['id_tournoi'] ?>"><?= $tournoi['nom_tournoi'] ?></option>
            <?php endforeach; ?>
        </select>
          <label for="pseudo">Pseudo :</label>

    <input type="text" name="pseudo" id="pseudo" required>



    <label for="email">Email :</label>

    <input type="email" name="email" id="email" required>


        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>