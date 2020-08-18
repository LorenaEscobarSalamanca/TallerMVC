<?php

verificarPermisos('tecnico');

require_once("modelos/trabajosModel.php");
$trabajo = new trabajosModel();
$datos = $trabajo->getTrabajos();

require_once("vistas/tecnicos/homeTecnicos.phtml");

?>