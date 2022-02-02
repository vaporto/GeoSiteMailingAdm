<?php

session_start();
unset(
    $_SESSION['idLogin'],
    $_SESSION['nome'],
    $_SESSION['username'],
    $_SESSION['senha'],
    $_SESSION['perfil'], 
    $_SESSION['emptyForm'], 
    $_SESSION['res_fullname'], 
    $_SESSION['res_username'], 
    $_SESSION['res_perfil'], 
    $_SESSION['res_senha'], 
    $_SESSION['res_ativo'], 
    $_SESSION['res_changeLogin'], 
    $_SESSION['sucess'],
    $_SESSION['loginErro'],
    $_SESSION['changeLogin']
);

header("Location: login.php")
?>