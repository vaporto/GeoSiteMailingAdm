<?php

session_start();

    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
 
    include_once "./conexao.php";

    $newDtImp = date("Y-m-d H:i:s");

    if(!empty(buscarLogin($_POST['userName']))){
       
        // buscarLogin($_POST['userName']);
        header("Location: editar.php");
       
        
    }else{
        $_SESSION['err'] = 'Favor informar um login válido.';
        header("Location: editar.php");
    }

    function buscarLogin($login){
        $query ="
        select * from [RPA_Electroneek].[dbo].[login] where [username] = '$login'";

        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();
            

        foreach($result as $resultado){
        $_SESSION['busca_loginId'] = $resultado[0];
        $_SESSION['busca_nome'] = $resultado[1];
        $_SESSION['busca_user'] = $resultado[2];
        $_SESSION['busca_senha'] = $resultado[3];
        $_SESSION['busca_id'] = $resultado[4];
        $_SESSION['busca_ativo'] = $resultado[5];
        $_SESSION['busca_changeLogin'] = $resultado[6];
        
        }
        return $result;
    }

?>

