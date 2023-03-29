<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

$cod_banners            = $_GET['cod_banners'];
$desc_banners           = $_GET['cod_banners'];
$img_banners            = $_GET['cod_banners'];
$link_banner            = $_GET['cod_banners'];
$link_externo_banners   = $_GET['cod_banners'];
$sql = "SELECT * FROM banners WHERE id = " . $_GET["cod_banners"];
$EditaBanners = $conn->query($sql);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Banners</title>

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
                        <h1 class="m-0">Banners - Edição</h1>
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
                <h3 class="card-title">Cadastro Banners</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/banners/update_banners.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <?php
                        ($rowEditaBanners = $EditaBanners->fetch_assoc()); { ?>

                        <div class="form-group">
                            <label for="desc_banner">ID</label>
                            <input type="number" class="form-control" name="cod_banners" id="cod_banners"
                              disabled placeholder="id banners" value="<?php echo $rowEditaBanners['id'];?>">
                        </div>

                        <!-- Descrição da Imagem -->
                        <div class="form-group">
                            <label for="desc_banner">DESCRIÇÃO</label>
                            <input type="text" class="form-control" name="desc_banners" id="desc_banners"
                            placeholder="Enter email" value="<?php echo $rowEditaBanners['descricao'];?>">
                        </div>
                        <!-- Escolher a Foto -->
                        <div class="form-group">
                            <label for="img-upload">FOTO</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_banners" id="img_banners" 
                                    value="<?php echo $rowEditaBanners['foto'];?>">
                                    <label class="custom-file-label" for="img_banners">Escolha uma Foto</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <!-- <small>*Tamanho 1350px x 300px (Largura x Altura)</small> -->

                            <script>
                            // Adicione um manipulador de eventos ao input de arquivo
                            document.getElementById("imagem").addEventListener("change", function() {
                                 //Obtenha o arquivo selecionado pelo usuário
                                var arquivo = this.files[0];
                                 //Verifique se o arquivo é uma imagem
                                 if (arquivo.type.match(/image.*/)) {
                                     //Crie um objeto URL para o arquivo
                                     var url = URL.createObjectURL("<?php echo $rowEditaBanners['imagem']; ?>");
                                     //Defina o atributo src da imagem para a URL do objeto
                                     document.getElementById("img-preview").src = url;
                                     //Define o nome do arquivo como o nome do arquivo selecionado
                                     document.getElementById("img-name").textContent = "<?php echo basename($rowEditaBanners['image']); ?>";
                                }
                             });
                        </script>
                        
                          <figure style="text-align: center">
                          <?php 
                                $imagem_banco = $rowEditaBanners['foto']; 
                                $imagem = './uploads/'.pathinfo($imagem_banco)['basename'];  
                                if (file_exists($imagem)) {
                                  $imagem = './uploads/'.pathinfo($imagem_banco)['basename']; 
                                } else {
                                  $imagem = './galerias/carregando.png';
                                }                                 

                             ?>
                            <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                            <!-- Essa parte tras a imagem, já vinculada a inserção anterior. -->
                            <img style="height: 200px; width: 250px;" id="img-preview" src="<?php echo $imagem; ?>" alt="Imagem de visualização">
                            <!-- <img style="height: 200px; width: 250px;" id="img-preview" src="./galerias/empreendimento/1/carregando.png" alt="Imagem de visualização"> -->
                            <span id="img-name"></span>
                        </figure>
                        </div>
                        <!-- Label referente ao Link da imagem-->
                        <div class="form-group">
                            <label for="link">LINK</label>
                            <input type="text" class="form-control" name="link_banner" id="link_banner" placeholder="Link da imagem"
                            value="<?php echo $rowEditaBanners['link'];?>">
                            <small>*Ex.: http://www.imobiliariaalfa.com.br</small>
                        </div>
                        <div>
                            <!-- Select para escolher sobre o Link se vai abrir em outra guia ou não-->
                            <div class="form-group">
                                <label>LINK EXTERNO:</label>
                                <select class="form-control" id="link_externo_banners" name="link_externo_banners" >
                                    <option value="<?php echo $rowEditaBanners['externo'];?>">Sim</option>
                                    <option value="<?php echo $rowEditaBanners['externo'];?>">Não</option>
                                </select>
                                <small>*Abrir link em uma nova página (sim) ou na mesma (não)</small>
                            </div>
                        </div>
                        <input type="hidden" name="cod_banners" value="<?php echo $rowEditaBanners['id']; ?>">
                       <?php } ?>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <!-- <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk" style="gap: 10px;"></i> Atualizar</button> -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Atualizar</button>
                                <a class="btn btn-primary" href="banners.php" role="button"><i class="fa-solid fa-backward" style="gap: 15px;"></i> Voltar</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    <?php include_once('./navigation/footer.php'); ?>
                        </div>
                        </div>
                        
        
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