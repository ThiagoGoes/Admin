<?php
include_once('../connection.php');

$endereco_imovel        = $_POST['endereco_imovel'];
$id_tp_imovel           = $_POST['id_tp_imovel'];
$id_tp_negociacao       = $_POST['id_tp_negociacao'];
$id_cidade              = $_POST['id_cidade'];
$id_bairro              = $_POST['id_bairro'];
$area_util              = $_POST['area_util'];
$area_total             = $_POST['area_total'];
$dormitorios            = $_POST['dormitorios'];
$vl_pretendido          = $_POST['vl_pretendido'];
$obs_imoveis            = $_POST['obs_imoveis'];
$mapa                   = $_POST['mapa'];
$video                  = $_POST['video'];
$banheiros              = $_POST['banheiros'];
$img_imovel             = $_FILES['img_imovel']['name'];
$imagem_temp            = $_FILES['img_imovel']['tmp_name'];
$suites                 = $_POST['suites'];
$vagas                  = $_POST['vagas'];
$id_interno             = $_POST['id_interno'];
// $id_interno             = mt_rand(1000, 9999) . $mysqli->insert_id; // id_interno gerado aleatoriamente
$situacao               = $_POST['situacao'];
$complemento            = $_POST['complemento'];
$iptu                   = $_POST['iptu'];
$iptu_locador           = $_POST['iptu_locador'];
$condominio             = $_POST['condominio'];
$salas                  = $_POST['salas'];
$latitude               = $_POST['latitude'];
$longitude              = $_POST['longitude'];

// $id_interno = rand(1000, 9999) . uniqid();
// Insere os dados no banco de dados
$sqlImoveis = "INSERT INTO imoveis 
                            (endereco,
                            tipo_imovel,
                            tipo_negociacao,
                            id_cidade,
                            id_bairro,
                            area_util,
                            area_total,
                            dormitorios,
                            valor_pretendido,
                            obs,
                            mapa,
                            video,
                            banheiros,
                            imagem,
                            suites,
                            vagas,
                            id_interno,
                            ativo,
                            complemento,
                            iptu,
                            iptu_locador,
                            condominio,
                            salas,
                            latitude,
                            longitude)
		            VALUES
		                    ('$endereco_imovel',
                            '$id_tp_imovel',
                            '$id_tp_negociacao',
                            '$id_cidade',
                            '$id_bairro',
                            '$area_util',
                            '$area_total',
                            '$dormitorios',
                            '$vl_pretendido',
                            '$obs_imoveis',
                            '$mapa',
                            '$video',
                            '$banheiros',
                            '',
                            '$suites',
                            '$vagas',
                            '$id_interno',
                            '$situacao',
                            '$complemento',
                            '$iptu',
                            '$iptu_locador',
                            '$condominio',
                            '$salas',
                            '$latitude',
                            '$longitude')";

echo $sqlImoveis;

mysqli_query($conn,$sqlImoveis) or die ("Não foi possível inserir os dados.");

// Obtém o ID(Id_interno) do registro recém-inserido
// $id_interno = mysqli_insert_id($conn);
// $id_interno = $_POST['id_interno'];

// Cria a pasta com o mesmo nome do ID do registro
$dir = "../../galerias/imoveis/" . $id_interno;
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// Move a imagem para a pasta criada
if($img_imovel) { // verifica se foi enviado um arquivo
    $destino = $dir . "/" . $img_imovel;
    move_uploaded_file($imagem_temp, $destino);
} else {
    $destino = "";
}

// Atualiza o registro com o caminho da imagem
$sqlUpdateImovel = "UPDATE 
                                imoveis 
                            SET 
                                imagem='$destino' 
                            WHERE 
                            id_interno='$id_interno'";

mysqli_query($conn,$sqlUpdateImovel) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../imoveis.php');
?>