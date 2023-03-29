<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

// Select os dados da tabela empreendimento;
// $sql = "SELECT * FROM newsletter LIMIT 8";
// $cod_newsletter = $_GET['cod_newsletter'];
$email_newsletter = $_GET['cod_newsletter'];
$sql = "SELECT * FROM newsletter WHERE id = " . $_GET["cod_newsletter"];
// $Editanewsletter = mysqli_query("SELECT * FROM newsletter WHERE id = '". $_GET['cod_newsletter'] ."' ");
$Editanewsletter = $conn->query($sql);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Newsletter</title>

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
                        <h1 class="m-0">Newsletter - Edição</h1>
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
                <h3 class="card-title">Cadastro de Newsletter</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/newsletter/update_newsletter.php" method="POST">
                    <div class="card-body">
                        <!-- Label referente ao Link da imagem-->
                        <?php
                        ($rowEditaNewsletter = $Editanewsletter->fetch_assoc()); { ?>
                        <!-- // while ($rowEditaNewsletter = $Editanewsletter->fetch_assoc()) { ?> -->

                          <div class="mb-3">
                            <label for="cod_newsletter" class="form-label">CÓDIGO:</label>
                            <input type="number" class="form-control" name="cod_newsletter" id="cod_newsletter" 
                            disabled aria-describedby="emailHelp" value="<?php echo $rowEditaNewsletter['id'];?>">
                          </div>

                        <div class="form-group">
                            <label for="email_newsletter">E-MAIL:</label>
                            <!-- <input type="email" class="form-control" name="email_newsletter" id="email_newsletter" placeholder="Informe o E-mail" value="<?php echo $rowEditaNewsletter['email'];?>"> -->
                            <input type="email" class="form-control" name="email_newsletter" id="email_newsletter" 
                            placeholder="Informe o E-mail" value="<?php echo $rowEditaNewsletter['email'];?>">
                        </div>
                        <input type="hidden" name="cod_newsletter" value="<?php echo $rowEditaNewsletter['id']; ?>">
                       <?php } ?>
                    </div>

                    <div class="card-footer">
                      <!-- <button type="submit" class="btn btn-succcess"><i class="fa-solid fa-floppy-disk"></i> Atualizar</button> -->
                    <!-- <a class="btn btn-success" href="./php/update_newsletter.php?cod_newsletter=<?php echo $rowEditaNewsletter['id'];?>" role="button">
                              <i class="fa-solid fa-floppy-disk"></i> Atualizar</a> -->
                              <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Atualizar</button>
                              <a class="btn btn-primary" href="newsletter.php" role="button"><i class="fa-solid fa-backward" style="gap: 15px;"></i> Voltar</a>

                        <!-- Botão para voltar -->
                        <!-- <a class="btn btn-primary" href="newsletter.php" role="button"><i class="fa-solid fa-backward"
                          style="gap: 15px;"></i> Voltar</a> -->
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