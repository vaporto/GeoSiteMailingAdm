<?php

session_start();

ini_set('max_execution_time',0);    
date_default_timezone_set("America/Sao_Paulo");
include_once "./conexao.php";
$newDtImp = date("Y-m-d H:i:s");
        if($_SESSION['perfil']!=1){
            $_SESSION['loginErro'] = " Você não tem permissão para acessar esta página"; 
            header("Location: login.php");
        }
       

    

if(isset($_POST['alterar'])){
    if(!empty($_POST['username'])){

        $nome = $_POST['fullname'];
        $user = $_POST['username'];
        $perfil = $_POST['perfil'];
        $ativo = $_POST['ativo'];

        $query ="
        update [RPA_Electroneek].[dbo].[login] set nome = '$nome', username = '$user', perfil = '$perfil', ativo = '$ativo' where username = $user ;";
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();
        // $_SESSION['emptyForm'] = $query;
        // header("Location: editar.php");

        $_SESSION['sucess'] = "Alterado com sucesso.";
        header("Location: editar.php");


    }else{
        $_SESSION['emptyForm'] = 'Favor consultar o login antes de enviar o formulário.';
        header("Location: editar.php");
    }   
}elseif(isset($_POST['reset'])){

    $_SESSION['res_fullname'] =  $_POST['fullname'];
    $_SESSION['res_username'] = $_POST['username'];
    $_SESSION['res_perfil'] = $_POST['perfil'];
    $_SESSION['res_senha'] = $_POST['senha'];
    $_SESSION['res_ativo'] = $_POST['ativo'];
    $_SESSION['res_changeLogin'] = $_POST['changeLogin'];
    header("Location: reset.php");
} else {
    $_SESSION['emptyForm'] = 'Favor consultar o login antes de enviar o formulário.';
    header("Location: editar.php");
}

if((!empty($_POST['senha'])) && (!empty($_POST['repetSenha']))){
    $novasenha= $_POST['senha'];
    $repetNovaSenha = $_POST['repetSenha'];
    if($novasenha == $repetNovaSenha){
        $nvsenha = password_hash($novasenha, PASSWORD_DEFAULT);
        $login = $_POST['LoginUser'];
        $query= "update [RPA_Electroneek].[dbo].[login] set senha = '$nvsenha', ativo = '1', changeLogin='1'  where username = '$login';";
    
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();
        $_SESSION['sucess'] = "Login $login resetado.";
        unset($_SESSION['emptyForm']);
        header("Location: editar.php");
    }else{
        $_SESSION['emptyForm'] = 'Erro ao efetuar troca de senha, favor tentar novamente. <strong>obs:</strong> o campo senha e repetição da senha devem ser identicos';
        header("Location: editar.php");
    }
    
}


?>




<!-- echo $_SESSION['res_fullname']."<br>";
    echo $_SESSION['res_username']."<br>";
    echo $_SESSION['res_perfil']."<br>"; 
    echo $_SESSION['res_senha']."<br>"; 
    echo $_SESSION['res_ativo']."<br>"; 
    echo $_SESSION['res_changeLogin']."<br>"; -->




<!-- $query2 ="update [RPA_Electroneek].[dbo].[login] set senha = '$senha', ativo = '1', changeLogin='0'  where username = '$_SESSION['res_username']' ;";
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();
        // $_SESSION['emptyForm'] = $query;
        // header("Location: editar.php");

        $_SESSION['sucess'] = "Login $_SESSION['res_username'] resetado.";
        header("Location: editar.php");

else{
    $_SESSION['emptyForm'] = 'Erro ao efetuar troca de senha, favor tentar novamente. <strong>obs:</strong> o campo senha e repetição da senha devem ser identicos';
    header("Location: editar.php");} -->
