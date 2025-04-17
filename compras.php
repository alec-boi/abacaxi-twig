<?php

require_once('twig-carregar.php');
require('inc/banco.php');

$dados = $pdo->query('SELECT * FROM compras');
$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

session_start();

echo $twig->render('compras.html', [
    'compras' => $comp,
    'logged' => $_SESSION['logged']
]);