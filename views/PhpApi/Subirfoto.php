<?php
			//Direccion donde se guardara la imagen
			$imagendir='/xampp/htdocs/Alcatraz/Imagenes/';
			//$imagenup=$imagendir.basename($_FILES['archivo']['name']);
			
			//la direccion con el nombre de la imagen concatenada, puede cambiarse el nombre de la imagen por alguna que siga alguna nomenclatura.
			$imagenup=$imagendir."ImagenEjem3.jpg";

			if(move_uploaded_file($_FILES['foto']['tmp_name'],$imagenup)){
				$nomFoto=basename($_FILES['foto']['name']);
				echo "foto subida con exito ";
			}
			else{
				$numero=rand(1,5);
				$nomFoto="NoUserPhoto$numero.png";
				echo "error al subir la foto";
			}

?>