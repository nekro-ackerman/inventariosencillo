<?php
include("libs/db_connect.php");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=ReporteGeneral.xls");
//header("Content-type: application/vnd.ms-word");
//header("Content-Disposition: attachment;Filename=document_name.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<table border=1>";
echo "<th colspan='5' style='background-color:#666666; color:#FFFFFF;'>Inventario Detallado</th>";
echo"<tr><th>Id</th><th>Nombre</th><th>Proveedor</th><th>Cantidad</th><th>Existencias</th></tr>";


// We Will prepare SQL Query
$STM = $con->prepare("SELECT
	idproducto,
	nombre,
	proveedor,
	unidad,
	existencias,descripcion
	FROM
	productos");
// For Executing prepared statement we will use below function
    $STM->execute();
//we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
		 echo"<tr>";
		echo"<td>".$row[0]."</td>";
		
		echo "<td><span class='label label-important'>".$row[1]."</span></td>"; 
		
		echo "<td><span class='label label-warning'>".$row[2]."</span></td>"; 
		
		echo "<td><span class='label label-success'>".$row[3]."</span></td>"; 
		echo "<td><span class='label label-success'>".$row[4]."</span></td>"; 
		
        echo"</tr>";

        }

echo "</table>";
echo "</body>";
echo "</html>";
?>