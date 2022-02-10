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

    <title>Importação de mailing BOT GeoSite </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
    <body id="page-top"> 

<?php
    //import phpSpreadsheet
    

    //conexão com o banco de dados
    // $conexao = new PDO("sqlsrv:Database=RPA_Electroneek;server=V00319SQL-GCPRD.intracorp.local,60002;ConnectionPooling=0","usr_electroneek","e84ut7f0$5@{=");

//checando se o arquivo existe
if(isset($_POST['enviar'])){
    $_SESSION['info'] = "Aguarde...<br/>";
    //checando se o arquivo foi enviado
    $arquivo = $_FILES['arquivo'];
    $arquivoNovo = explode('.',$arquivo['name']);
    
    //validando o tipo de arquivo se xls ou xlsx
    if($arquivoNovo[sizeof($arquivoNovo)-1] != 'xls' and $arquivoNovo[sizeof($arquivoNovo)-1] != 'xlsx'){
        die('Extensão de arquivo inválido, favor utilizar, .xls ou .xlsx'); 
    }else{
        move_uploaded_file($arquivo['tmp_name'],'./'.$arquivo['name']);


        //caso xls usar metodo phpSpreadsheet Xls 
        //caso xlsx usar metodo phpSpreadsheet Xlsx
        switch ($arquivoNovo[1]){
            case "xls":
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xls");
            break;

            case "xlsx":
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
            break; 

            default: 
            echo "Não estava esperando por isso >_<";         
        }
        
        $file = $arquivoNovo[0].'.'.$arquivoNovo[1];
        $spreadsheet = $reader->load($file);
        
       

        $data = $spreadsheet->getActiveSheet()->toArray(); 

        foreach($data as $row){
            // $insert_data = array(
            //     ':reconsulta'=>$row[0],
            //     ':UserName'=>$row[1],
            //     ':LoginUser'=>$row[2],
            //     ':NameCliente'=>$row[3],
            //     ':cpfCnpj'=>(int)$row[4],
            //     ':telContato1'=>$row[5],
            //     ':telContato2'=>$row[6],
            //     ':telContato3'=>$row[7],
            //     ':telContato4'=>$row[8],
            //     ':VelocidadeDesejada'=>$row[9],
            //     ':CEP'=>$row[10],
            //     ':endereco'=>$row[11],
            //     ':num '=>(int)$row[12],
            //     ':bairro '=>$row[13],
            //     ':cidade '=>$row[14],
            //     ':estado '=>$row[15],
            //     ':tpComplemento1 '=>$row[16],
            //     ':complemento1 '=>$row[17],
            //     ':tpComplemento2 '=>$row[18],
            //     ':complemento2 '=>$row[19],
            //     ':tpComplemento3 '=>$row[20],
            //     ':complemento3 '=>$row[21],
            //     ':complemento4 '=>$row[22],
            //     ':dtMailing' => $row[23],
            //     ':interesse' =>$row[24],
            //     ':dtNascimento' =>$row[25],
            //     ':sexo' =>$row[26],
            //     ':nomeMae' =>$row[27],
            //     ':email' =>$row[28],
            //     ':estadoCivil' =>$row[29],
            //     ':TipoDocumento' =>$row[30],
            //     ':numDoc' =>$row[31],
            //     ':orgaoEmissor' =>$row[32],
            //     ':ocupacao' =>$row[33],
            //     ':profissao' =>$row[34],
            //     ':dtAdmissao' =>$row[35],
            //     ':rendaMensal' =>$row[36], 
            // );

            
        
                $row[4] = str_replace('.','',$row[4]);
                $row[4] = str_replace('-','',$row[4]);

                $d=strtotime($row[23]);
                $dt= date("Y-m-d", $d);

                $dtn=strtotime($row[25]);
                $dtNasc= date("Y-m-d", $dtn);

                $dtA=strtotime($row[35]);
                $dtAdmss= date("Y-m-d", $dtA);


                if($row[0] == 'reconsulta' ){
                    
                } else{
                    $row[0] = strtolower($row[0]);
                    if($row[0] == 'sim'){
                        $row[0] = 1;
                    }else{
                        $row[0] = 0;
                    }
                    try{
                        
                        echo inserirDados($row[0], $_SESSION['nome'], $_SESSION['username'] ,$row[3], (int)$row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], (int)$row[12], $row[13],$row[14], $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21] ,$row[22],  $newDtImp, $_SERVER["REMOTE_ADDR"], $_SESSION['idLogin'], 0, $dt, $row[24],$dtNasc,$row[26],	$row[27],	$row[28], $row[29],	$row[30], $row[31],	$row[32], $row[33],	$row[34], $dtAdmss,	(double)$row[36]);    
                        $_SESSION['completo'] = "Em andamento!";
                    }catch(Exception $e){
                        echo $e;
                        $_SESSION['completo'] = "Erro!!!";
                    }
                }
        }
        
        inserirDadosFK($newDtImp);
        inserirDadosAnaliseCreditoFK($newDtImp);
        
        
    }
    //deleta o arquivo encaminhado
    unlink('./'.$arquivo['name']);
    $_SESSION['completo'] = "Concluído!!!";
    unset( $_SESSION['info']);
    header("Location: index.php");
}    

?>
	</body>
</html>
   