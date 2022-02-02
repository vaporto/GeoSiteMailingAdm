<?php

session_start();
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
    <title>GeoSite Mailing ADM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style="background-color: #d3dbee;">


<div class="container">

       <?php include "./cabecalho.php"; ?>
        

        
        <div id="Squad">

        <div class="form-outline mb-4">
        
                
                
            </div> 
       
            <form name="cadastrar" action="cadastrar.php" method="post" enctype="multipart/form-data">  
            <label>Nome completo</label>
            <div class="form-outline mb-4">
               
                <input  style="color: #000000;" type="text" name="fullname" value="" />
            </div>
            <label>E-cadop</label>
            <div class="form-outline mb-4">
                
                <input  style="color: #000000;" type="text" name="username" value="" />
            </div>
            <label>Senha</label>
            <div class="form-outline mb-4">
             
                <input  style="color: #000000;" type="password" name="senha" value="" />
            </div>  
            <label>Perfil</label>  
            <div class="form-outline mb-4">
                
                <select name="select">
                    <option value="" > </option>
                    <option value="1">Administrador</option>
                    <option value="2">Supervisor</option>
                    <option value="3">Coordenador</option>
                </select>
            </div>
                <input style="color: #000000;" type="submit" name="enviar" value="Enviar" />
            </form>
            <p class="text-danger"><?php 
                if(isset($_SESSION['emptyForm'])){
                    echo $_SESSION['emptyForm'];
                    unset($_SESSION['emptyForm']);
                }
            
            ?></p>

            <p class="text-sucess"><?php 
                if(isset($_SESSION['sucess'])){
                    echo $_SESSION['sucess'];
                    unset($_SESSION['sucess']);
                }
            
            ?></p>
        </div>

  
            
        </div>
    </div>  
    </div>


        

       
        
         

      

       
       

              
        </div>
    </div>
</body>

</html>