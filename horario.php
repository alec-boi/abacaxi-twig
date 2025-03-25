<?php

    require('twig-carregar.php');

    use Carbon\Carbon;

    date_default_timezone_set('America/Sao_Paulo');

    $data_e_hora = Carbon::now();
    $amanha = Carbon::now()->addDay()->toDateString();

    echo $twig->render('horario.html', [
        'data' => $data_e_hora,
        'amanha' => $amanha
    ]);
