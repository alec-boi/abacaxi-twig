<?php

require_once('inc/banco.php');
require_once('twig-carregar.php');

$username = "";
$password = "";
$confirm_password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username'] || empty($_POST['password'] || empty($_POST['password_confirm'])))) {
        echo 'Por favor preencha todos os campos.';
        exit;
    }

    $query = "SELECT * FROM users WHERE username = :username";
    $sql_obj = $pdo->prepare($query);
    $sql_obj->bindValue(':username', $_POST['username']);
    
    if ($sql_obj->execute()) {
        if ($sql_obj->fetch()) {
            $error = 'Nome de usuário já existente';
            exit;
        }

        $username = $_POST['username'];

    } else {
        echo 'Erro verificando se usuário já existe...';
    }

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo 'Senha e confirmação são diferentes.';
        exit;
    }

    $sql_register = 'INSERT INTO users (username, password) VALUES (:username, :password)';
    $sql_register_obj = $pdo->prepare($sql_register);
    $sql_register_obj->bindValue(':username', $_POST['username']);
    $sql_register_obj->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
    
    if ($sql_register_obj->execute()) {
        header('Location: login.php');
    } else {
        echo 'Something went wrong registering your user account.';
    }
}

echo $twig->render('registrar.html', ['logged' => $_SESSION['logged']]);