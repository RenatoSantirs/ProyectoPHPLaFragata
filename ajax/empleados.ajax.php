<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

class AjaxEmpleados{

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/	

	public $idEmpleado;

	public function ajaxEditarEmpleado(){

		$item = "id";
		$valor = $this->idEmpleado;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR EMPLEADO
=============================================*/	

if(isset($_POST["idEmpleado"])){

	$empleado = new AjaxEmpleados();
	$empleado -> idEmpleado = $_POST["idEmpleado"];
	$empleado -> ajaxEditarEmpleado();

}