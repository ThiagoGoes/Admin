<?php
include_once('../connection.php');

$cod_banners = $_GET['cod_banners'];

$sqlDeletar = "DELETE FROM banners WHERE id= " . $_GET['cod_banners'];
echo $sqlDeletar;

mysqli_query($conn,$sqlDeletar) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../banners.php');

mysqli_close($conn);

?>