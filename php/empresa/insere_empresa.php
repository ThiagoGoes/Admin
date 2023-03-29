<?php
include_once("../connection.php");

$nome_empresa           = $_POST['nome_empresa'];
$endereco_empresa       = $_POST['endereco_empresa'];
$numero_empresa         = $_POST['numero_empresa'];
$bairro_empresa         = $_POST['bairro_empresa'];
$cidade_empresa         = $_POST['cidade_empresa'];
$estado_empresa         = $_POST['estado_empresa'];
$cep_empresa            = $_POST['cep_empresa'];
$telefone_empresa       = $_POST['telefone_empresa'];
$email_empresa          = $_POST['email_empresa'];
// Imagem Sobre
$img_sobre              = $_FILES['img_sobre']['name'];
$tmp_sobre              = $_FILES['img_sobre']['tmp_name'];
// Imagem Logo
$img_logo               = $_FILES['img_logo']['name'];
$tmp_logo               = $_FILES['img_logo']['tmp_name'];
// Imagem Empreendimento
$img_empreendimento     = $_FILES['img_empreendimento']['name'];
$tmp_empreendimento      = $_FILES['img_empreendimento']['tmp_name'];

if ($img_sobre) { //Verifica se o arquivo foi enviado
    $destino_sobre = "../../galerias/empresa/" . $img_sobre;
    move_uploaded_file($tmp_sobre, $destino_sobre);
}else {
    $destino_sobre = "";
}

if ($img_logo) { //Verifica se o arquivo foi enviado
    $destino_logo = "../../galerias/empresa/" . $img_logo;
    move_uploaded_file($tmp_logo, $destino_logo);
}else {
    $destino_logo = "";
}

if ($img_empreendimento) { //Verifica se o arquivo foi enviado
    $destino_empreendimento = "../../galerias/empresa/" . $img_empreendimento;
    move_uploaded_file($tmp_empreendimento, $destino_empreendimento);
}

$sqlEmpresa = "INSERT INTO dados_empresa 
                            (nome,
                            endereco,
                            numero,
                            bairro,
                            cidade,
                            estado,
                            cep,
                            telefone,
                            email,
                            imagem_sobre,
                            imagem_logo,
                            imagem_empreendimento) 
                            VALUES 
                            ('$nome_empresa',
                            '$endereco_empresa',
                            '$numero_empresa',
                            '$bairro_empresa',
                            '$cidade_empresa',
                            '$estado_empresa',
                            '$cep_empresa',
                            '$telefone_empresa',
                            '$email_empresa',
                            '$destino_sobre',
                            '$destino_logo',
                            '$destino_empreendimento')";
echo $sqlEmpresa;

mysqli_query($conn,$sqlEmpresa) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../empresa.php');
?>