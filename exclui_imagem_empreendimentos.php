<?php

if (isset($_GET['imagem'])) {
    $caminho_imagem = urldecode($_GET['imagem']);
    echo $caminho_imagem;
    if (file_exists($caminho_imagem)) {
        unlink($caminho_imagem);
        echo 'Imagem deletada com sucesso!';
        header('location: empreendimentos.php');
    } else {
        echo 'A imagem não existe!';
    }
} else {
    echo 'Parâmetro inválido!';
}


?>