<?php
include_once('./navigation/session.php');
include_once('./php/connection.php');

// Busca quantos Corretores tem cadastrados;
$sql = "SELECT COUNT(id) AS qtd_corretores FROM corretores";
$cooretores = $conn->query($sql);

// Busca quantos Banners tem cadastrados;
$sqlBanner = "SELECT COUNT(id) AS qtd_banners FROM banners";
$banners = $conn->query($sqlBanner);

// Busca quantos Empreendimentos tem cadastrados;
$sqlEmpreendimentos = "SELECT COUNT(id) AS qtd_empreendimentos FROM empreendimentos";
$empreendimentos = $conn->query($sqlEmpreendimentos);

// Busca quantos Imoveis tem cadastrados;
$sqlImoveis = "SELECT COUNT(id) AS qtd_imoveis FROM imoveis";
$imoveis = $conn->query($sqlImoveis);

// Busca quantas Cidades tem cadastrados;
$sqlCidades = "SELECT COUNT(id) AS qtd_cidades FROM cidade";
$cidades = $conn->query($sqlCidades);

// Busca quantos Bairros tem cadastrados;
$sqlBairros = "SELECT COUNT(id) AS qtd_bairros FROM bairros";
$bairros = $conn->query($sqlBairros);

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

<style>
  @media screen and (min-width: 900px) {
    colunn {
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  }
}
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Importando a nav-bar do arquivo nav-bar.php -->
    <?php include_once('./navigation/nav-bar.php'); ?>
    <!-- FIM -->
</div>
    <!-- Importando a barra de navegação com as listagens -->
    <?php include_once('./navigation/navs.php'); ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">

              <!-- Botão Refresh (Atualizar a página) -->
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
                <!-- FIM -->

            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0" style="font-weight: bold;">ADM - Visão Geral</h1>
              </div>
            </div>
        </div>
      </div>

      <!-- Mostra a quantidade de registro existente -->
      <div class="Container">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="container-fluid">
                  <section class="content">
                  <h5 style="padding-left: 7px">Quantidade de Registros:</h5>
                  <br>
                    <div class="row row-md-4">

                      <!-- Bloco ref. mostrar qtd registro de Imóveis -->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">

                          <!-- Lista a quantidade de Imóveis -->
                          <div class="inner">
                            <?php
                              $rowImoveis = $imoveis->fetch_assoc();
                              echo "<h3>" . $rowImoveis["qtd_imoveis"] . "</h3>";
                            ?>

                            <p>IMÓVEIS</p>
                          </div>
                          <!-- FIM -->

                          <!-- Ícone ref. Imóveis -->
                          <div class="icon">
                            <i class="fa-solid fa-house-chimney-window" style="font-size:65px;"></i>
                          </div>
                          <!-- FIM -->

                          <a href="imoveis.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- FIM do bloco -->

                      <!-- Bloco ref. mostrar qtd registro de Empreendimentos -->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">

                          <!-- Lista qtd de EMpreendimentos -->
                          <div class="inner">
                            <?php
                              $rowEmpreendimentos = $empreendimentos->fetch_assoc();
                              echo "<h3>" . $rowEmpreendimentos["qtd_empreendimentos"] . "</h3>";
                            ?>

                            <p>EMPREENDIMENTOS</p>
                          </div>
                          <!-- FIM -->

                          <!-- Ícone ref. Empreendimentos -->
                          <div class="icon">
                            <i class="fa-solid fa-building" style="font-size:65px;"></i>
                          </div>
                          <a href="empreendimentos.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- FIM do Bloco -->


                      <!-- Bloco ref. mostrar qtd registro de Banners -->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">

                          <!-- Lista qtd de Banners -->
                          <div class="inner">
                            <?php 
                            $rowBanners = $banners->fetch_assoc();
                            echo "<h3>" . $rowBanners["qtd_banners"] . "</h3>";
                            ?>

                            <p>BANNERS</p>
                          </div>
                          <div class="icon">

                          <!-- Ícone ref. Banners -->
                            <i class="fas fa-calendar-alt" style="font-size: 65px;"></i>
                          </div>
                          <a href="banners.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- FIM-->
                      </div>
                      <!-- FIM do Bloco -->

                      
                      <!-- Bloco ref. mostrar qtd registro de Corretores -->
                      <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-danger">
                          <div class="inner">
                          <?php

                            $row = $cooretores->fetch_assoc();
                             echo "<h3>". $row["qtd_corretores"] . "</h3>"
                             ?>
                           

                            <p>CORRETORES</p>
                          </div>
                          <!-- Ícone ref. Empreendimentos -->
                          <div class="icon">
                            <i class="fa-solid fa-people-arrows" style="font-size: 65px;"></i>
                          </div>
                          <a href="corretores.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                              <!-- FIM do Bloco -->
                        </div>
                      </div>
                      <!-- FIM -->

                      <!-- Bloco ref. mostrar qtd registro de Cidades -->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">

                          <!-- Lista a quantidade de Imóveis -->
                          <div class="inner">
                            <?php
                              $rowCidades = $cidades->fetch_assoc();
                              echo "<h3>" . $rowCidades["qtd_cidades"] . "</h3>";
                            ?>

                            <p>CIDADES</p>
                          </div>

                          <!-- Ícone ref. Imóveis -->
                          <div class="icon">
                            <i class="fa-solid fa-city" style="font-size:65px;"></i>
                          </div>
                          <a href="cidades.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- FIM do bloco -->


                      <!-- Bloco ref. mostrar qtd registro de Bairros -->
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">

                          <!-- Lista a quantidade de Imóveis -->
                          <div class="inner">
                            <?php
                              $rowBairros = $bairros->fetch_assoc();
                              echo "<h3>" . $rowBairros["qtd_bairros"] . "</h3>";
                            ?>

                            <p>BAIRROS</p>
                          </div>
                          <!-- FIM -->

                          <!-- Ícone ref. Imóveis -->
                          <div class="icon">
                            <i class="fa-solid fa-tree-city" style="font-size:65px;"></i>
                          </div>
                          <a href="BAIRROS.php" class="small-box-footer">Mais Informações <i
                              class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- FIM do bloco -->
                      
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
    <!-- FIM -->
    
  </div>

      <script src="plugins/jquery/jquery.min.js"></script>

      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

      <script src="dist/js/adminlte.js"></script>

      <script src="plugins/chart.js/Chart.min.js"></script>
      <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>