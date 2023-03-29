<?php 
include_once('./php/connection.php');
include_once('./navigation/session.php');

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Cadastro do Sobre</title>

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
                        <h1 class="m-0">Sobre - Novo</h1>
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
                <h3 class="card-title">Cadastro do Sobre</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/sobre/insere_sobre.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- Nome Empreendimentos -->
                        <div class="form-group">
                            <label for="titulo_sobre">TITULO:</label>
                            <input type="text" class="form-control" name="titulo_sobre" id="titulo_sobre"
                                placeholder="Digite o titulo do Sobre" required>
                        </div>
                        <div class="col-sm-6">
                            <!-- Observações -->
                            <div class="form-group emoji-button">
                                <label>TEXTO:</label>
                                <textarea class="form-control" rows="10" name="texto_sobre" id="texto_sobre"
                                    placeholder="Digite o Texto" required>
                                </textarea>
                            </div>
                        </div>
                        <!-- Label referente ao Link da imagem-->
                        <div class="form-group">
                            <label for="img-upload">FOTO</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_sobre" id="imagem" required>
                                    <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <!-- <small>*Tamanho: 300px X 200px</small> -->

                            <style>
                                .alert{
                                    position: fixed;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    background-color: red;
                                    color: white;
                                    padding: 10px;
                                    border-radius: 5px;
                                }
                            </style>

<script>
                                     // Adicione um manipulador de eventos ao input de arquivo
                                    document.getElementById("imagem").addEventListener("change", function() {
                                                // Obtenha o arquivo selecionado pelo usuário
                                                var arquivo = this.files[0];
                                                // Verifique se o arquivo é uma imagem
                                                if (arquivo.type.match(/image.*/)) {
                                                // Verifique se o tamanho do arquivo é menor que 1MB
                                                var maxSize = 5120 * 5120; // 5MB
                                                if (arquivo.size > maxSize) {
                                                    // Crie um alert
                                                    var alerta = document.createElement("div");
                                                    alerta.classList.add("alert");
                                                    alerta.textContent = "A imagem selecionada excede o tamanho máximo permitido...";
                                                    // Adicione o alert à página
                                                    document.body.appendChild(alerta);
                                                    // Limpe o campo de arquivo
                                                    this.value = null;
                                                    // Remova o alert após 3 segundos
                                                    setTimeout(function() {
                                                    alerta.parentNode.removeChild(alerta);
                                                    }, 3000);
                                                    return;
                                                }
                                                // Crie um objeto URL para o arquivo
                                                var url = URL.createObjectURL(arquivo);
                                                // Defina o atributo src da imagem para a URL do objeto
                                                document.getElementById("img-preview").src = url;
                                                // Define o nome do arquivo como o nome do arquivo selecionado
                                                document.getElementById("img-name").textContent = arquivo.name;
                                                } else {
                                                // Crie um alert
                                                var alerta = document.createElement("div");
                                                alerta.classList.add("alert");
                                                alerta.textContent = "Por favor, selecione um arquivo de imagem.";
                                                // Adicione o alert à página
                                                document.body.appendChild(alerta);
                                                // Limpe o campo de arquivo
                                                this.value = null;
                                                // Remova o alert após 3 segundos
                                                setTimeout(function() {
                                                    alerta.parentNode.removeChild(alerta);
                                                }, 3000);
                                                }
                                            });
                                            </script>

                            <figure style="text-align: center;">
                                <img style="height: 200px; width: 250px;" id="img-preview"
                                    src="./galerias/carregando.png" alt="Imagem de visualização">
                                <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <span id="img-name"></span>
                            </figure>
                        </div>
                        <!-- <div class="form-group">
                            <label for="link">Imagem:</label>
                            <input type="text" class="form-control" name="img_sobre" id="link" placeholder="Link da imagem">
                            <small>*Tamanho: 300px X 200px</small>
                        </div> -->
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Cadastrar</button>
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