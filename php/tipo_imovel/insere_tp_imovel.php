<?php
include_once('../connection.php');

$desc_tp_imovel         = $_POST['desc_tp_imovel'];
$id_interno_tp_imovel   = $_POST['id_interno_tp_imovel'];

$sqlTpImovel = "INSERT INTO 
                    tipo_imovel 
                    (descricao,
                    id_interno) 
                VALUES 
                    ('$desc_tp_imovel',
                    '$id_interno_tp_imovel')";
echo $sqlTpImovel;

mysqli_query($conn,$sqlTpImovel) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../tipo_imovel.php');
?>