<?php 
include_once('./php/connection.php');
include_once('./navigation/session.php');

$cod_imovel      = $_GET['cod_imovel'];

$sqlEditaImovel = "SELECT * FROM imoveis WHERE id = " . $_GET['cod_imovel'];
$EditaImovel = $conn->query($sqlEditaImovel);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição Galeria do Imóveis</title>

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
                        <h1 class="m-0">Galeria Imóveis - Edição</h1>
                    </div><!-- /.col -->
                    <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div>/.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>

        <div class="card card-dark col-12">
            <div class="card-header">
                <h3 class="card-title">Edição do Imóveis - Galeria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/imovel/insert_imagem_imoveis.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cod_imovel" value="<?php echo $cod_imovel; ?>">
                    <div class="card-body">
                    <?php
                        ($rowEditaImovel = $EditaImovel->fetch_assoc()); { ?>
                        <!-- ID Sobre -->
                        <div class="form-group">
                            <label for="cod_imovel">ID:</label>
                            <input type="text" class="form-control" name="cod_imovel" id="cod_imovel"
                            disabled placeholder="Digite o titulo do Sobre" value="<?php echo $rowEditaImovel['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="img-upload">FOTO:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_imovel[]" id="formFileMultiple" multiple required>
                                    <label class="custom-file-label" for="formFileMultiple">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <!-- <small>*Tamanho: 300px X 200px</small> -->

                            <script>
                                // Adicione um manipulador de eventos ao input de arquivo
                                document.getElementById("formFileMultiple").addEventListener("change", function () {
                                    // Obtenha o arquivo selecionado pelo usuário
                                    var arquivo = this.files[0];
                                    // Verifique se o arquivo é uma imagem
                                    if (arquivo.type.match(/image.*/)) {
                                        // Crie um objeto URL para o arquivo
                                        var url = URL.createObjectURL(arquivo);
                                        // Defina o atributo src da imagem para a URL do objeto
                                        document.getElementById("img-preview").src = url;
                                        // Define o nome do arquivo como o nome do arquivo selecionado
                                        document.getElementById("img-name").textContent = arquivo.name;
                                    }
                                }); 
                            </script>

                            <figure style="text-align: center;">
                                <img style="height: 200px; width: 250px;" id="img-preview"
                                    src="./galerias/carregando.png" alt="Imagem de visualização">
                                <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <span id="img-name"></span>
                            </figure>
                       <?php } ?>
                        </div>
                            <!-- <input type="hidden" name="cod_sobre" value="<?php echo $rowEditaImovel['id']; ?>"> -->

                            <div class="card-footer">
                      <!-- Botão para cadastrar -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Cadastrar</button>

                        <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="galerias.php" role="button"><i class="fa-solid fa-image"
                          style="gap: 15px;"></i> Galerias</a>

                        <!-- Botão Voltar -->
                        <a class="btn btn-dark" href="imoveis.php" role="button"><i class="fa-solid fa-backward"
                          style="gap: 15px;"></i> Imóveis</a>
                    </div>
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- </form> -->
                            <?php
                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);

                            //diretório onde as imagens estão armazenadas
                            $diretorio = './galerias/imoveis/' . $rowEditaImovel['id'] . '/';
                            // echo $diretorio;

                            // Verifica se a pasta existe
                            if (!is_dir($diretorio)) {
                                echo 'Pasta não encontrada...';
                            } else {
                                // Encontra todas as imagens no diretório corresposndete ao ID
                                $imagens = array_diff(scandir($diretorio), array('..', '.'));
                                // Verifica se ha imagens no diretório
                                if (empty($imagens)) {
                                    echo 'Não há imagens para exibir';
                                } else {
                                        // itera sobre as imagens e exibe cada uma delas
                                        foreach ($imagens as $imagem) {
                                        $caminho_imagem = $imagem;
                                        echo '<div class="card text-center" style="padding: 20px; gap: 15px;">';
                                        echo '<div class="card-header bg-dark">Imóvel</div>';
                                        echo '<img src="'.$diretorio.$caminho_imagem.'" class="card-img-top" style="height: 230px; gap: 15px;" alt="Imagem sobre">';
                                        echo '<div class="card-body">'; 
                                        echo '<p class="card-text"></p>';
                                        echo '<a href="exclui_imagem_imovel.php?imagem='.urlencode($diretorio.$caminho_imagem).'" class="btn btn-danger"">Deletar</a>';
                                        echo '</div>';
                                        echo '<div class="card-footer text-muted bg-dark"><br></div>';
                                        echo '</div>';
                                    }
                                }
                            }

                        ?>


                <!-- <div class="card text-center">
                        <div class="card-header bg-dark">
                            Sobre
                        </div>
                        <img src="<?php echo $caminho_imagem; ?>" class="card-img-top" alt="Imagem sobre">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text"></p>
                            <a href="#" class="btn btn-danger">Deletar</a>
                        </div>
                        <div class="card-footer text-muted bg-dark">
                        2 days ago
                        </div>
                </div> -->
            </form> 
            </div>
        </div>
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