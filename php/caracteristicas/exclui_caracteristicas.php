<?php 
include_once('../connection.php');
include_once('../../navigation/session.php');

$cod_caracteristicas = $_GET['cod_caracteristicas'];

// Obter o ID do usuário logado
$usuario_id = $_SESSION['usuario_id'];

// Consulta SQL para obter o valor do campo "root" para o usuário logado
$sqlRoot = "SELECT root FROM adm_usuarios WHERE id = $usuario_id";
$resultadoRoot = mysqli_query($conn, $sqlRoot);
$rowRoot = mysqli_fetch_assoc($resultadoRoot);
$root = $rowRoot['root'];

// Verificar se o valor do campo "root" é igual a 1
if ($root == 1) {
    // O usuário tem permissão para excluir ou alterar o registro

    $sqlDeletaCaracteristicas = "DELETE FROM caracteristicas WHERE id =  $cod_caracteristicas AND (id_interno IS NULL OR id_interno = 0)";
    echo $sqlDeletaCaracteristicas;

    $resultadoDeleta = mysqli_query($conn, $sqlDeletaCaracteristicas);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Dados excluídos com sucesso!');</script>";
        header('location: ../../caracteristicas.php?exclusao=sucesso');
    } else {
        echo "<script>alert('Não foi possível excluír o registro, pois já tem vinculo!')</script>";
        header('location: ../../caracteristicas.php?exclusao=erro');
    }
} else {
    // O usuário não tem permissão para excluir ou alterar o registro
    echo "<script>alert('Você não tem permissão para realizar essa operação!')</script>";
    header('location: ../../caracteristicas.php?exclusao=erroP');
}

mysqli_close($conn);
?>

<!-- // include_once('../connection.php');
// include_once('../../navigation/session.php');

// $cod_caracteristicas = $_GET['cod_caracteristicas'];

// // Obter o ID do usuário logado
// $usuario_id = $_SESSION['usuario_id'];

// // Consulta SQL para obter o valor do campo "root" para o usuário logado
// $sqlRoot = "SELECT root FROM adm_usuarios WHERE id = $usuario_id";
// $resultadoRoot = mysqli_query($conn, $sqlRoot);
// $rowRoot = mysqli_fetch_assoc($resultadoRoot);
// $root = $rowRoot['root'];

// // Verificar se o valor do campo "root" é igual a 1
// if ($root == 1) {
//     // O usuário tem permissão para excluir ou alterar o registro

//     $sqlDeletaCaracteristicas = "DELETE FROM caracteristicas WHERE id =  $cod_caracteristicas AND (id_interno IS NULL OR id_interno = 0)";
//     echo $sqlDeletaCaracteristicas;

//     $resultadoDeleta = mysqli_query($conn, $sqlDeletaCaracteristicas);

//     if (mysqli_affected_rows($conn) > 0) {
//         echo "<script>alert('Dados excluídos com sucesso!');</script>";
//         header('location: ../../caracteristicas.php?exclusao=sucesso');
//     } else {
//         echo "<script>alert('Não foi possível excluír o registro, pois já tem vinculo!')</script>";
//         header('location: ../../caracteristicas.php?exclusao=erro');
//     }
//     } else {
//     // O usuário não tem permissão para excluir ou alterar o registro
//     echo "<script>alert('Você não tem permissão para realizar essa operação!')</script>";
//     header('location: ../../caracteristicas.php?exclusao=erroP');
//     }

// mysqli_close($conn); -->