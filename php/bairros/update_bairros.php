<?php 
include_once('../connection.php');

$cod_bairros                = $_POST['cod_bairros'];
$nome_bairros               = isset($_POST['nome_bairros']) ? $_POST['nome_bairros'] : '';
$id_cidade_bairros          = isset($_POST['id_cidade_bairros']) ? $_POST['id_cidade_bairros'] : '';
$id_interno_bairros         = isset($_POST['id_interno_bairros']) ? $_POST['id_interno_bairros'] : '';

$stmt = mysqli_prepare($conn, "UPDATE bairros SET bairro = ?, id_cidade = ?, id_interno = ? WHERE id = ?");

echo "cod_bairros = $cod_bairros<br>";
echo "nome_bairros = $nome_bairros<br>";
echo "id_cidade_bairros = $id_cidade_bairros<br>";
echo "id_interno_bairros = $id_interno_bairros<br>";

mysqli_stmt_bind_param($stmt, "sssi", $nome_bairros, $id_cidade_bairros, $id_interno_bairros, $cod_bairros);

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
    header('location: ../../bairros.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>