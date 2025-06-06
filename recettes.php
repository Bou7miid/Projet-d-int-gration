<?php
include 'bdConnect.php';
session_start();

$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
$params = [];
$sql = "SELECT * FROM recette";

if (!empty($search)) {
    $sql .= " WHERE nom LIKE ?";
    $params[] = "%$search%";
}

$req = $base->prepare($sql);
$req->execute($params);
$recettes = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($recettes as &$recette) {
    $eval = $base->prepare("SELECT AVG(note) as moyenne FROM evaluer WHERE id_recette = ?");
    $eval->execute([$recette['id']]);
    $result = $eval->fetch(PDO::FETCH_ASSOC);
    $recette['moyenne'] = $result['moyenne'] ?? 0;
}
unset($recette);

$template = "recettes";
include "Layout.phtml";
?>
