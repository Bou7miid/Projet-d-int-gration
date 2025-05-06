<?php
session_start();
include 'bdConnect.php';

if (isset($_POST['id_recette'], $_POST['note'], $_SESSION['iduser'])) {
    $id_user = $_SESSION['iduser'];
    $id_recette = (int) $_POST['id_recette'];
    $note = (int) $_POST['note'];

    $req = $base->prepare("SELECT * FROM evaluer WHERE id_user = ? AND id_recette = ?");
    $req->execute([$id_user, $id_recette]);

    if ($req->rowCount() > 0) {
        $req = $base->prepare("UPDATE evaluer SET note = ? WHERE id_user = ? AND id_recette = ?");
        $req->execute([$note, $id_user, $id_recette]);
    } else {
        $req = $base->prepare("INSERT INTO evaluer (id_user, id_recette, note) VALUES (?, ?, ?)");
        $req->execute([$id_user, $id_recette, $note]);
    }
}
header("Location: recettes.php");
exit;
?>