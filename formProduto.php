<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>GRUTA.SB - Logon de usuário</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="jquery.mask.js"></script>

	<script>
		$(document).ready(function() {

			$('#txtpreco').mask('000.000.000.000.000,00', {
				reverse: true
			});
		});
	</script>

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

	$consultaM = $cn->query("select * from tbl_marca");
	$consultaCat = $cn->query("select * from tbl_categoria");

	?>


	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-4 col-sm-offset-4">

				<h2>Inclusão de Peças</h2>

				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">


					<div class="form-group">
						<label for="sltgen">Categoria</label>
						<select class="form-control" name="sltcat">
							<option value="">Selecione</option>
							<?php while ($ListaCat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?php echo $ListaCat['cd_categoria']; ?>"><?php echo $ListaCat['ds_categoria']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">

						<label for="txtnome">Nome da Peça</label>
						<input name="txtnome" type="text" class="form-control" required id="txtnome">
					</div>

					<div class="form-group">
						<label for="txtmarca">Marca</label>
						<select class="form-control" name="txtmarca">
							<option value="">Selecione</option>
							<?php while ($ListaM = $consultaM->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?php echo $ListaM['cd_marca']; ?>"><?php echo $ListaM['nm_marca']; ?></option>
							<?php } ?>
						</select>
					</div>


					<div class="form-group">

						<label for="txtpreco">Preço</label>

						<input type="text" class="form-control" name="txtpreco" required id="txtpreco">

					</div>


					<div class="form-group">

						<label for="txtqtde">Quantidade em Estoque</label>

						<input type="number" class="form-control" name="txtqtde" required id="txtqtde">

					</div>


					<div class="form-group">

						<label for="txtfoto1">Foto Principal</label>

						<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

					</div>

					<div class="form-group">

						<label for="txtDesc">Descrição</label>

						<input type="text" class="form-control" name="txtDesc" required id="txtDesc">

					</div>

					<div class="form-group">

						<label for="sltlanc">Lançamento?</label>

						<select class="form-control" name="sltlanc">
							<option value="">Selecione</option>
							<option value="S">Sim</option>
							<option value="N">Não</option>
						</select>


					</div>


					<button type="submit" class="btn btn-lg btn-primary">

						<span> Cadastrar </span>

					</button>

				</form>

			</div>
		</div>
	</div>

	<?php include 'footer.php' ?>




</body>

</html>
