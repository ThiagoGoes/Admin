<?php
// Local
// define('HOST', 'localhost');
// define('USUARIO', 'root');
// define('SENHA', 'syspan');
// // define('SENHA', '');
// define('DB', 'imobilia_bd');

// WEB
define('HOST', 'mysql.utaxi.com.br');
define('USUARIO', 'tgoes');
define('SENHA', 'TypeTracert2');
// define('SENHA', '');
define('DB', 'tgoes');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

?>