<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

$cod_corretor           = $_GET['cod_corretor'];
$nome_corretores        = $_GET['cod_corretor'];
$telefone_corretor      = $_GET['cod_corretor'];
$whats_corretor         = $_GET['cod_corretor'];
$celular_corretor       = $_GET['cod_corretor'];
$email_corretor         = $_GET['cod_corretor'];
$imagem_corretor        = $_GET['cod_corretor'];

$sql = "SELECT * FROM corretores WHERE id = " . $_GET["cod_corretor"];
$EditaCoretores = $conn->query($sql);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Corretores</title>

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
                        <h1 class="m-0">Corretores - Edição</h1>
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
                <h3 class="card-title">Cadastro de Corretores</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/corretores/update_corretores.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <?php
                        ($rowEditaCorretores = $EditaCoretores->fetch_assoc()); { ?>

                        <div class="form-group">
                            <label for="cod_corretor">ID:</label>
                            <input type="text" class="form-control" name="cod_corretor" id="cod_corretor"
                            disabled placeholder="Digite o nome do corretor" value="<?php echo $rowEditaCorretores['id']; ?>">
                        </div>
                        <!-- Nome Corretor -->
                        <div class="form-group">
                            <label for="nome_corretores">NOME:</label>
                            <input type="text" class="form-control" name="nome_corretores" id="nome_corretores"
                            placeholder="Digite o nome do corretor" value="<?php echo $rowEditaCorretores['nome']; ?>">
                        </div>
                        <!-- Telefone Corretor -->
                        <div class="form-group">
                          <label for="telefone_corretor">TELEFONE:</label>
                          <input type="text" class="form-control" name="telefone_corretor" id="telefone_corretor"
                              placeholder="Digite o Telefone do corretor" value="<?php echo $rowEditaCorretores['telefone']; ?>">
                        </div>
                        <!-- Whatsapp Corretor -->
                        <div class="form-group">
                          <label for="whats_corretor">WHATSAPP:</label>
                          <input type="text" class="form-control" name="whats_corretor" id="whats_corretor"
                             placeholder="Digite o Whatsapp do corretor" value="<?php echo $rowEditaCorretores['whatsapp']; ?>">
                        </div>
                        <!-- Celular Corretor -->
                        <div class="form-group">
                          <label for="celular_corretor">CELULAR:</label>
                          <input type="text" class="form-control" name="celular_corretor" id="celular_corretor"
                            placeholder="Digite o celular do corretor" value="<?php echo $rowEditaCorretores['celular']; ?>">
                        </div>
                        <!-- E-mail Corretor -->
                        <div class="form-group">
                            <label for="email_corretor">E-MAIL:</label>
                            <input type="email" class="form-control" name="email_corretor" id="email_corretor"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                            placeholder="Digite o E-mail do corretor" value="<?php echo $rowEditaCorretores['email']; ?>">
                            <span class="error-message">Por favor, insira um endereço de e-mail válido.</span>
                        </div>
                        <!-- Imagem -->
                        <!-- <div class="form-group">
                            <label for="imagem_corretor">Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="imagem_corretor" id="imagem_corretor" 
                                    value="<?php echo $rowEditaBanners['foto'];?>">
                                    <label class="custom-file-label" for="imagem_corretor">Escolha uma Foto</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <small>*Tamanho 1350px x 300px (Largura x Altura)</small>
                        </div> -->
                        <!-- Label referente ao Link da imagem-->
                        <div class="form-group">
                          <label for="img-upload">FOTO</label>
                          <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" class="form-control" name="imagem_corretor" id="imagem"
                                  placeholder="" value="<?php echo $rowEditaCorretores['imagem']; ?>">
                                  <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
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
                                     var url = URL.createObjectURL("<?php echo $rowEditaCorretores['imagem']; ?>");
                                     //Defina o atributo src da imagem para a URL do objeto
                                     document.getElementById("img-preview").src = url;
                                     //Define o nome do arquivo como o nome do arquivo selecionado
                                     document.getElementById("img-name").textContent = "<?php echo basename($rowEditaCorretores['image']); ?>";
                                }
                             });
                        </script>

                    <figure style="text-align: center;">
                    <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                             <?php 
                                $imagem_banco = $rowEditaCorretores['imagem']; 
                                $imagem = './uploads/'.pathinfo($imagem_banco)['basename'];  
                                if (file_exists($imagem)) {
                                  $imagem = './uploads/'.pathinfo($imagem_banco)['basename']; 
                                } else {
                                  $imagem = './uploads/carregando.png';
                                }                                 

                             ?>
                             <img style="height: 200px; width: 250px;" id="img-preview" src="<?php echo $imagem; ?>" alt="Imagem de visualização">
                             <!-- <img style="height: 200px; width: 250px;" id="img-preview" src="<?php echo $rowEditaCorretores['imagem']; ?>" alt="Imagem de visualização"> -->
                             <span id="img-name"></span>
                         </figure>
                      </div>
                      <input type="hidden" name="cod_corretor" value="<?php echo $rowEditaCorretores['id']; ?>">
                       <?php } ?>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>
                                <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="corretores.php" role="button"><i class="fa-solid fa-backward"
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
        <!-- Adicione o jQuery e o plugin Masked Input no cabeçalho do seu arquivo HTML -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

        <!-- Adicione o código abaixo no final do seu arquivo HTML -->
        <script type="text/javascript">
            $(document).ready(function(){
            // Aplica a máscara no campo de celular
            $('#celular_corretor').mask('(99) 99999-9999');
            });

            $(document).ready(function(){
            // Aplica a máscara no campo de celular
            $('#whats_corretor').mask('(99) 99999-9999');
            });

            $(document).ready(function(){
            // Aplica a máscara no campo de celular
            $('#telefone_corretor').mask('(99) 9999-9999');
            });
        </script> 

</body>

</html>