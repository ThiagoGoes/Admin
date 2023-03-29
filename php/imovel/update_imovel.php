<?php
include_once('../connection.php');

$cod_imovel             = $_POST['cod_imovel'];
$endereco_imovel        = isset($_POST['endereco_imovel']) ? $_POST['endereco_imovel'] : '';
$id_tp_imovel           = isset($_POST['id_tp_imovel']) ? $_POST['id_tp_imovel'] : '';
$id_tp_negociacao       = isset($_POST['id_tp_negociacao']) ? $_POST['id_tp_negociacao'] : '';
$id_cidade              = isset($_POST['id_cidade']) ? $_POST['id_cidade'] : '';
$id_bairro              = isset($_POST['id_bairro']) ? $_POST['id_bairro'] : '';
$area_util              = isset($_POST['area_util']) ? $_POST['area_util'] : '';
$area_total             = isset($_POST['area_total']) ? $_POST['area_total'] : '';
$dormitorios            = isset($_POST['dormitorios']) ? $_POST['dormitorios'] : '';
$vl_pretendido          = isset($_POST['vl_pretendido']) ? $_POST['vl_pretendido'] : '';
$obs_imoveis            = isset($_POST['obs_imoveis']) ? $_POST['obs_imoveis'] : '';
$mapa                   = isset($_POST['mapa']) ? $_POST['mapa'] : '';
$video                  = isset($_POST['video']) ? $_POST['video'] : '';
$banheiros              = isset($_POST['banheiros']) ? $_POST['banheiros'] : '';
$img_imovel             = isset($_FILES['img_imovel']['name']) ? $_FILES['img_imovel']['name'] : '';
$imagem_temp            = $_FILES['img_imovel']['tmp_name'];
$suites                 = isset($_POST['suites']) ? $_POST['suites'] : '';
$vagas                  = isset($_POST['vagas']) ? $_POST['vagas'] : '';
$id_interno             = isset($_POST['id_interno']) ? $_POST['id_interno'] : '';
$situacao               = isset($_POST['situacao']) ? $_POST['situacao'] : '';
$complemento            = isset($_POST['complemento']) ? $_POST['complemento'] : '';
$iptu                   = isset($_POST['iptu']) ? $_POST['iptu'] : '';
$iptu_locador           = isset($_POST['iptu_locador']) ? $_POST['iptu_locador'] : '';
$condominio             = isset($_POST['condominio']) ? $_POST['condominio'] : '';
$salas                  = isset($_POST['salas']) ? $_POST['salas'] : '';
$latitude               = isset($_POST['latitude']) ?$_POST['latitude'] : '';
$longitude              = isset($_POST['longitude']) ? $_POST['longitude'] : '';


if($img_imovel) { // verifica se foi enviado um arquivo
    $destino = "../../galerias/imoveis/" . $img_imovel;
    // move_uploaded_file($imagem_temp, $_SERVER['DOCUMENT_ROOT'] . $destino);
    move_uploaded_file($imagem_temp, $destino);
} else {
    $destino = "";
}

$stmt = mysqli_prepare($conn, "UPDATE
                                    imoveis
                                SET 
                                    endereco = ?,
                                    tipo_imovel = ?,
                                    tipo_negociacao = ?,
                                    id_cidade = ? ,
                                    id_bairro = ?,
                                    area_util = ?,
                                    area_total = ?,
                                    dormitorios = ?,
                                    valor_pretendido = ?,
                                    obs = ?,
                                    mapa = ?,
                                    video = ?,
                                    banheiros = ?,
                                    imagem = ?,
                                    suites = ?,
                                    vagas = ?,
                                    id_interno = ?,
                                    ativo = ?,
                                    complemento = ?,
                                    iptu = ?,
                                    iptu_locador = ?,
                                    condominio = ?,
                                    salas = ?,
                                    latitude = ?,
                                    longitude = ?
                                    WHERE 
                                    id = ?");



if (is_array($img_imovel)) {
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssi", 
                                      $endereco_imovel,
                                     $id_tp_imovel,
                                            $id_tp_negociacao,
                                            $id_cidade,
                                            $id_bairro,
                                            $area_util,
                                            $area_total,
                                            $dormitorios,
                                            $vl_pretendido,
                                            $obs_imoveis,
                                            $mapa,
                                            $video,
                                            $banheiros,
                                            $img_imovel['name'],
                                            $suites,
                                            $vagas,
                                            $id_interno,
                                            $situacao,
                                            $complemento,
                                            $iptu,
                                            $iptu_locador,
                                            $condominio,
                                            $salas,
                                            $latitude,
                                            $longitude,
                                            $img_imovel);
} else {
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssi", 
                                      $endereco_imovel,
                                     $id_tp_imovel,
                                            $id_tp_negociacao,
                                            $id_cidade,
                                            $id_bairro,
                                            $area_util,
                                            $area_total,
                                            $dormitorios,
                                            $vl_pretendido,
                                            $obs_imoveis,
                                            $mapa,
                                            $video,
                                            $banheiros,
                                            $img_imovel,
                                            $suites,
                                            $vagas,
                                            $id_interno,
                                            $situacao,
                                            $complemento,
                                            $iptu,
                                            $iptu_locador,
                                            $condominio,
                                            $salas,
                                            $latitude,
                                            $longitude,
                                            $cod_imovel);
}


echo "cod_imovel =         $cod_imovel<br>";
echo "endereco_imovel =        $endereco_imovel<br>";
echo "id_tp_imovel =    $id_tp_imovel<br>";
echo "id_tp_negociacao =      $id_tp_negociacao<br>";
echo "id_cidade =      $id_cidade<br>";
echo "id_bairro =      $id_bairro<br>";
echo "area_util =      $area_util<br>";
echo "area_total =         $area_total<br>";
echo "dormitorios =    $dormitorios<br>";
echo "vl_pretendido =       $vl_pretendido<br>";
echo "obs_imoveis  = $obs_imoveis<br>";
echo "mapa = $mapa<br>";
echo "video = $video<br>";
echo "banheiros = $banheiros<br>";
echo "img_imovel = $img_imovel<br>";
echo "suites  = $suites<br>";
echo "vagas = $vagas<br>";
echo "id_interno = $id_interno<br>";
echo "situacao = $situacao<br>";
echo "complemento = $complemento<br>";
echo "iptu = $iptu<br>";
echo "iptu_locador = $iptu_locador<br>";
echo "condominio = $condominio<br>";
echo "salas = $salas<br>";
echo "latitude = $latitude<br>";
echo "longitude = $longitude<br>";

// mysqli_stmt_bind_param($stmt, "ssssi", $desc_banners, $destino['name'], $link_banner, $link_externo_banners, $cod_banners);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_stmt_execute($stmt);
if (mysqli_stmt_error($stmt)) {
    printf("Error: %s.\n", mysqli_stmt_error($stmt));
    exit();
}

if (!$stmt) {
    printf("Error: %s.\n", mysqli_error($conn));
    exit();
}

if (mysqli_stmt_affected_rows($stmt) > 0) {
    // $uploads_dir = '../uploads/';
    // $tmp_name = $img_banners['tmp_name'];
    // $name = $img_banners['name'];
    // $upload_file = $uploads_dir . basename($name);
    // move_uploaded_file($tmp_name, $upload_file);
    echo "<script> alert('Dados alterados com sucesso!') </script>";
    header('location: ../../imoveis.php');
} else {
    echo 'Não foi possível alterar os dados!';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>