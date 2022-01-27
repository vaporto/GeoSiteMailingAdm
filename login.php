<?php


session_start();
 ini_set('max_execution_time',0);    
 date_default_timezone_set("America/Sao_Paulo");
 include 'vendor/autoload.php';
 include_once "./conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="scss/_variables.scss">
    <link rel="stylesheet" href="stylesheet2.css">
    <title>Login</title>
</head>
    <body style="background-color: #d3dbee;">
        <div class="container">
                
                <form id="containerNotBts" name="logon" action="logon.php" method="post" enctype="multipart/form-data">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="login" id="form1Example1" class="form-control"/>
                        <label class="form-label" for="form1Example1" style="color: #000000;">Login</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="senha" id="form1Example2" class="form-control" />
                        <label class="form-label" for="form1Example2" style="color: #000000;">Senha</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3" style="color: #000000;"> Remember me </label>
                        </div>
                        </div>

                        <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Esqueceu a senha?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="logon" value= "logon" class="btn btn-primary btn-block">Sign in</button>

                    <p class="text-center text-danger">
                        <?php
                            if(isset($_SESSION['loginErro'])){
                                echo $_SESSION['loginErro'];
                                unset($_SESSION['loginErro']);
                            }
                        ?>
                    </p>
                </form>
            
        </div>    
    </body>
</html>