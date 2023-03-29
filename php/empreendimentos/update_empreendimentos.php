<?php
include_once('../connection.php');

$cod_empreendimentos        = $_POST['cod_empreendimentos'];
$nome_empreendimentos       = isset($_POST['nome_empreendimentos']) ? $_POST['nome_empreendimentos'] : '';
$obs_empreendimentos        = isset($_POST['obs_empreendimentos']) ? $_POST['obs_empreendimentos'] : '';
$img_empreendimentos        = isset($_FILES['img_empreendimentos']) ? $_FILES['img_empreendimentos']['name'] : '';
$imagem_tmp                 = $_FILES['img_empreendimentos']['imagem_tmp'];
$mapa_empreendimentos       = isset($_POST['mapa_empreendimentos']) ? $_POST['mapa_empreendimentos'] : '';
$video_empreendimentos      = isset($_POST['video_empreendimentos']) ? $_POST['video_empreendimentos'] : '';

if ($img_empreendimentos) { //Verifica se foi enviado o arquivo;
    $destino = "../../uploads/" . $img_empreendimentos;
    move_uploaded_file($imagem_temp, $destino);
}else {
    $destino = "";
}

$stmt = mysqli_prepare($conn, "UPDATE 
                                empreendimentos 
                               SET 
                                nome = ?, 
                                obs = ?, 
                                imagem = ?, 
                                mapa = ?, 
                                video = ? 
                               WHERE 
                                id = ?");

if (is_array($imagem_empreendimento)) {
    mysqli_stmt_bind_param($stmt, "sssssi", $nome_empreendimentos, $obs_empreendimentos, $destino['name'], $mapa_empreendimentos, $video_empreendimentos, $cod_empreendimentos);
}else {
    mysqli_stmt_bind_param($stmt, "sssssi", $nome_empreendimentos, $obs_empreendimentos, $destino, $mapa_empreendimentos, $video_empreendimentos, $cod_empreendimentos);
}

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_stmt_execute($stmt);
if (mysqli_stmt_error($stmt)) {
    printf("Error: %s.\n", mysqli_stmt_error($stmt));
    exit();
}

if (!$stmt) {
    printf("Error: %s.\n", mysqli_error($conn));
    exit();
}

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script> alert('Dados alterados com sucesso!') </script>";
    header('location: ../../empreendimentos.php');
} else {
    echo 'Não foi possível alterar os dados!';
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>