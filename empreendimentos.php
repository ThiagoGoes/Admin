<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

// Select os dados da tabela empreendimento;
$sql = "SELECT * FROM empreendimentos";
$empreendimentos = $conn->query($sql);

$sqlEmpreendimento = "SELECT * FROM empreendimento";
$empreendimento = $conn->query($sqlEmpreendimento);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADM - Syspan Empreendimentos</title>

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
    <?php include_once('./navigation/nav-bar.php') ?>
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
            <h1 class="m-0">Empreendimentos - Listagem</h1>
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
   
    <div class="container">
      <!-- /.content-header -->
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
      <a href="cad_empreendimentos.php" class="btn btn-success" style="float:right; ">
        <i class="fa fa-fw fa-gear"></i>
        Novo
      </a>
      <hr>
      <!-- Main content -->
      <div class="content" style="padding-top: 90px; table-layout: fixed; font-weight: bold;">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listagem Empresa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="empreendimentos" class="table table-bordered table-striped table-striped table-secondary"
                style="text-align: center;">
                  <thead>
                          <tr>
                            <th style="color: black;">ID</th>
                            <th style="color: black;">EMPREENDIMENTOS</th>
                            <th style="color: black;">Geleria</th>
                            <th style="color: black;">Editar</th>
                            <th style="color: black;">Deletar</th>
                          </tr>
                          <?php
                           while ($rowEmpreendimentos = $empreendimentos->fetch_assoc()) { ?>

                          <tr>
                            <td id="cod_empreendimentos" name="cod_empreendimentos"><?php echo $rowEmpreendimentos['id']; ?></td>
                            <td id="nome_empreendimentos" name="nome_empreendimentos"><?php echo $rowEmpreendimentos["nome"];?></td>
                            <td>
                              <a href="galeria_empreendimentos.php?cod_empreendimentos=<?php echo $rowEmpreendimentos['id']; ?>">
                                <i class="fa-solid fa-image" style="color: green;"></i></a>
                            </td>
                            <td>
                              <a href="edita_empreendimentos.php?cod_empreendimentos=<?php echo $rowEmpreendimentos['id']; ?>">
                              <i class="fa-solid fa-pen" style="color: blue;"></i></a>
                            </td>
                            <td>
                              <a href="./php/empreendimentos/exclui_empreendimentos.php?cod_empreendimentos=<?php echo $rowEmpreendimentos['id']; ?>">
                              <i class="fa-solid fa-trash" style="color: red;"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                          <tfoot>
                  <!-- <tr>
                            <th style="color: black;">ID</th>
                            <th style="color: black;">EMPREENDIMENTOS</th>
                            <th style="color: black;">Geleria</th>
                            <th style="color: black;">Editar</th>
                            <th style="color: black;">Deletar</th>
                  </tr> -->
                  </tfoot>
                </table>
              </div>
        </div>
    </div>
                          </div>
  </div>
  <?php include_once('./navigation/footer.php'); ?>
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
    $("#empreendimentos").DataTable({
      dom: 'Bfrtip',
      "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      "language":{"url":"//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"}
    })
    // .buttons().container().appendTo('#imovel .col-md-6:eq(0)');
    // $('#imovel2').DataTable({
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