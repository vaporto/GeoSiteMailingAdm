<?php
    session_start();
    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
   
    include_once "./conexao.php";

    $newDtImp = date("Y-m-d H:i:s");

?>
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="scss/_variables.scss">
    <link rel="stylesheet" href="stylesheet2.css">

    <title>Logon</title>



</head>
    <body> 


    <?php
        if(!empty($_POST['logon'])){
           
          
            if((isset($_POST['login'])) && (isset($_POST['senha']))){
                
                $usuario = preg_replace('/[^[:alnum:]_]/', '',$_POST['login']);
                $senha = preg_replace('/[^[:alnum:]_@$]/', '',$_POST['senha']);
                

                $query ="
                SELECT distinct [idlogin] ,[nome], [username], [senha], [perfil], [ativo], [changeLogin] FROM [RPA_Electroneek].[dbo].[login] where [username] = '$usuario'";
                
                
                global $conexao;
                $statement = $conexao->prepare($query);
                $statement->execute();
        
                $resultado = $statement->fetch();
                                
                $senha=$_POST['senha'];
                $resultado['senha'];
               
                if(empty($resultado)){
                    $_SESSION['loginErro'] = " * Usuário ou senha inválidos"; 
                    header("Location: login.php"); 
                }elseif(password_verify($senha, $resultado['senha'])){
                    $_SESSION['idLogin'] = $resultado['idLogin'];
                    $_SESSION['nome'] = $resultado['nome'];
                    $_SESSION['username'] = $resultado['username'];
                    $_SESSION['senha'] = $resultado['senha'];
                    $_SESSION['perfil'] = $resultado['perfil'];
                    $_SESSION['ativo'] = $resultado['ativo'];
                    $_SESSION['changeLogin'] = $resultado['changeLogin'];

                    if($_SESSION['changeLogin'] == '1'){
                        header("Location: reset.php"); 
                        exit;
                    }
                    if($_SESSION['ativo'] == '0'){
                        $_SESSION['loginErro'] = "Usuário bloqueado"; 
                        header("Location: login.php"); 
                    }else{
                        header("Location: index.php");
                    }

                    
                }else{
                    $_SESSION['loginErro'] = " * Usuário ou senha inválidos"; 
                    header("Location: login.php");
                }
    
               

                // $DtImp = date("Y-m-d");
                              
                // global $conexao;
               
            
            }else{
                $_SESSION['loginErro'] = " * Usuário ou senha inválidos"; 
                header("Location: login.php");
            }
        }else{
            $_SESSION['loginErro'] = " * Usuário ou senha inválidos"; 
            header("Location: login.php");
        }
        
        

       
    ?>
	</body>
</html>