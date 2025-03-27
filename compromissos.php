<?php

require_once('twig-carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos');
$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

$weekends = [];

foreach ($compromissos as $compromisso) {
    if (Carbon::parse($compromisso['data_cmp'])->isWeekend()) {
        array_push($weekends, $compromisso['data_cmp']);
    }
}

echo $twig->render('compromissos.html', [
    'compromissos' => $compromissos,
    'weekends' => $weekends
]);