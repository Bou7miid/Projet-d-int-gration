<?php 
include 'bdConnect.php';
session_start();

$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

$sql = "SELECT id, nom, ingredients, etapes, temps_preparation, image FROM recette";
$params = [];

if (!empty($search)) {
    $sql .= " WHERE nom LIKE ?";
    $params[] = '%' . $search . '%';
}

$query = $base->prepare($sql);
$query->execute($params);
$recettes = $query->fetchAll();

$template = "Recherche";
include "Layout.phtml";
?>
