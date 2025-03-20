
<?php

    require_once('twig-carregar.php');
    require('inc/banco.php');

    $comp = $_GET['id'] ?? null;

    $fetch = $pdo->prepare("SELECT item FROM compras WHERE id = :id");
    $fetch->bindvalue(":id", $comp);
    $item = $fetch->fetchAll();


    echo $twig->render('editar_item.html', [
        ':id' => $comp,
        ':item' => $item
    ]);
