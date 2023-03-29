<?php
// include_once('./navigation/session.php');
// include_once('./php/connection.php');

// Select os dados da tabela Dados_empresa;
$sqlNavEmpresa = "SELECT * FROM dados_empresa";
$BuscaEmpresa = $conn->query($sqlNavEmpresa);
?>

<style>
  /* Estilo para o modo escuro */
  .dark-mode-toggle.dark-mode svg {
    fill: #fff;
  }

  .dark-mode-toggle.dark-mode .toggle-label {
    color: #fff;
  }
</style>



<nav class="main-header navbar navbar-expand navbar-black navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="./admin.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="./empresa.php" class="nav-link">Empresa</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto align-items-center">
    <!-- Mostra o usuário que esta logado -->
    <!-- <h5 style="color: gold;">Bem vindo, <strong style="text-transform: uppercase;"><?php echo $_SESSION['usuario']; ?></strong></h5> -->
    <div class="d-flex align-items-center">
      <?php
      $Logmpresa = $BuscaEmpresa->fetch_assoc();
      echo '<h5 style="color: gold; padding-top: 7px; margin-right: 10px;"><strong style="text-transform: uppercase;">' . $Logmpresa["nome"] . '</strong></h5>';
      ?>
      <!-- Aqui vão os outros elementos que precisam ser alinhados -->
    </div>


    <!-- FullScreen no Dashboard -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <!-- dark-Mode -->
    <li class="nav-item">
      <a class="nav-link" href="#" role="button" id="dark-mode-toggle">
        <i class="fa-solid fa-moon"></i>
      </a>
    </li>


    <!-- Sair do Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="./php/logout.php" role="button">
        <i class="fa-solid fa-right-from-bracket"></i>
      </a>
    </li>

  </ul>
</nav>



<script>
  // Adicionar um listener de evento para o botão
  document.getElementById('dark-mode-toggle').addEventListener('click', function () {
    // Alternar a classe dark-mode no elemento body
    document.body.classList.toggle('dark-mode');

    // Armazenar o estado do modo escuro no localStorage
    localStorage.setItem('isDarkMode', document.body.classList.contains('dark-mode'));

    // Alterar o ícone de acordo com o modo
    const isDarkMode = document.body.classList.contains('dark-mode');
    const icon = document.querySelector('#dark-mode-toggle i');
    if (isDarkMode) {
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
    } else {
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
    }

    // Atualizar o rótulo do botão
    // const label = document.querySelector('#dark-mode-toggle .toggle-label');
    // if (isDarkMode) {
    //   label.textContent = 'Light';
    // } else {
    //   label.textContent = 'Dark';
    // }
  });

  // Verificar se o modo escuro está ativado no localStorage e atualizar a página
  const isDarkMode = localStorage.getItem('isDarkMode') === 'true';
  if (isDarkMode) {
    document.body.classList.add('dark-mode');
    const icon = document.querySelector('#dark-mode-toggle i');
    icon.classList.remove('fa-moon');
    icon.classList.add('fa-sun');
    const label = document.querySelector('#dark-mode-toggle .toggle-label');
    // label.textContent = 'Light';
  }
</script>
