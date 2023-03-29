<?php
include_once('../connection.php');

$desc_caracteristicas         = $_POST['desc_caracteristicas'];
$id_interno_caracteristicas   = $_POST['id_interno_caracteristicas'];

$sqlCaracteristicas = "INSERT INTO 
                    caracteristicas 
                    (descricao,
                    id_interno) 
                VALUES 
                    ('$desc_caracteristicas',
                    '$id_interno_caracteristicas')";
echo $sqlCaracteristicas;

mysqli_query($conn,$sqlCaracteristicas) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../caracteristicas.php');
?>