<?php
include_once("../connection.php");

$email_newsletter = $_POST['email_newsletter'];

$sqlNewsletter = "INSERT INTO newsletter (email) VALUES ('$email_newsletter')";
echo $sqlNewsletter;

mysqli_query($conn,$sqlNewsletter) or die ("Não foi possível inserir os dados.");

mysqli_close($conn);

echo "<script> alert('Dados inseridos com Sucesso!') </script>";
header('location: ../../newsletter.php');
?>