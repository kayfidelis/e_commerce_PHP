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

if ($excluir->execute()) {
    $foto1 = $exibe['img_produto'];

    if (!empty($foto1)) {  
        unlink($pasta . $foto1);
    }
    
    // Redirecionar com JavaScript após a exclusão bem-sucedida
    echo '<script>
            alert("Produto excluído com sucesso!");
            window.location.href = "lista.php";
          </script>';
} else {
    // Redirecionar com JavaScript em caso de erro na exclusão
    echo '<script>
            alert("Erro ao excluir o produto. Por favor, tente novamente.");
            window.location.href = "lista.php";
          </script>';
}
?>
