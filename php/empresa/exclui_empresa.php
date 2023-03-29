<?php

include_once("../connection.php");

$cod_empresa = $_GET['cod_empresa'];

$sqlDeletar = "DELETE FROM dados_empresa WHERE id = " . $_GET["cod_empresa"];


echo $sql;

mysqli_query($conn,$sqlDeletar) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../empresa.php');

mysqli_close($conn);

?>