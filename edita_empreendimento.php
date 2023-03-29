<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

$cod_empreendimento         = $_GET['cod_empreendimento'];
$titulo_empreendimento      = $_GET['cod_empreendimento'];
$texto_empreendimento       = $_GET['cod_empreendimento'];
$imagem_empreendimento      = $_GET['cod_empreendimento'];

$sqlEditaEmpreendimento = "SELECT * FROM empreendimento WHERE id = " . $_GET['cod_empreendimento'];
$EditaEmpreendimento = $conn->query($sqlEditaEmpreendimento);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Empreendimento</title>

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
                        <h1 class="m-0">Empreendimento | Home - Edição</h1>
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
                <h3 class="card-title">Cadastro de Empreendimento | Home</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/empreendimento/update_empreendimento.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <?php
                        ($rowEditaEmpreendimento = $EditaEmpreendimento->fetch_assoc()); { ?>
                        <!-- Label referente ao Link da imagem-->
                        <!-- <div class="form-group">
                            <label for="img_empreendimento">Imagem:</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="Link da imagem">
                            <small>*Tamanho: 300px X 200px</small>
                        </div> -->
                        <!-- Titulo -->
                        <div class="form-group">
                          <label for="cod_empreendimento">ID:</label>
                          <input type="text" class="form-control" name="cod_empreendimento" id="cod_empreendimento"
                            disabled placeholder="Digite o titulo do empreendimento" value="<?php echo $rowEditaEmpreendimento['id']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="titulo_empreendimento">TITULO:</label>
                          <input type="text" class="form-control" name="titulo_empreendimento" id="titulo_empreendimento"
                              placeholder="Digite o titulo do empreendimento" value="<?php echo $rowEditaEmpreendimento['titulo'] ?>">
                        </div>
                        <div class="col-sm-6">
                          <!-- Testo -->
                          <div class="form-group">
                              <label>TEXTO:</label>
                              <textarea class="form-control" id="texto_empreendimento" name="texto_empreendimento"
                                  placeholder="Digite a Observação do empreendimento">
                                  <?php echo $rowEditaEmpreendimento['texto']; ?>
                                </textarea>
                          </div>
                        </div>
                        <!-- Imagem -->
                        <div class="form-group">
                          <label for="img-upload">FOTO:</label>
                          <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" class="form-control" name="imagem_empreendimento" id="imagem"
                                  placeholder="" value="<?php echo $rowEditaEmpreendimento['imagem']; ?>">
                                  <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
                              </div>
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
                                     var url = URL.createObjectURL("<?php echo $rowEditaEmpreendimento['imagem']; ?>");
                                     //Defina o atributo src da imagem para a URL do objeto
                                     document.getElementById("img-preview").src = url;
                                     //Define o nome do arquivo como o nome do arquivo selecionado
                                     document.getElementById("img-name").textContent = "<?php echo basename($rowEditaEmpreendimento['image']); ?>";
                                }
                             });
                        </script>
                        
                          <figure>
                          <?php 
                                $imagem_banco = $rowEditaEmpreendimento['imagem']; 
                                $imagem = './galerias/empreendimento/1/'.pathinfo($imagem_banco)['basename'];  
                                if (file_exists($imagem)) {
                                  $imagem = './galerias/empreendimento/1/'.pathinfo($imagem_banco)['basename']; 
                                } else {
                                  $imagem = './galerias/empreendimento/1/carregando.png';
                                }                                 

                             ?>
                            <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                            <!-- Essa parte tras a imagem, já vinculada a inserção anterior. -->
                            <img style="height: 200px; width: 250px;" id="img-preview" src="<?php echo $imagem; ?>" alt="Imagem de visualização">
                            <!-- <img style="height: 200px; width: 250px;" id="img-preview" src="./galerias/empreendimento/1/carregando.png" alt="Imagem de visualização"> -->
                            <span id="img-name"></span>
                        </figure>
                      </div>
                      <input type="hidden" name="cod_empreendimento" value="<?php echo $rowEditaEmpreendimento['id']; ?>">
                       <?php } ?>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>
                                <a class="btn btn-primary" href="empreendimento.php" role="button"><i class="fa-solid fa-backward"
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
        <script src="https://cdn.tiny.cloud/1/2e2ivp9uucfkb1oe02pcr6jkgnbxweqqim6vv081x5nvd8x7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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