<?php
include_once('../connection.php');

$cod_empreendimentos        = $_GET['cod_empreendimentos'];

$sqlDeletaEmpreendimentos = "DELETE FROM empreendimentos WHERE id = " . $_GET['cod_empreendimentos'];
$sqlDeletaEmpreendimentos;

mysqli_query($conn,$sqlDeletaEmpreendimentos) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../empreendimentos.php');

mysqli_close($conn);
?>