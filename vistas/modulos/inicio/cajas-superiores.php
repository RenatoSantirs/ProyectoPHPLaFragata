<?php

$item = null;
$valor = null;
$ordenar = "id";

$controladorOrdenes = new ControladorOrdenes();
$ordenes = $controladorOrdenes->ctrSumaTotalOrdenes();

$total = isset($ordenes['total']) ? $ordenes['total'] : 0;

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);
$totalEmpleados = count($empleados);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $ordenar);
$totalProductos = count($productos);

?>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>S/ <?php echo number_format($total, 2); ?></h3>
            <p>Ordenes</p>
        </div>
        <div class="icon">
            <i class="ion ion-clipboard"></i>
        </div>
        <a href="ordenes" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">

        <div class="inner">

            <h3> <?php echo number_format($totalCategorias); ?></h3>

            <p>Categorias</p>
        </div>

        <div class="icon">

            <i class="ion ion-folder"></i>

        </div>

        <a href="categorias" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>

    </div>

</div>


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">

        <div class="inner">

            <h3> <?php echo number_format($totalEmpleados); ?></h3>

            <p>Empleados</p>
        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="empleados" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>

    </div>
</div>


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3> <?php echo number_format($totalProductos); ?></h3>

            <p>Productos</p>
        </div>
        <div class="icon">
            <i class="ion ion-ios-box"></i>
        </div>
        <a href="productos" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>