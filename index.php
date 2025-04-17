<?php

require_once('twig-carregar.php');

session_start();

echo $twig->render('index.html', [
    'answer' => 'Abacaxi',
    'logged' => $_SESSION['logged'] ?? false,
    'usuario' => $_SESSION['usuario'] ?? ''
]);