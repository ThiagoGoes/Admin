<?php
include_once('../connection.php');

$cod_corretor           = $_POST['cod_corretor']; 
$nome_corretores        = isset($_POST['nome_corretores']) ? $_POST['nome_corretores'] : '';
$telefone_corretor      = isset($_POST['telefone_corretor']) ? $_POST['telefone_corretor'] : '';
$whats_corretor         = isset($_POST['whats_corretor']) ? $_POST['whats_corretor'] : '';
$celular_corretor       = isset($_POST['celular_corretor']) ? $_POST['celular_corretor'] : '';
$email_corretor         = isset($_POST['email_corretor']) ? $_POST['email_corretor'] : '';
$imagem_corretor        = isset($_FILES['imagem_corretor']) ? $_FILES['imagem_corretor']['name'] : '';
$imagem_temp            = $_FILES['imagem_corretor']['tmp_name'];

// $uploads_dir = '../uploads/';
// $tmp_name = $imagem_corretor['tmp_name'];
// $name = $imagem_corretor['name'];
// $upload_file = $uploads_dir . basename($name);
// move_uploaded_file($tmp_name, $upload_file);

if($imagem_corretor) { // verifica se foi enviado um arquivo
    $destino = "../../uploads/" . $imagem_corretor;
    // move_uploaded_file($imagem_temp, $_SERVER['DOCUMENT_ROOT'] . $destino);
    move_uploaded_file($imagem_temp, $destino);
} else {
    $destino = "";
}

$stmt = mysqli_prepare($conn, "UPDATE 
                                corretores 
                               SET 
                                nome = ?, 
                                telefone = ?, 
                                whatsapp = ?, 
                                celular = ?, 
                                email = ?, 
                                imagem = ? 
                               WHERE 
                                id = ?");

// mysqli_stmt_bind_param($stmt, "ssssssi", $nome_corretores, $telefone_corretor, $whats_corretor, $celular_corretor, $email_corretor, $imagem_corretor['name'], $cod_corretor);

if (is_array($imagem_corretor)) {
    mysqli_stmt_bind_param($stmt, "ssssssi", $nome_corretores, $telefone_corretor, $whats_corretor, $celular_corretor, $email_corretor, $destino['name'], $cod_corretor);
} else {
    mysqli_stmt_bind_param($stmt, "ssssssi", $nome_corretores, $telefone_corretor, $whats_corretor, $celular_corretor, $email_corretor, $destino, $cod_corretor);
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
    // $uploads_dir = '../uploads/';
    // $tmp_name = $imagem_corretor['tmp_name'];
    // $name = $imagem_corretor['name'];
    // $upload_file = $uploads_dir . basename($name);
    // move_uploaded_file($tmp_name, $upload_file);
    echo "<script> alert('Dados alterados com sucesso!') </script>";
    header('location: ../../corretores.php');
} else {
    echo 'Não foi possível alterar os dados!';
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>