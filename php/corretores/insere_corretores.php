<?php
include_once('../connection.php');

$nome_corretores    = $_POST['nome_corretores'];
$telefone_corretor  = $_POST['telefone_corretor'];
$whats_corretor     = $_POST['whats_corretor'];
$celular_corretor   = $_POST['celular_corretor'];
$email_corretor     = $_POST['email_corretor'];
$imagem_corretor    = $_FILES['img_corretor']['name'];
$imagem_temp        = $_FILES['img_corretor']['tmp_name'];

if($imagem_corretor) { // verifica se foi enviado um arquivo
    $destino = "../../uploads/" . $imagem_corretor;
    // move_uploaded_file($imagem_temp, $_SERVER['DOCUMENT_ROOT'] . $destino);
    move_uploaded_file($imagem_temp, $destino);
} else {
    $destino = "";
}

$sqlInsertCorretor = "INSERT INTO 
                        corretores 
                        (nome,
                        telefone,
                        whatsapp,
                        celular,
                        email,
                        imagem) 
                    VALUES 
                        ('$nome_corretores',
                        '$telefone_corretor',
                        '$whats_corretor',
                        '$celular_corretor',
                        '$email_corretor',
                        '$destino')";

mysqli_query($conn,$sqlInsertCorretor) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../corretores.php');
?>
