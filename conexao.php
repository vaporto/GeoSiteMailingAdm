<?php
    include_once "./banco.php";
    ini_set('max_execution_time',0);
  
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
        select count(a.idMailingEntrada) as result from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >= '$DtImp' and b.statusPreVenda is null";
        
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
        select count(a.idMailingEntrada) as result from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >= '$DtImp' and b.statusPreVenda is null";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function tratados(){
        $DtImp = date("Y-m-d");
        $query ="
        select count(a.idMailingEntrada) as result from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where b.dtHoraTratativaAutomacao >= '$DtImp' and b.statusPreVenda is not null;";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function comViabilidade(){
        $DtImp = date("Y-m-d");
        $query ="
        select count(a.idMailingEntrada) as result from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where b.dtHoraTratativaAutomacao >= '$DtImp' and b.statusPreVenda like '%Viabilidade técnica confirmada%';";
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }


    function consultadoUltimos15Dias(){
        $d=strtotime("-15 days");
        $DtImp = date("Y-m-d", $d);
        // $query ="
        // select count(id) result from [dbo].[GeositeMailing] where statusPreVenda is not null and dtTratativaAutomacao >= '".$DtImp."';";
        
        $query ="
        select count(idMailingEntrada) as result from [RPA_Electroneek].[dbo].[mailingEntrada] a inner join [RPA_Electroneek].[dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >= '$DtImp' and b.statusPreVenda is not null;";
        
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function ultimaImportacao(){
       
        $query ="
        select max(dtHoraImportacao) as result from [RPA_Electroneek].[dbo].[mailingEntrada] ;";
        
        
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
        select count(a.idMailingEntrada) as result from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where a.dtHoraImportacao >= '$DtImp' and b.statusPreVenda like '%Viabilidade técnica confirmada%';";
        
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['result'];
    }

    function tempoDeExecucaoEmSegundos(){
        $DtImp = date("Y-m-d");
        $query ="
        SELECT (DATEDIFF(SECOND,(select min(dtHoraTratativaAutomacao) from [dbo].[mailingBotGeositeViabilidade] where dtHoraTratativaAutomacao >= '$DtImp'),(select max(dtHoraTratativaAutomacao) from [dbo].[mailingBotGeositeViabilidade]))) /(select count(a.idMailingEntrada) as result from [dbo].[mailingEntrada] a inner join [dbo].[mailingBotGeositeViabilidade] b on a.idMailingEntrada = b.idMailingEntradafk where b.dtHoraTratativaAutomacao >= '$DtImp' and b.statusPreVenda is not null) as media";
        
        
        global $conexao;
        $statement = $conexao->prepare($query);
        $statement->execute();

        $resultado = $statement->fetch();
        
        return $resultado['media'];
    }



    
?>
