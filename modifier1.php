<?php
include 'Connexion.php';
session_start();


if(!isset($pdo)) {
    die("Erreur de connexion à la base de données");
}

if(isset($_POST['modifier'])) {
    $id = (int)$_POST['id'];
    $nom = $_POST['nom'];
    $temps_preparation = (int)$_POST['temps_preparation'];
    $ingredients = $_POST['ingredients'];
    $etapes = $_POST['etapes'];
    
    try {
$req = $pdo->prepare("UPDATE recette SET 
nom = :nom, 
temps_preparation = :temps_preparation, 
 ingredients = :ingredients, 
 etapes = :etapes 
WHERE id = :id");
        
$req->execute([
':nom' => $nom,
':temps_preparation' => $temps_preparation,
':ingredients' => $ingredients,
':etapes' => $etapes,
':id' => $id ]);
        
$_SESSION['message'] = "Recette modifiée avec succès";
header("Location: recettes.php");
exit();
} catch(PDOException $e) {
die("Erreur lors de la modification : " . $e->getMessage());
 }
}


if(isset($_GET['id'])) {
$id = (int)$_GET['id'];
$req = $pdo->prepare("SELECT * FROM recette WHERE id = :id");
$req->execute([':id' => $id]);
$recette = $req->fetch(PDO::FETCH_ASSOC);
    
    if(!$recette) {
die("Recette non trouvée");
    }
} else {
die("ID de recette non spécifié");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Recette</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: auto; padding: 20px; }
        div { margin-bottom: 10px; }
        label { display: inline-block; width: 150px; }
        textarea { width: 100%; height: 100px; }
        button { padding: 8px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Modifier la Recette</h1>
    
    <form method="post">
 <input type="hidden" name="id" value="<?php echo htmlspecialchars($recette['id']); ?>">
        
        <div>
<label>Nom :</label>
 <input type="text" name="nom" value="<?php echo htmlspecialchars($recette['nom']); ?>" required>
        </div>
        
        <div>
<label>Temps de préparation (minutes) :</label>
 <input type="number" name="temps_preparation" value="<?php echo htmlspecialchars($recette['temps_preparation']); ?>" required>
        </div>
        
        <div>
 <label>Ingrédients :</label>
 <textarea name="ingredients" required><?php echo htmlspecialchars($recette['ingredients']); ?></textarea>
        </div>
        
        <div>
 <label>Étapes :</label>
 <textarea name="etapes" required><?php echo htmlspecialchars($recette['etapes']); ?></textarea>
        </div>
        
<button type="submit" name="modifier">Enregistrer les modifications</button>
    </form>
</body>
</html>