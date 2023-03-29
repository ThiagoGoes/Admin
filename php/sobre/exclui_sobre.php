<?php
include_once('../connection.php');

$cod_sobre      = $_GET['cod_sobre'];

$sqlDeletarSobre = "DELETE FROM sobre WHERE id = " . $_GET['cod_sobre'];
$sqlDeletarSobre;

mysqli_query($conn,$sqlDeletarSobre) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../sobre.php');

mysqli_close($conn);

?>