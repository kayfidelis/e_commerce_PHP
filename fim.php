<!doctype html>
<html>

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


    <style type="text/css">
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

    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 text-center">
                <h2>Compra efetuada com sucesso!! Seu número de registro é: <?php echo $ticket; ?></h2>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>

</body>

</html>
