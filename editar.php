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

        <form name="buscar" action="buscar.php" method="post" enctype="multipart/form-data">  
            <label>Consultar login</label>
            <div class="form-outline mb-5">
               
                <input  style="color: #000000;" type="text" name="userName" value="" />
                <button type="submit" name="enviar" value= "enviar" class="btn btn-primary btn-block">Pesquisar</button>
                
            </div>
          
               
            </form>

            <form name="cadastrar" action="alterar.php" method="post" enctype="multipart/form-data">  
            <label>Nome completo</label>
            <div class="form-outline mb-4 ">
               
                <input style="color: #000000; width: fit-content;" type="text" name="fullname" value="<?php if(isset($_SESSION['busca_nome'])){echo $_SESSION['busca_nome'];}else{}unset($_SESSION['busca_nome']);?>" />
            </div>

            <div class="form-outline mb-4 ">
               
                <input  style="color: #000000; width: fit-content;" type="hidden" name="changeLogin" value="<?php if(isset($_SESSION['busca_changeLogin'])){echo $_SESSION['busca_changeLogin'];}else{}unset($_SESSION['busca_changeLogin']);?>" />

                <input  style="color: #000000; width: fit-content;" type="hidden" name="senha" value="<?php if(isset($_SESSION['busca_senha'])){echo $_SESSION['busca_senha'];}else{}unset($_SESSION['busca_senha']);?>" />
            </div>
            
            <label>E-cadop</label>
            <div class="form-outline mb-4">
                
                <input  style="color: #000000;" type="text" name="username" value="<?php if(isset($_SESSION['busca_user'])){echo $_SESSION['busca_user'];}else{}unset($_SESSION['busca_user']);?>" />
            </div>
            
           
           
            <?php 
            if(isset($_SESSION['busca_id'])){
                echo' <label>Perfil</label>  
                <div class="form-outline mb-4">';
                switch($_SESSION['busca_id'] ){
                    case 1:
                        echo '
                            <select name="perfil">
                                <option value="" > </option>
                                <option value="1" selected>Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Coordenador</option>
                            </select>';
                        
                        break;
                    case 2:
                        echo '
                            <select name="perfil">
                                <option value="" > </option>
                                <option value="1">Administrador</option>
                                <option value="2" selected >Supervisor</option>
                                <option value="3">Coordenador</option>
                            </select>';
                        break;
                    case 3:
                        echo '
                            <select name="perfil">
                                <option value="" > </option>
                                <option value="1">Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3" selected>Coordenador</option>
                            </select>';
                        break;
                    default: echo '
                    <select name="perfil">
                        <option value="" > </option>
                        <option value="1">Administrador</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Coordenador</option>
                    </select>';
                }
                
            }else{echo"";
            }unset($_SESSION['busca_id']);
            ?>
        </div>
            
            <?php 
            if(isset($_SESSION['busca_ativo'])){
                echo'<label>Cadastro</label>  
                <div class="form-outline mb-4">';
                switch($_SESSION['busca_ativo'] ){
                    case 0:
                        echo '
                            <select name="ativo">
                                <option value="" > </option>
                                <option value="0" selected>Desativado</option>
                                <option value="1">Ativar</option>
                            </select>';
                        
                        break;
                    case 1:
                        echo '
                            <select name="ativo">
                                <option value="" > </option>
                                <option value="0">Desativar</option>
                                <option value="1" selected >Ativo</option>
                            </select>';
                        break;
                    
                    default: echo '
                    <select name="ativo">
                        <option value="" > </option>
                        <option value="0">Desativar</option>
                        <option value="1">Ativar</option>
                    
                    </select>';
                }
                
            }else{echo"";
            }unset($_SESSION['busca_ativo']);
  
            ?>
                
           

            <div class="form-outline mt-4">
            <button type="submit" name="alterar" value= "alterar" class="btn btn-primary btn-block">Alterar</button>  
                <!-- <input style="color: #000000;" type="submit" name="alterar" value="Alterar"/> -->
                <button type="submit" name="reset" value= "reset" class="btn btn-primary btn-block">Resetar senha</button>
                <!-- <input style="color: #000000;" type="submit" name="reset" value="Resetar senha"/> -->
            </div>
                
            </form>
            <p class="text-danger"><strong><?php 
                if(isset($_SESSION['emptyForm'])){
                    echo $_SESSION['emptyForm'];
                    unset($_SESSION['emptyForm']);
                }

                if(isset($_SESSION['err'])){
                    echo $_SESSION['err'];
                    unset($_SESSION['err']);
                }
            
            ?></strong></p>

            <p class="text-success"><strong><?php 
                if(isset($_SESSION['sucess'])){
                    echo $_SESSION['sucess'];
                    unset($_SESSION['sucess']);
                }
            
            ?></strong></p>
        </div>

  
            
        </div>
    </div>  
    </div>


        

       
        
         

      

       
       

              
        </div>
    </div>
</body>

</html>