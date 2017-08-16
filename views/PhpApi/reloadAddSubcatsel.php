<?php
	if(isset($_REQUEST['idcat'])){
		include "conexion.php";
		$valor=$_REQUEST['idcat'];
	?>
	<select class="form-control" name="SubcategoriaEquipo"  id='equipoSubCategoria' >
		<option value=0 selected disabled hidden>Subcategoria</option>
	<?php
		$buscarSubCategorias='SELECT IdSubcategoria,NombreSubcategoria,Status FROM ManEquipoSubcategorias WHERE IdCategoria='.$valor;
		if($execute=sqlsrv_query($conn,$buscarSubCategorias)){
			while($datasc=sqlsrv_fetch_array($execute))
			{
				?>
				<option value="<?php echo $datasc['IdSubcategoria'];?>"><?php echo $datasc['NombreSubcategoria'];?></option>		
				<?php
			}		
			?>
		</select>
		<?php
		}else{
			echo "No se realizo la consulta";
		}
	}
?>