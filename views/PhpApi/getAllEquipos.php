<?php
include "conexion.php";
$nomsucursal=$_REQUEST['nomSucursal'];
$idcat=$_REQUEST['idcategoria'];
$idsubcat=$_REQUEST['idsubcategoria'];
if($idsubcat!=0){
	$showData = "SELECT * FROM vw_stock WHERE sucursal='$nomsucursal' AND id_categoria=$idcat AND id_subcategoria=$idsubcat";
}
else{
	$showData = "SELECT * FROM vw_stock WHERE sucursal='$nomsucursal' AND id_categoria=$idcat";
}
$data=array();
$result = sqlsrv_query($conn, $showData);
	while($row = sqlsrv_fetch_array($result)){
		$data[] = $row;
	} 
	echo  json_encode($data);
sqlsrv_close($conn);
?>