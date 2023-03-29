<?php
include_once('./php/connection.php');
include_once('./navigation/session.php');

$sqlEstados = "SELECT * FROM estados";
$estados = $conn->query($sqlEstados);

$nome_cidade        = $_GET['cod_cidade'];
$sqlCidades = "SELECT * FROM cidade WHERE id = " . $_GET['cod_cidade'];
$EditaCidades = $conn->query($sqlCidades);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);

// Verifica se o campo "Id_interno" é igual a 0 ou NULL
// $bloqueiaCampos = false;
// if ($EditaCidades && ($row = $EditaCidades->fetch_assoc()) && isset($row['id_interno']) && ($row['id_interno'] != 0 && $row['id_interno'] != NULL)) {
//     $bloqueiaCampos = true;
// }

if (isset($_SESSION['usuario'])) {
    if ($_SESSION['root'] == 1) {
        // Usuário root pode editar todos os campos
        $bloqueiaCampos = false;
    } else {
        // Usuário não root não pode editar nenhum campo
        $bloqueiaCampos = true;
    }
} else {
    // Usuário não logado não pode editar nenhum campo
    $bloqueiaCampos = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Edição de Cidades</title>

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
                        <h1 class="m-0">Cidades - Edição</h1>
                    </div><!-- /.col -->
                    <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div>/.col -->
                </div>
                <!-- Verifica se tem ID interno, se tiver retorna mensagem informando o movito 
                     de não poder alterar
                -->
                <?php 
                    // if ($bloqueiaCampos) {
                    //     if (empty($row['id_interno']) || $row['id_interno'] == 0) {
                    //         echo "<p>Não é possível fazer alteração, pois este cadastro já possui vínculo com um ID interno(SKU).</p>";
                    //     } else {
                    //         echo "<p>Não é possível fazer alteração, pois o ID interno(SKU) deste cadastro é diferente de zero.</p>";
                    //     }
                    // } else {
                    //     echo "<p>Campos liberados para alteração!</p>";
                    // }

                    $root = 'root';
                    $roots_permitidos = array(0, 1); // Adicione aqui os valores permitidos
                    
                    if ($bloqueiaCampos) {
                        echo "<p>Não é possível fazer alteração, pois você não tem permissão para isso.</p>";
                    } elseif (!in_array($root, $roots_permitidos)) {
                    //     echo "<p>Não é possível fazer alteração, pois o valor de root é inválido.</p>";
                    // } else {
                        echo "<p>Campos liberados para alteração!</p>";
                    }
                ?>
                <!-- FIM -->
            </div>
        </div>
        <hr>

        <div class="card card-dark col-12">
            <div class="card-header">
                <h3 class="card-title">Edição de Cidades</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/cidades/update_cidades.php" method="post">
                    <div class="card-body">
                    <?php
                        ($rowCidades = $EditaCidades->fetch_assoc()); { ?>
                        <!-- Código da Cidade -->
                        <div class="form-group">
                            <label for="cod_cidade">ID:</label>
                            <input type="number" class="form-control" name="cod_cidade" id="cod_cidade" 
                            disabled placeholder="" value="<?php echo $rowCidades['id']; ?>">
                        </div>
                        <!-- Nome da Ciadae-->
                        <div class="form-group">
                            <label for="nome_cidade">NOME:</label>
                            <input type="text" class="form-control" name="nome_cidade" id="nome_cidade" 
                            placeholder="" value="<?php echo $rowCidades['nome']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                        </div>
                        <!-- Código do Município -->
                        <div class="form-group">
                            <label for="cod_municipio">COD MUNICÍPIO:</label>
                            <input type="number" class="form-control" name="cod_municipio" id="cod_municipio" 
                            placeholder="" value="<?php echo $rowCidades['cod_municipio']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                            <small>*Informação pode ser consultada no site do IBGE*</small>
                        </div>
                        <!-- Seleciona Estados -->
                        <div class="form-group">
                            <label>ESTADO:</label>
                            <select class="form-control" id="estados_cidade" name="estados_cidade"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                                <!-- <option selected>Selecione o Estado</option> -->
                                <option selected><?php echo $rowCidades['estado']; ?></option>
                                <?php while($rowEstados = mysqli_fetch_array($estados,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowEstados['sigla']; ?>"><?php echo $rowEstados['estado'] ?>
                            </option>
                            <?php } ?>
                            </select>
                        <!-- Informa o código do Município -->
                        </div>
                        <div class="form-group">
                            <label for="id_interno_cidades">ID INTERNO(SKU):</label>
                            <input type="number" class="form-control" name="id_interno_cidades" id="id_interno_cidades" 
                            placeholder="" value="<?php echo $rowCidades['id_interno']; ?>"
                            <?php if ($bloqueiaCampos) echo "disabled"; ?>>
                            <!-- <small>*Igual o código do Município*</small> -->
                        </div>
                        <input type="hidden" name="cod_cidade" value="<?php echo $rowCidades['id']; ?>">
                       <?php } ?>
                    </div>

                    <div class="card-footer">
                      <!-- Botão para cadastrar -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Atualizar</button>

                        <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="cidades.php" role="button"><i class="fa-solid fa-backward"
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