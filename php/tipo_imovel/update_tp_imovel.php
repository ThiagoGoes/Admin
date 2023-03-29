<?php 
include_once('../connection.php');

$cod_tp_imovel          = $_POST['cod_tp_imovel'];
$desc_tp_imovel         = isset($_POST['desc_tp_imovel']) ? $_POST['desc_tp_imovel'] : '';
$id_interno_tp_imovel   = isset($_POST['id_interno_tp_imovel']) ? $_POST['id_interno_tp_imovel'] : '';

$stmt = mysqli_prepare($conn, "UPDATE tipo_imovel SET descricao = ?, id_interno = ? WHERE id = ?");

echo "cod_tp_imovel = $cod_tp_imovel<br>";
echo "desc_tp_imovel = $desc_tp_imovel<br>";
echo "id_interno_tp_imovel = $id_interno_tp_imovel<br>";

mysqli_stmt_bind_param($stmt, "ssi", $desc_tp_imovel, $id_interno_tp_imovel, $cod_tp_imovel);

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
    header('location: ../../tipo_imovel.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>