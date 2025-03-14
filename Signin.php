<?php
session_start();
require 'Connexion.php';

$message = ""; // Variable pour stocker les messages d'erreur ou de succès

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $email = $_POST['Email'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);

    if ($req->rowCount() > 0) {
        $message = "<div class='alert alert-danger'>Cet email est déjà utilisé.</div>";
    } else {
        // Insérer dans la base de données
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            color: #d9534f;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #d9534f;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #c9302c;
        }
        .alert {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        a {
            color: #d9534f;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Inscription</h2>
        <?php echo $message; // Afficher les messages d'erreur ou de succès ?>
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