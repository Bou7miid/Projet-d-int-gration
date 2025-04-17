<?php
include 'Connexion.php';
session_start();

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$ingredients = $_POST['ingredients'];
$etapes = $_POST['etapes'];
$temps = $_POST['temps'];

// Gérer l'image (upload)
/*$image = null;
if (!empty($_FILES['image']['name'])) {
    $target_dir = "C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Projeeet\img";
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $target_file; 
    } else {
        echo "<script>alert('❌ Erreur lors de l\'upload de l\'image.'); window.history.back();</script>";
        exit;
    }
}*/

try {
    $req = "INSERT INTO recette (nom, ingredients, etapes, temps_preparation, image) VALUES (?, ?, ?, ?, ?)";
    $res = $pdo->prepare($req);
    $res->execute([$nom, $ingredients, $etapes, $temps, $image]);

    echo "<script>alert('✅ Recette ajoutée avec succès !'); window.location.href = 'recettes.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('❌ Erreur lors de l\'ajout : " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
}
?>
