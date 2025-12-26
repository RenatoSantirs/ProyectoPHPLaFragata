<?php

class ControladorEmpleados{

	/*=============================================
	CREAR EMPLEADOS
	=============================================*/

	static public function ctrCrearEmpleado(){

		if(isset($_POST["nuevoEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEmpleado"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "empleados";

			   	$datos = array("nombre"=>$_POST["nuevoEmpleado"],
					           "documento"=>$_POST["nuevoDocumentoId"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"]);

			   	$respuesta = ModeloEmpleados::mdlIngresarEmpleado($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El empleado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empleados";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El empleado no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empleados";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR EMPLEADOS
	=============================================*/

	static public function ctrMostrarEmpleados($item, $valor){

		$tabla = "empleados";

		$respuesta = ModeloEmpleados::mdlMostrarEmpleados($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/

	static public function ctrEditarEmpleado(){

		if(isset($_POST["editarEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmpleado"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "empleados";

			   	$datos = array("id"=>$_POST["idEmpleado"],
			   				   "nombre"=>$_POST["editarEmpleado"],
					           "documento"=>$_POST["editarDocumentoId"],
					           "email"=>$_POST["editarEmail"],
					           "telefono"=>$_POST["editarTelefono"],
					           "direccion"=>$_POST["editarDireccion"]);

			   	$respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El empleado ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empleados";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El empleado no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empleados";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR EMPLEADO
	=============================================*/

	static public function ctrEliminarEmpleado(){

		if(isset($_GET["idEmpleado"])){

			$tabla ="empleados";
			$datos = $_GET["idEmpleado"];

			$respuesta = ModeloEmpleados::mdlEliminarEmpleado($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El empleado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "empleados";

								}
							})

				</script>';

			}		

		}

	}

}

