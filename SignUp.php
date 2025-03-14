<?php
session_start();
require 'Connexion.php';

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $email = $_POST['Email'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);

    if ($req->rowCount() > 0) {
        $message = "<div class='alert alert-danger'>Cet email est déjà utilisé.</div>";
    } else {
        $req = $pdo->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        if ($req->execute([$nom, $prenom, $email, $password])) {
            $message = "<div class='alert alert-success'>Inscription réussie.</div>";
        } else {
            $message = "<div class='alert alert-danger'>Erreur lors de l'inscription.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    <div class="form-container">
        <h2>Inscription</h2>
        <?php echo $message; ?>
        <form method="post">
            <div>
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" name="Nom" class="form-control" placeholder="Saisissez votre nom" required>
            </div>
            <div>
                <label for="Prenom" class="form-label">Prénom</label>
                <input type="text" name="Prenom" class="form-control" placeholder="Saisissez votre prénom" required>
            </div>
            <div>
                <label for="Email" class="form-label">Email</label>
                <input type="text" name="Email" class="form-control" placeholder="Saisissez votre email" required>
            </div>
            <div>
                <label for="Password" class="form-label">Mot de passe</label>
                <input type="password" name="Password" class="form-control" placeholder="Saisissez un mot de passe" required>
            </div>
            <button type="submit" class="btn-primary">S'inscrire</button>
            <div>
                Vous avez un compte ? <a href="Login.php">Connectez-vous</a>
            </div>
        </form>
        <a href="Deconnexion.php">Déconnexion</a>
    </div>
</body>
</html>