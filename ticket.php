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

        #venda {
            text-align: center;
        }
        
    </style>



</head>

<body>

    <?php

    session_start();
    if (empty($_SESSION['ID'])) {
        header("location:login.php");
    }


    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    $ticket_compra = $_GET['ticket'];

    $consulta_venda = $cn->query("SELECT * FROM vw_venda WHERE no_ticket='$ticket_compra'");


    ?>
    <div class="container-fluid">

        <div class="row" style="margin-top: 15px;">
            <h1 class="text-center">Compra: <?php echo $ticket_compra ?></h1>
        </div>

        <div class="row" style="margin-top: 15px;">

            <div class="col-sm-1 col-sm-offset-1"> Data </div>
            <div class="col-sm-2"> Ticket </div>
            <div class="col-sm-5"> Produto </div>
            <div class="col-sm-1"> Quantidade </div>
            <div class="col-sm-2"> Preço </div>

        </div>

    </div>

    <?php
    $total = 0;

    while ($exibeVenda = $consulta_venda->fetch(PDO::FETCH_ASSOC)) {
        $total += $exibeVenda['vl_total_item'];

    ?>

        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-1 col-sm-offset-1"> <?php echo date('d/m/Y', strtotime($exibeVenda['dt_venda'])); ?> </div>
            <div class="col-sm-2"> <?php echo $exibeVenda['no_ticket']; ?> </div>
            <div class="col-sm-5"> <?php echo $exibeVenda['nm_produto']; ?> </div>
            <div class="col-sm-1"> <?php echo $exibeVenda['qt_produto']; ?> </div>
            <div class="col-sm-2"> <?php echo number_format($exibeVenda['vl_total_item'], 2, ',', '.'); ?> </div>

        </div>
    <?php } ?>

    <div class="row" style="margin-top: 15px;">
        <h2 class="text-center">Total desta compra: R$ <?php echo number_format($total, 2, ',', '.'); ?></h2>
    </div>

    <?php

    include 'footer.php';

    ?>

</body>

</html>