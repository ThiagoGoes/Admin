<?php
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Diretório para onde as imagens serão enviadas
$diretorio_destino = '../../galerias/empreendimentos/' . $_POST['cod_empreendimentos'];

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


// Verifica se a variável $_FILES['img_sobre'] foi definida corretamente
if (isset($_FILES['img_empreendimentos']) && is_array($_FILES['img_empreendimentos']['tmp_name'])) {
    // Itera sobre o array de arquivos
    foreach ($_FILES['img_empreendimentos']['tmp_name'] as $key => $tmp_name) {
        // Verifica se o arquivo tem erro
        if ($_FILES['img_empreendimentos']['error'][$key] != 0) {
            echo 'Erro ao enviar a imagem ' . $_FILES['img_empreendimentos']['name'][$key];
            continue;
        }

        // Gera um nome único para a imagem (para evitar sobrescrição de arquivos com o mesmo nome)
        $nome_imagem = uniqid('img_empreendimentos') . '.' . pathinfo($_FILES['img_empreendimentos']['name'][$key], PATHINFO_EXTENSION);

        // Caminho completo para onde a imagem será enviada
        $caminho_imagem = $diretorio_destino . '/' . $nome_imagem;

        // Tenta mover a imagem para o diretório de destino
        if (move_uploaded_file($_FILES['img_empreendimentos']['tmp_name'][$key], $caminho_imagem)) {
            echo 'Imagem ' . $_FILES['img_empreendimentos']['name'][$key] . ' enviada com sucesso para ' . $caminho_imagem;
            header('location: ../../empreendimentos.php');
        } else {
            echo 'Erro ao enviar a imagem ' . $_FILES['img_empreendimentos']['name'][$key] . ' para ' . $caminho_imagem;
        }
    }
}
}

?>