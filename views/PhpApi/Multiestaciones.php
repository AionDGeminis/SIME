 
   <div ng-controller="equiposCtrl" class='animated fadeInRight'>
    <div class="col-lg-4 col-sm-6"  ng-repeat="equipo in equiposInfo">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation">
                    <img src="img/Equipos/eq1.jpg" style="width:100%;height:230px;">
                </div>
                <div class="product-desc">
                    <small class="text-muted">Categoria</small>
                    <a href="#" class="product-name"> {{equipo["Nombre"]}}</a>

                    <div class="small m-t-xs">
                        <p>
                            Marca: <strong>{{equipo["Marca"]}}</strong><br /><br />
                           {{equipo["Descripcion"]}}
                        </p>
                    </div>
                    <div class="m-t text-righ">
                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
