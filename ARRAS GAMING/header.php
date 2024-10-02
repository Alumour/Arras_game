

<head>
<?php require_once("stayconnect.php"); ?>
</head>
<footer>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="index.php">
        <img src="/image/image logo.webp" alt="image" height="50" width="50">
    </a>
    <!-- Bouton hamburger pour les écrans plus petits -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" href="index.php">Accueil</a>
            <a class="nav-link" href="tournois.php">Tournois</a>
            <a class="nav-link" href="Mentions légale.php">Mentions Légales</a>
            
            <li>
          
                    <?php
                    session_start(); 
                    if (isset($_SESSION['id_role']) && $_SESSION['id_role'] === 2) {
                     echo '<a class="nav-link" href="crudtournois.php">Crud Tournoi</a>';
                  }
                    // Vérifie si la session contient un nom d'utilisateur
                    if(isset($_SESSION['pseudo'])) {
                        // Si un nom d'utilisateur est présent dans la session, affiche un bouton de déconnexion
                        echo '<a class="nav-link" href="deconnexion.php">Déconnexion</a>';
                    } else {
                        // Si aucun nom d'utilisateur n'est présent dans la session, affiche un bouton de connexion
                        echo '<a class="nav-link" href="login.php">login</a>';
                    }
                    ?>
                    </li>
        </div>
    </div>
</nav>

        <?php if (isset($_SESSION['role']) && ($_SESSION['id_role'] == '2' )) : ?>
                <li><a href="/arrasGames/crudTournament.php" class="tm-text-pink py-1 md:py-3 px-4">Crud Tournois</a></li>
            <?php endif; ?>
        <li>
          <?php if(isset($_SESSION['pseudo'])){ echo $_SESSION['pseudo'] ; } 
          ?>
        </li>
</footer>