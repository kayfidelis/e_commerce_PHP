<?php

session_start();  

include 'conexao.php';

$data = date('Y-m-d');  
$ticket = uniqid();  
$cd_user = $_SESSION['ID'];  
    
foreach ($_SESSION['carrinho'] as $cd => $qnt) {
    $consulta = $cn->query("SELECT vl_preco FROM tbl_produto WHERE cd_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vl_preco'];    
    

    $stmt = $cn->prepare("CALL insVenda(:ticket, :cd_user, :cd, :qnt, :preco, :data)");
    $stmt->bindParam(':ticket', $ticket);
    $stmt->bindParam(':cd_user', $cd_user);
    $stmt->bindParam(':cd', $cd);
    $stmt->bindParam(':qnt', $qnt);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':data', $data);
    
    $stmt->execute();
}

include 'fim.php';
?>
