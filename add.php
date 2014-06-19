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
        <li class="active"><a href="add.php"><span class="glyphicon glyphicon-list-alt"> </span> Agregar</a></li>
        <li><a href="reportes.php"><span class="glyphicon glyphicon-th-list"> </span> Reportes</a></li>
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
  <li class="active">Agregar Producto al Inventario</li>
</ol>
<body>
	<?php
	$action = isset( $_POST [ 'action' ]) ? $_POST [ 'action'] : "" ;
	if( $action == 'create' )
	{
		//include database connection
		include 'libs/db_connect.php';
		try
		{
			//write query
			$query = "INSERT INTO productos SET nombre = ?, proveedor = ?, unidad = ?, existencias = ?, descripcion = ?";
			//prepare query for execution
			$stmt = $con -> prepare( $query );
			//bind parameters
			//this is the first question mark
			//$stmt -> bindParam(1,$_POST['idproducto']);
			//this is the second question mark
			$stmt -> bindParam(1,$_POST['nombre']);
			//this is the third question mark
			$stmt -> bindParam(2,$_POST['proveedor']);
			//this is the fourth question mark
			$stmt -> bindParam(3,$_POST['unidad']);
			//this is the fifth question mark
			$stmt -> bindParam(4,$_POST['existencias']);
			//this is the sixth question mark
			$stmt -> bindParam(5,$_POST['descripcion']);
			//Execute the query
			if( $stmt -> execute() )
			{
				echo "<div class='alert alert-success' >Registro guardado</div>";
			}
			else
			{
				die ( "<div class='alert alert-success' >No pudo guardarse el registro intentelo nuevamente.</div>" );
			}
		}//end try
		catch (PDOException $exception)
		{
			echo "Error: " . $exception -> getMessage();
		}//end catch
	}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="well">
					<legend class="text-center">Agregar un Nuevo Producto al Inventario</legend>
					<form action = "#" method = "post" role="form" class="form">
						<div class="form-group">
							<label >Nombre</label>
							<input class="form-control" type = "text"  required name="nombre"/>
						</div>
						<div class="form-group">
							<label>Proveedor</label>
							<input class="form-control" type="text" required name="proveedor">
						</div>
						<div class="form-group">
							<label>Unidad</label>
							<input class="form-control" type="text" required name="unidad">
						</div>
						<div class="form-group">
							<label>Existencias</label>
							<input class="form-control" type="number" min="1" max="" required name="existencias">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input class="form-control" type="text" name="descripcion">
						</div>
						<input type="hidden" name="action" value="create"/>
						<button type="submit" class="btn btn-primary">Insertar</button>
						<a href="index.php" ><span class="btn btn-warning">Cancelar</span></a>
					</form>
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