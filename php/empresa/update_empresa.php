<?php
include_once('../connection.php');

$cod_empresa = $_POST['cod_empresa'];
$nome_empresa = $_POST['nome_empresa'] ?? '';
$endereco_empresa = $_POST['endereco_empresa'] ?? '';
$numero_empresa = $_POST['numero_empresa'] ?? '';
$bairro_empresa = $_POST['bairro_empresa'] ?? '';
$cidade_empresa = $_POST['cidade_empresa'] ?? '';
$estado_empresa = $_POST['estado_empresa'] ?? '';
$cep_empresa = $_POST['cep_empresa'] ?? '';
$telefone_empresa = $_POST['telefone_empresa'] ?? '';
$email_empresa = $_POST['email_empresa'] ?? '';

// Sobre
if (!empty($_FILES['img_sobre']['name']) && is_uploaded_file($_FILES['img_sobre']['tmp_name'])) {
    $img_sobre = $_FILES['img_sobre']['name'];
    $tmp_sobre = $_FILES['img_sobre']['tmp_name'];
    $destino_sobre = '../../galerias/empresa/' . $img_sobre;
    move_uploaded_file($tmp_sobre, $destino_sobre);
} else {
    $destino_sobre = null;
}

// Logo
if (!empty($_FILES['img_logo']['name']) && is_uploaded_file($_FILES['img_logo']['tmp_name'])) {
    $img_logo = $_FILES['img_logo']['name'];
    $tmp_logo = $_FILES['img_logo']['tmp_name'];
    $destino_logo = '../../galerias/empresa/' . $img_logo;
    move_uploaded_file($tmp_logo, $destino_logo);
} else {
    $destino_logo = null;
}

// Empreendimento
if (!empty($_FILES['img_empreendimento']['name']) && is_uploaded_file($_FILES['img_empreendimento']['tmp_name'])) {
    $img_empreendimento = $_FILES['img_empreendimento']['name'];
    $tmp_empreendimento = $_FILES['img_empreendimento']['tmp_name'];
    $destino_empreendimento = '../../galerias/empresa/' . $img_empreendimento;
    move_uploaded_file($tmp_empreendimento, $destino_empreendimento);
} else {
    $destino_empreendimento = null;
}

$stmt = mysqli_prepare($conn, "UPDATE dados_empresa SET nome = ?, endereco = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, telefone = ?, email = ?, imagem_sobre = IFNULL(?, imagem_sobre), imagem_logo = IFNULL(?, imagem_logo), imagem_empreendimento = IFNULL(?, imagem_empreendimento) WHERE id = ?");

mysqli_stmt_bind_param($stmt, "ssssssssssssi", 
    $nome_empresa, 
    $endereco_empresa, 
    $numero_empresa, 
    $bairro_empresa, 
    $cidade_empresa, 
    $estado_empresa, 
    $cep_empresa, 
    $telefone_empresa, 
    $email_empresa,
    $destino_sobre,
    $destino_logo,
    $destino_empreendimento, 
    $cod_empresa);

mysqli_stmt_execute($stmt);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script> alert('Dados alterados com sucesso!') </script>";
    header('location: ../../empresa.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
