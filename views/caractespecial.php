<?php
$ejem = "Esto es codigo php";
?>
<div  id="wrapper" class="wrapper wrapper-content" ng-controller="EquiposCtrl">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
               <h2>Caracteristicas especiales</h2>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <select class="form-control" ng-model="seloadAction" ng-change="loadActioncarEsp();">
                        <option value="">Escoja una accion</option>
                        <option value="1">Control de mantenimiento</option>
                        <option value="2">Control de inventario</option>
                    </select>
                </div>
				<?php echo $ejem;?>
            </div>
            <br />
           
            <div class="row">
                <div class="col-lg-12 col-sm-12" ui-view="loadActionCarEsp"></div>
            </div>
        </div>
</div>