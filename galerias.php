<?php
// session_start();
// if(!$_SESSION['usuario']) {
// 	header('Location: index.php');
// 	exit();
// }

include_once('./navigation/session.php');
include_once('./php/connection.php');

// Busca quantos Empreendimentos tem cadastrados;***
$sqlEmpreendimentos = "SELECT COUNT(id) AS qtd_empreendimentos FROM empreendimentos";
$empreendimentos = $conn->query($sqlEmpreendimentos);

// Busca quantos Imoveis tem cadastrados;***
$sqlSobre = "SELECT COUNT(id) AS qtd_sobre FROM sobre";
$sobre = $conn->query($sqlSobre);

// Busca quantos Imoveis tem cadastrados;
$sqlImoveis = "SELECT COUNT(id) AS qtd_imoveis FROM imoveis";
$imoveis = $conn->query($sqlImoveis);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADM - Syspan Admin</title>

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

<style>
  @media screen and (min-width: 900px) {
    colunn {
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  }
}
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once('./navigation/nav-bar.php'); ?>
    <!-- /.navbar -->

    <!-- Importando a barra de navegação com as listagens -->
    <?php include_once('./navigation/navs.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          <!-- Botão de recarregar a página -->
        <button type="button" class="btn btn-outline-light" onClick="recarregarAPagina()" 
      style="gap: 15px; float:right;">
      <i class="fa-solid fa-arrows-rotate"></i>
        Atualizar
      </button>

      <!-- Função de recarregar a pagina -->
      <script>
          function recarregarAPagina(){
          window.location.reload();
          } 
      </script>
      <!-- FIm -->

          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">ADM - Galerias</h1>
            </div><!-- /.col -->
            <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div>/.col -->
          
        </div><!-- /.container-fluid -->
      </div>
          </div><!-- /.row -->
      <!-- /.content-header -->

      <!-- Main content -->
      <!-- Parte do Gráfico - pensar em como usar -->
      <div class="Container">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <section class="content">
                    <!-- <div class="row col md-6"> -->
                    <div class="row row-md-4">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <?php
                              $rowSobre = $sobre->fetch_assoc();
                              echo "<h3>" . $rowSobre["qtd_sobre"] . "</h3>";
                            ?>
                            <!-- <h3>150</h3> -->

                            <p>SOBRE</p>
                          </div>
                          <div class="icon">
                            <!-- <i class="ion ion-bag"></i> -->
                            <i class="nav-icon fa-solid fa-image" style="font-size:65px;"></i>
                          </div>
                          <a href="sobre.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                            <?php
                              $rowEmpreendimentos = $empreendimentos->fetch_assoc();
                              echo "<h3>" . $rowEmpreendimentos["qtd_empreendimentos"] . "</h3>";
                            ?>
                            <!-- <h3>53<sup style="font-size: 25px">%</sup></h3> -->

                            <p>EMPREENDIMENTOS</p>
                          </div>
                          <div class="icon">
                            <!-- <i class="ion ion-stats-bars"></i> -->
                            <i class="nav-icon fa-solid fa-image" style="font-size:65px;"></i>
                          </div>
                          <a href="empreendimentos.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <!-- Imóveis -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <?php
                              $rowImoveis = $imoveis->fetch_assoc();
                              echo "<h3>" . $rowImoveis["qtd_imoveis"] . "</h3>";
                            ?>
                            <!-- <h3>150</h3> -->

                            <p>IMÓVEIS</p>
                          </div>
                          <div class="icon">
                            <!-- <i class="ion ion-bag"></i> -->
                            <i class="fnav-icon fa-solid fa-image" style="font-size:65px;"></i>
                          </div>
                          <a href="imoveis.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php include_once('./navigation/footer.php'); ?>
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