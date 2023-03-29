<?php
include_once('../connection.php');

$cod_newsletter         = $_POST['cod_newsletter'];
$email_newsletter       = isset($_POST['email_newsletter']) ? $_POST['email_newsletter'] : '';

$stmt = mysqli_prepare($conn, "UPDATE newsletter SET email = ? WHERE id = ?");
echo "cod_newsletter = $cod_newsletter<br>";
echo "email_newsletter = $email_newsletter<br>";

mysqli_stmt_bind_param($stmt, "si", $email_newsletter, $cod_newsletter);
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
    header('location: ../../newsletter.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>