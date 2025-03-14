<?php
session_start();
require 'Connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST['Email']);
    $password = $_POST['Password'];

    $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([$email]);
    $user = $req->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        echo('Merci');
        exit;
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
<body>
    <h2>Connexion</h2>
    <form method="post">
       <div>
       <svg  width="26" height="46" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
         <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
        </svg>
            <label for="">
                <i class="bi bi-person">
                    <input type="text" name="Email" placeholder="Saisissez votre email" required><br>
                </i>
            </label>
        </div>
        <div>
            <label for="">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="46" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
            </svg>
            <input type="password" name="Password" placeholder="Saisissez votre mot de passe" required><br>
            </label>
        </div>
        <button type="submit">Se connecter</button>
       <div>Vous n'avez pas de compte?<a href="Signin.php">Inscrivez-vous</a></div> 
    </form>
</body>
</html>
