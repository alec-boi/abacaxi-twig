<?php

require_once('twig-carregar.php');

echo $twig->render('index.html', [
    'answer' => 'Abacaxi',
]);