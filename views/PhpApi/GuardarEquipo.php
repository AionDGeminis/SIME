<?php
include("conexion.php");
date_default_timezone_set('America/Los_Angeles');
if(isset($_REQUEST['nombre']) && isset($_REQUEST['modelo']) && isset($_REQUEST['Marca']) && isset($_REQUEST['equipocategoria']) && isset($_REQUEST['equiposubcategoria']) && isset($_REQUEST['Seriali']) && isset($_REQUEST['noSerie']) && isset($_REQUEST['AreaDescripcion']))
{
	$nomFoto;
	$nombre = $_REQUEST['nombre'];
	$modelo = $_REQUEST['modelo'];

	$equipocategoria = $_REQUEST['equipocategoria'];
	$quipoSubcategoria = $_REQUEST['equiposubcategoria'];
	$serializado = $_REQUEST['Seriali'];
	$numeroSerie = $_REQUEST['noSerie'];
	$descripcion = $_REQUEST['AreaDescripcion'];
	$Marca=$_REQUEST['Marca'];

	$fecha = date('Y-m-d H:i:s.v');
	$serializa;
	if($serializado==1){
		$serializa=true;
	}else{
		$serializa=false;
	}
	
	 $Query="INSERT INTO 
			equipo (nombreEquipo,descripcion,fechaIngreso,id_categoria,id_subcategoria,activo,marcaEquipo,modeloEquipo,serializado,numeroSerie) 
			VALUES 
				   ('$nombre','$descripcion','$fecha',$equipocategoria,$quipoSubcategoria,'true','$Marca','$modelo','$serializa','$numeroSerie')";
	if($executeQuery=sqlsrv_query($conn,$Query))
	{
		//Direccion donde se guardara la imagen
			$imagendir='../../img/Equipos/';
			$imgDirFoInven = "../img/Equipos/";
			//obtenemos el ultimo id generado en ManEquipos
			$queryLastId="SELECT TOP 1 equipoID FROM equipo ORDER BY equipoID DESC;";
			$execute=sqlsrv_query($conn,$queryLastId);
			if($dato=sqlsrv_fetch_array($execute))
			{
				$lastId=$dato['equipoID'];
					//la direccion con el nombre de la imagen concatenada, puede cambiarse el nombre de la imagen por alguna que siga alguna nomenclatura.
				
				$imagenup="";
				$imgUp2="";
				if($modelo=="N/A"){
					$modelo="NA";
				}
				
				if(isset($_FILES['archivo']['name']))
				{
					$imagenup=$imagendir."Img_".$modelo.$lastId.".jpg";
					if(move_uploaded_file($_FILES['archivo']['tmp_name'],$imagenup))
					{
						$imgUp2=$imgDirFoInven."Img_".$modelo.$lastId.".jpg";
						$QueryFoto="INSERT INTO fotos(id_equipo,url,activo) VALUES($lastId,'$imgUp2','true')";
						if(sqlsrv_query($conn,$QueryFoto))
						{
							echo "Todo registrado";
						}
						else
						{
							echo "Error al registrar imagen en BD";
						}
					}
				}
				else
				{
					$imgUp2=$imgDirFoInven."non_photo.jpg";
					$QueryFoto="INSERT INTO fotos(id_equipo,url,activo) VALUES($lastId,'$imgUp2','true')";
					if(sqlsrv_query($conn,$QueryFoto)){
						echo "registrado";
					}
					else
					{
							echo "Error al registrar imagen en BD!";
					}
				}
			}
			else{}
	}
	else
	{
		echo "hubo un error al registrar el equipo";
		if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
		}
	}			
}

else{
	echo "hubo un error en los datos enviados";
}
?>