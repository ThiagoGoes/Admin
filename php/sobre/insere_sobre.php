<?php
include_once('../connection.php');

$titulo_sobre       = $_POST['titulo_sobre'];
$texto_sobre        = $_POST['texto_sobre'];
$img_sobre          = $_POST['img_sobre']['name'];
$imagem_temp        = $_POST['img_sobre']['tmp_name'];
// ../../galerias/sobre/

$target_dir = "../../galerias/sobre/"; // diretório onde a imagem será salva
$target_file = $target_dir . basename($_FILES["img_sobre"]["name"]); // caminho completo para o arquivo de destino
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Cria o diretório caso ele não exista
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Dá permissão de escrita ao diretório
if (!is_writable($target_dir)) {
    chmod($target_dir, 0777);
}

// Verifica se o arquivo é uma imagem real ou um arquivo falso
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img_sobre"]["tmp_name"]);
    if($check !== false) {
        echo "O arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}

// Verifica se o arquivo já existe
if (file_exists($target_file)) {
    echo "Desculpe, o arquivo já existe.";
    $uploadOk = 0;
}

// Verifica o tamanho do arquivo
if ($_FILES["img_sobre"]["size"] > 500000) {
    echo "Desculpe, o arquivo é muito grande.";
    $uploadOk = 0;
}

// Permite apenas determinados formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}

// Verifica se $uploadOk está definido como 0 por um erro
if ($uploadOk == 0) {
    echo "Desculpe, o arquivo não foi enviado.";
// Se tudo estiver ok, tenta fazer o upload do arquivo
} else {
    if (move_uploaded_file($_FILES["img_sobre"]["tmp_name"], $target_file)) {
        echo "O arquivo ". htmlspecialchars( basename( $_FILES["img_sobre"]["name"])). " foi enviado com sucesso.";
    } else {
        echo "Desculpe, ocorreu um erro ao enviar o arquivo.";
    }
}

$sqlInsertSobre = "INSERT INTO 
                        sobre 
                        (titulo, 
                        texto, 
                        imagem) 
                    VALUES 
                        ('$titulo_sobre',
                        '$texto_sobre',
                        '$target_file')";
echo $sqlInsertSobre;

mysqli_query($conn,$sqlInsertSobre) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../sobre.php');


?>