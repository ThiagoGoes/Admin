<?php 
// include_once('../connection.php');

// $cod_tp_imovel      = $_GET['cod_tp_imovel'];

// $sqlDeletaTpImovel = "DELETE FROM tipo_imovel WHERE id = " . $_GET['cod_tp_imovel'];
// echo $sqlDeletaTpImovel;

// mysqli_query($conn,$sqlDeletaTpImovel) or die ("Nao foi possivel excluir os dados!");

// echo "<script> alert('Dados excluídos com Sucesso!') </script>";
// header('location: ../../tipo_imovel.php');

// mysqli_close($conn);

// include_once('../connection.php');

// $cod_tp_imovel = $_GET['cod_tp_imovel'];

// $sqlBuscaTpImovel = "SELECT id_interno FROM tipo_imovel WHERE id = " . $cod_tp_imovel;
// $resultadoBusca = mysqli_query($conn, $sqlBuscaTpImovel);

// // Verifica se o registro existe
// if (mysqli_num_rows($resultadoBusca) == 0) {
//     die('Registro não encontrado.');
// }

// $registro = mysqli_fetch_assoc($resultadoBusca);


// // Verifica se o campo id_interno é NULL ou 0(Zero);
// if (!$registro['id_interno'] || $registro['id_interno'] == 0) {
//     $sqlDeletaTpImovel = "DELETE FROM tipo_imovel WHERE id = " . $cod_tp_imovel;
//     echo $sqlDeletaTpImovel;

//     mysqli_query($conn,$sqlDeletaTpImovel) or die ("Não foi possível excluír os dados.");

//     echo "<script>alert('Dados excluídos com Sucesso!');</script>";
//     header('location: ../../tipo_imovel.php');
// }else {
//     die('Não é possívelo excluír o registro');
// }

// mysqli_close($conn);

include_once('../connection.php');
include_once('../../navigation/session.php');

$cod_tp_imovel = $_GET['cod_tp_imovel'];

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

$sqlDeletaTpImovel = "DELETE FROM tipo_imovel WHERE id = " . $cod_tp_imovel . " AND (id_interno IS NULL OR id_interno = 0)";
echo $sqlDeletaTpImovel;

$resultadoDeleta = mysqli_query($conn, $sqlDeletaTpImovel);

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Dados excluídos com sucesso!');</script>";
    header('location: ../../tipo_imovel.php?exclusao=sucesso');
} else {
    echo "<script>alert('Não foi possível excluír o registro, pois já tem vinculo!')</script>";
    header('location: ../../tipo_imovel.php?exclusao=erro');
}
} else {
    // O usuário não tem permissão para excluir ou alterar o registro
    echo "<script>alert('Você não tem permissão para realizar essa operação!')</script>";
    header('location: ../../tipo_imovel.php?exclusao=erroP');
}

mysqli_close($conn);
?>