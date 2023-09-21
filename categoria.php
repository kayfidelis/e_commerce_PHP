<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #logon {
            margin-top: 1.1em;
        }

        .navbar {
            margin-bottom: 0;
            padding: 1rem;
            border-radius: 0;
        }

        #adm {
            margin-top: -0.4rem;
        }
    </style>
    <title>Minha loja</title>
</head>

<body>

    <?php
    session_start();
    include 'navbar.php' ?>
    <?php include 'cabecalho.html' ?>



    <?php
    include 'conexao.php';
    $cat = $_GET['cat'];
    $consulta = $cn->query("select cd_produto, nm_produto, vl_preco, img_produto, qt_estoque from vw_produto where ds_categoria = '$cat'");
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-sm-3 text-center">
                    <img src="imagens/<?php echo $exibe['img_produto']; ?>.jpg" class="img-responsive" style="width:100%">
                    <div>
                        <h4><b><?php echo mb_strimwidth($exibe['nm_produto'], 0, 30, '...'); ?></b></h4>
                    </div>
                    <div>
                        <h3>R$ <?php echo number_format($exibe['vl_preco'], 2, ',', '.'); ?></h3>
                    </div>
                    <div class="text-center">
                        <?php if ($exibe['qt_estoque'] > 0) { ?>
                            <button class="btn btn-lg btn-block btn-success">
                                <span class="glyphicon glyphicon-usd"> Comprar</span>
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-lg btn-block btn-danger" disabled>
                                <span class="glyphicon glyphicon-remove"> Indisponível</span>
                            </button>
                        <?php } ?>

                        <div class="text-center" style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
                            <a href="detalhes.php?cd=<?php echo $exibe['cd_produto']; ?>">
                                <button class="btn btn-lg btn-block btn-default glyphicon glyphicon-pencil">
                                    <span style="color: cadetblue;"> Detalhes</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>