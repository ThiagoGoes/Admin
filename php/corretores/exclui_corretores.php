<?php
include_once('../connection.php');

$cod_corretor     = $_GET['cod_corretor'];

$sqlDeletar = "DELETE FROM corretores WHERE id = " . $_GET['cod_corretor'];
echo $sqlDeletar;

mysqli_query($conn,$sqlDeletar) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../corretores.php');

mysqli_close($conn);

?>