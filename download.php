<?php


session_start();

    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    include 'vendor/autoload.php';
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

    <title>Download de mailing BOT GeoSite </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
    <body id="page-top"> 


    <?php
        if(isset($_POST['pendenteTratamento'])){
            echo "pendenteTratamento";
        }

        if(isset($_POST['tratados'])){
            echo "tratados";
        }

        if(isset($_POST['comViabilidade'])){
            echo "comViabilidade";
        }

        if(isset($_POST['consultadoUltimos15Dias'])){
            echo "consultadoUltimos15Dias";
        }

        if(isset($_POST['comViabilidadeTotal'])){
            echo "comViabilidadeTotal";
        }

        if(isset($_POST['ultimaImportacao'])){
            echo "ultimaImportacao";
        }
    ?>
	</body>
</html>