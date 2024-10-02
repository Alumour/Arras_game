<html lang="fr">
<head>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
    <?php include('header.php'); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/CSS/login.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body>
<?php

require_once("stayconnect.php");

                // Vérification des identifiants
                if(isset($_POST['login']) && isset($_POST['password'])) {
                    $login = $_POST['login'];
                    $password = $_POST['password'];

                    //vérifications si les identifiants sont les bons
                    $stmt = $pdo->prepare("SELECT * FROM players WHERE login = ? AND password = ?");
                    $stmt->execute([$login, $password]);
                    $count = $stmt->rowCount();
                    $user = $stmt->fetch();

                    if ($count == 1) {
                        // Connexion réussie

                        $_SESSION['login'] = $login;
                        $_SESSION['id']=$user['id_joueur'];
                        $_SESSION['id_role'] = $user['id_role'];
                        $_SESSION['pseudo'] = $user['pseudo'];
                        if ($user['id_role'] == '2') {
                            header("location: crud.php");
                        } else {
                            echo "<p>Connexion réussie !</p>";
                            header("Location: index.php");
                        }
                        exit();
                    } else {
                        echo "<p>Identifiant ou mot de passe incorrect</p>";
                    }
                }
            ?>
<body>

    <div class="login-container">
        <h2>Connexion au compte</h2>
        <form method="post" action="login.php">
            <label for="login">Nom d'utilisateur</label>
            <input type="text" id="login" name="login">

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">



            <input type="submit" value="Connexion">
        </form>

        <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous</a> !</p>
        <p><a href="#">Nom d'utilisateur oublié ?</a></p>
        <p><a href="#">Mot de passe oublié ?</a></p>
    </div>

    <div class="footer">
        
        <p><a href="#">Conditions d'utilisation</a></p>
    </div>


</body>
</html>  