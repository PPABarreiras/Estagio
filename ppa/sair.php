<?php
    session_start();   
    unset(
        $_SESSION['siape'],
        $_SESSION['nome'],
        $_SESSION['email'],
        $_SESSION['senha']
    );   
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    //redirecionar o usuario para a página de login
    header("Location: estagioC.php");
?>