<?php 
include 'conexao.php';

$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];
$end = $_POST['txtendereco'];
$cidade = $_POST['txtcidade'];
$cep = $_POST['txtcep'];

$consulta = $cn ->query("select ds_Email from tbl_Usuario where ds_Email ='$email'");
$exibe = $consulta ->fetch(PDO::FETCH_ASSOC);

if($consulta->rowCount() == 1){
    header('location:erro1.php');
}
else{
    $incluir = $cn ->query("insert into tbl_Usuario(nm_Usuario, ds_Email, ds_Senha, ds_Status, ds_Endereço, ds_Cidade, no_Cep)
                            values('$nome', '$email', '$senha', '0', '$end', '$cidade', '$cep')");
    header('location:ok.php');
}
?>