<!DOCTYPE html>
<html>
<head>
<title>GRUTA.SB - Área Administrativa</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
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

    .venda {
        text-align: center; 
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
<div class="venda">
    <h1>Consulta de Vendas</h1>
    <br/>
    <h2>Escolha uma Data para Consultar</h2>
    <br/>
    <form action="venda2.php" method="get">
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required>
        <br/><br/><br/>
        <input type="submit" value="Pesquisar Data">
    </form>
</div> <!-- Feche a div corretamente -->
<?php include 'footer.php' ?>
</body>
</html>
