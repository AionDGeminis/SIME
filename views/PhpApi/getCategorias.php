<?php
include "conexion.php";
$showData = "SELECT categoriaID,nombre FROM categoria";
$data=array();
$result = sqlsrv_query($conn, $showData);
	while($row = sqlsrv_fetch_array($result)){
		$data[] = $row;
	} 
	echo  json_encode($data);
sqlsrv_close($conn);
?>