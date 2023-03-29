<?php
include_once('../connection.php');

$cod_sobre          = $_POST['cod_sobre'];
$titulo_sobre       = isset($_POST['titulo_sobre']) ? $_POST['titulo_sobre'] : '';
$texto_sobre        = isset($_POST['texto_sobre']) ? $_POST['texto_sobre'] : '';
$imagem_sobre       = isset($_FILES['imagem_sobre']) ? $_FILES['imagem_sobre']['name'] : '';
$imagem_temp        = $_FILES['imagem_sobre']['imagem_temp'];

if ($imagem_sobre) { //Verifica se foi enviado o arquivo;
    $destino = "../../galerias/sobre/" . $imagem_sobre;
    move_uploaded_file($imagem_temp, $destino);
}else {
    $destino = "";
}

$stmt = mysqli_prepare($conn, "UPDATE 
                                sobre 
                               SET 
                               titulo = ?, 
                               texto = ?, 
                               imagem = ? 
                               WHERE 
                               id = ?");

if (is_array($imagem_sobre)) {
    mysqli_stmt_bind_param($stmt, "sssi", $titulo_sobre, $texto_sobre, $destino['name'], $cod_sobre);
}else {
    mysqli_stmt_bind_param($stmt, "sssi", $titulo_sobre, $texto_sobre, $destino, $cod_sobre);
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
    header('location: ../../sobre.php');
} else {
    echo 'Não foi possível alterar os dados!';
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>