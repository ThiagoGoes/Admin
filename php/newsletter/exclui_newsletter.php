<?php

include_once("../connection.php");

$cod_newsletter = $_GET['cod_newsletter'];

$sqlDeletar = "DELETE FROM newsletter WHERE id = " . $_GET["cod_newsletter"];


echo $sql;

mysqli_query($conn,$sqlDeletar) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../newsletter.php');

mysqli_close($conn);

?>