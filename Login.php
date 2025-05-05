<?php
session_start();
require 'bdConnect.php';

$email='';
$password='';
$errors=[];

if (isset($_POST['submit'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
   
    if (empty($email)) {
        $errors['email'] = 'Veuillez entrer votre email.';
    }
    if (empty($password)) {
        $errors['password'] = 'Veuillez entrer votre mot de passe.';
    }
    if (empty($errors)) {
        $res = $base->prepare("SELECT * FROM users WHERE email = :email");
        $res->execute(["email" => $email]);
        $user = $res->fetch();

        if ($user) {
            if ($password==$user['password']){

                $_SESSION['nom'] = $user['nom'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['iduser'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                
                if ($user['email'] == "admin@gmail.com") {
                    header("Location: recettes.php");
                } 
                else {
                    header("Location: recettesV.php");
                }
            }
        } else {
            $errors['global'] = "Cet email n'existe pas.";
        }
    }

}
$template="Login";
include "Connexion.phtml";
?>