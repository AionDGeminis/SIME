<?php
if(isset($_REQUEST['IdCategoria']) && isset($_REQUEST['vista'])){
	$idCategoria=$_REQUEST['IdCategoria'];
	$vista=$_REQUEST['vista'];
	include "conexion.php";
	$SearchSubCategorias = "SELECT IdSubcategoria, NombreSubcategoria FROM ManEquipoSubcategorias WHERE IdCategoria = $idCategoria";
	
	?>
	<div class='animated fadeInRight' id='SelectedSubcategoriaItem'>
	<label class="col-sm-3 col-lg-3 control-label" style="text-align:right;line-height:30px;margin-right:5px;">Subcategoria</label>
		<div class="col-sm-3" style="text-align:right;">
			<select id='selectedSubcategoria' class="form-control"  name="subcategoria" ng-controller="SucursalesCtrl" onchange="showEquipment2(this.value,'CardioContent')" style='display:block;'>
			
	<?php
	$execute=sqlsrv_query($conn,$SearchSubCategorias);
	while($data=sqlsrv_fetch_array($execute)){
		?>
			<option value="<?php echo $data['IdSubcategoria'];?>"><?php echo $data['NombreSubcategoria'];?></option>
	<?php	
	}	
	?>
	</select>
		</div>
	</div>
	<?php
}
else{
	echo "Ningun valor enviado";
}

?>
<script type='text/javascript'>
	var idsubcat = document.getElementById("selectedSubcategoria").value;
	var sucursal = document.getElementById("selectedSucursal").value
	$.post('views/CardioContent.php',{idsubcat:idsubcat,suc:sucursal}, function(data){
			$('#reloadInven').html(data);
			});
	
	function showEquipment2(idsubcat,vista){
		var sucursal = document.getElementById("selectedSucursal").value;
		$.post('views/'+vista+'.php',{idsubcat:idsubcat,suc:sucursal}, function(data){
			$('#reloadInven').html(data);
			});
	
	}
</script>