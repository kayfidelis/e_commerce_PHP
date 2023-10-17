<!DOCTYPE html>
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

        .row-item {
            margin-top: 15px;
        }

        .row-item p {
            margin-bottom: 0;
        }

        .date-col {
            width: 15%;
        }

        .ticket-col {
            width: 20%;
        }

        .product-col {
            width: 30%;
        }

        .quantity-col {
            width: 10%;
        }

        .total-col {
            width: 20%;
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
        echo '<script>
	window.location.href = "venda.php";
	alert("Nenhuma Venda foi encontrada nessa data!");
  </script>';
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="row-item">
                    <div class="col-sm-1 date-col"><p>Data: <?php echo date('d/m/Y', strtotime($exibe['dt_venda'])); ?></p></div>
                    <div class="col-sm-2 ticket-col"><p>NO.Ticket: <?php echo $exibe['no_ticket']; ?></p></div>
                    <div class="col-sm-5 product-col"><p>Nome do Produto: <?php echo $exibe['nm_produto']; ?> </p></div>
                    <div class="col-sm-1 quantity-col"><p>Quantidade: <?php echo $exibe['qt_produto']; ?></p></div>
                    <div class="col-sm-2 total-col"><p>Valor Total: <?php echo number_format($exibe['vl_total_item'], 2, ',', '.'); ?></p></div>
                    <br/><br/>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
