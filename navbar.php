<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">GRUTA.SB</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="Lançamento.php">NOVIDADES</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PEÇAS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=shape">Shape</a></li>
            <li><a href="categoria.php?cat=truck">Truck</a></li>
            <li><a href="categoria.php?cat=roda">Roda</a></li>
            <li><a href="categoria.php?cat=lixa">Lixa</a></li>
            <li><a href="categoria.php?cat=rolamento">Rolamento</a></li>
            <li><a href="categoria.php?cat=parafuso">Parafuso de Base</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <button type="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search">
        </button>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">CONTATO</a></li>

        <?php  if (empty ($_SESSION['ID'])) { ?>
        </li><a href="login.php"><span class="glyphicon glyphicon-log-in" id="logon"> LOGIN</a></li>
        <?php }  else { 
          $consulta_usuario = $cn->query("select nm_Usuario from tbl_Usuario where cd_Usuario = '$_SESSION[ID]'");
          $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
          ?> 
          </li><a href="#"><span class="glyphicon glyphicon-user" id="user">   <?php echo $exibe_usuario['nm_Usuario'] ?></a></li>
          </li><a href="sair.php"><span class="glyphicon glyphicon" id="logon">   SAIR</a></li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>