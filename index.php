<?php
session_start();

// include_once "./php/connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Icon Página -->
  <link rel="shortcut icon" href="https://www.syspan.com.br/img/syspan.ico">
  <title>ADM - SYSPAN ACESSO RESTRITO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">

    <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <script src="https://kit.fontawesome.com/5ea68ebcc6.js" crossorigin="anonymous"></script>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  </style>

</head>

<body class="hold-transition login-page" style="background-color: gray;">
  <div style="position: absolute; top: 0; right: 0; list-style: none; color: black; font-size: 25px;">
    <?php include_once('./navigation/dark-mode.php'); ?>
  </div>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-dark">
      <div class="card-header text-center">
        <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
        <h1><strong><u>ADM SYSPAN</u></strong></h1>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Acessar para iniciar a sessão</p>

        <!-- Exibe alerta caso de erro no login -->


            <!-- Lembrar - ME -->
            <?php
              if (isset($_POST['submit'])) {
                // processa o formulário de login

                // se a opção "remember-me" estiver marcada
                if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
                  // define o tempo de expiração do cookie em 30 dias
                  $expire_time = time() + 30 * 24 * 60 * 60;

                  // define o valor do cookie como o ID do usuário
                  setcookie('usuario', $usuario, $expire_time, '/');
                }
              }
            ?>

        <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> -->
        <form action="./php/valida_login.php" method="POST">

          <!-- Retorno do erro de usuário e/ou senha -->
            <?php if (isset($_SESSION['login_err'])) : ?>
              <div style="border: 2px solid red; border-radius: 10px; background-color: red;">
                  <h5 style="text-align: center; color: white;" ><u><?php echo $_SESSION['login_err']; unset($_SESSION['login_err']); ?></u></h5>
              </div>
              <br>
            <?php endif; ?>


          <!-- FIM do Retorno -->

    <!-- <label for="usuario">Usuário:</label> -->
    <!-- Div Usuário -->
    <div class="input-group mb-3">
        <input type="text" name="usuario" id="usuario" class="form-control <?php echo (!empty($usuario_err)) ? 'is-invalid' : '';?>" placeholder="Usuário" autofocus>
        <span class="invalid-feedback"><?php echo $usuario_err; ?></span>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>

    <!-- <label for="senha">Senha:</label> -->
    <!-- Div Senha -->
    <div class="input-group mb-3">
        <input type="password" name="senha" id="senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" placeholder="Senha">
        <span class="invalid-feedback"><?php echo $senha_err; ?></span>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <!-- Div Lembrar -->
    <div class="row">
        <div class="col-8">
            <div class="icheck-warning">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                    Lembrar-me
                </label>
            </div>
        </div>

        <!-- Div Botão acessar -->
        <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block" style="color:gold; width: 100px;">Acessar</button>
        </div>
        <!-- /.col -->
    </div>
</form>

      </div>
    </div>
  </div>

        <!-- <script>
          function remember($senha=NULL, $lembrar_senha) {
            if (isset($_COOKIE['password'])) {
              if (empty($lembrar_senha)) {
                unset($_COOKIE['password']);
              }
            }else{
              if (isset($lembrar_senha)) {
                setcookie("password", $senha);
              }
            }
            return true;
          }
        </script> -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>