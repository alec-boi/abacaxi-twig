<?php

require_once('twig-carregar.php');
require('inc/banco.php');

$dados = $pdo->query('SELECT * FROM compras');
$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compras.html', [
    'titulo' => 'Compras',
    'compras' => $comp,
]);