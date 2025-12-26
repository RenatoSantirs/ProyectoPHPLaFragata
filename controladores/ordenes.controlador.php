<?php

class ControladorOrdenes{

	/*=============================================
	MOSTRAR ORDENES
	=============================================*/

	static public function ctrMostrarOrdenes($item, $valor){

		$tabla = "ordenes";

		$respuesta = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR ORDEN
	=============================================*/

	static public function ctrCrearOrden(){

		if(isset($_POST["nuevaOrden"])){

			/*=============================================
			ACTUALIZAR LAS ORDENES DEL EMPLEADO Y REDUCIR EL STOCK Y AUMENTAR LAS ORDENES DE LOS PRODUCTOS
			=============================================*/

			$listaProductos = json_decode($_POST["listaProductos"], true);

			$totalProductosOrdenados = array();

			foreach ($listaProductos as $key => $value) {

			   array_push($totalProductosOrdenados, $value["cantidad"]);
				
			   $tablaProductos = "productos";

			    $item = "id";
			    $valor = $value["id"];
				$ordenar = "id";

			    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $ordenar);

				$item1a = "ordenes";
				$valor1a = $value["cantidad"] + $traerProducto["ordenes"];

			    $nuevasOrdenes = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaEmpleados = "empleados";

			$item = "id";
			$valor = $_POST["seleccionarEmpleado"];

			$traerEmpleado = ModeloEmpleados::mdlMostrarEmpleados($tablaEmpleados, $item, $valor);

			$item1a = "ordenes";
			$valor1a = array_sum($totalProductosOrdenados) + $traerEmpleado["ordenes"];

			$ordenesEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item1a, $valor1a, $valor);

			$item1b = "ultima_orden";

			date_default_timezone_set('America/Bogota');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$valor1b = $fecha.' '.$hora;

			$fechaEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item1b, $valor1b, $valor);

			/*=============================================
			GUARDAR LA ORDEN
			=============================================*/	

			$tabla = "ordenes";

			$datos = array("id_usuario"=>$_POST["idUsuario"],
						   "id_empleado"=>$_POST["seleccionarEmpleado"],
						   "codigo"=>$_POST["nuevaOrden"],
						   "productos"=>$_POST["listaProductos"],
						   "total"=>$_POST["totalOrden"]);

			$respuesta = ModeloOrdenes::mdlIngresarOrden($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La orden ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ordenes";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	EDITAR ORDEN
	=============================================*/

	static public function ctrEditarOrden(){

		if(isset($_POST["editarOrden"])){

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE EMPLEADOS
			=============================================*/
			$tabla = "ordenes";

			$item = "codigo";
			$valor = $_POST["editarOrden"];

			$traerOrden = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);

			/*=============================================
			REVISAR SI VIENE PRODUCTOS EDITADOS
			=============================================*/

			if($_POST["listaProductos"] == ""){

				$listaProductos = $traerOrden["productos"];
				$cambioProducto = false;


			}else{

				$listaProductos = $_POST["listaProductos"];
				$cambioProducto = true;
			}

			if($cambioProducto){

				$productos =  json_decode($traerOrden["productos"], true);

				$totalProductosOrdenados = array();

				foreach ($productos as $key => $value) {

					array_push($totalProductosOrdenados, $value["cantidad"]);
					
					$tablaProductos = "productos";

					$item = "id";
					$valor = $value["id"];
					$ordenar = "id";

					$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $ordenar);

					$item1a = "ordenes";
					$valor1a = $traerProducto["ordenes"] - $value["cantidad"];

					$nuevasOrdenes = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

					$item1b = "stock";
					$valor1b = $value["cantidad"] + $traerProducto["stock"];

					$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

				}

				$tablaEmpleados = "empleados";

				$itemEmpleado = "id";
				$valorEmpleado = $_POST["seleccionarEmpleado"];

				$traerEmpleado = ModeloEmpleados::mdlMostrarEmpleados($tablaEmpleados, $itemEmpleado, $valorEmpleado);

				$item1a = "ordenes";
				$valor1a = $traerEmpleado["ordenes"] - array_sum($totalProductosOrdenados);

				$ordenesEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item1a, $valor1a, $valorEmpleado);

				/*=============================================
				ACTUALIZAR LAS ORDENES DEL EMPLEADO Y REDUCIR EL STOCK Y AUMENTAR LAS ORDENES DE LOS PRODUCTOS
				=============================================*/

				$listaProductos_2 = json_decode($listaProductos, true);

				$totalProductosOrdenados_2 = array();

				foreach ($listaProductos_2 as $key => $value) {

					array_push($totalProductosOrdenados_2, $value["cantidad"]);
					
					$tablaProductos_2 = "productos";

					$item_2 = "id";
					$valor_2 = $value["id"];
					$ordenar_2 = "id";

					$traerProducto_2 = ModeloProductos::mdlMostrarProductos($tablaProductos_2, $item_2, $valor_2, $ordenar_2);

					$item1a_2 = "ordenes";
					$valor1a_2 = $value["cantidad"] + $traerProducto_2["ordenes"];

					$nuevasOrdenes_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);

					$item1b_2 = "stock";
					$valor1b_2 = $value["stock"];

					$nuevoStock_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1b_2, $valor1b_2, $valor_2);

				}

				$tablaEmpleados_2 = "empleados";

				$item_2 = "id";
				$valor_2 = $_POST["seleccionarEmpleado"];

				$traerEmpleado_2 = ModeloEmpleados::mdlMostrarEmpleados($tablaEmpleados_2, $item_2, $valor_2);

				$item1a_2 = "ordenes";
				$valor1a_2 = array_sum($totalProductosOrdenados_2) + $traerEmpleado_2["ordenes"];

				$ordenesEmpleado_2 = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados_2, $item1a_2, $valor1a_2, $valor_2);

				$item1b_2 = "ultima_orden";

				date_default_timezone_set('America/Bogota');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');
				$valor1b_2 = $fecha.' '.$hora;

				$fechaEmpleado_2 = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados_2, $item1b_2, $valor1b_2, $valor_2);

			}

			/*=============================================
			GUARDAR CAMBIOS DE LA ORDEN
			=============================================*/	

			$datos = array("id_usuario"=>$_POST["idUsuario"],
						   "id_empleado"=>$_POST["seleccionarEmpleado"],
						   "codigo"=>$_POST["editarOrden"],
						   "productos"=>$listaProductos,
						   "total"=>$_POST["totalOrden"]);


			$respuesta = ModeloOrdenes::mdlEditarOrden($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La orden ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ordenes";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR ORDEN
	=============================================*/

	static public function ctrEliminarOrden(){

		if(isset($_GET["idOrden"])){

			$tabla = "ordenes";

			$item = "id";
			$valor = $_GET["idOrden"];

			$traerOrden = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);

			/*=============================================
			ACTUALIZAR FECHA ÚLTIMA ORDEN
			=============================================*/

			$tablaEmpleados = "empleados";

			$itemOrdenes = null;
			$valorOrdenes = null;

			$traerOrdenes = ModeloOrdenes::mdlMostrarOrdenes($tabla, $itemOrdenes, $valorOrdenes);

			$guardarFechas = array();

			foreach ($traerOrdenes as $key => $value) {
				
				if($value["id_empleado"] == $traerOrden["id_empleado"]){

					array_push($guardarFechas, $value["fecha"]);

				}

			}

			if(count($guardarFechas) > 1){

				if($traerOrden["fecha"] > $guardarFechas[count($guardarFechas)-2]){

					$item = "ultima_orden";
					$valor = $guardarFechas[count($guardarFechas)-2];
					$valorIdEmpleado = $traerOrden["id_empleado"];

					$ordenesEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item, $valor, $valorIdEmpleado);

				}else{

					$item = "ultima_orden";
					$valor = $guardarFechas[count($guardarFechas)-1];
					$valorIdEmpleado = $traerOrden["id_empleado"];

					$ordenesEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item, $valor, $valorIdEmpleado);

				}


			}else{

				$item = "ultima_orden";
				$valor = "0000-00-00 00:00:00";
				$valorIdEmpleado = $traerOrden["id_empleado"];

				$ordenesEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item, $valor, $valorIdEmpleado);

			}

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE EMPLEADOS
			=============================================*/

			$productos =  json_decode($traerOrden["productos"], true);

			$totalProductosOrdenados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosOrdenados, $value["cantidad"]);
				
				$tablaProductos = "productos";

				$item = "id";
				$valor = $value["id"];
				$ordenar = "id";

				$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $ordenar);

				$item1a = "ordenes";
				$valor1a = $traerProducto["ordenes"] - $value["cantidad"];

				$nuevasOrdenes = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["cantidad"] + $traerProducto["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaEmpleados = "empleados";

			$itemEmpleado = "id";
			$valorEmpleado = $traerOrden["id_empleado"];

			$traerEmpleado = ModeloEmpleados::mdlMostrarEmpleados($tablaEmpleados, $itemEmpleado, $valorEmpleado);

			$item1a = "ordenes";
			$valor1a = $traerEmpleado["ordenes"] - array_sum($totalProductosOrdenados);

			$ordenesEmpleado = ModeloEmpleados::mdlActualizarEmpleado($tablaEmpleados, $item1a, $valor1a, $valorEmpleado);

			/*=============================================
			ELIMINAR ORDEN
			=============================================*/

			$respuesta = ModeloOrdenes::mdlEliminarOrden($tabla, $_GET["idOrden"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La orden ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "ordenes";

								}
							})

				</script>';

			}		
		}

	}

	/*=============================================
	RANGO DE FECHAS
	=============================================*/

	static public function ctrRangoFechasOrdenes($fechaInicial, $fechaFinal){

		$tabla = "ordenes";

		$respuesta = ModeloOrdenes::mdlRangoFechasOrdenes($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
	}
	
	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if (isset($_GET["reporte"])) {
			
			$tabla = "ordenes";

			if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {

				$ordenes = ModeloOrdenes::mdlRangoFechasOrdenes($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

			}else{

				$item = null;
				$valor = null;
				$ordenes = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);

			}

	/*=============================================
	CREAR ARCHIVO EXCEL
	=============================================*/

	$Name = $_GET["reporte"].'.xls';

	header ('Expires: 0');
	header ('Cache-control: private');
	header ("Content-type: application/vnd.ms-excel"); // Archivo de Excel
	header ("Cache-Control: cache, must-revalidate");
	header ('Content-Description: File Transfer');
	header ('Last-Modified: '.date('D, d M Y H:i:s'));
	header ("Pragma: public");
	header ('Content-Disposition:; filename="'.$Name.'"');
	header ("Content-Transfer-Encoding: binary");

	echo utf8_decode("<table border='0'>

				<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>CODIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPLEADO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>USUARIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
				</tr>");	

			foreach ($ordenes as $row => $item) {
				
				$empleado = ControladorEmpleados::ctrMostrarEmpleados("id", $item["id_empleado"]);
				$usuario = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_usuario"]);

				echo utf8_decode("<tr>
						<td style='border:1px solid #eee'>".$item["codigo"]."</td>
						<td style='border:1px solid #eee'>".$empleado["nombre"]."</td>
						<td style='border:1px solid #eee'>".$usuario["nombre"]."</td>
						<td style='border:1px solid #eee'>");

					$productos = json_decode($item["productos"], true);

					foreach ($productos as $key => $valueProductos) {
						
						echo utf8_decode($valueProductos["cantidad"]."<br>");

					}
					
					echo utf8_decode ("</td><td style='border:1px solid #eee;'>");

					foreach ($productos as $key => $valueProductos) {
						
						echo utf8_decode($valueProductos["descripcion"]."<br>");
					}

					echo utf8_decode ("</td>
					
					<td style='border:1px solid #eee'>".number_format($item["total"],2)."</td>
					<td style='border:1px solid #eee'>".substr($item["fecha"],0,10)."</td>
					
					</tr>");
						
			}

	echo "</table>";



		}
	}

	/*=============================================
	SUMA TOTAL ORDENES
	=============================================*/

	public function ctrSumaTotalOrdenes(){

		$tabla = "ordenes";

		$respuesta = ModeloOrdenes::mdlSumaTotalOrdenes($tabla);

		return $respuesta;
	}
 
}