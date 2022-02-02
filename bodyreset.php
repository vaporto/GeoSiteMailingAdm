<?php


        if($_SESSION['perfil']!=1){
            $_SESSION['loginErro'] = " Você não tem permissão para acessar esta página"; 
            header("Location: login.php");
        }
       

    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    include_once "./conexao.php";

    $newDtImp = date("Y-m-d H:i:s");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset ADM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

    </style>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</head>
<body style="background-color: #d3dbee;">


<div class="container">
  
    <div id="Squad">

        <div class="form-outline mb-4">
        
            <h1>Reset ADM</h1>
            <form name="resetar" action="alterar.php" method="post" enctype="multipart/form-data">  
            <?php echo $_SESSION['changeLogin'];?>
            <label>senha</label>
            <div class="form-outline mb-4 ">
            
                <input style="color: #000000; width: fit-content;" type="password" name="senha" value="" />
                <input  style="color: #000000; width: fit-content;" type="hidden" name="LoginUser" value="<?php if(isset($_SESSION['res_username'])){echo $_SESSION['res_username'];}else{}unset($_SESSION['res_username']);?>" />
            </div>
            
            <label>repitir senha</label>
            <div class="form-outline mb-4">
                
                <input  style="color: #000000;" type="password" name="repetSenha" value="" />
            </div>

            <button type="submit" name="resetar" value= "resetar" class="btn btn-primary btn-block">Resetar Login</button>   
        </div> 
                
    </div> 
</div>    
            
           
           
          
</body>

</html>