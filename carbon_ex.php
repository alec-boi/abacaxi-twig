<?php

    require_once('vendor/autoload.php') ;
    date_default_timezone_set('America/Sao_Paulo');

    use Carbon\Carbon;

    echo Carbon::now() . '<br>';

    echo Carbon::now()->addDay() . '<br>';

    echo Carbon::now()->subWeek() . '<br>';

    echo 'Mais quatro anhos: ' . Carbon::createFromDate(2024)->addYears(4)->year . '<br>';

    echo 'Idade: ' . Carbon::createFromDate(2008, 1, 3)->age . '<br>';

    if (Carbon::now()->isWeekend()) {
        echo 'Sentir: Ser feliz (opcional)<br>';
    } else {
        echo 'Sentir: Tristeza (OBRIGATÓRIO)<br>';
    }

    //dif entre data

    $aaaaa = Carbon::createFromDate(2010, 07, 23);

    echo 'Diferença de data: ' . Carbon::now()->diff($aaaaa);



