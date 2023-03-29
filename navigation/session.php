<?php
include_once('./php/connection.php');

// session_start();
// if(empty(!$_SESSION['usuario'])) {
// 	$login_url = "index.php";
// 	header("Location: $login_url");
// 	exit();
// }


session_start();

// Se o usuário não estiver logado e tentar acessar uma página diretamente, redireciona para a página de login
if(empty($_SESSION['usuario']) && basename($_SERVER['SCRIPT_NAME']) !== 'index.php') {
    header('Location: index.php');
    exit();
}

// Se o usuário já estiver logado, redireciona para a página inicial
if(!empty($_SESSION['usuario']) && basename($_SERVER['SCRIPT_NAME']) === 'index.php') {
    header('Location: admin.php');
    exit();
}

// Parte do Lembrar-me;

// se o usuário não estiver logado
if (!isset($_SESSION['usuario'])) {
    // verifica se o cookie existe
    if (isset($_COOKIE['usuario'])) {
        // inicia a sessão do usuário automaticamente
        $_SESSION['usuario'] = $_COOKIE['usuario'];
    } else {
        // redireciona o usuário para a página de login
        header('Location: index.php');
        exit;
    }
}

// Obter o ID do usuário logado
$usuario = $_SESSION['usuario'];
$sqlIdUsuario = "SELECT id FROM adm_usuarios WHERE usuario = '$usuario'";
$resultado = mysqli_query($conn, $sqlIdUsuario);

if (!$resultado) {
    die('Erro ao obter o ID do usuário logado: ' . mysqli_error($conn));
}

// Se o usuário não estiver cadastrado na base de dados
if (mysqli_num_rows($resultado) == 0) {
    header('Location: index.php');
    exit();
}

// Obter o valor do campo "id" para o usuário logado
$row = mysqli_fetch_assoc($resultado);
$usuario_id = $row['id'];

// Armazenar o ID do usuário na sessão
$_SESSION['usuario_id'] = $usuario_id;



  

  // código para usuários logados

// include './php/connection.php';


// if (isset($_SESSION['usuario']) && $_SESSION['usuario'] > 0) {
// 	//Usuário esta logado
// }else {
// 	header('Location: index.php');
// 	exit;
// }

// include './php/connection.php';

?>