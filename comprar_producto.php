<?php
//include databaase connection
include 'libs/db_connect.php';

try{
	//delete query
	$query = "UPDATE productos SET existencias=existencias+1 WHERE idproducto = ?";
	$stmt = $con -> prepare ($query);
	$stmt -> bindParam(1, $_GET [ 'idproducto' ] );

	if($result = $stmt -> execute() ){
		//redirect to index page
		header( 'Location: uso_inventario.php?action=comprar_producto' );
	}
	else{
		die( 'Ocurrio algo inesperado al tomar el registro.' );
	}
}
catch(PDOException $exception)
	{
		echo "Error: " .$exception -> getMessage();
	}

?>