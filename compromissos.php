<?php

require_once('twig-carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$ordem = $_GET['ordenar'] ?? 'asc-date';

switch ($ordem) {
    case 'asc-date':
        $query = 'SELECT * FROM compromissos ORDER BY data_cmp';
        break;
    case 'des-date':
        $query = 'SELECT * FROM compromissos ORDER BY data_cmp DESC';
        break;
    case 'alphabet':
        $query = 'SELECT * FROM compromissos ORDER BY titulo';
        break;
    default:
        echo "Formato de ordem inválido.";
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