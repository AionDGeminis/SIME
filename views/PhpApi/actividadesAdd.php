<?php
include("conexion.php");
date_default_timezone_set('America/Los_Angeles');
if(isset($_REQUEST['checkid']) && isset($_REQUEST['tareaid']))
{
	$chkid=$_REQUEST['checkid'];
	$tarid = $_REQUEST['tareaid'];

	$fecha = date('Y-m-d H:i:s.v');
	
	 $Query="INSERT INTO actividades(idChecklist,idTarea,activo) VALUES($chkid,$tarid,'true')";
		if($executeQuery=sqlsrv_query($conn,$Query))
		{
				echo "Activdad registrada";
		}
		else{
			echo "Error al registrar checklist";
	}
}
else{
	echo "No se recibieron datos";
}
?>