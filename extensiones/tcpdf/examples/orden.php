<?php

require_once "../../../controladores/ordenes.controlador.php";
require_once "../../../modelos/ordenes.modelo.php";

require_once "../../../controladores/empleados.controlador.php";
require_once "../../../modelos/empleados.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirOrden{

    public $codigo;

    public function traerImpresionOrden(){

        // TRAER INFORMACION DE LA ORDEN

        $itemOrden = "codigo";
        $valorOrden = $this->codigo;

        $respuestaOrden = ControladorOrdenes::ctrMostrarOrdenes($itemOrden,$valorOrden);

        $fecha = substr($respuestaOrden["fecha"],0,-8);
        $productos = json_decode($respuestaOrden["productos"], true);
        $total = number_format($respuestaOrden["total"],2);

        //TRAER INFORMACION DEL EMPLEADO

        $itemEmpleado = "id";
        $valorEmpleado = $respuestaOrden["id_empleado"];

        $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

        //TRAER INFOAMCION DEL USUARIO

        $itemUsuario = "id";
        $valorUsuario = $respuestaOrden["id_usuario"];

        $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

        //REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);

$pdf->startPageGroup();

$pdf->AddPage();

//----------------------------------------------------------------------------------

$bloque1 = <<<EOF

    <table>

        <tr>

            <td style="width:150px"><img src="images/logo-lineal1.png"></td>
            <td style="background-color:white; width 140px">
            
                <div style="font-size:8.5px; text-align:right; line-height:15px;">
                
                    <br>
                    NIT: 71.759.963-9

                    <br>
                    Direccion: Jr. ABC 123

                </div>

            </td>

            <td style="background-color:white; width 140px">
            
                <div style="font-size:8.5px; text-align:right; line-height:15px;">
                
                    <br>
                    Telefono: 71.759.963-9


                </div>

            </td>

            <td style="background-color:white; width 110px; text-align:center; color:green">
            
                    <br>
                    ORDEN Nro.:<br>$valorOrden

            </td>

        </tr>

    </table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

//-----------------------------------------------------------------------------------

$bloque2 = <<<EOF

        <table>
        
            <tr>
            
                <td style="width:540px"><img src="images/lineablanca.png"></td>

            </tr>

        </table>        

        <table style="font-size:10px; padding:5px 10px; ">
        
            <tr>

                <td style="border: 1px solid #555; background-color:white; width:390px">
                    Empleado: $respuestaEmpleado[nombre] 
                </td>

                <td style="border: 1px solid #555; background-color:white; width:150px; text-align:right">
                    Fecha: $fecha 
                </td>

            </tr>

            <tr>

                <td style="border: 1px solid #555; background-color:white; width:540px">Usuario: $respuestaUsuario[nombre]</td>    

            </tr>

            <tr>

                <td style="border-bottom: 1px solid #555; background-color:white; width:540px"></td>    

            </tr>
        
        </table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

//-----------------------------------------------------------------------------------

$bloque3 = <<<EOF

    <table>
    
        <tr>
        
        <td style="border: 1px solid #555; background-color:white; width: 260px; text-align:center">Producto</td>
        <td style="border: 1px solid #555; background-color:white; width: 80px; text-align:center">Cantidad</td>
        <td style="border: 1px solid #555; background-color:white; width: 100px; text-align:center">Valor Unit</td>
        <td style="border: 1px solid #555; background-color:white; width: 100px; text-align:center">Valor Total</td>
        
        </tr>

    </table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

//-----------------------------------------------------------------------------------

foreach ($productos as $key => $item) {
    
    $itemProducto = "descripcion";
    $valorProducto = $item["descripcion"];
    $ordenar = null;

    $respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $ordenar);

    $valorUnitario = number_format($respuestaProducto["precio_compra"], 2);

    $precioTotal = number_format($item["total"], 2);



$bloque4 = <<<EOF

    <table style="font-size:10px; padding:5px 10px">
    
        <tr>
        
            <td style="border: 1px solid #555;color:#333; background-color:white; width: 260px; text-align:center">$item[descripcion]</td>
            <td style="border: 1px solid #555;color:#333; background-color:white; width: 80px; text-align:center">$item[cantidad]</td>
            <td style="border: 1px solid #555;color:#333; background-color:white; width: 100px; text-align:center">$valorUnitario</td>
            <td style="border: 1px solid #555;color:#333; background-color:white; width: 100px; text-align:center">$precioTotal</td>
        
        </tr>

    </table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

//-----------------------------------------------------------------------------------

$bloque5 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;">

        <tr>
            <td style="color:#333; background-color:white; width: 340px; text-align:center"></td>

            <td style="border-bottom: 1px solid #555; background-color:white; width:100px; text-align:center">
            </td>
            <td style="border-bottom: 1px solid #555; background-color:white; width:100px; text-align:center">
            </td>
        </tr>

        <tr>
        
            <td style="border-right: 1px solid #555; color:#333;background-color:white; width:340px; text-align:center">
            </td>

            <td style="border: 1px solid #555; background-color:white; width: 100px; text-align:center">Total:</td>

            <td style="border: 1px solid #555; background-color:white; width: 100px; text-align:center">$total:</td>


        
        </tr>

    </table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');


//SALIDA DEL ARCHIVO

$pdf->Output('orden.pdf');

}

}

$orden = new imprimirOrden();

$orden->codigo=$_GET["codigo"];

$orden -> traerImpresionOrden(); 

?>