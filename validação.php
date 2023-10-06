<?php

include 'conexao.php';

session_start();

$Vemail = $_POST['email'];
$Vsenha = $_POST['senha'];

echo $Vemail, $Vsenha;

$consulta = $cn->query("select cd_Usuario, nm_Usuario, ds_Email, ds_Senha, ds_Status from tbl_Usuario where ds_Email = '$Vemail' and ds_Senha = '$Vsenha'");

if($consulta->rowCount() == 1){
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC); 

    if($exibeUsuario['ds_Status'] == 0){
        $_SESSION['ID'] = $exibeUsuario['cd_Usuario'];
        $_SESSION['Status'] = 0;
        header('location:index.php'); 
    }
    else{
        $_SESSION['ID'] = $exibeUsuario['cd_Usuario'];
        $_SESSION['Status'] = 1;
        header('location:index.php'); 
    }
    
   
}
else{
    header('location:erro.php');
}
//fim//
?>
