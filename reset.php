<?php

session_start();
ini_set('max_execution_time',0);    
date_default_timezone_set("America/Sao_Paulo");
include_once "./conexao.php";

if($_SESSION['changeLogin'] == '1'){
    include  "bodyChangePass.php";
}elseif(isset($_SESSION['nome']) && $_SESSION['changeLogin'] == '0'){
    
    include "bodyreset.php";
    
    
  
}else{
    $_SESSION['loginErro'] = "Efetue o login para acessar a página"; 
    header("Location: login.php");
}
       

    

    
?>