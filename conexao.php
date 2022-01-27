<?php
    include_once "./banco.php";
    ini_set('max_execution_time',0);
    /*
        define("SERVIDOR",'V00319SQL-GCPRD.intracorp.local,60002');
        define("USER","usr_electroneek");
        define("PASSWORD","e84ut7f0$5@{=");
        define("BANCO","RPA_Electroneek");
    */
    //$conexao = new PDO("sqlsrv:Database=RPA_Electroneek;server=V00319SQL-GCPRD.intracorp.local,60002;ConnectionPooling=0","usr_electroneek","e84ut7f0$5@{=");

    function inserirDados($reconsulta, $UserName, $LoginUser, $NameCliente,	$cpfCnpj, $telContato1,	$telContato2, $telContato3, $telContato4, $VelocidadeDesejada, $CEP, $endereco, $num, $bairro, $cidade, $estado, $tpComplemento1, $complemento1, $tpComplemento2, $complemento2 ,$tpComplemento3, $complemento3, $complemento4, $dtHoraImportacao, $ip_hostname , $idloginfk, $emTratamento, $dtMainling ){
        
        $query ="
        insert into [RPA_Electroneek].[dbo].[mailingEntrada] (reconsulta, UserName, LoginUser, NameCliente, cpfCnpj, telContato1,telContato2, telContato3, telContato4, VelocidadeDesejada, CEP, endereco, num, bairro, cidade, estado, tpComplemento1, complemento1, tpComplemento2,
        complemento2, tpComplemento3, complemento3, complemento4, dtHoraImportacao, ip_hostname, idloginfk, emTratamento, dtMainling) values ('{$reconsulta}', '{$UserName}', '{$LoginUser}', '{$NameCliente}', '{$cpfCnpj}', '{$telContato1}', '{$telContato2}', '{$telContato3}', '{$telContato4}', '{$VelocidadeDesejada}', '{$CEP}', '{$endereco}', '{$num}', '{$bairro}','{$cidade}', '{$estado}', '{$tpComplemento1}', '{$complemento1}', '{$tpComplemento2}', '{$complemento2}', '{$tpComplemento3}', '{$complemento3}','{$complemento4}', '{$dtHoraImportacao}', '{$ip_hostname}', '{$idloginfk}', '{$emTratamento}', '{$dtMainling}');";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();
        
        return $statement;
    }

   

    function inserirDadosFK($dtHoraImportacao){
        
        $query ="
        insert into [RPA_Electroneek].[dbo].[mailingBotGeositeViabilidade] (idMailingEntradafk)
        select (idMailingEntrada) from [dbo].[mailingEntrada] where dtHoraImportacao = '{$dtHoraImportacao}';";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();
        
        return $statement;
    }

    function Pendentes(){
        $DtImp = date("Y-m-d");
        $query ="
        select count(id) result from [dbo].[GeositeMailing] where dtImportacao = '".$DtImp."' and statusPreVenda is null";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function pendenteTratamento15dias(){
        $d=strtotime("-15 days");
        $DtImp = date("Y-m-d", $d);
        $query ="
        select count(id) result from [dbo].[GeositeMailing] where dtImportacao >= '".$DtImp."' and statusPreVenda is null";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function tratados(){
        $DtImp = date("Y-m-d");
        $query ="
        select count(id) result from [dbo].[GeositeMailing] where statusPreVenda is not null and dtTratativaAutomacao = '".$DtImp."';";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function comViabilidade(){
        $DtImp = date("Y-m-d");
        $query ="
        select count(id) result from [dbo].[GeositeMailing] where statusPreVenda like '%Viabilidade técnica confirmada%' and dtTratativaAutomacao = '".$DtImp."';";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }


    function consultadoUltimos15Dias(){
        $d=strtotime("-15 days");
        $DtImp = date("Y-m-d", $d);
        $query ="
        select count(id) result from [dbo].[GeositeMailing] where statusPreVenda is not null and dtTratativaAutomacao >= '".$DtImp."';";
        
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function ultimaImportacao(){
       
        $query ="
        select max(dtImportacao) as result from [RPA_Electroneek].[dbo].[GeositeMailing];";
        
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function comViabilidadeTotal(){
        $d=strtotime("-15 days");
        $DtImp = date("Y-m-d", $d);
        $query ="
        select count(id) result from [dbo].[GeositeMailing] where statusPreVenda like '%Viabilidade técnica confirmada%' and dtTratativaAutomacao >= '".$DtImp."';";
        
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }



    
?>
