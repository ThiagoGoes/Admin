<?php
include_once('./php/connection.php');
include_once('./navigation/session.php');

$sqlImoveisEditar = "SELECT * FROM imoveis WHERE id = " . $_GET['cod_imovel'];
$imoveisEditar = $conn->query($sqlImoveisEditar);

$sqlImoveis = "SELECT * FROM imoveis";
$imoveis = $conn->query($sqlImoveis);

$sqlTpImovel = "SELECT * FROM tipo_imovel";
$tpImovel = $conn->query($sqlTpImovel);

$sqlTpNegociacao = "SELECT * FROM tipo_negociacao";
$tpNegociacao = $conn->query($sqlTpNegociacao);

$sqlCidade = "SELECT * FROM cidade";
$Cidade = $conn->query($sqlCidade);

$sqlBairros = "SELECT * FROM bairros";
$Bairros = $conn->query($sqlBairros);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
// Pegando informação e transformando em um array para subistituir os
// dados de um registro de ID para descrição(nome);

// Cidade
$nomeCidades = array();
$resultadoCidade = mysqli_query($conn, "SELECT id, nome FROM cidade");
while ($rowCidade = mysqli_fetch_array($resultadoCidade, MYSQLI_ASSOC)) {
    $nomeCidades[$rowCidade['id']] = $rowCidade['nome'];
}

// Tipo de Negociação
$TipoNegociacao = array();
$resultadoTpNegociacao = mysqli_query($conn, "SELECT id, descricao FROM tipo_negociacao");
$rows = mysqli_fetch_all($resultadoTpNegociacao, MYSQLI_ASSOC);
foreach ($rows as $row) {
    $descTpNegociacao[$row['id']] = $row['descricao'];
}


// Tipo de Imóvel
// $TipoImovel = array();
// $resultadoTpImovel = mysqli_query($conn, "SELECT id, descricao FROM tipo_imovel");
// while ($ResulTpImovel = mysqli_fetch_array($resultadoTpImovel, MYSQLI_ASSOC)) {
//     $descTpImovel[$ResulTpImovel['id']] = $ResulTpImovel['descricao'];
// }

// Bairro
$NomeBairros = array();
$resultadoBairro = mysqli_query($conn, "SELECT id, bairro FROM bairros");
while ($rowBairros = mysqli_fetch_array($resultadoBairro, MYSQLI_ASSOC)) {
    $NomeBairros[$rowBairros['id']] = $rowBairros['bairro'];
}


// Verifica se o campo "Id_interno" é igual a 0 ou NULL
// $bloqueiaCampos = false;
// if ($imoveisEditar && ($row = $imoveisEditar->fetch_assoc()) && isset($row['id_interno']) && ($row['id_interno'] != 0 && $row['id_interno'] != NULL)) {
//     $bloqueiaCampos = true;
// }

if (isset($_SESSION['usuario'])) {
    if ($_SESSION['root'] == 1) {
        // Usuário root pode editar todos os campos
        $bloqueiaCampos = false;
    } else {
        // Usuário não root não pode editar nenhum campo
        $bloqueiaCampos = true;
    }
} else {
    // Usuário não logado não pode editar nenhum campo
    $bloqueiaCampos = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Cadastro de Imóveis</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
    <script src="https://kit.fontawesome.com/5ea68ebcc6.js" crossorigin="anonymous"></script>
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Icon Página -->
    <link rel="shortcut icon" href="https://www.syspan.com.br/img/syspan.ico">
<!-- 
    <style>
        .legend{
            color: red;
        }
    </style> -->

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once('./navigation/nav-bar.php'); ?>
    <!-- </div> -->
    <!-- /.navbar -->

    <!-- Importando a barra de navegação com as listagens -->
    <?php include_once('./navigation/navs.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position: relative;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Imóvel - Novo</h1>
                    </div><!-- /.col -->
                    <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div>/.col -->
                </div>

                <!-- Verifica se tem ID interno, se tiver retorna mensagem informando o movito 
                     de não poder alterar
                -->
                <?php 
                    // if ($bloqueiaCampos) {
                    //     if (empty($row['id_interno']) || $row['id_interno'] == 0) {
                    //         echo "<p>Não é possível fazer alteração, pois este cadastro já possui vínculo com um ID interno(SKU).</p>";
                    //     } else {
                    //         echo "<p>Não é possível fazer alteração, pois o ID interno(SKU) deste cadastro é diferente de zero.</p>";
                    //     }
                    // } else {
                    //     echo "<p>Campos liberados para alteração!</p>";
                    // }

                    $root = 'root';
                    $roots_permitidos = array(0, 1); // Adicione aqui os valores permitidos
                    
                    if ($bloqueiaCampos) {
                        echo "<p>Não é possível fazer alteração, pois você não tem permissão para isso.</p>";
                    } elseif (!in_array($root, $roots_permitidos)) {
                    //     echo "<p>Não é possível fazer alteração, pois o valor de root é inválido.</p>";
                    // } else {
                        echo "<p>Campos liberados para alteração!</p>";
                    }
                ?>
                <!-- FIM -->
            </div>
        </div>
        <p class="legend" style="padding-left: 15px;">Legenda referente aos campos marcado com *(Asterisco)</p>
        <hr>

        <div class="card card-dark col-12">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Imóvel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/imovel/update_imovel.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <?php
                        ($rowimoveisEditar = $imoveisEditar->fetch_assoc()); { ?>
                        <!-- Informa o ID do Imóvel-->
                        <div class="form-group">
                            <label for="cod_imovel">ID:</label>
                            <input type="text" class="form-control" name="cod_imovel" id="cod_imovel" 
                            disabled placeholder="" value="<?php echo $rowimoveisEditar['id']; ?>">
                        </div>
                        <!-- Informa o Endereço do Imóvel-->
                        <div class="form-group">
                            <label for="endereco_imovel">ENDEREÇO:</label>
                            <input type="text" class="form-control" name="endereco_imovel" id="endereco_imovel" 
                            placeholder="" value="<?php echo $rowimoveisEditar['endereco']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>
                        
                        <!-- Seleciona o Tipo do imóvel -->
                        <div class="form-group">
                            <label>TIPO IMÓVEL(Escolha o Tipo de Imóvel):</label>
                            <select class="form-control" id="id_tp_imovel" name="id_tp_imovel" <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php while ($rowTpImovel = mysqli_fetch_array($tpImovel, MYSQLI_ASSOC)) { ?>
                                    <option value="<?php echo $rowTpImovel['id']; ?>" <?php if ($rowimoveisEditar['tipo_imovel'] == $rowTpImovel['id']) { echo 'selected'; } ?>>
                                        <?php echo $rowTpImovel['descricao']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <small class="legend">*Ex: Apartamento, Chacará, Ect...*</small>
                        </div>


                        <!-- Escolhe o Tipo de Negociação -->
                        <div class="form-group">
                            <label>TIPO NEGOCIAÇÃO:</label>
                            <select class="form-control" id="id_tp_negociacao" name="id_tp_negociacao" <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php foreach ($descTpNegociacao as $id_tp_negociacao => $descTpNegociacao) { ?>
                                    <option value="<?php echo $id_tp_negociacao; ?>" <?php if($rowimoveisEditar['tipo_negociacao'] == $id_tp_negociacao) { echo 'selected'; } ?>><?php echo $descTpNegociacao?></option>
                                <?php } ?>
                            </select>
                            <small class="legend">*Ex: Venda, Aluguel*</small>
                        </div>

                        <!-- Escolhe a cidade  -->
                        <div class="form-group">
                            <label>CIDADE:</label>
                            <select class="form-control" id="id_cidade" name="id_cidade" <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php
                                // Primeiro, verifique se o valor de id_cidade já está definido
                                if (isset($rowimoveisEditar['id_cidade'])) {
                                    // Se sim, crie a opção selecionada com base no valor existente
                                    echo '<option value="' . $rowimoveisEditar['id_cidade'] . '" selected>' . $nomeCidades[$rowimoveisEditar['id_cidade']] . '</option>';

                                    // Agora, itere sobre o array de cidades para imprimir as outras opções
                                    foreach ($nomeCidades as $id_cidade => $nome) {
                                        if ($id_cidade != $rowimoveisEditar['id_cidade']) {
                                            echo '<option value="' . $id_cidade . '">' . $nome . '</option>';
                                        }
                                    }
                                } else {
                                    // Se não, apenas itere sobre o array de cidades e imprima todas as opções
                                    foreach ($nomeCidades as $id_cidade => $nome) {
                                        echo '<option value="' . $id_cidade . '">' . $nome . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <!-- Bairro -->
                        <div class="form-group">
                            <label>BAIRRO:</label>
                            <select class="form-control" id="id_bairro" name="id_bairro" <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <!-- <option selected><?php echo $rowimoveisEditar['id_bairro'] ?></option> -->

                                <?php
                                    // Primeiro, verifica se o valor do id_bairro já esta definido
                                    if (isset($rowimoveisEditar['id_bairro'])) {
                                        echo '<option value="' . $rowimoveisEditar['id_bairro'] . '" selected>' . $NomeBairros[$rowimoveisEditar['id_bairro']] . '</option>';

                                        // Agora, intere sobre o array de Bairros para imprimir as outras opções;
                                        foreach ($NomeBairros as $id_bairro => $nome) {
                                            if ($id_bairro != $rowimoveisEditar['id_bairro']) {
                                                echo '<option value="' . $id_bairro . '">' . $nome . '</option>';
                                            }
                                        }
                                    } else {
                                        // Se não, apenas intere sobre o array de cidades e im´prima todas as opções
                                        foreach($NomeBairros as $id_bairro => $nome) {
                                            echo '<option value="' . $id_bairro . '">' . $nome . '</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <!-- <small>Ex: Venda, Aluguel</small> -->
                        </div>

                        <!-- Area Útil -->
                        <div class="form-group">
                            <label>ÁREA ÚTIL:</label>
                            <select class="form-control" id="area_util" name="area_util"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php 
                                    $area_util = $rowimoveisEditar['area_util'];
                                    if ($area_util == 0) {
                                        echo '<option selected>0 - NÃO</option>';
                                        echo '<option value="1">1 - SIM</option>';
                                    } elseif ($area_util == 1) {
                                        echo '<option value="0">0 - NÃO</option>';
                                        echo '<option selected>1 - SIM</option>';
                                    } else {
                                        echo '<option value="0">0 - NÃO</option>';
                                        echo '<option value="1">1 - SIM</option>';
                                    }
                                ?>
                                </select>
                            <small class="legend">*0 - Não*</small><br>
                            <small class="legend">*1 - Sim*</small>
                        </div>


                        <!-- <div class="form-group">
                            <label>ÁREA ÚTIL:</label>
                            <select class="form-control" id="area_util" name="area_util"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <option selected><?php echo $rowimoveisEditar['area_util']; ?></option>
                                <option value="0">0 - NÃO</option>
                                <option value="1">1 - SIM</option>
                            </select>
                            <small class="legend">*0 - Não*</small><br>
                            <small class="legend">*1 - Sim*</small>
                        </div> -->

                        <!-- Área Total -->
                        <div class="form-group">
                            <label for="area_total">ÁREA TOTAL:</label>
                            <input min="0" type="number" class="form-control" name="area_total" id="area_totalid_interno_bairrro" 
                            placeholder="" value="<?php echo $rowimoveisEditar['area_total']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Observação -->
                        <div class="form-group">
                            <label>OBSERVAÇÃO:</label>
                            <textarea class="form-control" rows="5" name="obs_imoveis"
                                id="obs_imoveis" placeholder="Digite a Observação do Imóvel"
                                <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php echo $rowimoveisEditar['obs']; ?>
                            </textarea>
                        </div>

                        <!-- Dormitórios -->
                        <div class="form-group">
                            <label for="dormitorios">DORMITÓRIOS:</label>
                            <input min="0" type="number" class="form-control" name="dormitorios" id="dormitorios" 
                            placeholder="" value="<?php echo $rowimoveisEditar['dormitorios']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Banheiros -->
                        <div class="form-group">
                            <label for="banheiros">BANHEIROS:</label>
                            <input min="0" type="number" class="form-control" name="banheiros" id="banheiros" 
                            placeholder="" value="<?php echo $rowimoveisEditar['banheiros']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- salas -->
                        <div class="form-group">
                            <label for="salas">SALAS:</label>
                            <input min="0" type="number" class="form-control" name="salas" id="salas" 
                            placeholder="" value="<?php echo $rowimoveisEditar['salas']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Suítes -->
                        <div class="form-group">
                            <label for="suites">SUÍTES:</label>
                            <input min="0" type="number" class="form-control" name="suites" id="suites" 
                            placeholder="" value="<?php echo $rowimoveisEditar['suites']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Vagas Garagem -->
                        <div class="form-group">
                            <label for="vagas">VAGAS DE GARAGEM:</label>
                            <input min="0" type="number" class="form-control" name="vagas" id="vagas" 
                            placeholder="" value="<?php echo $rowimoveisEditar['vagas']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- id Interno -->
                        <div class="form-group">
                            <label for="id_interno">ID INTERNO(SKU):</label>
                            <input min="0" type="number" class="form-control" name="id_interno" id="id_interno" 
                            placeholder="" value="<?php echo $rowimoveisEditar['id_interno']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Situação -->

                        <div class="form-group">
                            <label>ATIVO:</label>
                            <select class="form-control" id="situacao" name="situacao"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php
                                   $situacao = $rowimoveisEditar['ativo'];
                                   if ($situacao == 0) {
                                    echo '<option selected>0 - SIM</option>';
                                    echo '<option value="1">1 - NÃO</option>';
                                   } elseif ($situacao == 1) {
                                    echo '<option value="0">0 - SIM</option>';
                                    echo '<option selected>1 - NÃO</option>';
                                   } else {
                                    echo '<option value="0">0 - SIM</option>';
                                    echo '<option value="1">1 - NÃO</option>';
                                   }
                                ?>
                            </select>
                            <small class="legend">*Se irá ou não aparecer no site*</small><br>
                            <small class="legend">*0 - Sim*</small><br>
                            <small class="legend">*1 - Não*</small>
                        </div>


                        <!-- <div class="form-group">
                            <label>ATIVO:</label>
                            <select class="form-control" id="situacao" name="situacao"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <option selectd><?php echo $rowimoveisEditar['ativo']; ?></option>
                                <option value="0">0 - SIM</option>
                                <option value="1">1 - NÃO</option>
                            </select>
                            <small class="legend">*Se irá ou não aparecer no site*</small><br>
                            <small class="legend">*0 - Sim*</small><br>
                            <small class="legend">*1 - Não*</small>
                        </div> -->

                        <!-- Complemento -->
                        <div class="form-group">
                            <label for="complemento">COMPLEMENTO:</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" 
                            placeholder="" value="<?php echo $rowimoveisEditar['complemento']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                            <small class="legend">*Ex: Fundos, etc...*</small>
                        </div>

                        <!-- iptu -->
                        <div class="form-group">
                            <label>IPTU:</label>
                            <select class="form-control" id="iptu" name="iptu"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php
                                    $iptu = $rowimoveisEditar['iptu'];
                                   if ($iptu =='N') {
                                    echo '<option selected>NÃO</option>';
                                    echo '<option value ="S">SIM</option>';
                                   } elseif ($iptu == 'S') {
                                    echo '<option value="N">NÃO</option>';
                                    echo '<option selected>SIM</option>';
                                   } else {
                                    echo '<option selected>Possui IPTU Incluso?</option>';
                                    echo '<option value="N">NÃO</option>';
                                    echo '<option value="S">SIM</option>';
                                   }
                                ?>
                            </select>
                        </div>


                        <!-- <div class="form-group">
                            <label>IPTU:</label>
                            <select class="form-control" id="iptu" name="iptu"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <option selected><?php echo $rowimoveisEditar['iptu']; ?></option>
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select>
                        </div> -->

                        <!-- iptu locador -->
                        <div class="form-group">
                            <label>IPTU LOCADOR:</label>
                            <select class="form-control" id="iptu_locador" name="iptu_locador"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php
                                    $iptu_locador = $rowimoveisEditar['iptu_locador'];
                                    if ($iptu_locador =='N') {
                                        echo '<option selected>NÃO</option>';
                                        echo '<option value ="S">SIM</option>';
                                       } elseif ($iptu_locador == 'S') {
                                        echo '<option value="N">NÃO</option>';
                                        echo '<option selected>SIM</option>';
                                       } else {
                                        echo '<option selected>Possui IPTU Locador?</option>';
                                        echo '<option value="N">NÃO</option>';
                                        echo '<option value="S">SIM</option>';
                                       }
                                ?>
                            </select>
                        </div>           



                        <!-- <div class="form-group">
                            <label>IPTU LOCADOR:</label>
                            <select class="form-control" id="iptu_locador" name="iptu_locador"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <option selected><?php echo $rowimoveisEditar['iptu_locador']; ?></option>
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select>
                        </div> -->

                        <!-- condominio -->
                        <div class="form-group">
                            <label>CONDOMINÍO:</label>
                            <select class="form-control" id="condominio" name="condominio"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php
                                    $condominio = $rowimoveisEditar['condominio'];
                                    if ($condominio =='N') {
                                        echo '<option selected>NÃO</option>';
                                        echo '<option value ="S">SIM</option>';
                                       } elseif ($condominio == 'S') {
                                        echo '<option value="N">NÃO</option>';
                                        echo '<option selected>SIM</option>';
                                       } else {
                                        echo '<option selected>Possui Condominío?</option>';
                                        echo '<option value="N">NÃO</option>';
                                        echo '<option value="S">SIM</option>';
                                       }
                                ?>
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <label>CONDOMINÍO:</label>
                            <select class="form-control" id="condominio" name="condominio"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <option selected><?php echo $rowimoveisEditar['condominio']; ?></option>
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select>
                        </div> -->

                        <!-- Valor Pretendido -->
                        <div class="form-group">
                            <label for="vl_pretendido">VALOR PRETENDIDO:</label>
                            <input min="0" type="number" class="form-control" name="vl_pretendido" id="vl_pretendido" 
                            placeholder="" value="<?php echo $rowimoveisEditar['valor_pretendido']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Video -->
                        <div class="form-group">
                            <label for="video">VIDEO:</label>
                            <input type="text" class="form-control" name="video" id="video" 
                            placeholder="" value="<?php echo $rowimoveisEditar['video']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Mapa -->
                        <div class="form-group">
                            <label>MAPA:</label>
                            <textarea class="form-control" rows="5" name="mapa"
                                id="mapa" placeholder="Digite o mapa do Imóvel"
                                <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <?php echo $rowimoveisEditar['mapa']; ?>
                            </textarea>
                        </div>

                        <!-- latitude -->
                        <div class="form-group">
                            <label for="latitude">LATITUDE:</label>
                            <input min="0" type="number" class="form-control" name="latitude" id="latitude" 
                            placeholder="" value="<?php echo $rowimoveisEditar['latitude']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- longitude -->
                        <div class="form-group">
                            <label for="longitude">LONGITUDE:</label>
                            <input min="0" type="number" class="form-control" name="longitude" id="longitude" 
                            placeholder="" value="<?php echo $rowimoveisEditar['longitude']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>

                        <!-- Imagem Imóvel -->
                        <!-- <div class="form-group">
                            <label for="img-upload">FOTO:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_imovel" id="imagem"
                                    <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                    <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
                                </div>
                            </div>

                            <script>
                                // Adicione um manipulador de eventos ao input de arquivo
                                document.getElementById("imagem").addEventListener("change", function () {
                                    // Obtenha o arquivo selecionado pelo usuário
                                    var arquivo = this.files[0];
                                    // Verifique se o arquivo é uma imagem
                                    if (arquivo.type.match(/image.*/)) {
                                        // Crie um objeto URL para o arquivo
                                        var url = URL.createObjectURL(<?php echo $row['imagem']; ?>);
                                        // Defina o atributo src da imagem para a URL do objeto
                                        document.getElementById("img-preview").src = url;
                                        // Define o nome do arquivo como o nome do arquivo selecionado
                                        document.getElementById("img-name").textContent = "<?php echo basename($row['imagem']); ?>";
                                    }
                                }); 
                            </script>

                            <figure style="text-align: center;">

                                <?php 
                                    $imagem_banco = $row['imagem']; 
                                    $imagem = './galerias/imoveis/'.pathinfo($imagem_banco)['basename'];  
                                    if (file_exists($imagem)) {
                                    $imagem = './galerias/imoveis/'.pathinfo($imagem_banco)['basename']; 
                                    } else {
                                    $imagem = './galerias/carregando.png';
                                    }                                 

                                ?>
                                <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <img style="height: 200px; width: 250px;" id="img-preview"
                                    src="<?php echo $imagem; ?>" alt="Imagem de visualização">
                                <span id="img-name"></span>
                            </figure>
                        </div> -->
                        <input type="hidden" name="cod_imovel" value="<?php echo $rowimoveisEditar['id']; ?>">
                       <?php } ?>

                    </div>



                    <div class="card-footer">
                      <!-- Botão para cadastrar -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>

                        <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="imoveis.php" role="button"><i class="fa-solid fa-backward"
                          style="gap: 15px;"></i> Voltar</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <?php include_once('./navigation/footer.php'); ?>
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="dist/js/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- <script src="dist/js/demo.js"></script> -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>