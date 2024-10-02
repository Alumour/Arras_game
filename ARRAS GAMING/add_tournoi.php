<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un tournoi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="/CSS/tournoi.css" rel="stylesheet">
</head>
<body>
    <?php include('header.php') ?>
    <main>
        <h2>Ajouter un nouveau tournoi</h2>
        <form method="post" action="process_tournoi.php">
            <div class="mb-3">
                <label for="nom_tournoi" class="form-label">Nom du tournoi</label>
                <input type="text" class="form-control" id="nom_tournoi" name="nom_tournoi" required>

            </div>
            <div class="mb-3">
                <label for="date_debut" class="form-label">Date début</label>
                <input type="text" class="form-control" id="nom_tournoi" name="date_debut" required>
                
            </div>
            <div class="mb-3">
                <label for="date_fin" class="form-label">Date fin</label>
                <input type="text" class="form-control" id="nom_tournoi" name="date_fin" required>
                
            </div>
            <div class="mb-3">
                <label for="plateforme" class="form-label">Plateforme</label>
                <input type="text" class="form-control" id="nom_tournoi" name="plateforme" required>
                
            </div>
            <div class="mb-3">
                <label for="id_jeu" class="form-label">Jeu</label>
                <select class="form-select" id="id_jeu" name="id_jeu" required>
                    <?php
                    // Requête pour récupérer la liste des jeux (à adapter)
                    $stmt = $pdo->prepare("SELECT id, nom FROM jeux");
                    $stmt->execute();
                    while ($jeu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $jeu['id'] . "'>" . $jeu['nom'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </main>
</body>
</html>
