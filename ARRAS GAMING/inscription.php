<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('header.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/CSS/styles.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
        
    <div class="login-container">
        <h2>INSCRIPTION</h2>

        <form method="post" action="inscriptionaction.php">

            <label for="login">Login</label>
            <input type="text" id="login" name="login">

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">

            <label for="username">Emails</label>
            <input type="text" id="email" name="email">

            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo">

        <br>
        </br>

            <input type="submit" name="submit" value="Inscription">
        </form>

       
    </div>
    <div class="footer">
        <p>Connecter vous à la Boutique en ligne !</p>
        <br>
        <br>
        <br>
        <p><a href="#">Conditions d'utilisation</a></p>
    </div>
</body>
<body>
    
       
    </form>
</body>
</html>   