<?php

require_once('twig-carregar.php');
require('inc/banco.php');

if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $comp = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
        $comp->execute([':id' => $id]);
        $dados = $comp->fetch();

        echo $twig->render('editar_comp.html', [
            'dados' => $dados,
            'logged' => $_SESSION['logged']
        ]);
    }

} else {
    // post = gravar dados

    $edit = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, data_cmp = :data_cmp WHERE id = :id');
    $edit->execute([
        ':titulo' => $_POST['titulo'],
        ':data_cmp' => $_POST['data_cmp'],
        ':id' => $_POST['id']
    ]);

    header('location: compromissos.php');

}
