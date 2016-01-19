<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<!--  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>-->
<link href="/css/styles.css" rel="stylesheet"/>

<?php if (isset($title)): ?>
  <title>$ Finance: <?= htmlspecialchars($title); ?></title>
<?php else: ?>
  <title>$ Finance</title>
<?php endif ?>

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/js/scripts.js"></script> 

</head>

<body>

<div class="container">

  <div id="top">                
    <div class="col-xs-12 col-md-8 pull-right">
      <!-- Inicio barra de navegacion -->
      <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">                          
          <ul class="nav navbar-nav navbar-right">            
            <li><a href="consulta.php">Consultar</a></li>
            <li><a href="vender.php">Vender</a></li>
            <li><a href="comprar.php">Comprar</a></li>
            <li><a href="historial.php">Historial</a></li>
            <li class="dropdown">                              
              <?php if (isset($nombreUsuario)): ?>                                        
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?= htmlspecialchars($nombreUsuario) ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Log out</a></li>
                  <li><a href="cambiar_pass.php">Cambiar password</a></li>
                </ul>
              <?php else: ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Ingreso <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Log in</a></li>
                  <li><a href="register.php">Registro</a></li>
                </ul>
              <?php endif ?>                                  

            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>  
      <!-- Termino barra de navegacion -->
    </div> 
    <div class="col-xs-12 col-md-4 pull-left">
      <a href="/"><img class="logo img-responsive" alt="C$50 Finance" src="/img/l.png"/></a>                  
    </div>               
  </div>

  <div id="middle" class="col-xs-12">

