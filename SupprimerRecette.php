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
      position: relative;
    }
    .recette img {
      max-width: 100%;
      height: auto;
      margin-top: 10px;
    }
    h2 {
      color: #28a745;
    }
    .actions {
      margin-top: 15px;
    }
    .btn {
      padding: 8px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      font-size: 14px;
    }
    .btn-modifier {
      background-color: #ffc107;
      color: #000;
    }
    .btn-supprimer {
      background-color: #dc3545;
      color: #fff;
      margin-left: 10px;
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
        
        <div class="actions">
          <a href="modifier1.php?id=<?= $recette['id'] ?>" class="btn btn-modifier">Modifier</a>
          <a href="SupprimerRecette.php=<?= $recette['id'] ?>" class="btn btn-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?')">Supprimer</a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Aucune recette trouvée.</p>
  <?php endif; ?>

</body>
</html>