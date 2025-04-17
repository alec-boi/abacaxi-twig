<?php

    require('inc/banco.php');

    if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
        header("location: login.php");
        exit;
    }

    $titulo = $_POST['titulo'] ?? null;
    $data = $_POST['data_cmp'] ?? null;

    if ($titulo) {

        $query = $pdo->prepare('INSERT INTO compromissos (titulo, data_cmp) VALUES (:titulo, :data_cmp)');
        $query->execute([
            ":titulo" => $titulo,
            ":data_cmp" => $data
        ]);

    }

header('location: compromissos.php');