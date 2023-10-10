<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>GRUTA.SB</title>
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

        #venda {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (empty($_SESSION['ID'])) {
        header("location: login.php");
    }

    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    $cd_Usuario = $_SESSION['ID'];

    $consulta_venda = $cn->query("SELECT MIN(dt_venda) AS dt_venda, no_ticket FROM vw_Venda WHERE cd_cliente = $cd_Usuario GROUP BY no_ticket");
    ?>

    <h1 id="venda">MINHAS COMPRAS</h1>
    <br />

    <div class="container-fluid">
        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-1 col-sm-offset-1"> Data </div>
            <div class="col-sm-2"> Ticket </div>
        </div>
        
        <?php 
        if ($consulta_venda->rowCount() > 0) { // Verifica se há resultados
            while ($exibeVenda = $consulta_venda->fetch(PDO::FETCH_ASSOC)) { 
        ?>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-sm-1 col-sm-offset-1"> <?php echo date('d/m/Y', strtotime($exibeVenda['dt_venda'])); ?> </div>
                    <div class="col-sm-2"><a href="ticket.php?ticket=<?php echo $exibeVenda['no_ticket']; ?>"><?php echo $exibeVenda['no_ticket']; ?></a></div>
                </div>
           <?php 
            } 
        } else { 
            echo '<script>
                    window.location.href = "index.php";
                    alert("Você ainda não tem nenhuma compra");
                  </script>';
        }
        ?>

    </div>

    <?php
    include 'footer.php';
    ?>
</body>
</html>
