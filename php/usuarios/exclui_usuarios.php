<?php
include_once('../connection.php');

$cod_usuarios       = $_GET['cod_usuarios'];

$sqlDeletaUsuarios = "DELETE FROM adm_usuarios WHERE id = " . $_GET['cod_usuarios'];
$sqlDeletaUsuarios;

mysqli_query($conn,$sqlDeletaUsuarios) or die ("Nao foi possivel excluir os dados!");

echo "<script> alert('Dados excluídos com Sucesso!') </script>";
header('location: ../../usuarios.php');

mysqli_close($conn);

?>