<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription</title>
</head>
<body>
    <form method="POST" action="traitement_inscriptionjoueur.php">
       
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
    
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
