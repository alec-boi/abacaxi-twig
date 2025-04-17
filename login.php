<?php 

require_once('inc/banco.php');
require_once('twig-carregar.php');

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    header('Location: index.php');
    exit;
}

$username = "";
$password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['username'] || empty($_POST['password']))) {
        echo 'Por favor preencha todos os campos.';
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($err)) {
        $sql_query = 'SELECT * FROM users WHERE username = :username';
        $sql_select_obj = $pdo->prepare($sql_query);
        $sql_select_obj->bindValue(':username', $username);
        
        if ($sql_select_obj->execute()) {

            $data = $sql_select_obj->fetch();

            if (password_verify($password, $data['password'])) {
                session_start();

                $_SESSION['logged'] == true;
                $_SESSION['id'] == $data['id'];
                $_SESSION['username'] == $data['username'];

                header('Location: index.php');
            } else {
                echo 'Usuário ou senha inválidos';
                exit;
            }

        } else {
            echo 'Ocorreu um erro ao verificar a senha';
        }

    }

}

echo $twig->render('login.html', 
    [
        'logged' => $_SESSION['logged'] ?? false,
        'usuario' => $_SESSION['usuario'] ?? ''
    ]);