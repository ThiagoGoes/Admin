<?php
include_once('../connection.php');

$cod_usuarios = $_POST['cod_usuarios'];
$nome_usuarios = isset($_POST['nome_usuarios']) ? $_POST['nome_usuarios'] : '';
$usuario_usuarios = isset($_POST['usuario_usuarios']) ? $_POST['usuario_usuarios'] : '';
$senha_usuarios = isset($_POST['senha_usuarios']) ? $_POST['senha_usuarios'] : '';
$root_usuarios = isset($_POST['root_usuarios']) ? $_POST['root_usuarios'] : '';

if (!empty($senha_usuarios)) {
    $senha_usuarios = md5($senha_usuarios);
}

$stmt = mysqli_prepare($conn, "UPDATE 
                                adm_usuarios 
                               SET 
                                nome = ?, 
                                usuario = ?, 
                                senha = ?, 
                                root = ? 
                               WHERE 
                                id = ?");

echo "cod_usuarios = $cod_usuarios<br>";
echo "nome_usuarios = $nome_usuarios<br>";
echo "usuario_usuarios = $usuario_usuarios<br>";
echo "senha_usuarios = $senha_usuarios<br>";
echo "root_usuarios = $root_usuarios<br>";

mysqli_stmt_bind_param($stmt, "ssssi", 
                        $nome_usuarios, 
                        $usuario_usuarios, 
                        $senha_usuarios, 
                        $root_usuarios, 
                        $cod_usuarios);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_stmt_execute($stmt);
if (mysqli_stmt_error($stmt)) {
    printf("Error: %s.\n", mysqli_stmt_error($stmt));
    exit();
}


if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script> alert('Dados alterados com sucesso!') </script>";
    header('location: ../../usuarios.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>