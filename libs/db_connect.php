<!--
Conexion a Base de Datos con PDO
Author: Diaz Ruiz Leobardo Adrian
Email : leobardo.adriandr@gmail.com
Fecha : Lunes 2 de Junio 2014 11:45 pm.
 -->
<?php
$host     = "localhost";
$db_name  = "inventariococina";
$username = "root";
$password = "";

try{
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}

catch(PDOException $exception){
	echo "Error de Conexion: " . $exception -> getMessage();
}
?>