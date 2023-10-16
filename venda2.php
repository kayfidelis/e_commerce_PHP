<!doctype html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>GRUTA.SB - Busca de Vendas</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

    $pesquisa = $_GET['data'];
    $consulta = $cn->query("select * from vw_Venda where dt_venda like concat ('%','$pesquisa','%')");

    if (empty($_GET['data'])) {
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
                <div>
                        <h4><b>No. Ticket: <?php echo isset($exibe['no_ticket']) ? $exibe['no_ticket'] : ''; ?></b></h4>
                    </div>
                <div>
                        <h4><b>Data da Venda: <?php echo isset($exibe['dt_venda']) ? $exibe['dt_venda'] : ''; ?></b></h4>
                    </div>
                <div>
                        <h4><b>Total de Produtos: <?php echo isset($exibe['qt_produto']) ? $exibe['qt_produto'] : ''; ?></b></h4>
                    </div>
                    <div>
                        <h4><b>Total da Venda: R$ <?php echo isset($exibe['vl_total_item']) ? number_format($exibe['vl_total_item'], 2, ',', '.') : ''; ?></b></h4>
                    </div>
            <?php } ?>
