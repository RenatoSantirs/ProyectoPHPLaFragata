<?php

$item = null;
$valor = null;
$ordenar = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $ordenar);

?>

<!-- PRODUCT LIST -->
<div class="box box-primary">

    <div class="box-header with-border">

        <h3 class="box-title">Recently Added Products</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <ul class="products-list product-list-in-box">

        <?php

        for ($i=0; $i < 10; $i++) { 
            
            
        

            echo'<li class="item">

                <div class="product-img">

                    <img src="'.$productos[$i]["imagen"].'" alt="Product Image">

                </div>

                <div class="product-info">

                    <a href="" class="product-title">
                    
                    '.$productos[$i]["descripcion"].'

                        <span class="label label-warning pull-right">S/ '.$productos[$i]["precio_compra"].'</span>
                    
                    </a>

                </div>

            </li>';

        }

        ?>

        </ul>
        
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">

        <a href="productos" class="uppercase">Ver Todos Los Productos</a>

    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->