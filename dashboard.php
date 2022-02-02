<?php
    session_start();
    header("Location: dashboard2.php");
    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    
    include_once "./conexao.php";

    $page = $_SERVER['PHP_SELF'];
    $sec = "59";
    
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

      <title>Dashboard Bot Geosite</title>

    <!-- Custom fonts for this template-->
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
   
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">

</head> 

   <body>
			<div id="Squad">
                <div name = "pendenteTratamento" id="pendenteTratamento">
                    <label>Não Consultado importado dia <?php echo date("d/m/Y")?></label>
                    <p id="resultado"><?php echo Pendentes();?></p> 
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="pendenteTratamento" value="Download" />
                    </form>  
                </div>

                <div name = "pendenteTratamento15dias" id="pendenteTratamento">
                    <label>Não Consultado ultimos 15 dias</label>
                    <p id="resultado"><?php echo pendenteTratamento15dias();?></p> 
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="pendenteTratamento" value="Download" />
                    </form>  
                </div>


                <div name = "tratados" id="pendenteTratamento">
                    <label>Consultado dia <?php echo date("d/m/Y")?></label>
                    <p id="resultado"><?php echo tratados();?></p>
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="tratados" value="Download" />
                    </form>   
                </div>

                <div name = "comViabilidade" id="pendenteTratamento">
                    <label>Viabilidade Confirmada consulta realizada dia <?php echo date("d/m/Y")?></label>
                    <p id="resultado"><?php echo comViabilidade();?></p>   
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="comViabilidade" value="Download" />
                    </form>
                </div>

                <div name = "consultadoUltimos15Dias" id="pendenteTratamento">
                    <label>Consulta ultimos 15 dias</label>
                    <p id="resultado"><?php echo consultadoUltimos15Dias();?></p>  
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="consultadoUltimos15Dias" value="Download" />
                    </form> 
                </div>

                <div name = "comViabilidadeTotal" id="pendenteTratamento">
                    <label>Viabilidade Confirmada ultimos 15 dias</label>
                    <p id="resultado"><?php echo comViabilidadeTotal();?></p>
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="comViabilidadeTotal" value="Download" />
                    </form>   
                </div>



                <div name = "ultimaImportacao" id="pendenteTratamento">
                    <label>Ultima importação em:</label>
                    <p id="data"><?php $d=strtotime(ultimaImportacao());echo date("d/m/Y", $d);?></p>  
                    <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                        <input type="submit" name="ultimaImportacao" value="Download" />
                    </form>  
                </div>

            </div> 
            
   </body>

			

</html> 
