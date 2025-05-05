<?php 
session_start();
require "bdConnect.php";
$errors = [];

if (isset($_POST['submit'])) {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($nom)) {
        $errors['nom'] = 'Nom invalide';
    }
    if (empty($prenom)) {
        $errors['prenom'] = 'Prénom invalide';
    }
    if (empty($email)) {
        $errors['email'] = 'Email invalide';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email au format invalide';
    }
    if (empty($password)) {
        $errors['password'] = 'Mot de passe requis';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Mot de passe trop court (min. 6 caractères)';
    }

    if (empty($errors)) {
        try {
            $user_email = $base->prepare("SELECT * FROM users WHERE email = :email");
            $user_email->execute(["email" => $email]);
            $verify = $user_email->fetchAll();
            if (empty($verify)) {

                $user = $base->prepare("INSERT INTO `users` (`nom`, `prenom`, `email`, `password`)
                                        VALUES (:nom, :prenom, :email, :password)");
                $user->execute([
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "email" => $email,
                    "password" => $password,
                ]);

                header("Location: login.php");
                exit;
            } else {
                $errors['email'] = "L'email existe déjà";
            }
        } catch (Exception $e) {
            $errors['database'] = "Erreur de base de données : " . $e->getMessage();
        }
    }
}

$page_title = "Création d'un Compte";
$template = "Inscription";
$show = true;

include 'Connexion.phtml';
?>
