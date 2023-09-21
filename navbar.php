<head>
  <style type="text/css">
    span {
      font-family: helvetica;
    }

    .navbar {
      margin-bottom: 0;
      padding: 1rem;
      border-radius: 0;
    }
  </style>
</head>
<?php include 'conexao.php' ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">GRUTA.SB</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="Lançamento.php">NOVIDADES</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PEÇAS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=shape">Shape</a></li>
            <li><a href="categoria.php?cat=truck">Truck</a></li>
            <li><a href="categoria.php?cat=lixa">Lixa</a></li>
            <li><a href="categoria.php?cat=roda">Roda</a></li>
            <li><a href="categoria.php?cat=Rolamento">Rolamento</a></li>
            <li><a href="categoria.php?cat=Parafuso">Parafuso de Base</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar" name="txtbuscar">
        </div>
        <button type="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search">
        </button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">CONTATO</a></li>
        <?php if (empty($_SESSION['ID'])) { ?>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</a></li>
          <?php } else {

          if ($_SESSION['Status'] == 0) {
            $consulta_usuario = $cn->query("select nm_Usuario from tbl_Usuario where cd_Usuario = '$_SESSION[ID]'");
            $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
          ?>
            <li><a href="login.php"><span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['nm_Usuario']; ?> </a></li>
            <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> SAIR <span> </a></li>
          <?php } else { ?>
            <li><a href="adm.php"><button class="btn-sm btn-warning" id="adm">Administrador</button></a></li>
            <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> SAIR <span> </a></li>
          <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>