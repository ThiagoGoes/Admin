<?php
include_once('../connection.php');

$cod_banners            = $_POST['cod_banners'];
$desc_banners           = isset($_POST['desc_banners']) ? $_POST['desc_banners'] : '';
$img_banners            = isset($_FILES['img_banners']) ? $_FILES['img_banners']['name'] : '';
$imagem_temp            = $_FILES['img_banners']['tmp_name'];
$link_banner            = isset($_POST['link_banner']) ? $_POST['link_banner'] : '';
$link_externo_banners   = isset($_POST['link_externo_banners']) ? $_POST['link_externo_banners'] : '';


if($img_banners) { // verifica se foi enviado um arquivo
    $destino = "../../uploads/" . $img_banners;
    // move_uploaded_file($imagem_temp, $_SERVER['DOCUMENT_ROOT'] . $destino);
    move_uploaded_file($imagem_temp, $destino);
} else {
    $destino = "";
}

$stmt = mysqli_prepare($conn, "UPDATE banners 
                                SET 
                                    descricao = ?, 
                                    foto = ?, 
                                    link = ?, 
                                    externo = ? 
                                    WHERE id = ?");

if (is_array($img_banners)) {
    mysqli_stmt_bind_param($stmt, "ssssi", $desc_banners, $destino['name'], $link_banner, $link_externo_banners, $cod_banners);
} else {
    mysqli_stmt_bind_param($stmt, "ssssi", $desc_banners, $destino, $link_banner, $link_externo_banners, $cod_banners);
}


// mysqli_stmt_bind_param($stmt, "ssssi", $desc_banners, $destino['name'], $link_banner, $link_externo_banners, $cod_banners);

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
    // $uploads_dir = '../uploads/';
    // $tmp_name = $img_banners['tmp_name'];
    // $name = $img_banners['name'];
    // $upload_file = $uploads_dir . basename($name);
    // move_uploaded_file($tmp_name, $upload_file);
    echo "<script> alert('Dados alterados com sucesso!') </script>";
    header('location: ../../banners.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>