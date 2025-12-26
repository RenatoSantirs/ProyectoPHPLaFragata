<?php

$item = null;
$valor = null;

$ordenes = ControladorOrdenes::ctrMostrarOrdenes($item, $valor);
$empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

$arrayEmpleados = array();
$arrayListaEmpleados = array();

foreach ($ordenes as $key => $valueOrdenes) {
    
    foreach ($empleados as $key => $valueEmpleados) {
        
        if ($valueEmpleados["id"] == $valueOrdenes["id_empleado"]) {

            #Capturamos los empleados en un array
            array_push($arrayEmpleados, $valueEmpleados["nombre"]);

            #Capturamos nombres y valores totales en un array
            $arrayListaEmpleados = array($valueEmpleados["nombre"] => $valueOrdenes["total"]);

            #Sumamos los netos de cada empleado

            foreach ($arrayListaEmpleados as $key => $value) {
            
            $sumaTotalEmpleados[$key] += $value;
            
            }

        }
 

    }
}

#evitamos repetir nombres
$noRepetirNombres = array_unique($arrayEmpleados);

?>

<!--=============================================
EMPLEADOS
=============================================-->

<div class="box box-primary">

    <div class="box-header with-border">

        <h3 class="box-tittle">Empleados</h3>

    </div>

    <div class="box-body">

        <div class="chart-responsive">

            <div class="chart" id="bar-chart2" style="height: 300px;">



            </div>

        </div>

    </div>

</div>

<script>

    //BAR CHART
    var bar = new Morris.Bar({
    element: 'bar-chart2',
    resize: true,
    data: [
    <?php

    foreach ($noRepetirNombres as $value) {
        
        echo "{y: '".$value."', a: '".$sumaTotalEmpleados[$value]."'},";

    }
    

    ?>
    
    
    ],
    barColors: ['#af6'],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['ordenes'],
    preUnits: 'S/ ',
    hideHover: 'auto'
    });

</script>