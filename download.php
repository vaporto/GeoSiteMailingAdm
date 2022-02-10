<?php


session_start();

    ini_set('max_execution_time',0);    
    date_default_timezone_set("America/Sao_Paulo");
    
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
    <meta name="author" content="Liq">

    <title>Download de mailing BOT GeoSite </title>

    <!-- Custom fonts for this template
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    Custom styles for this template
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->

</head>
    
    <body style="background-color: #d3dbee;" > 

<div style="color: #000000;">
    <?php
        if(isset($_POST['importadosHj'])){
            $DtImp = date("Y-m-d");
            $arquivo = 'importadosHj.xls';
            $query ="
            select distinct idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >='$DtImp' order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="25"> <b>Contatos não consultados com data de importação hoje dia: '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '</tr>'; 
           }

                //configurações header para forçar o download
                    // Configurações header para forçar o download
            header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
            header ("Cache-Control: no-cache, must-revalidate");
            header ("Pragma: no-cache");
            header ("Content-type: application/x-msexcel");
            header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
            header ("Content-Description: PHP Generated Data" );
            // Envia o conteúdo do arquivo
            echo $html;
            exit;
        }

        if(isset($_POST['naoConsultadosHj'])){
            
            // $d= strtotime("-15 days");
            $DtImp = date("Y-m-d");
            $arquivo = 'naoConsultadosHj.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >='$DtImp' and b.statusPreVenda is null order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="26"> <b>Contatos não consultados com data de importação a partir de '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$resultado[25].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }





        if(isset($_POST['backlog'])){
            
            $d= strtotime("-15 days");
            $DtImp = date("Y-m-d");
            $arquivo = 'backlog.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >='$DtImp' and b.statusPreVenda is null order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="26"> <b>Contatos não consultados com data de importação a partir de '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$resultado[25].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }



        if(isset($_POST['prioridadeReconsulta'])){
            
            $d= strtotime("-15 days");
            $DtImp = date("Y-m-d");
            $arquivo = 'prioridadeReconsulta.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >='$DtImp' and b.statusPreVenda is null order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="26"> <b>Contatos não consultados com data de importação a partir de '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$resultado[25].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }





        if(isset($_POST['consultadosHJ'])){
            $DtImp = date("Y-m-d");
            $arquivo = 'consultadosHJ.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, dtHoraTratativaAutomacao, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where b.dtHoraTratativaAutomacao >='$DtImp' and b.statusPreVenda is not null order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="27"> <b>Contatos consultados hoje dia: '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>dtHoraTratativaAutomacao</b></td>'; 
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$resultado[25].'</td>';
            $html .= '<td>'.$resultado[26].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }

        if(isset($_POST['consultadoUltimos15Dias'])){
            $d= strtotime("-15 days");
            $DtImp = date("Y-m-d", $d);
            $arquivo = 'consultadoUltimos15Dias.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, dtHoraTratativaAutomacao,statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >='$DtImp' and b.statusPreVenda is not null order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="26"> <b>Contatos consultados com data de importação a partir de '.$DtImp. 'OBS: </b> este relatório possui os contatos que foram reconsultados</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>dtHoraTratativaAutomacao</b></td>'; 
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){

            $d=strtotime($resultado[25]);
            $data=date("d/m/Y H:i:s", $d);
            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$data.'</td>';
            $html .= '<td>'.$resultado[26].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }

        if(isset($_POST['viabilidadeHj'])){
            $DtImp = date("Y-m-d");
            $arquivo = 'viabilidadeHj.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, dtHoraTratativaAutomacao, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where b.dtHoraTratativaAutomacao >='$DtImp' and b.statusPreVenda like '%Viabilidade técnica confirmada%' order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="27"> <b>Contatos com viabilidade técnica confirmada hoje dia: '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>dtHoraTratativaAutomacao</b></td>'; 
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            $d=strtotime($resultado[25]);
            $data=date("d/m/Y H:i:s", $d);

            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$data.'</td>';
            $html .= '<td>'.$resultado[26].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }

        if(isset($_POST['ultimoMailingImportado'])){
            $DtImp = date("Y-m-d");
            $arquivo = 'ultimoMailingImportado.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, dtHoraTratativaAutomacao, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where dtHoraImportacao = (select max(dtHoraImportacao) from [dbo].[mailingEntrada] ) order by idMailingEntrada asc";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="27"> <b>Download do último mailing adicionado e o status de pré venda já consultados</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>dtHoraTratativaAutomacao</b></td>'; 
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            $d=strtotime($resultado[25]);
            $data=date("d/m/Y H:i:s", $d);

            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$data.'</td>';
            $html .= '<td>'.$resultado[26].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }

        
        if(isset($_POST['viabilidadeUlt15Dias'])){
            
            $d= strtotime("-15 days");
            $DtImp = date("Y-m-d", $d);

            $arquivo = 'viabilidadeUlt15Dias.xls';
            $query ="
            select distinct dtMainling, idMailingEntrada, reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1, telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2, complemento2,tpComplemento3, complemento3, complemento4, dtHoraTratativaAutomacao, statusPreVenda from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where b.dtHoraTratativaAutomacao >='$DtImp' and b.statusPreVenda like '%Viabilidade técnica confirmada%' order by idMailingEntrada asc;";

            $html =  '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="27"> <b>Contatos com viabilidade técnica confirmada a partir da data: '.$DtImp. '</b></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td><b>dtMainling</b></td>';
            $html .= '<td><b>idMailingEntrada</b></td>';
            $html .= '<td><b>reconsulta</b></td>';
            $html .= '<td><b>UserName</b></td>';
            $html .= '<td><b>LoginUser</b></td>';
            $html .= '<td><b>NameCliente</b></td>';
            $html .= '<td><b>cpfCnpj</b></td>';
            $html .= '<td><b>telContato1</b></td>';
            $html .= '<td><b>telContato2</b></td>';
            $html .= '<td><b>telContato3</b></td>';
            $html .= '<td><b>telContato4</b></td>';
            $html .= '<td><b>VelocidadeDesejada</b></td>';
            $html .= '<td><b>CEP</b></td>';
            $html .= '<td><b>endereco</b></td>';
            $html .= '<td><b>num</b></td>';
            $html .= '<td><b>bairro</b></td>';
            $html .= '<td><b>cidade</b></td>';
            $html .= '<td><b>estado</b></td>';
            $html .= '<td><b>tpComplemento1</b></td>';
            $html .= '<td><b>Complemento1</b></td>';
            $html .= '<td><b>tpComplemento2</b></td>';
            $html .= '<td><b>Complemento2</b></td>';
            $html .= '<td><b>tpComplemento3</b></td>';
            $html .= '<td><b>Complemento3</b></td>';
            $html .= '<td><b>Complemento4</b></td>';
            $html .= '<td><b>dtHoraTratativaAutomacao</b></td>'; 
            $html .= '<td><b>statusPreVenda</b></td>'; 
            $html .= '</tr>';

         
		

            global $conexao;
            $statement = $conexao->prepare($query);
            $statement->execute();
    
            $result = $statement->fetchAll();
                            
           foreach($result as $resultado){
            $d=strtotime($resultado[25]);
            $data=date("d/m/Y H:i:s", $d);

            
            $html .= '<tr>'; 
            $html .= '<td>'.$resultado[0].'</td>';
            $html .= '<td>'.$resultado[1].'</td>';
            $html .= '<td>'.$resultado[2].'</td>';
            $html .= '<td>'.$resultado[3].'</td>';
            $html .= '<td>'.$resultado[4].'</td>';
            $html .= '<td>'.$resultado[5].'</td>';
            $html .= '<td>'.$resultado[6].'</td>';
            $html .= '<td>'.$resultado[7].'</td>';
            $html .= '<td>'.$resultado[8].'</td>';
            $html .= '<td>'.$resultado[9].'</td>';
            $html .= '<td>'.$resultado[10].'</td>';
            $html .= '<td>'.$resultado[11].'</td>';
            $html .= '<td>'.$resultado[12].'</td>';
            $html .= '<td>'.$resultado[13].'</td>';
            $html .= '<td>'.$resultado[14].'</td>';
            $html .= '<td>'.$resultado[15].'</td>';
            $html .= '<td>'.$resultado[16].'</td>';
            $html .= '<td>'.$resultado[17].'</td>';
            $html .= '<td>'.$resultado[18].'</td>';
            $html .= '<td>'.$resultado[19].'</td>';
            $html .= '<td>'.$resultado[20].'</td>';
            $html .= '<td>'.$resultado[21].'</td>';
            $html .= '<td>'.$resultado[22].'</td>';
            $html .= '<td>'.$resultado[23].'</td>';
            $html .= '<td>'.$resultado[24].'</td>';
            $html .= '<td>'.$data.'</td>';
            $html .= '<td>'.$resultado[26].'</td>';
            $html .= '</tr>'; 
           }

              //configurações header para forçar o download
            	// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
           echo $html;
           exit;
        }
    ?>
    </div>
	</body>
</html>