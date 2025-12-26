<?php

$item = null;
$valor = null;

$ordenes = ControladorOrdenes::ctrMostrarOrdenes($item, $valor);
$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

$arrayUsuarios = array();
$arrayListaUsuarios = array();

foreach ($ordenes as $key => $valueOrdenes) {
    
    foreach ($usuarios as $key => $valueUsuarios) {
        
        if ($valueUsuarios["id"] == $valueOrdenes["id_usuario"]) {

            #Capturamos los usuarios en un array
            array_push($arrayUsuarios, $valueUsuarios["nombre"]);

            #Capturamos nombres y valores totales en un array
            $arrayListaUsuarios = array($valueUsuarios["nombre"] => $valueOrdenes["total"]);

            #Sumamos los netos de cada usuario

            foreach ($arrayListaUsuarios as $key => $value) {
            
            $sumaTotalUsuarios[$key] += $value;
            
            }

        } 

    }
}

#evitamos repetir nombres
$noRepetirNombres = array_unique($arrayUsuarios);

?>


<!--=============================================
USUARIOS
=============================================-->

<div class="box box-success">

    <div class="box-header with-border">

        <h3 class="box-tittle">Usuarios</h3>

    </div>

    <div class="box-body">

        <div class="chart-responsive">

            <div class="chart" id="bar-chart1" style="height: 300px;">



            </div>

        </div>

    </div>

</div>

<script>

    //BAR CHART
    var bar = new Morris.Bar({
    element: 'bar-chart1',
    resize: true,
    data: [
    <?php

    foreach ($noRepetirNombres as $value) {
        
        echo "{y: '".$value."', a: '".$sumaTotalUsuarios[$value]."'},";

    }
    

    ?>
    
    
    ],
    barColors: ['#0af'],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['ordenes'],
    preUnits: 'S/ ',
    hideHover: 'auto'
    });

</script>