<?php
//include databaase connection
include 'libs/db_connect.php';

try{
	//delete query
	$query = "DELETE FROM productos WHERE idproducto = ?";
	$stmt = $con -> prepare ($query);
	$stmt -> bindParam(1, $_GET [ 'idproducto' ] );

	if($result = $stmt -> execute() ){
		//redirect to index page
		header( 'Location: index.php?action=deleted' );
	}
	else{
		die( 'Ocurrio algo inesperado al eliminar el registro.' );
	}
}
catch(PDOException $exception)
	{
		echo "Error: " .$exception -> getMessage();
	}

?>