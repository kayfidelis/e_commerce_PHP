<!doctype html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>GRUTA.SB</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .info {
            margin-top: 15rem;
            /*display: flex;
            flex-direction: column;
            position: center;
            height: 100vh;
            justify-content: center;*/
        }

        h2 {
            color: green;
        }
        #adm {
            margin-top: -0.4rem;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    if (!empty($_GET['cd'])) {
        $id_prod = $_GET['cd'];
        $consulta = $cn->query("select * from vw_produto where cd_produto = '$id_prod'");
        $exibir = $consulta->fetch(PDO::FETCH_ASSOC);
    } else {
        header('location:index.php');
    }



    ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-4 col-sm-offset-1">

                <img src="imagens/<?php echo $exibir['img_produto']; ?>" class="img-responsive" style="width:100%;">

            </div>

            <div class="info col-sm-7 position-absolute top-50 start-50 translate-middle">

                <h1><b><?php echo $exibir['nm_produto']; ?></b></h1>

                <h5>Frete grátis para todo o Brasil.</h5>
                <h5><b>Estoque: </b><?php echo $exibir['qt_estoque'] ?></h5>

                <hr />

                <h2><b> R$ <?php echo number_format($exibir['vl_preco'], 2, ',', '.'); ?> </b></h2>

                <br/>

                <?php if ($exibir['qt_estoque'] > 0) { ?>
                        <a href="carrinho.php?cd=<?php echo $exibir['cd_produto']; ?>">
                            <button class="btn btn-lg btn-success">
                                Adicionar ao Carrinho
                            </button>
                        </a>
                    <?php } else { ?>
                        <button class="btn btn-lg btn-danger" disabled>
                             Indisponível
                        </button>
                    <?php } ?>

                <br/>

                <h3>Detalhes do Produto</h3>

                <h4><?php echo $exibir['descrição']; ?></h4>

            </div>

        </div>
    </div>

        <?php include 'footer.php'; ?>

</body>

</html>
