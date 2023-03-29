<?php 
include_once('../connection.php');

$cod_cidade             = $_POST['cod_cidade'];
$nome_cidade            = isset($_POST['nome_cidade']) ? $_POST['nome_cidade'] : '';
$cod_municipio          = isset($_POST['cod_municipio']) ? $_POST['cod_municipio'] : '';
$estados_cidade         = isset($_POST['estados_cidade']) ? $_POST['estados_cidade'] : '';
$id_interno_cidades     = isset($_POST['id_interno_cidades']) ? $_POST['id_interno_cidades'] : '';

$stmt = mysqli_prepare($conn, "UPDATE cidade SET nome = ?, cod_municipio = ?, estado = ?, id_interno = ? WHERE id = ?");

echo "cod_cidade = $cod_cidade<br>";
echo "nome_cidade = $nome_cidade<br>";
echo "cod_municipio = $cod_municipio<br>";
echo "estados_cidade = $estados_cidade<br>";
echo "id_interno_cidades = $id_interno_cidades<br>";

mysqli_stmt_bind_param($stmt, "ssssi", $nome_cidade, $cod_municipio, $estados_cidade, $id_interno_cidades, $cod_cidade);

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
    header('location: ../../cidades.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>