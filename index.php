<!--
Index.php
Mostrando la tabla productos usando PDO
Author: Diaz Ruiz Leobardo Adrian
Email : leobardo.adriandr@gmail.com
Fecha : Lunes 2 de Junio 2014 11:45 pm.
 -->
 <!DOCTYPE html>
 <html>
 	<head>
 		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 		<title>Inventario Detallado</title>
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
        <!-- <li><a href="productos_agotados.php"><span class="glyphicon glyphicon-flag"> </span> Productos Agotados</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Bienvenido</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<figure>
	<img src="images/logocd.png" alt="" class="center-block	">
</figure>

<body>
 	<?php
 	//Agregando la conexion a la bd
 	include 'libs/db_connect.php';
 	$action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : "";
 	//if it was redirected from deleted.php
 	if ( $action == 'deleted' ){
 		echo "<div class='alert alert-success' > El registro ha sido eliminado.</div>";
 	}

 	//Select all data
 	$query = "SELECT * FROM productos";
 	$stmt = $con -> prepare( $query );
 	$stmt  -> execute();

 	//this is how to get number of rows returned
 	$num = $stmt -> rowCount();
 	//echo "<a href='add.php'>Agregar Nuevo Producto</a>";

 	if ($num > 0){
 		//check if more than 0 record found

 		echo "<div class='jumbotron'><div class='well'> <table class = 'table table-bordered'> ";//Start table

 		//Creating our table heading
 		echo "<tr>"	;
	 		echo "<th>Id</th>";
	 		echo "<th>Nombre</th>";
	 		echo "<th>Proveedor</th>";
	 		echo "<th>Unidad</th>";
	 		echo "<th>Existencias</th>";
	 		echo "<th>Descripcion</th>";
	 		echo "<th>Acciones</th>";
 		echo "</tr>";
 		//Retrieve our table contents
 		//fetch() is faster than fetchAll()
 		 //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
 		while ( $row = $stmt -> fetch ( PDO::FETCH_ASSOC)){
 			//extract row
 			//this is will make $row['nombre'] to
 			//just $$nombre only
 			extract($row);

 			//creating new table row per record
 			echo "<tr>";
 			echo "<td> {$idproducto}</td>";
 			echo "<td> {$nombre}</td>";
 			echo "<td> {$proveedor}</td>";
 			echo "<td> {$unidad}</td>";
 			echo "<td> {$existencias}</td>";
 			echo "<td> {$descripcion}</td>";
 			echo "<td>";
 				//we will use this links on next part
 				echo "<a href = 'edit.php?idproducto={$idproducto}'><span class='glyphicon-plus btn btn-primary'>Editar</span></a>";
 				echo "<a href ='#' onclick='delete_user( {$idproducto} );'><span class='btn btn-warning glyphicon-minus '> Eliminar</span></a>" ;
 			echo "</td>";
 			echo "</tr>";
 		}
 		//end table
 		echo "</table></div></div>";
 	}

 	//if no records found
 	else {
 		echo "No se han encontrado registros.";
 	}
 	?>
 	<script type='text/javascript'>
 	function delete_user( idproducto ){
 		var answer = confirm ('Esta Seguro que desea eliminar el producto?')
 		if ( answer ){
 			//if user clicked ok, pass id to delete.php and execute the delete query
 			window.location = 'delete.php?idproducto='  + idproducto;
 		}
 	}
 	</script>
 </body>
 <div class="well">
	<footer>
		<p class="text-center">Casa Domingo, Hotel Petit, <?php echo date('d M Y'); ?> Derechos Reservados</p>

	</footer>
</div>
 </html>