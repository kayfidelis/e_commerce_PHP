<?php
include 'conexao.php';
$consulta = $cn->query('SELECT cd_produto, nm_produto, vl_preco, img_produto, qt_estoque FROM vw_produto;');
?>

<div id="container" class="container-fluid">
    <div class="row">
        <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-sm-3 text-center">
                <img src="imagens/<?php echo $exibe['img_produto']; ?>" class="img-responsive" style="width:100%">
                <div>
                    <h4><b><?php echo mb_strimwidth($exibe['nm_produto'], 0, 30, '...'); ?></b></h4>
                </div>
                <div>
                    <h3>R$ <?php echo number_format($exibe['vl_preco'], 2, ',', '.'); ?></h3>
                </div>
                <div class="text-center">
                    <?php if ($exibe['qt_estoque'] > 0) { ?>
                        <a href="carrinho.php?cd=<?php echo $exibe['cd_produto']; ?>">
                            <button class="btn btn-lg btn-block btn-success">
                                <span class="glyphicon glyphicon-usd"> Comprar</span>
                            </button>
                        </a>
                    <?php } else { ?>
                        <button class="btn btn-lg btn-block btn-danger" disabled>
                            <span class="glyphicon glyphicon-remove"> Indisponível</span>
                        </button>
                    <?php } ?>

                    <div class="text-center" style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
                        <a href="detalhes.php?cd=<?php echo $exibe['cd_produto']; ?>">
                            <button class="btn btn-lg btn-block btn-primary  glyphicon glyphicon-pencil">
                                <span> Detalhes</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
