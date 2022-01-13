<?php
    include "./conexao.php"
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
    // verificando se há arquivo na importacao
    if(!empty($_FILES['arquivo']['tmp_name'])){
    
    $arquivo = new DOMDocument;
    
    $arquivo->load($_FILES['arquivo']['tmp_name']);
    
    $linhas = $arquivo->getElementsByTagName("Row");
    $contLinha = 1;
    foreach($linhas as $linha){
        if($contLinha>1){
                            
            $reconsulta = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
            $dtImportacao = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
            $hrImportacao = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
            $UserName = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
            $LoginUser = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
            $NameCliente = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
            $cpfCnpj = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
            $telContato1 = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
            $telContato2 = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
            $telContato3 = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
            
            $telContato4 = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
            $VelocidadeDesejada = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
            $CEP = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
            $endereco = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
            $num = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
            $bairro = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
            $cidade = $linha->getElementsByTagName("Data")->item(16)->nodeValue;
            $estado = $linha->getElementsByTagName("Data")->item(17)->nodeValue;
            $tpComplemento1 = $linha->getElementsByTagName("Data")->item(18)->nodeValue;
            $complemento1 = $linha->getElementsByTagName("Data")->item(19)->nodeValue;

            
            $tpComplemento2 = $linha->getElementsByTagName("Data")->item(20)->nodeValue;
            $complemento2 = $linha->getElementsByTagName("Data")->item(21)->nodeValue;
            $tpComplemento3 = $linha->getElementsByTagName("Data")->item(22)->nodeValue;
            $complemento3 = $linha->getElementsByTagName("Data")->item(23)->nodeValue;
            $complemento4 = $linha->getElementsByTagName("Data")->item(24)->nodeValue;
            $dtTratativaAutomacao = $linha->getElementsByTagName("Data")->item(25)->nodeValue;
            $hrTratativaAutomacao = $linha->getElementsByTagName("Data")->item(26)->nodeValue;
            $statusPreVenda = $linha->getElementsByTagName("Data")->item(27)->nodeValue;
            $StatusAnaliseCredito = $linha->getElementsByTagName("Data")->item(28)->nodeValue;
            $ProdutosAprovados = $linha->getElementsByTagName("Data")->item(29)->nodeValue;

            $numConsulta = $linha->getElementsByTagName("Data")->item(30)->nodeValue;

            $d=strtotime($dtImportacao);
            $h=strtotime($hrImportacao);
            $newDtImp = date("Y-m-d", $d);
            $newHrImp = date("h:m:s", $h);

            echo "antes: " . $dtImportacao . "<br/>" . $hrImportacao;
            echo "depois: ". $newDtImp . "<br/>" . $newHrImp;

            //inserirDados($reconsulta, $newDtImp ,$newHrImp ,$UserName,	$LoginUser,	$NameCliente,	$cpfCnpj,	$telContato1,	$telContato2,	$telContato3,	$telContato4, $VelocidadeDesejada, $CEP, $endereco, $num, $bairro, $cidade, $estado, $tpComplemento1, $complemento1, $tpComplemento2, $complemento2 ,$tpComplemento3, $complemento3, $complemento4, $dtTratativaAutomacao, $hrTratativaAutomacao, $statusPreVenda, $StatusAnaliseCredito, $ProdutosAprovados, $numConsulta);

           /*
             echo $reconsulta;
            echo $dtImportacao;
            echo $hrImportacao;
            echo $UserName;
            echo $LoginUser;
            echo $NameCliente;
            echo $cpfCnpj;
            echo $telContato1;
            echo $telContato2;
            echo $telContato3;
            echo $telContato4;
            echo $VelocidadeDesejada;
            echo $CEP;
            echo $endereco;
            echo $num;
            echo $bairro;
            echo $cidade;
            echo $estado;
            echo $tpComplemento1;
            echo $complemento1;
            echo $tpComplemento2;
            echo $complemento2;
            echo $tpComplemento3;
            echo $complemento3;
            echo $complemento4;
            echo $dtTratativaAutomacao;
            echo $hrTratativaAutomacao;
            echo $statusPreVenda;
            echo $StatusAnaliseCredito;
            echo $ProdutosAprovados;
            echo $numConsulta; */

            echo '<br/>';

        }
        $contLinha++;
        
    }
}
//header("Location:index.php");

?>

    </body>

</html>   
