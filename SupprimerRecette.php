<?php
include 'connection.php';  
session_start();
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: recettes.php');
    exit;
}
try {
    $sql = "DELETE FROM recette WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $_GET['id'] ]);
    
    header('Location: recettes.php');
    exit;
} catch (PDOException $e) {
    die("Erreur lors de la suppression : " . $e->getMessage());
}
?>
