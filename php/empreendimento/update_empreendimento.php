<?php
include_once('../connection.php');

$cod_empreendimento     = $_POST['cod_empreendimento'];
$titulo_empreendimento  = isset($_POST['titulo_empreendimento']) ? $_POST['titulo_empreendimento'] : '';
$texto_empreendimento   = isset($_POST['texto_empreendimento']) ? $_POST['texto_empreendimento'] : '';
$imagem_empreendimento  = isset($_FILES['imagem_empreendimento']) ? $_FILES['imagem_empreendimento']['name'] : '';
$imagem_temp            = $_FILES['imagem_empreendimento']['imagem_temp'];

if ($imagem_empreendimento) { //Verifica se foi enviado o arquivo;
    $destino = "../../galerias/empreendimento/1/" . $imagem_empreendimento;
    move_uploaded_file($imagem_temp, $destino);
}else {
    $destino = "";
}

$stmt = mysqli_prepare($conn, "UPDATE 
                                empreendimento 
                               SET 
                                titulo = ?, 
                                texto = ?, 
                                imagem = ? 
                               WHERE 
                                id = ?");

if (is_array($imagem_empreendimento)) {
    mysqli_stmt_bind_param($stmt, "sssi", $titulo_empreendimento, $texto_empreendimento, $destino['name'], $cod_empreendimento);
}else {
    mysqli_stmt_bind_param($stmt, "sssi", $titulo_empreendimento, $texto_empreendimento, $destino, $cod_empreendimento);
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
    header('location: ../../empreendimento.php');
} else {
    echo 'Não foi possível alterar os dados!';
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>