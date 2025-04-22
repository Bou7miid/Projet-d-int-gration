//code modifier recette
<?php
include 'Connexion.php';
session_start();

// Récupérer l'ID de la recette à modifier
$id = $_POST['id'];
$nom = $_POST['nom'];
$ingredients = $_POST['ingredients'];
$etapes = $_POST['etapes'];
$temps = $_POST['temps'];

try {
    $req = "UPDATE recette SET nom=?, ingredients=?, etapes=?, temps_preparation=? WHERE id=?";
    $res = $pdo->prepare($req);
    $res->execute([$nom, $ingredients, $etapes, $temps, $id]);

    echo "<script>
        alert('✅ Recette modifiée avec succès !');
        window.location.href = 'recettes.php';
    </script>";
} catch (PDOException $e) {
    echo "<script>
        alert('❌ Erreur lors de la modification : " . addslashes($e->getMessage()) . "');
        window.history.back();
    </script>";
}
?>