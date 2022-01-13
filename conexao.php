<?php
    /*
        define("SERVIDOR",'V00319SQL-GCPRD.intracorp.local,60002');
        define("USER","usr_electroneek");
        define("PASSWORD","e84ut7f0$5@{=");
        define("BANCO","RPA_Electroneek");
    */

    function inserirDados($reconsulta,	$dtImportacao,	$hrImportacao,	$UserName,	$LoginUser,	$NameCliente,	$cpfCnpj,	$telContato1,	$telContato2,	$telContato3,	$telContato4, $VelocidadeDesejada, $CEP, $endereco, $num, $bairro, $cidade, $estado, $tpComplemento1, $complemento1, $tpComplemento2, $complemento2 ,$tpComplemento3, $complemento3, $complemento4, $dtTratativaAutomacao, $hrTratativaAutomacao, $statusPreVenda, $StatusAnaliseCredito, $ProdutosAprovados, $numConsulta){
        $conexao = new PDO("sqlsrv:Database=RPA_Electroneek;server=V00319SQL-GCPRD.intracorp.local,60002;ConnectionPooling=0","usr_electroneek","e84ut7f0$5@{=");
            $query = $conexao->prepare("
            insert into [RPA_Electroneek].[dbo].[GeositeMailing] (reconsulta, dtImportacao, hrImportacao, UserName, LoginUser, NameCliente, cpfCnpj, telContato1,".
            "telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2,".
            "complemento2, tpComplemento3, complemento3, complemento4, dtTratativaAutomacao, hrTratativaAutomacao, statusPreVenda, StatusAnaliseCredito, ProdutosAprovados, numConsulta)".
            "values ('{$reconsulta}', '{$dtImportacao}', '{$hrImportacao}', '{$UserName}', '{$LoginUser}', '{$NameCliente}', '{$cpfCnpj}', ".
            "'{$telContato1}', '{$telContato2}', '{$telContato3}', '{$telContato4}', '{$VelocidadeDesejada}', '{$CEP}', '{$endereco}', '{$num}', '{$bairro}', ".
            "'{$cidade}', '{$estado}', '{$tpComplemento1}', '{$complemento1}', '{$tpComplemento2}', '{$complemento2}', '{$tpComplemento3}', '{$complemento3}',".
            "'{$complemento4}', '{$dtTratativaAutomacao}', '{$hrTratativaAutomacao}', '{$statusPreVenda}', '{$StatusAnaliseCredito}', '{$ProdutosAprovados}', '{$numConsulta}')");
        
            $query->execute();
            echo "<script>alert(".$query.")</script>";
        
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        
            echo json_encode($results);

            return $query;
    }
    
?>
