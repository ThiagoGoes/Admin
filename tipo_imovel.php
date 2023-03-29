<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

// Select os dados da tabela tipo_imovel;
$sql = "SELECT * FROM tipo_imovel ORDER BY id DESC";
$imovel = $conn->query($sql);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);

// if (isset($_GET['exclusao'])) {
//   if ($_GET['exclusao'] == 'sucesso') {
//       echo "<script>Swal.fire({icon: 'success', text: 'Dados excluídos com sucesso!', confirmButtonColor: '#f27474'})</script>";
//   } else if ($_GET['exclusao'] == 'erro') {
//       echo "<script>Swal.fire({icon: 'error', text: 'Não é possível excluir o registro, pois já tem vínculo.', confirmButtonColor: '#f27474'})</script>";
//   }
// }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- <meta charset="utf-8"> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADM - Syspan Tipo de Imóvel</title>

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

	<style>
		.alert {
			background-color: #f44336;
			color: white;
			text-align: center;
			padding: 10px;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 1;
		}

    #sucesso {
      background-color: #008000; /* verde */
    }
    #erro {
			background-color: #f44336; /* vermelho */
		}
	</style>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">

    <?php
          if (isset($_GET['exclusao'])) {
            // Exibe o alerta
            if ($_GET['exclusao'] == 'sucesso') {
              echo "<div class='alert' id='sucesso'>Dados excluídos com sucesso!</div>";
            } else if ($_GET['exclusao'] == 'erro') {
                echo "<div class='alert' id='erro'>Não é possível excluir o registro, pois já tem vínculo com um ID Interno.</div>";
            } elseif ($_GET['exclusao'] == 'erroP') {
              echo "<div class='alert' id='erro'>Você não tem permissão para realizar essa operação!</div>";
            }

            // Redireciona para a mesma página sem a query string
            // header("Location: {$_SERVER['PHP_SELF']}");
            // exit();

            // REmove a query string da URL
            echo "<script>window.history.replaceState(null, '', window.location.href.split('?')[0]);</script>";
          }
      ?>

      <script>
          // Adiciona temporizador ao alerta de sucesso
          if (document.getElementById('sucesso')) {
            setTimeout(function() {
              document.getElementById('sucesso').style.display = 'none';
            }, 3000); // 3 segundos
          }

          // Adiciona temporizador ao alerta de erro
          if (document.getElementById('erro')) {
            setTimeout(function() {
              document.getElementById('erro').style.display = 'none';
            }, 3000); // 3 segundos
          }
        </script> 

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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tipo Imóvel</h1>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
      <!-- /.content-header -->
      <a href="cad_tp_imovel.php" class="btn btn-success" style="float:right; ">
        <i class="fa fa-fw fa-gear"></i>
        Novo
      </a>
      <!-- Main content -->
      <div class="content" style="padding-top: 90px; table-layout: fixed; font-weight: bold;">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listagem Tipo Imóvel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
              <table id="tp_imovel" class="table table-bordered table-striped table-hover table-secondary"
                style="text-align: center;">
                  <thead>
                            <th style="color: black;">ID</th>
                            <th style="color: black;">NOME</th>
                            <!-- <th style="color: gold;">ID INTERNO</th> -->
                            <th style="color: black;">EDITAR</th>
                            <th style="color: black;">DELETAR</th>
                            </thead>
                          <tbody>
                          <?php 
                           while ($rowImovel = $imovel->fetch_assoc()) { 
                            ?>
                           
                          <tr>
                            <td name="cod_tp_imovel" id="cod_tp_imovel" ><?php echo $rowImovel['id'];?></td>
                            <td name="descricao_tp_imovel" id="descricao_tp_imovel"><?php echo $rowImovel["descricao"]; ?></td>
                            <!-- <td name="id_interno_tp_imovel" id="id_interno_tp_imovel"><?php echo $rowImovel['id_interno'] ?></td> -->
                            <td>
                              <a href="edita_tp_imovel.php?cod_tp_imovel=<?php echo $rowImovel['id']; ?>">
                              <i class="fa-solid fa-pen" style="color: blue;"></i></a>
                            </td>
                            <td>
                              <a href="./php/tipo_imovel/exclui_tp_imovel.php?cod_tp_imovel=<?php echo $rowImovel['id']; ?>"
                              onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                              <i class="fa-solid fa-trash" style="color: red;"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                          <tfoot>
                          <!-- <tr>
                    <th style="color: black;">ID</th>
                    <th style="color: black;">NOME</th>
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
  <aside class="control-sidebar control-sidebar-dark">
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
    $("#tp_imovel").DataTable({
      dom: 'Bfrtip',
      "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      "language":{"url":"//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"}      
    });
//.buttons().container().appendTo('#tp_imovel_wrapper .col-md-6:eq(0)')
  });
</script>
</body>

</html>