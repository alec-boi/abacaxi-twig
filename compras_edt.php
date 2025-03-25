<?php

require_once('twig-carregar.php');
require('inc/banco.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $item = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
        $item->execute([':id' => $id]);
        $dados = $item->fetch();

        echo $twig->render('editar_item.html', [
            'dados' => $dados,
        ]);
    }

} else {
    // post = gravar dados

    $edit = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');
    $edit->execute([
        ':item' => $_POST['item'],
        ':id' => $_POST['id']
    ]);

    header('location: compras.php');

}
