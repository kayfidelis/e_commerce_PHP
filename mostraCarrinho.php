<div class="container-fluid">
    <div class="row text-center" style="margin-top: 15px;">
        <h1>Carrinho de Compras</h1>
    </div>

    <?php
    $total = 0; // Inicializa o total como zero

    // Verifica se a sessão carrinho está configurada
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // Loop pelos itens no carrinho
    foreach ($_SESSION['carrinho'] as $cd => $qnt) {
        // Consulta o banco de dados para obter informações sobre o produto
        $consulta = $cn->query("SELECT * FROM tbl_produto WHERE cd_produto='$cd'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

        $produto = htmlspecialchars($exibe['nm_produto']); // Evita problemas de segurança
        $preco = number_format($exibe['vl_preco'], 2, ',', '.'); // Formata o preço
        $subtotal = $exibe['vl_preco'] * $qnt; // Calcula o subtotal
        $total += $subtotal; // Atualiza o total

        // Exibe informações sobre o produto
        ?>
        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-1 col-sm-offset-1">
                <img src="imagens/<?php echo htmlspecialchars($exibe['img_produto']); ?>" class="img-responsive">
            </div>
            <div class="col-sm-4">
                <h4 style="padding-top:20px"><?php echo $produto; ?></h4>
            </div>
            <div class="col-sm-2">
                <h4 style="padding-top:20px">R$ <?php echo $preco; ?></h4>
            </div>
            <div class="col-sm-2" style="padding-top:20px">
                <h4><?php echo $qnt; ?></h4>
            </div>
            <div class="col-sm-1 col-xs-offset-right-1" style="padding-top:20px">
                <!-- Remove o item do carrinho pelo ID -->
                <a href="removeCarrinho.php?cd=<?php echo $cd; ?>">
                    <button class="btn btn-lg btn-block btn-danger">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </a>
            </div>
        </div>
        <?php
    }
    ?>

    
</div>

