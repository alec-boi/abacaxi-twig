<?php

    require('inc/banco.php');

    if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
        header("location: login.php");
        exit;
    }

    $id = $_GET['id'] ?? null;

    if ($id) {

        $query = $pdo->prepare('DELETE FROM compromissos WHERE id = :id');
        $query->bindValue(':id', $id);

        $query->execute();

    }

   header('location: compromissos.php');