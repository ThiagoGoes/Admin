<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Logo que ficará na parte superior do lado esquerdo -->
  <a href="admin.php" class="brand-link" style="background-color: gold; color: black;">
    <img src="./dist/img/syspan_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-bold">ADM - SYSPAN®</span>
    
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/logo_alfa.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <!-- <small>Usuário:</small> -->
        <div style="color: gold;">Bem Vindo,</div>
        <a href="#" class="d-block" style="text-transform: uppercase;"><strong>
            <?php echo "" . $_SESSION['usuario'] . "" ?>
          </strong></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Busca" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="admin.php" class="nav-link active">
                <!-- <i class="far fa-circle nav-icon"></i> -->
                <i class="nav-icon fa-solid fa-house"></i>
                <p>Inicio</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header "><u>Opções</u></li>

        <!-- Importando a barra de navegação do arquivo navs.php -->
        <!-- Começa a Lista -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-list" style="color: gold;"></i>
            <p style="color: gold;">
              <u>Cadastros</u>
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <!-- Abre uma nova Opção de lista - Imóveis -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-house-chimney-window"></i>
                <p>
                  Cadastros Imóveis
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="imoveis.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-house-chimney-window"></i>
                    <p>
                      Imóveis
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tipo_imovel.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-house"></i>
                    <p>
                      Tipo Imóvel
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tipo_negociacao.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-house-chimney-window"></i>
                    <p>
                      Tipo Negociação
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="caracteristicas.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-filter"></i>
                    <p>
                      Características
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="empreendimentos.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-building"></i>
                    <p>
                      Empreendimentos
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cidades.php" class="nav-link" style="color: #F0F8FF;">
                    <!-- <i class="nav-icon fas fa-columns"></i> -->
                    <i class="nav-icon fa-solid fa-city"></i>
                    <p>
                      Cidades
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="bairros.php" class="nav-link" style="color: #F0F8FF;">
                    <!-- <i class="nav-icon fas fa-columns"></i> -->
                    <i class="nav-icon fa-solid fa-tree-city"></i>
                    <p>
                      Bairros
                    </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <!-- Abre uma nova Opção de lista - Listagens Diversas -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>
                  Listagem Diversas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="empresa.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-building"></i>
                    <p>
                      Dados Empresa
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="usuarios.php" class="nav-link" style="color: #F0F8FF;">
                    <!-- <i class="nav-icon fas fa-columns"></i> -->
                    <i class="nav-icon fa-solid fa-user"></i>
                    <p>
                      Usuário
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="newsletter.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-envelope"></i>
                    <p>
                      Newsletter | E-mail
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="sobre.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-address-card"></i>
                    <p>
                      Sobre
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="banners.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>
                      Banners
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="corretores.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-people-arrows"></i>
                    <p>
                      Corretores
                    </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>


          <!-- Começa a Lista -->
        <li class="nav-item">
          <!-- <a href="#" class="nav-link">
    <i class="nav-icon fa-solid fa-address-card" style="color: gold;"></i>
    <p style="color: gold;">
    <u>Cadastros</u>
    <i class="fas fa-angle-left right"></i>
    </p>
  </a> -->
          <!-- Abre uma nova Opção de lista - Imóveis -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-house-chimney-window"></i>
                <p>
                  Cadastro Imóveis
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="cad_imoveis.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-house-chimney-window"></i>
                    <p>
                      Imóveis
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_tp_imovel.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-house"></i>
                    <p>
                      Tipo Imóveil
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_negociacao.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-house-chimney-window"></i>
                    <p>
                      Tipo Negociação
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_caracteristicas.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-filter"></i>
                    <p>
                      Características
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_empreendimentos.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-building"></i>
                    <p>
                      Empreendimentos
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_empreendimento.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-building"></i>
                    <p>
                      Empreendimento | Home
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_cidades.php" class="nav-link" style="color: #F0F8FF;">
                    <!-- <i class="nav-icon fas fa-columns"></i> -->
                    <i class="nav-icon fa-solid fa-city"></i>
                    <p>
                      Cidades
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_bairros.php" class="nav-link" style="color: #F0F8FF;">
                    <!-- <i class="nav-icon fas fa-columns"></i> -->
                    <i class="nav-icon fa-solid fa-tree-city"></i>
                    <p>
                      Bairros
                    </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>

          <!-- Abre uma nova Opção de lista - Listagens Diversas -->
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>
                  Cadastros Diversos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="cad_empresa.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-building"></i>
                    <p>
                      Dados Empresa
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_usuarios.php" class="nav-link" style="color: #F0F8FF;">
                    <!-- <i class="nav-icon fas fa-columns"></i> -->
                    <i class="nav-icon fa-solid fa-user"></i>
                    <p>
                      Usuário
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_newsletter.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-envelope"></i>
                    <p>
                      Newsletter | E-mail
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_sobre.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-address-card"></i>
                    <p>
                      Sobre
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_banners.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>
                      Banners
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cad_corretores.php" class="nav-link" style="color: #F0F8FF;">
                    <i class="nav-icon fa-solid fa-people-arrows"></i>
                    <p>
                      Corretores
                    </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>

          <!-- Galerias -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-image" style="color: gold;"></i>
            <p style="color: gold;">
              <strong><u>Galerias</u></strong>
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="galerias.php" class="nav-link" style="color: #F0F8FF;">
                <i class="nav-icon fa-solid fa-image"></i>
                <p>
                  Galerias
                </p>
              </a>
            </li>
          </ul>
        </li>
        <!-- FIM -->
        <!-- FIM -->

      </ul>
    </nav>
  </div>
</aside>