<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Importação de mailing BOT GeoSite </title>

    <!-- Custom fonts for this template-->
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
   
  <!-- Custom styles for this template -->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #d3dbee;">

        <div class="container">
        <?php include "./cabecalho.php"; ?>
                             <!-- Email input -->
            <div class="form-outline mb-4">
        
                <form  id="containerNotBts" name="import" action="import.php" method="post" enctype="multipart/form-data">  
                    <input id="form1Example1" class="form-control" type="file" name="arquivo" value="" />
                    <input class="btn btn-primary btn-block" type="submit" name="enviar" value="Enviar" />
                </form>
                
            </div>       
                   
        </div>    
       
</body>


    <!-- <body style="background-color: #d3dbee;">
        <div id="Squad">
        <h1 style="color: #000000;">Importação de mailing BOT GeoSite</h1>
            <form name="import" action="import.php" method="post" enctype="multipart/form-data">  
                <input  style="color: #000000;" type="file" name="arquivo" value="" />
                <input style="color: #000000;" type="submit" name="enviar" value="Enviar" />
            </form>
        </div>

    </body> -->

</html>   