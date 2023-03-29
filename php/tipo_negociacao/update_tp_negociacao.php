<?php 
include_once('../connection.php');

$cod_tp_negociacao          = $_POST['cod_tp_negociacao'];
$descricao_tp_negociacao         = isset($_POST['descricao_tp_negociacao']) ? $_POST['descricao_tp_negociacao'] : '';
$id_interno_negociacao   = isset($_POST['id_interno_negociacao']) ? $_POST['id_interno_negociacao'] : '';

$stmt = mysqli_prepare($conn, "UPDATE tipo_negociacao SET descricao = ?, id_interno = ? WHERE id = ?");

echo "cod_tp_negociacao = $cod_tp_negociacao<br>";
echo "descricao_tp_negociacao = $descricao_tp_negociacao<br>";
echo "id_interno_negociacao = $id_interno_negociacao<br>";

mysqli_stmt_bind_param($stmt, "ssi", $descricao_tp_negociacao, $id_interno_negociacao, $cod_tp_negociacao);

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
    header('location: ../../tipo_negociacao.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>