<?php

session_start();
unset(
    $_SESSION['idLogin'],
    $_SESSION['nome'],
    $_SESSION['username'],
    $_SESSION['senha'],
    $_SESSION['perfil'] 
);

header("Location: login.php")
?>