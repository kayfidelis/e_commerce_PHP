<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>GRUTA.SB - Área Administrativa</title>

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

    if (empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:index.php');
    }
    ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 text-center">

                <h2>Área administrativa</h2>
                </br>
                <a href="formProduto.php">
                    <button type="submit" class="btn btn-block btn-lg btn-primary">
                        Incluir Produto
                    </button>
                </a>

                </br>

                <a href="lista.php">
                    <button type="submit" class="btn btn-block btn-lg btn-warning">
                        Alterar / Excluir Produto
                    </button>
                </a>
                </br>
                <button type="submit" class="btn btn-block btn-lg btn-success">
                    Vendas
                </button>
                </br>
                <a href="sair.php">
                    <button type="submit" class="btn btn-block btn-lg btn-danger">
                        Sair do perfil administrativo
                    </button>
                </a>

            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>

</body>

</html>