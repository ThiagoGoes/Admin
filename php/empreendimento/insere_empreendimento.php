<?php
include_once('../connection.php');

$titulo_empreendimento      = $_POST['titulo_empreendimento'];
$texto_empreendimento       = $_POST['texto_empreendimento'];
$imagem_empreendimento      = $_FILES['img_empreendimento']['name'];
$imagem_temp                = $_FILES['img_empreendimento']['tmp_name'];

// Insere o registro sem o campo cod_empreendimento, que é autoincremento
$sqlInsertEmpreendimento = "INSERT INTO 
                            empreendimento 
                                (titulo,
                                texto,
                                imagem) 
                            VALUES 
                            ('$titulo_empreendimento',
                            '$texto_empreendimento',
                            '')";

mysqli_query($conn,$sqlInsertEmpreendimento) or die ("Não foi possível inserir os dados.");

// Obtém o ID do registro recém-inserido
$cod_empreendimento = mysqli_insert_id($conn);

// Cria a pasta com o mesmo nome do ID do registro
$dir = "../../galerias/empreendimento/" . $cod_empreendimento;
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// Move a imagem para a pasta criada
if($imagem_empreendimento) { // verifica se foi enviado um arquivo
    $destino = $dir . "/" . $imagem_empreendimento;
    move_uploaded_file($imagem_temp, $destino);
} else {
    $destino = "";
}

// Atualiza o registro com o caminho da imagem
$sqlUpdateEmpreendimento = "UPDATE 
                                empreendimento 
                            SET 
                                imagem='$destino' 
                            WHERE 
                            id='$cod_empreendimento'";

mysqli_query($conn,$sqlUpdateEmpreendimento) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../empreendimento.php');
?>