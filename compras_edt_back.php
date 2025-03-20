<?php

    require('inc/banco.php');

    $id = $_GET['id'] ?? null;
    $item = $_POST['item'] ?? null;

    if ($id) {

        $query = $pdo->prepare('UPDATE compras SET item=:item WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->bindValue(':item', $item);

        $query->execute();

    }

    header('location: compras.php');