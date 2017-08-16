<?php
include("conexion.php");
date_default_timezone_set('America/Los_Angeles');
if(isset($_REQUEST['idEquipo']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['periodoServicio']))
{
	$idEquipo=$_REQUEST['idEquipo'];
	$descripcion = $_REQUEST['descripcion'];
	$periodo=$_REQUEST['periodoServicio'];

	$fecha = date('Y-m-d H:i:s.v');
	
	 $Query="INSERT INTO checklist(idEquipo,descripcion,periodoServicio) VALUES($idEquipo,'$descripcion',$periodo)";
		if($executeQuery=sqlsrv_query($conn,$Query))
		{
			$queryLastId="SELECT TOP 1 checkID FROM checklist ORDER BY checkID DESC;";
			$execute=sqlsrv_query($conn,$queryLastId);
			if($dato=sqlsrv_fetch_array($execute))
			{
				$lastId=$dato['checkID'];
				echo $lastId;
			}
			
		}
		else{
			"Error al registrar checklist";
	}
}
?>