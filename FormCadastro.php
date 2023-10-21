<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GRUTA.SB - Cadastro de Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-mask.js"></script>
    
    <style>
        .navbar {
            margin-bottom: 0;
        }
        
        #adm {
            margin-top: -0.4rem;
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
    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 custom-form">
                <h2>Cadastro de novo Cliente</h2>
                <form method="post" action="inserir.php" name="logon">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="txtnome" type="text" class="form-control" required id="nome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="txtemail" type="email" class="form-control" required id="email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="txtsenha" type="password" class="form-control" required id="senha">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <textarea name="txtendereco" rows="5" class="form-control" required id="endereco"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input name="txtcidade" type="text" class="form-control" required id="cidade">
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input name="txtcep" type="text" class="form-control" required id="cep">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>
