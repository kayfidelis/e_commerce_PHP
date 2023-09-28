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
        /* Máscara para o preço */
        $(document).ready(function () {
            $('#preco').mask('000.000.000.000.000,00', { reverse: true });
        });
    </script>
     <style type="text/css">
        #logon {
            margin-top: 1.1em;
        }

        #adm {
            margin-top: -0.4rem;
        }

        .navbar{
            margin-bottom: 0;
            padding: 1rem;
            border-radius: 0; 
        }
    </style>
</head>
<body>
<?php
session_start();

if (empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
    header('location:index.php');
}

$id = $_GET['id'];
$id2 = $_GET['id2'];

include 'conexao.php';
include 'navbar.php';
include 'cabecalho.html';

$consulta = $cn->query("SELECT * FROM tbl_produto WHERE cd_produto='$id'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$consultaCat = $cn->query("SELECT cd_categoria, ds_categoria FROM tbl_categoria WHERE cd_categoria='$id2' UNION SELECT cd_categoria, ds_categoria FROM tbl_categoria WHERE cd_categoria != '$id2'");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h2>Alteração de produto</h2>
            <form method="post" action="alterar.php?cd_altera=<?php echo $id; ?>" name="incluiProd"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="sltcat">Categoria</label>
                    <select class="form-control" name="sltcat">
                        <?php while ($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $exibecat['cd_categoria']; ?>"
                                <?php echo ($exibecat['cd_categoria'] == $id2) ? 'selected' : ''; ?>>
                                <?php echo $exibecat['ds_categoria']; ?></option>;
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtprod">Nome</label>
                    <input type="text" name="txtprod" value="<?php echo $exibe['nm_produto']; ?>"
                           class="form-control" required id="txtprod">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" required name="txtpreco"
                           value="<?php echo $exibe['vl_preco']; ?>" id="preco">
                </div>
                <div class="form-group">
                    <label for="txtqtde">Quantidade em Estoque</label>
                    <input type="number" class="form-control" name="txtqtde"
                           value="<?php echo $exibe['qt_estoque']; ?>" required id="txtqtde">
                </div>
                <div class="form-group">
                    <label for="txtdesc">Descrição</label>
                    <textarea rows="5" class="form-control" name="txtdesc"><?php echo $exibe['descrição']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="txtfoto1">Imagem</label>
                    <input type="file" accept="image/*" class="form-control" name="txtfoto1" id="foto1">
                </div>
                <div class="form-group">
                    <img src="imagens/<?php echo $exibe['img_produto']; ?>" width="100px">
                </div>
                <div class="form-group">
                    <label for="sltlanc">Lançamento?</label>
                    <select class="form-control" name="sltlanc">
                        <!-- se o sg_lançamento == S este valor estará selecionado senão vazio -->
                        <option value="S" <?php echo ($exibe['sg_lançamento'] == 'S') ? 'selected' : ''; ?>>Sim
                        </option>
                        <option value="N" <?php echo ($exibe['sg_lançamento'] == 'N') ? 'selected' : ''; ?>>Não
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-default"> Alterar</button>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
</body>
</html>
