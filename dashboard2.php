<?php
    session_start();    
    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    include 'vendor/autoload.php';
    include_once "./conexao.php";

    
    

    $page = $_SERVER['PHP_SELF'];
    $sec = "30";
    header("Refresh: $sec; url=$page");
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style="background-color: #d3dbee;">

    <?php include "./cabecalho.php"; ?>
    


    <div class="container-fluid" >
        <div class="row ">
        <div class="  col-sm-12 col-xl-3 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3 " style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/alerta.jpg" width="50px"alt=""></div>
                    </div>
                    <div class="col-12 col-sm-col-12 h5 m p-2"><div class="col-12 my-2">Importados dia <?php echo date("d/m/Y")?></div> <div class="col-12 h1"><?php echo importadosHj();?></div></div>
                    <!-- <div class="col-5 "><img src="img/686317.png" width="50px"alt=""></div> -->
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
            <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                <input class="btn btn-secondary" type="submit" name="importadosHj" value="Download" />
            </form> 
            </div>
        </div>
        </div>  

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
            
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/alerta.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">N??o consultados dia <?php echo date("d/m/Y")?></div> <div class="col-12 h1"><?php echo naoConsultadosHj();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
                <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                    <input class="btn btn-secondary" type="submit" name="naoConsultadosHj" value="Download" />
                </form>
                <!-- <button class="btn btn-secondary" type="button">download</button> -->
            </div>
        </div>
        </div>  

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/positivo.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">Consultado dia <?php echo date("d/m/Y")?></div> <div class="col-12 h1"><?php echo tratados();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
                <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                    <input class="btn btn-secondary" type="submit" name="consultadosHJ" value="Download" />
                </form>
            </div>
            </div>
        </div>
        
        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/geral.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4"></div> Tempo m??dio de execu????o<div class="col-12 h1"><?php echo tempoDeExecucaoEmSegundos();?> seg</div></div>
                        <!-- <div class="col-5 "><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                 </div>
            <div style="height: 4.35em;">     
           
            </div>
            </div>
        </div>

        <div class="  col-sm-12 col-xl-3 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/confirmado.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">Viabilidade confirmada data: <?php echo date("d/m/Y")?></div> <div class="col-12 h1"><?php echo comViabilidade();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
                <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                    <input class="btn btn-secondary" type="submit" name="viabilidadeHj" value="Download" />
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>  
    <div class="container-fluid" >  
        <div class="row">

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/checklist.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">Backlog</div> <div class="col-12 h1"><?php echo backlog();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
            <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                <input class="btn btn-secondary" type="submit" name="backlog" value="Download" />
            </form>
            </div>
            </div>
        </div>  

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/checklist.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">Consultados ??ltimos 15 dias </div> <div class="col-12 h1"><?php echo consultadoultimos15Dias();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
            <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                <input class="btn btn-secondary" type="submit" name="consultadoUltimos15Dias" value="Download" />
            </form>
            </div>
            </div>
        </div>  

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/atualizacao.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4" >??ltima importa????o em: <?php $d=strtotime(ultimaImportacao());echo date("d/m/Y", $d);?> </div> <div class="col-12 h1"><?php echo countUltimaImportacao() ?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
            <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                <input class="btn btn-secondary" type="submit" name="ultimoMailingImportado" value="Download" />
            </form>
            </div>
            </div>
        </div>  

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/viabilidade.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">Viabilidade confirmada ??ltimos 15 dias</div> <div class="col-12 h1"><?php echo comViabilidadeTotal();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
            <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                <input class="btn btn-secondary" type="submit" name="viabilidadeUlt15Dias" value="Download" />
            </form>
            </div>
            </div>
        </div>  

          

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/viabilidade.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4">Prioridade reconsulta</div> <div class="col-12 h1"><?php echo prioridadeReconsulta();?></div></div>
                        <!-- <div class="col-5"><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                </div>
            <div class="d-grid gap-2 d-md-block my-3">
            <form name="import" action="download.php" method="post" enctype="multipart/form-data">  
                <input class="btn btn-secondary" type="submit" name="prioridadeReconsulta" value="Download" />
            </form>
            </div>
            </div>
        </div>  

        <div class="  col-sm-12 col-xl-2 p-0  " >
            <div class="m-1 text-center border border-primary rounded-3" style=" background-color: rgb(255, 255, 255);">
                <div class="row  d-flex align-items-center text-center " style="height: 200px;">
                    <div class="row justify-content-center my-1 mt-3">
                        <div class="col-5 text-center"><img src="img/geral.jpg" width="50px"alt=""></div>
                        <div class="col-12 h5 p-2"><div class="col-12 my-4"></div> Tempo m??dio de execu????o ??ltima execu????o<div class="col-12 h1"><?php echo tempoDeExecucaoEmSegundos();?> seg</div></div>
                        <!-- <div class="col-5 "><img src="img/686317.png" width="50px"alt=""></div> -->
                    </div>
                 </div>
            <div style="height: 4.35em;">     
           
            </div>
            </div>
        </div>

              
        </div>
    </div>
</body>
</html>
