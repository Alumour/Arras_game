<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/CSS/styles.css" rel="stylesheet">
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <?php
    require_once("stayconnect.php");

    if (isset($_POST['submit'])) {
        // Escape special characters in string for use in SQL statement	
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        //check email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse e-mail est valide.";
        } else {
            echo "L'adresse e-mail n'est pas valide.";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }
        // Check for empty fields
        if (empty($login) || empty($password) || empty($pseudo) ) {
            if (empty($login)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }
            
            if (empty($password)) {
                echo "<font color='red'>Age field is empty.</font><br/>";
            }
            if (empty($pseudo)) {
                echo "<font color='red'>Age field is empty.</font><br/>";
            }
            // Show link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else { 
            // If all the fields are filled (not empty) 
    
            // Insert data into database
            $stmt = $pdo->prepare("INSERT INTO players (`login`, `password`,`email`,`pseudo`) VALUES (?,?,?,?)");
            $stmt->execute([$login, $password, $email, $pseudo]);
            // Display success message
            echo "<p><font color='green'>Data added successfully!</p>";
            echo "<a href='index.php'>View Result</a>";
        }
    }
    ?>
</body>
</html>