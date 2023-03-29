<?php
include_once('./php/connection.php');
include_once('./navigation/session.php');

$sqlImoveis = "SELECT * FROM imoveis";
$imoveis = $conn->query($sqlImoveis);

$sqlTpImovel = "SELECT * FROM tipo_imovel";
$tpImovel = $conn->query($sqlTpImovel);

$sqlTpNegociacao = "SELECT * FROM tipo_negociacao";
$tpNegociacao = $conn->query($sqlTpNegociacao);

$sqlCidade = "SELECT * FROM cidade";
$Cidade = $conn->query($sqlCidade);

$sqlBairros = "SELECT * FROM bairros";
$Bairros = $conn->query($sqlBairros);

$sqlEmpresa = "SELECT nome FROM dados_empresa";
$empresa = $conn->query($sqlEmpresa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM - Syspan Cadastro de Imóveis</title>

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
                        <h1 class="m-0">Imóvel - Novo</h1>
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
                <h3 class="card-title">Cadastro de Imóvel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
                <form action="./php/imovel/insere_imovel.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cod_imovel" value="<?php echo $cod_imovel; ?>">
                    <div class="card-body">
                        <!-- Informa o Endereço do Imóvel-->
                        <div class="form-group">
                            <label for="endereco_imovel">ENDEREÇO:</label>
                            <input type="text" class="form-control" name="endereco_imovel" id="endereco_imovel" 
                            placeholder="Informe o endereço" required>
                        </div>
                        
                        <!-- Seleciona o Tipo do imóvel -->
                        <div class="form-group">
                            <label>TIPO IMÓVEL(Escolha o Tipo de Imóvel):</label>
                            <select class="form-control" id="id_tp_imovel" name="id_tp_imovel">
                                <option selected>Selecione o Tipo de Imóvel</option>
                                <?php while($rowTpImovel = mysqli_fetch_array($tpImovel,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowTpImovel['id']; ?>"><?php echo $rowTpImovel['descricao']; ?>
                            </option>
                            <?php } ?>
                            </select required>
                            <small>Ex: Apartamento, Chacará, Ect...</small>
                        </div>

                        <!-- Escolhe o Tipo de Negociação -->
                        <div class="form-group">
                            <label>TIPO NEGOCIAÇÃO:</label>
                            <select class="form-control" id="id_tp_negociacao" name="id_tp_negociacao">
                                <option selected>Selecione o Tipo de Negociação</option>
                                <?php while($rowTpNegociacao = mysqli_fetch_array($tpNegociacao,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowTpNegociacao['id']; ?>"><?php echo $rowTpNegociacao['descricao']; ?>
                            </option>
                            <?php } ?>
                            </select required>
                            <small>Ex: Venda, Aluguel</small>
                        </div>
                            <!-- Escolhe a cidade  -->
                        <div class="form-group">
                            <label>CIDADE:</label>
                            <select class="form-control" id="id_cidade" name="id_cidade">
                                <option selected>Selecione a Cidade</option>
                                <?php while($rowCidade = mysqli_fetch_array($Cidade,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowCidade['id']; ?>"><?php echo $rowCidade['nome']; ?>
                            </option>
                            <?php } ?>
                            </select required>
                            <!-- <small>Ex: Venda, Aluguel</small> -->
                        </div>
                        <!-- Bairro -->
                        <div class="form-group">
                            <label>BAIRRO:</label>
                            <select class="form-control" id="id_bairro" name="id_bairro">
                                <option selected>Selecione o Bairro</option>
                                <?php while($rowBairros = mysqli_fetch_array($Bairros,MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $rowBairros['id']; ?>"><?php echo $rowBairros['bairro']; ?>
                            </option>
                            <?php } ?>
                            </select required>
                            <!-- <small>Ex: Venda, Aluguel</small> -->
                        </div>

                        <!-- Area Útil -->
                        <div class="form-group">
                            <label>ÁREA ÚTIL:</label>
                            <select class="form-control" id="area_util" name="area_util">
                                <option selected>Possui Área Útil</option>
                                <option value="0">0 - NÃO</option>
                                <option value="1">1 - SIM</option>
                            </select>
                        </div>

                        <!-- Área Total -->
                        <div class="form-group">
                            <label for="area_total">ÁREA TOTAL:</label>
                            <input min="0" type="number" class="form-control" name="area_total" id="area_totalid_interno_bairrro" 
                            placeholder="Informe a área total do imóvel">
                        </div>

                        <!-- Observação -->
                        <div class="form-group">
                            <label>OBSERVAÇÃO:</label>
                            <textarea class="form-control" rows="5" name="obs_imoveis"
                                id="obs_imoveis" placeholder="Digite a Observação do Imóvel"></textarea>
                        </div>

                        <!-- Dormitórios -->
                        <div class="form-group">
                            <label for="dormitorios">DORMITÓRIOS:</label>
                            <input min="0" type="number" class="form-control" name="dormitorios" id="dormitorios" 
                            placeholder="Informe a quantiade de dormitórios" required>
                        </div>

                        <!-- Banheiros -->
                        <div class="form-group">
                            <label for="banheiros">BANHEIROS:</label>
                            <input min="0" type="number" class="form-control" name="banheiros" id="banheiros" 
                            placeholder="Informe a quantidade de Banheiros do imóvel" required>
                        </div>

                        <!-- salas -->
                        <div class="form-group">
                            <label for="salas">SALAS:</label>
                            <input min="0" type="number" class="form-control" name="salas" id="salas" 
                            placeholder="Informe a quantidade de Salas no imóvel" required>
                        </div>

                        <!-- Suítes -->
                        <div class="form-group">
                            <label for="suites">SUÍTES:</label>
                            <input min="0" type="number" class="form-control" name="suites" id="suites" 
                            placeholder="Informe a quantidade de Suítes do imóvel">
                        </div>

                        <!-- Vagas Garagem -->
                        <div class="form-group">
                            <label for="vagas">VAGAS DE GARAGEM:</label>
                            <input min="0" type="number" class="form-control" name="vagas" id="vagas" 
                            placeholder="Informe a quantidade de Vagas de garagem do imóvel" required>
                        </div>

                        <!-- id Interno -->
                        <div class="form-group">
                            <label for="id_interno">ID INTERNO:</label>
                            <input min="0" type="number" class="form-control" name="id_interno" id="id_interno" 
                            placeholder="Informe o ID do imóvel">
                        </div>

                        <!-- Situação -->
                        <div class="form-group">
                            <label>ATIVO:</label>
                            <select class="form-control" id="situacao" name="situacao">
                                <option selected>Situação do Imóvel</option>
                                <option value="0">0 - SIM</option>
                                <option value="1">1 - NÃO</option>
                            </select required>
                            <small>*Se irá ou não aparecer no site*</small>
                        </div>

                        <!-- Complemento -->
                        <div class="form-group">
                            <label for="complemento">COMPLEMENTO:</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" 
                            placeholder="Informe o ID do imóvel" required>
                            <small>Ex: Fundos, etc...</small>
                        </div>

                        <!-- iptu -->
                        <div class="form-group">
                            <label>IPTU:</label>
                            <select class="form-control" id="iptu" name="iptu">
                                <option selected>Possui IPTU Incluso?</option>
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select required>
                        </div>

                        <!-- iptu locador -->
                        <div class="form-group">
                            <label>IPTU LOCADOR:</label>
                            <select class="form-control" id="iptu_locador" name="iptu_locador">
                                <option selected>Possui IPTU Locador?</option>
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select required>
                        </div>

                        <!-- condominio -->
                        <div class="form-group">
                            <label>CONDOMINÍO:</label>
                            <select class="form-control" id="condominio" name="condominio">
                                <option selected>Pertence a um Condominío?</option>
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select required>
                        </div>

                        <!-- Valor Pretendido -->
                        <div class="form-group">
                            <label for="vl_pretendido">VALOR PRETENDIDO:</label>
                            <input min="0" type="tel" class="form-control dinheiro" name="vl_pretendido" id="vl_pretendido" 
                            placeholder="Informe o Valor Pretendido do imóvel" required>
                        </div>

                        <!-- Video -->
                        <div class="form-group">
                            <label for="video">VIDEO:</label>
                            <input type="text" class="form-control" name="video" id="video" 
                            placeholder="Informe o Caminho do Video">
                        </div>

                        <!-- Mapa -->
                        <div class="form-group">
                            <label>MAPA:</label>
                            <textarea class="form-control" rows="5" name="mapa"
                                id="mapa" placeholder="Digite o mapa do Imóvel"></textarea>
                        </div>

                        <!-- latitude -->
                        <div class="form-group">
                            <label for="latitude">LATITUDE:</label>
                            <input type="number" class="form-control" name="latitude" id="latitude" 
                            placeholder="Informe a latitude do imóvel">
                            <small>Ex: -12,34567</small>
                        </div>

                        <!-- longitude -->
                        <div class="form-group">
                            <label for="longitude">LONGITUDE:</label>
                            <input type="number" class="form-control" name="longitude" id="longitude" 
                            placeholder="Informe a longitude do imóvel">
                            <small>Ex: -12,34567</small>
                        </div>

                        <!-- Imagem Imóvel -->
                        <!-- <div class="form-group">
                            <label for="img-upload">FOTO:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="img_imovel" id="imagem">
                                    <label class="custom-file-label" for="imagem">Escolha uma Foto</label>
                                </div>
                            </div>

                            <style>
                                .alert{
                                    position: fixed;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    background-color: red;
                                    color: white;
                                    padding: 10px;
                                    border-radius: 5px;
                                }
                            </style>

                                            <script>
                                                        // Adicione um manipulador de eventos ao input de arquivo
                                                        document.getElementById("imagem").addEventListener("change", function() {
                                                        // Obtenha o arquivo selecionado pelo usuário
                                                        var arquivo = this.files[0];
                                                        // Verifique se o arquivo é uma imagem
                                                        if (arquivo.type.match(/image.*/)) {
                                                        // Verifique se o tamanho do arquivo é menor que 1MB
                                                        var maxSize = 5120 * 5120; // 5MB
                                                        if (arquivo.size > maxSize) {
                                                            // Crie um alert
                                                            var alerta = document.createElement("div");
                                                            alerta.classList.add("alert");
                                                            alerta.textContent = "A imagem selecionada excede o tamanho máximo permitido...";
                                                            // Adicione o alert à página
                                                            document.body.appendChild(alerta);
                                                            // Limpe o campo de arquivo
                                                            this.value = null;
                                                            // Remova o alert após 3 segundos
                                                            setTimeout(function() {
                                                            alerta.parentNode.removeChild(alerta);
                                                            }, 3000);
                                                            return;
                                                        }
                                                        // Crie um objeto URL para o arquivo
                                                        var url = URL.createObjectURL(arquivo);
                                                        // Defina o atributo src da imagem para a URL do objeto
                                                        document.getElementById("img-preview").src = url;
                                                        // Define o nome do arquivo como o nome do arquivo selecionado
                                                        document.getElementById("img-name").textContent = arquivo.name;
                                                        } else {
                                                        // Crie um alert
                                                        var alerta = document.createElement("div");
                                                        alerta.classList.add("alert");
                                                        alerta.textContent = "Por favor, selecione um arquivo de imagem.";
                                                        // Adicione o alert à página
                                                        document.body.appendChild(alerta);
                                                        // Limpe o campo de arquivo
                                                        this.value = null;
                                                        // Remova o alert após 3 segundos
                                                        setTimeout(function() {
                                                            alerta.parentNode.removeChild(alerta);
                                                        }, 3000);
                                                        }
                                                    });
                                            </script>

                            <figure style="text-align: center;">
                                <img style="height: 200px; width: 250px;" id="img-preview"
                                    src="./galerias/carregando.png" alt="Imagem de visualização">
                                <figcaption><b>Visualização da imagem selecionada:</b></figcaption>
                                <span id="img-name"></span>
                            </figure>
                        </div> -->

                    </div>



                    <div class="card-footer">
                      <!-- Botão para cadastrar -->
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"
                                style="gap: 10px;"></i> Cadastrar</button>

                        <!-- Botão para voltar -->
                        <a class="btn btn-primary" href="imoveis.php" role="button"><i class="fa-solid fa-backward"
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

        <script>                                           
        // $(document).ready(function () {
        //     // Aplica a máscara no campo de valor
        //     $('#vl_pretendido').mask('0,00');
        // });

        $(".dinheiro").keyup(function () {
      v = this.value;
      v = v.replace(/\D/g, "");//Remove tudo o que n�o � d�gito
      v = v.replace(/(\d)(\d{8})$/, "$1.$2");//coloca o ponto dos milh�es
      v = v.replace(/(\d)(\d{5})$/, "$1.$2");//coloca o ponto dos milhares

      v = v.replace(/(\d)(\d{2})$/, "$1,$2");//coloca a virgula antes dos 2 �ltimos d�gitos       //Esse � t�o f�cil que n�o merece explica��es
      this.value = v;
    });
        </script> 
</body>

</html>