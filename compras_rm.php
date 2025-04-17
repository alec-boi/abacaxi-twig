<?php

    require('inc/banco.php');

    if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
        header("location: login.php");
        exit;
    }

    $item = $_GET['id'] ?? null;

    if ($item) {

        $query = $pdo->prepare('DELETE FROM compras WHERE id = :id');
        $query->bindValue(':id', $item);

        $query->execute();

    }

    header('location: compras.php');