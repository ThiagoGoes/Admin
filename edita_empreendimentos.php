<?php
include_once('./php/connection.php');
include_once('./navigation/session.php');

$cod_empreendimentos        = $_GET['cod_empreendimentos'];
$nome_empreendimentos        = $_GET['cod_empreendimentos'];
$obs_empreendimentos        = $_GET['cod_empreendimentos'];
$img_empreendimentos        = $_GET['cod_empreendimentos'];
$mapa_empreendimentos       = $_GET['cod_empreendimentos'];
$video_empreendimentos      = $_GET['cod_empreendimentos'];

$sqlEditaEmpreendimentos = "SELECT * FROM empreendimentos WHERE id = " . $_GET['cod_empreendimentos'];
$EditaEmpreendimentos = $conn->query($sqlEditaEmpreendimentos);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Empreendimentos</title>

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
                        <h1 class="m-0">Empreendimentos - Edição</h1>
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
                <h3 class="card-title">Cadastro de Empreendimentos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/empreendimentos/update_empreendimentos.php" method="post"
                    enctype="multipart/form-data">
                    <div class="card-body">
                    <?php
                        ($rowEditaEmpreendimentos = $EditaEmpreendimentos->fetch_assoc()); { ?>
                        <!-- Cod Empreendimentos -->
                        <div class="form-group">
                            <label for="cod_empreendimentos">ID:</label>
                            <input type="number" class="form-control" name="cod_empreendimentos" id="cod_empreendimentos" 
                            disabled placeholder="" value="<?php echo $rowEditaEmpreendimentos['id']; ?>">
                        </div>
                        <!-- Nome Empreendimentos -->
                        <div class="form-group">
                            <label for="nome_empreendimentos">NOME:</label>
                            <input type="text" class="form-control" name="nome_empreendimentos" id="nome_empreendimentos"
                            placeholder="Digite o nome do empreendimento" value="<?php echo $rowEditaEmpreendimentos['nome']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <!-- Observações -->
                            <div class="form-group">
                                <label>OBSERVAÇÕES:</label>
                                <textarea class="form-control" rows="10" name="obs_empreendimentos" id="mytextarea" 
                                placeholder="Digite a Observação do empreendimento">
                                <? echo $rowEditaEmpreendimentos['obs']; ?>
                            </textarea>
                            </div>
                        </div>
                        <!-- Label referente ao Link da imagem-->
                        <div class="form-group">
                            <label for="img-upload">FOTO</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_empreendimentos" id="imagem"
                                    placeholder="" value="<?php echo $rowEditaEmpreendimentos['imagem']; ?>">
                                    <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <!-- <small>*Tamanho: 300px X 200px</small> -->

                            <script>
                            // Adicione um manipulador de eventos ao input de arquivo
                            document.getElementById("imagem").addEventListener("change", function() {
                                 //Obtenha o arquivo selecionado pelo usuário
                                var arquivo = this.files[0];
                                 //Verifique se o arquivo é uma imagem
                                 if (arquivo.type.match(/image.*/)) {
                                     //Crie um objeto URL para o arquivo
                                     var url = URL.createObjectURL("<?php echo $rowEditaEmpreendimentos['imagem']; ?>");
                                     //Defina o atributo src da imagem para a URL do objeto
                                     document.getElementById("img-preview").src = url;
                                     //Define o nome do arquivo como o nome do arquivo selecionado
                                     document.getElementById("img-name").textContent = "<?php echo basename($rowEditaEmpreendimentos['image']); ?>";
                                }
                             });
                        </script>

                        <figure style="text-align: center;">
                        <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                          <?php 
                                $imagem_banco = $rowEditaEmpreendimentos['imagem']; 
                                $imagem = './uploads/'.pathinfo($imagem_banco)['basename'];  
                                if (file_exists($imagem)) {
                                  $imagem = './uploads/'.pathinfo($imagem_banco)['basename']; 
                                } else {
                                  $imagem = './galerias/carregando.png';
                                }                                 

                             ?>
                            <!-- Essa parte tras a imagem, já vinculada a inserção anterior. -->
                            <img style="height: 200px; width: 250px;" id="img-preview" src="<?php echo $imagem; ?>" alt="Imagem de visualização">
                            <!-- <img style="height: 200px; width: 250px;" id="img-preview" src="./galerias/empreendimento/1/carregando.png" alt="Imagem de visualização"> -->
                            <span id="img-name"></span>
                        </figure>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="col-sm-6">
                        <!-- Observações -->
                        <div class="form-group">
                            <label>MAPA:</label>
                            <textarea class="form-control" rows="10" id="mytextarea" name="mapa_empreendimentos"
                                placeholder="Informe o link do mapa">
                                <?php echo $rowEditaEmpreendimentos['mapa']; ?>
                            </textarea>
                        </div>
                    </div>
                    <!-- Link Video -->
                    <div class="form-group">
                        <label for="video_empreendimento">VIDEO:</label>
                        <input type="text" class="form-control" name="video_empreendimentos" id="video_empreendimentos"
                        placeholder="Digite o link do video" value="<?php echo $rowEditaEmpreendimentos['video']; ?>">
                    </div>
                    <input type="hidden" name="cod_empreendimentos" value="<?php echo $rowEditaEmpreendimentos['id']; ?>">
                       <?php } ?>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk" style="gap: 10px;"></i>
                    Atualizar</button>

                <a class="btn btn-primary" href="empreendimentos.php" role="button"><i class="fa-solid fa-backward"
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
    <!-- Emojis -->
    <script src="https://cdn.tiny.cloud/1/2e2ivp9uucfkb1oe02pcr6jkgnbxweqqim6vv081x5nvd8x7/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            //   mergetags_list: [
            //     { value: 'First.Name', title: 'First Name' },
            //     { value: 'Email', title: 'Email' },
            //   ]
        });
    </script>


    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>