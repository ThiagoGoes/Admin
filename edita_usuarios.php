<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

$nome_usuarios = $_GET['cod_usuarios'];
$sql = "SELECT * FROM adm_usuarios WHERE id = " . $_GET["cod_usuarios"];
$EditaUsuarios = $conn->query($sql);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Usuários</title>

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
            <!-- </ul>
        </nav>
    </div> -->
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
                <h3 class="card-title">Cadastro de Usuários</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/usuarios/update_usuarios.php" method="post">
                    <div class="card-body">
                    <?php
                        ($rowEditaUsuariosDados = $EditaUsuarios->fetch_assoc()); { ?>
                        <!-- Label referente ao Link da imagem-->
                        <div class="form-group">
                            <label for="cod_usuarios">ID:</label>
                            <input type="text" class="form-control" name="cod_usuarios" id="cod_usuarios" 
                            placeholder="" disabled value="<?php echo $rowEditaUsuariosDados['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nome_usuarios">NOME:</label>
                            <input type="text" class="form-control" name="nome_usuarios" id="nome_usuarios" 
                            placeholder="" value="<?php echo $rowEditaUsuariosDados['nome']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="usuario_usuarios">USUARIO:</label>
                            <input type="text" class="form-control" name="usuario_usuarios" id="usuario_usuarios"
                            placeholder="" value="<?php echo $rowEditaUsuariosDados['usuario']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="senha_usuarios">SENHA:</label>
                            <input type="password" class="form-control" name="senha_usuarios" id="senha_usuarios"
                            placeholder="" value="<?php echo $rowEditaUsuariosDados['senha']; ?>">
                        </div>
                        <div class="form-group">
                            <label>PERMISSÃO TOTAL:</label>
                            <select class="form-control" id="root_usuarios" name="root_usuarios">
                                <option value="<?php echo $rowEditaUsuariosDados['root']; ?>">0 - Não</option>
                                <option value="<?php echo $rowEditaUsuariosDados['root']; ?>">1 - Sim</option>
                            </select>
                            <small>*Usuário com permissão Total*</small>
                        </div>
                        <input type="hidden" name="cod_usuarios" value="<?php echo $rowEditaUsuariosDados['id']; ?>">
                       <?php } ?>
                    </div>

                    <div class="card-footer">
                      <!-- Botão para cadastrar -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>

                        <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="usuarios.php" role="button"><i class="fa-solid fa-backward"
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
</body>

</html>