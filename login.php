<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRUTA.SB - Login do Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            margin-bottom: 0;
        }

        #logon {
            margin-top: 1.1em;
        }

        .navbar {
            margin-bottom: 0
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
    ?>
    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4">

                <h2>Login</h2>
                <form name="frmusuario" method="post" action="validação.php">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" required id="email">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" type="password" class="form-control" required id="senha">
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">
                        <span class="glyphicon glyphicon-ok"> Entrar</span>
                    </button>


                    <a href="FormCadastro.php">
                        <button type="button" class="btn btn-lg btn-link">Ainda não sou cadastrado</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>
