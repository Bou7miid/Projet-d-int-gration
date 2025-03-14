<?php
session_start();
require 'Connexion.php';

$message = ""; // Variable pour stocker les messages d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);
    $user = $req->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        header("Location: dashboard.php"); // Rediriger vers une page après connexion réussie
        exit;
    } else {
        $message = "<div class='alert alert-danger'>Email ou mot de passe incorrect.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group .input-icon {
            position: relative;
        }
        .form-group .input-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }
        .form-group .input-icon input {
            padding-left: 40px; /* Espace pour l'icône */
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
        <h2>Connexion</h2>
        <?php echo $message; // Afficher les messages d'erreur ?>
        <form method="post">
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i> <!-- Icône Font Awesome pour l'email -->
                    <input type="text" name="Email" placeholder="Saisissez votre email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-lock"></i> <!-- Icône Font Awesome pour le mot de passe -->
                    <input type="password" name="Password" placeholder="Saisissez votre mot de passe" required>
                </div>
            </div>
            <button type="submit" class="btn-primary">Se connecter</button>
            <div>
                Vous n'avez pas de compte ? <a href="Signin.php">Inscrivez-vous</a>
            </div>
        </form>
    </div>
</body>
</html>