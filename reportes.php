<!--
Agregar un Nuevo registro a la base de datos
Author: Diaz Ruiz Leobardo Adrian
Email : leobardo.adriandr@gmail.com
Fecha : Lunes 2 de Junio 2014 11:45 pm.
-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Agregar un Nuevo Producto</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!--<link rel="stylesheet" href="css/bootstrap-theme.css">-->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<header>
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Inventario</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="add.php"><span class="glyphicon glyphicon-list-alt"> </span> Agregar</a></li>
        <li class="active"><a href="reportes.php"><span class="glyphicon glyphicon-th-list"> </span> Reportes</a></li>
        <li><a href="uso_inventario.php"><span class="glyphicon glyphicon-pencil"> </span> Uso Inventario</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Bienvenido</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<ol class="breadcrumb">
  <li><a href="index.php">Inicio</a></li>
  <li class="active">Reportes de Inventario</li>
</ol>
<body>
	<div class="container">
    <div class="row">
        <h4>
            Reportes
        </h4>
        </div>
       <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">
                        Inventario Cocina</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">Descripcion del Reporte
                        <strong>Reporte General de Inventario Actual</strong></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-primary" href="export_excel_gral.php">Descargar</a>
                </div>
            </div>
        </div><!--
        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="text-center">
                        Reporte 2</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>$10 / month</strong></p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Personal use</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Unlimited projects</li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>27/7 support</li>
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-warning" href="http://www.jquery2dotnet.com">BUY
                        NOW!</a>
                </div>
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center">Inventario Cocina</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">Descripcion del Reporte
                        <strong>Reporte de productos menores a 3 existencias.</strong></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-default" href="export_excel.php">Descargar</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<div class="well">
	<footer>
		<p class="text-center">Casa Domingo, Hotel Petit, <?php echo date('d M Y'); ?> Derechos Reservados</p>
	</footer>
</div>
</html>