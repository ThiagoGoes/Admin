<?php
include_once('./php/connection.php');
include_once('./navigation/session.php');

$nome_empresa = $_GET['cod_empresa'];
$sqlEmpresa = "SELECT * FROM dados_empresa WHERE id = " . $_GET["cod_empresa"];;
$Empresa = $conn->query($sqlEmpresa);

$sqlCidade = "SELECT * FROM cidade";
$Cidade = $conn->query($sqlCidade);

$sqlEstado = "SELECT * FROM estados";
$Estados = $conn->query($sqlEstado);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Cadastro da Empresa</title>

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
                        <h1 class="m-0">Empresa - Edição</h1>
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
                <h3 class="card-title">Edição da Empresa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/empresa/update_empresa.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <?php
                        ($rowEmpresa = $Empresa->fetch_assoc()); { ?>
                        <!-- ID da Empresa-->
                        <div class="form-group">
                            <label for="cod_empresa">ID:</label>
                            <input type="number" class="form-control" name="cod_empresa" id="cod_empresa" 
                            disabled placeholder="" value="<?php echo $rowEmpresa['id']; ?>">
                        </div>
                        <!-- Nome da Empresa-->
                        <div class="form-group">
                            <label for="nome_empresa">NOME DA EMPRESA:</label>
                            <input type="text" class="form-control" name="nome_empresa" id="nome_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['nome']; ?>">
                        </div>
                        <!-- Endereço -->
                        <div class="form-group">
                            <label for="endereco_empresa">ENDEREÇO:</label>
                            <input type="text" class="form-control" name="endereco_empresa" id="endereco_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['endereco']; ?>">
                        </div>
                        <!-- Numero -->
                        <div class="form-group">
                            <label for="numero_empresa">Nº:</label>
                            <input type="text" class="form-control" name="numero_empresa" id="numero_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['numero']; ?>">
                        </div>
                        <!-- Bairro -->
                        <div class="form-group">
                            <label for="bairro_empresa">BAIRRO:</label>
                            <input type="text" class="form-control" name="bairro_empresa" id="bairro_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['bairro']; ?>">
                        </div>
                        <!-- Cidade -->
                        <div class="form-group">
                            <label>CIDADE:</label>
                            <select class="form-control" id="cidade_empresa" name="cidade_empresa">
                                <option selected><?php echo $rowEmpresa['cidade']; ?></option>
                                <?php while($rowCidade = mysqli_fetch_array($Cidade,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowCidade['nome']; ?>"><?php echo $rowCidade['nome'] ?>
                            </option>
                            <?php } ?>
                            </select>
                        </div>
                        <!-- Estado -->
                        <div class="form-group">
                            <label>ESTADO:</label>
                            <select class="form-control" id="estado_empresa" name="estado_empresa">
                                <option selected><?php echo $rowEmpresa['estado']; ?></option>
                                <?php while($rowEstados = mysqli_fetch_array($Estados,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowEstados['sigla']; ?>"><?php echo $rowEstados['estado']; ?>
                            </option>
                            <?php } ?>
                            </select>
                        </div>
                        <!-- CEP -->
                        <div class="form-group">
                            <label for="cep_empresa">CEP:</label>
                            <input type="text" class="form-control" name="cep_empresa" id="cep_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['cep']; ?>">
                        </div>
                        <!-- Telefone -->
                        <div class="form-group">
                            <label for="telefone_empresa">TELEFONE:</label>
                            <input type="text" class="form-control" name="telefone_empresa" id="telefone_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['telefone']; ?>">
                        </div>
                        <!-- E-mail -->
                        <div class="form-group">
                            <label for="email_empresa">E-MAIL:</label>
                            <input type="email" class="form-control" name="email_empresa" id="email_empresa" 
                            placeholder="" value="<?php echo $rowEmpresa['email']; ?>">
                        </div>

                        <!-- Imagem Sobre -->
                        <div class="form-group">
                            <label for="img_sobre">IMAGEM SOBRE</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_sobre" id="img_sobre"
                                    placeholder="" value="<?php echo $rowEmpresa['img_sobre']; ?>">
                                    <label class="custom-file-label" for="img_sobre">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <!-- <small>*Tamanho: 300px X 200px</small> -->

                            <script>
                                // Adicione um manipulador de eventos ao input de arquivo
                                document.getElementById("img_sobre").addEventListener("change", function () {
                                    // Obtenha o arquivo selecionado pelo usuário
                                    var arquivo = this.files[0];
                                    // Verifique se o arquivo é uma imagem
                                    if (arquivo.type.match(/image.*/)) {
                                        // Crie um objeto URL para o arquivo
                                        var url = URL.createObjectURL("<?php echo $rowEmpresa['imagem_sobre']; ?>");
                                        // Defina o atributo src da imagem para a URL do objeto
                                        document.getElementById("img-preview-sobre").src = url;
                                        // Define o nome do arquivo como o nome do arquivo selecionado
                                        document.getElementById("img-name-sobre").textContent = "<?php echo basename($rowEmpresa['imagem_sobre']); ?>";
                                    }
                                });
                            </script>

                            <figure style="text-align: center;">
                            <?php
                                    $imagem_banco_sobre = $rowEmpresa['imagem_sobre'];
                                    $imagem_sobre = './galerias/empresa/'.pathinfo($imagem_banco_sobre)['basename'];
                                    if (file_exists($imagem_sobre)) {
                                        $imagem_sobre = './galerias/empresa/'.pathinfo($imagem_banco_sobre)['basename'];
                                    }else {
                                        $imagem_sobre = './galerias/carregando.png';
                                    }
                                    // echo $imagem_sobre."<br>";
                                ?>
                                <img style="height: 200px; width: 250px;" id="img-preview-sobre"
                                    src="<?php echo $imagem_sobre; ?>" alt="Imagem de visualização">
                                <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <span id="img-name-sobre"></span>
                            </figure>
                        </div>

                        <!-- Imagem Logo -->
                        <div class="form-group">
                            <label for="img_logo">IMAGEM LOGO</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_logo" id="img_logo">
                                    <label class="custom-file-label" for="img_logo">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <!-- <small>*Tamanho: 300px X 200px</small> -->

                            <script>
                                // Adicione um manipulador de eventos ao input de arquivo
                                document.getElementById("img_logo").addEventListener("change", function () {
                                    // Obtenha o arquivo selecionado pelo usuário
                                    var arquivo = this.files[0];
                                    // Verifique se o arquivo é uma imagem
                                    if (arquivo.type.match(/image.*/)) {
                                        // Crie um objeto URL para o arquivo
                                        var url = URL.createObjectURL(<?php echo $rowEmpresa['imagem_logo'] ?>);
                                        // Defina o atributo src da imagem para a URL do objeto
                                        document.getElementById("img-preview-logo").src = url;
                                        // Define o nome do arquivo como o nome do arquivo selecionado
                                        document.getElementById("img-name-logo").textContent = "<?php echo basename($rowEmpresa['imagem_logo']) ; ?>";
                                    }
                                });
                            </script>

                            <figure style="text-align: center;">
                            <?php
                                    $imagem_banco_logo = $rowEmpresa['imagem_logo'];
                                    $imagem_logo = './galerias/empresa/'.pathinfo($imagem_banco_logo)['basename'];
                                    if (file_exists($imagem_logo)) {
                                        $imagem_logo = './galerias/empresa/'.pathinfo($imagem_banco_logo)['basename'];
                                    }else {
                                        $imagem_logo = './galerias/carregando.png';
                                    }
                                    // echo $imagem_logo."<br>";
                                ?>
                                <img style="height: 200px; width: 250px;" id="img-preview-logo"
                                    src="<?php echo $imagem_logo; ?>" alt="Imagem de visualização">
                                <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <span id="img-name-logo"></span>
                            </figure>
                        </div>

                        <!-- Imagem Empreendimento -->
                        <div class="form-group">
                            <label for="img-upload-empreendimento">IMAGEM EMPREENDIMENTO</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_empreendimento" id="img_empreendimento">
                                    <label class="custom-file-label" for="img_empreendimento">Escolha uma Foto</label>
                                </div>
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> -->
                            </div>
                            <!-- <small>*Tamanho: 300px X 200px</small> -->

                            <script>
                                // Adicione um manipulador de eventos ao input de arquivo
                                document.getElementById("img_empreendimento").addEventListener("change", function () {
                                    // Obtenha o arquivo selecionado pelo usuário
                                    var arquivo = this.files[0];
                                    // Verifique se o arquivo é uma imagem
                                    if (arquivo.type.match(/image.*/)) {
                                        // Crie um objeto URL para o arquivo
                                        var url = URL.createObjectURL(<?php echo $rowEmpresa['imagem_empreendimento'] ?>);
                                        // Defina o atributo src da imagem para a URL do objeto
                                        document.getElementById("img-preview-empreendimento").src = url;
                                        // Define o nome do arquivo como o nome do arquivo selecionado
                                        document.getElementById("img-name-empreendimento").textContent = <?php echo basename($rowEmpresa['imagem_empreendimento']); ?>;
                                    }
                                });
                            </script>

                            <figure style="text-align: center;">
                                <?php
                                    $imagem_banco_empreendimento = $rowEmpresa['imagem_empreendimento'];
                                    $imagem_empreendimento = './galerias/empresa/'.pathinfo($imagem_banco_empreendimento)['basename'];
                                    if (file_exists($imagem_empreendimento)) {
                                        $imagem_empreendimento = './galerias/empresa/'.pathinfo($imagem_banco_empreendimento)['basename'];
                                    }else {
                                        $imagem_empreendimento = './galerias/carregando.png';
                                    }
                                    // echo $imagem_empreendimento."<br>";
                                ?>
                                <img style="height: 200px; width: 250px;" id="img-preview-empreendimento"
                                    src="<?php echo $imagem_empreendimento; ?>" alt="Imagem de visualização">
                                    <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <span id="img-name-empreendimento"></span>
                            </figure>
                        </div>
                        <input type="hidden" name="cod_empresa" value="<?php echo $rowEmpresa['id']; ?>">
                        <?php } ?>

                    </div>

                    <div class="card-footer">
                      <!-- Botão para cadastrar -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>

                        <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="empresa.php" role="button"><i class="fa-solid fa-backward"
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function () {
            // Aplica a máscara no campo de celular
            $('#telefone_empresa').mask('(99) 9999-9999');
        });
        $(document).ready(function () {
            // Aplica a máscara no campo de celular
            $('#cep_empresa').mask('99999-999');
        });
    </script>
</body>

</html>