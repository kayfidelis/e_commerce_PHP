<?php
include 'conexao.php';
$consulta = $cn->query('SELECT nm_produto, vl_preco, img_produto, qt_estoque FROM vw_produto;');
?>

<div class="container-fluid">
    <div class="row">
        <?php while ($exibe = $consulta->fetch_assoc()) { ?>
            <div class="col-sm-3 text-center">
                <img src="imagens/<?php echo $exibe['img_produto']; ?>.jpg" class="img-responsive" style="width:100%">
                <div>
                    <h4><b><?php echo mb_strimwidth($exibe['nm_produto'], 0, 30, '...'); ?></b></h4>
                </div>
                <div>
                    <h3>R$ <?php echo number_format($exibe['vl_preco'], 2, ',', '.'); ?></h3>
                </div>

                <button class="btn btn-lg btn-block btn-primary">
                    <span class="glyphicon glyphicon-pencil"> Detalhes</span>
                </button>
                </br>
                <div>
                    <?php if ($exibe['qt_estoque'] > 0) { ?>
                        <button class="btn btn-lg btn-block btn-success">
                            <span class="glyphicon glyphicon-plus-sign"> Comprar</span>
                        </button>
                    <?php } else { ?>
                        <button class="btn btn-lg btn-block btn-danger">
                            <span class="glyphicon glyphicon-remove"> Indisponivel</span>
                        </button>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>