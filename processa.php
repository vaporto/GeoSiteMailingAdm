<?php
    include "./conexao.php";
    date_default_timezone_set("America/Sao_Paulo");
    ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
    <title>Importação de mailing BOT GeoSite</title>
    </head>
    <body>
       
<?php
    $cpf = '391.179.348-00';
    $cpf = str_replace('.','',$cpf);
    $cpf = str_replace('-','',$cpf);
    echo (int)$cpf;

     
     

//header("Location:index.php");

?>

    </body>

</html>   
