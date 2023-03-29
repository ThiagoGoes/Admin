<?php

include_once('./navigation/session.php');
include_once('./php/connection.php');

// Select os dados da tabela Banners
$sqlBanner = "SELECT * FROM banners ORDER BY id DESC";
$banners = $conn->query($sqlBanner);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADM - Syspan Banners</title>

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
      <!-- /.navbar -->

    <!-- Importando a barra de navegação com as listagens -->
    <?php include_once('./navigation/navs.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="position: relative;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <!-- Botão Atualizar -->
        <button type="button" class="btn btn-outline-light" onClick="recarregarAPagina()" 
                style="gap: 15px; float:right;">
              <i class="fa-solid fa-arrows-rotate"></i>
                  Atualizar
            </button>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Banners</h1>
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
    <div class="container">
      <a href="cad_banners.php" class="btn btn-success" style="float:right; ">
        <i class="fa fa-fw fa-gear"></i>
        Novo
      </a>
      <!-- Main content -->
      <div class="content" style="padding-top: 90px; table-layout: fixed; font-weight: bold;">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listagem Banners</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="banners" class="table table-bordered table-striped table-hover table-secondary"
                style="text-align: center;">
                  <thead>
                          <tr>
                            <th style="color: black;">ID</th>
                            <th style="color: black;">BANNERS</th>
                            <th style="color: black;">EDITAR</th>
                            <th style="color: black;">DELETAR</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                            while ($rowBanners = $banners->fetch_assoc()) { ?>
                              
                          <tr>
                            <td id="cod_banners" name="cod_banners"><?php echo $rowBanners['id'];?></td>
                            <td id="descricao_banners" name="descricao_banners"><?php echo $rowBanners["descricao"]; ?> </td>
                            <!-- Btn Ações -->
                            <td>
                              <a href="edita_banners.php?cod_banners=<?php echo $rowBanners['id']?>" role="button">
                              <i class="fa-solid fa-pen" style="color: blue;"></i></a>
                            </td>
                            <td>
                              <a href="./php/banners/exclui_banners.php?cod_banners=<?php echo $rowBanners['id']?>" role="button">
                              <i class="fa-solid fa-trash" style="color: red;"></i></a>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                          <tfoot>
                  <!-- <tr>
                    <th style="color: black;">ID</th>
                    <th style="color: black;">BANNERS</th>
                    <th style="color: black;">EDITAR</th>
                    <th style="color: black;">DELETAR</th>
                  </tr> -->
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
                          </div>
  </div>

  <?php include_once('./navigation/footer.php'); ?>
                            </div>
                            </div>
                            
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="./dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#banners").DataTable({
      dom: 'Bfrtip',
      "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", ""],
      "language":{"url":"//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"}  
    })
    // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
</body>

</html>