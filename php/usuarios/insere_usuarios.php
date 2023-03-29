<?php
include_once('../connection.php');

$nome_usuarios      = $_POST['nome_usuarios'];
$usuario_usuarios   = $_POST['usuario_usuarios'];
$senha_usuarios     = md5($_POST['senha_usuarios']);
$root_usuarios      = $_POST['root_usuarios'];

$sqlInsertUsuarios = "INSERT INTO 
                            adm_usuarios 
                            (nome, 
                            usuario, 
                            senha,
                            root) 
                        VALUES 
                            ('$nome_usuarios',
                            '$usuario_usuarios',
                            '$senha_usuarios',
                            '$root_usuarios')";
echo $sqlInsertUsuarios;

mysqli_query($conn,$sqlInsertUsuarios) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../usuarios.php');

?>