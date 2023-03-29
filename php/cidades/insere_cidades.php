<?php
include_once('../connection.php');

$nome_cidade            = $_POST['nome_cidade'];
$cod_municipio          = $_POST['cod_municipio'];
$estados_cidade         = $_POST['estados_cidade'];
$id_interno_cidades     = $_POST['id_interno_cidades'];

$sqlCidades = "INSERT INTO 
                    cidade 
                    (nome,
                    cod_municipio,
                    estado,
                    id_interno) 
                VALUES 
                    ('$nome_cidade',
                    '$cod_municipio',
                    '$estados_cidade',
                    '$id_interno_cidades')";
echo $sqlCidades;

mysqli_query($conn,$sqlCidades) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../cidades.php');
?>