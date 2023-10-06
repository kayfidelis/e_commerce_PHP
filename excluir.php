<?php
include 'conexao.php';  // conexão com banco de dados

$cd = $_GET['id'];  // pegando o id que é enviado pelo botão excluir que está na página lista.php

$pasta = "imagens/"; // localizar a pasta onde estão as imagens

// criando consulta pelo id que foi pego
$consulta = $cn->prepare("SELECT img_produto FROM tbl_produto WHERE cd_produto = :cd");
$consulta->bindParam(':cd', $cd, PDO::PARAM_INT);
$consulta->execute();
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $cn->prepare("DELETE FROM tbl_produto WHERE cd_produto = :cd");
$excluir->bindParam(':cd', $cd, PDO::PARAM_INT);
$excluir->execute();

$foto1 = $exibe['img_produto'];  

if (!empty($foto1)) {  
    unlink($pasta . $foto1);
}


header('location: lista.php');
?>
