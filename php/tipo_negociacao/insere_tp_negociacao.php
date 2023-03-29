<?php
include_once('../connection.php');

$desc_tp_negociacao         = $_POST['desc_tp_negociacao'];
$id_interno_tp_negociacao   = $_POST['id_interno_tp_negociacao'];

$sqlTpNegociacao = "INSERT INTO 
                    tipo_negociacao 
                    (descricao,
                    id_interno) 
                VALUES 
                    ('$desc_tp_negociacao',
                    '$id_interno_tp_negociacao')";
echo $sqlTpNegociacao;

mysqli_query($conn,$sqlTpNegociacao) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../tipo_negociacao.php');
?>