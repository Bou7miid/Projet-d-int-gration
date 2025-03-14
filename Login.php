<?php
session_start();
require 'Connexion.php';

$message = "";

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
        header("Location: .php");
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
    <link rel="stylesheet" href="CSS.css">

</head>
<body>
    <div class="form-container">
        <h2>Connexion</h2>
        <?php echo $message;?>
        <form method="post">
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="Email" placeholder="Saisissez votre email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="Password" placeholder="Saisissez votre mot de passe" required>
                </div>
            </div>
            <button type="submit" class="btn-primary">Se connecter</button>
            <div>
                Vous n'avez pas de compte ? <a href="SignUp.php">Inscrivez-vous</a>
            </div>
        </form>
    </div>
</body>
</html>