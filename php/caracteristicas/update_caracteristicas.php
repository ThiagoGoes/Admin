<?php
include_once('../connection.php');

$cod_caracteristicas         = $_POST['cod_caracteristicas'];
$desc_caracteristicas        = isset($_POST['desc_caracteristicas']) ? $_POST['desc_caracteristicas'] : '';
$id_interno_caracteristicas  = isset($_POST['id_interno_caracteristicas']) ? $_POST['id_interno_caracteristicas'] : '';

$stmt = mysqli_prepare($conn, "UPDATE caracteristicas SET descricao = ?, id_interno = ? WHERE id = ?");
echo "cod_caracteristicas = $cod_caracteristicas<br>";
echo "desc_caracteristicas = $desc_caracteristicas<br>";
echo "id_interno_caracteristicas = $id_interno_caracteristicas<br>";

mysqli_stmt_bind_param($stmt, "ssi", $desc_caracteristicas, $id_interno_caracteristicas, $cod_caracteristicas);
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
    header('location: ../../caracteristicas.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>