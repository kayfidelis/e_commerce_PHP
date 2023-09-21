<!doctype html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Mantos Sagrados - Busca de produtos</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #logon {
            margin-top: 1.1em;
        }

        #adm {
            margin-top: -0.4rem;
        }

        .navbar {
            margin-bottom: 0;
            padding: 1rem;
            border-radius: 0;
        }
    </style>
</head>

<body>

    <?php

    session_start();

    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    $pesquisa = $_GET['txtbuscar'];
    $consulta = $cn->query("select * from vw_produto where nm_produto like concat ('%','$pesquisa','%') or ds_categoria like concat ('%','$pesquisa','%')");

    if (empty($_GET['txtbuscar'])) {
        echo "<html><script>location.href='index.php'</script></html>";
    }

    if ($consulta->rowCount() == 0) {
        echo "<html><script>location.href='erro2.php'</script></html>";
    }
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
            <?php

            include 'footer.php';

            ?>

</body>

</html>