 <?php
include "conexion.php";
$nombre = $_REQUEST['archivo'];
$showData = "INSERT INTO equipo(nombreEquipo) VALUES('$nombre')";
if(sqlsrv_query($conn,$showData)){
	echo "Insertado";
}else{
	echo "testSaveE";
}
sqlsrv_close($conn);
?>