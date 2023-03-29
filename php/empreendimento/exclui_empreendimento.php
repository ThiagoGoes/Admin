<?php
include_once('../connection.php');

$cod_empreendimento     = $_GET['cod_empreendimento'];

$sqlDeletar = "DELETE FROM empreendimento WHERE id = " . $_GET['cod_empreendimento'];
$sqlDeletar;

mysqli_query($conn,$sqlDeletar) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../empreendimento.php');

mysqli_close($conn);

?>