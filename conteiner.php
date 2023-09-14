<?php
include 'conexao.php';
$consulta = $cn->query('SELECT nm_shape, vl_preco, img_shape FROM vw_shape;');
?>

<div class="container-fluid">
    <div class="row">
        <?php while ($exibe = $consulta->fetch_assoc()) { ?>
            <div class="col-sm-3 text-center"> 
                <img src="imagens/<?php echo $exibe['img_shape']; ?>.jpg" class="img-responsive" style="width:100%">
                <div>
                    <h4><b><?php echo mb_strimwidth($exibe['nm_shape'], 0, 30, '...'); ?></b></h4>
                </div>
                <div>
                    <h5>R$ <?php echo number_format($exibe['vl_preco'], 2, ',', '.'); ?></h5>
                </div>
                <button class="btn btn-sm btn-block btn-primary">
                    <span class="glyphicon glyphicon-pencil"> Detalhes</span>
                </button>

                <button class="btn btn-sm btn-block btn-success">
                    <span class="glyphicon glyphicon-plus-sign"> Comprar</span>
                </button>
            </div>
        <?php } ?>
    </div>
</div>
