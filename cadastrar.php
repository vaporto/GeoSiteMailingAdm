<?php
    session_start();

    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    include 'vendor/autoload.php';
    include_once "./conexao.php";

    if(isset($_POST['enviar'])) {
        
        if((!empty($_POST['fullname'])) && (!empty($_POST['username']))  && (!empty($_POST['senha'])) && (!empty($_POST['select']))){
           
            $nome = $_POST['fullname'];
            $user =  $_POST['username'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $perfil = $_POST['select'];

            $verificaLoginBanco="
            select username from [RPA_Electroneek].[dbo].[login] where username = '$user' ";
            global $conexao;
            $statement = $conexao->prepare($verificaLoginBanco);
            $statement->execute();
            $resultado = $statement->fetch();

            if(empty($resultado['username'])){
                $query ="
                insert into [RPA_Electroneek].[dbo].[login] (nome, username, senha, perfil) VALUES ('$nome', '$user', '$senha', '$perfil');";
                global $conexao;
                $statement = $conexao->prepare($query);
                $statement->execute();

                $_SESSION['sucess'] = "Cadastrado com sucesso";
                header("Location: adm.php");

            }else{
                $_SESSION['emptyForm'] = "Usuário já cadastrado";
                header("Location: adm.php");
            }

            


            
        }else{
            $_SESSION['emptyForm'] = "Todos os campos são obrigatórios";
            header("Location: adm.php");
        }
    }else{
        $_SESSION['emptyForm'] = "Todos os campos são obrigatórios";
        header("Location: adm.php");
    }
?>