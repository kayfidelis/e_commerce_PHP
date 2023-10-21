<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GRUTA.SB - Alteração de Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-mask.js"></script>

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

        /* Estilos personalizados para o formulário */
        .custom-form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .custom-form h2 {
            text-align: center;
        }

        .custom-form .form-group label {
            font-weight: bold;
        }

        .custom-form .form-group input[type="text"],
        .custom-form .form-group input[type="email"],
        .custom-form .form-group input[type="password"],
        .custom-form .form-group input[type="number"] {
            width: 100%;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#cep").mask("00000-000");
        });
    </script>
</head>

<body>
    <?php
    session_start();

    $id = $_GET['IdUser'];

    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    $consulta = $cn->query("SELECT * FROM tbl_Usuario WHERE nm_Usuario='$id'"); // trazendo id pelo nome
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 custom-form">
                <h2>Alteração de Usuário</h2>
                <form method="post" action="alteraUser.php?IdUser=<?php echo $id; ?>" name="incluiProd" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtnome">Nome</label>
                        <input type="text" name="txtnome" value="<?php echo $exibe['nm_Usuario']; ?>" class="form-control" required id="txtnome">
                    </div>
                    <div class="form-group">
                        <label for="txtemail">Email</label>
                        <input type="email" name="txtemail" value="<?php echo $exibe['ds_Email']; ?>" class="form-control" required id="txtemail">
                    </div>
                    <div class="form-group">
                        <label for="txtsenha">Senha</label>
                        <input type="text" name="txtsenha" value="<?php echo $exibe['ds_Senha']; ?>" class="form-control" required id="txtsenha">
                    </div>
                    <div class="form-group">
                        <label for="txtend">Endereço</label>
                        <input type="text" name="txtend" value="<?php echo $exibe['ds_Endereço']; ?>" class="form-control" required id="txtend">
                    </div>
                    <div class="form-group">
                        <label for="txtcidade">Cidade</label>
                        <input type="text" name="txtcidade" value="<?php echo $exibe['ds_Cidade']; ?>" class="form-control" required id="txtcidade">
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input name="txtcep" type="text" value="<?php echo $exibe['no_Cep']; ?>" class="form-control" required id="cep">
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary"> Alterar Minhas Informações</button>
                </form>
                <br />
                <a href="areaUser.php"><button class="btn btn-lg btn-success">Ver Minhas Compras</button></a>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>
