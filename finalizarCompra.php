<?php
// iniciando a sessão, pois precisamos pegar o cd do usuário logado para salvar na tabela de vendas no campo cd_cliente
session_start();  

include 'conexao.php';

$data = date('Y-m-d');  // variável que vai pegar a data do dia (ano mês dia - padrão do MySQL)
$ticket = uniqid();  // gerando um ticket com função uniqid(); gera um ID único    
$cd_user = $_SESSION['ID'];  // recebendo o código do usuário logado, nesta página o usuário já está logado pois, em do carrinho de compra
    
// criando um loop para sessão carrinho que recebe o $cd e a quantidade
foreach ($_SESSION['carrinho'] as $cd => $qnt) {
    $consulta = $cn->query("SELECT vl_preco FROM tbl_produto WHERE cd_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vl_preco'];    
    
    // Chamar a stored procedure aqui
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
