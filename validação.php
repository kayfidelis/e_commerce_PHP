<?php
include 'conexao.php';

session_start();

$Vemail = $_POST['email'];
$Vsenha = $_POST['senha'];

$consulta = $cn->query("select cd_Usuario, nm_Usuario, ds_Email, ds_Senha, ds_Status from tbl_Usuario where ds_Email = '$Vemail' and ds_Senha = '$Vsenha'");

if ($consulta->rowCount() == 1) 
{
   $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
   $_SESSION['ID'] = $exibeUsuario['cd_Usuario'];
   header('location:index.php');
} 
else 
{
   header('location:erro.php');
}
?>