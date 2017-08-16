<?php
include "conexion.php";
$id=$_REQUEST['idsubcat'];
$idSucursal=$_REQUEST['suc'];
$GetCardioEquip = "SELECT IdEquipo,Nombre,Modelo, Marca,Descripcion,qty FROM ManEquipos WHERE IdSubCategoria=$id AND idSucursal=$idSucursal";	
$getCategoria = "SELECT DISTINCT ManEquipoCategorias.Nombre From ManEquipoCategorias INNER JOIN ManEquipoSubcategorias ON ManEquipoCategorias.IdCategoria = ManEquipoSubcategorias.IdCategoria WHERE IdSubcategoria = $id"; 
?>

<div ng-controller="equiposCtrl" class='animated fadeInRight'>
<?php
$exec=sqlsrv_query($conn,$GetCardioEquip);	
$row = sqlsrv_has_rows($exec);

while($data2=sqlsrv_fetch_array($exec)){
	$exec2 = sqlsrv_query($conn,$getCategoria);
	$dataCategoria=sqlsrv_fetch_array($exec2);
	$fotoImg;
	$idEquipo=$data2['IdEquipo'];
	$getfoto = "SELECT Foto FROM ManFotos WHERE IdEquipo=$idEquipo";
	$execute=sqlsrv_query($conn,$getfoto);
	if($foto=sqlsrv_fetch_array($execute)){
		  $fotoImg=$foto['Foto'];
	}
?> 
    <div class="col-lg-4 col-sm-6"  ng-repeat="equipo in equiposInfo">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation">
					
                    <img src="views/<?php echo $fotoImg?>" style="width:100%;height:230px;">
                </div>
                <div class="product-desc">
                    <small class="text-muted"><?php echo $dataCategoria['Nombre']?></small>
					<p>
                    <a href="#" class="product-name"><?php echo $data2['Nombre']?></a>
					</p>
                    <div class="small m-t-xs">
                        <p>
                            Marca: <strong><?php echo $data2['Marca']?></strong>
                        </p>
						 <p>
                            Descripcion: <strong><p rows='3' style='wordwrap:wrap-text'><?php echo $data2['Descripcion']?></p></strong>
                        </p>
						 <p>
                            Cantidad: <strong><?php echo $data2['qty']?></strong>
                        </p>
                    </div>
                    <div class="m-t text-righ">
                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
		
	}
	
	if($row==false){
			echo "No se encontro ningun equipo";
		}
	
	?>
</div>


