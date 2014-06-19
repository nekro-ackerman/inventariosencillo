<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Editar Producto</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<!-- <link rel="stylesheet" href="css/bootstrap-theme.css"> -->
 	<script src="js/jquery-2.1.1.js"></script>
 	<script src="js/bootstrap.js"></script>
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
      <a class="navbar-brand" href="index.php">Inventario </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="add.php"><span class="glyphicon glyphicon-list-alt"> </span> Agregar</a></li>
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
  <li class="active">Editar Producto del Inventario</li>
</ol>
<body>
	<?php
	//include database connection
	include 'libs/db_connect.php';

	$action = isset( $_POST[ 'action' ] ) ? $_POST[ 'action' ] : "";
	if ( $action == "update")
	{
		try
		{
			//write query
			//in this case, it seemed like we have so many fields to pass and
			//its kinda better if we'll label them and not use question marks
			//like what we used here
			$query = "UPDATE productos SET nombre = :nombre, proveedor = :proveedor, unidad = :unidad, existencias = :existencias, descripcion = :descripcion
			WHERE idproducto = :idproducto";
			//prepare query for execution
			$stmt = $con -> prepare ($query);
			//bind parameters
			//$stmt -> bindParam( ':idproducto',$_POST[ 'idproducto' ] );
			$stmt -> bindParam(':nombre',$_POST[ 'nombre' ]);
			$stmt -> bindParam(':proveedor',$_POST[ 'proveedor' ]);
			$stmt -> bindParam(':unidad',$_POST[ 'unidad' ]);
			$stmt -> bindParam(':existencias',$_POST[ 'existencias' ]);
			$stmt -> bindParam(':descripcion',$_POST[ 'descripcion' ]);
			$stmt -> bindParam(':idproducto',$_POST[ 'idproducto' ]);
			//Execute query
			if($stmt -> execute())
			{
				echo "<div class='alert alert-success' >El registro ha sido actualizado</div>";
			}
			else
			{
				die("<div class='alert alert-warning' >Ha Ocurrido un error intentelo de nuevo mas tarde</div>");
			}
		}
		catch (PDOException $exception)
		{
			echo "Error" . $exception ->getMessage();
		}
	}

	try {
		$query = "SELECT idproducto,nombre,proveedor,unidad,existencias,descripcion FROM productos WHERE idproducto = ?";
		$stmt = $con -> prepare ( $query );
		//this is the first question mark
		$stmt -> bindParam (1, $_REQUEST [ 'idproducto' ] );
		//execute our query
		$stmt -> execute();
		//store retreieved row to a variable
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);

		//values to fill up our form
		$idproducto  = $row[ 'idproducto' ];
		$nombre      = $row[ 'nombre' ];
		$proveedor   = $row[ 'proveedor' ];
		$unidad      = $row[ 'unidad' ];
		$existencias = $row[ 'existencias' ];
		$descripcion = $row[ 'descripcion' ];

	} catch (PDOException $exception) {
		//to handle error
		echo "Error: " . $exception -> getMessage();
	}
	?>
	<!-- We have out html form here where new user information will be entered-->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="well">
					<legend class="text-center">Editar un Producto del Inventario</legend>
					<form action="#" method="post" role="form" class="form">
						<div class="form-group">
							<label>Id del Producto</label>
							<input class="form-control" type="text" name="idproducto" readonly value="<?php echo $idproducto;?>" />
						</div>
							<div class="form-group">
								<label>Nombre del Producto</label>
								<input class="form-control" type="text" name="nombre" required value="<?php echo $nombre;?>"/>
							</div>
							<div class="form-group">
								<label>Proveedor</label>
								<input class="form-control" type="text" name="proveedor" required value="<?php echo $proveedor;?>"/>
							</div>
							<div class="form-group">
								<label>Unidad</label>
								<input class="form-control" type="text" name="unidad" required value="<?php echo $unidad;?>"/>
							</div>
							<div class="form-group">
								<label>Existencias </label>
								<input class="form-control" type="number" min="1" max="" required name="existencias" value="<?php echo $existencias;?>"/>
							</div>
							<div class="form-group">
								<label>Descripcion</label>
								<input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion;?>"/>
							</div>
						<!-- so that we could identify what record is to be updated -->
						<input type="hidden" name ="idproducto" value='<?php echo $idproducto?>'/>
						<!-- we well set the action to edit -->
						<input type="hidden" name="action" value="update"/>
						<button type="submit" class="btn btn-primary" value="Edit">Actualizar</button>
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