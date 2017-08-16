<?php
			$servername = 'localhost';
			$conectioninfo = array("Database"=>"sime_db","UID"=>"sa","PWD"=>"asdf123","CharacterSet"=>"UTF-8");
			$conn = sqlsrv_connect($servername,$conectioninfo);
			if($conn){
			}
			else{
				"Fallo en la conexion";
				 die(print_r(sqlsrv_errors(),true));
				
			}
?>