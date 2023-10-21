<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRUTA.SB - Login do Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Adicione seu estilo personalizado aqui, se necessário */
    </style>
</head>

<body>
    <?php
    session_start();
    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';
    ?>
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Login</h2>
                <form name="frmusuario" method="post" action="validação.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" required id="email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="senha" type="password" class="form-control" required id="senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <span class="glyphicon glyphicon-ok"></span> Entrar
                    </button>
                    <a href="FormCadastro.php" class="btn btn-link btn-block">Ainda não sou cadastrado</a>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>
