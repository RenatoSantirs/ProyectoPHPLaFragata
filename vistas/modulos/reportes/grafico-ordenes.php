<?php

error_reporting(0);

if (isset($_GET["fechaInicial"])) {
            
    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

  }else {
    $fechaInicial = null;
    $fechaFinal = null;
  }

  $respuesta = ControladorOrdenes::ctrRangoFechasOrdenes($fechaInicial, $fechaFinal);

  $arrayFechas = array();
  $arrayOrdenes = array();
  $sumaPreciosMes = array();

  foreach ($respuesta as $key => $value) {

        #Capturamos solo el año y mes

        $fecha = substr($value["fecha"],0,7);

        #Introducir las fechas en el arrayFechas

        array_push($arrayFechas, $fecha);

        #Capturamos las ordenes

        $arrayOrdenes = array($fecha => $value["total"]);

        #Sumamos las ordenes que ocurrieron en un mes

        foreach ($arrayOrdenes as $key => $value) {
            
            $sumaPreciosMes[$key] += $value;
        }

  }


  $noRepetirFechas = array_unique($arrayFechas);

?>

<!--=============================================
GRAFICO DE ORDENES
=============================================-->

<div class="box box-solid bg-teal-gradient">

    <div class="box-header">

        <i class="fa fa-th"></i>

        <h3 class="box-title">Grafico de Ordenes</h3>

    </div>

    <div class="box-body border-radius-none nuevoGraficoOrdenes">

        <div class="chart" id="line-chart-ordenes" style="height: 250px;"></div>

    </div>

</div>

<script>

        var line = new Morris.Line({
            element          : 'line-chart-ordenes',
            resize           : true,
            data             : [
            
            <?php

            if ($noRepetirFechas != null) {
                foreach($noRepetirFechas as $key){

                    echo "{ y: '".$key."', ordenes: ".$sumaPreciosMes[$key]." },";
                }
            }else{

                echo "{ y: '0', ordenes: '0' },";

            }

            

            

            
            ?>
            ],
            xkey             : 'y',
            ykeys            : ['ordenes'],
            labels           : ['ordenes'],
            lineColors       : ['#efefef'],
            lineWidth        : 2,
            hideHover        : 'auto',
            gridTextColor    : '#fff',
            gridStrokeWidth  : 0.4,
            pointSize        : 4,
            pointStrokeColors: ['#efefef'],
            gridLineColor    : '#efefef',
            gridTextFamily   : 'Open Sans',
            preUnits         : 'S/ ',
            gridTextSize     : 10
        });

</script>