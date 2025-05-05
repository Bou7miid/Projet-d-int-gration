<?php
include 'bdConnect.php';
session_start();
$req = $base->query("SELECT * FROM recette");
$recettes = $req->fetchAll(PDO::FETCH_ASSOC);

$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

$sql = "SELECT * FROM recette";
$params = [];

if (!empty($search)) {
    $sql .= " WHERE nom LIKE ?";
    $params[] = "%$search%";
}

$req = $base->prepare($sql);
$req->execute($params);
$recettes = $req->fetchAll();

foreach ($recettes as &$recette) {
    $eval = $base->prepare("SELECT AVG(note) as moyenne FROM evaluer WHERE id_recette = ?");
    $eval->execute([$recette['id']]);
    $result = $eval->fetch(PDO::FETCH_ASSOC);
    $recette['moyenne'] = $result['moyenne'] ?? 0;
}
unset($recette);
$template = "recettesV";
include "Layout.phtml";
?>