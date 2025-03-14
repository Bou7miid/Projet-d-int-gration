<?php
session_start();
require 'Connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $email = $_POST['Email'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);

    if ($req->rowCount() > 0) {
        echo "Cet email est déjà utilisé.";
    } else {
        // Insérer dans la base de données
        $req = $pdo->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        if ($req->execute([$nom, $prenom, $email, $password])) {
            echo "Inscription réussie.  ";
        } else {
            echo "Erreur lors de l'inscription.";
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
</head>
<body>
    <h2>Inscription</h2>
    <form method="post">
        <fieldset>
            <div>
                <label for="">Nom</label>
                <input type="text" name="Nom" placeholder="Saisissez votre nom" required><br>
            </div>
            <div>
                <label for="">Prénom</label>
                <input type="text" name="Prenom" placeholder="Saisissez votre prénom" required><br>
            </div>
            <div>
                <label for="">Email </label>
                <input type="text" name="Email" placeholder="Saisissez votre email" required><br>
            </div>
            <div>
                <label for="">Mot de passe </label>
                <input type="password" name="Password" placeholder="Saisissez un mot de passe" required><br>
            </div>
            <button type="submit">S'inscrire</button>
            <div>Vous avez un compte?<a href="Login.php">Connectez-vous</a></div>
        </fieldset>
        <a href="Deconnexion.php">Déconnexion</a>
    </form>
</body>
</html>