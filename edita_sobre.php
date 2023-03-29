<?php 
include_once('./php/connection.php');
include_once('./navigation/session.php');

$cod_sobre      = $_GET['cod_sobre'];
$titulo_sobre   = $_GET['cod_sobre'];
$texto_sobre    = $_GET['cod_sobre'];
$imagem_sobre   = $_GET['cod_sobre'];

$sqlEditaSobre = "SELECT * FROM sobre WHERE id = " . $_GET['cod_sobre'];
$EditaSobre = $conn->query($sqlEditaSobre);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição do Sobre</title>

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
                        <h1 class="m-0">Sobre - Edição</h1>
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
                <h3 class="card-title">Edição do Sobre</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/sobre/update_sobre.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <?php
                        ($rowEditaSobre = $EditaSobre->fetch_assoc()); { ?>
                        <!-- ID Sobre -->
                        <div class="form-group">
                            <label for="cod_sobre">ID:</label>
                            <input type="text" class="form-control" name="cod_sobre" id="cod_sobre"
                            disabled placeholder="Digite o titulo do Sobre" value="<?php echo $rowEditaSobre['id']; ?>">
                        </div>
                        <!-- Nome Empreendimentos -->
                        <div class="form-group">
                            <label for="titulo_sobre">TITULO:</label>
                            <input type="text" class="form-control" name="titulo_sobre" id="titulo_sobre"
                                placeholder="Digite o titulo do Sobre" value="<?php echo $rowEditaSobre['titulo']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <!-- Observações -->
                            <div class="form-group">
                                <label>TEXTO:</label>
                                <textarea class="form-control" rows="10" name="texto_sobre" id="texto_sobre"
                                    placeholder="Digite o Texto">
                                    <?php echo $rowEditaSobre['texto']; ?>
                                </textarea>
                            </div>
                        </div>
                        <!-- Label referente ao Link da imagem-->
                        <div class="form-group">
                            <label for="img-upload">FOTO</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="imagem_sobre" id="imagem">
                                    <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <small>*Tamanho: 300px X 200px</small>

                            <script>
                            // Adicione um manipulador de eventos ao input de arquivo
                            document.getElementById("imagem").addEventListener("change", function() {
                                 //Obtenha o arquivo selecionado pelo usuário
                                var arquivo = this.files[0];
                                 //Verifique se o arquivo é uma imagem
                                 if (arquivo.type.match(/image.*/)) {
                                     //Crie um objeto URL para o arquivo
                                    //  var url = URL.createObjectURL("<?php echo $rowEditaSobre['imagem']; ?>");
                                    var url = URL.createObjectURL(arquivo);
                                     //Defina o atributo src da imagem para a URL do objeto
                                     document.getElementById("img-preview").src = url;
                                     //Define o nome do arquivo como o nome do arquivo selecionado
                                    //  document.getElementById("img-name").textContent = "<?php echo basename($rowEditaSobre['image']); ?>";
                                     document.getElementById("img-name").textContent = arquivo.name;
                                }
                             });
                            </script>
                            <!-- ../../galerias/sobre/ -->

                            <figure style="text-align: center;">
                          <?php 
                                $imagem_banco = $rowEditaSobre['imagem']; 
                                $imagem = '../../galerias/sobre/'.pathinfo($imagem_banco)['basename'];  
                                if (file_exists($imagem)) {
                                  $imagem = '../../galerias/sobre/'.pathinfo($imagem_banco)['basename']; 
                                } else {
                                  $imagem = './uploads/carregando.png';
                                }                                 

                             ?>
                            <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                            <!-- Essa parte tras a imagem, já vinculada a inserção anterior. -->
                            <img style="height: 200px; width: 250px;" id="img-preview" src="<?php echo $imagem; ?>" alt="Imagem de visualização">
                            <!-- <img style="height: 200px; width: 250px;" id="img-preview" src="./galerias/empreendimento/1/carregando.png" alt="Imagem de visualização"> -->
                            <span id="img-name"></span>
                        </figure>
                            <input type="hidden" name="cod_sobre" value="<?php echo $rowEditaSobre['id']; ?>">
                       <?php } ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="link">Imagem:</label>
                            <input type="text" class="form-control" name="img_sobre" id="link" placeholder="Link da imagem">
                            <small>*Tamanho: 300px X 200px</small>
                        </div> -->
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>
                                <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="sobre.php" role="button"><i class="fa-solid fa-backward"
                            style="gap: 15px;"></i> Voltar</a>
                    </div>
                </form>
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