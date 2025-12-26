<?php

require_once "../../controladores/ordenes.controlador.php";
require_once "../../modelos/ordenes.modelo.php";
require_once "../../controladores/empleados.controlador.php";
require_once "../../modelos/empleados.modelo.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

$reporte = new ControladorOrdenes();
$reporte -> ctrDescargarReporte();

?>