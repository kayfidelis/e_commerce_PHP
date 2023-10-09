<!DOCTYPE html>
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
    <script src="jquery.mask.js"></script>
    <script>
        $(document).ready(function () {
            $("#cep").mask("00000-000");
        });
    </script>
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
    session_start();

    $id = $_GET['IdUser'];

    include 'conexao.php';
    include 'navbar.php';
    include 'cabecalho.html';

    $consulta = $cn->query("SELECT * FROM tbl_Usuario WHERE nm_Usuario='$id'"); // trazendo id pelo nome
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h2>Alteração de Usuário</h2>
                <form method="post" action="alterar.php?cd_altera=<?php echo $id; ?>" name="incluiProd"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtprod">Nome</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['nm_Usuario']; ?>"
                            class="form-control" required id="txtprod">
                    </div>
                    <div class="form-group">
                        <label for="txtprod">Email</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['ds_Email']; ?>"
                            class="form-control" required id="txtprod">
                    </div>
                    <div class="form-group">
                        <label for="txtprod">Senha</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['ds_Senha']; ?>"
                            class="form-control" required id="txtprod">
                    </div>
                    <div class="form-group">
                        <label for="txtprod">Status</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['ds_Status']; ?>"
                            class="form-control" required id="txtprod">
                    </div>
                    <div class="form-group">
                        <label for="txtprod">Endereço</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['ds_Endereço']; ?>"
                            class="form-control" required id="txtprod">
                    </div>
                    <div class="form-group">
                        <label for="txtprod">Cidade</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['ds_Cidade']; ?>"
                            class="form-control" required id="txtprod">
                    </div>
                    <div class="form-group">
                        <label for="txtprod">CEP</label>
                        <input type="text" name="txtprod" value="<?php echo $exibe['no_Cep']; ?>"
                            class="form-control" required id="txtprod">
                    </div>

                    <button type="submit" class="btn btn-lg btn-default"> Alterar</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>
