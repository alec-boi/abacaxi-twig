<?php

require_once('twig-carregar.php');

echo $twig->render('compras.html', [
    'titulo' => 'Compras'
]);