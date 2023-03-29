<?php
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Diretório para onde as imagens serão enviadas
    $diretorio_destino = '../../galerias/imoveis/' . $_POST['cod_imovel'];

    // Verifica se o diretório de destino existe, se não, cria-o
    if (!file_exists($diretorio_destino)) {
        mkdir($diretorio_destino, 0777, true); // cria a pasta e dá permissão de escrita para ela
        chmod($diretorio_destino, 0777);
    }

    // Verifica se o diretório foi criado com sucesso
    if (is_dir($diretorio_destino)) {
        echo 'Diretório criado com sucesso em ' . $diretorio_destino;
    } else {
        echo 'Erro ao criar diretório em ' . $diretorio_destino;
    }

    // Verifica se a variável $_FILES['img_imovel'] foi definida corretamente
    if (isset($_FILES['img_imovel']) && is_array($_FILES['img_imovel']['tmp_name'])) {
        // Itera sobre o array de arquivos
        foreach ($_FILES['img_imovel']['tmp_name'] as $key => $tmp_name) {
            // Verifica se o arquivo tem erro
            if ($_FILES['img_imovel']['error'][$key] != 0) {
                echo 'Erro ao enviar a imagem ' . $_FILES['img_imovel']['name'][$key];
                continue;
            }

        // Gera um nome unio para a imagem (para eviar sobrescrição de arquivos com o mesmo nome)
        $nome_imagem = uniqid('img_imovel') . '.' . pathinfo($_FILES['img_imovel']['name'][$key], PATHINFO_EXTENSION);

        // Caminho completo para onde a imagem será enviada
        $caminho_imagem = $diretorio_destino . '/' . $nome_imagem;

        // Teta mover a imagem para o diretório de destino
        if (move_uploaded_file($_FILES['img_imovel']['tmp_name'][$key], $caminho_imagem)) {
            echo 'Imagem ' . $_FILES['img_imovel']['name'][$key] . ' enviada com sucesso para ' . $caminho_imagem;
            header('location: ../../imoveis.php');
        }else {
            echo 'Erro ao enviar a imagem ' . $_FILES['img_imovel']['name'][$key] . ' para ' . $caminho_imagem;
        }
    }
}
}

// // Itera sobre o array de arquivos
// foreach($_FILES['img_imovel']['tmp_name'] as $key => $tmp_name) {
    
//     // Verifica se o arquivo tem erro
//     if($_FILES['img_imovel']['error'][$key] != 0) {
//         echo 'Erro ao enviar a imagem ' . $_FILES['img_imovel']['name'][$key];
//         continue;
//     }

//     // Gere um nome único para a imagem (para evitar sobrescrição de arquivos com o mesmo nome)
//     $nome_imagem = uniqid('img_imovel_') . '.' . pathinfo($_FILES['img_imovel']['name'][$key], PATHINFO_EXTENSION);

//     // Caminho completo para onde a imagem será enviada
//     $caminho_imagem = $diretorio_destino . '/' . $nome_imagem;

//     // Tenta mover a imagem para o diretório de destino
//     if(move_uploaded_file($_FILES['img_imovel']['tmp_name'][$key], $caminho_imagem)) {
//         echo 'Imagem ' . $_FILES['img_imovel']['name'][$key] . ' enviada com sucesso para ' . $caminho_imagem;
//         header('location: ../../imoveis.php');
//     } else {
//         echo 'Erro ao enviar a imagem ' . $_FILES['img_imovel']['name'][$key] . ' para ' . $caminho_imagem;
//     }
// }


?>
