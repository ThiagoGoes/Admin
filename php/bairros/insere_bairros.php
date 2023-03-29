<?php
include_once('../connection.php');

$nome_bairro            = $_POST['nome_bairro'];
$id_cidade_bairros      = $_POST['id_cidade_bairros'];
$id_interno_bairro      = empty($_POST['id_interno_bairro']) ? 'NULL' : $_POST['id_interno_bairro'];

$sqlBairros = "INSERT INTO 
                    bairros 
                    (bairro,
                    id_cidade,
                    id_interno) 
                VALUES 
                    ('$nome_bairro',
                    '$id_cidade_bairros',
                    '$id_interno_bairro')";
echo $sqlBairros;

mysqli_query($conn,$sqlBairros) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../bairros.php');
?>