<?php
include 'Connexion.php';
session_start();
  $req = $pdo->query("SELECT * FROM recette");
  $recettes = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Recettes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }
    .recette {
      border: 1px solid #ccc;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    .recette img {
      max-width: 100%;
      height: auto;
      margin-top: 10px;
    }
    h2 {
      color: #28a745;
    }
  </style>
</head>
<body>

  <h1>Liste des Recettes</h1>

  <?php if (count($recettes) > 0): ?>
    <?php foreach ($recettes as $recette): ?>
      <div class="recette">
        <h2><?= htmlspecialchars($recette['nom']) ?></h2>
        <p><strong>Temps de préparation :</strong> <?= (int)$recette['temps_preparation'] ?> min</p>
        <p><strong>Ingrédients :</strong><br><?= htmlspecialchars($recette['ingredients']) ?></p>
        <p><strong>Étapes :</strong><br><?= htmlspecialchars($recette['etapes']) ?></p>
        <?php if (!empty($recette['image'])): ?>
          <img src="<?= htmlspecialchars($recette['image']) ?>" alt="Image de la recette">
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Aucune recette trouvée.</p>
  <?php endif; ?>

</body>
</html>
