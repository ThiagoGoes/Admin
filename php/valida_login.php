<?php
session_start();
include('connection.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('location: ../index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT * FROM adm_usuarios WHERE usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['usuario'] = $usuario;

    // Verifica se o usuário é administrador
    $row = mysqli_fetch_assoc($result);
if ($row['root'] == 1) {
    $_SESSION['root'] = 1;
} else {
    $_SESSION['root'] = 0;
}


    // lembrar-me
    if (isset($_POST['lembrar'])) {
        setcookie('usuario', $usuario, time() + (86400 * 30), "/"); // 86400 segundos = 1 dia
    }

    header('location: ../admin.php');
    exit();

}else {
    $_SESSION['nao_autenticado'] = true;
    $_SESSION["login_err"] = "Usuário e/ou Senha Inválidos!";
    header('location: ../index.php');
    exit();
}

?>