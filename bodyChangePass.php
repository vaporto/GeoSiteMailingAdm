<?php


        if($_SESSION['changeLogin']!=1){
            $_SESSION['loginErro'] = " Você não tem permissão para acessar esta página"; 
            header("Location: login.php");
        }
       

    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    include_once "./conexao.php";

    $newDtImp = date("Y-m-d H:i:s");



    if((!empty($_POST['TrocarSenha'])) && (!empty($_POST['TrocarRepetSenha']))){
        $novasenha= $_POST['TrocarSenha'];
        $repetNovaSenha = $_POST['TrocarRepetSenha'];
        if($novasenha == $repetNovaSenha){
            $nvsenha = password_hash($novasenha, PASSWORD_DEFAULT);
            $login = $_POST['Alt_LoginUser'];
            $query= "update [RPA_Electroneek].[dbo].[login] set senha = '$nvsenha', ativo = '1', changeLogin='0'  where username = '$login';";
        
            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
            $_SESSION['sucess'] = "Login $login resetado.";
            header("Location: index.php");
        }else{
            $_SESSION['emptyForm'] = 'Erro ao efetuar troca de senha, favor tentar novamente. <strong>obs:</strong> o campo senha e repetição da senha devem ser identicos';
            header("Location: editar.php");
        }
        
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoSite Mailing ADM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

    </style>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</head>
<body style="background-color: #d3dbee;">


<div class="container">
  
    <div id="Squad">

        <div class="form-outline mb-4">
        
            <h1>Reset <?php echo $_SESSION['nome']; ?></h1>
           
            
            <form name="resetar" action="" method="post" enctype="multipart/form-data">  
            
            <label>senha</label>

            <div class="form-outline mb-4">
                <input style="color: #000000; width: fit-content;" type="password" name="TrocarSenha" value=""/>
                <input  style="color: #000000; width: fit-content;" type="hidden" name="Alt_LoginUser" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}else{}unset($_SESSION['username']);?>" />
            </div>
            
            <label>repitir senha</label>

            <div class="form-outline mb-4">
                <input  style="color: #000000;" type="password" name="TrocarRepetSenha" value="" />
            </div>

            <button type="submit" name="resetar" value= "resetar" class="btn btn-primary btn-block">Resetar Login</button>   
        </div> 
                
    </div> 
</div>    
            
           
           
          
</body>

</html>