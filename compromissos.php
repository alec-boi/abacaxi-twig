<?php

require_once('twig-carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$ordem = $_GET['ordem'] ?? 'asc-date';

    switch ($ordem) {
        case 'des-date':
            $query = 'SELECT * FROM compromissos ORDER BY data_cmp DESC';
            break;
        case 'asc-alph':
            $query = 'SELECT * FROM compromissos ORDER BY titulo';
            break;
        case 'des-alph':
            $query = 'SELECT * FROM compromissos ORDER BY titulo DESC';
            break;
        default:
            $query = 'SELECT * FROM compromissos ORDER BY data_cmp';
            break;
    } 

$dados = $pdo->query($query);
$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

$weekends = [];

foreach ($compromissos as $compromisso) {
    if (Carbon::parse($compromisso['data_cmp'])->isWeekend()) {
        array_push($weekends, $compromisso['data_cmp']);
    }
}

echo $twig->render('compromissos.html', [
    'compromissos' => $compromissos,
    'weekends' => $weekends,
    'ordem' => $ordem
]);